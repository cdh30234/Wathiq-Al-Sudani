from django.db import models
from django.contrib.auth.models import User
from django.core.validators import MinValueValidator, MaxValueValidator
import uuid

class BaseModel(models.Model):
    """Base model with common fields"""
    id = models.UUIDField(primary_key=True, default=uuid.uuid4, editable=False)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    
    class Meta:
        abstract = True

class School(BaseModel):
    """School information"""
    name = models.CharField(max_length=255, verbose_name="اسم المدرسة")
    address = models.TextField(verbose_name="العنوان")
    phone = models.CharField(max_length=20, verbose_name="رقم الهاتف")
    email = models.EmailField(verbose_name="البريد الإلكتروني")
    principal_name = models.CharField(max_length=100, verbose_name="اسم المدير")
    logo = models.URLField(blank=True, null=True, verbose_name="شعار المدرسة")
    
    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "المدرسة"
        verbose_name_plural = "المدارس"

class AcademicYear(BaseModel):
    """Academic year information"""
    name = models.CharField(max_length=50, verbose_name="اسم السنة الدراسية")  # e.g., "2024-2025"
    start_date = models.DateField(verbose_name="تاريخ البداية")
    end_date = models.DateField(verbose_name="تاريخ النهاية")
    is_current = models.BooleanField(default=False, verbose_name="السنة الحالية")
    
    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "السنة الدراسية"
        verbose_name_plural = "السنوات الدراسية"

class Grade(BaseModel):
    """Grade levels like 'العاشر', 'الحادي عشر', etc."""
    name = models.CharField(max_length=50, verbose_name="اسم الصف")
    level = models.IntegerField(verbose_name="مستوى الصف")  # 10, 11, 12
    description = models.TextField(blank=True, verbose_name="وصف الصف")
    
    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "الصف الدراسي"
        verbose_name_plural = "الصفوف الدراسية"
        ordering = ['level']

class SchoolClass(BaseModel):
    """Specific class like 'العاشر أ', 'العاشر ب'"""
    name = models.CharField(max_length=50, verbose_name="اسم الفصل")  # e.g., "العاشر أ"
    grade = models.ForeignKey(Grade, on_delete=models.CASCADE, verbose_name="الصف")
    academic_year = models.ForeignKey(AcademicYear, on_delete=models.CASCADE, verbose_name="السنة الدراسية")
    capacity = models.IntegerField(default=30, verbose_name="سعة الفصل")
    classroom_number = models.CharField(max_length=20, blank=True, verbose_name="رقم الفصل")
    
    def __str__(self):
        return f"{self.name} - {self.academic_year.name}"
    
    class Meta:
        verbose_name = "الفصل"
        verbose_name_plural = "الفصول"

class Subject(BaseModel):
    """Academic subjects"""
    name = models.CharField(max_length=100, verbose_name="اسم المادة")
    code = models.CharField(max_length=10, unique=True, verbose_name="رمز المادة")
    description = models.TextField(blank=True, verbose_name="وصف المادة")
    credit_hours = models.IntegerField(default=3, verbose_name="عدد الساعات")
    grades = models.ManyToManyField(Grade, verbose_name="الصفوف المطبقة")
    
    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "المادة"
        verbose_name_plural = "المواد"

class UserProfile(BaseModel):
    """Extended user profile for all users"""
    user = models.OneToOneField(User, on_delete=models.CASCADE, verbose_name="المستخدم")
    
    # Personal Information
    arabic_first_name = models.CharField(max_length=50, verbose_name="الاسم الأول بالعربية")
    arabic_last_name = models.CharField(max_length=50, verbose_name="اسم العائلة بالعربية")
    national_id = models.CharField(max_length=20, unique=True, verbose_name="رقم الهوية")
    phone = models.CharField(max_length=20, verbose_name="رقم الهاتف")
    address = models.TextField(verbose_name="العنوان")
    date_of_birth = models.DateField(verbose_name="تاريخ الميلاد")
    gender = models.CharField(max_length=10, choices=[('male', 'ذكر'), ('female', 'أنثى')], verbose_name="الجنس")
    
    # System Information
    role = models.CharField(max_length=20, choices=[
        ('admin', 'مدير'),
        ('teacher', 'مدرس'),
        ('student', 'طالب')
    ], verbose_name="الدور")
    is_active = models.BooleanField(default=True, verbose_name="نشط")
    profile_picture = models.URLField(blank=True, null=True, verbose_name="صورة الملف الشخصي")
    
    # Optional: Keep for migration purposes, but make nullable
    supabase_user_id = models.UUIDField(unique=True, null=True, blank=True, verbose_name="معرف Supabase (اختياري)")
    
    def __str__(self):
        return f"{self.arabic_first_name} {self.arabic_last_name}"
    
    class Meta:
        verbose_name = "الملف الشخصي"
        verbose_name_plural = "الملفات الشخصية"

