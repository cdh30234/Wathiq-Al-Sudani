<?php
/**
 * معالج API للمدرس مع قاعدة البيانات
 * Teacher API Handler with Database Integration
 */

// تضمين ملف التكوين مع قاعدة البيانات
require_once 'teacher-config-db.php';

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
        case 'teacher_info':
            echo json_encode([
                'success' => true,
                'data' => getTeacherInfo()
            ]);
            break;
            
        case 'quick_stats':
            echo json_encode([
                'success' => true,
                'data' => getTeacherStats()
            ]);
            break;
            
        case 'subjects':
            echo json_encode([
                'success' => true,
                'data' => getTeacherSubjects()
            ]);
            break;
            
        case 'students':
            echo json_encode([
                'success' => true,
                'data' => getTeacherStudents()
            ]);
            break;
            
        case 'classes':
            echo json_encode([
                'success' => true,
                'data' => getTeacherClasses()
            ]);
            break;
            
        case 'lessons':
            echo json_encode([
                'success' => true,
                'data' => getTeacherLessons()
            ]);
            break;
            
        case 'announcements':
            echo json_encode([
                'success' => true,
                'data' => getTeacherAnnouncements()
            ]);
            break;
            
        case 'attendance':
            $class_id = $_GET['class_id'] ?? null;
            $subject_id = $_GET['subject_id'] ?? null;
            $date_from = $_GET['date_from'] ?? null;
            $date_to = $_GET['date_to'] ?? null;
            
            if (!$class_id || !$subject_id) {
                throw new Exception('معرف الفصل والمادة مطلوبان');
            }
            
            echo json_encode([
                'success' => true,
                'data' => getAttendanceData($class_id, $subject_id, $date_from, $date_to)
            ]);
            break;
            
        case 'grades':
            $class_id = $_GET['class_id'] ?? null;
            $subject_id = $_GET['subject_id'] ?? null;
            $exam_type_id = $_GET['exam_type_id'] ?? null;
            
            if (!$class_id || !$subject_id) {
                throw new Exception('معرف الفصل والمادة مطلوبان');
            }
            
            echo json_encode([
                'success' => true,
                'data' => getGradesData($class_id, $subject_id, $exam_type_id)
            ]);
            break;
            
        case 'exam_types':
            echo json_encode([
                'success' => true,
                'data' => getExamTypes()
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
        case 'create_lesson':
            $result = saveTeacherData('lesson', $input);
            echo json_encode([
                'success' => $result,
                'message' => $result ? 'تم إنشاء الدرس بنجاح' : 'فشل في إنشاء الدرس'
            ]);
            break;
            
        case 'create_announcement':
            $result = saveTeacherData('announcement', $input);
            echo json_encode([
                'success' => $result,
                'message' => $result ? 'تم إنشاء الإعلان بنجاح' : 'فشل في إنشاء الإعلان'
            ]);
            break;
            
        case 'save_attendance':
            $result = saveTeacherData('attendance', $input);
            echo json_encode([
                'success' => $result,
                'message' => $result ? 'تم حفظ الحضور بنجاح' : 'فشل في حفظ الحضور'
            ]);
            break;
            
        case 'save_grades':
            $result = saveGrades($input);
            echo json_encode([
                'success' => $result,
                'message' => $result ? 'تم حفظ الدرجات بنجاح' : 'فشل في حفظ الدرجات'
            ]);
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
        case 'update_lesson':
            $result = updateLesson($input);
            echo json_encode([
                'success' => $result,
                'message' => $result ? 'تم تحديث الدرس بنجاح' : 'فشل في تحديث الدرس'
            ]);
            break;
            
        case 'update_announcement':
            $result = updateAnnouncement($input);
            echo json_encode([
                'success' => $result,
                'message' => $result ? 'تم تحديث الإعلان بنجاح' : 'فشل في تحديث الإعلان'
            ]);
            break;
            
        default:
            throw new Exception('عملية غير صالحة');
    }
}

