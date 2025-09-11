<?php
/**
 * API إدارة الطلاب للمدرسين
 * Teacher Student Management API
 */

session_start();
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

require_once '../includes/db_config.php';

$method = $_SERVER['REQUEST_METHOD'];
$action = $_POST['action'] ?? $_GET['action'] ?? '';

try {
    $studentsManager = new StudentsManager();
    
    switch ($method) {
        case 'GET':
            handleGetRequest($studentsManager);
            break;
            
        case 'POST':
            handlePostRequest($studentsManager);
            break;
            
        case 'PUT':
            handlePutRequest($studentsManager);
            break;
            
        case 'DELETE':
            handleDeleteRequest($studentsManager);
            break;
            
        default:
            http_response_code(405);
            echo json_encode(['error' => 'طريقة غير مدعومة'], JSON_UNESCAPED_UNICODE);
            break;
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'خطأ في الخادم',
        'message' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}

/**
 * Handle GET requests
 */
function handleGetRequest($studentsManager) {
    $action = $_GET['action'] ?? 'list';
    
    switch ($action) {
        case 'list':
            // جلب جميع الطلاب
            $students = $studentsManager->getAllStudents();
            echo json_encode([
                'success' => true,
                'data' => $students,
                'count' => count($students)
            ], JSON_UNESCAPED_UNICODE);
            break;
            
        case 'get':
            // جلب طالب محدد
            $student_id = $_GET['id'] ?? null;
            if (!$student_id) {
                http_response_code(400);
                echo json_encode(['error' => 'معرف الطالب مطلوب'], JSON_UNESCAPED_UNICODE);
                return;
            }
            
            $student = $studentsManager->getStudentById($student_id);
            if ($student) {
                echo json_encode([
                    'success' => true,
                    'data' => $student
                ], JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'الطالب غير موجود'], JSON_UNESCAPED_UNICODE);
            }
            break;
            
        case 'by_class':
            // جلب طلاب فصل محدد
            $class_id = $_GET['class_id'] ?? null;
            if (!$class_id) {
                http_response_code(400);
                echo json_encode(['error' => 'معرف الفصل مطلوب'], JSON_UNESCAPED_UNICODE);
                return;
            }
            
            $students = $studentsManager->getStudentsByClass($class_id);
            echo json_encode([
                'success' => true,
                'data' => $students,
                'count' => count($students)
            ], JSON_UNESCAPED_UNICODE);
            break;
            
        case 'classes':
            // جلب جميع الفصول
            $classes = $studentsManager->getAllClasses();
            echo json_encode([
                'success' => true,
                'data' => $classes
            ], JSON_UNESCAPED_UNICODE);
            break;
            
        case 'stats':
            // إحصائيات الطلاب
            $stats = getStudentStats($studentsManager);
            echo json_encode([
                'success' => true,
                'data' => $stats
            ], JSON_UNESCAPED_UNICODE);
            break;
            
        default:
            http_response_code(400);
            echo json_encode(['error' => 'إجراء غير مدعوم'], JSON_UNESCAPED_UNICODE);
            break;
    }
}

/**
 * Handle POST requests (إضافة طالب جديد)
 */
function handlePostRequest($studentsManager) {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        http_response_code(400);
        echo json_encode(['error' => 'بيانات غير صحيحة'], JSON_UNESCAPED_UNICODE);
        return;
    }
    
    // التحقق من البيانات المطلوبة
    $requiredFields = [
        'arabic_first_name', 'arabic_last_name', 'national_id',
        'phone', 'address', 'date_of_birth', 'gender',
        'roll_number', 'school_class_id', 'guardian_name', 'guardian_phone'
    ];
    
    foreach ($requiredFields as $field) {
        if (!isset($input[$field]) || empty(trim($input[$field]))) {
            http_response_code(400);
            echo json_encode(['error' => "الحقل '$field' مطلوب"], JSON_UNESCAPED_UNICODE);
            return;
        }
    }
    
    // إضافة تاريخ التسجيل إذا لم يكن موجوداً
    if (!isset($input['enrollment_date'])) {
        $input['enrollment_date'] = date('Y-m-d');
    }
    
    $result = $studentsManager->addStudent($input);
    
    if ($result['success']) {
        http_response_code(201);
    } else {
        http_response_code(400);
    }
    
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

/**
 * Handle PUT requests (تحديث طالب)
 */
