#!/usr/bin/env python
"""
إدراج بيانات شاملة في قاعدة البيانات
يتضمن: مدرسة، سنوات دراسية، صفوف، فصول، مواد، مستخدمين، مدرسين، طلاب، دروس، حضور، درجات، إعلانات
"""
import os
import sys
import django
from datetime import datetime, date, timedelta
import uuid
import random

# إعداد Django
os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'sms_backend.settings')
django.setup()

from django.contrib.auth.models import User
from core.models import (
    School, AcademicYear, Grade, SchoolClass, Subject, UserProfile,
    Teacher, Student, Lesson, Attendance, ExamType, Grade_Score,
    Announcement, Schedule, Report
)

def clear_database():
    """حذف جميع البيانات"""
    print("🗑️ حذف البيانات القديمة...")
    
    # حذف البيانات بالترتيب الصحيح لتجنب مشاكل المفاتيح الخارجية
    Grade_Score.objects.all().delete()
    Attendance.objects.all().delete()
    Lesson.objects.all().delete()
    Schedule.objects.all().delete()
    Announcement.objects.all().delete()
    Report.objects.all().delete()
    Student.objects.all().delete()
    Teacher.objects.all().delete()
    UserProfile.objects.all().delete()
    User.objects.all().delete()
    SchoolClass.objects.all().delete()
    Subject.objects.all().delete()
    ExamType.objects.all().delete()
    Grade.objects.all().delete()
    AcademicYear.objects.all().delete()
    School.objects.all().delete()
    
    print("✅ تم حذف البيانات القديمة")

def create_school():
    """إنشاء المدرسة"""
    print("🏫 إنشاء بيانات المدرسة...")
    
    school = School.objects.create(
        name="مدرسة الرواد الثانوية",
        address="شارع الملك فيصل، الرياض، المملكة العربية السعودية",
        phone="+966112345678",
        email="info@rawad-school.edu.sa",
        principal_name="أحمد بن محمد العمري",
        logo="https://via.placeholder.com/200x200/4f46e5/ffffff?text=مدرسة+الرواد"
    )
    
    print(f"✅ تم إنشاء المدرسة: {school.name}")
    return school

def create_academic_years():
    """إنشاء السنوات الدراسية"""
    print("📅 إنشاء السنوات الدراسية...")
    
    years = []
    
    # السنة الحالية
    current_year = AcademicYear.objects.create(
        name="2024-2025",
        start_date=date(2024, 9, 1),
        end_date=date(2025, 6, 30),
        is_current=True
    )
    years.append(current_year)
    
    # السنة السابقة
    previous_year = AcademicYear.objects.create(
        name="2023-2024",
        start_date=date(2023, 9, 1),
        end_date=date(2024, 6, 30),
        is_current=False
    )
    years.append(previous_year)
    
    print(f"✅ تم إنشاء {len(years)} سنة دراسية")
    return years

def create_school_grades():
    """إنشاء الصفوف الدراسية"""
    print("📚 إنشاء الصفوف الدراسية...")
    
    grades_data = [
        {"name": "الصف العاشر", "level": 10},
        {"name": "الصف الحادي عشر", "level": 11},
        {"name": "الصف الثاني عشر", "level": 12},
    ]
    
    grades = []
    for grade_data in grades_data:
        grade = Grade.objects.create(
            name=grade_data["name"],
            level=grade_data["level"],
            description=f"وصف {grade_data['name']}"
        )
        grades.append(grade)
    
    print(f"✅ تم إنشاء {len(grades)} صف دراسي")
    return grades

def create_classes(grades, academic_year):
    """إنشاء الفصول"""
    print("🏛️ إنشاء الفصول...")
    
    classes = []
    sections = ["أ", "ب", "ج"]
    
    for grade in grades:
        for section in sections:
            school_class = SchoolClass.objects.create(
                name=f"{grade.name} {section}",
                grade=grade,
                academic_year=academic_year,
                capacity=30,
                classroom_number=f"{grade.level}{section}"
            )
            classes.append(school_class)
    
    print(f"✅ تم إنشاء {len(classes)} فصل")
    return classes

