#!/usr/bin/env python
"""
إنشاء المستخدمين التجريبيين للنظام
"""
import os
import django
import sys

# إعداد Django
os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'sms_backend.settings')
django.setup()

from django.contrib.auth.models import User
from core.models import Teacher, Student, School, UserProfile

def create_demo_users():
    """إنشاء المستخدمين التجريبيين"""
    
    # الحصول على المدرسة
    school, created = School.objects.get_or_create(
        name="مدرسة الرواد",
        defaults={
            'address': 'الرياض، المملكة العربية السعودية',
            'phone': '+966112345678',
            'email': 'info@rawad-school.edu.sa'
        }
    )
    
    print("🏫 تم إنشاء/العثور على المدرسة:", school.name)
    
    # إنشاء المدير
    admin_user, created = User.objects.get_or_create(
        username='admin',
        defaults={
            'email': 'admin@rawad-school.edu.sa',
            'first_name': 'أحمد',
            'last_name': 'العمري',
            'is_staff': True,
            'is_superuser': True,
            'is_active': True
        }
    )
    admin_user.set_password('admin123')
    admin_user.save()
    print("👨‍💼 تم إنشاء المدير:", admin_user.username)
    
    # إنشاء المدرس
    teacher_user, created = User.objects.get_or_create(
        username='math_teacher',
        defaults={
            'email': 'math@rawad-school.edu.sa',
            'first_name': 'محمد',
            'last_name': 'أحمد',
            'is_active': True
        }
    )
    teacher_user.set_password('teacher123')
    teacher_user.save()
    
    # إنشاء ملف المستخدم للمدرس
    teacher_profile, created = UserProfile.objects.get_or_create(
        user=teacher_user,
        defaults={
            'arabic_first_name': 'محمد',
            'arabic_last_name': 'أحمد',
            'english_first_name': 'Mohammed',
            'english_last_name': 'Ahmed',
            'national_id': '1234567890',
            'phone_number': '+966501234567',
            'address': 'الرياض، السعودية',
            'date_of_birth': '1985-01-01',
            'gender': 'male',
            'school': school
        }
    )
    
    # إنشاء ملف المدرس
    teacher, created = Teacher.objects.get_or_create(
        user_profile=teacher_profile,
        defaults={
            'employee_id': 'T2024001',
            'specialization': 'الرياضيات',
            'qualification': 'بكالوريوس رياضيات',
            'experience_years': 8,
            'hire_date': '2020-01-01',
            'salary': 8000.00
        }
    )
    print("👨‍🏫 تم إنشاء المدرس:", teacher_profile.arabic_first_name)
    
    # إنشاء الطالب
    student_user, created = User.objects.get_or_create(
        username='student001',
        defaults={
            'email': 'student1@rawad-school.edu.sa',
            'first_name': 'أحمد',
            'last_name': 'محمد الأحمد',
            'is_active': True
        }
    )
    student_user.set_password('student123')
    student_user.save()
    
    # إنشاء ملف المستخدم للطالب
    student_profile, created = UserProfile.objects.get_or_create(
        user=student_user,
        defaults={
            'arabic_first_name': 'أحمد',
            'arabic_last_name': 'محمد الأحمد',
            'english_first_name': 'Ahmed',
            'english_last_name': 'Mohammed Al-Ahmed',
            'national_id': '2234567890',
            'phone_number': '+966502234567',
            'address': 'الرياض، السعودية',
            'date_of_birth': '2008-01-01',
            'gender': 'male',
            'school': school
        }
    )
    
    # إنشاء ملف الطالب
    student, created = Student.objects.get_or_create(
        user_profile=student_profile,
        defaults={
            'roll_number': 'S2024001',
            'enrollment_date': '2024-01-01'
        }
    )
    print("👨‍🎓 تم إنشاء الطالب:", student_profile.arabic_first_name)
    
    print("\n✅ تم إنشاء جميع المستخدمين التجريبيين بنجاح!")
    print("\n📋 بيانات الدخول:")
    print("🔹 المدير: admin / admin123")
    print("🔹 المدرس: math_teacher / teacher123") 
    print("🔹 الطالب: student001 / student123")

if __name__ == '__main__':
    create_demo_users()