function handlePutRequest($studentsManager) {
    $student_id = $_GET['id'] ?? null;
    
    if (!$student_id) {
        http_response_code(400);
        echo json_encode(['error' => 'معرف الطالب مطلوب'], JSON_UNESCAPED_UNICODE);
        return;
    }
    
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        http_response_code(400);
        echo json_encode(['error' => 'بيانات غير صحيحة'], JSON_UNESCAPED_UNICODE);
        return;
    }
    
    $result = $studentsManager->updateStudent($student_id, $input);
    
    if (!$result['success']) {
        http_response_code(400);
    }
    
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

/**
 * Handle DELETE requests (حذف طالب)
 */
function handleDeleteRequest($studentsManager) {
    $student_id = $_GET['id'] ?? null;
    
    if (!$student_id) {
        http_response_code(400);
        echo json_encode(['error' => 'معرف الطالب مطلوب'], JSON_UNESCAPED_UNICODE);
        return;
    }
    
    $result = $studentsManager->deleteStudent($student_id);
    
    if (!$result['success']) {
        http_response_code(400);
    }
    
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

/**
 * Get student statistics
 */
function getStudentStats($studentsManager) {
    $db = DatabaseConfig::getConnection();
    
    // إجمالي الطلاب
    $totalQuery = "SELECT COUNT(*) as total FROM core_student";
    $stmt = $db->prepare($totalQuery);
    $stmt->execute();
    $total = $stmt->fetch()['total'];
    
    // الطلاب حسب الجنس
    $genderQuery = "
        SELECT 
            up.gender,
            COUNT(*) as count
        FROM core_student s
        JOIN core_userprofile up ON s.user_profile_id = up.id
        GROUP BY up.gender
    ";
    $stmt = $db->prepare($genderQuery);
    $stmt->execute();
    $genderStats = $stmt->fetchAll();
    
    // الطلاب حسب الصف
    $gradeQuery = "
        SELECT 
            g.name as grade_name,
            COUNT(s.id) as count
        FROM core_student s
        JOIN core_schoolclass sc ON s.school_class_id = sc.id
        JOIN core_grade g ON sc.grade_id = g.id
        GROUP BY g.id, g.name
        ORDER BY g.level
    ";
    $stmt = $db->prepare($gradeQuery);
    $stmt->execute();
    $gradeStats = $stmt->fetchAll();
    
    return [
        'total' => $total,
        'by_gender' => $genderStats,
        'by_grade' => $gradeStats
    ];
}
            break;
            
        case 'add_student':
            addStudent($pdo, $teacher_id);
            break;
            
        case 'update_student':
            updateStudent($pdo, $teacher_id);
            break;
            
        case 'delete_student':
            deleteStudent($pdo, $teacher_id);
            break;
            
        case 'get_classes':
            getTeacherClasses($pdo, $teacher_id);
            break;
            
        case 'search_students':
            searchStudents($pdo, $teacher_id);
            break;
            
        default:
            http_response_code(400);
            echo json_encode(['error' => 'إجراء غير صحيح']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'خطأ في الخادم: ' . $e->getMessage()]);
}

/**
 * جلب قائمة الطلاب
 */
function getStudents($pdo, $teacher_id) {
    $class_id = $_GET['class_id'] ?? '';
    $page = (int)($_GET['page'] ?? 1);
    $limit = (int)($_GET['limit'] ?? 20);
    $offset = ($page - 1) * $limit;
    
    $where_clause = "WHERE tc.teacher_id = ?";
    $params = [$teacher_id];
    
    if ($class_id) {
        $where_clause .= " AND s.school_class_id = ?";
        $params[] = $class_id;
    }
    
    // جلب الطلاب
    $sql = "
        SELECT 
            s.id,
            s.student_id,
            up.arabic_first_name,
            up.arabic_last_name,
            up.national_id,
            up.phone,
            up.email,
            up.date_of_birth,
            up.gender,
            up.address,
            s.enrollment_date,
            s.guardian_name,
            s.guardian_phone,
            s.guardian_email,
            sc.name as class_name,
            g.name as grade_name,
            up.is_active
        FROM students s
        JOIN user_profiles up ON s.user_profile_id = up.id
        JOIN school_classes sc ON s.school_class_id = sc.id
        JOIN grades g ON sc.grade_id = g.id
        JOIN teacher_classes tc ON tc.school_class_id = sc.id
        $where_clause
        ORDER BY up.arabic_first_name, up.arabic_last_name
        LIMIT $limit OFFSET $offset
    ";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // عدد الطلاب الإجمالي
    $count_sql = "
        SELECT COUNT(s.id) as total
        FROM students s
        JOIN school_classes sc ON s.school_class_id = sc.id
        JOIN teacher_classes tc ON tc.school_class_id = sc.id
        $where_clause
    ";
    
    $count_stmt = $pdo->prepare($count_sql);
    $count_stmt->execute($params);
    $total = $count_stmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    echo json_encode([
        'success' => true,
        'students' => $students,
        'pagination' => [
            'current_page' => $page,
            'total_pages' => ceil($total / $limit),
            'total_records' => $total,
            'limit' => $limit
        ]
    ]);
}

