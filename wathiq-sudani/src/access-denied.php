<?php
require_once 'api-config.php';
$reason = $_GET['reason'] ?? 'forbidden';
$required = $_GET['required'] ?? '';
$titles = [
    'not_logged_in' => 'غير مسجل الدخول',
    'forbidden' => 'وصول غير مصرح'
];
$messages = [
    'not_logged_in' => 'يجب تسجيل الدخول للوصول إلى هذه الصفحة.',
    'forbidden' => 'ليس لديك صلاحية للوصول إلى هذه الصفحة.'
];
$title = $titles[$reason] ?? $titles['forbidden'];
$message = $messages[$reason] ?? $messages['forbidden'];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
	<?php include("partials/title-meta.php"); ?>

	<?php include("partials/head-css.php"); ?>

	<!-- RTL and navbar styling (matching index-9.php) -->
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
	<style>
		body { 
			font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; 
		}
		.navbar-brand-item { 
			height: 45px !important; 
			width: auto !important;
			transition: all 0.3s ease;
		}
		.navbar-brand:hover .navbar-brand-item { transform: scale(1.05); }
		.navbar { direction: rtl; }
		.navbar-brand { margin-left: 0 !important; margin-right: 1rem !important; }
		.navbar-toggler { margin-left: auto !important; margin-right: 0 !important; }
		.navbar-nav { flex-direction: row !important; margin-left: auto !important; margin-right: 0 !important; }
		.navbar-nav .nav-item { margin-left: 0.5rem !important; margin-right: 0 !important; }
		.dropdown-menu { left: auto !important; right: 0 !important; text-align: right !important; }
		.dropdown-menu-end { left: 0 !important; right: auto !important; }
		.dropdown-submenu .dropdown-menu { left: auto !important; right: 100% !important; }
		.nav-link { direction: rtl !important; text-align: right !important; }
		.dropdown-item { direction: rtl !important; text-align: right !important; }
		.nav-link i, .dropdown-item i { margin-left: 0.5rem !important; margin-right: 0 !important; }
		.bi-chevron-left::before, .bi-chevron-right::before, .bi-arrow-left::before, .bi-arrow-right::before { transform: scaleX(-1) !important; }
		.js-auth-when-logged-in, .js-auth-when-logged-out { margin-left: 1rem !important; margin-right: 0 !important; }
		.js-auth-when-logged-out .btn { margin: 0 0.25rem !important; }
		.avatar { display: inline-block !important; }
		.dropdown-toggle::after { margin-left: 0 !important; margin-right: 0.255em !important; }
		.position-absolute { left: auto !important; right: 0 !important; }
		.dropdown-menu-end { direction: rtl !important; }
		.js-auth-when-logged-in { display: none; }
		.js-auth-when-logged-out { display: flex; align-items: center; }
		.container, .navbar > .container { direction: rtl !important; }
		.d-flex { direction: rtl !important; }
		.justify-content-end { justify-content: flex-start !important; }
		.justify-content-start { justify-content: flex-end !important; }
	</style>
</head>