def create_subjects(grades):
    """إنشاء المواد الدراسية"""
    print("📖 إنشاء المواد الدراسية...")
    
    subjects_data = [
        {"name": "الرياضيات", "code": "MATH", "credit_hours": 4},
        {"name": "الفيزياء", "code": "PHYS", "credit_hours": 3},
        {"name": "الكيمياء", "code": "CHEM", "credit_hours": 3},
        {"name": "الأحياء", "code": "BIOL", "credit_hours": 3},
        {"name": "اللغة العربية", "code": "ARAB", "credit_hours": 4},
        {"name": "اللغة الإنجليزية", "code": "ENGL", "credit_hours": 3},
        {"name": "التاريخ", "code": "HIST", "credit_hours": 2},
        {"name": "الجغرافيا", "code": "GEOG", "credit_hours": 2},
        {"name": "التربية الإسلامية", "code": "ISLA", "credit_hours": 2},
        {"name": "علوم الحاسب", "code": "COMP", "credit_hours": 3},
    ]
    
    subjects = []
    for subject_data in subjects_data:
        subject = Subject.objects.create(
            name=subject_data["name"],
            code=subject_data["code"],
            description=f"مادة {subject_data['name']} للمرحلة الثانوية",
            credit_hours=subject_data["credit_hours"]
        )
        subject.grades.set(grades)  # ربط المادة بجميع الصفوف
        subjects.append(subject)
    
    print(f"✅ تم إنشاء {len(subjects)} مادة دراسية")
    return subjects

def create_exam_types():
    """إنشاء أنواع الاختبارات"""
    print("📝 إنشاء أنواع الاختبارات...")
    
    exam_types_data = [
        {"name": "اختبار الفترة الأولى", "weight_percentage": 20, "max_score": 100},
        {"name": "اختبار الفترة الثانية", "weight_percentage": 20, "max_score": 100},
        {"name": "اختبار نهاية الفصل الأول", "weight_percentage": 30, "max_score": 100},
        {"name": "اختبار نهاية الفصل الثاني", "weight_percentage": 30, "max_score": 100},
    ]
    
    exam_types = []
    for exam_data in exam_types_data:
        exam_type = ExamType.objects.create(
            name=exam_data["name"],
            weight_percentage=exam_data["weight_percentage"],
            max_score=exam_data["max_score"]
        )
        exam_types.append(exam_type)
    
    print(f"✅ تم إنشاء {len(exam_types)} نوع اختبار")
    return exam_types

