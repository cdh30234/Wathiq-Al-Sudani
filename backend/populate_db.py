#!/usr/bin/env python
"""
Script to populate the database with sample data for SMS system
"""

import os
import sys
import django
from datetime import datetime, date, timedelta
from decimal import Decimal
import uuid

# Setup Django
os.environ.setdefault("DJANGO_SETTINGS_MODULE", "sms_backend.settings")
django.setup()

from django.contrib.auth.models import User
from core.models import (
    School, AcademicYear, Grade, SchoolClass, Subject, 
    UserProfile, Teacher, Student, Lesson, Attendance, 
    ExamType, Grade_Score, Announcement, Schedule
)

def create_sample_data():
    print("🏫 Creating sample data for SMS system...")
    
    # Create School
    school, created = School.objects.get_or_create(
        name="مدرسة النجاح الثانوية",
        defaults={
            'address': 'الرياض، المملكة العربية السعودية',
            'phone': '+966112345678',
            'email': 'info@najah-school.edu.sa',
            'principal_name': 'د. عبدالله محمد السعد',
            'logo': 'https://example.com/logo.png'
        }
    )
    print(f"✅ School: {school.name}")
    
    # Create Academic Year
    academic_year, created = AcademicYear.objects.get_or_create(
        name="2024-2025",
        defaults={
            'start_date': date(2024, 9, 1),
            'end_date': date(2025, 6, 30),
            'is_current': True
        }
    )
    print(f"✅ Academic Year: {academic_year.name}")
    
    # Create Grades
    grades_data = [
        {'name': 'العاشر', 'level': 10},
        {'name': 'الحادي عشر', 'level': 11},
        {'name': 'الثاني عشر', 'level': 12}
    ]
    
    grades = {}
    for grade_data in grades_data:
        grade, created = Grade.objects.get_or_create(
            name=grade_data['name'],
            defaults={'level': grade_data['level']}
        )
        grades[grade.name] = grade
        print(f"✅ Grade: {grade.name}")
    
    # Create School Classes
    classes_data = [
        {'name': 'العاشر أ', 'grade': 'العاشر'},
        {'name': 'العاشر ب', 'grade': 'العاشر'},
        {'name': 'الحادي عشر أ', 'grade': 'الحادي عشر'},
        {'name': 'الثاني عشر أ', 'grade': 'الثاني عشر'}
    ]
    
    school_classes = {}
    for class_data in classes_data:
        school_class, created = SchoolClass.objects.get_or_create(
            name=class_data['name'],
            defaults={
                'grade': grades[class_data['grade']],
                'academic_year': academic_year,
                'capacity': 30,
                'classroom_number': f"F-{class_data['name'][-1]}"
            }
        )
        school_classes[class_data['name']] = school_class
        print(f"✅ Class: {school_class.name}")
    
    # Create Subjects
    subjects_data = [
        {'name': 'الرياضيات', 'code': 'MATH'},
        {'name': 'الفيزياء', 'code': 'PHYS'},
        {'name': 'الكيمياء', 'code': 'CHEM'},
        {'name': 'الأحياء', 'code': 'BIO'},
        {'name': 'اللغة العربية', 'code': 'ARAB'},
        {'name': 'اللغة الإنجليزية', 'code': 'ENG'},
        {'name': 'التاريخ', 'code': 'HIST'},
        {'name': 'الجغرافيا', 'code': 'GEO'}
    ]
    
    subjects = {}
    for subject_data in subjects_data:
        subject, created = Subject.objects.get_or_create(
            code=subject_data['code'],
            defaults={
                'name': subject_data['name'],
                'credit_hours': 3
            }
        )
        # Add all grades to all subjects
        subject.grades.set(grades.values())
        subjects[subject.name] = subject
        print(f"✅ Subject: {subject.name}")
    
    # Create Exam Types
    exam_types_data = [
        {'name': 'اختبار نصف الفصل', 'weight_percentage': 30},
        {'name': 'اختبار نهاية الفصل', 'weight_percentage': 50},
        {'name': 'واجبات منزلية', 'weight_percentage': 10},
        {'name': 'مشاركة صفية', 'weight_percentage': 10}
    ]
    
    exam_types = {}
    for exam_data in exam_types_data:
        exam_type, created = ExamType.objects.get_or_create(
            name=exam_data['name'],
            defaults={
                'weight_percentage': exam_data['weight_percentage'],
                'max_score': 100
            }
        )
        exam_types[exam_type.name] = exam_type
        print(f"✅ Exam Type: {exam_type.name}")
    
    # Create Teachers
    teachers_data = [
        {
            'username': 'dr_mohammed_abdullah',
            'email': 'mohammed.abdullah@school.edu.sa',
            'first_name': 'محمد',
            'last_name': 'العبدالله',
            'employee_id': 'T001',
            'specialization': 'الرياضيات',
            'subjects': ['الرياضيات'],
            'phone': '+966501234001'
        },
        {
            'username': 'sarah_ahmed',
            'email': 'sara.ahmed@school.edu.sa',
            'first_name': 'سارة',
            'last_name': 'أحمد',
            'employee_id': 'T002',
            'specialization': 'العلوم',
            'subjects': ['الفيزياء', 'الكيمياء'],
            'phone': '+966501234002'
        },
        {
            'username': 'abdullah_saad',
            'email': 'abdullah.saad@school.edu.sa',
            'first_name': 'عبدالله',
            'last_name': 'سعد',
            'employee_id': 'T003',
            'specialization': 'اللغة العربية',
            'subjects': ['اللغة العربية'],
            'phone': '+966501234003'
        }
    ]
    
    teachers = {}
    for teacher_data in teachers_data:
        # Create User
        user, created = User.objects.get_or_create(
            username=teacher_data['username'],
            defaults={
                'email': teacher_data['email'],
                'first_name': teacher_data['first_name'],
                'last_name': teacher_data['last_name']
            }
        )
        
        # Create UserProfile
        user_profile, created = UserProfile.objects.get_or_create(
            user=user,
            defaults={
                'arabic_first_name': teacher_data['first_name'],
                'arabic_last_name': teacher_data['last_name'],
                'national_id': f"1{teacher_data['employee_id'][1:]}000000",
                'phone': teacher_data['phone'],
                'address': 'الرياض، المملكة العربية السعودية',
                'date_of_birth': date(1980, 1, 1),
                'gender': 'male',
                'role': 'teacher',
                'supabase_user_id': uuid.uuid4()
            }
        )
        
        # Create Teacher
        teacher, created = Teacher.objects.get_or_create(
            employee_id=teacher_data['employee_id'],
            defaults={
                'user_profile': user_profile,
                'specialization': teacher_data['specialization'],
                'qualification': 'بكالوريوس',
                'experience_years': 5,
                'hire_date': date(2019, 9, 1),
                'salary': Decimal('8000.00')
            }
        )
        
        # Add subjects
        teacher_subjects = [subjects[subj] for subj in teacher_data['subjects']]
        teacher.subjects.set(teacher_subjects)
        
        # Add classes (assign to first two classes)
        teacher.classes.set(list(school_classes.values())[:2])
        
        teachers[teacher.employee_id] = teacher
        print(f"✅ Teacher: {teacher}")
    
    # Create Students
    students_data = [
        {
            'username': 'ahmed_mohammed',
            'email': 'ahmed.mohammed@school.edu.sa',
            'first_name': 'أحمد',
            'last_name': 'محمد',
            'student_id': '2023001',
            'class': 'العاشر أ',
            'guardian': 'محمد أحمد',
            'phone': '+966501234000'
        },
        {
            'username': 'sara_ahmed_student',
            'email': 'sara.ahmed.student@school.edu.sa',
            'first_name': 'سارة',
            'last_name': 'أحمد',
            'student_id': '2023002',
            'class': 'العاشر أ',
            'guardian': 'أحمد عبدالله',
            'phone': '+966501234001'
        },
        {
            'username': 'abdullah_saad_student',
            'email': 'abdullah.saad.student@school.edu.sa',
            'first_name': 'عبدالله',
            'last_name': 'سعد',
            'student_id': '2023003',
            'class': 'العاشر ب',
            'guardian': 'سعد عبدالله',
            'phone': '+966501234002'
        },
        {
            'username': 'fatima_ali',
            'email': 'fatima.ali@school.edu.sa',
            'first_name': 'فاطمة',
            'last_name': 'علي',
            'student_id': '2023004',
            'class': 'الحادي عشر أ',
            'guardian': 'علي محمد',
            'phone': '+966501234003'
        },
        {
            'username': 'youssef_mahmoud',
            'email': 'youssef.mahmoud@school.edu.sa',
            'first_name': 'يوسف',
            'last_name': 'محمود',
            'student_id': '2023005',
            'class': 'العاشر ب',
            'guardian': 'محمود يوسف',
            'phone': '+966501234004'
        }
    ]
    
    students = {}
    for student_data in students_data:
        # Create User
        user, created = User.objects.get_or_create(
            username=student_data['username'],
            defaults={
                'email': student_data['email'],
                'first_name': student_data['first_name'],
                'last_name': student_data['last_name']
            }
        )
        
        # Create UserProfile
        user_profile, created = UserProfile.objects.get_or_create(
            user=user,
            defaults={
                'arabic_first_name': student_data['first_name'],
                'arabic_last_name': student_data['last_name'],
                'national_id': f"2{student_data['student_id'][4:]}000000",
                'phone': student_data['phone'],
                'address': 'الرياض، المملكة العربية السعودية',
                'date_of_birth': date(2007, 1, 1),
                'gender': 'male' if student_data['first_name'] in ['أحمد', 'عبدالله', 'يوسف'] else 'female',
                'role': 'student',
                'supabase_user_id': uuid.uuid4()
            }
        )
        
        # Create Student
        student, created = Student.objects.get_or_create(
            student_id=student_data['student_id'],
            defaults={
                'user_profile': user_profile,
                'school_class': school_classes[student_data['class']],
                'enrollment_date': date(2023, 9, 1),
                'guardian_name': student_data['guardian'],
                'guardian_phone': f"+966{student_data['phone'][-9:]}99",
                'guardian_email': f"{student_data['guardian'].replace(' ', '.')}@gmail.com",
                'emergency_contact': student_data['guardian'],
                'emergency_phone': f"+966{student_data['phone'][-9:]}88"
            }
        )
        
        students[student.student_id] = student
        print(f"✅ Student: {student}")
    
    # Create some lessons
    lessons_data = [
        {
            'title': 'الدوال الخطية',
            'subject': 'الرياضيات',
            'teacher': 'T001',
            'description': 'شرح الدوال الخطية وخصائصها',
            'file_type': 'pdf'
        },
        {
            'title': 'قوانين نيوتن للحركة',
            'subject': 'الفيزياء',
            'teacher': 'T002',
            'description': 'دراسة قوانين نيوتن الثلاثة',
            'file_type': 'ppt'
        },
        {
            'title': 'الجدول الدوري',
            'subject': 'الكيمياء',
            'teacher': 'T002',
            'description': 'تنظيم العناصر في الجدول الدوري',
            'file_type': 'pdf'
        }
    ]
    
    for lesson_data in lessons_data:
        lesson, created = Lesson.objects.get_or_create(
            title=lesson_data['title'],
            defaults={
                'description': lesson_data['description'],
                'subject': subjects[lesson_data['subject']],
                'teacher': teachers[lesson_data['teacher']],
                'file_url': f'https://example.com/lessons/{lesson_data["title"].replace(" ", "_")}.{lesson_data["file_type"]}',
                'file_type': lesson_data['file_type'],
                'file_size': 1024000,
                'is_published': True
            }
        )
        # Add classes
        lesson.classes.set(list(school_classes.values())[:2])
        print(f"✅ Lesson: {lesson.title}")
    
    # Create some grades
    for student in students.values():
        for subject_name in ['الرياضيات', 'الفيزياء']:
            if subject_name in subjects:
                # Create midterm grade
                Grade_Score.objects.get_or_create(
                    student=student,
                    subject=subjects[subject_name],
                    teacher=teachers['T001'] if subject_name == 'الرياضيات' else teachers['T002'],
                    exam_type=exam_types['اختبار نصف الفصل'],
                    academic_year=academic_year,
                    defaults={
                        'score': Decimal('85.5'),
                        'exam_date': date(2024, 11, 15)
                    }
                )
    
    # Create some attendance records
    for student in students.values():
        for i in range(10):  # Last 10 days
            attendance_date = date.today() - timedelta(days=i)
            if attendance_date.weekday() < 5:  # Weekdays only
                Attendance.objects.get_or_create(
                    student=student,
                    date=attendance_date,
                    subject=subjects['الرياضيات'],
                    defaults={
                        'school_class': student.school_class,
                        'teacher': teachers['T001'],
                        'status': 'present' if i < 8 else 'absent',
                        'notes': 'متأخر 10 دقائق' if i == 3 else ''
                    }
                )
    
    # Create announcements
    announcements_data = [
        {
            'title': 'موعد الاختبار النهائي',
            'content': 'يُعلن للطلاب أن الاختبار النهائي لمادة الرياضيات سيعقد يوم الأحد القادم الساعة 8:00 صباحاً',
            'type': 'exam',
            'urgent': True
        },
        {
            'title': 'واجب الفيزياء',
            'content': 'يُرجى من الطلاب حل التمارين من صفحة 45 إلى 50 وتسليمها يوم الخميس',
            'type': 'homework',
            'urgent': False
        }
    ]
    
    for ann_data in announcements_data:
        announcement, created = Announcement.objects.get_or_create(
            title=ann_data['title'],
            defaults={
                'content': ann_data['content'],
                'author': teachers['T001'],
                'announcement_type': ann_data['type'],
                'is_urgent': ann_data['urgent'],
                'target_all_school': True
            }
        )
        print(f"✅ Announcement: {announcement.title}")
    
    print("\n🎉 Database populated successfully!")
    print(f"📊 Summary:")
    print(f"   🏫 Schools: {School.objects.count()}")
    print(f"   📅 Academic Years: {AcademicYear.objects.count()}")
    print(f"   📚 Grades: {Grade.objects.count()}")
    print(f"   🏛️ Classes: {SchoolClass.objects.count()}")
    print(f"   📖 Subjects: {Subject.objects.count()}")
    print(f"   👨‍🏫 Teachers: {Teacher.objects.count()}")
    print(f"   🎓 Students: {Student.objects.count()}")
    print(f"   📝 Lessons: {Lesson.objects.count()}")
    print(f"   📊 Grades: {Grade_Score.objects.count()}")
    print(f"   📋 Attendance Records: {Attendance.objects.count()}")
    print(f"   📢 Announcements: {Announcement.objects.count()}")

if __name__ == "__main__":
    create_sample_data()
