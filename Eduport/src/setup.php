<?php
/**
 * إعداد النظام - تشغيل قاعدة البيانات لأول مرة
 * System Setup - First Time Database Installation
 */

// Security check
if ($_SERVER['REQUEST_METHOD'] !== 'GET' && !isset($_GET['action'])) {
    die('غير مسموح بالوصول المباشر');
}

$action = $_GET['action'] ?? 'show_form';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعداد نظام إدارة المدرسة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .setup-card { background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .btn-primary { background: linear-gradient(45deg, #667eea, #764ba2); border: none; }
        .alert { border-radius: 15px; }
        .step { opacity: 0.5; }
        .step.active { opacity: 1; font-weight: bold; }
        .step.completed { color: #28a745; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="setup-card p-5">
                    <div class="text-center mb-4">
                        <h1 class="h2 text-primary">🏫 إعداد نظام إدارة المدرسة</h1>
                        <p class="text-muted">متوسطة الشهيد كاظم جلاب الحيدري المختلطة</p>
                    </div>

                    <?php if ($action === 'show_form'): ?>
                    
                    <!-- خطوات الإعداد -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="step active">
                                    <i class="fas fa-database"></i> إنشاء قاعدة البيانات
                                </div>
                                <div class="step">
                                    <i class="fas fa-users"></i> إضافة البيانات
                                </div>
                                <div class="step">
                                    <i class="fas fa-check-circle"></i> اكتمال الإعداد
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <h5><i class="fas fa-info-circle"></i> معلومات مهمة</h5>
                        <ul class="mb-0">
                            <li>تأكد من تشغيل خادم MySQL/XAMPP</li>
                            <li>سيتم إنشاء قاعدة بيانات باسم <code>school_management</code></li>
                            <li>سيتم إضافة بيانات تجريبية للمدرسة والطلاب</li>
                            <li>يمكنك تسجيل الدخول بحساب المدرس التجريبي</li>
                        </ul>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="?action=create_database" class="btn btn-primary btn-lg">
                            <i class="fas fa-play"></i> بدء إعداد النظام
                        </a>
                        <a href="index-9.php" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-right"></i> العودة للصفحة الرئيسية
                        </a>
                    </div>

                    <?php elseif ($action === 'create_database'): ?>
                    
                    <div class="text-center mb-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">جاري التحميل...</span>
                        </div>
                        <h4 class="mt-3">جاري إنشاء قاعدة البيانات...</h4>
                    </div>

                    <?php
                    try {
                        // تنفيذ إنشاء قاعدة البيانات
                        echo "<div class='console-output p-3 bg-dark text-light rounded mb-3' style='font-family: monospace; max-height: 400px; overflow-y: auto;'>";
                        
                        // إنشاء قاعدة البيانات
                        echo "<div class='text-success'>✓ بدء إنشاء قاعدة البيانات...</div>";
                        
                        // تضمين ملف إنشاء الجداول
                        ob_start();
                        include 'config/create_database.php';
                        $create_output = ob_get_clean();
                        
                        echo "<div class='text-info'>ℹ إنشاء الجداول...</div>";
                        echo "<div class='text-success'>✓ تم إنشاء جميع الجداول بنجاح</div>";
                        
                        // تضمين ملف ملء البيانات
                        ob_start();
                        include 'config/populate_database.php';
                        $populate_output = ob_get_clean();
                        
                        echo "<div class='text-info'>ℹ إضافة البيانات التجريبية...</div>";
                        echo "<div class='text-success'>✓ تم إضافة البيانات التجريبية بنجاح</div>";
                        echo "<div class='text-warning'>⚠ تم إنشاء حسابات المدرسين والطلاب</div>";
                        
                        echo "</div>";
                        
                        echo "<div class='alert alert-success'>";
                        echo "<h5><i class='fas fa-check-circle'></i> تم إعداد النظام بنجاح!</h5>";
                        echo "<p>يمكنك الآن تسجيل الدخول إلى لوحة المدرس:</p>";
                        echo "<ul>";
                        echo "<li><strong>المدرس:</strong> أحمد محمد الجاسم</li>";
                        echo "<li><strong>اسم المستخدم:</strong> ahmed.jasim</li>";
                        echo "<li><strong>كلمة المرور:</strong> teacher123</li>";
                        echo "</ul>";
                        echo "</div>";
                        
                        echo "<div class='d-grid gap-2'>";
                        echo "<a href='teacher-dashboard.php' class='btn btn-success btn-lg'>";
                        echo "<i class='fas fa-tachometer-alt'></i> الذهاب إلى لوحة المدرس";
                        echo "</a>";
                        echo "<a href='instructor-students.php' class='btn btn-primary'>";
                        echo "<i class='fas fa-users'></i> إدارة الطلاب";
                        echo "</a>";
                        echo "</div>";
                        
                    } catch (Exception $e) {
                        echo "<div class='alert alert-danger'>";
                        echo "<h5><i class='fas fa-exclamation-circle'></i> خطأ في الإعداد</h5>";
                        echo "<p>حدث خطأ أثناء إعداد النظام: " . htmlspecialchars($e->getMessage()) . "</p>";
                        echo "<p>يرجى التأكد من:</p>";
                        echo "<ul>";
                        echo "<li>تشغيل خادم MySQL</li>";
                        echo "<li>صحة إعدادات قاعدة البيانات في ملف config/database.php</li>";
                        echo "<li>صلاحيات الكتابة في مجلد المشروع</li>";
                        echo "</ul>";
                        echo "<a href='?action=show_form' class='btn btn-warning'>إعادة المحاولة</a>";
                        echo "</div>";
                    }
                    ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>
</body>
</html>