def create_users_and_profiles():
    """إنشاء المستخدمين والملفات الشخصية"""
    print("👥 إنشاء المستخدمين...")
    
    users_data = []
    
    # المدير
    admin_user = User.objects.create_user(
        username="admin",
        email="admin@rawad-school.edu.sa",
        password="admin123",
        first_name="Ahmed",
        last_name="Al-Omari"
    )
    admin_user.is_staff = True
    admin_user.is_superuser = True
    admin_user.save()
    
    admin_profile = UserProfile.objects.create(
        user=admin_user,
        arabic_first_name="أحمد",
        arabic_last_name="العمري",
        national_id="1234567890",
        phone="+966501234567",
        address="الرياض، المملكة العربية السعودية",
        date_of_birth=date(1980, 5, 15),
        gender="male",
        role="admin",
        supabase_user_id=uuid.uuid4()
    )
    users_data.append(("admin", admin_user, admin_profile))
    
    # المدرسين
    teachers_data = [
        {"username": "math_teacher", "first_name": "محمد", "last_name": "أحمد", "subject": "الرياضيات", "email": "math@rawad-school.edu.sa"},
        {"username": "physics_teacher", "first_name": "سارة", "last_name": "محمد", "subject": "الفيزياء", "email": "physics@rawad-school.edu.sa"},
        {"username": "chemistry_teacher", "first_name": "عبدالله", "last_name": "علي", "subject": "الكيمياء", "email": "chemistry@rawad-school.edu.sa"},
        {"username": "biology_teacher", "first_name": "فاطمة", "last_name": "حسن", "subject": "الأحياء", "email": "biology@rawad-school.edu.sa"},
        {"username": "arabic_teacher", "first_name": "خالد", "last_name": "السالم", "subject": "اللغة العربية", "email": "arabic@rawad-school.edu.sa"},
        {"username": "english_teacher", "first_name": "نورا", "last_name": "الفيصل", "subject": "اللغة الإنجليزية", "email": "english@rawad-school.edu.sa"},
    ]
    
    for teacher_data in teachers_data:
        teacher_user = User.objects.create_user(
            username=teacher_data["username"],
            email=teacher_data["email"],
            password="teacher123",
            first_name=teacher_data["first_name"],
            last_name=teacher_data["last_name"]
        )
        
        teacher_profile = UserProfile.objects.create(
            user=teacher_user,
            arabic_first_name=teacher_data["first_name"],
            arabic_last_name=teacher_data["last_name"],
            national_id=f"100{random.randint(1000000, 9999999)}",
            phone=f"+9665{random.randint(10000000, 99999999)}",
            address="الرياض، المملكة العربية السعودية",
            date_of_birth=date(random.randint(1975, 1990), random.randint(1, 12), random.randint(1, 28)),
            gender=random.choice(["male", "female"]),
            role="teacher",
            supabase_user_id=uuid.uuid4()
        )
        users_data.append(("teacher", teacher_user, teacher_profile))
    
    # الطلاب
    students_names = [
        ("أحمد", "محمد", "الأحمد"),
        ("فاطمة", "عبدالله", "السعد"),
        ("خالد", "علي", "القحطاني"),
        ("نورا", "محمد", "العتيبي"),
        ("عبدالرحمن", "سعد", "المطيري"),
        ("سارة", "أحمد", "الغامدي"),
        ("محمد", "خالد", "الشمري"),
        ("هند", "عبدالعزيز", "الدوسري"),
        ("يوسف", "فهد", "الحربي"),
        ("ريم", "سلطان", "العنزي"),
        ("عبدالله", "ناصر", "الرشيد"),
        ("مريم", "عبدالرحمن", "الزهراني"),
        ("سلطان", "محمد", "القرني"),
        ("لينا", "خالد", "الثقفي"),
        ("فيصل", "أحمد", "البقمي"),
        ("دانا", "محمد", "الشهري"),
        ("عمر", "عبدالله", "الصالح"),
        ("رغد", "سعد", "المالكي"),
        ("تركي", "علي", "الخالدي"),
        ("جود", "فهد", "السبيعي"),
    ]
    
    for i, (first_name, middle_name, last_name) in enumerate(students_names):
        student_user = User.objects.create_user(
            username=f"student{i+1:03d}",
            email=f"student{i+1}@rawad-school.edu.sa",
            password="student123",
            first_name=first_name,
            last_name=last_name
        )
        
        student_profile = UserProfile.objects.create(
            user=student_user,
            arabic_first_name=first_name,
            arabic_last_name=f"{middle_name} {last_name}",
            national_id=f"200{random.randint(1000000, 9999999)}",
            phone=f"+9665{random.randint(10000000, 99999999)}",
            address="الرياض، المملكة العربية السعودية",
            date_of_birth=date(random.randint(2005, 2008), random.randint(1, 12), random.randint(1, 28)),
            gender=random.choice(["male", "female"]),
            role="student",
            supabase_user_id=uuid.uuid4()
        )
        users_data.append(("student", student_user, student_profile))
    
    print(f"✅ تم إنشاء {len(users_data)} مستخدم")
    return users_data

def create_teachers(users_data, subjects, classes):
    """إنشاء بيانات المدرسين"""
    print("👨‍🏫 إنشاء بيانات المدرسين...")
    
    teachers = []
    teacher_users = [user_data for user_data in users_data if user_data[0] == "teacher"]
    
    for i, (role, user, profile) in enumerate(teacher_users):
        teacher = Teacher.objects.create(
            user_profile=profile,
            employee_id=f"T{2024}{i+1:03d}",
            specialization=subjects[i % len(subjects)].name if subjects else "عام",
            qualification="بكالوريوس في التربية",
            experience_years=random.randint(2, 15),
            hire_date=date(random.randint(2010, 2023), random.randint(1, 12), random.randint(1, 28)),
            salary=random.randint(8000, 15000)
        )
        
        # ربط المدرس بالمواد (1-3 مواد لكل مدرس)
        teacher_subjects = random.sample(subjects, random.randint(1, 3))
        teacher.subjects.set(teacher_subjects)
        
        # ربط المدرس بالفصول (1-4 فصول لكل مدرس)
        teacher_classes = random.sample(classes, random.randint(1, 4))
        teacher.classes.set(teacher_classes)
        
        teachers.append(teacher)
    
    print(f"✅ تم إنشاء {len(teachers)} مدرس")
    return teachers