class Teacher(BaseModel):
    """Teacher-specific information"""
    user_profile = models.OneToOneField(UserProfile, on_delete=models.CASCADE, verbose_name="الملف الشخصي")
    employee_id = models.CharField(max_length=20, unique=True, verbose_name="الرقم الوظيفي")
    specialization = models.CharField(max_length=100, verbose_name="التخصص")
    qualification = models.CharField(max_length=100, verbose_name="المؤهل")
    experience_years = models.IntegerField(default=0, verbose_name="سنوات الخبرة")
    hire_date = models.DateField(verbose_name="تاريخ التوظيف")
    salary = models.DecimalField(max_digits=10, decimal_places=2, verbose_name="الراتب")
    subjects = models.ManyToManyField(Subject, verbose_name="المواد المُدرَّسة")
    classes = models.ManyToManyField(SchoolClass, blank=True, verbose_name="الفصول المُدرَّسة")
    
    def __str__(self):
        return f"د. {self.user_profile.arabic_first_name} {self.user_profile.arabic_last_name}"
    
    class Meta:
        verbose_name = "المدرس"
        verbose_name_plural = "المدرسون"

class Student(BaseModel):
    """Student-specific information"""
    user_profile = models.OneToOneField(UserProfile, on_delete=models.CASCADE, verbose_name="الملف الشخصي")
    student_id = models.CharField(max_length=20, unique=True, verbose_name="رقم الطالب")
    school_class = models.ForeignKey(SchoolClass, on_delete=models.CASCADE, verbose_name="الفصل")
    enrollment_date = models.DateField(verbose_name="تاريخ التسجيل")
    guardian_name = models.CharField(max_length=100, verbose_name="اسم ولي الأمر")
    guardian_phone = models.CharField(max_length=20, verbose_name="هاتف ولي الأمر")
    guardian_email = models.EmailField(blank=True, verbose_name="بريد ولي الأمر")
    guardian_relationship = models.CharField(max_length=50, default="الوالد", verbose_name="صلة القرابة")
    emergency_contact = models.CharField(max_length=100, verbose_name="جهة الاتصال الطارئ")
    emergency_phone = models.CharField(max_length=20, verbose_name="هاتف الطوارئ")
    medical_notes = models.TextField(blank=True, verbose_name="ملاحظات طبية")
    
    def __str__(self):
        return f"{self.user_profile.arabic_first_name} {self.user_profile.arabic_last_name} - {self.student_id}"
    
    class Meta:
        verbose_name = "الطالب"
        verbose_name_plural = "الطلاب"

class Lesson(BaseModel):
    """Lessons/Materials uploaded by teachers"""
    title = models.CharField(max_length=200, verbose_name="عنوان الدرس")
    description = models.TextField(verbose_name="وصف الدرس")
    subject = models.ForeignKey(Subject, on_delete=models.CASCADE, verbose_name="المادة")
    teacher = models.ForeignKey(Teacher, on_delete=models.CASCADE, verbose_name="المدرس")
    classes = models.ManyToManyField(SchoolClass, verbose_name="الفصول المستهدفة")
    
    # File Information
    file_url = models.URLField(verbose_name="رابط الملف")
    file_type = models.CharField(max_length=20, choices=[
        ('pdf', 'PDF'),
        ('ppt', 'PowerPoint'),
        ('doc', 'Word'),
        ('video', 'فيديو'),
        ('link', 'رابط خارجي')
    ], verbose_name="نوع الملف")
    file_size = models.BigIntegerField(blank=True, null=True, verbose_name="حجم الملف")
    
    # Status
    is_published = models.BooleanField(default=True, verbose_name="منشور")
    publish_date = models.DateTimeField(auto_now_add=True, verbose_name="تاريخ النشر")
    
    def __str__(self):
        return f"{self.title} - {self.subject.name}"
    
    class Meta:
        verbose_name = "الدرس"
        verbose_name_plural = "الدروس"
        ordering = ['-publish_date']

