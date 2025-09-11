<?php
/**
 * ملف تكوين نظام لوحة الطالب
 * Student Dashboard Configuration File
 */

// إعدادات النظام الأساسية
define('SYSTEM_NAME', 'نظام إدارة الطلاب');
define('SYSTEM_VERSION', '1.0.0');
define('SYSTEM_LANGUAGE', 'ar');

// إعدادات الطالب
$student_config = [
    // معلومات الطالب (يجب جلبها من قاعدة البيانات)
    'student_info' => [
        'id' => 'STU2024001',
        'name' => 'أحمد محمد العلي',
        'email' => 'ahmed.alali@student.school.com',
        'phone' => '+966 50 987 6543',
        'class' => 'الثالث الثانوي - القسم العلمي',
        'grade_level' => '12',
        'enrollment_date' => '2022-09-01',
        'avatar' => 'assets/images/avatar/student-01.jpg'
    ],
    
    // إعدادات الواجهة
    'ui_settings' => [
        'theme' => 'light', // light, dark, auto
        'font_size' => '14px',
        'language' => 'ar',
        'rtl' => true,
        'animations' => true,
        'compact_mode' => false
    ],
    
    // إعدادات الإشعارات
    'notification_settings' => [
        'email_notifications' => true,
        'sms_notifications' => false,
        'push_notifications' => true,
        'grade_notifications' => true,
        'assignment_notifications' => true,
        'schedule_notifications' => false,
        'announcement_notifications' => true,
        'event_notifications' => true,
        'system_notifications' => true
    ],
    
    // إعدادات الخصوصية
    'privacy_settings' => [
        'profile_visibility' => 'public', // public, private, friends
        'grades_privacy' => false,
        'activity_privacy' => false,
        'login_alerts' => true,
        'session_timeout' => true
    ],
    
    // المواد المسجلة
    'enrolled_subjects' => [
        [
            'id' => 'MATH301',
            'name' => 'الرياضيات',
            'teacher' => 'د. أحمد محمد',
            'grade' => 91,
            'color' => 'primary',
            'icon' => 'bi-calculator'
        ],
        [
            'id' => 'PHYS301',
            'name' => 'الفيزياء',
            'teacher' => 'د. سارة علي',
            'grade' => 87,
            'color' => 'success',
            'icon' => 'bi-lightning'
        ],
        [
            'id' => 'CHEM301',
            'name' => 'الكيمياء',
            'teacher' => 'د. محمد حسن',
            'grade' => 85,
            'color' => 'warning',
            'icon' => 'bi-droplet'
        ],
        [
            'id' => 'ARAB301',
            'name' => 'اللغة العربية',
            'teacher' => 'د. فاطمة أحمد',
            'grade' => 92,
            'color' => 'info',
            'icon' => 'bi-type'
        ],
        [
            'id' => 'HIST301',
            'name' => 'التاريخ',
            'teacher' => 'د. عبدالله سالم',
            'grade' => 78,
            'color' => 'danger',
            'icon' => 'bi-clock-history'
        ]
    ],
    
    // إحصائيات سريعة
    'quick_stats' => [
        'gpa' => 88.5,
        'attendance_rate' => 85,
        'total_subjects' => 5,
        'completed_assignments' => 24,
        'pending_assignments' => 3,
        'total_hours' => 180
    ],
    
    // معلومات ولي الأمر
    'guardian_info' => [
        'name' => 'محمد علي العلي',
        'relationship' => 'الوالد',
        'phone' => '+966 50 123 4567',
        'email' => 'mohammed.alali@email.com'
    ]
];

// دالة للحصول على معلومات الطالب
function getStudentInfo($key = null) {
    global $student_config;
    
    if ($key === null) {
        return $student_config['student_info'];
    }
    
    return isset($student_config['student_info'][$key]) ? $student_config['student_info'][$key] : null;
}

// دالة للحصول على إعدادات الواجهة
function getUISettings($key = null) {
    global $student_config;
    
    if ($key === null) {
        return $student_config['ui_settings'];
    }
    
    return isset($student_config['ui_settings'][$key]) ? $student_config['ui_settings'][$key] : null;
}

