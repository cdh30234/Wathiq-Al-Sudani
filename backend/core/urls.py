from django.urls import path, include
from rest_framework.routers import DefaultRouter
from .views import (
    SchoolClassViewSet,
    SubjectViewSet,
    TeacherViewSet,
    StudentViewSet,
    LessonViewSet,
    AttendanceViewSet,
    GradeViewSet,
)
from .views_auth import RegisterView, WhoAmIView, LoginView

router = DefaultRouter()
router.register(r"classes", SchoolClassViewSet)
router.register(r"subjects", SubjectViewSet)
router.register(r"teachers", TeacherViewSet)
router.register(r"students", StudentViewSet)
router.register(r"lessons", LessonViewSet)
router.register(r"attendance", AttendanceViewSet)
router.register(r"grades", GradeViewSet)

urlpatterns = [
    path("", include(router.urls)),
    path("auth/login/", LoginView.as_view(), name="login"),
    path("auth/register/", RegisterView.as_view(), name="register"),
    path("auth/whoami/", WhoAmIView.as_view(), name="whoami"),
]


