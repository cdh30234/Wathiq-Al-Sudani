from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status, permissions
from django.contrib.auth.models import User
from django.contrib.auth import authenticate
from django.db import transaction
from .models import Student, Teacher


class LoginView(APIView):
    permission_classes = [permissions.AllowAny]

    def post(self, request):
        username = request.data.get("username")
        password = request.data.get("password")

        if not username or not password:
            return Response({"detail": "اسم المستخدم وكلمة المرور مطلوبان"}, status=status.HTTP_400_BAD_REQUEST)

        # محاولة المصادقة
        user = authenticate(username=username, password=password)
        
        if not user:
            # البحث بالبريد الإلكتروني
            try:
                user_obj = User.objects.get(email=username)
                user = authenticate(username=user_obj.username, password=password)
            except User.DoesNotExist:
                pass

        if user and user.is_active:
            # تحديد نوع المستخدم
            role = 'student'  # افتراضي
            if user.is_superuser or user.is_staff:
                role = 'admin'
            else:
                # البحث في UserProfile
                try:
                    user_profile = user.userprofile
                    if hasattr(user_profile, 'teacher'):
                        role = 'teacher'
                    elif hasattr(user_profile, 'student'):
                        role = 'student'
                except:
                    # إذا لم يوجد UserProfile، تحقق من النماذج مباشرة
                    from .models import Teacher, Student
                    if Teacher.objects.filter(user_profile__user=user).exists():
                        role = 'teacher'
                    elif Student.objects.filter(user_profile__user=user).exists():
                        role = 'student'

            return Response({
                "success": True,
                "user": {
                    "id": user.id,
                    "username": user.username,
                    "email": user.email,
                    "name": f"{user.first_name} {user.last_name}".strip() or user.username,
                    "role": role
                }
            }, status=status.HTTP_200_OK)
        
        return Response({"success": False, "detail": "بيانات الدخول غير صحيحة"}, status=status.HTTP_401_UNAUTHORIZED)


class RegisterView(APIView):
    permission_classes = [permissions.AllowAny]

    @transaction.atomic
    def post(self, request):
        email = request.data.get("email")
        password = request.data.get("password")
        full_name = request.data.get("full_name", "")
        role = (request.data.get("role") or "student").lower()

        if not email or not password:
            return Response({"detail": "email and password are required"}, status=status.HTTP_400_BAD_REQUEST)

        if User.objects.filter(username=email).exists():
            return Response({"detail": "User already exists"}, status=status.HTTP_400_BAD_REQUEST)

        user = User.objects.create_user(username=email, email=email, password=password)
        first, *rest = full_name.split(" ") if full_name else ("",)
        user.first_name = first or ""
        user.last_name = " ".join(rest) if rest else ""
        user.save()

        if role == "teacher":
            Teacher.objects.create(user=user, full_name=full_name or email)
        else:
            # default student
            Student.objects.create(user=user, full_name=full_name or email, school_class=None, roll_number=f"R{user.id:06d}")

        return Response({"id": user.id, "email": user.email, "role": role}, status=status.HTTP_201_CREATED)


class WhoAmIView(APIView):
    permission_classes = [permissions.IsAuthenticated]

    def get(self, request):
        role = getattr(request.user, 'role', 'student')
        return Response({
            "id": getattr(request.user, 'id', None),
            "email": getattr(request.user, 'email', ''),
            "role": role,
        })


