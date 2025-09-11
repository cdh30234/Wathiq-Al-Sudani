<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<?php include("partials/title-meta.php"); ?>
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
	<?php include("partials/head-css.php"); ?>
	<style>
		body { font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; }
		.navbar { direction: rtl; } .container { direction: rtl !important; }
		.card-body, .card-header { direction: rtl !important; text-align: right !important; }
		.table { direction: rtl !important; } .table th, .table td { text-align: right !important; }
		.form-control { text-align: right !important; }
		h1, h2, h3, h4, h5, h6 { font-family: 'Cairo', Arial, sans-serif !important; }
	</style>
</head>
<body>
	<header class="navbar-light navbar-sticky">
		<nav class="navbar navbar-expand-xl z-index-9">
			<div class="container">
				<a class="navbar-brand" href="index-9.php">
					<img class="light-mode-item navbar-brand-item" src="assets/images/logo-sms.svg" alt="نظام إدارة الطلاب" style="height: 45px;">
				</a>
			</div>
		</nav>
	</header>

	<main>
		<section class="pt-0">
			<div class="container-fluid px-0">
				<div class="card bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;"></div>
			</div>
			<div class="container mt-n4">
				<div class="card bg-transparent card-body pb-0 px-0 mt-2 mt-sm-0">
					<div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
						<div class="col-auto">
							<div class="avatar avatar-xxl position-relative mt-n3">
								<img class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/avatar/07.jpg" alt="">
								<span class="badge text-bg-primary rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">مدرس</span>
							</div>
						</div>
						<div class="col d-sm-flex justify-content-between align-items-center">
							<div>
								<h1 class="my-1 fs-4">إدارة الإعلانات</h1>
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-3"><span class="h6">12</span><span class="text-body fw-light">إعلان نشط</span></li>
									<li class="list-inline-item me-3"><span class="h6">32</span><span class="text-body fw-light">طالب مستهدف</span></li>
								</ul>
							</div>
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-primary mb-0">إعلان جديد</a>
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
						<div class="bg-dark border rounded-3 p-3 w-100">
							<div class="list-group list-group-dark list-group-borderless">
								<a class="list-group-item" href="instructor-dashboard.php"><i class="bi bi-speedometer2 fa-fw me-2"></i>لوحة التحكم</a>
								<a class="list-group-item" href="instructor-students.php"><i class="bi bi-people fa-fw me-2"></i>إدارة الطلاب</a>
								<a class="list-group-item" href="instructor-attendance.php"><i class="bi bi-calendar-check fa-fw me-2"></i>تسجيل الحضور</a>
								<a class="list-group-item" href="instructor-lessons.php"><i class="bi bi-journals fa-fw me-2"></i>رفع الدروس</a>
								<a class="list-group-item" href="instructor-grades.php"><i class="bi bi-award fa-fw me-2"></i>إدخال الدرجات</a>
								<a class="list-group-item active" href="instructor-announcements.php"><i class="bi bi-megaphone fa-fw me-2"></i>الإعلانات</a>
							</div>
						</div>
					</div>

					<div class="col-xl-9">
						<div class="card bg-transparent border rounded-3 mb-4">
							<div class="card-header bg-transparent border-bottom">
								<h3 class="mb-0">إعلان جديد</h3>
							</div>
							<div class="card-body">
								<form>
									<div class="row g-3">
										<div class="col-md-6">
											<label class="form-label">عنوان الإعلان</label>
											<input type="text" class="form-control" placeholder="أدخل عنوان الإعلان">
										</div>
										<div class="col-md-6">
											<label class="form-label">نوع الإعلان</label>
											<select class="form-select">
												<option>عام</option>
												<option>اختبار</option>
												<option>واجب</option>
												<option>إجازة</option>
												<option>مهم</option>
											</select>
										</div>
										<div class="col-md-6">
											<label class="form-label">الصف المستهدف</label>
											<select class="form-select">
												<option>جميع الصفوف</option>
												<option>العاشر أ</option>
												<option>العاشر ب</option>
												<option>الحادي عشر أ</option>
											</select>
										</div>
										<div class="col-md-6">
											<label class="form-label">تاريخ انتهاء الإعلان</label>
											<input type="date" class="form-control">
										</div>
										<div class="col-12">
											<label class="form-label">محتوى الإعلان</label>
											<textarea class="form-control" rows="4" placeholder="اكتب محتوى الإعلان هنا..."></textarea>
										</div>
										<div class="col-12">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" id="urgent">
												<label class="form-check-label" for="urgent">إعلان عاجل</label>
											</div>
										</div>
										<div class="col-12">
											<button type="submit" class="btn btn-primary">نشر الإعلان</button>
											<button type="button" class="btn btn-outline-secondary ms-2">حفظ كمسودة</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<div class="card bg-transparent border rounded-3">
							<div class="card-header bg-transparent border-bottom">
								<h3 class="mb-0">الإعلانات المنشورة</h3>
							</div>
							<div class="card-body">
								<div class="row g-3">
									<div class="col-12">
										<div class="alert alert-warning d-flex align-items-start" role="alert">
											<i class="bi bi-exclamation-triangle-fill me-3 fs-4"></i>
											<div class="flex-grow-1">
												<h6 class="mb-1">موعد الاختبار النهائي</h6>
												<p class="mb-2 small">الاختبار النهائي لمادة الرياضيات يوم الأحد القادم الساعة 8:00 صباحاً. يرجى الحضور مبكراً ومراجعة المنهج.</p>
												<div class="d-flex justify-content-between align-items-center">
													<small class="text-muted">منشور منذ يومين | الصف: العاشر أ</small>
													<div>
														<button class="btn btn-sm btn-outline-primary">تعديل</button>
														<button class="btn btn-sm btn-outline-danger">حذف</button>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-12">
										<div class="alert alert-info d-flex align-items-start" role="alert">
											<i class="bi bi-info-circle-fill me-3 fs-4"></i>
											<div class="flex-grow-1">
												<h6 class="mb-1">واجب الرياضيات</h6>
												<p class="mb-2 small">حل التمارين من صفحة 45 إلى 50. آخر موعد للتسليم يوم الخميس.</p>
												<div class="d-flex justify-content-between align-items-center">
													<small class="text-muted">منشور منذ 3 أيام | الصف: جميع الصفوف</small>
													<div>
														<button class="btn btn-sm btn-outline-primary">تعديل</button>
														<button class="btn btn-sm btn-outline-danger">حذف</button>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-12">
										<div class="alert alert-success d-flex align-items-start" role="alert">
											<i class="bi bi-check-circle-fill me-3 fs-4"></i>
											<div class="flex-grow-1">
												<h6 class="mb-1">درس جديد متاح</h6>
												<p class="mb-2 small">تم رفع درس جديد عن "المعادلات التربيعية" في منصة الدروس.</p>
												<div class="d-flex justify-content-between align-items-center">
													<small class="text-muted">منشور منذ أسبوع | الصف: العاشر ب</small>
													<div>
														<button class="btn btn-sm btn-outline-primary">تعديل</button>
														<button class="btn btn-sm btn-outline-danger">حذف</button>
													</div>
												</div>
											</div>
										</div>
									</div>
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
			<div class="text-center text-white">Copyrights ©2024 SMS System</div>
		</div>
	</footer>

	<?php include("partials/footer-scripts.php"); ?>
</body>
</html>
