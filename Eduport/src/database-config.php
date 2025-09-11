<?php
/**
 * إعدادات الاتصال بقاعدة البيانات Supabase
 * Database Connection Configuration for Supabase
 */

class DatabaseConnection {
    private static $instance = null;
    private $pdo;
    
    // إعدادات Supabase
    private const DB_HOST = 'localhost'; // أو رابط Supabase الخاص بك
    private const DB_NAME = 'student_management';
    private const DB_USER = 'postgres';
    private const DB_PASS = '';
    private const DB_PORT = '5432';
    
    private function __construct() {
        try {
            $this->pdo = new PDO(
                "pgsql:host=" . self::DB_HOST . ";port=" . self::DB_PORT . ";dbname=" . self::DB_NAME,
                self::DB_USER,
                self::DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]
            );
        } catch (PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            throw new Exception("فشل الاتصال بقاعدة البيانات");
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->pdo;
    }
}

/**
 * فئة إدارة المدرسين
 * Teachers Management Class
 */
class TeacherManager {
    private $db;
    
    public function __construct() {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }
    
    /**
     * الحصول على معلومات المدرس
     */
    public function getTeacherInfo($teacher_id) {
        try {
            $sql = "
                SELECT 
                    t.id,
                    t.employee_id,
                    up.arabic_first_name,
                    up.arabic_last_name,
                    up.phone,
                    up.address,
                    up.date_of_birth,
                    up.profile_picture,
                    t.specialization,
                    t.qualification,
                    t.experience_years,
                    t.hire_date,
                    CONCAT(up.arabic_first_name, ' ', up.arabic_last_name) as full_name
                FROM teachers t
                JOIN user_profiles up ON t.user_profile_id = up.id
                WHERE t.id = :teacher_id AND up.is_active = true
            ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['teacher_id' => $teacher_id]);
            
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Error fetching teacher info: " . $e->getMessage());
            return null;
        }
    }
    
    /**
     * الحصول على المواد التي يدرسها المدرس
     */
    public function getTeacherSubjects($teacher_id) {
        try {
            $sql = "
                SELECT 
                    s.id,
                    s.name,
                    s.code,
                    s.credit_hours,
                    COUNT(DISTINCT sc.id) as total_classes
                FROM subjects s
                JOIN teacher_subjects ts ON s.id = ts.subject_id
                LEFT JOIN teacher_classes tc ON ts.teacher_id = tc.teacher_id
                LEFT JOIN school_classes sc ON tc.class_id = sc.id
                WHERE ts.teacher_id = :teacher_id
                GROUP BY s.id, s.name, s.code, s.credit_hours
            ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['teacher_id' => $teacher_id]);
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching teacher subjects: " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * الحصول على الفصول التي يدرسها المدرس
     */
    public function getTeacherClasses($teacher_id) {
        try {
            $sql = "
                SELECT 
                    sc.id,
                    sc.name,
                    sc.capacity,
                    sc.classroom_number,
                    g.name as grade_name,
                    ay.name as academic_year,
                    COUNT(DISTINCT st.id) as student_count
                FROM school_classes sc
                JOIN teacher_classes tc ON sc.id = tc.class_id
                JOIN grades g ON sc.grade_id = g.id
                JOIN academic_years ay ON sc.academic_year_id = ay.id
                LEFT JOIN students st ON sc.id = st.school_class_id
                WHERE tc.teacher_id = :teacher_id AND ay.is_current = true
                GROUP BY sc.id, sc.name, sc.capacity, sc.classroom_number, g.name, ay.name
            ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['teacher_id' => $teacher_id]);
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching teacher classes: " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * الحصول على الطلاب المسجلين في فصول المدرس
     */
    public function getTeacherStudents($teacher_id) {
        try {
            $sql = "
                SELECT 
                    st.id,
                    st.student_id,
                    up.arabic_first_name,
                    up.arabic_last_name,
                    up.profile_picture,
                    sc.name as class_name,
                    g.name as grade_name,
                    st.enrollment_date,
                    CONCAT(up.arabic_first_name, ' ', up.arabic_last_name) as full_name
                FROM students st
                JOIN user_profiles up ON st.user_profile_id = up.id
                JOIN school_classes sc ON st.school_class_id = sc.id
                JOIN grades g ON sc.grade_id = g.id
                JOIN teacher_classes tc ON sc.id = tc.class_id
                WHERE tc.teacher_id = :teacher_id AND up.is_active = true
                ORDER BY up.arabic_first_name, up.arabic_last_name
            ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['teacher_id' => $teacher_id]);
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching teacher students: " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * الحصول على إحصائيات المدرس
     */
    public function getTeacherStats($teacher_id) {
        try {
            // إجمالي عدد الطلاب
            $sql_students = "
                SELECT COUNT(DISTINCT st.id) as total_students
                FROM students st
                JOIN school_classes sc ON st.school_class_id = sc.id
                JOIN teacher_classes tc ON sc.id = tc.class_id
                WHERE tc.teacher_id = :teacher_id
            ";
            
            $stmt = $this->db->prepare($sql_students);
            $stmt->execute(['teacher_id' => $teacher_id]);
            $students_count = $stmt->fetch()['total_students'];
            
            // عدد المواد
            $sql_subjects = "
                SELECT COUNT(*) as total_subjects
                FROM teacher_subjects
                WHERE teacher_id = :teacher_id
            ";
            
            $stmt = $this->db->prepare($sql_subjects);
            $stmt->execute(['teacher_id' => $teacher_id]);
            $subjects_count = $stmt->fetch()['total_subjects'];
            
            // عدد الفصول
            $sql_classes = "
                SELECT COUNT(*) as total_classes
                FROM teacher_classes
                WHERE teacher_id = :teacher_id
            ";
            
            $stmt = $this->db->prepare($sql_classes);
            $stmt->execute(['teacher_id' => $teacher_id]);
            $classes_count = $stmt->fetch()['total_classes'];
            
            // متوسط الحضور لهذا الشهر
            $sql_attendance = "
                SELECT 
                    COUNT(CASE WHEN status = 'present' THEN 1 END) as present_count,
                    COUNT(*) as total_attendance
                FROM attendance a
                JOIN students st ON a.student_id = st.id
                JOIN school_classes sc ON st.school_class_id = sc.id
                JOIN teacher_classes tc ON sc.id = tc.class_id
                WHERE tc.teacher_id = :teacher_id 
                AND EXTRACT(MONTH FROM a.date) = EXTRACT(MONTH FROM CURRENT_DATE)
                AND EXTRACT(YEAR FROM a.date) = EXTRACT(YEAR FROM CURRENT_DATE)
            ";
            
            $stmt = $this->db->prepare($sql_attendance);
            $stmt->execute(['teacher_id' => $teacher_id]);
            $attendance_data = $stmt->fetch();
            
            $attendance_rate = 0;
            if ($attendance_data['total_attendance'] > 0) {
                $attendance_rate = round(($attendance_data['present_count'] / $attendance_data['total_attendance']) * 100, 1);
            }
            
            return [
                'total_students' => (int)$students_count,
                'total_subjects' => (int)$subjects_count,
                'total_classes' => (int)$classes_count,
                'attendance_rate' => $attendance_rate
            ];
            
        } catch (PDOException $e) {
            error_log("Error fetching teacher stats: " . $e->getMessage());
            return [
                'total_students' => 0,
                'total_subjects' => 0,
                'total_classes' => 0,
                'attendance_rate' => 0
            ];
        }
    }
    
    /**
     * الحصول على الدروس التي أنشأها المدرس
     */
    public function getTeacherLessons($teacher_id, $limit = 10) {
        try {
            $sql = "
                SELECT 
                    l.id,
                    l.title,
                    l.description,
                    l.file_url,
                    l.file_type,
                    l.is_published,
                    l.publish_date,
                    s.name as subject_name,
                    COUNT(DISTINCT lc.class_id) as class_count
                FROM lessons l
                JOIN subjects s ON l.subject_id = s.id
                LEFT JOIN lesson_classes lc ON l.id = lc.lesson_id
                WHERE l.teacher_id = :teacher_id
                GROUP BY l.id, l.title, l.description, l.file_url, l.file_type, l.is_published, l.publish_date, s.name
                ORDER BY l.publish_date DESC
                LIMIT :limit
            ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'teacher_id' => $teacher_id,
                'limit' => $limit
            ]);
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching teacher lessons: " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * الحصول على آخر الإعلانات للمدرس
     */
    public function getTeacherAnnouncements($teacher_id, $limit = 5) {
        try {
            $sql = "
                SELECT 
                    a.id,
                    a.title,
                    a.content,
                    a.announcement_type,
                    a.is_urgent,
                    a.publish_date,
                    COUNT(DISTINCT ac.class_id) as target_classes
                FROM announcements a
                LEFT JOIN announcement_classes ac ON a.id = ac.announcement_id
                WHERE a.author_id = :teacher_id AND a.is_published = true
                GROUP BY a.id, a.title, a.content, a.announcement_type, a.is_urgent, a.publish_date
                ORDER BY a.publish_date DESC
                LIMIT :limit
            ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'teacher_id' => $teacher_id,
                'limit' => $limit
            ]);
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching teacher announcements: " . $e->getMessage());
            return [];
        }
    }
}

/**
 * دالة للتحقق من صلاحية المدرس
 */
function verifyTeacherAccess($teacher_id) {
    try {
        $db = DatabaseConnection::getInstance()->getConnection();
        
        $sql = "
            SELECT t.id
            FROM teachers t
            JOIN user_profiles up ON t.user_profile_id = up.id
            WHERE t.id = :teacher_id AND up.is_active = true
        ";
        
        $stmt = $db->prepare($sql);
        $stmt->execute(['teacher_id' => $teacher_id]);
        
        return $stmt->fetch() !== false;
    } catch (PDOException $e) {
        error_log("Error verifying teacher access: " . $e->getMessage());
        return false;
    }
}
?>
