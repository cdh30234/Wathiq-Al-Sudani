<?php
require_once 'api-config.php';

// معالجة تسجيل الدخول
if ($_POST['username'] ?? false) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (loginUser($username, $password)) {
        $user = getCurrentUser();
        
        // توجيه حسب نوع المستخدم
        switch ($user['role']) {
            case 'admin':
                header('Location: admin-dashboard.php');
                break;
            case 'teacher':
                header('Location: instructor-dashboard.php');
                break;
            case 'student':
                header('Location: student-dashboard.php');
                break;
        }
        exit;
    } else {
        $error = 'بيانات الدخول غير صحيحة';
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - نظام إدارة المدرسة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 20px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .demo-accounts {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-card p-5">
                    <div class="text-center mb-4">
                        <i class="bi bi-mortarboard-fill text-primary" style="font-size: 3rem;"></i>
                        <h3 class="mt-3 mb-1">نظام إدارة المدرسة</h3>
                        <p class="text-muted">مدرسة الرواد الثانوية</p>
                    </div>

                    <?php if (isset($error)): ?>
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle me-2"></i><?php echo $error; ?>
                    </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">اسم المستخدم</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-login text-white w-100">
                            <i class="bi bi-box-arrow-in-right me-2"></i>تسجيل الدخول
                        </button>
                    </form>

                    <div class="demo-accounts">
                        <h6 class="mb-3">الحسابات التجريبية:</h6>
                        
                        <div class="mb-2">
                            <strong>المدير:</strong>
                            <button class="btn btn-sm btn-outline-primary ms-2" onclick="fillCredentials('admin', 'admin123')">
                                admin / admin123
                            </button>
                        </div>
                        
                        <div class="mb-2">
                            <strong>المدرس:</strong>
                            <button class="btn btn-sm btn-outline-success ms-2" onclick="fillCredentials('math_teacher', 'teacher123')">
                                math_teacher / teacher123
                            </button>
                        </div>
                        
                        <div class="mb-0">
                            <strong>الطالب:</strong>
                            <button class="btn btn-sm btn-outline-info ms-2" onclick="fillCredentials('student001', 'student123')">
                                student001 / student123
                            </button>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="text-white-50">
                        <i class="bi bi-database me-2"></i>
                        تم إنشاء قاعدة البيانات بنجاح مع بيانات شاملة
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function fillCredentials(username, password) {
            document.getElementById('username').value = username;
            document.getElementById('password').value = password;
        }
    </script>
</body>
</html>
