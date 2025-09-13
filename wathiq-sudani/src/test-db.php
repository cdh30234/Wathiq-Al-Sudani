<?php
/**
 * اختبار الاتصال بقاعدة البيانات
 * Database Connection Test
 */

header('Content-Type: text/plain; charset=utf-8');

try {
    require_once 'includes/db_config.php';
    
    echo "🔗 اختبار الاتصال بقاعدة البيانات...\n\n";
    
    // اختبار الاتصال
    $db = DatabaseConfig::getConnection();
    echo "✅ تم الاتصال بقاعدة البيانات بنجاح!\n\n";
    
    // اختبار عدد الطلاب
    $studentsManager = new StudentsManager();
    $students = $studentsManager->getAllStudents();
    echo "👨‍🎓 عدد الطلاب: " . count($students) . "\n\n";
    
    // اختبار عدد الفصول
    $classes = $studentsManager->getAllClasses();
    echo "🏫 عدد الفصول: " . count($classes) . "\n\n";
    
    // عرض أول 3 طلاب
    echo "📋 أول 3 طلاب:\n";
    for ($i = 0; $i < min(3, count($students)); $i++) {
        $student = $students[$i];
        echo ($i + 1) . ". " . $student['arabic_first_name'] . " " . $student['arabic_last_name'] . 
             " - " . $student['roll_number'] . " - " . $student['class_name'] . "\n";
    }
    
    echo "\n🎉 اختبار قاعدة البيانات مكتمل بنجاح!";
    
} catch (Exception $e) {
    echo "❌ خطأ: " . $e->getMessage();
}
?>
