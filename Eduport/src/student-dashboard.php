<?php
// تضمين ملف التكوين
require_once 'api-config.php';

// تسجيل تشخيصي 
error_log("=== Student Dashboard Access Debug ===");
error_log("Session ID: " . session_id());
error_log("Session Data: " . print_r($_SESSION, true));
error_log("isLoggedIn(): " . (isLoggedIn() ? 'true' : 'false'));
error_log("hasRole('student'): " . (hasRole('student') ? 'true' : 'false'));

// التحقق من تسجيل الدخول مع رسائل مفصلة
if (!isLoggedIn()) {
    error_log("فشل: المستخدم غير مسجل الدخول");
    header('Location: access-denied.php?reason=not_logged_in');
    exit;
}

if (!hasRole('student')) {
    $current_user = getCurrentUser();
    error_log("فشل: المستخدم لا يملك صلاحية طالب. الدور الحالي: " . ($current_user['role'] ?? 'غير محدد'));
    header('Location: access-denied.php?reason=forbidden&required=student');
    exit;
}

// الحصول على بيانات الطالب الحالي
$current_user = getCurrentUser();
$student_name = $current_user['name'] ?? 'طالب';
$student_email = $current_user['email'] ?? '';
$student_avatar = 'assets/images/avatar/01.jpg'; // افتراضي
$student_class = 'الصف العاشر أ'; // افتراضي
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
	<?php include("partials/title-meta.php"); ?>

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices.js/public/assets/styles/choices.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/aos/aos.css">

	<!-- RTL Support -->
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
	
	<?php include("partials/head-css.php"); ?>
	
	<style>
		/* RTL Arabic Styling */
		body { 
			font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; 
		}
		
		/* Logo styling */
		.navbar-brand-item { 
			height: 45px !important; 
			width: auto !important;
			transition: all 0.3s ease;
		}
		.navbar-brand:hover .navbar-brand-item {
			transform: scale(1.05);
		}
		
		/* Navbar RTL fixes */
		.navbar { direction: rtl; }
		.navbar-brand { margin-left: 0 !important; margin-right: 1rem !important; }
		.navbar-toggler { margin-left: auto !important; margin-right: 0 !important; }
		.navbar-nav { flex-direction: row !important; margin-left: auto !important; margin-right: 0 !important; }
		.navbar-nav .nav-item { margin-left: 0.5rem !important; margin-right: 0 !important; }
		
		/* Dropdown fixes for RTL */
		.dropdown-menu { 
			left: auto !important; 
			right: 0 !important; 
			text-align: right !important;
		}
		.dropdown-menu-end { left: 0 !important; right: auto !important; }
		.dropdown-submenu .dropdown-menu { left: auto !important; right: 100% !important; }
		
		/* Navigation fixes */
		.nav-link { direction: rtl !important; text-align: right !important; }
		.dropdown-item { direction: rtl !important; text-align: right !important; }
		
		/* Icon positioning for RTL */
		.nav-link i, .dropdown-item i { 
			margin-left: 0.5rem !important; 
			margin-right: 0 !important; 
		}
		
		/* Don't flip these specific icons */
		.bi-house::before, 
		.bi-journals::before,
		.bi-grid-3x3-gap::before,
		.bi-basket::before,
		.bi-person-workspace::before,
		.bi-file-earmark-text::before,
		.bi-headphones::before,
		.bi-speedometer2::before { 
			transform: none !important; 
		}
		
		/* Only flip directional icons */
		.bi-chevron-left::before { transform: scaleX(-1) !important; }
		.bi-chevron-right::before { transform: scaleX(-1) !important; }
		.bi-arrow-left::before { transform: scaleX(-1) !important; }
		.bi-arrow-right::before { transform: scaleX(-1) !important; }
		
		/* Profile dropdown and auth buttons positioning */
		.js-auth-when-logged-in, .js-auth-when-logged-out { 
			margin-left: 1rem !important; 
			margin-right: 0 !important; 
		}
		
		/* Authentication buttons styling */
		.js-auth-when-logged-out .btn {
			margin: 0 0.25rem !important;
		}
		
		/* Avatar dropdown fix */
		.avatar { display: inline-block !important; }
		.dropdown-toggle::after { margin-left: 0 !important; margin-right: 0.255em !important; }
		
		/* Fix notification badge positioning */
		.position-absolute { left: auto !important; right: 0 !important; }
		
		/* Text direction fixes */
		.dropdown-menu-end { direction: rtl !important; }
		
		/* Default display states - will be overridden by JS */
		.js-auth-when-logged-in { display: none; }
		.js-auth-when-logged-out { display: flex; align-items: center; }
		
		/* Container and content alignment */
		.container, .navbar > .container { direction: rtl !important; }
		
		/* Ensure proper flexbox direction */
		.d-flex { direction: rtl !important; }
		.justify-content-end { justify-content: flex-start !important; }
		.justify-content-start { justify-content: flex-end !important; }
		
		/* Dashboard specific fixes */
		.card-body, .card-header { direction: rtl !important; text-align: right !important; }
		.table { direction: rtl !important; }
		.table th, .table td { text-align: right !important; }
		.list-group-item { direction: rtl !important; text-align: right !important; }
		.list-group-item i { margin-left: 0.5rem !important; margin-right: 0 !important; }
		.offcanvas-body { direction: rtl !important; }
		.form-control { text-align: right !important; }
		.btn { direction: rtl !important; }
		.btn i { margin-left: 0.25rem !important; margin-right: 0 !important; }
		.progress { direction: ltr !important; } /* Keep progress bars LTR */

		/* Icon and avatar containment fixes */
		.icon-lg,
		.avatar-md,
		.avatar-xl,
		.avatar { 
			position: relative; line-height: 1 !important; overflow: hidden !important;
		}
		.icon-lg { width: 56px; height: 56px; display: inline-flex; align-items: center; justify-content: center; font-size: 22px; }
		.avatar img,
		.avatar-md img,
		.avatar-xl img,
		.avatar-img { width: 100% !important; height: 100% !important; object-fit: cover !important; display: block; }
		.rounded-circle { overflow: hidden !important; }
		.icon-40 { width: 40px; height: 40px; display: inline-flex; align-items:center; justify-content:center; line-height: 1; overflow: hidden; font-size: 18px; }
		.card .bi, .list-group .bi, .btn .bi { vertical-align: middle; }
		.list-group .menu-item { display: flex; align-items: center; }
		
		/* Arabic text improvements */
		h1, h2, h3, h4, h5, h6, p, span, .small, .text-body { 
			font-family: 'Cairo', Arial, sans-serif !important;
		}
	</style>
