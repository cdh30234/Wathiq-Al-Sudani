<?php
// Populate Database with Sample Data
// Path: /config/populate_database.php

require_once 'database.php';

try {
    echo "<h2>ملء قاعدة البيانات بالبيانات التجريبية...</h2>\n";
    
    // 1. Insert School
    echo "<p>إضافة بيانات المدرسة...</p>\n";
    $school_id = insertData($pdo, 'schools', [
        'name' => 'متوسطة الشهيد كاظم جلاب الحيدري المختلطة',
        'address' => 'البصرة، العراق',
        'phone' => '+964-7801234567',
        'email' => 'info@kazem-school.edu.iq',
        'principal_name' => 'أ.د. محمد علي الحيدري',
        'logo' => 'assets/images/logo-sms.svg'
    ]);
    echo "<p style='color: green;'>✓ تم إضافة بيانات المدرسة</p>\n";

    // 2. Insert Academic Year
    echo "<p>إضافة السنة الدراسية...</p>\n";
    $academic_year_id = insertData($pdo, 'academic_years', [
        'name' => '2024-2025',
        'start_date' => '2024-09-01',
        'end_date' => '2025-06-30',
        'is_current' => 1
    ]);
    echo "<p style='color: green;'>✓ تم إضافة السنة الدراسية</p>\n";

    // 3. Insert Grades
    echo "<p>إضافة الصفوف الدراسية...</p>\n";
    $grades = [
        ['name' => 'الأول متوسط', 'level' => 1, 'description' => 'الصف الأول من المرحلة المتوسطة'],
        ['name' => 'الثاني متوسط', 'level' => 2, 'description' => 'الصف الثاني من المرحلة المتوسطة'],
        ['name' => 'الثالث متوسط', 'level' => 3, 'description' => 'الصف الثالث من المرحلة المتوسطة']
    ];
    
    $grade_ids = [];
    foreach ($grades as $grade) {
        $grade_id = insertData($pdo, 'grades', $grade);
        $grade_ids[$grade['level']] = $grade_id;
    }
    echo "<p style='color: green;'>✓ تم إضافة الصفوف الدراسية</p>\n";

    // 4. Insert School Classes
    echo "<p>إضافة الفصول...</p>\n";
    $classes = [
        // First Grade Classes
        ['name' => 'الأول متوسط أ', 'grade_id' => $grade_ids[1], 'classroom_number' => '101'],
        ['name' => 'الأول متوسط ب', 'grade_id' => $grade_ids[1], 'classroom_number' => '102'],
        // Second Grade Classes
        ['name' => 'الثاني متوسط أ', 'grade_id' => $grade_ids[2], 'classroom_number' => '201'],
        ['name' => 'الثاني متوسط ب', 'grade_id' => $grade_ids[2], 'classroom_number' => '202'],
        // Third Grade Classes
        ['name' => 'الثالث متوسط أ', 'grade_id' => $grade_ids[3], 'classroom_number' => '301'],
        ['name' => 'الثالث متوسط ب', 'grade_id' => $grade_ids[3], 'classroom_number' => '302']
    ];
    
    $class_ids = [];
    foreach ($classes as $class) {
        $class['academic_year_id'] = $academic_year_id;
        $class_id = insertData($pdo, 'school_classes', $class);
        $class_ids[] = $class_id;
    }
    echo "<p style='color: green;'>✓ تم إضافة الفصول</p>\n";

    // 5. Insert Subjects
    echo "<p>إضافة المواد الدراسية...</p>\n";
    $subjects = [
        ['name' => 'اللغة العربية', 'code' => 'AR001', 'description' => 'مادة اللغة العربية والأدب', 'credit_hours' => 6],
        ['name' => 'الرياضيات', 'code' => 'MA001', 'description' => 'مادة الرياضيات', 'credit_hours' => 5],
        ['name' => 'اللغة الإنجليزية', 'code' => 'EN001', 'description' => 'مادة اللغة الإنجليزية', 'credit_hours' => 4],
        ['name' => 'العلوم', 'code' => 'SC001', 'description' => 'مادة العلوم العامة', 'credit_hours' => 4],
        ['name' => 'التاريخ', 'code' => 'HI001', 'description' => 'مادة التاريخ', 'credit_hours' => 3],
        ['name' => 'الجغرافية', 'code' => 'GE001', 'description' => 'مادة الجغرافية', 'credit_hours' => 3],
        ['name' => 'التربية الإسلامية', 'code' => 'IS001', 'description' => 'مادة التربية الإسلامية', 'credit_hours' => 2],
        ['name' => 'التربية الرياضية', 'code' => 'PE001', 'description' => 'مادة التربية الرياضية', 'credit_hours' => 2]
    ];
    
    $subject_ids = [];
    foreach ($subjects as $subject) {
        $subject_id = insertData($pdo, 'subjects', $subject);
        $subject_ids[] = $subject_id;
    }
    echo "<p style='color: green;'>✓ تم إضافة المواد الدراسية</p>\n";

    // 6. Link Subjects with Grades (all subjects for all grades)
    echo "<p>ربط المواد بالصفوف...</p>\n";
    foreach ($subject_ids as $subject_id) {
        foreach ($grade_ids as $grade_id) {
            insertData($pdo, 'subject_grades', [
                'subject_id' => $subject_id,
                'grade_id' => $grade_id
            ]);
        }
    }
    echo "<p style='color: green;'>✓ تم ربط المواد بالصفوف</p>\n";

    // 7. Insert Teachers
    echo "<p>إضافة المدرسين...</p>\n";
    $teachers_data = [
        [
            'profile' => [
                'username' => 'ahmad.teacher',
                'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
                'email' => 'ahmad.teacher@school.edu.iq',
                'arabic_first_name' => 'أحمد',
                'arabic_last_name' => 'محمد الجابري',
                'national_id' => '19801234567',
                'phone' => '+964-7701234567',
                'address' => 'البصرة، حي الحسين',
                'date_of_birth' => '1980-05-15',
                'gender' => 'male',
                'role' => 'teacher'
            ],
            'teacher' => [
                'employee_id' => 'T001',
                'specialization' => 'اللغة العربية',
                'qualification' => 'بكالوريوس آداب - لغة عربية',
                'experience_years' => 15,
                'hire_date' => '2010-09-01',
                'salary' => 800000.00
            ],
            'subjects' => [0] // Arabic
        ],
        [
            'profile' => [
                'username' => 'fatima.teacher',
                'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
                'email' => 'fatima.teacher@school.edu.iq',
                'arabic_first_name' => 'فاطمة',
                'arabic_last_name' => 'علي الموسوي',
                'national_id' => '19851234568',
                'phone' => '+964-7701234568',
                'address' => 'البصرة، حي الجمعيات',
                'date_of_birth' => '1985-03-22',
                'gender' => 'female',
                'role' => 'teacher'
            ],
            'teacher' => [
                'employee_id' => 'T002',
                'specialization' => 'الرياضيات',
                'qualification' => 'بكالوريوس علوم - رياضيات',
                'experience_years' => 10,
                'hire_date' => '2015-09-01',
                'salary' => 750000.00
            ],
            'subjects' => [1] // Math
        ],
        [
            'profile' => [
                'username' => 'omar.teacher',
                'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
                'email' => 'omar.teacher@school.edu.iq',
                'arabic_first_name' => 'عمر',
                'arabic_last_name' => 'حسن البصري',
                'national_id' => '19821234569',
                'phone' => '+964-7701234569',
                'address' => 'البصرة، حي الخليج العربي',
                'date_of_birth' => '1982-11-10',
                'gender' => 'male',
                'role' => 'teacher'
            ],
            'teacher' => [
                'employee_id' => 'T003',
                'specialization' => 'اللغة الإنجليزية',
                'qualification' => 'بكالوريوس آداب - لغة إنجليزية',
                'experience_years' => 12,
                'hire_date' => '2012-09-01',
                'salary' => 780000.00
            ],
            'subjects' => [2] // English
        ]
    ];
    
    $teacher_ids = [];
    foreach ($teachers_data as $teacher_data) {
        // Insert user profile
        $profile_id = insertData($pdo, 'user_profiles', $teacher_data['profile']);
        
        // Insert teacher
        $teacher_data['teacher']['user_profile_id'] = $profile_id;
        $teacher_id = insertData($pdo, 'teachers', $teacher_data['teacher']);
        $teacher_ids[] = $teacher_id;
        
        // Link teacher with subjects
        foreach ($teacher_data['subjects'] as $subject_index) {
            insertData($pdo, 'teacher_subjects', [
                'teacher_id' => $teacher_id,
                'subject_id' => $subject_ids[$subject_index]
            ]);
        }
        
        // Link teacher with classes (first 2 classes for demonstration)
        for ($i = 0; $i < min(2, count($class_ids)); $i++) {
            foreach ($teacher_data['subjects'] as $subject_index) {
                insertData($pdo, 'teacher_classes', [
                    'teacher_id' => $teacher_id,
                    'school_class_id' => $class_ids[$i],
                    'subject_id' => $subject_ids[$subject_index]
                ]);
            }
        }
    }
    echo "<p style='color: green;'>✓ تم إضافة المدرسين</p>\n";

    // 8. Insert Students
    echo "<p>إضافة الطلاب...</p>\n";
    $students_data = [
        [
            'profile' => [
                'username' => 'ali.student',
                'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
                'email' => 'ali.student@school.edu.iq',
                'arabic_first_name' => 'علي',
                'arabic_last_name' => 'أحمد المحمداوي',
                'national_id' => '20091234567',
                'phone' => '+964-7801234567',
                'address' => 'البصرة، حي الحسين',
                'date_of_birth' => '2009-08-15',
                'gender' => 'male',
                'role' => 'student'
            ],
            'student' => [
                'student_id' => 'S2024001',
                'school_class_id' => $class_ids[0], // First class
                'enrollment_date' => '2024-09-01',
                'guardian_name' => 'أحمد محمد المحمداوي',
                'guardian_phone' => '+964-7701234567',
                'guardian_email' => 'ahmad.parent@email.com',
                'guardian_relationship' => 'الوالد',
                'emergency_contact' => 'سارة أحمد المحمداوي - +964-7801234568'
            ]
        ],
        [
            'profile' => [
                'username' => 'sara.student',
                'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
                'email' => 'sara.student@school.edu.iq',
                'arabic_first_name' => 'سارة',
                'arabic_last_name' => 'محمد الكربلائي',
                'national_id' => '20091234568',
                'phone' => '+964-7801234568',
                'address' => 'البصرة، حي الجمعيات',
                'date_of_birth' => '2009-12-20',
                'gender' => 'female',
                'role' => 'student'
            ],
            'student' => [
                'student_id' => 'S2024002',
                'school_class_id' => $class_ids[0], // First class
                'enrollment_date' => '2024-09-01',
                'guardian_name' => 'محمد علي الكربلائي',
                'guardian_phone' => '+964-7701234568',
                'guardian_email' => 'mohammad.parent@email.com',
                'guardian_relationship' => 'الوالد',
                'emergency_contact' => 'نور محمد الكربلائي - +964-7801234569'
            ]
        ],
        [
            'profile' => [
                'username' => 'hassan.student',
                'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
                'email' => 'hassan.student@school.edu.iq',
                'arabic_first_name' => 'حسن',
                'arabic_last_name' => 'جعفر البصري',
                'national_id' => '20101234569',
                'phone' => '+964-7801234569',
                'address' => 'البصرة، حي الخليج العربي',
                'date_of_birth' => '2010-02-10',
                'gender' => 'male',
                'role' => 'student'
            ],
            'student' => [
                'student_id' => 'S2024003',
                'school_class_id' => $class_ids[2], // Second grade class
                'enrollment_date' => '2024-09-01',
                'guardian_name' => 'جعفر محمد البصري',
                'guardian_phone' => '+964-7701234569',
                'guardian_email' => 'jafar.parent@email.com',
                'guardian_relationship' => 'الوالد',
                'emergency_contact' => 'زينب جعفر البصري - +964-7801234570'
            ]
        ]
    ];
    
    foreach ($students_data as $student_data) {
        // Insert user profile
        $profile_id = insertData($pdo, 'user_profiles', $student_data['profile']);
        
        // Insert student
        $student_data['student']['user_profile_id'] = $profile_id;
        insertData($pdo, 'students', $student_data['student']);
    }
    echo "<p style='color: green;'>✓ تم إضافة الطلاب</p>\n";

    echo "<h3 style='color: green;'>🎉 تم ملء قاعدة البيانات بالبيانات التجريبية بنجاح!</h3>\n";
    echo "<hr>";
    echo "<h4>بيانات الدخول للمدرسين:</h4>";
    echo "<ul>";
    echo "<li><strong>أحمد محمد الجابري (مدرس عربي):</strong> Username: ahmad.teacher | Password: 123456</li>";
    echo "<li><strong>فاطمة علي الموسوي (مدرسة رياضيات):</strong> Username: fatima.teacher | Password: 123456</li>";
    echo "<li><strong>عمر حسن البصري (مدرس إنجليزي):</strong> Username: omar.teacher | Password: 123456</li>";
    echo "</ul>";
    
} catch (Exception $e) {
    echo "<h3 style='color: red;'>❌ خطأ في ملء قاعدة البيانات:</h3>\n";
    echo "<p style='color: red;'>" . $e->getMessage() . "</p>\n";
}

?>
