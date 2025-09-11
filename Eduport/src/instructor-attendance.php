<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
	<?php include("partials/title-meta.php"); ?>
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices.js/public/assets/styles/choices.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
	<?php include("partials/head-css.php"); ?>
	
	<style>
		/* Same RTL styling as student pages */
		body { font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; }
		.navbar-brand-item { height: 45px !important; width: auto !important; transition: all 0.3s ease; }
		.navbar { direction: rtl; }
		.dropdown-menu { left: auto !important; right: 0 !important; text-align: right !important; }
		.nav-link { direction: rtl !important; text-align: right !important; }
		.dropdown-item { direction: rtl !important; text-align: right !important; }
		.nav-link i, .dropdown-item i { margin-left: 0.5rem !important; margin-right: 0 !important; }
		.js-auth-when-logged-in { display: none; }
		.js-auth-when-logged-out { display: flex; align-items: center; }
		.container, .navbar > .container { direction: rtl !important; }
		.card-body, .card-header { direction: rtl !important; text-align: right !important; }
		.table { direction: rtl !important; }
		.table th, .table td { text-align: right !important; }
		.list-group-item { direction: rtl !important; text-align: right !important; }
		.list-group-item i { margin-left: 0.5rem !important; margin-right: 0 !important; }
		.form-control { text-align: right !important; }
		.btn { direction: rtl !important; }
		h1, h2, h3, h4, h5, h6, p, span, .small, .text-body { font-family: 'Cairo', Arial, sans-serif !important; }
	</style>
</head>