</head>

<body>

	<!-- Header START -->
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
							<a class="nav-link active" href="index-9.php"><i class="bi bi-house me-2"></i>الصفحة الرئيسية</a>
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
								<li>
									<hr class="dropdown-divider">
								</li>
								<li> <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit me-1"></i>تعديل الملف الشخصي</a> </li>
								<li> <a class="dropdown-item" href="#"><i class="fas fa-fw fa-cog me-1"></i>الإعدادات</a> </li>
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
						<!-- Notification button -->
						<a class="btn btn-light btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
							<i class="bi bi-bell fa-fw"></i>
						</a>
						<!-- Notification dote -->
						<span class="notif-badge animation-blink"></span>

						<!-- Notification dropdown menu START -->
						<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
							<div class="card bg-transparent">
								<div class="card-header bg-transparent border-bottom py-4 d-flex justify-content-between align-items-center">
									<h6 class="m-0">الإشعارات <span class="badge bg-danger bg-opacity-10 text-danger ms-2">2 جديد</span></h6>
									<a class="small" href="#">مسح الكل</a>
								</div>
								<div class="card-body p-0">
									<ul class="list-group list-unstyled list-group-flush">
										<!-- Notif item -->
										<li>
											<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
												<div class="me-3">
													<div class="avatar avatar-md">
														<img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="avatar">
													</div>
												</div>
												<div>
													<p class="text-body small m-0">تم رفع درس جديد في مادة الرياضيات</p>
													<u class="small">منذ ساعتين</u>
												</div>
											</a>
										</li>

										<!-- Notif item -->
										<li>
											<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
												<div class="me-3">
													<div class="avatar avatar-md">
														<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
													</div>
												</div>
												<div>
													<p class="text-body small m-0">موعد الامتحان النهائي غداً</p>
													<span class="small">منذ 4 ساعات</span>
												</div>
											</a>
										</li>
									</ul>
								</div>
								<!-- Button -->
								<div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
									<a href="#" class="stretched-link">عرض جميع الإشعارات</a>
								</div>
							</div>
						</div>
						<!-- Notification dropdown menu END -->
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

					<!-- Profile dropdown START (show when logged in) -->
					<li class="nav-item ms-3 dropdown js-auth-when-logged-in" style="display: none;">
						<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
							<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
						</a>
						<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
							<!-- Profile info -->
							<li class="px-3">
								<div class="d-flex align-items-center">
									<!-- Avatar -->
									<div class="avatar me-3">
										<img class="avatar-img rounded-circle shadow" src="assets/images/avatar/01.jpg" alt="avatar">
									</div>
									<div>
										<a class="h6 mt-2 mt-sm-0" href="#"><?php echo $student_name; ?></a>
										<p class="small m-0"><?php echo $student_email; ?></p>
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
							<!-- Dark mode options START -->
							<li>
								<div class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
									<button type="button" class="btn btn-sm mb-0" data-bs-theme-value="light">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
											<path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
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

		<!-- =======================
