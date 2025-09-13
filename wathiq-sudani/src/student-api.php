<?php
/**
 * معالج API للطالب
 * Student API Handler
 */

// تضمين ملف التكوين
require_once 'student-config.php';

// تعيين نوع المحتوى كـ JSON
header('Content-Type: application/json; charset=utf-8');

// السماح بـ CORS (إذا لزم الأمر)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

// التحقق من طريقة الطلب
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

try {
    switch ($method) {
        case 'GET':
            handleGetRequest($action);
            break;
        case 'POST':
            handlePostRequest($action);
            break;
        case 'PUT':
            handlePutRequest($action);
            break;
        default:
            throw new Exception('طريقة الطلب غير مدعومة');
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}

/**
 * معالجة طلبات GET
 */
function handleGetRequest($action) {
    switch ($action) {
        case 'student_info':
            echo json_encode([
                'success' => true,
                'data' => getStudentInfo()
            ]);
            break;
            
        case 'quick_stats':
            echo json_encode([
                'success' => true,
                'data' => [
                    'gpa' => getQuickStat('gpa'),
                    'attendance_rate' => getQuickStat('attendance_rate'),
                    'total_subjects' => getQuickStat('total_subjects'),
                    'completed_assignments' => getQuickStat('completed_assignments'),
                    'pending_assignments' => getQuickStat('pending_assignments'),
                    'total_hours' => getQuickStat('total_hours')
                ]
            ]);
            break;
            
        case 'subjects':
            echo json_encode([
                'success' => true,
                'data' => getEnrolledSubjects()
            ]);
            break;
            
        case 'grades':
            echo json_encode([
                'success' => true,
                'data' => getGradesData()
            ]);
            break;
            
        case 'attendance':
            echo json_encode([
                'success' => true,
                'data' => getAttendanceData()
            ]);
            break;
            
        case 'announcements':
            echo json_encode([
                'success' => true,
                'data' => getAnnouncementsData()
            ]);
            break;
            
        case 'lessons':
            echo json_encode([
                'success' => true,
                'data' => getLessonsData()
            ]);
            break;
            
        case 'reports':
            echo json_encode([
                'success' => true,
                'data' => getReportsData()
            ]);
            break;
            
        default:
            throw new Exception('عملية غير صالحة');
    }
}

/**
 * معالجة طلبات POST
 */
function handlePostRequest($action) {
    $input = json_decode(file_get_contents('php://input'), true);
    
    switch ($action) {
        case 'update_settings':
            $result = updateStudentSettings($input);
            echo json_encode([
                'success' => $result,
                'message' => $result ? 'تم حفظ الإعدادات بنجاح' : 'فشل في حفظ الإعدادات'
            ]);
            break;
            
        case 'mark_announcement_read':
            $announcementId = $input['announcement_id'] ?? null;
            if ($announcementId) {
                $result = markAnnouncementAsRead($announcementId);
                echo json_encode([
                    'success' => $result,
                    'message' => $result ? 'تم تحديث حالة الإعلان' : 'فشل في تحديث الإعلان'
                ]);
            } else {
                throw new Exception('معرف الإعلان مطلوب');
            }
            break;
            
        default:
            throw new Exception('عملية غير صالحة');
    }
}

/**
 * معالجة طلبات PUT
 */
function handlePutRequest($action) {
    $input = json_decode(file_get_contents('php://input'), true);
    
    switch ($action) {
        case 'update_profile':
            $result = updateStudentProfile($input);
            echo json_encode([
                'success' => $result,
                'message' => $result ? 'تم تحديث الملف الشخصي بنجاح' : 'فشل في تحديث الملف الشخصي'
            ]);
            break;
            
        default:
            throw new Exception('عملية غير صالحة');
    }
}

/**
 * دالة لجلب بيانات الدرجات
 */
function getGradesData() {
    return [
        'semester_grades' => [
            ['subject' => 'الرياضيات', 'grade' => 91, 'max_grade' => 100],
            ['subject' => 'الفيزياء', 'grade' => 87, 'max_grade' => 100],
            ['subject' => 'الكيمياء', 'grade' => 85, 'max_grade' => 100],
            ['subject' => 'اللغة العربية', 'grade' => 92, 'max_grade' => 100],
            ['subject' => 'التاريخ', 'grade' => 78, 'max_grade' => 100]
        ],
        'assignments' => [
            ['name' => 'واجب الرياضيات 1', 'subject' => 'الرياضيات', 'grade' => 95, 'date' => '2024-01-15'],
            ['name' => 'تجربة الفيزياء 2', 'subject' => 'الفيزياء', 'grade' => 88, 'date' => '2024-01-20'],
            ['name' => 'بحث التاريخ', 'subject' => 'التاريخ', 'grade' => 82, 'date' => '2024-01-25']
        ],
        'cumulative_gpa' => 88.5,
        'semester_gpa' => 86.8
    ];
}

/**
 * دالة لجلب بيانات الحضور
 */
function getAttendanceData() {
    return [
        'monthly_stats' => [
            'present' => 18,
            'absent' => 3,
            'late' => 1,
            'excused' => 2
        ],
        'daily_records' => [
            ['date' => '2024-01-01', 'status' => 'حضور', 'subjects' => ['الرياضيات', 'الفيزياء']],
            ['date' => '2024-01-02', 'status' => 'غياب', 'reason' => 'مرض', 'subjects' => ['الكيمياء']],
            ['date' => '2024-01-03', 'status' => 'تأخير', 'minutes' => 15, 'subjects' => ['اللغة العربية']]
        ],
        'attendance_percentage' => 85
    ];
}

/**
 * دالة لجلب بيانات الإعلانات
 */
function getAnnouncementsData() {
    return [
        [
            'id' => 1,
            'title' => 'امتحان الرياضيات الشهري',
            'content' => 'سيتم عقد امتحان الرياضيات الشهري يوم الأحد القادم',
            'type' => 'exam',
            'priority' => 'high',
            'date' => '2024-01-10',
            'is_read' => false,
            'author' => 'د. أحمد محمد'
        ],
        [
            'id' => 2,
            'title' => 'تأجيل محاضرة الفيزياء',
            'content' => 'تم تأجيل محاضرة الفيزياء من الثلاثاء إلى الأربعاء',
            'type' => 'schedule',
            'priority' => 'medium',
            'date' => '2024-01-08',
            'is_read' => true,
            'author' => 'د. سارة علي'
        ]
    ];
}

/**
 * دالة لجلب بيانات الدروس
 */
function getLessonsData() {
    return [
        [
            'id' => 1,
            'title' => 'مقدمة في التفاضل والتكامل',
            'subject' => 'الرياضيات',
            'duration' => 45,
            'type' => 'video',
            'status' => 'completed',
            'progress' => 100,
            'teacher' => 'د. أحمد محمد',
            'date' => '2024-01-15',
            'materials' => ['ملف PDF', 'تمارين إضافية']
        ],
        [
            'id' => 2,
            'title' => 'قوانين نيوتن للحركة',
            'subject' => 'الفيزياء',
            'duration' => 50,
            'type' => 'video',
            'status' => 'in_progress',
            'progress' => 65,
            'teacher' => 'د. سارة علي',
            'date' => '2024-01-18',
            'materials' => ['شرائح العرض', 'تجارب عملية']
        ]
    ];
}

/**
 * دالة لجلب بيانات التقارير
 */
function getReportsData() {
    return [
        'performance_trend' => [
            ['month' => 'سبتمبر', 'gpa' => 85.2],
            ['month' => 'أكتوبر', 'gpa' => 87.1],
            ['month' => 'نوفمبر', 'gpa' => 86.8],
            ['month' => 'ديسمبر', 'gpa' => 88.5],
            ['month' => 'يناير', 'gpa' => 88.9]
        ],
        'subject_comparison' => [
            ['subject' => 'الرياضيات', 'current' => 91, 'previous' => 89],
            ['subject' => 'الفيزياء', 'current' => 87, 'previous' => 85],
            ['subject' => 'الكيمياء', 'current' => 85, 'previous' => 83]
        ],
        'activity_summary' => [
            'assignments_completed' => 24,
            'lessons_watched' => 45,
            'login_frequency' => 18,
            'study_hours' => 120
        ]
    ];
}

/**
 * دالة لتحديث إعدادات الطالب
 */
function updateStudentSettings($settings) {
    // هنا يجب إضافة كود لحفظ الإعدادات في قاعدة البيانات
    logActivity('settings_updated', 'تم تحديث إعدادات الطالب');
    return true;
}

/**
 * دالة لتحديث الملف الشخصي
 */
function updateStudentProfile($profile_data) {
    // هنا يجب إضافة كود لتحديث الملف الشخصي في قاعدة البيانات
    logActivity('profile_updated', 'تم تحديث الملف الشخصي');
    return true;
}

/**
 * دالة لتمييز الإعلان كمقروء
 */
function markAnnouncementAsRead($announcement_id) {
    // هنا يجب إضافة كود لتحديث حالة الإعلان في قاعدة البيانات
    logActivity('announcement_read', "تم قراءة الإعلان رقم: $announcement_id");
    return true;
}
?>
