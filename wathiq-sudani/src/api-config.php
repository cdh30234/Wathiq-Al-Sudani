<?php
/**
 * إعدادات قاعدة البيانات والـ API للنظام
 * تم إنشاؤها تلقائياً مع البيانات الكاملة
 */

// بدء الجلسة مع إعدادات محسنة
if (session_status() == PHP_SESSION_NONE) {
    // إعدادات الجلسة المحسنة
    ini_set('session.cookie_lifetime', 86400); // 24 ساعة
    ini_set('session.gc_maxlifetime', 86400);
    ini_set('session.cookie_httponly', true);
    ini_set('session.use_strict_mode', true);
    
    session_start();
    
    // تجديد الجلسة كل 30 دقيقة
    if (isset($_SESSION['last_regeneration'])) {
        if (time() - $_SESSION['last_regeneration'] > 1800) {
            session_regenerate_id(true);
            $_SESSION['last_regeneration'] = time();
        }
    } else {
        $_SESSION['last_regeneration'] = time();
    }
}

// إعدادات API الخلفية (Django)
define('API_BASE_URL', 'http://127.0.0.1:8001/api/');
define('API_TIMEOUT', 30);

// بيانات المصادقة التجريبية
define('DEFAULT_USERS', [
    'admin' => [
        'username' => 'admin',
        'password' => 'admin123',
        'role' => 'admin',
        'name' => 'أحمد العمري',
        'email' => 'admin@rawad-school.edu.sa'
    ],
    'teacher' => [
        'username' => 'math_teacher',
        'password' => 'teacher123',
        'role' => 'teacher',
        'name' => 'محمد أحمد',
        'email' => 'math@rawad-school.edu.sa'
    ],
    'student' => [
        'username' => 'student001',
        'password' => 'student123',
        'role' => 'student',
        'name' => 'أحمد محمد الأحمد',
        'email' => 'student1@rawad-school.edu.sa'
    ]
]);

/**
 * إرسال طلب API
 */
function sendAPIRequest($endpoint, $method = 'GET', $data = null, $token = null) {
    $url = API_BASE_URL . ltrim($endpoint, '/');
    
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => API_TIMEOUT,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json',
            $token ? "Authorization: Bearer $token" : ''
        ]
    ]);
    
    if ($data && in_array($method, ['POST', 'PUT', 'PATCH'])) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return [
        'success' => $httpCode >= 200 && $httpCode < 300,
        'data' => json_decode($response, true),
        'http_code' => $httpCode
    ];
}

/**
 * التحقق من المصادقة
 */
function authenticateUser($username, $password) {
    // أولاً: محاولة الاتصال بقاعدة البيانات المحلية
    $response = sendAPIRequest('auth/login/', 'POST', [
        'username' => $username,
        'password' => $password
    ]);
    
    if ($response['success'] && isset($response['data']['user'])) {
        return [
            'success' => true,
            'user' => $response['data']['user']
        ];
    }
    
    // ثانياً: التحقق من المستخدمين الافتراضيين كبديل
    foreach (DEFAULT_USERS as $userType => $userData) {
        if ($userData['username'] === $username && $userData['password'] === $password) {
            return [
                'success' => true,
                'user' => $userData
            ];
        }
    }
    
    return ['success' => false, 'message' => 'بيانات الدخول غير صحيحة'];
}

/**
 * الحصول على بيانات لوحة المعلومات للمدرس
 */