Page Banner START -->
		<section class="pt-0">
			<div class="container-fluid px-0">
				<div class="card bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
				</div>
			</div>
			<div class="container mt-n4">
				<div class="row">
					<div class="col-12">
						<div class="card bg-transparent card-body pb-0 px-0 mt-2 mt-sm-0">
							<div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
								<!-- Avatar -->
								<div class="col-auto">
									<div class="avatar avatar-xxl position-relative mt-n3">
										<img class="avatar-img rounded-circle border border-white border-3 shadow" src="<?php echo $student_avatar; ?>" alt="">
										<span class="badge text-bg-success rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">Pro</span>
									</div>
								</div>
								<!-- Profile info -->
								<div class="col d-sm-flex justify-content-between align-items-center">
									<div>
										<h1 class="my-1 fs-4"><?php echo $student_name; ?></h1>
										<ul class="list-inline mb-0">
											<li class="list-inline-item me-3 mb-1 mb-sm-0">
												<span class="h6">85%</span>
												<span class="text-body fw-light">نسبة الحضور</span>
											</li>
											<li class="list-inline-item me-3 mb-1 mb-sm-0">
												<span class="h6">5</span>
												<span class="text-body fw-light">المواد المسجلة</span>
											</li>
											<li class="list-inline-item me-3 mb-1 mb-sm-0">
												<span class="h6">25</span>
												<span class="text-body fw-light">دروس مكتملة</span>
											</li>
										</ul>
									</div>
									<!-- Button -->
									<div class="mt-2 mt-sm-0">
										<a href="#" class="btn btn-outline-primary mb-0">عرض الدروس</a>
									</div>
								</div>
							</div>
						</div>

						<!-- Advanced filter responsive toggler START -->
						<!-- Divider -->
						<hr class="d-xl-none">
						<div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
							<a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
							<button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
								<i class="fas fa-sliders-h"></i>
							</button>
						</div>
						<!-- Advanced filter responsive toggler END -->
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
Page Banner END -->

		<!-- =======================
Page content START -->
		<section class="pt-0">
			<div class="container">
				<div class="row">

					<!-- Left sidebar START -->
					<div class="col-xl-3">
						<!-- Responsive offcanvas body START -->
						<div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
							<!-- Offcanvas header -->
							<div class="offcanvas-header bg-light">
								<h5 class="offcanvas-title" id="offcanvasNavbarLabel">لوحة الطالب</h5>
								<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
							</div>
							<!-- Offcanvas body -->
							<div class="offcanvas-body p-3 p-xl-0">
								<div class="bg-dark border rounded-3 p-3 w-100">
						<!-- Dashboard menu -->
						<div class="list-group list-group-dark list-group-borderless collapse-list">
							<a class="list-group-item menu-item active" href="#" data-page="dashboard"><i class="bi bi-speedometer2 fa-fw me-2"></i>لوحة التحكم</a>
							<a class="list-group-item menu-item" href="#" data-page="lessons"><i class="bi bi-journals fa-fw me-2"></i>الدروس المتاحة</a>
							<a class="list-group-item menu-item" href="#" data-page="attendance"><i class="bi bi-calendar-check fa-fw me-2"></i>الحضور والغياب</a>
							<a class="list-group-item menu-item" href="#" data-page="grades"><i class="bi bi-award fa-fw me-2"></i>النتائج والدرجات</a>
							<a class="list-group-item menu-item" href="#" data-page="announcements"><i class="bi bi-megaphone fa-fw me-2"></i>الإعلانات</a>
							<a class="list-group-item menu-item" href="#" data-page="reports"><i class="bi bi-file-earmark-text fa-fw me-2"></i>التقارير</a>
							<a class="list-group-item menu-item" href="#" data-page="profile"><i class="bi bi-person-circle fa-fw me-2"></i>الملف الشخصي</a>
							<a class="list-group-item menu-item" href="#" data-page="settings"><i class="bi bi-gear fa-fw me-2"></i>الإعدادات</a>
							<a class="list-group-item text-danger bg-danger-soft-hover" href="#" onclick="signOut()"><i class="fas fa-sign-out-alt fa-fw me-2"></i>تسجيل الخروج</a>
						</div>
								</div>
							</div>
						</div>
						<!-- Responsive offcanvas body END -->
					</div>
					<!-- Left sidebar END -->

					<!-- Main content START -->
					<div class="col-xl-9">
						<!-- Dynamic Content Container -->
						<div id="main-content">
							<!-- المحتوى الديناميكي سيتم تحميله هنا -->
						</div>
					</div>
					<!-- Main content END -->
				</div>
			</div>
		</section>
		<!-- =======================
		Page content END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
