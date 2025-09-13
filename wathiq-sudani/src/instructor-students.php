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
										<li> <a class="dropdown-item" href="instructor-students.php"><i class="bi bi-people fa-fw me-1"></i>إدارة الطلاب</a> </li>
										<li> <a class="dropdown-item" href="instructor-attendance.php"><i class="bi bi-calendar-check fa-fw me-1"></i>تسجيل الحضور</a> </li>
										<li> <a class="dropdown-item" href="instructor-lessons.php"><i class="bi bi-journals fa-fw me-1"></i>رفع الدروس</a> </li>
										<li> <a class="dropdown-item" href="instructor-grades.php"><i class="bi bi-award fa-fw me-1"></i>إدخال الدرجات</a> </li>
										<li> <a class="dropdown-item" href="instructor-announcements.php"><i class="bi bi-megaphone fa-fw me-1"></i>الإعلانات</a> </li>
									</ul>
								</li>

								<!-- Dropdown submenu -->
								<li class="dropdown-submenu dropend">
									<a class="dropdown-item dropdown-toggle" href="#"><i class="fas fa-user-graduate fa-fw me-1"></i>الطالب</a>
									<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
										<li> <a class="dropdown-item" href="student-dashboard.php"><i class="bi bi-grid-fill fa-fw me-1"></i>لوحة التحكم</a> </li>
										<li> <a class="dropdown-item" href="student-lessons.php"><i class="bi bi-journals fa-fw me-1"></i>الدروس المتاحة</a> </li>
										<li> <a class="dropdown-item" href="student-attendance.php"><i class="bi bi-calendar-check fa-fw me-1"></i>الحضور والغياب</a> </li>
										<li> <a class="dropdown-item" href="student-grades.php"><i class="bi bi-award fa-fw me-1"></i>النتائج والدرجات</a> </li>
										<li> <a class="dropdown-item" href="student-announcements.php"><i class="bi bi-megaphone fa-fw me-1"></i>الإعلانات</a> </li>
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
													<p class="text-body small m-0">طالب جديد انضم لصفك</p>
													<u class="small">منذ ساعة</u>
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
													<p class="text-body small m-0">تذكير: تسجيل الحضور للحصة القادمة</p>
													<span class="small">منذ 2 ساعة</span>
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
										<a class="h6 mt-2 mt-sm-0" href="#">د. محمد العبدالله</a>
										<p class="small m-0">teacher@example.com</p>
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
										<img id="js-profile-avatar-header" class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/avatar/07.jpg" alt="">
										<span class="badge text-bg-primary rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">مدرس</span>
									</div>
								</div>
								<!-- Profile info -->
								<div class="col d-sm-flex justify-content-between align-items-center">
									<div>
										<h1 id="js-profile-name" class="my-1 fs-4">د. محمد العبدالله</h1>
										<ul class="list-inline mb-0">
											<li class="list-inline-item me-3 mb-1 mb-sm-0">
												<span class="h6">32</span>
												<span class="text-body fw-light">إجمالي الطلاب</span>
											</li>
											<li class="list-inline-item me-3 mb-1 mb-sm-0">
												<span class="h6">3</span>
												<span class="text-body fw-light">الصفوف</span>
											</li>
											<li class="list-inline-item me-3 mb-1 mb-sm-0">
												<span class="h6">الرياضيات</span>
												<span class="text-body fw-light">التخصص</span>
											</li>
										</ul>
									</div>
									<!-- Button -->
									<div class="mt-2 mt-sm-0">
										<a href="#" class="btn btn-outline-primary mb-0">إضافة طالب جديد</a>
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
								<h5 class="offcanvas-title" id="offcanvasNavbarLabel">لوحة المدرس</h5>
								<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
							</div>
							<!-- Offcanvas body -->
							<div class="offcanvas-body p-3 p-xl-0">
								<div class="bg-dark border rounded-3 p-3 w-100">
						<!-- Dashboard menu -->
						<div class="list-group list-group-dark list-group-borderless collapse-list">
							<a class="list-group-item" href="instructor-dashboard.php"><i class="bi bi-speedometer2 fa-fw me-2"></i>لوحة التحكم</a>
							<a class="list-group-item active" href="instructor-students.php"><i class="bi bi-people fa-fw me-2"></i>إدارة الطلاب</a>
							<a class="list-group-item" href="instructor-attendance.php"><i class="bi bi-calendar-check fa-fw me-2"></i>تسجيل الحضور</a>
							<a class="list-group-item" href="instructor-lessons.php"><i class="bi bi-journals fa-fw me-2"></i>رفع الدروس</a>
							<a class="list-group-item" href="instructor-grades.php"><i class="bi bi-award fa-fw me-2"></i>إدخال الدرجات</a>
							<a class="list-group-item" href="instructor-announcements.php"><i class="bi bi-megaphone fa-fw me-2"></i>الإعلانات</a>
							<a class="list-group-item" href="instructor-reports.php"><i class="bi bi-file-earmark-text fa-fw me-2"></i>التقارير</a>
							<a class="list-group-item" href="instructor-profile.php"><i class="bi bi-person-circle fa-fw me-2"></i>الملف الشخصي</a>
							<a class="list-group-item" href="instructor-settings.php"><i class="bi bi-gear fa-fw me-2"></i>الإعدادات</a>
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

						<!-- إحصائيات الطلاب START -->
						<div class="row mb-4">
							<!-- إجمالي الطلاب -->
							<div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
								<div class="d-flex justify-content-center align-items-center p-4 bg-primary bg-opacity-15 rounded-3">
									<span class="display-6 lh-1 text-primary mb-0"><i class="bi bi-people fa-fw"></i></span>
									<div class="ms-4">
										<div class="d-flex">
											<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="32" data-purecounter-delay="200">0</h5>
										</div>
										<p class="mb-0 h6 fw-light">إجمالي الطلاب</p>
									</div>
								</div>
							</div>
							<!-- الطلاب النشطون -->
							<div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
								<div class="d-flex justify-content-center align-items-center p-4 bg-success bg-opacity-15 rounded-3">
									<span class="display-6 lh-1 text-success mb-0"><i class="bi bi-person-check fa-fw"></i></span>
									<div class="ms-4">
										<div class="d-flex">
											<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="28" data-purecounter-delay="200">0</h5>
										</div>
										<p class="mb-0 h6 fw-light">طلاب نشطون</p>
									</div>
								</div>
							</div>
							<!-- الصفوف -->
							<div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
								<div class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-15 rounded-3">
									<span class="display-6 lh-1 text-warning mb-0"><i class="bi bi-building fa-fw"></i></span>
									<div class="ms-4">
										<div class="d-flex">
											<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="3" data-purecounter-delay="300">0</h5>
										</div>
										<p class="mb-0 h6 fw-light">الصفوف</p>
									</div>
								</div>
							</div>
						</div>
						<!-- إحصائيات الطلاب END -->

						<!-- قائمة الطلاب START -->
						<div class="card bg-transparent border rounded-3 mb-4">
							<div class="card-header bg-transparent border-bottom">
								<div class="row align-items-center">
									<div class="col">
										<h3 class="mb-0">قائمة الطلاب</h3>
									</div>
									<div class="col-auto">
										<div class="d-flex gap-2">
											<select class="form-select form-select-sm">
												<option>جميع الصفوف</option>
												<option>العاشر أ</option>
												<option>العاشر ب</option>
												<option>الحادي عشر أ</option>
											</select>
											<button class="btn btn-primary btn-sm">إضافة طالب</button>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive border-0">
									<table class="table table-hover align-middle mb-0">
										<thead class="table-light">
											<tr>
												<th scope="col" class="border-0 rounded-start">الطالب</th>
												<th scope="col" class="border-0">رقم الطالب</th>
												<th scope="col" class="border-0">الصف</th>
												<th scope="col" class="border-0">نسبة الحضور</th>
												<th scope="col" class="border-0">المعدل</th>
												<th scope="col" class="border-0">الحالة</th>
												<th scope="col" class="border-0 rounded-end">الإجراء</th>
											</tr>
										</thead>

										<tbody>
											<!-- طالب 1 -->
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="avatar avatar-xs me-2">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
														</div>
														<div>
															<h6 class="mb-0">أحمد محمد</h6>
															<small class="text-secondary">ahmed.mohammed@school.edu.sa</small>
														</div>
													</div>
												</td>
												<td class="fw-bold">2023001</td>
												<td>العاشر أ</td>
												<td>
													<div class="d-flex align-items-center">
														<span class="h6 fw-light me-2">85%</span>
														<div class="progress" style="height: 5px; width: 60px;">
															<div class="progress-bar bg-success" style="width: 85%"></div>
														</div>
													</div>
												</td>
												<td><span class="badge bg-success bg-opacity-10 text-success">88%</span></td>
												<td><span class="badge bg-success bg-opacity-10 text-success">نشط</span></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
															<i class="bi bi-three-dots"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">عرض الملف</a></li>
															<li><a class="dropdown-item" href="#">تعديل البيانات</a></li>
															<li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
															<li><hr class="dropdown-divider"></li>
															<li><a class="dropdown-item text-danger" href="#">حذف</a></li>
														</ul>
													</div>
												</td>
											</tr>

											<!-- طالب 2 -->
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="avatar avatar-xs me-2">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
														</div>
														<div>
															<h6 class="mb-0">سارة أحمد</h6>
															<small class="text-secondary">sara.ahmed@school.edu.sa</small>
														</div>
													</div>
												</td>
												<td class="fw-bold">2023002</td>
												<td>العاشر أ</td>
												<td>
													<div class="d-flex align-items-center">
														<span class="h6 fw-light me-2">92%</span>
														<div class="progress" style="height: 5px; width: 60px;">
															<div class="progress-bar bg-success" style="width: 92%"></div>
														</div>
													</div>
												</td>
												<td><span class="badge bg-success bg-opacity-10 text-success">95%</span></td>
												<td><span class="badge bg-success bg-opacity-10 text-success">نشط</span></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
															<i class="bi bi-three-dots"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">عرض الملف</a></li>
															<li><a class="dropdown-item" href="#">تعديل البيانات</a></li>
															<li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
															<li><hr class="dropdown-divider"></li>
															<li><a class="dropdown-item text-danger" href="#">حذف</a></li>
														</ul>
													</div>
												</td>
											</tr>

											<!-- طالب 3 -->
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="avatar avatar-xs me-2">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
														</div>
														<div>
															<h6 class="mb-0">عبدالله سعد</h6>
															<small class="text-secondary">abdullah.saad@school.edu.sa</small>
														</div>
													</div>
												</td>
												<td class="fw-bold">2023003</td>
												<td>العاشر ب</td>
												<td>
													<div class="d-flex align-items-center">
														<span class="h6 fw-light me-2">78%</span>
														<div class="progress" style="height: 5px; width: 60px;">
															<div class="progress-bar bg-warning" style="width: 78%"></div>
														</div>
													</div>
												</td>
												<td><span class="badge bg-warning bg-opacity-10 text-warning">82%</span></td>
												<td><span class="badge bg-warning bg-opacity-10 text-warning">متأخر</span></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
															<i class="bi bi-three-dots"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">عرض الملف</a></li>
															<li><a class="dropdown-item" href="#">تعديل البيانات</a></li>
															<li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
															<li><hr class="dropdown-divider"></li>
															<li><a class="dropdown-item text-danger" href="#">حذف</a></li>
														</ul>
													</div>
												</td>
											</tr>

											<!-- طالب 4 -->
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="avatar avatar-xs me-2">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
														</div>
														<div>
															<h6 class="mb-0">فاطمة علي</h6>
															<small class="text-secondary">fatima.ali@school.edu.sa</small>
														</div>
													</div>
												</td>
												<td class="fw-bold">2023004</td>
												<td>الحادي عشر أ</td>
												<td>
													<div class="d-flex align-items-center">
														<span class="h6 fw-light me-2">90%</span>
														<div class="progress" style="height: 5px; width: 60px;">
															<div class="progress-bar bg-success" style="width: 90%"></div>
														</div>
													</div>
												</td>
												<td><span class="badge bg-success bg-opacity-10 text-success">91%</span></td>
												<td><span class="badge bg-success bg-opacity-10 text-success">نشط</span></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
															<i class="bi bi-three-dots"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">عرض الملف</a></li>
															<li><a class="dropdown-item" href="#">تعديل البيانات</a></li>
															<li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
															<li><hr class="dropdown-divider"></li>
															<li><a class="dropdown-item text-danger" href="#">حذف</a></li>
														</ul>
													</div>
												</td>
											</tr>

											<!-- طالب 5 -->
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="avatar avatar-xs me-2">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
														</div>
														<div>
															<h6 class="mb-0">يوسف محمود</h6>
															<small class="text-secondary">youssef.mahmoud@school.edu.sa</small>
														</div>
													</div>
												</td>
												<td class="fw-bold">2023005</td>
												<td>العاشر ب</td>
												<td>
													<div class="d-flex align-items-center">
														<span class="h6 fw-light me-2">65%</span>
														<div class="progress" style="height: 5px; width: 60px;">
															<div class="progress-bar bg-danger" style="width: 65%"></div>
														</div>
													</div>
												</td>
												<td><span class="badge bg-danger bg-opacity-10 text-danger">70%</span></td>
												<td><span class="badge bg-danger bg-opacity-10 text-danger">يحتاج متابعة</span></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
															<i class="bi bi-three-dots"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">عرض الملف</a></li>
															<li><a class="dropdown-item" href="#">تعديل البيانات</a></li>
															<li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
															<li><hr class="dropdown-divider"></li>
															<li><a class="dropdown-item text-danger" href="#">حذف</a></li>
														</ul>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- قائمة الطلاب END -->

						<!-- إجراءات سريعة START -->
						<div class="card bg-transparent border rounded-3">
							<div class="card-header bg-transparent border-bottom">
								<h3 class="mb-0">إجراءات سريعة</h3>
							</div>
							<div class="card-body">
								<div class="row g-3">
									<!-- إضافة طالب -->
									<div class="col-md-6">
										<div class="alert alert-primary d-flex align-items-center" role="alert">
											<i class="bi bi-person-plus-fill me-2 fs-4"></i>
											<div>
												<h6 class="mb-1">إضافة طالب جديد</h6>
												<p class="mb-0 small">إضافة طالب جديد للصف</p>
												<a href="#" class="btn btn-primary btn-sm mt-2">إضافة طالب</a>
											</div>
										</div>
									</div>
									
									<!-- إرسال رسالة جماعية -->
									<div class="col-md-6">
										<div class="alert alert-success d-flex align-items-center" role="alert">
											<i class="bi bi-envelope-fill me-2 fs-4"></i>
											<div>
												<h6 class="mb-1">رسالة جماعية</h6>
												<p class="mb-0 small">إرسال رسالة لجميع الطلاب</p>
												<a href="#" class="btn btn-success btn-sm mt-2">إرسال رسالة</a>
											</div>
										</div>
									</div>
									
									<!-- تصدير البيانات -->
									<div class="col-md-6">
										<div class="alert alert-warning d-flex align-items-center" role="alert">
											<i class="bi bi-download me-2 fs-4"></i>
											<div>
												<h6 class="mb-1">تصدير قائمة الطلاب</h6>
												<p class="mb-0 small">تحميل ملف Excel بجميع البيانات</p>
												<a href="#" class="btn btn-warning btn-sm mt-2">تصدير Excel</a>
											</div>
										</div>
									</div>
									
									<!-- طباعة القائمة -->
									<div class="col-md-6">
										<div class="alert alert-info d-flex align-items-center" role="alert">
											<i class="bi bi-printer-fill me-2 fs-4"></i>
											<div>
												<h6 class="mb-1">طباعة القائمة</h6>
												<p class="mb-0 small">طباعة قائمة الطلاب مع البيانات</p>
												<a href="#" class="btn btn-info btn-sm mt-2">طباعة</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- إجراءات سريعة END -->

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
	// المتغيرات العامة
	let studentsData = [];
	let filteredStudents = [];
	let classesData = [];

	// تحميل البيانات عند تحميل الصفحة
	document.addEventListener('DOMContentLoaded', function() {
		loadStudents();
		loadClasses();
		loadStats();
	});

	// تحميل قائمة الطلاب
	async function loadStudents() {
		try {
			const response = await fetch('api/students.php?action=list');
			const result = await response.json();
			
			if (result.success) {
				studentsData = result.data;
				filteredStudents = [...studentsData];
				displayStudents(filteredStudents);
			} else {
				console.error('خطأ في تحميل الطلاب:', result.error);
			}
		} catch (error) {
			console.error('خطأ في الشبكة:', error);
		}
	}

	// تحميل قائمة الفصول
	async function loadClasses() {
		try {
			const response = await fetch('api/students.php?action=classes');
			const result = await response.json();
			
			if (result.success) {
				classesData = result.data;
				updateClassFilter();
			}
		} catch (error) {
			console.error('خطأ في تحميل الفصول:', error);
		}
	}

	// تحميل الإحصائيات
	async function loadStats() {
		try {
			const response = await fetch('api/students.php?action=stats');
			const result = await response.json();
			
			if (result.success) {
				updateStatsDisplay(result.data);
			}
		} catch (error) {
			console.error('خطأ في تحميل الإحصائيات:', error);
		}
	}

	// عرض الطلاب في الجدول
	function displayStudents(students) {
		const tbody = document.querySelector('.table tbody');
		
		if (!students || students.length === 0) {
			tbody.innerHTML = `
				<tr>
					<td colspan="7" class="text-center py-4">
						<div class="text-muted">
							<i class="bi bi-person-x display-4"></i>
							<p class="mt-2">لا توجد بيانات طلاب</p>
						</div>
					</td>
				</tr>
			`;
			return;
		}

		tbody.innerHTML = students.map(student => `
			<tr>
				<td>
					<div class="d-flex align-items-center">
						<div class="avatar avatar-xs me-2">
							<img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
						</div>
						<div>
							<h6 class="mb-0">${student.arabic_first_name} ${student.arabic_last_name}</h6>
							<small class="text-secondary">${student.phone || 'لا يوجد'}</small>
						</div>
					</div>
				</td>
				<td class="fw-bold">${student.roll_number}</td>
				<td>${student.class_name}</td>
				<td>
					<div class="d-flex align-items-center">
						<span class="h6 fw-light me-2">85%</span>
						<div class="progress" style="height: 5px; width: 60px;">
							<div class="progress-bar bg-success" style="width: 85%"></div>
						</div>
					</div>
				</td>
				<td><span class="badge bg-success bg-opacity-10 text-success">88%</span></td>
				<td><span class="badge bg-success bg-opacity-10 text-success">نشط</span></td>
				<td>
					<div class="dropdown">
						<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
							<i class="bi bi-three-dots"></i>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#" onclick="viewStudent('${student.student_id}')">عرض الملف</a></li>
							<li><a class="dropdown-item" href="#" onclick="editStudent('${student.student_id}')">تعديل البيانات</a></li>
							<li><a class="dropdown-item" href="#" onclick="sendMessage('${student.student_id}')">إرسال رسالة</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item text-danger" href="#" onclick="deleteStudent('${student.student_id}')">حذف</a></li>
						</ul>
					</div>
				</td>
			</tr>
		`).join('');
	}

	// تحديث فلتر الفصول
	function updateClassFilter() {
		const select = document.querySelector('.form-select');
		if (select && classesData.length > 0) {
			select.innerHTML = `
				<option value="">جميع الصفوف</option>
				${classesData.map(cls => 
					`<option value="${cls.id}">${cls.class_name}</option>`
				).join('')}
			`;
			
			// إضافة مستمع لتغيير الفلتر
			select.addEventListener('change', function() {
				filterStudentsByClass(this.value);
			});
		}
	}

	// فلترة الطلاب حسب الفصل
	function filterStudentsByClass(classId) {
		if (!classId) {
			filteredStudents = [...studentsData];
		} else {
			filteredStudents = studentsData.filter(student => 
				student.school_class_id === classId
			);
		}
		displayStudents(filteredStudents);
	}

	// تحديث الإحصائيات
	function updateStatsDisplay(stats) {
		// إجمالي الطلاب
		const totalElement = document.querySelector('[data-purecounter-end="32"]');
		if (totalElement) {
			totalElement.setAttribute('data-purecounter-end', stats.total);
			totalElement.textContent = stats.total;
		}

		// الطلاب النشطون (افتراضي: 90% من الإجمالي)
		const activeElement = document.querySelector('[data-purecounter-end="28"]');
		if (activeElement) {
			const activeCount = Math.floor(stats.total * 0.9);
			activeElement.setAttribute('data-purecounter-end', activeCount);
			activeElement.textContent = activeCount;
		}

		// عدد الصفوف
		const classesElement = document.querySelector('[data-purecounter-end="3"]');
		if (classesElement && stats.by_grade) {
			classesElement.setAttribute('data-purecounter-end', stats.by_grade.length);
			classesElement.textContent = stats.by_grade.length;
		}
	}

	// عرض ملف الطالب
	function viewStudent(studentId) {
		// يمكن إضافة modal أو توجيه لصفحة مخصصة
		alert('عرض ملف الطالب: ' + studentId);
	}

	// تعديل بيانات الطالب
	function editStudent(studentId) {
		// يمكن إضافة modal للتعديل
		alert('تعديل الطالب: ' + studentId);
	}

	// إرسال رسالة للطالب
	function sendMessage(studentId) {
		alert('إرسال رسالة للطالب: ' + studentId);
	}

	// حذف الطالب
	async function deleteStudent(studentId) {
		if (confirm('هل أنت متأكد من حذف هذا الطالب؟')) {
			try {
				const response = await fetch(`api/students.php?action=delete&id=${studentId}`, {
					method: 'DELETE'
				});
				const result = await response.json();
				
				if (result.success) {
					alert('تم حذف الطالب بنجاح');
					loadStudents(); // إعادة تحميل القائمة
				} else {
					alert('خطأ في حذف الطالب: ' + result.message);
				}
			} catch (error) {
				alert('خطأ في الشبكة: ' + error.message);
			}
		}
	}

	// تشغيل العدادات المتحركة
	setTimeout(() => {
		if (typeof PureCounter !== 'undefined') {
			new PureCounter();
		}
	}, 1000);
	</script>

</body>

</html>
