from rest_framework import viewsets, permissions, status
from rest_framework.decorators import action
from rest_framework.response import Response
from django.db.models import Count, Avg
from .models import SchoolClass, Subject, Teacher, Student, Lesson, Attendance, Grade
from .serializers import (
    SchoolClassSerializer,
    SubjectSerializer,
    TeacherSerializer,
    StudentSerializer,
    LessonSerializer,
    AttendanceSerializer,
    GradeSerializer,
)


class IsAdminOrReadOnly(permissions.BasePermission):
    def has_permission(self, request, view):
        if request.method in permissions.SAFE_METHODS:
            return True
        return request.user and request.user.is_staff


class SchoolClassViewSet(viewsets.ModelViewSet):
    queryset = SchoolClass.objects.all().order_by("grade", "name")
    serializer_class = SchoolClassSerializer
    permission_classes = [permissions.IsAuthenticated]


class SubjectViewSet(viewsets.ModelViewSet):
    queryset = Subject.objects.all().order_by("name")
    serializer_class = SubjectSerializer
    permission_classes = [permissions.IsAuthenticated]


class TeacherViewSet(viewsets.ModelViewSet):
    queryset = Teacher.objects.select_related("user").all()
    serializer_class = TeacherSerializer
    permission_classes = [permissions.IsAuthenticated]


class StudentViewSet(viewsets.ModelViewSet):
    queryset = Student.objects.select_related("user", "school_class").all()
    serializer_class = StudentSerializer
    permission_classes = [permissions.IsAuthenticated]


class LessonViewSet(viewsets.ModelViewSet):
    queryset = Lesson.objects.select_related("subject", "school_class", "teacher").all()
    serializer_class = LessonSerializer
    permission_classes = [permissions.IsAuthenticated]

    def get_queryset(self):
        qs = super().get_queryset()
        school_class = self.request.query_params.get("class")
        subject = self.request.query_params.get("subject")
        if school_class:
            qs = qs.filter(school_class_id=school_class)
        if subject:
            qs = qs.filter(subject_id=subject)
        return qs


class AttendanceViewSet(viewsets.ModelViewSet):
    queryset = Attendance.objects.select_related("student").all()
    serializer_class = AttendanceSerializer
    permission_classes = [permissions.IsAuthenticated]

    @action(detail=False, methods=["get"], url_path="summary")
    def summary(self, request):
        school_class = request.query_params.get("class")
        qs = Attendance.objects
        if school_class:
            qs = qs.filter(student__school_class_id=school_class)
        data = qs.values("student_id").annotate(
            total=Count("id"),
            present=Count("id", filter=models.Q(status="present")),
            absent=Count("id", filter=models.Q(status="absent")),
        )
        return Response(list(data))


class GradeViewSet(viewsets.ModelViewSet):
    queryset = Grade.objects.select_related("student", "subject").all()
    serializer_class = GradeSerializer
    permission_classes = [permissions.IsAuthenticated]

    @action(detail=False, methods=["get"], url_path="student")
    def by_student(self, request):
        student_id = request.query_params.get("id")
        if not student_id:
            return Response({"detail": "id is required"}, status=status.HTTP_400_BAD_REQUEST)
        data = Grade.objects.filter(student_id=student_id).values(
            "subject__name", "score", "max_score", "term"
        )
        return Response(list(data))


# Create your views here.
