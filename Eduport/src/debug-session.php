<?php
require_once 'api-config.php';

echo "<h2>🔍 تتبع الجلسة</h2>";
echo "<pre>";
echo "الجلسة مبدوءة: " . (session_status() == PHP_SESSION_ACTIVE ? "نعم" : "لا") . "\n";
echo "مُعرف الجلسة: " . session_id() . "\n";
echo "بيانات الجلسة:\n";
print_r($_SESSION);
echo "\n";

$user = getCurrentUser();
echo "المستخدم الحالي:\n";
print_r($user);
echo "\n";

echo "هل المستخدم مسجل؟ " . (isLoggedIn() ? "نعم" : "لا") . "\n";

if ($user) {
    echo "هل هو مدرس؟ " . (hasRole('teacher') ? "نعم" : "لا") . "\n";
    echo "هل هو طالب؟ " . (hasRole('student') ? "نعم" : "لا") . "\n";
    echo "هل هو مدير؟ " . (hasRole('admin') ? "نعم" : "لا") . "\n";
}
echo "</pre>";

echo '<br><a href="sign-in.php">العودة لصفحة تسجيل الدخول</a>';
echo '<br><a href="?logout=1">تسجيل الخروج</a>';

if (isset($_GET['logout'])) {
    logoutUser();
    header('Location: sign-in.php');
    exit;
}
?>