def create_students(users_data, classes):
    """إنشاء بيانات الطلاب"""
    print("👨‍🎓 إنشاء بيانات الطلاب...")
    
    students = []
    student_users = [user_data for user_data in users_data if user_data[0] == "student"]
    
    guardian_names = [
        "عبدالله محمد الأحمد", "سعد علي القحطاني", "محمد أحمد العتيبي",
        "خالد عبدالرحمن المطيري", "أحمد سلطان الغامدي", "علي محمد الشمري",
        "فهد عبدالعزيز الدوسري", "ناصر خالد الحربي", "سلطان أحمد العنزي",
        "عبدالرحمن محمد الرشيد", "محمد عبدالله الزهراني", "خالد سعد القرني",
        "أحمد فهد الثقفي", "عبدالله محمد البقمي", "سعد علي الشهري",
        "محمد أحمد الصالح", "علي عبدالرحمن المالكي", "فهد خالد الخالدي",
        "أحمد سلطان السبيعي", "محمد عبدالله الجهني"
    ]
    
    for i, (role, user, profile) in enumerate(student_users):
        student = Student.objects.create(
            user_profile=profile,
            student_id=f"S{2024}{i+1:04d}",
            school_class=random.choice(classes),
            enrollment_date=date(2024, 9, 1),
            guardian_name=guardian_names[i % len(guardian_names)],
            guardian_phone=f"+9665{random.randint(10000000, 99999999)}",
            guardian_email=f"guardian{i+1}@gmail.com",
            guardian_relationship="الوالد",
            emergency_contact=guardian_names[i % len(guardian_names)],
            emergency_phone=f"+9665{random.randint(10000000, 99999999)}",
            medical_notes="لا توجد ملاحظات طبية خاصة"
        )
        students.append(student)
    
    print(f"✅ تم إنشاء {len(students)} طالب")
    return students

def create_lessons(subjects, teachers, classes):
    """إنشاء الدروس"""
    print("📚 إنشاء الدروس...")
    
    lessons = []
    lesson_titles = [
        "مقدمة في المادة", "الوحدة الأولى", "التطبيقات العملية",
        "المراجعة العامة", "الاختبار التجريبي", "الوحدة الثانية",
        "التمارين المتقدمة", "المشاريع العملية", "الوحدة الثالثة",
        "المراجعة النهائية"
    ]
    
    file_types = ["pdf", "ppt", "video", "link"]
    
    for subject in subjects:
        # العثور على المدرسين الذين يدرسون هذه المادة
        subject_teachers = [t for t in teachers if subject in t.subjects.all()]
        if not subject_teachers:
            continue
            
        for i, title in enumerate(lesson_titles):
            teacher = random.choice(subject_teachers)
            lesson = Lesson.objects.create(
                title=f"{subject.name} - {title}",
                description=f"شرح مفصل ل {title} في مادة {subject.name}",
                subject=subject,
                teacher=teacher,
                file_url=f"https://example.com/lessons/{subject.code.lower()}_{i+1}.pdf",
                file_type=random.choice(file_types),
                file_size=random.randint(1024, 10485760),  # 1KB to 10MB
                is_published=True
            )
            
            # ربط الدرس بالفصول التي يدرس فيها المدرس
            lesson_classes = [c for c in classes if c in teacher.classes.all()]
            if lesson_classes:
                lesson.classes.set(random.sample(lesson_classes, min(3, len(lesson_classes))))
            
            lessons.append(lesson)
    
    print(f"✅ تم إنشاء {len(lessons)} درس")
    return lessons