<body class="cairo-font arabic-enhanced">

	<!-- Header START (مطابق لهيدر index-9.php) -->
	<header class="navbar-light navbar-sticky">
		<!-- Nav START -->
		<nav class="navbar navbar-expand-xl z-index-9">
			<div class="container">
				<!-- Logo START -->
				<a class="navbar-brand" href="index-9.php">
					<img class="light-mode-item navbar-brand-item" src="assets/images/logo-sms.svg" alt="نظام إدارة الطلاب">
					<img class="dark-mode-item navbar-brand-item" src="assets/images/logo-sms-light.svg" alt="نظام إدارة الطلاب">
				</a>
				<!-- Logo END -->

				<!-- Responsive navbar toggler -->
				<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-animation">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</button>

				<!-- Main navbar START -->
				<div class="navbar-collapse collapse" id="navbarCollapse">

					<!-- Nav Main menu START -->
					<ul class="navbar-nav navbar-nav-scroll">
						<!-- Nav item 1 Home -->
						<li class="nav-item">
							<a class="nav-link" href="index-9.php"><i class="bi bi-house me-2"></i>الصفحة الرئيسية</a>
						</li>

						<!-- Nav item 2 Pages -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-journals me-2"></i>الصفحات</a>
							<ul class="dropdown-menu" aria-labelledby="pagesMenu">
								<li> <a class="dropdown-item" href="about.php">من نحن</a></li>
								<li> <a class="dropdown-item" href="contact-us.php">اتصل بنا</a></li>
								<li> <a class="dropdown-item" href="help-center.php">مركز المساعدة</a></li>
								<li> <a class="dropdown-item" href="faq.php">الأسئلة الشائعة</a></li>
							</ul>
						</li>

						<!-- Nav item 3 Account -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="accounntMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-speedometer2 me-2"></i>الحسابات</a>
							<ul class="dropdown-menu" aria-labelledby="accounntMenu">
								<!-- Dropdown submenu -->
								<li class="dropdown-submenu dropend">
									<a class="dropdown-item dropdown-toggle" href="#"><i class="fas fa-user-tie fa-fw me-1"></i>المدرس</a>
									<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
										<li> <a class="dropdown-item" href="instructor-dashboard.php"><i class="bi bi-grid-fill fa-fw me-1"></i>لوحة التحكم</a> </li>
										<li> <a class="dropdown-item" href="#"><i class="bi bi-people fa-fw me-1"></i>إدارة الطلاب</a> </li>
										<li> <a class="dropdown-item" href="#"><i class="bi bi-calendar-check fa-fw me-1"></i>تسجيل الحضور</a> </li>
										<li> <a class="dropdown-item" href="#"><i class="bi bi-journals fa-fw me-1"></i>رفع الدروس</a> </li>
										<li> <a class="dropdown-item" href="#"><i class="bi bi-award fa-fw me-1"></i>إدخال الدرجات</a> </li>
										<li> <a class="dropdown-item" href="#"><i class="bi bi-megaphone fa-fw me-1"></i>الإعلانات</a> </li>
									</ul>
								</li>

								<!-- Dropdown submenu -->
								<li class="dropdown-submenu dropend">
									<a class="dropdown-item dropdown-toggle" href="#"><i class="fas fa-user-graduate fa-fw me-1"></i>الطالب</a>
									<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
										<li> <a class="dropdown-item" href="student-dashboard.php"><i class="bi bi-grid-fill fa-fw me-1"></i>لوحة التحكم</a> </li>
										<li> <a class="dropdown-item" href="#"><i class="bi bi-journals fa-fw me-1"></i>الدروس المتاحة</a> </li>
										<li> <a class="dropdown-item" href="#"><i class="bi bi-calendar-check fa-fw me-1"></i>الحضور والغياب</a> </li>
										<li> <a class="dropdown-item" href="#"><i class="bi bi-award fa-fw me-1"></i>النتائج والدرجات</a> </li>
										<li> <a class="dropdown-item" href="#"><i class="bi bi-megaphone fa-fw me-1"></i>الإعلانات</a> </li>
									</ul>
								</li>

								<li> <a class="dropdown-item" href="admin-dashboard.php"><i class="fas fa-user-cog fa-fw me-1"></i>المدير</a> </li>
							</ul>
						</li>

						<!-- Nav item 4 Component-->
						<li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-headset me-2"></i>اتصل بنا</a></li>
					</ul>
					<!-- Nav Main menu END -->
				</div>
				<!-- Main navbar END -->

				<!-- Profile and notification START -->
				<ul class="nav flex-row align-items-center list-unstyled ms-xl-auto">
					<!-- Notification dropdown START -->
					<li class="nav-item ms-2 ms-sm-3 dropdown d-none d-sm-block">
						<a class="btn btn-light btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
							<i class="bi bi-bell fa-fw"></i>
						</a>
						<span class="notif-badge animation-blink"></span>
						<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
							<div class="card bg-transparent">
								<div class="card-header bg-transparent border-bottom py-4 d-flex justify-content-between align-items-center">
									<h6 class="m-0">الإشعارات <span class="badge bg-danger bg-opacity-10 text-danger ms-2">2 جديد</span></h6>
									<a class="small" href="#">مسح الكل</a>
								</div>
								<div class="card-body p-0">
									<ul class="list-group list-unstyled list-group-flush">
										<li>
											<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
												<div class="me-3">
													<div class="avatar avatar-md">
														<img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="avatar">
													</div>
												</div>
												<div>
													<p class="text-body small m-0">مرحباً بك في نظام إدارة الطلاب</p>
													<u class="small">منذ ساعة</u>
												</div>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<!-- Notification dropdown END -->

					<!-- Authentication buttons (show when logged out) -->
					<li class="nav-item js-auth-when-logged-out" style="display: none;">
						<a href="sign-in.php" class="btn btn-outline-primary rounded-pill me-2">
							<i class="bi bi-box-arrow-in-right me-1"></i>تسجيل الدخول
						</a>
						<a href="sign-up.php" class="btn btn-primary rounded-pill">
							<i class="bi bi-person-plus me-1"></i>إنشاء حساب
						</a>
					</li>

					<!-- Profile dropdown START -->
					<li class="nav-item ms-3 dropdown js-auth-when-logged-in" style="display:none;">
						<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
							<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
						</a>
						<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
							<li class="px-3">
								<div class="d-flex align-items-center">
									<div class="avatar me-3">
										<img class="avatar-img rounded-circle shadow" src="assets/images/avatar/01.jpg" alt="avatar">
									</div>
									<div>
										<a class="h6 mt-2 mt-sm-0" href="#">أحمد محمد</a>
										<p class="small m-0">user@example.com</p>
									</div>
								</div>
								<hr>
							</li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item js-dashboard-link" href="#"><i class="bi bi-speedometer2 fa-fw me-2"></i>لوحة التحكم</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>تعديل الملف الشخصي</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>إعدادات الحساب</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>المساعدة</a></li>
							<li><a class="dropdown-item bg-danger-soft-hover js-logout" href="#" onclick="signOut()"><i class="bi bi-power fa-fw me-2"></i>تسجيل الخروج</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li>
								<div class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
									<button type="button" class="btn btn-sm mb-0" data-bs-theme-value="light">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
											<path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
											<use href="#"></use>
										</svg> فاتح
									</button>
									<button type="button" class="btn btn-sm mb-0" data-bs-theme-value="dark">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
											<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
										</svg> داكن
									</button>
									<button type="button" class="btn btn-sm mb-0 active" data-bs-theme-value="auto">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
											<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
											<use href="#"></use>
										</svg> تلقائي
									</button>
								</div>
							</li>
							<!-- Dark mode options END-->
						</ul>
						<!-- Profile dropdown END -->
					</li>
				</ul>
				<!-- Profile and notification END -->
			</div>
		</nav>
		<!-- Nav END -->

	</header>
	<!-- Header END -->

	<!-- **************** MAIN CONTENT START **************** -->
	<main>
		<section class="pt-5">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<!-- Image -->
						<img src="assets/images/element/error404-01.svg" class="h-200px h-md-400px mb-4" alt="">
						<!-- Title -->
						<h1 class="display-4 text-danger mb-2">وصول غير مُصرَّح</h1>
						<h2 class="mb-3">غير مسموح بالدخول إلى هذه الصفحة</h2>
						<!-- info -->
						<p class="mb-4">
							<?php 
								echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
								if (!empty($required)) {
									echo ' <span class="text-muted d-block mt-2">الصلاحية المطلوبة: ' . htmlspecialchars($required, ENT_QUOTES, 'UTF-8') . '</span>';
								}
							?>
						</p>
						<!-- Buttons -->
						<div class="d-grid gap-2 d-sm-inline-flex justify-content-sm-center">
							<a href="index-9.php" class="btn btn-primary"><i class="bi bi-house me-1"></i>الصفحة الرئيسية</a>
							<?php if (!empty($_SESSION['user'])): ?>
							<a href="<?php 
								$r = strtolower($_SESSION['user']['role'] ?? '');
								echo $r === 'admin' ? 'admin-dashboard.php' : ($r === 'teacher' ? 'instructor-dashboard.php' : 'student-dashboard.php');
							?>" class="btn btn-outline-secondary">اذهب إلى لوحتي</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- Footer START (مطابق لـ index-9.php) -->
	<footer class="bg-light pt-5">
		<div class="container">
			<!-- Row START -->
			<div class="row g-4">

				<!-- Widget 1 START -->
				<div class="col-lg-3">
					<!-- logo -->
					<a class="me-0" href="index.php">
						<img class="light-mode-item h-40px" src="assets/images/logo-sms.svg" alt="نظام إدارة الطلاب">
						<img class="dark-mode-item h-40px" src="assets/images/logo-sms-light.svg" alt="نظام إدارة الطلاب">
					</a>
					<p class="my-3">متوسطة الشهيد كاظم جلاب الحيدري المختلطة</p>
					<!-- Social media icon -->
					<ul class="list-inline mb-0 mt-3">
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-instagram" href="#"><i class="fab fa-fw fa-instagram"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a> </li>
					</ul>
				</div>
				<!-- Widget 1 END -->

				<!-- Widget 2 START -->
				<div class="col-lg-6">
					<div class="row g-4">
						<!-- Link block -->
						<div class="col-6 col-md-4">
							<h5 class="mb-2 mb-md-4">الشركة</h5>
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link" href="#">من نحن</a></li>
								<li class="nav-item"><a class="nav-link" href="#">اتصل بنا</a></li>
								<li class="nav-item"><a class="nav-link" href="#">الأخبار والمقالات</a></li>
								<li class="nav-item"><a class="nav-link" href="#">المكتبة</a></li>
								<li class="nav-item"><a class="nav-link" href="#">الوظائف</a></li>
							</ul>
						</div>

						<!-- Link block -->
						<div class="col-6 col-md-4">
							<h5 class="mb-2 mb-md-4">المجتمع</h5>
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link" href="#">الوثائق</a></li>
								<li class="nav-item"><a class="nav-link" href="#">الأسئلة الشائعة</a></li>
								<li class="nav-item"><a class="nav-link" href="#">المنتدى</a></li>
								<li class="nav-item"><a class="nav-link" href="#">خريطة الموقع</a></li>
							</ul>
						</div>

						<!-- Link block -->
						<div class="col-6 col-md-4">
							<h5 class="mb-2 mb-md-4">التدريس</h5>
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link" href="#">كن معلماً</a></li>
								<li class="nav-item"><a class="nav-link" href="#">دليل الاستخدام</a></li>
								<li class="nav-item"><a class="nav-link" href="#">الشروط والأحكام</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Widget 2 END -->

				<!-- Widget 3 START -->
				<div class="col-lg-3">
					<h5 class="mb-2 mb-md-4">الاتصال</h5>
					<!-- Time -->
					<p class="mb-2">
						رقم مجاني:<span class="h6 fw-light ms-2">+1234 568 963</span>
						<span class="d-block small">(من 9 صباحاً إلى 8 مساءً بتوقيت القاهرة)</span>
					</p>

					<p class="mb-0">البريد الإلكتروني:<span class="h6 fw-light ms-2">example@gmail.com</span></p>

					<div class="row g-2 mt-2">
						<!-- Google play store button -->
						<div class="col-6 col-sm-4 col-md-3 col-lg-6">
							<a href="#"> <img src="assets/images/client/google-play.svg" alt=""> </a>
						</div>
						<!-- App store button -->
						<div class="col-6 col-sm-4 col-md-3 col-lg-6">
							<a href="#"> <img src="assets/images/client/app-store.svg" alt="app-store"> </a>
						</div>
					</div> <!-- Row END -->
				</div>
				<!-- Widget 3 END -->
			</div><!-- Row END -->

			<!-- Divider -->
			<hr class="mt-4 mb-0">

			<!-- Bottom footer -->
			<div class="py-3">
				<div class="container px-0">
					<div class="d-lg-flex justify-content-between align-items-center py-3 text-center text-md-left">
						<!-- copyright text -->
						<div class="text-body text-primary-hover">© 2025 جميع الحقوق محفوظة | واثق أحمد السوداني<a href="https://1.envato.market/stackbros-portfolio" target="_blank" class="text-body">StackBros</a></div>
						<!-- copyright links-->
						<div class="justify-content-center mt-3 mt-lg-0">
							<ul class="nav list-inline justify-content-center mb-0">
								<li class="list-inline-item">
									<!-- Language selector -->
									<div class="dropup mt-0 text-center text-sm-end">
										<a class="dropdown-toggle nav-link" href="#" role="button" id="languageSwitcher" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fas fa-globe me-2"></i>اللغة
										</a>
										<ul class="dropdown-menu min-w-auto" aria-labelledby="languageSwitcher">
											<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="assets/images/flags/uk.svg" alt="">الإنجليزية</a></li>
											<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="assets/images/flags/gr.svg" alt="">الألمانية </a></li>
											<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="assets/images/flags/sp.svg" alt="">الفرنسية</a></li>
										</ul>
									</div>
								</li>
								<li class="list-inline-item"><a class="nav-link" href="#">شروط الاستخدام</a></li>
								<li class="list-inline-item"><a class="nav-link pe-0" href="#">سياسة الخصوصية</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Back to top -->
		<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>
	</footer>

	<?php include("partials/footer-scripts.php"); ?>

</body>

</html>


