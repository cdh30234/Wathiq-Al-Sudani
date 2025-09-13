<?php
/**
 * ملف تكوين نظام لوحة المدرس مع قاعدة البيانات
 * Teacher Dashboard Configuration with Database Integration
 */

require_once 'database-config.php';

// الحصول على معرف المدرس الحالي
function getCurrentTeacherId() {
    // محاولة الحصول على المعرف من الملف المؤقت
    if (file_exists('current_teacher_id.txt')) {
        return trim(file_get_contents('current_teacher_id.txt'));
    }
    // في حالة عدم وجود معرف، إرجاع null
    return null;
}

// الحصول على معرف المدرس
$current_teacher_id = getCurrentTeacherId();

if (!$current_teacher_id) {
    // في حالة عدم وجود معرف مدرس، استخدام البيانات الافتراضية
    $teacher_config = [
        'teacher_info' => [
            'id' => 'TEMP_ID',
            'name' => 'مدرس تجريبي',
            'email' => 'teacher@example.com',
            'employee_id' => 'T001',
            'specialization' => 'الرياضيات',
            'phone' => '+966 50 123 4567',
            'avatar' => 'assets/images/avatar/teacher-01.jpg'
        ],
        'quick_stats' => [
            'total_students' => 0,
            'total_subjects' => 0,
            'total_classes' => 0,
            'attendance_rate' => 0
        ],
        'subjects' => [],
        'students' => [],
        'lessons' => [],
        'announcements' => []
    ];
} else {
    try {
        $teacherManager = new TeacherManager();
        
        // الحصول على معلومات المدرس
        $teacher_info = $teacherManager->getTeacherInfo($current_teacher_id);
        
        if (!$teacher_info) {
            throw new Exception("لم يتم العثور على بيانات المدرس");
        }
        
        // تكوين بيانات المدرس
        $teacher_config = [
            'teacher_info' => [
                'id' => $teacher_info['id'],
                'name' => $teacher_info['full_name'],
                'email' => $teacher_info['phone'], // مؤقتاً حتى نضيف البريد الإلكتروني
                'employee_id' => $teacher_info['employee_id'],
                'specialization' => $teacher_info['specialization'] ?? 'غير محدد',
                'qualification' => $teacher_info['qualification'] ?? 'غير محدد',
                'experience_years' => $teacher_info['experience_years'] ?? 0,
                'phone' => $teacher_info['phone'] ?? '',
                'address' => $teacher_info['address'] ?? '',
                'avatar' => $teacher_info['profile_picture'] ?? 'assets/images/avatar/teacher-default.jpg',
                'hire_date' => $teacher_info['hire_date'] ?? ''
            ],
            
            // الإحصائيات السريعة
            'quick_stats' => $teacherManager->getTeacherStats($current_teacher_id),
            
            // المواد التي يدرسها
            'subjects' => $teacherManager->getTeacherSubjects($current_teacher_id),
            
            // الطلاب
            'students' => $teacherManager->getTeacherStudents($current_teacher_id),
            
            // الفصول
            'classes' => $teacherManager->getTeacherClasses($current_teacher_id),
            
            // الدروس
            'lessons' => $teacherManager->getTeacherLessons($current_teacher_id, 10),
            
            // الإعلانات
            'announcements' => $teacherManager->getTeacherAnnouncements($current_teacher_id, 5)
        ];
        
    } catch (Exception $e) {
        error_log("Error loading teacher config: " . $e->getMessage());
        
        // استخدام البيانات الافتراضية في حالة الخطأ
        $teacher_config = [
            'teacher_info' => [
                'id' => 'ERROR',
                'name' => 'خطأ في تحميل البيانات',
                'email' => 'error@example.com',
                'employee_id' => 'ERR',
                'specialization' => 'غير متاح',
                'phone' => '',
                'avatar' => 'assets/images/avatar/teacher-default.jpg'
            ],
            'quick_stats' => [
                'total_students' => 0,
                'total_subjects' => 0,
                'total_classes' => 0,
                'attendance_rate' => 0
            ],
            'subjects' => [],
            'students' => [],
            'lessons' => [],
            'announcements' => []
        ];
    }
}