def create_attendance_records(students, teachers, subjects, classes):
    """إنشاء سجلات الحضور"""
    print("📊 إنشاء سجلات الحضور...")
    
    attendances = []
    statuses = ["present", "absent", "late", "excused"]
    weights = [0.85, 0.08, 0.05, 0.02]  # احتمالية كل حالة
    
    # إنشاء سجلات للشهرين الماضيين
    start_date = date.today() - timedelta(days=60)
    end_date = date.today()
    
    current_date = start_date
    while current_date <= end_date:
        # تخطي أيام الجمعة والسبت
        if current_date.weekday() in [4, 5]:  # الجمعة والسبت
            current_date += timedelta(days=1)
            continue
            
        for student in students[:10]:  # فقط أول 10 طلاب لتوفير الوقت
            for subject in subjects[:5]:  # فقط أول 5 مواد
                # العثور على مدرس المادة في فصل الطالب
                subject_teachers = [t for t in teachers 
                                 if subject in t.subjects.all() 
                                 and student.school_class in t.classes.all()]
                
                if subject_teachers:
                    teacher = random.choice(subject_teachers)
                    status = random.choices(statuses, weights=weights)[0]
                    
                    attendance = Attendance.objects.create(
                        student=student,
                        school_class=student.school_class,
                        teacher=teacher,
                        subject=subject,
                        date=current_date,
                        status=status,
                        notes="ملاحظات تلقائية" if status != "present" else ""
                    )
                    attendances.append(attendance)
        
        current_date += timedelta(days=1)
    
    print(f"✅ تم إنشاء {len(attendances)} سجل حضور")
    return attendances

def create_grades(students, subjects, teachers, exam_types, academic_year):
    """إنشاء الدرجات"""
    print("🏆 إنشاء الدرجات...")
    
    grades = []
    
    for student in students[:10]:  # فقط أول 10 طلاب
        for subject in subjects[:5]:  # فقط أول 5 مواد
            # العثور على مدرس المادة
            subject_teachers = [t for t in teachers 
                             if subject in t.subjects.all() 
                             and student.school_class in t.classes.all()]
            
            if subject_teachers:
                teacher = random.choice(subject_teachers)
                
                for exam_type in exam_types:
                    # إنشاء درجة عشوائية واقعية
                    score = random.randint(60, 100)
                    max_score = exam_type.max_score
                    
                    grade = Grade_Score.objects.create(
                        student=student,
                        subject=subject,
                        teacher=teacher,
                        exam_type=exam_type,
                        academic_year=academic_year,
                        score=score,
                        max_score=max_score,
                        notes=f"أداء {'ممتاز' if score >= 90 else 'جيد' if score >= 80 else 'مقبول'}",
                        exam_date=date.today() - timedelta(days=random.randint(1, 90))
                    )
                    grades.append(grade)
    
    print(f"✅ تم إنشاء {len(grades)} درجة")
    return grades

def create_announcements(teachers, classes):
    """إنشاء الإعلانات"""
    print("📢 إنشاء الإعلانات...")
    
    announcements = []
    
    announcements_data = [
        {
            "title": "بداية الفصل الدراسي الثاني",
            "content": "نعلن لجميع الطلاب وأولياء الأمور عن بداية الفصل الدراسي الثاني يوم الأحد القادم.",
            "type": "general"
        },
        {
            "title": "اختبارات الفترة الأولى",
            "content": "ستبدأ اختبارات الفترة الأولى في الأسبوع القادم حسب الجدول المرفق.",
            "type": "exam"
        },
        {
            "title": "واجب الرياضيات",
            "content": "مطلوب حل التمارين من صفحة 45 إلى 50 وتسليمها يوم الثلاثاء.",
            "type": "homework"
        },
        {
            "title": "إجازة منتصف الفصل",
            "content": "إجازة منتصف الفصل ستكون من يوم الخميس إلى السبت.",
            "type": "holiday"
        },
        {
            "title": "اجتماع أولياء الأمور",
            "content": "اجتماع مهم لأولياء الأمور يوم الأربعاء الساعة 7 مساءً.",
            "type": "important"
        }
    ]
    
    for i, ann_data in enumerate(announcements_data):
        teacher = random.choice(teachers)
        
        announcement = Announcement.objects.create(
            title=ann_data["title"],
            content=ann_data["content"],
            author=teacher,
            announcement_type=ann_data["type"],
            target_all_school=random.choice([True, False]),
            is_published=True,
            is_urgent=ann_data["type"] in ["important", "urgent"],
            expiry_date=datetime.now() + timedelta(days=30)
        )
        
        # ربط الإعلان ببعض الفصول إذا لم يكن للمدرسة كاملة
        if not announcement.target_all_school:
            target_classes = random.sample(classes, random.randint(1, 3))
            announcement.target_classes.set(target_classes)
        
        announcements.append(announcement)
    
    print(f"✅ تم إنشاء {len(announcements)} إعلان")
    return announcements