class Attendance(BaseModel):
    """Student attendance records"""
    student = models.ForeignKey(Student, on_delete=models.CASCADE, verbose_name="الطالب")
    school_class = models.ForeignKey(SchoolClass, on_delete=models.CASCADE, verbose_name="الفصل")
    teacher = models.ForeignKey(Teacher, on_delete=models.CASCADE, verbose_name="المدرس")
    subject = models.ForeignKey(Subject, on_delete=models.CASCADE, verbose_name="المادة")
    date = models.DateField(verbose_name="التاريخ")
    
    status = models.CharField(max_length=10, choices=[
        ('present', 'حاضر'),
        ('absent', 'غائب'),
        ('late', 'متأخر'),
        ('excused', 'غياب بعذر')
    ], verbose_name="الحالة")
    
    notes = models.TextField(blank=True, verbose_name="ملاحظات")
    recorded_at = models.DateTimeField(auto_now_add=True, verbose_name="وقت التسجيل")
    
    def __str__(self):
        return f"{self.student.user_profile.arabic_first_name} - {self.date} - {self.status}"
    
    class Meta:
        verbose_name = "الحضور"
        verbose_name_plural = "سجلات الحضور"
        unique_together = ['student', 'date', 'subject']

class ExamType(BaseModel):
    """Types of exams"""
    name = models.CharField(max_length=50, verbose_name="نوع الاختبار")
    weight_percentage = models.DecimalField(max_digits=5, decimal_places=2, verbose_name="الوزن النسبي")
    max_score = models.DecimalField(max_digits=5, decimal_places=2, default=100, verbose_name="الدرجة العظمى")
    
    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "نوع الاختبار"
        verbose_name_plural = "أنواع الاختبارات"

class Grade_Score(BaseModel):
    """Student grades/scores"""
    student = models.ForeignKey(Student, on_delete=models.CASCADE, verbose_name="الطالب")
    subject = models.ForeignKey(Subject, on_delete=models.CASCADE, verbose_name="المادة")
    teacher = models.ForeignKey(Teacher, on_delete=models.CASCADE, verbose_name="المدرس")
    exam_type = models.ForeignKey(ExamType, on_delete=models.CASCADE, verbose_name="نوع الاختبار")
    academic_year = models.ForeignKey(AcademicYear, on_delete=models.CASCADE, verbose_name="السنة الدراسية")
    
    score = models.DecimalField(max_digits=5, decimal_places=2, 
                               validators=[MinValueValidator(0), MaxValueValidator(100)], 
                               verbose_name="الدرجة")
    max_score = models.DecimalField(max_digits=5, decimal_places=2, default=100, verbose_name="الدرجة العظمى")
    percentage = models.DecimalField(max_digits=5, decimal_places=2, verbose_name="النسبة المئوية")
    
    grade_letter = models.CharField(max_length=2, choices=[
        ('A+', 'ممتاز مرتفع'),
        ('A', 'ممتاز'),
        ('B+', 'جيد جداً مرتفع'),
        ('B', 'جيد جداً'),
        ('C+', 'جيد مرتفع'),
        ('C', 'جيد'),
        ('D', 'مقبول'),
        ('F', 'راسب')
    ], verbose_name="التقدير")
    
    notes = models.TextField(blank=True, verbose_name="ملاحظات")
    exam_date = models.DateField(verbose_name="تاريخ الاختبار")
    
    def save(self, *args, **kwargs):
        # Calculate percentage
        self.percentage = (self.score / self.max_score) * 100
        
        # Calculate grade letter
        if self.percentage >= 95:
            self.grade_letter = 'A+'
        elif self.percentage >= 90:
            self.grade_letter = 'A'
        elif self.percentage >= 85:
            self.grade_letter = 'B+'
        elif self.percentage >= 80:
            self.grade_letter = 'B'
        elif self.percentage >= 75:
            self.grade_letter = 'C+'
        elif self.percentage >= 70:
            self.grade_letter = 'C'
        elif self.percentage >= 60:
            self.grade_letter = 'D'
        else:
            self.grade_letter = 'F'
            
        super().save(*args, **kwargs)
    
    def __str__(self):
        return f"{self.student.user_profile.arabic_first_name} - {self.subject.name} - {self.score}"
    
    class Meta:
        verbose_name = "الدرجة"
        verbose_name_plural = "الدرجات"