/**
 * دالة لحفظ الدرجات
 */
function saveGrades($grades_data) {
    global $current_teacher_id;
    
    if (!$current_teacher_id) {
        return false;
    }
    
    try {
        $db = DatabaseConnection::getInstance()->getConnection();
        $db->beginTransaction();
        
        foreach ($grades_data as $grade) {
            $sql = "INSERT INTO grade_scores (id, student_id, subject_id, teacher_id, exam_type_id, 
                    academic_year_id, score, max_score, exam_date, notes) 
                    VALUES (uuid_generate_v4(), :student_id, :subject_id, :teacher_id, :exam_type_id, 
                    :academic_year_id, :score, :max_score, :exam_date, :notes)";
            
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'student_id' => $grade['student_id'],
                'subject_id' => $grade['subject_id'],
                'teacher_id' => $current_teacher_id,
                'exam_type_id' => $grade['exam_type_id'],
                'academic_year_id' => $grade['academic_year_id'],
                'score' => $grade['score'],
                'max_score' => $grade['max_score'] ?? 100,
                'exam_date' => $grade['exam_date'],
                'notes' => $grade['notes'] ?? null
            ]);
        }
        
        $db->commit();
        logTeacherActivity('grades_saved', 'تم حفظ درجات ' . count($grades_data) . ' طالب');
        
        return true;
    } catch (Exception $e) {
        $db->rollback();
        error_log("Error saving grades: " . $e->getMessage());
        return false;
    }
}

/**
 * دالة لتحديث الدرس
 */
function updateLesson($lesson_data) {
    global $current_teacher_id;
    
    if (!$current_teacher_id) {
        return false;
    }
    
    try {
        $db = DatabaseConnection::getInstance()->getConnection();
        
        $sql = "UPDATE lessons SET title = :title, description = :description, 
                file_url = :file_url, file_type = :file_type, is_published = :is_published, 
                updated_at = NOW() 
                WHERE id = :lesson_id AND teacher_id = :teacher_id";
        
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([
            'title' => $lesson_data['title'],
            'description' => $lesson_data['description'],
            'file_url' => $lesson_data['file_url'] ?? null,
            'file_type' => $lesson_data['file_type'] ?? 'link',
            'is_published' => $lesson_data['is_published'] ?? true,
            'lesson_id' => $lesson_data['id'],
            'teacher_id' => $current_teacher_id
        ]);
        
        if ($result) {
            logTeacherActivity('lesson_updated', 'تم تحديث الدرس: ' . $lesson_data['title']);
        }
        
        return $result;
    } catch (Exception $e) {
        error_log("Error updating lesson: " . $e->getMessage());
        return false;
    }
}

/**
 * دالة لتحديث الإعلان
 */
function updateAnnouncement($announcement_data) {
    global $current_teacher_id;
    
    if (!$current_teacher_id) {
        return false;
    }
    
    try {
        $db = DatabaseConnection::getInstance()->getConnection();
        
        $sql = "UPDATE announcements SET title = :title, content = :content, 
                announcement_type = :type, is_urgent = :is_urgent, updated_at = NOW() 
                WHERE id = :announcement_id AND author_id = :teacher_id";
        
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([
            'title' => $announcement_data['title'],
            'content' => $announcement_data['content'],
            'type' => $announcement_data['type'] ?? 'general',
            'is_urgent' => $announcement_data['is_urgent'] ?? false,
            'announcement_id' => $announcement_data['id'],
            'teacher_id' => $current_teacher_id
        ]);
        
        if ($result) {
            logTeacherActivity('announcement_updated', 'تم تحديث الإعلان: ' . $announcement_data['title']);
        }
        
        return $result;
    } catch (Exception $e) {
        error_log("Error updating announcement: " . $e->getMessage());
        return false;
    }
}
?>