<body>
	<!-- Same header as instructor-students.php -->
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
					<!-- Notification dropdown omitted for brevity: keep same as dashboard -->
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
							<li class="px-3">
								<div class="d-flex align-items-center">
									<div class="avatar me-3">
										<img class="avatar-img rounded-circle shadow" src="assets/images/avatar/01.jpg" alt="avatar">
									</div>
									<div>
										<a class="h6 mt-2 mt-sm-0" href="#">د. سارة أحمد</a>
										<p class="small m-0">teacher@example.com</p>
									</div>
								</div>
								<hr>
							</li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item js-dashboard-link" href="#"><i class="bi bi-speedometer2 fa-fw me-2"></i>لوحة التحكم</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>تعديل الملف الشخصي</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>إعدادات الحساب</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>المساعدة</a></li>
							<li><a class="dropdown-item bg-danger-soft-hover js-logout" href="#" onclick="signOut()"><i class="bi bi-power fa-fw me-2"></i>تسجيل الخروج</a></li>
							<li><hr class="dropdown-divider"></li>
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

	<main>
		<section class="pt-0">
			<div class="container-fluid px-0">
				<div class="card bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;"></div>
			</div>
			<div class="container mt-n4">
				<div class="row">
					<div class="col-12">
						<div class="card bg-transparent card-body pb-0 px-0 mt-2 mt-sm-0">
							<div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
								<div class="col-auto">
									<div class="avatar avatar-xxl position-relative mt-n3">
										<img id="js-profile-avatar-header" class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/avatar/07.jpg" alt="">
										<span class="badge text-bg-primary rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">مدرس</span>
									</div>
								</div>
								<div class="col d-sm-flex justify-content-between align-items-center">
									<div>
										<h1 id="js-profile-name" class="my-1 fs-4">د. محمد العبدالله</h1>
										<ul class="list-inline mb-0">
											<li class="list-inline-item me-3 mb-1 mb-sm-0"><span class="h6">اليوم</span><span class="text-body fw-light">10 سبتمبر 2025</span></li>
											<li class="list-inline-item me-3 mb-1 mb-sm-0"><span class="h6">32</span><span class="text-body fw-light">طالب</span></li>
											<li class="list-inline-item me-3 mb-1 mb-sm-0"><span class="h6">85%</span><span class="text-body fw-light">نسبة الحضور</span></li>
										</ul>
									</div>
									<div class="mt-2 mt-sm-0">
										<a href="#" class="btn btn-outline-primary mb-0">حفظ الحضور</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="pt-0">
			<div class="container">
				<div class="row">
					<div class="col-xl-3">
						<div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
							<div class="offcanvas-body p-3 p-xl-0">
								<div class="bg-dark border rounded-3 p-3 w-100">
									<div class="list-group list-group-dark list-group-borderless collapse-list">
										<a class="list-group-item" href="instructor-dashboard.php"><i class="bi bi-speedometer2 fa-fw me-2"></i>لوحة التحكم</a>
										<a class="list-group-item" href="instructor-students.php"><i class="bi bi-people fa-fw me-2"></i>إدارة الطلاب</a>
										<a class="list-group-item active" href="instructor-attendance.php"><i class="bi bi-calendar-check fa-fw me-2"></i>تسجيل الحضور</a>
										<a class="list-group-item" href="instructor-lessons.php"><i class="bi bi-journals fa-fw me-2"></i>رفع الدروس</a>
										<a class="list-group-item" href="instructor-grades.php"><i class="bi bi-award fa-fw me-2"></i>إدخال الدرجات</a>
										<a class="list-group-item" href="instructor-announcements.php"><i class="bi bi-megaphone fa-fw me-2"></i>الإعلانات</a>
										<a class="list-group-item" href="instructor-reports.php"><i class="bi bi-file-earmark-text fa-fw me-2"></i>التقارير</a>
										<a class="list-group-item" href="instructor-edit-profile.php"><i class="bi bi-person-circle fa-fw me-2"></i>الملف الشخصي</a>
										<a class="list-group-item" href="instructor-setting.php"><i class="bi bi-gear fa-fw me-2"></i>الإعدادات</a>
										<a class="list-group-item text-danger bg-danger-soft-hover" href="#" onclick="signOut()"><i class="fas fa-sign-out-alt fa-fw me-2"></i>تسجيل الخروج</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-9">
						<!-- تسجيل الحضور -->
						<div class="card bg-transparent border rounded-3 mb-4">
							<div class="card-header bg-transparent border-bottom">
								<h3 class="mb-0">تسجيل الحضور - الصف العاشر أ</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive border-0">
									<table class="table table-hover align-middle mb-0">
										<thead class="table-light">
											<tr>
												<th>الطالب</th>
												<th>رقم الطالب</th>
												<th>الحالة</th>
												<th>ملاحظات</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>أحمد محمد</td>
												<td>2023001</td>
												<td>
													<select class="form-select form-select-sm">
														<option value="present" selected>حاضر</option>
														<option value="absent">غائب</option>
														<option value="late">متأخر</option>
													</select>
												</td>
												<td><input type="text" class="form-control form-control-sm" placeholder="ملاحظات..."></td>
											</tr>
											<tr>
												<td>سارة أحمد</td>
												<td>2023002</td>
												<td>
													<select class="form-select form-select-sm">
														<option value="present" selected>حاضر</option>
														<option value="absent">غائب</option>
														<option value="late">متأخر</option>
													</select>
												</td>
												<td><input type="text" class="form-control form-control-sm" placeholder="ملاحظات..."></td>
											</tr>
											<tr>
												<td>عبدالله سعد</td>
												<td>2023003</td>
												<td>
													<select class="form-select form-select-sm">
														<option value="present">حاضر</option>
														<option value="absent">غائب</option>
														<option value="late" selected>متأخر</option>
													</select>
												</td>
												<td><input type="text" class="form-control form-control-sm" value="تأخر 15 دقيقة"></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="mt-3">
									<button class="btn btn-primary">حفظ الحضور</button>
									<button class="btn btn-outline-secondary ms-2">إلغاء</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<footer class="bg-dark p-3">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
					<a href="index.php"><img class="h-20px" src="assets/images/logo-light.svg" alt="logo"></a>
				</div>
				<div class="col-md-4 mb-3 mb-md-0">
					<div class="text-center text-white text-primary-hover">
						Copyrights ©2024 Eduport. Build by <a href="https://1.envato.market/stackbros-portfolio" target="_blank" class="text-white">StackBros</a>.
					</div>
				</div>
			</div>
		</div>
	</footer>

	<script src="assets/vendor/@srexi/purecounterjs/purecounter_vanilla.js"></script>
	<?php include("partials/footer-scripts.php"); ?>
</body>
</html>
