<?php
require_once 'api-config.php';

echo "<h2>🔬 اختبار شامل للنظام</h2>";

// قسم 1: معلومات الجلسة
echo "<div style='border: 2px solid #007bff; padding: 20px; margin: 10px 0;'>";
echo "<h3>📊 معلومات الجلسة</h3>";
echo "<strong>معرف الجلسة:</strong> " . session_id() . "<br>";
echo "<strong>حالة الجلسة:</strong> " . (session_status() == PHP_SESSION_ACTIVE ? '✅ نشطة' : '❌ غير نشطة') . "<br>";
echo "<strong>بيانات الجلسة:</strong><br>";
echo "<pre style='background: #f8f9fa; padding: 10px; border-radius: 5px;'>";
print_r($_SESSION);
echo "</pre>";
echo "</div>";

// قسم 2: اختبار الوظائف
echo "<div style='border: 2px solid #28a745; padding: 20px; margin: 10px 0;'>";
echo "<h3>🔧 اختبار الوظائف</h3>";
echo "<strong>isLoggedIn():</strong> " . (isLoggedIn() ? '✅ true' : '❌ false') . "<br>";

if (isLoggedIn()) {
    $user = getCurrentUser();
    echo "<strong>getCurrentUser():</strong><br>";
    echo "<pre style='background: #d4edda; padding: 10px; border-radius: 5px;'>";
    print_r($user);
    echo "</pre>";
    
    echo "<strong>hasRole('admin'):</strong> " . (hasRole('admin') ? '✅ true' : '❌ false') . "<br>";
    echo "<strong>hasRole('teacher'):</strong> " . (hasRole('teacher') ? '✅ true' : '❌ false') . "<br>";
    echo "<strong>hasRole('student'):</strong> " . (hasRole('student') ? '✅ true' : '❌ false') . "<br>";
} else {
    echo "<div style='color: #dc3545;'><strong>❌ لا يوجد مستخدم مسجل دخول</strong></div>";
}
echo "</div>";

// قسم 3: اختبار تسجيل الدخول
if ($_POST) {
    echo "<div style='border: 2px solid #ffc107; padding: 20px; margin: 10px 0;'>";
    echo "<h3>🔐 نتيجة تسجيل الدخول</h3>";
    
    $username = $_POST['test_username'] ?? '';
    $password = $_POST['test_password'] ?? '';
    
    echo "<strong>اسم المستخدم:</strong> " . htmlspecialchars($username) . "<br>";
    echo "<strong>كلمة المرور:</strong> " . str_repeat('*', strlen($password)) . "<br><br>";
    
    if (loginUser($username, $password)) {
        echo "<div style='color: #28a745; font-weight: bold;'>✅ تم تسجيل الدخول بنجاح!</div>";
        $user = getCurrentUser();
        echo "<strong>بيانات المستخدم:</strong><br>";
        echo "<pre style='background: #d4edda; padding: 10px; border-radius: 5px;'>";
        print_r($user);
        echo "</pre>";
        
        // اختبار الصلاحيات مباشرة
        echo "<strong>اختبار الصلاحيات:</strong><br>";
        echo "- isLoggedIn(): " . (isLoggedIn() ? '✅' : '❌') . "<br>";
        echo "- hasRole('admin'): " . (hasRole('admin') ? '✅' : '❌') . "<br>";
        echo "- hasRole('teacher'): " . (hasRole('teacher') ? '✅' : '❌') . "<br>";
        echo "- hasRole('student'): " . (hasRole('student') ? '✅' : '❌') . "<br>";
        
    } else {
        echo "<div style='color: #dc3545; font-weight: bold;'>❌ فشل تسجيل الدخول!</div>";
    }
    echo "</div>";
}

?>

<!-- نموذج اختبار تسجيل الدخول -->
<div style='border: 2px solid #17a2b8; padding: 20px; margin: 10px 0;'>
    <h3>🧪 اختبار تسجيل الدخول</h3>
    <form method="POST" style="background: #e7f3ff; padding: 15px; border-radius: 5px;">
        <div style="margin: 10px 0;">
            <label><strong>اسم المستخدم:</strong></label><br>
            <select name="test_username" style="width: 250px; padding: 5px;">
                <option value="admin">admin (مدير)</option>
                <option value="math_teacher">math_teacher (مدرس)</option>
                <option value="student001">student001 (طالب)</option>
            </select>
        </div>
        
        <div style="margin: 10px 0;">
            <label><strong>كلمة المرور:</strong></label><br>
            <select name="test_password" style="width: 250px; padding: 5px;">
                <option value="admin123">admin123</option>
                <option value="teacher123">teacher123</option>
                <option value="student123">student123</option>
            </select>
        </div>
        
        <button type="submit" style="background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            🔐 اختبار تسجيل الدخول
        </button>
    </form>
</div>

<!-- روابط الاختبار -->
<div style='border: 2px solid #6c757d; padding: 20px; margin: 10px 0;'>
    <h3>🔗 روابط الاختبار</h3>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <a href="student-dashboard.php" style="display: block; padding: 10px; background: #007bff; color: white; text-decoration: none; text-align: center; border-radius: 5px;">لوحة الطالب</a>
        <a href="instructor-dashboard.php" style="display: block; padding: 10px; background: #28a745; color: white; text-decoration: none; text-align: center; border-radius: 5px;">لوحة المدرس</a>
        <a href="admin-dashboard.php" style="display: block; padding: 10px; background: #dc3545; color: white; text-decoration: none; text-align: center; border-radius: 5px;">لوحة المدير</a>
        <a href="sign-in.php" style="display: block; padding: 10px; background: #6c757d; color: white; text-decoration: none; text-align: center; border-radius: 5px;">صفحة تسجيل الدخول</a>
    </div>
</div>

<!-- زر تسجيل الخروج -->
<div style='text-align: center; margin: 20px 0;'>
    <a href="sign-in.php?logout=1" style="background: #dc3545; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
        🚪 تسجيل الخروج
    </a>
</div>

<script>
// تحديث الصفحة كل 30 ثانية لرؤية التغييرات
setTimeout(() => {
    if (!document.querySelector('form').contains(document.activeElement)) {
        location.reload();
    }
}, 30000);
</script>