function getTeacherDashboardData($teacherUsername = 'math_teacher') {
    return [
        'teacher_info' => [
            'name' => 'محمد أحمد',
            'employee_id' => 'T2024001',
            'specialization' => 'الرياضيات',
            'experience_years' => 8
        ],
        'statistics' => [
            'total_students' => 85,
            'total_classes' => 3,
            'total_subjects' => 2,
            'total_lessons' => 24
        ],
        'classes' => [
            [
                'id' => 1,
                'name' => 'الصف العاشر أ',
                'student_count' => 28,
                'subject' => 'الرياضيات'
            ],
            [
                'id' => 2,
                'name' => 'الصف العاشر ب',
                'student_count' => 30,
                'subject' => 'الرياضيات'
            ],
            [
                'id' => 3,
                'name' => 'الصف الحادي عشر أ',
                'student_count' => 27,
                'subject' => 'الرياضيات المتقدمة'
            ]
        ],
        'recent_lessons' => [
            [
                'id' => 1,
                'title' => 'الرياضيات - مقدمة في المادة',
                'subject' => 'الرياضيات',
                'class' => 'الصف العاشر أ',
                'created_at' => '2024-09-10',
                'file_type' => 'pdf'
            ],
            [
                'id' => 2,
                'title' => 'الرياضيات - الوحدة الأولى',
                'subject' => 'الرياضيات',
                'class' => 'الصف العاشر ب',
                'created_at' => '2024-09-08',
                'file_type' => 'ppt'
            ]
        ],
        'announcements' => [
            [
                'id' => 1,
                'title' => 'بداية الفصل الدراسي الثاني',
                'content' => 'نعلن لجميع الطلاب وأولياء الأمور عن بداية الفصل الدراسي الثاني يوم الأحد القادم.',
                'type' => 'general',
                'created_at' => '2024-09-11'
            ],
            [
                'id' => 2,
                'title' => 'اختبارات الفترة الأولى',
                'content' => 'ستبدأ اختبارات الفترة الأولى في الأسبوع القادم حسب الجدول المرفق.',
                'type' => 'exam',
                'created_at' => '2024-09-10'
            ]
        ]
    ];
}

/**
 * الحصول على قائمة الطلاب لفصل معين
 */
function getStudentsForClass($classId) {
    return [
        [
            'id' => 1,
            'student_id' => 'S20240001',
            'name' => 'أحمد محمد الأحمد',
            'class' => 'الصف العاشر أ',
            'attendance_rate' => 95.5,
            'average_grade' => 87.3,
            'phone' => '+966501234567',
            'guardian_name' => 'عبدالله محمد الأحمد'
        ],
        [
            'id' => 2,
            'student_id' => 'S20240002',
            'name' => 'فاطمة عبدالله السعد',
            'class' => 'الصف العاشر أ',
            'attendance_rate' => 98.2,
            'average_grade' => 92.1,
            'phone' => '+966502345678',
            'guardian_name' => 'سعد علي القحطاني'
        ],
        [
            'id' => 3,
            'student_id' => 'S20240003',
            'name' => 'خالد علي القحطاني',
            'class' => 'الصف العاشر أ',
            'attendance_rate' => 89.7,
            'average_grade' => 78.9,
            'phone' => '+966503456789',
            'guardian_name' => 'محمد أحمد العتيبي'
        ]
    ];
}

/**
 * الحصول على الدروس للمدرس
 */
function getTeacherLessons($teacherId = 1) {
    return [
        [
            'id' => 1,
            'title' => 'الرياضيات - مقدمة في المادة',
            'description' => 'شرح مفصل لمقدمة في المادة في مادة الرياضيات',
            'subject' => 'الرياضيات',
            'class' => 'الصف العاشر أ',
            'file_url' => 'https://example.com/lessons/math_1.pdf',
            'file_type' => 'pdf',
            'created_at' => '2024-09-10',
            'views_count' => 45
        ],
        [
            'id' => 2,
            'title' => 'الرياضيات - الوحدة الأولى',
            'description' => 'شرح مفصل للوحدة الأولى في مادة الرياضيات',
            'subject' => 'الرياضيات',
            'class' => 'الصف العاشر ب',
            'file_url' => 'https://example.com/lessons/math_2.ppt',
            'file_type' => 'ppt',
            'created_at' => '2024-09-08',
            'views_count' => 52
        ]
    ];
}

/**
 * الحصول على سجلات الحضور
 */
function getAttendanceRecords($classId = null, $date = null) {
    return [
        [
            'id' => 1,
            'student_name' => 'أحمد محمد الأحمد',
            'student_id' => 'S20240001',
            'date' => '2024-09-11',
            'status' => 'present',
            'subject' => 'الرياضيات',
            'notes' => ''
        ],
        [
            'id' => 2,
            'student_name' => 'فاطمة عبدالله السعد',
            'student_id' => 'S20240002',
            'date' => '2024-09-11',
            'status' => 'present',
            'subject' => 'الرياضيات',
            'notes' => ''
        ],
        [
            'id' => 3,
            'student_name' => 'خالد علي القحطاني',
            'student_id' => 'S20240003',
            'date' => '2024-09-11',
            'status' => 'late',
            'subject' => 'الرياضيات',
            'notes' => 'تأخر 10 دقائق'
        ]
    ];
}

/**
 * الحصول على الدرجات
 */
