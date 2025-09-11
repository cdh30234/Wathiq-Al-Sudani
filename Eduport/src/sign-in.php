<?php
// تضمين ملف التكوين
require_once 'api-config.php';

$error = '';
$success = '';

// معالجة رسائل الخطأ من URL
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'not_logged_in':
            $error = 'يجب تسجيل الدخول أولاً للوصول لهذه الصفحة';
            break;
        case 'wrong_role':
            $error = 'ليس لديك صلاحية للوصول لهذه الصفحة';
            break;
        default:
            $error = 'حدث خطأ غير معروف';
    }
}

// معالجة تسجيل الخروج
if (isset($_GET['logout'])) {
    logoutUser();
    $success = 'تم تسجيل الخروج بنجاح';
}

// معالجة تسجيل الدخول
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_or_username = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($email_or_username) || empty($password)) {
        $error = 'يرجى ملء جميع الحقول المطلوبة';
    } else {
        // محاولة تسجيل الدخول
        if (loginUser($email_or_username, $password)) {
            $user = getCurrentUser();
            
            // تسجيل لأغراض التشخيص
            error_log("=== تسجيل الدخول ناجح ===");
            error_log("بيانات المستخدم: " . print_r($user, true));
            error_log("Session ID: " . session_id());
            error_log("Session after login: " . print_r($_SESSION, true));
            
            // إضافة رسالة نجاح
            $_SESSION['login_success'] = 'تم تسجيل الدخول بنجاح!';
            
            // توجيه حسب نوع المستخدم
            switch ($user['role']) {
                case 'admin':
                    error_log("توجيه للمدير: admin-dashboard.php");
                    header('Location: admin-dashboard.php');
                    exit();
                case 'teacher':
                    error_log("توجيه للمدرس: instructor-dashboard.php");
                    header('Location: instructor-dashboard.php');
                    exit();
                case 'student':
                    error_log("توجيه للطالب: student-dashboard.php");
                    header('Location: student-dashboard.php');
                    exit();
                default:
                    error_log("دور غير معروف، توجيه لصفحة رئيسية: " . $user['role']);
                    header('Location: index.php');
                    exit();
            }
        } else {
            $error = 'بيانات الدخول غير صحيحة. يرجى المحاولة مرة أخرى.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
	<?php include("partials/title-meta.php"); ?>

	<?php include("partials/head-css.php"); ?>
	
	<!-- RTL Support -->
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
	
	<style>
		/* RTL Arabic Styling */
		body { 
			font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; 
			direction: rtl;
			text-align: right;
		}
		
		.form-label, .form-control, .btn, h1, h2, h3, p {
			font-family: 'Cairo', Arial, sans-serif !important;
		}
		
		.input-group-text {
			border-left: 0;
			border-right: 1px solid #dee2e6;
		}
		
		.rounded-start {
			border-top-right-radius: 0.375rem !important;
			border-bottom-right-radius: 0.375rem !important;
			border-top-left-radius: 0 !important;
			border-bottom-left-radius: 0 !important;
		}
		
		.rounded-end {
			border-top-left-radius: 0.375rem !important;
			border-bottom-left-radius: 0.375rem !important;
			border-top-right-radius: 0 !important;
			border-bottom-right-radius: 0 !important;
		}
	</style>
</head>

<body>

	<!-- **************** MAIN CONTENT START **************** -->
	<main>
		<section class="p-0 d-flex align-items-center position-relative overflow-hidden">

			<div class="container-fluid">
				<div class="row">
					<!-- left -->
					<div class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10 vh-lg-100">
						<div class="p-3 p-lg-5">
							<!-- Title -->
							<div class="text-center">
								<h2 class="fw-bold">مرحباً بكم في نظام إدارة الطلاب</h2>
								<p class="mb-0 h6 fw-light">لنبدأ رحلة التعلم معاً!</p>
							</div>
							<!-- SVG Image -->
							<img src="assets/images/element/02.svg" class="mt-5" alt="">
							<!-- Info -->
							<div class="d-sm-flex mt-5 align-items-center justify-content-center">
								<!-- Avatar group -->
								<ul class="avatar-group mb-2 mb-sm-0">
									<li class="avatar avatar-sm">
										<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
									</li>
									<li class="avatar avatar-sm">
										<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
									</li>
									<li class="avatar avatar-sm">
										<img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
									</li>
									<li class="avatar avatar-sm">
										<img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
									</li>
								</ul>
								<!-- Content -->
								<p class="mb-0 h6 fw-light ms-0 ms-sm-3">أكثر من 450+ طالب انضموا إلينا، الآن دورك!</p>
							</div>
						</div>
					</div>

					<!-- Right -->
					<div class="col-12 col-lg-6 m-auto">
						<div class="row my-5">
							<div class="col-sm-10 col-xl-8 m-auto">
								<!-- Title -->
								<span class="mb-0 fs-1">👋</span>
								<h1 class="fs-2">تسجيل الدخول</h1>
								<p class="lead mb-4">أهلاً وسهلاً! يرجى تسجيل الدخول بحسابك.</p>

								<!-- Form START -->
								<form method="POST">
									<!-- Identifier (Email or Phone) -->
									<div class="mb-4">
										<label for="email" class="form-label">البريد الإلكتروني أو اسم المستخدم *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-person-fill"></i></span>
											<input type="text" class="form-control border-0 bg-light rounded-end ps-1" 
												   placeholder="أدخل البريد الإلكتروني أو اسم المستخدم" 
												   name="email" id="email" required
												   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
										</div>
									</div>
									<!-- Password -->
									<div class="mb-4">
										<label for="password" class="form-label">كلمة المرور *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
											<input type="password" class="form-control border-0 bg-light rounded-end ps-1" 
												   placeholder="كلمة المرور" name="password" id="password" required>
										</div>
										<div id="passwordHelpBlock" class="form-text">
											كلمة المرور يجب أن تكون 8 أحرف على الأقل
										</div>
									</div>
									
									<!-- Error/Success Messages -->
									<?php if ($error): ?>
									<div class="alert alert-danger mb-3">
										<i class="bi bi-exclamation-triangle me-2"></i><?php echo $error; ?>
									</div>
									<?php endif; ?>
									
									<?php if ($success): ?>
									<div class="alert alert-success mb-3">
										<i class="bi bi-check-circle me-2"></i><?php echo $success; ?>
									</div>
									<?php endif; ?>
									
									<!-- Demo accounts info -->
									<div class="alert alert-info mb-4">
										<h6 class="mb-2">الحسابات التجريبية:</h6>
										<small>
											<strong>مدرس:</strong> math_teacher / teacher123<br>
											<strong>طالب:</strong> student001 / student123<br>
											<strong>مدير:</strong> admin / admin123
										</small>
									</div>
									
									<!-- Check box -->
									<div class="mb-4 d-flex justify-content-between">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
											<label class="form-check-label" for="rememberMe">تذكرني</label>
										</div>
										<div class="text-primary-hover">
											<a href="forgot-password.php" class="text-secondary">
												<u>نسيت كلمة المرور؟</u>
											</a>
										</div>
									</div>
									<!-- Button -->
									<div class="align-items-center mt-0">
										<div class="d-grid">
											<button class="btn btn-primary mb-0" type="submit">
												<i class="bi bi-box-arrow-in-right me-2"></i>تسجيل الدخول
											</button>
										</div>
									</div>
								</form>
								<!-- Form END -->

								<!-- Social buttons and divider -->
								<div class="row">
									<!-- Divider with text -->
									<div class="position-relative my-4">
										<hr>
										<p class="small position-absolute top-50 start-50 translate-middle bg-body px-5">Or</p>
									</div>

									<!-- Social btn -->
									<div class="col-xxl-6 d-grid">
										<a href="#" class="btn bg-google mb-2 mb-xxl-0"><i class="fab fa-fw fa-google text-white me-2"></i>Login with Google</a>
									</div>
									<!-- Social btn -->
									<div class="col-xxl-6 d-grid">
										<a href="#" class="btn bg-facebook mb-0"><i class="fab fa-fw fa-facebook-f me-2"></i>Login with Facebook</a>
									</div>
								</div>

								<!-- Sign up link -->
								<div class="mt-4 text-center">
									<span>ليس لديك حساب؟ <a href="sign-up.php">إنشاء حساب جديد</a></span>
								</div>
							</div>
						</div> <!-- Row END -->
					</div>
				</div> <!-- Row END -->
			</div>
		</section>
	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

	<script>
	// كود بسيط للتحقق من وجود العناصر
	document.addEventListener('DOMContentLoaded', function() {
		// التحقق من وجود نموذج تسجيل الدخول
		const loginForm = document.getElementById('loginForm');
		if (loginForm) {
			console.log('نموذج تسجيل الدخول جاهز');
		}
		
		// إضافة تأثيرات بصرية بسيطة
		const submitBtn = loginForm ? loginForm.querySelector('button[type="submit"]') : null;
		if (submitBtn) {
			submitBtn.addEventListener('click', function() {
				this.disabled = true;
				this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>جاري التحقق...';
				
				// إعادة تفعيل الزر بعد ثانيتين في حالة عدم إعادة التوجيه
				setTimeout(() => {
					this.disabled = false;
					this.innerHTML = '<i class="fas fa-sign-in-alt me-2"></i>تسجيل الدخول';
				}, 2000);
			});
		}
	});
	</script>
	<?php include("partials/footer-scripts-clean.php"); ?>

</body>

</html>