/**
 * جلب بيانات طالب واحد
 */
function getStudent($pdo, $student_id, $teacher_id) {
    $sql = "
        SELECT 
            s.*,
            up.username,
            up.arabic_first_name,
            up.arabic_last_name,
            up.national_id,
            up.phone,
            up.email,
            up.address,
            up.date_of_birth,
            up.gender,
            up.is_active,
            sc.name as class_name,
            g.name as grade_name
        FROM students s
        JOIN user_profiles up ON s.user_profile_id = up.id
        JOIN school_classes sc ON s.school_class_id = sc.id
        JOIN grades g ON sc.grade_id = g.id
        JOIN teacher_classes tc ON tc.school_class_id = sc.id
        WHERE s.id = ? AND tc.teacher_id = ?
    ";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$student_id, $teacher_id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($student) {
        echo json_encode(['success' => true, 'student' => $student]);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'الطالب غير موجود']);
    }
}

/**
 * إضافة طالب جديد
 */
function addStudent($pdo, $teacher_id) {
    $data = json_decode(file_get_contents('php://input'), true);
    
    // التحقق من البيانات المطلوبة
    $required = ['arabic_first_name', 'arabic_last_name', 'national_id', 'phone', 'date_of_birth', 
                'gender', 'school_class_id', 'guardian_name', 'guardian_phone'];
    
    foreach ($required as $field) {
        if (empty($data[$field])) {
            http_response_code(400);
            echo json_encode(['error' => "الحقل $field مطلوب"]);
            return;
        }
    }
    
    // التحقق من أن المدرس يدرس هذا الفصل
    $class_check = $pdo->prepare("SELECT id FROM teacher_classes WHERE teacher_id = ? AND school_class_id = ?");
    $class_check->execute([$teacher_id, $data['school_class_id']]);
    if (!$class_check->fetch()) {
        http_response_code(403);
        echo json_encode(['error' => 'لا يمكنك إضافة طلاب لهذا الفصل']);
        return;
    }
    
    $pdo->beginTransaction();
    
    try {
        // إنشاء username تلقائي
        $username = strtolower(
            transliterate($data['arabic_first_name']) . '.' . 
            transliterate($data['arabic_last_name']) . '.' . 
            substr($data['national_id'], -4)
        );
        
        // إضافة الملف الشخصي
        $profile_sql = "
            INSERT INTO user_profiles 
            (username, password_hash, email, arabic_first_name, arabic_last_name, 
             national_id, phone, address, date_of_birth, gender, role)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'student')
        ";
        
        $email = $data['email'] ?? $username . '@student.school.iq';
        $password_hash = password_hash('student123', PASSWORD_DEFAULT); // كلمة مرور افتراضية
        
        $stmt = $pdo->prepare($profile_sql);
        $stmt->execute([
            $username,
            $password_hash,
            $email,
            $data['arabic_first_name'],
            $data['arabic_last_name'],
            $data['national_id'],
            $data['phone'],
            $data['address'] ?? '',
            $data['date_of_birth'],
            $data['gender']
        ]);
        
        $profile_id = $pdo->lastInsertId();
        
        // توليد رقم طالب
        $student_number = generateStudentNumber($pdo);
        
        // إضافة الطالب
        $student_sql = "
            INSERT INTO students 
            (user_profile_id, student_id, school_class_id, enrollment_date, 
             guardian_name, guardian_phone, guardian_email, guardian_relationship, emergency_contact)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ";
        
        $stmt = $pdo->prepare($student_sql);
        $stmt->execute([
            $profile_id,
            $student_number,
            $data['school_class_id'],
            $data['enrollment_date'] ?? date('Y-m-d'),
            $data['guardian_name'],
            $data['guardian_phone'],
            $data['guardian_email'] ?? '',
            $data['guardian_relationship'] ?? 'الوالد',
            $data['emergency_contact'] ?? $data['guardian_phone']
        ]);
        
        $student_id = $pdo->lastInsertId();
        
        $pdo->commit();
        
        echo json_encode([
            'success' => true,
            'message' => 'تم إضافة الطالب بنجاح',
            'student_id' => $student_id,
            'student_number' => $student_number,
            'username' => $username
        ]);
        
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

/**
 * تحديث بيانات طالب
 */
function updateStudent($pdo, $teacher_id) {
    $data = json_decode(file_get_contents('php://input'), true);
    $student_id = $data['student_id'] ?? '';
    
    if (!$student_id) {
        http_response_code(400);
        echo json_encode(['error' => 'معرف الطالب مطلوب']);
        return;
    }
    
    // التحقق من صلاحية المدرس
    $check_sql = "
        SELECT s.user_profile_id 
        FROM students s
        JOIN school_classes sc ON s.school_class_id = sc.id
        JOIN teacher_classes tc ON tc.school_class_id = sc.id
        WHERE s.id = ? AND tc.teacher_id = ?
    ";
    
    $stmt = $pdo->prepare($check_sql);
    $stmt->execute([$student_id, $teacher_id]);
    $student = $stmt->fetch();
    
    if (!$student) {
        http_response_code(404);
        echo json_encode(['error' => 'الطالب غير موجود أو لا تملك صلاحية تعديله']);
        return;
    }
    
    $pdo->beginTransaction();
    
    try {
        // تحديث الملف الشخصي
        if (isset($data['arabic_first_name']) || isset($data['arabic_last_name']) || 
            isset($data['phone']) || isset($data['address'])) {
            
            $profile_updates = [];
            $profile_params = [];
            
            if (isset($data['arabic_first_name'])) {
                $profile_updates[] = "arabic_first_name = ?";
                $profile_params[] = $data['arabic_first_name'];
            }
            
            if (isset($data['arabic_last_name'])) {
                $profile_updates[] = "arabic_last_name = ?";
                $profile_params[] = $data['arabic_last_name'];
            }
            
            if (isset($data['phone'])) {
                $profile_updates[] = "phone = ?";
                $profile_params[] = $data['phone'];
            }
            
            if (isset($data['address'])) {
                $profile_updates[] = "address = ?";
                $profile_params[] = $data['address'];
            }
            
            if (!empty($profile_updates)) {
                $profile_params[] = $student['user_profile_id'];
                $profile_sql = "UPDATE user_profiles SET " . implode(', ', $profile_updates) . " WHERE id = ?";
                $stmt = $pdo->prepare($profile_sql);
                $stmt->execute($profile_params);
            }
        }
        
        // تحديث بيانات الطالب
        if (isset($data['guardian_name']) || isset($data['guardian_phone']) || 
            isset($data['guardian_email']) || isset($data['school_class_id'])) {
            
            $student_updates = [];
            $student_params = [];
            
            if (isset($data['guardian_name'])) {
                $student_updates[] = "guardian_name = ?";
                $student_params[] = $data['guardian_name'];
            }
            
            if (isset($data['guardian_phone'])) {
                $student_updates[] = "guardian_phone = ?";
                $student_params[] = $data['guardian_phone'];
            }
            
            if (isset($data['guardian_email'])) {
                $student_updates[] = "guardian_email = ?";
                $student_params[] = $data['guardian_email'];
            }
            
            if (isset($data['school_class_id'])) {
                // التحقق من أن المدرس يدرس الفصل الجديد
                $class_check = $pdo->prepare("SELECT id FROM teacher_classes WHERE teacher_id = ? AND school_class_id = ?");
                $class_check->execute([$teacher_id, $data['school_class_id']]);
                if (!$class_check->fetch()) {
                    throw new Exception('لا يمكنك نقل الطالب لهذا الفصل');
                }
                
                $student_updates[] = "school_class_id = ?";
                $student_params[] = $data['school_class_id'];
            }
            
            if (!empty($student_updates)) {
                $student_params[] = $student_id;
                $student_sql = "UPDATE students SET " . implode(', ', $student_updates) . " WHERE id = ?";
                $stmt = $pdo->prepare($student_sql);
                $stmt->execute($student_params);
            }
        }
        
        $pdo->commit();
        
        echo json_encode([
            'success' => true,
            'message' => 'تم تحديث بيانات الطالب بنجاح'
        ]);
        
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

/**
 * حذف طالب
 */
function deleteStudent($pdo, $teacher_id) {
    $student_id = $_POST['student_id'] ?? '';
    
    if (!$student_id) {
        http_response_code(400);
        echo json_encode(['error' => 'معرف الطالب مطلوب']);
        return;
    }
    
    // التحقق من صلاحية المدرس
    $check_sql = "
        SELECT s.user_profile_id 
        FROM students s
        JOIN school_classes sc ON s.school_class_id = sc.id
        JOIN teacher_classes tc ON tc.school_class_id = sc.id
        WHERE s.id = ? AND tc.teacher_id = ?
    ";
    
    $stmt = $pdo->prepare($check_sql);
    $stmt->execute([$student_id, $teacher_id]);
    $student = $stmt->fetch();
    
    if (!$student) {
        http_response_code(404);
        echo json_encode(['error' => 'الطالب غير موجود أو لا تملك صلاحية حذفه']);
        return;
    }
    
    // حذف الطالب (سيحذف الملف الشخصي تلقائياً بسبب CASCADE)
    $delete_sql = "DELETE FROM students WHERE id = ?";
    $stmt = $pdo->prepare($delete_sql);
    $stmt->execute([$student_id]);
    
    echo json_encode([
        'success' => true,
        'message' => 'تم حذف الطالب بنجاح'
    ]);
}

/**
 * جلب فصول المدرس
 */
function getTeacherClasses($pdo, $teacher_id) {
    $sql = "
        SELECT DISTINCT
            sc.id,
            sc.name as class_name,
            g.name as grade_name,
            g.level,
            COUNT(s.id) as student_count
        FROM school_classes sc
        JOIN grades g ON sc.grade_id = g.id
        JOIN teacher_classes tc ON tc.school_class_id = sc.id
        LEFT JOIN students s ON s.school_class_id = sc.id
        WHERE tc.teacher_id = ?
        GROUP BY sc.id, sc.name, g.name, g.level
        ORDER BY g.level, sc.name
    ";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$teacher_id]);
    $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'classes' => $classes
    ]);
}

/**
 * البحث في الطلاب
 */
function searchStudents($pdo, $teacher_id) {
    $query = $_GET['q'] ?? '';
    $class_id = $_GET['class_id'] ?? '';
    
    if (strlen($query) < 2) {
        echo json_encode(['success' => true, 'students' => []]);
        return;
    }
    
    $where_clause = "WHERE tc.teacher_id = ? AND (
        up.arabic_first_name LIKE ? OR 
        up.arabic_last_name LIKE ? OR 
        s.student_id LIKE ? OR
        up.national_id LIKE ?
    )";
    
    $params = [$teacher_id, "%$query%", "%$query%", "%$query%", "%$query%"];
    
    if ($class_id) {
        $where_clause .= " AND s.school_class_id = ?";
        $params[] = $class_id;
    }
    
    $sql = "
        SELECT 
            s.id,
            s.student_id,
            up.arabic_first_name,
            up.arabic_last_name,
            sc.name as class_name,
            g.name as grade_name
        FROM students s
        JOIN user_profiles up ON s.user_profile_id = up.id
        JOIN school_classes sc ON s.school_class_id = sc.id
        JOIN grades g ON sc.grade_id = g.id
        JOIN teacher_classes tc ON tc.school_class_id = sc.id
        $where_clause
        ORDER BY up.arabic_first_name, up.arabic_last_name
        LIMIT 10
    ";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'students' => $students
    ]);
}