class Announcement(BaseModel):
    """School announcements"""
    title = models.CharField(max_length=200, verbose_name="عنوان الإعلان")
    content = models.TextField(verbose_name="محتوى الإعلان")
    author = models.ForeignKey(Teacher, on_delete=models.CASCADE, verbose_name="المؤلف")
    
    announcement_type = models.CharField(max_length=20, choices=[
        ('general', 'عام'),
        ('exam', 'اختبار'),
        ('homework', 'واجب'),
        ('holiday', 'إجازة'),
        ('important', 'مهم'),
        ('urgent', 'عاجل')
    ], default='general', verbose_name="نوع الإعلان")
    
    # Target audience
    target_classes = models.ManyToManyField(SchoolClass, blank=True, verbose_name="الفصول المستهدفة")
    target_all_school = models.BooleanField(default=False, verbose_name="جميع المدرسة")
    
    # Status and timing
    is_published = models.BooleanField(default=True, verbose_name="منشور")
    is_urgent = models.BooleanField(default=False, verbose_name="عاجل")
    publish_date = models.DateTimeField(auto_now_add=True, verbose_name="تاريخ النشر")
    expiry_date = models.DateTimeField(blank=True, null=True, verbose_name="تاريخ انتهاء الصلاحية")
    
    def __str__(self):
        return self.title
    
    class Meta:
        verbose_name = "الإعلان"
        verbose_name_plural = "الإعلانات"
        ordering = ['-publish_date']

class Schedule(BaseModel):
    """Class schedules"""
    school_class = models.ForeignKey(SchoolClass, on_delete=models.CASCADE, verbose_name="الفصل")
    subject = models.ForeignKey(Subject, on_delete=models.CASCADE, verbose_name="المادة")
    teacher = models.ForeignKey(Teacher, on_delete=models.CASCADE, verbose_name="المدرس")
    
    day_of_week = models.CharField(max_length=10, choices=[
        ('sunday', 'الأحد'),
        ('monday', 'الاثنين'),
        ('tuesday', 'الثلاثاء'),
        ('wednesday', 'الأربعاء'),
        ('thursday', 'الخميس')
    ], verbose_name="يوم الأسبوع")
    
    start_time = models.TimeField(verbose_name="وقت البداية")
    end_time = models.TimeField(verbose_name="وقت النهاية")
    classroom = models.CharField(max_length=20, verbose_name="رقم الفصل")
    
    def __str__(self):
        return f"{self.school_class.name} - {self.subject.name} - {self.day_of_week}"
    
    class Meta:
        verbose_name = "الجدول"
        verbose_name_plural = "الجداول"
        unique_together = ['school_class', 'day_of_week', 'start_time']

class Report(BaseModel):
    """System reports"""
    title = models.CharField(max_length=200, verbose_name="عنوان التقرير")
    report_type = models.CharField(max_length=20, choices=[
        ('attendance', 'الحضور'),
        ('grades', 'الدرجات'),
        ('students', 'الطلاب'),
        ('teachers', 'المدرسين'),
        ('financial', 'مالي'),
        ('general', 'عام')
    ], verbose_name="نوع التقرير")
    
    generated_by = models.ForeignKey(UserProfile, on_delete=models.CASCADE, verbose_name="مُنشئ التقرير")
    
    # Filters
    academic_year = models.ForeignKey(AcademicYear, on_delete=models.CASCADE, verbose_name="السنة الدراسية")
    school_classes = models.ManyToManyField(SchoolClass, blank=True, verbose_name="الفصول")
    subjects = models.ManyToManyField(Subject, blank=True, verbose_name="المواد")
    date_from = models.DateField(blank=True, null=True, verbose_name="من تاريخ")
    date_to = models.DateField(blank=True, null=True, verbose_name="إلى تاريخ")
    
    # Status
    status = models.CharField(max_length=20, choices=[
        ('pending', 'قيد المعالجة'),
        ('completed', 'مكتمل'),
        ('failed', 'فشل')
    ], default='pending', verbose_name="الحالة")
    
    file_url = models.URLField(blank=True, null=True, verbose_name="رابط الملف")
    file_format = models.CharField(max_length=10, choices=[
        ('pdf', 'PDF'),
        ('excel', 'Excel'),
        ('csv', 'CSV')
    ], default='pdf', verbose_name="تنسيق الملف")
    
    def __str__(self):
        return self.title
    
    class Meta:
        verbose_name = "التقرير"
        verbose_name_plural = "التقارير"
        ordering = ['-created_at']