// دالة للحصول على إعدادات الإشعارات
function getNotificationSettings($key = null) {
    global $student_config;
    
    if ($key === null) {
        return $student_config['notification_settings'];
    }
    
    return isset($student_config['notification_settings'][$key]) ? $student_config['notification_settings'][$key] : false;
}

// دالة للحصول على المواد المسجلة
function getEnrolledSubjects() {
    global $student_config;
    return $student_config['enrolled_subjects'];
}

// دالة للحصول على إحصائية معينة
function getQuickStat($key) {
    global $student_config;
    return isset($student_config['quick_stats'][$key]) ? $student_config['quick_stats'][$key] : 0;
}

// دالة للحصول على معلومات ولي الأمر
function getGuardianInfo($key = null) {
    global $student_config;
    
    if ($key === null) {
        return $student_config['guardian_info'];
    }
    
    return isset($student_config['guardian_info'][$key]) ? $student_config['guardian_info'][$key] : null;
}

// دالة لحفظ الإعدادات (يجب ربطها بقاعدة البيانات)
function saveSettings($section, $settings) {
    global $student_config;
    
    if (isset($student_config[$section])) {
        $student_config[$section] = array_merge($student_config[$section], $settings);
        // هنا يجب إضافة كود لحفظ الإعدادات في قاعدة البيانات
        return true;
    }
    
    return false;
}

// دالة للتحقق من صلاحية الوصول
function checkStudentAccess() {
    // يجب تطبيق نظام المصادقة المناسب
    // هذا مثال بسيط للتوضيح
    session_start();
    
    if (!isset($_SESSION['student_logged_in']) || $_SESSION['student_logged_in'] !== true) {
        return false;
    }
    
    return true;
}

// دالة لتسجيل الخروج
function logoutStudent() {
    session_start();
    session_destroy();
    header('Location: sign-in.php');
    exit;
}

// إعدادات قاعدة البيانات (يجب تعديلها حسب البيئة)
$db_config = [
    'host' => 'localhost',
    'dbname' => 'student_management',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4'
];

// دالة للاتصال بقاعدة البيانات
function getDatabaseConnection() {
    global $db_config;
    
    try {
        $pdo = new PDO(
            "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}",
            $db_config['username'],
            $db_config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
        
        return $pdo;
    } catch (PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        return false;
    }
}

// دالة لتسجيل الأنشطة
function logActivity($activity, $details = '') {
    $log_entry = [
        'timestamp' => date('Y-m-d H:i:s'),
        'student_id' => getStudentInfo('id'),
        'activity' => $activity,
        'details' => $details,
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ];
    
    // هنا يجب إضافة كود لحفظ السجل في قاعدة البيانات
    error_log("Student Activity: " . json_encode($log_entry));
}

// إعدادات الأمان
$security_config = [
    'session_timeout' => 1800, // 30 دقيقة
    'max_login_attempts' => 5,
    'lockout_duration' => 900, // 15 دقيقة
    'password_min_length' => 8,
    'require_2fa' => false
];

// دالة لتحديد مستوى الأمان للكلمة السرية
function checkPasswordStrength($password) {
    $strength = 0;
    
    if (strlen($password) >= 8) $strength++;
    if (preg_match('/[a-z]/', $password)) $strength++;
    if (preg_match('/[A-Z]/', $password)) $strength++;
    if (preg_match('/[0-9]/', $password)) $strength++;
    if (preg_match('/[^a-zA-Z0-9]/', $password)) $strength++;
    
    return $strength;
}

// تحديد مسارات الملفات
define('STUDENT_PAGES_PATH', 'student-pages/');
define('ASSETS_PATH', 'assets/');
define('UPLOADS_PATH', 'uploads/student/');

// قائمة الصفحات المسموحة
$allowed_pages = [
    'dashboard',
    'lessons',
    'attendance',
    'grades',
    'announcements',
    'reports',
    'profile',
    'settings'
];

// دالة للتحقق من صحة الصفحة المطلوبة
function isValidPage($page) {
    global $allowed_pages;
    return in_array($page, $allowed_pages);
}

// إعدادات الرفع
$upload_config = [
    'max_file_size' => 5 * 1024 * 1024, // 5 MB
    'allowed_types' => ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx'],
    'upload_path' => UPLOADS_PATH
];
?>
