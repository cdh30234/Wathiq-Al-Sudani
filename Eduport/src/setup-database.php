<?php
/**
 * ملف إعداد قاعدة البيانات
 * تشغيل هذا الملف لإنشاء قاعدة البيانات وملءها بالبيانات التجريبية
 */

echo "<!DOCTYPE html>\n";
echo "<html dir='rtl'>\n";
echo "<head><meta charset='UTF-8'><title>إعداد قاعدة البيانات</title></head>\n";
echo "<body style='font-family: Arial; direction: rtl; text-align: right; padding: 20px;'>\n";
echo "<h1>🚀 إعداد قاعدة البيانات لمتوسطة الشهيد كاظم جلاب الحيدري</h1>\n";

try {
    // 1. إنشاء قاعدة البيانات والجداول
    echo "<h2>📊 إنشاء قاعدة البيانات والجداول...</h2>\n";
    require_once 'backend/create_database.php';
    echo "<p style='color: green;'>✅ تم إنشاء قاعدة البيانات بنجاح!</p>\n";
    
    // 2. ملء قاعدة البيانات بالبيانات التجريبية
    echo "<h2>📝 إضافة البيانات التجريبية...</h2>\n";
    require_once 'backend/populate_complete_db.php';
    echo "<p style='color: green;'>✅ تم إضافة البيانات التجريبية بنجاح!</p>\n";
    
    // 3. إنشاء المستخدمين التجريبيين
    echo "<h2>👥 إنشاء المستخدمين التجريبيين...</h2>\n";
    require_once 'backend/create_demo_users.py'; // سنحتاج لتحويل هذا لـ PHP
    
    echo "<div style='background: #e8f5e8; padding: 15px; border-radius: 5px; margin: 20px 0;'>\n";
    echo "<h3>🎉 تم إعداد النظام بنجاح!</h3>\n";
    echo "<p><strong>يمكنك الآن تسجيل الدخول باستخدام:</strong></p>\n";
    echo "<ul>\n";
    echo "<li><strong>مدرس:</strong> teacher@school.com / password123</li>\n";
    echo "<li><strong>طالب:</strong> student@school.com / password123</li>\n";
    echo "<li><strong>مدير:</strong> admin@school.com / password123</li>\n";
    echo "</ul>\n";
    echo "<a href='sign-in.php' style='background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>🔐 تسجيل الدخول</a>\n";
    echo "</div>\n";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ خطأ: " . $e->getMessage() . "</p>\n";
    echo "<p>تفاصيل الخطأ:</p>\n";
    echo "<pre style='background: #f8f8f8; padding: 10px; border: 1px solid #ddd;'>" . $e->getTraceAsString() . "</pre>\n";
}

echo "</body>\n";
echo "</html>\n";
?>