/**
 * توليد رقم طالب فريد
 */
function generateStudentNumber($pdo) {
    $year = date('Y');
    $prefix = substr($year, -2);
    
    // البحث عن أعلى رقم في هذا العام
    $sql = "SELECT student_id FROM students WHERE student_id LIKE ? ORDER BY student_id DESC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$prefix . '%']);
    $last_number = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($last_number) {
        $number = (int)substr($last_number['student_id'], 2) + 1;
    } else {
        $number = 1;
    }
    
    return $prefix . str_pad($number, 4, '0', STR_PAD_LEFT);
}

/**
 * تحويل النص العربي إلى أحرف لاتينية للـ username
 */
function transliterate($arabic) {
    $transliteration = [
        'ا' => 'a', 'ب' => 'b', 'ت' => 't', 'ث' => 'th', 'ج' => 'j',
        'ح' => 'h', 'خ' => 'kh', 'د' => 'd', 'ذ' => 'th', 'ر' => 'r',
        'ز' => 'z', 'س' => 's', 'ش' => 'sh', 'ص' => 's', 'ض' => 'd',
        'ط' => 't', 'ظ' => 'z', 'ع' => 'a', 'غ' => 'gh', 'ف' => 'f',
        'ق' => 'q', 'ك' => 'k', 'ل' => 'l', 'م' => 'm', 'ن' => 'n',
        'ه' => 'h', 'و' => 'w', 'ي' => 'y', 'ى' => 'a', 'ة' => 'h',
        'أ' => 'a', 'إ' => 'i', 'آ' => 'a', 'ؤ' => 'w', 'ئ' => 'y'
    ];
    
    $result = '';
    for ($i = 0; $i < mb_strlen($arabic); $i++) {
        $char = mb_substr($arabic, $i, 1);
        $result .= $transliteration[$char] ?? $char;
    }
    
    return $result;
}
?>