def create_schedules(classes, subjects, teachers):
    """إنشاء الجداول الدراسية"""
    print("📅 إنشاء الجداول الدراسية...")
    
    schedules = []
    days = ["sunday", "monday", "tuesday", "wednesday", "thursday"]
    times = [
        ("08:00", "08:45"),
        ("08:45", "09:30"),
        ("09:45", "10:30"),
        ("10:30", "11:15"),
        ("11:30", "12:15"),
        ("12:15", "13:00")
    ]
    
    for school_class in classes[:5]:  # فقط أول 5 فصول
        for day in days:
            used_times = []
            
            for start_time, end_time in times:
                if len(used_times) >= 5:  # حد أقصى 5 حصص في اليوم
                    break
                    
                # اختيار مادة ومدرس
                class_subjects = []
                for teacher in teachers:
                    if school_class in teacher.classes.all():
                        class_subjects.extend(teacher.subjects.all())
                
                if class_subjects:
                    subject = random.choice(class_subjects)
                    # العثور على مدرس هذه المادة في هذا الفصل
                    subject_teachers = [t for t in teachers 
                                     if subject in t.subjects.all() 
                                     and school_class in t.classes.all()]
                    
                    if subject_teachers:
                        teacher = random.choice(subject_teachers)
                        
                        schedule = Schedule.objects.create(
                            school_class=school_class,
                            subject=subject,
                            teacher=teacher,
                            day_of_week=day,
                            start_time=start_time,
                            end_time=end_time,
                            classroom=school_class.classroom_number or f"F{random.randint(101, 120)}"
                        )
                        schedules.append(schedule)
                        used_times.append(start_time)
    
    print(f"✅ تم إنشاء {len(schedules)} جدول دراسي")
    return schedules

def main():
    """الدالة الرئيسية"""
    print("🚀 بدء إنشاء قاعدة البيانات الشاملة...")
    print("=" * 50)
    
    # حذف البيانات القديمة
    clear_database()
    
    # إنشاء البيانات الأساسية
    school = create_school()
    academic_years = create_academic_years()
    current_year = academic_years[0]
    
    grades = create_school_grades()
    classes = create_classes(grades, current_year)
    subjects = create_subjects(grades)
    exam_types = create_exam_types()
    
    # إنشاء المستخدمين
    users_data = create_users_and_profiles()
    teachers = create_teachers(users_data, subjects, classes)
    students = create_students(users_data, classes)
    
    # إنشاء المحتوى التعليمي
    lessons = create_lessons(subjects, teachers, classes)
    attendances = create_attendance_records(students, teachers, subjects, classes)
    grades_scores = create_grades(students, subjects, teachers, exam_types, current_year)
    announcements = create_announcements(teachers, classes)
    schedules = create_schedules(classes, subjects, teachers)
    
    print("=" * 50)
    print("✅ تم إنشاء قاعدة البيانات بنجاح!")
    print()
    print("📊 ملخص البيانات المُنشأة:")
    print(f"   🏫 المدارس: 1")
    print(f"   📅 السنوات الدراسية: {len(academic_years)}")
    print(f"   📚 الصفوف: {len(grades)}")
    print(f"   🏛️ الفصول: {len(classes)}")
    print(f"   📖 المواد: {len(subjects)}")
    print(f"   📝 أنواع الاختبارات: {len(exam_types)}")
    print(f"   👥 المستخدمين: {len(users_data)}")
    print(f"   👨‍🏫 المدرسين: {len(teachers)}")
    print(f"   👨‍🎓 الطلاب: {len(students)}")
    print(f"   📚 الدروس: {len(lessons)}")
    print(f"   📊 سجلات الحضور: {len(attendances)}")
    print(f"   🏆 الدرجات: {len(grades_scores)}")
    print(f"   📢 الإعلانات: {len(announcements)}")
    print(f"   📅 الجداول: {len(schedules)}")
    print()
    print("🔑 بيانات الدخول:")
    print("   المدير: admin / admin123")
    print("   المدرس: math_teacher / teacher123")
    print("   الطالب: student001 / student123")
    print()
    print("🎉 يمكنك الآن تشغيل الخادم واختبار النظام!")

if __name__ == "__main__":
    main()