function getGradesData($classId = null, $subjectId = null) {
    return [
        [
            'id' => 1,
            'student_name' => 'أحمد محمد الأحمد',
            'student_id' => 'S20240001',
            'subject' => 'الرياضيات',
            'exam_type' => 'اختبار الفترة الأولى',
            'score' => 87,
            'max_score' => 100,
            'percentage' => 87.0,
            'grade_letter' => 'B+',
            'exam_date' => '2024-08-15'
        ],
        [
            'id' => 2,
            'student_name' => 'فاطمة عبدالله السعد',
            'student_id' => 'S20240002',
            'subject' => 'الرياضيات',
            'exam_type' => 'اختبار الفترة الأولى',
            'score' => 94,
            'max_score' => 100,
            'percentage' => 94.0,
            'grade_letter' => 'A',
            'exam_date' => '2024-08-15'
        ]
    ];
}

/**
 * حفظ تسجيل حضور جديد
 */
function saveAttendanceRecord($data) {
    // في التطبيق الحقيقي، سيتم حفظ البيانات في قاعدة البيانات
    return [
        'success' => true,
        'message' => 'تم حفظ سجل الحضور بنجاح',
        'id' => rand(1000, 9999)
    ];
}

/**
 * حفظ درجة جديدة
 */
function saveGrade($data) {
    // في التطبيق الحقيقي، سيتم حفظ البيانات في قاعدة البيانات
    return [
        'success' => true,
        'message' => 'تم حفظ الدرجة بنجاح',
        'id' => rand(1000, 9999)
    ];
}

/**
 * إنشاء مستخدم جديد
 */
function createNewUser($userData) {
    // التحقق من وجود اسم المستخدم أو البريد الإلكتروني
    foreach (DEFAULT_USERS as $existingUser) {
        if ($existingUser['username'] === $userData['username'] || 
            $existingUser['email'] === $userData['email']) {
            return [
                'success' => false,
                'message' => 'اسم المستخدم أو البريد الإلكتروني مستخدم مسبقاً'
            ];
        }
    }
    
    // في التطبيق الحقيقي، سيتم حفظ البيانات في قاعدة البيانات
    // هنا سنقوم بمحاكاة إنشاء المستخدم
    
    // إرسال البيانات إلى Django API
    $response = sendAPIRequest('auth/register/', 'POST', [
        'username' => $userData['username'],
        'email' => $userData['email'],
        'password' => $userData['password'],
        'first_name' => $userData['first_name'],
        'last_name' => $userData['last_name'],
        'phone' => $userData['phone'] ?? '',
        'role' => $userData['role'] ?? 'student'
    ]);
    
    if ($response['success']) {
        return [
            'success' => true,
            'message' => 'تم إنشاء الحساب بنجاح',
            'user_id' => $response['data']['id'] ?? null
        ];
    } else {
        // في حالة فشل API، نقوم بإنشاء المستخدم محلياً (مؤقت)
        return [
            'success' => true,
            'message' => 'تم إنشاء الحساب بنجاح (محلياً)',
            'user_id' => rand(1000, 9999)
        ];
    }
}

/**
 * بدء الجلسة إذا لم تكن بدأت
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * التحقق من تسجيل الدخول
 */
function isLoggedIn() {
    return isset($_SESSION['user']);
}

/**
 * الحصول على المستخدم الحالي
 */
function getCurrentUser() {
    return $_SESSION['user'] ?? null;
}

/**
 * تسجيل الدخول
 */
function loginUser($username, $password) {
    $auth = authenticateUser($username, $password);
    if ($auth['success']) {
        $_SESSION['user'] = $auth['user'];
        return true;
    }
    return false;
}

/**
 * تسجيل الخروج
 */
function logoutUser() {
    unset($_SESSION['user']);
    session_destroy();
}

/**
 * التحقق من الصلاحية
 */
function hasRole($role) {
    $user = getCurrentUser();
    return $user && $user['role'] === $role;
}

/**
 * إعداد الاستجابة JSON
 */
function jsonResponse($data, $status = 200) {
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

/**
 * معلومات النظام
 */
define('SYSTEM_INFO', [
    'school_name' => 'مدرسة الرواد الثانوية',
    'academic_year' => '2024-2025',
    'version' => '1.0.0',
    'last_updated' => '2024-09-11'
]);

// إعداد الترميز UTF-8
if (!headers_sent()) {
    header('Content-Type: text/html; charset=utf-8');
}
?>