Footer START -->
	<footer class="bg-dark p-3">
		<div class="container">
			<div class="row align-items-center">
				<!-- Widget -->
				<div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
					<!-- Logo START -->
					<a href="index.php"> <img class="h-20px" src="assets/images/logo-light.svg" alt="logo"> </a>
				</div>

				<!-- Widget -->
				<div class="col-md-4 mb-3 mb-md-0">
					<div class="text-center text-white text-primary-hover">
						Copyrights ©2024 Eduport. Build by <a href="https://1.envato.market/stackbros-portfolio" target="_blank" class="text-white">StackBros</a>.
					</div>
				</div>
				<!-- Widget -->
				<div class="col-md-4">
					<!-- Rating -->
					<ul class="list-inline mb-0 text-center text-md-end">
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-facebook"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-instagram"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-linkedin-in"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- =======================
Footer END -->

	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

	<!-- Vendors -->
	<script src="assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
	<script src="assets/vendor/@srexi/purecounterjs/purecounter_vanilla.js"></script>
	<script src="assets/vendor/aos/aos.js"></script>

	<?php include("partials/footer-scripts.php"); ?>

	<script>
		// تحميل المحتوى الديناميكي
		function loadPage(page) {
			const contentContainer = document.getElementById('main-content');
			const loadingHTML = `
				<div class="text-center py-5">
					<div class="spinner-border text-primary" role="status">
						<span class="visually-hidden">جارٍ التحميل...</span>
					</div>
					<p class="mt-2">جارٍ تحميل الصفحة...</p>
				</div>
			`;
			
			// عرض Loading
			contentContainer.innerHTML = loadingHTML;
			
			// تحديث الرابط النشط
			document.querySelectorAll('.menu-item').forEach(item => {
				item.classList.remove('active');
			});
			document.querySelector(`[data-page="${page}"]`).classList.add('active');
			
			// تحميل المحتوى
			fetch(`student-pages/${page}.php`)
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					return response.text();
				})
				.then(html => {
					contentContainer.innerHTML = html;
					
					// إعادة تشغيل الـ scripts إذا كانت موجودة في المحتوى الجديد
					const scripts = contentContainer.querySelectorAll('script');
					scripts.forEach(script => {
						const newScript = document.createElement('script');
						if (script.src) {
							newScript.src = script.src;
						} else {
							newScript.textContent = script.textContent;
						}
						document.head.appendChild(newScript);
					});
				})
				.catch(error => {
					console.error('Error loading page:', error);
					contentContainer.innerHTML = `
						<div class="alert alert-danger" role="alert">
							<h4 class="alert-heading">خطأ في التحميل!</h4>
							<p>عذراً، حدث خطأ أثناء تحميل الصفحة. يرجى المحاولة مرة أخرى.</p>
							<hr>
							<p class="mb-0">إذا استمر الخطأ، يرجى الاتصال بالدعم الفني.</p>
						</div>
					`;
				});
		}

		// إضافة event listeners للقائمة
		document.addEventListener('DOMContentLoaded', function() {
			// تحميل الصفحة الافتراضية (لوحة التحكم)
			loadPage('dashboard');
			
			// إضافة event listeners لعناصر القائمة
			document.querySelectorAll('.menu-item').forEach(item => {
				item.addEventListener('click', function(e) {
					e.preventDefault();
					const page = this.getAttribute('data-page');
					loadPage(page);
				});
			});
		});
	</script>
	
	<!-- Bootstrap JS -->
	<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- ApexCharts JS -->
	<script src="assets/vendor/apexcharts/js/apexcharts.min.js"></script>
	
	<!-- PureCounter JS -->
	<script src="assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
	
	<!-- Student Dashboard JS -->
	<script src="assets/js/student-dashboard.js"></script>

</body>

</html>