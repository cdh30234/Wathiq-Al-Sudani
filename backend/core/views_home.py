from django.http import JsonResponse
from django.shortcuts import render, redirect
from rest_framework.decorators import api_view, permission_classes
from rest_framework.permissions import AllowAny
from rest_framework.response import Response

@api_view(['GET'])
@permission_classes([AllowAny])
def api_home(request):
    """
    صفحة رئيسية للAPI تعرض معلومات النظام
    """
    return Response({
        "message": "مرحباً بك في نظام إدارة المدرسة - Eduport SMS",
        "version": "2.0.0",
        "status": "running",
        "endpoints": {
            "authentication": {
                "login": "/api/auth/login/",
                "register": "/api/auth/register/",
                "logout": "/api/auth/logout/",
                "whoami": "/api/auth/whoami/",
                "change_password": "/api/auth/change-password/"
            },
            "data": {
                "students": "/api/students/",
                "teachers": "/api/teachers/",
                "classes": "/api/classes/",
                "subjects": "/api/subjects/",
                "lessons": "/api/lessons/",
                "attendance": "/api/attendance/",
                "grades": "/api/grades/"
            },
            "admin": "/admin/"
        },
        "sample_users": {
            "admin": "admin (مدير النظام)",
            "teachers": ["math_teacher", "physics_teacher", "chemistry_teacher"],
            "students": ["student001", "student002", "student003"]
        },
        "documentation": "راجع LOCAL_SETUP_GUIDE.md للتفاصيل الكاملة"
    })

def home_view(request):
    """
    صفحة HTML بسيطة للترحيب
    """
    context = {
        'title': 'نظام إدارة المدرسة',
        'message': 'مرحباً بك في نظام إدارة المدرسة - Eduport SMS'
    }
    return render(request, 'home.html', context)

def root_redirect(request):
    """إعادة توجيه الجذر إلى واجهة PHP index-9 (Home School)"""
    return redirect('http://127.0.0.1:8000/index-9.php')
