from django.contrib import admin
from django.contrib.auth.admin import UserAdmin
from django.contrib.auth.models import User
from .models import (
    School, AcademicYear, Grade, SchoolClass, Subject, 
    UserProfile, Teacher, Student, Lesson, Attendance, 
    ExamType, Grade_Score, Announcement, Schedule, Report
)

# تخصيص لوحة التحكم الرئيسية
admin.site.site_header = "نظام إدارة المدرسة"
admin.site.site_title = "SMS Admin"
admin.site.index_title = "مرحباً بك في نظام إدارة المدرسة"

@admin.register(School)
class SchoolAdmin(admin.ModelAdmin):
    list_display = ['name', 'principal_name', 'phone', 'email']
    search_fields = ['name', 'principal_name']

@admin.register(AcademicYear)
class AcademicYearAdmin(admin.ModelAdmin):
    list_display = ['name', 'start_date', 'end_date', 'is_current']
    list_filter = ['is_current']

@admin.register(Grade)
class GradeAdmin(admin.ModelAdmin):
    list_display = ['name', 'level']
    ordering = ['level']

@admin.register(SchoolClass)
class SchoolClassAdmin(admin.ModelAdmin):
    list_display = ['name', 'grade', 'academic_year', 'capacity', 'classroom_number']
    list_filter = ['grade', 'academic_year']
    search_fields = ['name']

@admin.register(Subject)
class SubjectAdmin(admin.ModelAdmin):
    list_display = ['name', 'code', 'credit_hours']
    search_fields = ['name', 'code']
    filter_horizontal = ['grades']

@admin.register(UserProfile)
class UserProfileAdmin(admin.ModelAdmin):
    list_display = ['arabic_first_name', 'arabic_last_name', 'role', 'national_id', 'is_active', 'get_username']
    list_filter = ['role', 'is_active', 'gender']
    search_fields = ['arabic_first_name', 'arabic_last_name', 'national_id', 'user__username', 'user__email']
    readonly_fields = ['supabase_user_id', 'created_at', 'updated_at']
    
    fieldsets = (
        ('معلومات المستخدم', {
            'fields': ('user', 'role', 'is_active')
        }),
        ('المعلومات الشخصية', {
            'fields': ('arabic_first_name', 'arabic_last_name', 'national_id', 'phone', 'address', 'date_of_birth', 'gender')
        }),
        ('معلومات النظام', {
            'fields': ('supabase_user_id', 'profile_picture', 'created_at', 'updated_at'),
            'classes': ('collapse',)
        }),
    )
    
    def get_username(self, obj):
        return obj.user.username
    get_username.short_description = 'اسم المستخدم'

@admin.register(Teacher)
class TeacherAdmin(admin.ModelAdmin):
    list_display = ['get_full_name', 'employee_id', 'specialization', 'experience_years', 'hire_date']
    list_filter = ['specialization', 'hire_date']
    search_fields = ['employee_id', 'user_profile__arabic_first_name', 'user_profile__arabic_last_name']
    filter_horizontal = ['subjects', 'classes']
    
    def get_full_name(self, obj):
        return f"{obj.user_profile.arabic_first_name} {obj.user_profile.arabic_last_name}"
    get_full_name.short_description = 'الاسم الكامل'

@admin.register(Student)
class StudentAdmin(admin.ModelAdmin):
    list_display = ['get_full_name', 'student_id', 'school_class', 'guardian_name', 'enrollment_date']
    list_filter = ['school_class', 'enrollment_date']
    search_fields = ['student_id', 'user_profile__arabic_first_name', 'user_profile__arabic_last_name', 'guardian_name']
    
    def get_full_name(self, obj):
        return f"{obj.user_profile.arabic_first_name} {obj.user_profile.arabic_last_name}"
    get_full_name.short_description = 'الاسم الكامل'

@admin.register(Lesson)
class LessonAdmin(admin.ModelAdmin):
    list_display = ['title', 'subject', 'teacher', 'file_type', 'is_published', 'publish_date']
    list_filter = ['subject', 'file_type', 'is_published', 'publish_date']
    search_fields = ['title', 'subject__name', 'teacher__user_profile__arabic_first_name']
    filter_horizontal = ['classes']

@admin.register(Attendance)
class AttendanceAdmin(admin.ModelAdmin):
    list_display = ['get_student_name', 'school_class', 'subject', 'date', 'status']
    list_filter = ['status', 'date', 'school_class', 'subject']
    search_fields = ['student__user_profile__arabic_first_name', 'student__student_id']
    
    def get_student_name(self, obj):
        return f"{obj.student.user_profile.arabic_first_name} {obj.student.user_profile.arabic_last_name}"
    get_student_name.short_description = 'الطالب'

@admin.register(ExamType)
class ExamTypeAdmin(admin.ModelAdmin):
    list_display = ['name', 'weight_percentage', 'max_score']

@admin.register(Grade_Score)
class GradeScoreAdmin(admin.ModelAdmin):
    list_display = ['get_student_name', 'subject', 'exam_type', 'score', 'percentage', 'grade_letter', 'exam_date']
    list_filter = ['exam_type', 'grade_letter', 'academic_year', 'subject']
    search_fields = ['student__user_profile__arabic_first_name', 'student__student_id']
    
    def get_student_name(self, obj):
        return f"{obj.student.user_profile.arabic_first_name} {obj.student.user_profile.arabic_last_name}"
    get_student_name.short_description = 'الطالب'

@admin.register(Announcement)
class AnnouncementAdmin(admin.ModelAdmin):
    list_display = ['title', 'announcement_type', 'author', 'is_published', 'is_urgent', 'publish_date']
    list_filter = ['announcement_type', 'is_published', 'is_urgent', 'publish_date']
    search_fields = ['title', 'content']
    filter_horizontal = ['target_classes']

@admin.register(Schedule)
class ScheduleAdmin(admin.ModelAdmin):
    list_display = ['school_class', 'subject', 'teacher', 'day_of_week', 'start_time', 'end_time', 'classroom']
    list_filter = ['day_of_week', 'school_class', 'subject']
    search_fields = ['school_class__name', 'subject__name', 'teacher__user_profile__arabic_first_name']

@admin.register(Report)
class ReportAdmin(admin.ModelAdmin):
    list_display = ['title', 'report_type', 'generated_by', 'status', 'created_at']
    list_filter = ['report_type', 'status', 'created_at']
    search_fields = ['title']
    filter_horizontal = ['school_classes', 'subjects']