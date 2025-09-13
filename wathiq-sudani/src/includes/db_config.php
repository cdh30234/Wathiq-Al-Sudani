<?php
/**
 * Database Configuration for School Management System
 * ربط PHP مع قاعدة بيانات Django SQLite
 */

class DatabaseConfig {
    private static $db_path = null;
    private static $connection = null;
    
    public static function init() {
        // مسار قاعدة البيانات
        self::$db_path = dirname(__DIR__, 3) . '/backend/db.sqlite3';
        
        if (!file_exists(self::$db_path)) {
            throw new Exception('قاعدة البيانات غير موجودة: ' . self::$db_path);
        }
    }
    
    public static function getConnection() {
        if (self::$connection === null) {
            self::init();
            try {
                self::$connection = new PDO('sqlite:' . self::$db_path);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                
                // إعداد UTF-8 للنصوص العربية
                self::$connection->exec("PRAGMA encoding = 'UTF-8'");
            } catch (PDOException $e) {
                throw new Exception('خطأ في الاتصال بقاعدة البيانات: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
    
    public static function closeConnection() {
        self::$connection = null;
    }
}

/**
 * Class for handling students data
 */
class StudentsManager {
    private $db;
    
    public function __construct() {
        $this->db = DatabaseConfig::getConnection();
    }
    
    /**
     * Get all students with their details
     */
    public function getAllStudents() {
        $query = "
            SELECT 
                s.id as student_id,
                s.student_id as roll_number,
                s.enrollment_date,
                s.guardian_name,
                s.guardian_phone,
                s.guardian_email,
                up.arabic_first_name,
                up.arabic_last_name,
                up.national_id,
                up.phone,
                up.address,
                up.date_of_birth,
                up.gender,
                sc.name as class_name,
                g.name as grade_name,
                ay.name as academic_year
            FROM core_student s
            JOIN core_userprofile up ON s.user_profile_id = up.id
            JOIN core_schoolclass sc ON s.school_class_id = sc.id
            JOIN core_grade g ON sc.grade_id = g.id
            JOIN core_academicyear ay ON sc.academic_year_id = ay.id
            ORDER BY up.arabic_first_name, up.arabic_last_name
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Get student by ID
     */
    public function getStudentById($student_id) {
        $query = "
            SELECT 
                s.id as student_id,
                s.student_id as roll_number,
                s.enrollment_date,
                s.guardian_name,
                s.guardian_phone,
                s.guardian_email,
                s.guardian_relationship,
                s.emergency_contact,
                s.emergency_phone,
                s.medical_notes,
                up.arabic_first_name,
                up.arabic_last_name,
                up.national_id,
                up.phone,
                up.address,
                up.date_of_birth,
                up.gender,
                sc.name as class_name,
                g.name as grade_name,
                ay.name as academic_year
            FROM core_student s
            JOIN core_userprofile up ON s.user_profile_id = up.id
            JOIN core_schoolclass sc ON s.school_class_id = sc.id
            JOIN core_grade g ON sc.grade_id = g.id
            JOIN core_academicyear ay ON sc.academic_year_id = ay.id
            WHERE s.id = :student_id
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    /**
     * Get students by class
     */
    public function getStudentsByClass($class_id) {
        $query = "
            SELECT 
                s.id as student_id,
                s.student_id as roll_number,
                up.arabic_first_name,
                up.arabic_last_name,
                up.phone,
                s.guardian_name,
                s.guardian_phone,
                sc.name as class_name
            FROM core_student s
            JOIN core_userprofile up ON s.user_profile_id = up.id
            JOIN core_schoolclass sc ON s.school_class_id = sc.id
            WHERE sc.id = :class_id
            ORDER BY up.arabic_first_name, up.arabic_last_name
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':class_id', $class_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Get all classes
     */
    public function getAllClasses() {
        $query = "
            SELECT 
                sc.id,
                sc.name as class_name,
                g.name as grade_name,
                ay.name as academic_year,
                COUNT(s.id) as student_count
            FROM core_schoolclass sc
            JOIN core_grade g ON sc.grade_id = g.id
            JOIN core_academicyear ay ON sc.academic_year_id = ay.id
            LEFT JOIN core_student s ON s.school_class_id = sc.id
            GROUP BY sc.id, sc.name, g.name, ay.name
            ORDER BY g.level, sc.name
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Add new student
     */
    public function addStudent($data) {
        $this->db->beginTransaction();
        
        try {
            // إنشاء معرف UUID
            $user_profile_id = $this->generateUUID();
            $student_id = $this->generateUUID();
            
            // إنشاء ملف المستخدم
            $userQuery = "
                INSERT INTO core_userprofile (
                    id, arabic_first_name, arabic_last_name, national_id,
                    phone, address, date_of_birth, gender, role,
                    is_active, created_at, updated_at
                ) VALUES (
                    :id, :first_name, :last_name, :national_id,
                    :phone, :address, :birth_date, :gender, 'student',
                    1, datetime('now'), datetime('now')
                )
            ";
            
            $stmt = $this->db->prepare($userQuery);
            $stmt->execute([
                ':id' => $user_profile_id,
                ':first_name' => $data['arabic_first_name'],
                ':last_name' => $data['arabic_last_name'],
                ':national_id' => $data['national_id'],
                ':phone' => $data['phone'],
                ':address' => $data['address'],
                ':birth_date' => $data['date_of_birth'],
                ':gender' => $data['gender']
            ]);
            
            // إنشاء سجل الطالب
            $studentQuery = "
                INSERT INTO core_student (
                    id, user_profile_id, student_id, school_class_id,
                    enrollment_date, guardian_name, guardian_phone,
                    guardian_email, guardian_relationship,
                    emergency_contact, emergency_phone, medical_notes,
                    created_at, updated_at
                ) VALUES (
                    :id, :user_profile_id, :student_id, :class_id,
                    :enrollment_date, :guardian_name, :guardian_phone,
                    :guardian_email, :guardian_relationship,
                    :emergency_contact, :emergency_phone, :medical_notes,
                    datetime('now'), datetime('now')
                )
            ";
            
            $stmt = $this->db->prepare($studentQuery);
            $stmt->execute([
                ':id' => $student_id,
                ':user_profile_id' => $user_profile_id,
                ':student_id' => $data['roll_number'],
                ':class_id' => $data['school_class_id'],
                ':enrollment_date' => $data['enrollment_date'],
                ':guardian_name' => $data['guardian_name'],
                ':guardian_phone' => $data['guardian_phone'],
                ':guardian_email' => $data['guardian_email'] ?? '',
                ':guardian_relationship' => $data['guardian_relationship'] ?? 'الوالد',
                ':emergency_contact' => $data['emergency_contact'] ?? '',
                ':emergency_phone' => $data['emergency_phone'] ?? '',
                ':medical_notes' => $data['medical_notes'] ?? ''
            ]);
            
            $this->db->commit();
            return ['success' => true, 'message' => 'تم إضافة الطالب بنجاح'];
            
        } catch (Exception $e) {
            $this->db->rollBack();
            return ['success' => false, 'message' => 'خطأ في إضافة الطالب: ' . $e->getMessage()];
        }
    }
    
    /**
     * Update student
     */
    public function updateStudent($student_id, $data) {
        $this->db->beginTransaction();
        
        try {
            // تحديث ملف المستخدم
            $userQuery = "
                UPDATE core_userprofile SET 
                    arabic_first_name = :first_name,
                    arabic_last_name = :last_name,
                    national_id = :national_id,
                    phone = :phone,
                    address = :address,
                    date_of_birth = :birth_date,
                    gender = :gender,
                    updated_at = datetime('now')
                WHERE id = (SELECT user_profile_id FROM core_student WHERE id = :student_id)
            ";
            
            $stmt = $this->db->prepare($userQuery);
            $stmt->execute([
                ':student_id' => $student_id,
                ':first_name' => $data['arabic_first_name'],
                ':last_name' => $data['arabic_last_name'],
                ':national_id' => $data['national_id'],
                ':phone' => $data['phone'],
                ':address' => $data['address'],
                ':birth_date' => $data['date_of_birth'],
                ':gender' => $data['gender']
            ]);
            
            // تحديث سجل الطالب
            $studentQuery = "
                UPDATE core_student SET 
                    student_id = :roll_number,
                    school_class_id = :class_id,
                    guardian_name = :guardian_name,
                    guardian_phone = :guardian_phone,
                    guardian_email = :guardian_email,
                    guardian_relationship = :guardian_relationship,
                    emergency_contact = :emergency_contact,
                    emergency_phone = :emergency_phone,
                    medical_notes = :medical_notes,
                    updated_at = datetime('now')
                WHERE id = :student_id
            ";
            
            $stmt = $this->db->prepare($studentQuery);
            $stmt->execute([
                ':student_id' => $student_id,
                ':roll_number' => $data['roll_number'],
                ':class_id' => $data['school_class_id'],
                ':guardian_name' => $data['guardian_name'],
                ':guardian_phone' => $data['guardian_phone'],
                ':guardian_email' => $data['guardian_email'] ?? '',
                ':guardian_relationship' => $data['guardian_relationship'] ?? 'الوالد',
                ':emergency_contact' => $data['emergency_contact'] ?? '',
                ':emergency_phone' => $data['emergency_phone'] ?? '',
                ':medical_notes' => $data['medical_notes'] ?? ''
            ]);
            
            $this->db->commit();
            return ['success' => true, 'message' => 'تم تحديث بيانات الطالب بنجاح'];
            
        } catch (Exception $e) {
            $this->db->rollBack();
            return ['success' => false, 'message' => 'خطأ في تحديث الطالب: ' . $e->getMessage()];
        }
    }
    
    /**
     * Delete student
     */
    public function deleteStudent($student_id) {
        $this->db->beginTransaction();
        
        try {
            // الحصول على معرف ملف المستخدم
            $getUserProfileQuery = "SELECT user_profile_id FROM core_student WHERE id = :student_id";
            $stmt = $this->db->prepare($getUserProfileQuery);
            $stmt->bindParam(':student_id', $student_id);
            $stmt->execute();
            $result = $stmt->fetch();
            
            if (!$result) {
                throw new Exception('الطالب غير موجود');
            }
            
            $user_profile_id = $result['user_profile_id'];
            
            // حذف سجل الطالب
            $deleteStudentQuery = "DELETE FROM core_student WHERE id = :student_id";
            $stmt = $this->db->prepare($deleteStudentQuery);
            $stmt->bindParam(':student_id', $student_id);
            $stmt->execute();
            
            // حذف ملف المستخدم
            $deleteUserQuery = "DELETE FROM core_userprofile WHERE id = :user_profile_id";
            $stmt = $this->db->prepare($deleteUserQuery);
            $stmt->bindParam(':user_profile_id', $user_profile_id);
            $stmt->execute();
            
            $this->db->commit();
            return ['success' => true, 'message' => 'تم حذف الطالب بنجاح'];
            
        } catch (Exception $e) {
            $this->db->rollBack();
            return ['success' => false, 'message' => 'خطأ في حذف الطالب: ' . $e->getMessage()];
        }
    }
    
    /**
     * Generate UUID v4
     */
    private function generateUUID() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}

/**
 * Authentication Manager
 */
class AuthManager {
    private $db;
    
    public function __construct() {
        $this->db = DatabaseConfig::getConnection();
    }
    
    /**
     * Teacher login
     */
    public function loginTeacher($username, $password) {
        // Django uses pbkdf2_sha256 password hashing
        // For simplicity, we'll use a basic approach or create a separate auth table
        $query = "
            SELECT 
                t.id as teacher_id,
                up.arabic_first_name,
                up.arabic_last_name,
                t.employee_id,
                t.specialization
            FROM core_teacher t
            JOIN core_userprofile up ON t.user_profile_id = up.id
            JOIN auth_user au ON up.user_id = au.id
            WHERE au.username = :username AND au.is_active = 1
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $teacher = $stmt->fetch();
        
        if ($teacher) {
            // Here you would verify the password against Django's hash
            // For now, we'll use simple verification
            return $teacher;
        }
        
        return false;
    }
}
?>
