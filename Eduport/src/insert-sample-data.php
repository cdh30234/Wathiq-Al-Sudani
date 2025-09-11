<?php
/**
 * إدخال البيانات التجريبية
 * Sample Data Insertion Script
 */

require_once 'database-config.php';

try {
    $db = DatabaseConnection::getInstance()->getConnection();
    
    echo "بدء إدخال البيانات التجريبية...\n";
    
    // إدراج السنة الدراسية
    $sql = "INSERT INTO academic_years (id, name, start_date, end_date, is_current) 
            VALUES (uuid_generate_v4(), '2024-2025', '2024-09-01', '2025-06-30', true)
            ON CONFLICT DO NOTHING";
    $db->exec($sql);
    
    // إدراج الصفوف الدراسية
    $grades_sql = "INSERT INTO grades (id, name, level) VALUES 
                   (uuid_generate_v4(), 'الثالث الثانوي', 12),
                   (uuid_generate_v4(), 'الثاني الثانوي', 11),
                   (uuid_generate_v4(), 'الأول الثانوي', 10)
                   ON CONFLICT DO NOTHING";
    $db->exec($grades_sql);
    
    // إدراج المواد
    $subjects_sql = "INSERT INTO subjects (id, name, code, credit_hours) VALUES 
                     (uuid_generate_v4(), 'الرياضيات', 'MATH', 4),
                     (uuid_generate_v4(), 'الفيزياء', 'PHYS', 3),
                     (uuid_generate_v4(), 'الكيمياء', 'CHEM', 3),
                     (uuid_generate_v4(), 'اللغة العربية', 'ARAB', 4),
                     (uuid_generate_v4(), 'اللغة الإنجليزية', 'ENG', 3),
                     (uuid_generate_v4(), 'التاريخ', 'HIST', 2),
                     (uuid_generate_v4(), 'الجغرافيا', 'GEO', 2)
                     ON CONFLICT (code) DO NOTHING";
    $db->exec($subjects_sql);
    
    // إدراج مدرس تجريبي
    $teacher_profile_id = uuid_generate_v4();
    $teacher_id = uuid_generate_v4();
    
    // إدراج الملف الشخصي للمدرس
    $profile_sql = "INSERT INTO user_profiles (id, supabase_user_id, arabic_first_name, arabic_last_name, 
                    national_id, phone, address, date_of_birth, gender, role, profile_picture) VALUES 
                    (:profile_id, uuid_generate_v4(), 'أحمد', 'محمد السالم', '1234567890', '+966501234567', 
                    'الرياض، المملكة العربية السعودية', '1985-05-15', 'male', 'teacher', 
                    'assets/images/avatar/teacher-01.jpg')
                    ON CONFLICT (national_id) DO NOTHING";
    
    $stmt = $db->prepare($profile_sql);
    $stmt->execute(['profile_id' => $teacher_profile_id]);
    
    // إدراج بيانات المدرس
    $teacher_sql = "INSERT INTO teachers (id, user_profile_id, employee_id, specialization, 
                    qualification, experience_years, hire_date, salary) VALUES 
                    (:teacher_id, :profile_id, 'T001', 'الرياضيات والفيزياء', 'ماجستير في الرياضيات', 
                    8, '2016-09-01', 12000.00)
                    ON CONFLICT (employee_id) DO NOTHING";
    
    $stmt = $db->prepare($teacher_sql);
    $stmt->execute([
        'teacher_id' => $teacher_id,
        'profile_id' => $teacher_profile_id
    ]);
    
    // الحصول على معرفات المواد
    $math_subject = $db->query("SELECT id FROM subjects WHERE code = 'MATH'")->fetch()['id'];
    $physics_subject = $db->query("SELECT id FROM subjects WHERE code = 'PHYS'")->fetch()['id'];
    
    // ربط المدرس بالمواد
    $teacher_subjects_sql = "INSERT INTO teacher_subjects (id, teacher_id, subject_id) VALUES 
                            (uuid_generate_v4(), :teacher_id, :math_subject),
                            (uuid_generate_v4(), :teacher_id, :physics_subject)
                            ON CONFLICT DO NOTHING";
    
    $stmt = $db->prepare($teacher_subjects_sql);
    $stmt->execute([
        'teacher_id' => $teacher_id,
        'math_subject' => $math_subject,
        'physics_subject' => $physics_subject
    ]);
    
    // إنشاء فصل دراسي
    $grade_id = $db->query("SELECT id FROM grades WHERE name = 'الثالث الثانوي'")->fetch()['id'];
    $academic_year_id = $db->query("SELECT id FROM academic_years WHERE is_current = true")->fetch()['id'];
    $class_id = uuid_generate_v4();
    
    $class_sql = "INSERT INTO school_classes (id, name, grade_id, academic_year_id, capacity, classroom_number) 
                  VALUES (:class_id, 'ثالث/أ', :grade_id, :academic_year_id, 30, 'A101')
                  ON CONFLICT DO NOTHING";
    
    $stmt = $db->prepare($class_sql);
    $stmt->execute([
        'class_id' => $class_id,
        'grade_id' => $grade_id,
        'academic_year_id' => $academic_year_id
    ]);
    
    // ربط المدرس بالفصل
    $teacher_class_sql = "INSERT INTO teacher_classes (id, teacher_id, class_id) 
                         VALUES (uuid_generate_v4(), :teacher_id, :class_id)
                         ON CONFLICT DO NOTHING";
    
    $stmt = $db->prepare($teacher_class_sql);
    $stmt->execute([
        'teacher_id' => $teacher_id,
        'class_id' => $class_id
    ]);
    
    // إدراج طلاب تجريبيين
    for ($i = 1; $i <= 5; $i++) {
        $student_profile_id = uuid_generate_v4();
        $student_id = uuid_generate_v4();
        
        // ملف الطالب الشخصي
        $student_profile_sql = "INSERT INTO user_profiles (id, supabase_user_id, arabic_first_name, arabic_last_name, 
                               national_id, phone, date_of_birth, gender, role, profile_picture) VALUES 
                               (:profile_id, uuid_generate_v4(), :first_name, :last_name, :national_id, :phone, 
                               '2006-01-0{$i}', 'male', 'student', 'assets/images/avatar/student-0{$i}.jpg')
                               ON CONFLICT (national_id) DO NOTHING";
        
        $stmt = $db->prepare($student_profile_sql);
        $stmt->execute([
            'profile_id' => $student_profile_id,
            'first_name' => "طالب{$i}",
            'last_name' => "اختبار",
            'national_id' => "200600000{$i}",
            'phone' => "+96650000000{$i}"
        ]);
        
        // بيانات الطالب
        $student_sql = "INSERT INTO students (id, user_profile_id, student_id, school_class_id, 
                       enrollment_date, guardian_name, guardian_phone, guardian_email) VALUES 
                       (:student_id, :profile_id, :student_number, :class_id, '2024-09-01', 
                       'ولي أمر الطالب {$i}', '+96650999000{$i}', 'guardian{$i}@example.com')
                       ON CONFLICT (student_id) DO NOTHING";
        
        $stmt = $db->prepare($student_sql);
        $stmt->execute([
            'student_id' => $student_id,
            'profile_id' => $student_profile_id,
            'student_number' => "S202400{$i}",
            'class_id' => $class_id
        ]);
    }
    
    // إدراج درس تجريبي
    $lesson_sql = "INSERT INTO lessons (id, title, description, subject_id, teacher_id, file_type, is_published) 
                   VALUES (uuid_generate_v4(), 'مقدمة في التفاضل والتكامل', 'شرح مفصل لأساسيات التفاضل والتكامل', 
                   :math_subject, :teacher_id, 'video', true)
                   ON CONFLICT DO NOTHING";
    
    $stmt = $db->prepare($lesson_sql);
    $stmt->execute([
        'math_subject' => $math_subject,
        'teacher_id' => $teacher_id
    ]);
    
    // إدراج إعلان تجريبي
    $announcement_sql = "INSERT INTO announcements (id, title, content, author_id, announcement_type, is_urgent) 
                        VALUES (uuid_generate_v4(), 'امتحان الرياضيات الشهري', 'سيعقد امتحان الرياضيات الشهري يوم الأحد القادم في تمام الساعة 8 صباحاً', 
                        :teacher_id, 'exam', true)
                        ON CONFLICT DO NOTHING";
    
    $stmt = $db->prepare($announcement_sql);
    $stmt->execute(['teacher_id' => $teacher_id]);
    
    // حفظ معرف المدرس للاستخدام
    file_put_contents('current_teacher_id.txt', $teacher_id);
    
    echo "تم إدخال البيانات التجريبية بنجاح!\n";
    echo "معرف المدرس: {$teacher_id}\n";
    
} catch (Exception $e) {
    echo "خطأ في إدخال البيانات: " . $e->getMessage() . "\n";
}

/**
 * دالة لتوليد UUID
 */
function uuid_generate_v4() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}
?>