// دوال مساعدة للوصول للبيانات
function getTeacherInfo($key = null) {
    global $teacher_config;
    
    if ($key === null) {
        return $teacher_config['teacher_info'];
    }
    
    return isset($teacher_config['teacher_info'][$key]) ? $teacher_config['teacher_info'][$key] : null;
}

function getTeacherStats($key = null) {
    global $teacher_config;
    
    if ($key === null) {
        return $teacher_config['quick_stats'];
    }
    
    return isset($teacher_config['quick_stats'][$key]) ? $teacher_config['quick_stats'][$key] : 0;
}

function getTeacherSubjects() {
    global $teacher_config;
    return $teacher_config['subjects'] ?? [];
}

function getTeacherStudents() {
    global $teacher_config;
    return $teacher_config['students'] ?? [];
}

function getTeacherClasses() {
    global $teacher_config;
    return $teacher_config['classes'] ?? [];
}

function getTeacherLessons() {
    global $teacher_config;
    return $teacher_config['lessons'] ?? [];
}

function getTeacherAnnouncements() {
    global $teacher_config;
    return $teacher_config['announcements'] ?? [];
}

// دالة لحفظ البيانات الجديدة
function saveTeacherData($type, $data) {
    global $current_teacher_id;
    
    if (!$current_teacher_id) {
        return false;
    }
    
    try {
        $db = DatabaseConnection::getInstance()->getConnection();
        
        switch ($type) {
            case 'lesson':
                return createLesson($db, $current_teacher_id, $data);
            case 'announcement':
                return createAnnouncement($db, $current_teacher_id, $data);
            case 'attendance':
                return saveAttendance($db, $data);
            default:
                return false;
        }
    } catch (Exception $e) {
        error_log("Error saving teacher data: " . $e->getMessage());
        return false;
    }
}

// دالة لإنشاء درس جديد
function createLesson($db, $teacher_id, $data) {
    $sql = "INSERT INTO lessons (id, title, description, subject_id, teacher_id, file_url, file_type, is_published) 
            VALUES (uuid_generate_v4(), :title, :description, :subject_id, :teacher_id, :file_url, :file_type, :is_published)";
    
    $stmt = $db->prepare($sql);
    return $stmt->execute([
        'title' => $data['title'],
        'description' => $data['description'],
        'subject_id' => $data['subject_id'],
        'teacher_id' => $teacher_id,
        'file_url' => $data['file_url'] ?? null,
        'file_type' => $data['file_type'] ?? 'link',
        'is_published' => $data['is_published'] ?? true
    ]);
}

// دالة لإنشاء إعلان جديد
function createAnnouncement($db, $teacher_id, $data) {
    $sql = "INSERT INTO announcements (id, title, content, author_id, announcement_type, is_urgent, target_all_school) 
            VALUES (uuid_generate_v4(), :title, :content, :author_id, :type, :is_urgent, :target_all)";
    
    $stmt = $db->prepare($sql);
    return $stmt->execute([
        'title' => $data['title'],
        'content' => $data['content'],
        'author_id' => $teacher_id,
        'type' => $data['type'] ?? 'general',
        'is_urgent' => $data['is_urgent'] ?? false,
        'target_all' => $data['target_all_school'] ?? false
    ]);
}

// دالة لحفظ الحضور
function saveAttendance($db, $data) {
    $sql = "INSERT INTO attendance (id, student_id, school_class_id, teacher_id, subject_id, date, status, notes) 
            VALUES (uuid_generate_v4(), :student_id, :class_id, :teacher_id, :subject_id, :date, :status, :notes)
            ON CONFLICT (student_id, date, subject_id) DO UPDATE SET 
            status = EXCLUDED.status, notes = EXCLUDED.notes, updated_at = NOW()";
    
    $stmt = $db->prepare($sql);
    return $stmt->execute($data);
}

