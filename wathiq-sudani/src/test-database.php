<?php
/**
 * اختبار الاتصال بقاعدة البيانات
 * Database Connection Test
 */

// تحديد إعدادات الاتصال
$db_config = [
    'host' => 'localhost',
    'dbname' => 'student_management',
    'username' => 'postgres',
    'password' => '', // قد تحتاج لإدخال كلمة المرور
    'port' => '5432'
];

echo "=== اختبار الاتصال بقاعدة البيانات ===\n";
echo "الخادم: {$db_config['host']}:{$db_config['port']}\n";
echo "قاعدة البيانات: {$db_config['dbname']}\n";
echo "المستخدم: {$db_config['username']}\n\n";

try {
    // محاولة الاتصال
    $dsn = "pgsql:host={$db_config['host']};port={$db_config['port']};dbname={$db_config['dbname']}";
    $pdo = new PDO($dsn, $db_config['username'], $db_config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    echo "✅ تم الاتصال بقاعدة البيانات بنجاح!\n\n";
    
    // اختبار الجداول الموجودة
    echo "📊 الجداول الموجودة:\n";
    $stmt = $pdo->query("SELECT tablename FROM pg_tables WHERE schemaname = 'public' ORDER BY tablename");
    $tables = $stmt->fetchAll();
    
    if (count($tables) > 0) {
        foreach ($tables as $table) {
            echo "  - {$table['tablename']}\n";
        }
    } else {
        echo "  ❌ لا توجد جداول. يجب تنفيذ مخطط قاعدة البيانات أولاً.\n";
        echo "  تشغيل: psql -d student_management -f ../supabase_schema.sql\n";
    }
    
    echo "\n";
    
    // اختبار وجود البيانات
    if (count($tables) > 0) {
        echo "👥 اختبار البيانات:\n";
        
        try {
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM user_profiles");
            $count = $stmt->fetch()['count'];
            echo "  - المستخدمون: {$count}\n";
        } catch (Exception $e) {
            echo "  - المستخدمون: غير متاح\n";
        }
        
        try {
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM teachers");
            $count = $stmt->fetch()['count'];
            echo "  - المدرسون: {$count}\n";
        } catch (Exception $e) {
            echo "  - المدرسون: غير متاح\n";
        }
        
        try {
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM students");
            $count = $stmt->fetch()['count'];
            echo "  - الطلاب: {$count}\n";
        } catch (Exception $e) {
            echo "  - الطلاب: غير متاح\n";
        }
        
        try {
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM subjects");
            $count = $stmt->fetch()['count'];
            echo "  - المواد: {$count}\n";
        } catch (Exception $e) {
            echo "  - المواد: غير متاح\n";
        }
    }
    
} catch (PDOException $e) {
    echo "❌ فشل الاتصال بقاعدة البيانات!\n";
    echo "الخطأ: " . $e->getMessage() . "\n\n";
    
    echo "💡 نصائح لحل المشكلة:\n";
    echo "1. تأكد من تشغيل PostgreSQL:\n";
    echo "   brew services start postgresql  # على macOS\n";
    echo "   sudo systemctl start postgresql  # على Linux\n\n";
    
    echo "2. تأكد من وجود قاعدة البيانات:\n";
    echo "   createdb student_management\n\n";
    
    echo "3. تأكد من صحة كلمة المرور (إذا كانت مطلوبة)\n\n";
    
    echo "4. تحقق من إعدادات PostgreSQL:\n";
    echo "   psql -l  # لعرض قواعد البيانات المتاحة\n";
}

echo "\n=== انتهاء الاختبار ===\n";
?>
