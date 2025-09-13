<?php
// Database Schema Creation
// Path: /config/create_database.php

require_once 'database.php';

// SQL to create tables
$tables = [
    // Schools table
    'schools' => "
        CREATE TABLE IF NOT EXISTS schools (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            name VARCHAR(255) NOT NULL COMMENT 'اسم المدرسة',
            address TEXT NOT NULL COMMENT 'العنوان',
            phone VARCHAR(20) NOT NULL COMMENT 'رقم الهاتف',
            email VARCHAR(255) NOT NULL COMMENT 'البريد الإلكتروني',
            principal_name VARCHAR(100) NOT NULL COMMENT 'اسم المدير',
            logo VARCHAR(500) NULL COMMENT 'شعار المدرسة',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول المدارس'
    ",

    // Academic Years table
    'academic_years' => "
        CREATE TABLE IF NOT EXISTS academic_years (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            name VARCHAR(50) NOT NULL COMMENT 'اسم السنة الدراسية',
            start_date DATE NOT NULL COMMENT 'تاريخ البداية',
            end_date DATE NOT NULL COMMENT 'تاريخ النهاية',
            is_current BOOLEAN DEFAULT FALSE COMMENT 'السنة الحالية',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول السنوات الدراسية'
    ",

    // Grades table
    'grades' => "
        CREATE TABLE IF NOT EXISTS grades (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            name VARCHAR(50) NOT NULL COMMENT 'اسم الصف',
            level INT NOT NULL COMMENT 'مستوى الصف',
            description TEXT NULL COMMENT 'وصف الصف',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول الصفوف الدراسية'
    ",

    // School Classes table
    'school_classes' => "
        CREATE TABLE IF NOT EXISTS school_classes (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            name VARCHAR(50) NOT NULL COMMENT 'اسم الفصل',
            grade_id VARCHAR(36) NOT NULL COMMENT 'معرف الصف',
            academic_year_id VARCHAR(36) NOT NULL COMMENT 'معرف السنة الدراسية',
            capacity INT DEFAULT 30 COMMENT 'سعة الفصل',
            classroom_number VARCHAR(20) NULL COMMENT 'رقم الفصل',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (grade_id) REFERENCES grades(id) ON DELETE CASCADE,
            FOREIGN KEY (academic_year_id) REFERENCES academic_years(id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول الفصول الدراسية'
    ",

    // Subjects table
    'subjects' => "
        CREATE TABLE IF NOT EXISTS subjects (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            name VARCHAR(100) NOT NULL COMMENT 'اسم المادة',
            code VARCHAR(10) UNIQUE NOT NULL COMMENT 'رمز المادة',
            description TEXT NULL COMMENT 'وصف المادة',
            credit_hours INT DEFAULT 3 COMMENT 'عدد الساعات',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول المواد الدراسية'
    ",

    // Subject Grades (Many-to-Many)
    'subject_grades' => "
        CREATE TABLE IF NOT EXISTS subject_grades (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            subject_id VARCHAR(36) NOT NULL,
            grade_id VARCHAR(36) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
            FOREIGN KEY (grade_id) REFERENCES grades(id) ON DELETE CASCADE,
            UNIQUE KEY unique_subject_grade (subject_id, grade_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول ربط المواد بالصفوف'
    ",

    // User Profiles table
    'user_profiles' => "
        CREATE TABLE IF NOT EXISTS user_profiles (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            username VARCHAR(50) UNIQUE NOT NULL COMMENT 'اسم المستخدم',
            password_hash VARCHAR(255) NOT NULL COMMENT 'كلمة المرور المُشفرة',
            email VARCHAR(255) UNIQUE NOT NULL COMMENT 'البريد الإلكتروني',
            arabic_first_name VARCHAR(50) NOT NULL COMMENT 'الاسم الأول بالعربية',
            arabic_last_name VARCHAR(50) NOT NULL COMMENT 'اسم العائلة بالعربية',
            national_id VARCHAR(20) UNIQUE NOT NULL COMMENT 'رقم الهوية',
            phone VARCHAR(20) NOT NULL COMMENT 'رقم الهاتف',
            address TEXT NOT NULL COMMENT 'العنوان',
            date_of_birth DATE NOT NULL COMMENT 'تاريخ الميلاد',
            gender ENUM('male', 'female') NOT NULL COMMENT 'الجنس',
            role ENUM('admin', 'teacher', 'student') NOT NULL COMMENT 'الدور',
            is_active BOOLEAN DEFAULT TRUE COMMENT 'نشط',
            profile_picture VARCHAR(500) NULL COMMENT 'صورة الملف الشخصي',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول الملفات الشخصية للمستخدمين'
    ",

    // Teachers table
    'teachers' => "
        CREATE TABLE IF NOT EXISTS teachers (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            user_profile_id VARCHAR(36) NOT NULL COMMENT 'معرف الملف الشخصي',
            employee_id VARCHAR(20) UNIQUE NOT NULL COMMENT 'الرقم الوظيفي',
            specialization VARCHAR(100) NOT NULL COMMENT 'التخصص',
            qualification VARCHAR(100) NOT NULL COMMENT 'المؤهل',
            experience_years INT DEFAULT 0 COMMENT 'سنوات الخبرة',
            hire_date DATE NOT NULL COMMENT 'تاريخ التوظيف',
            salary DECIMAL(10,2) NOT NULL COMMENT 'الراتب',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_profile_id) REFERENCES user_profiles(id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول المدرسين'
    ",

    // Teacher Subjects (Many-to-Many)
    'teacher_subjects' => "
        CREATE TABLE IF NOT EXISTS teacher_subjects (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            teacher_id VARCHAR(36) NOT NULL,
            subject_id VARCHAR(36) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE CASCADE,
            FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
            UNIQUE KEY unique_teacher_subject (teacher_id, subject_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول ربط المدرسين بالمواد'
    ",

    // Teacher Classes (Many-to-Many)
    'teacher_classes' => "
        CREATE TABLE IF NOT EXISTS teacher_classes (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            teacher_id VARCHAR(36) NOT NULL,
            school_class_id VARCHAR(36) NOT NULL,
            subject_id VARCHAR(36) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE CASCADE,
            FOREIGN KEY (school_class_id) REFERENCES school_classes(id) ON DELETE CASCADE,
            FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
            UNIQUE KEY unique_teacher_class_subject (teacher_id, school_class_id, subject_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول ربط المدرسين بالفصول والمواد'
    ",

    // Students table
    'students' => "
        CREATE TABLE IF NOT EXISTS students (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            user_profile_id VARCHAR(36) NOT NULL COMMENT 'معرف الملف الشخصي',
            student_id VARCHAR(20) UNIQUE NOT NULL COMMENT 'رقم الطالب',
            school_class_id VARCHAR(36) NOT NULL COMMENT 'معرف الفصل',
            enrollment_date DATE NOT NULL COMMENT 'تاريخ التسجيل',
            guardian_name VARCHAR(100) NOT NULL COMMENT 'اسم ولي الأمر',
            guardian_phone VARCHAR(20) NOT NULL COMMENT 'هاتف ولي الأمر',
            guardian_email VARCHAR(255) NULL COMMENT 'بريد ولي الأمر',
            guardian_relationship VARCHAR(50) DEFAULT 'الوالد' COMMENT 'صلة القرابة',
            emergency_contact VARCHAR(100) NOT NULL COMMENT 'جهة الاتصال الطارئ',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_profile_id) REFERENCES user_profiles(id) ON DELETE CASCADE,
            FOREIGN KEY (school_class_id) REFERENCES school_classes(id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول الطلاب'
    ",

    // Lessons table
    'lessons' => "
        CREATE TABLE IF NOT EXISTS lessons (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            title VARCHAR(200) NOT NULL COMMENT 'عنوان الدرس',
            description TEXT NULL COMMENT 'وصف الدرس',
            subject_id VARCHAR(36) NOT NULL COMMENT 'معرف المادة',
            school_class_id VARCHAR(36) NOT NULL COMMENT 'معرف الفصل',
            teacher_id VARCHAR(36) NOT NULL COMMENT 'معرف المدرس',
            lesson_date DATE NOT NULL COMMENT 'تاريخ الدرس',
            start_time TIME NOT NULL COMMENT 'وقت البداية',
            end_time TIME NOT NULL COMMENT 'وقت النهاية',
            lesson_order INT NOT NULL COMMENT 'ترتيب الدرس',
            status ENUM('scheduled', 'completed', 'cancelled') DEFAULT 'scheduled' COMMENT 'حالة الدرس',
            notes TEXT NULL COMMENT 'ملاحظات',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
            FOREIGN KEY (school_class_id) REFERENCES school_classes(id) ON DELETE CASCADE,
            FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول الدروس'
    ",

    // Attendance table
    'attendance' => "
        CREATE TABLE IF NOT EXISTS attendance (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            student_id VARCHAR(36) NOT NULL COMMENT 'معرف الطالب',
            lesson_id VARCHAR(36) NOT NULL COMMENT 'معرف الدرس',
            attendance_date DATE NOT NULL COMMENT 'تاريخ الحضور',
            status ENUM('present', 'absent', 'late', 'excused') NOT NULL COMMENT 'حالة الحضور',
            notes TEXT NULL COMMENT 'ملاحظات',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
            FOREIGN KEY (lesson_id) REFERENCES lessons(id) ON DELETE CASCADE,
            UNIQUE KEY unique_student_lesson_date (student_id, lesson_id, attendance_date)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول الحضور والغياب'
    ",

    // Grades/Marks table
    'student_grades' => "
        CREATE TABLE IF NOT EXISTS student_grades (
            id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
            student_id VARCHAR(36) NOT NULL COMMENT 'معرف الطالب',
            subject_id VARCHAR(36) NOT NULL COMMENT 'معرف المادة',
            teacher_id VARCHAR(36) NOT NULL COMMENT 'معرف المدرس',
            grade_type ENUM('quiz', 'midterm', 'final', 'assignment', 'participation') NOT NULL COMMENT 'نوع الدرجة',
            grade_value DECIMAL(5,2) NOT NULL COMMENT 'قيمة الدرجة',
            max_grade DECIMAL(5,2) NOT NULL COMMENT 'الدرجة القصوى',
            grade_date DATE NOT NULL COMMENT 'تاريخ الدرجة',
            notes TEXT NULL COMMENT 'ملاحظات',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
            FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
            FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='جدول درجات الطلاب'
    "
];

try {
    echo "<h2>إنشاء قاعدة البيانات وجداولها...</h2>\n";
    
    foreach ($tables as $tableName => $sql) {
        echo "<p>إنشاء جدول: $tableName</p>\n";
        $pdo->exec($sql);
        echo "<p style='color: green;'>✓ تم إنشاء جدول $tableName بنجاح</p>\n";
    }
    
    echo "<h3 style='color: green;'>✅ تم إنشاء جميع الجداول بنجاح!</h3>\n";
    
} catch (PDOException $e) {
    echo "<h3 style='color: red;'>❌ خطأ في إنشاء الجداول:</h3>\n";
    echo "<p style='color: red;'>" . $e->getMessage() . "</p>\n";
}

?>