// دالة للحصول على بيانات الحضور
function getAttendanceData($class_id, $subject_id, $date_from = null, $date_to = null) {
    global $current_teacher_id;
    
    if (!$current_teacher_id) {
        return [];
    }
    
    try {
        $db = DatabaseConnection::getInstance()->getConnection();
        
        $sql = "SELECT 
                    a.id,
                    a.date,
                    a.status,
                    a.notes,
                    st.student_id,
                    up.arabic_first_name,
                    up.arabic_last_name,
                    CONCAT(up.arabic_first_name, ' ', up.arabic_last_name) as student_name
                FROM attendance a
                JOIN students st ON a.student_id = st.id
                JOIN user_profiles up ON st.user_profile_id = up.id
                WHERE a.teacher_id = :teacher_id 
                AND a.school_class_id = :class_id 
                AND a.subject_id = :subject_id";
        
        $params = [
            'teacher_id' => $current_teacher_id,
            'class_id' => $class_id,
            'subject_id' => $subject_id
        ];
        
        if ($date_from) {
            $sql .= " AND a.date >= :date_from";
            $params['date_from'] = $date_from;
        }
        
        if ($date_to) {
            $sql .= " AND a.date <= :date_to";
            $params['date_to'] = $date_to;
        }
        
        $sql .= " ORDER BY a.date DESC, up.arabic_first_name";
        
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll();
        
    } catch (Exception $e) {
        error_log("Error fetching attendance data: " . $e->getMessage());
        return [];
    }
}

// دالة للحصول على درجات الطلاب
function getGradesData($class_id, $subject_id, $exam_type_id = null) {
    global $current_teacher_id;
    
    if (!$current_teacher_id) {
        return [];
    }
    
    try {
        $db = DatabaseConnection::getInstance()->getConnection();
        
        $sql = "SELECT 
                    gs.id,
                    gs.score,
                    gs.max_score,
                    gs.percentage,
                    gs.grade_letter,
                    gs.exam_date,
                    st.student_id,
                    up.arabic_first_name,
                    up.arabic_last_name,
                    CONCAT(up.arabic_first_name, ' ', up.arabic_last_name) as student_name,
                    et.name as exam_type_name
                FROM grade_scores gs
                JOIN students st ON gs.student_id = st.id
                JOIN user_profiles up ON st.user_profile_id = up.id
                JOIN exam_types et ON gs.exam_type_id = et.id
                WHERE gs.teacher_id = :teacher_id 
                AND gs.subject_id = :subject_id 
                AND st.school_class_id = :class_id";
        
        $params = [
            'teacher_id' => $current_teacher_id,
            'subject_id' => $subject_id,
            'class_id' => $class_id
        ];
        
        if ($exam_type_id) {
            $sql .= " AND gs.exam_type_id = :exam_type_id";
            $params['exam_type_id'] = $exam_type_id;
        }
        
        $sql .= " ORDER BY gs.exam_date DESC, up.arabic_first_name";
        
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll();
        
    } catch (Exception $e) {
        error_log("Error fetching grades data: " . $e->getMessage());
        return [];
    }
}

// دالة للحصول على أنواع الاختبارات
function getExamTypes() {
    try {
        $db = DatabaseConnection::getInstance()->getConnection();
        
        $sql = "SELECT id, name, weight_percentage, max_score FROM exam_types ORDER BY weight_percentage DESC";
        $stmt = $db->query($sql);
        
        return $stmt->fetchAll();
    } catch (Exception $e) {
        error_log("Error fetching exam types: " . $e->getMessage());
        return [];
    }
}

// تسجيل النشاط
function logTeacherActivity($activity, $details = '') {
    global $current_teacher_id;
    
    if (!$current_teacher_id) {
        return;
    }
    
    $log_entry = [
        'timestamp' => date('Y-m-d H:i:s'),
        'teacher_id' => $current_teacher_id,
        'activity' => $activity,
        'details' => $details,
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ];
    
    error_log("Teacher Activity: " . json_encode($log_entry, JSON_UNESCAPED_UNICODE));
}
?>
