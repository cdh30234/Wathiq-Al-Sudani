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
								<h1 class="my-1 fs-4">إدخال الدرجات</h1>
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-3"><span class="h6">32</span><span class="text-body fw-light">طالب</span></li>
									<li class="list-inline-item me-3"><span class="h6">الرياضيات</span><span class="text-body fw-light">المادة</span></li>
								</ul>
							</div>
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-primary mb-0">حفظ الدرجات</a>
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
								<a class="list-group-item active" href="instructor-grades.php"><i class="bi bi-award fa-fw me-2"></i>إدخال الدرجات</a>
								<a class="list-group-item" href="instructor-announcements.php"><i class="bi bi-megaphone fa-fw me-2"></i>الإعلانات</a>
							</div>
						</div>
					</div>

					<div class="col-xl-9">
						<div class="card bg-transparent border rounded-3 mb-4">
							<div class="card-header bg-transparent border-bottom">
								<div class="row align-items-center">
									<div class="col">
										<h3 class="mb-0">إدخال درجات الاختبار</h3>
									</div>
									<div class="col-auto">
										<select class="form-select">
											<option>اختبار نصف الفصل</option>
											<option>اختبار نهاية الفصل</option>
											<option>واجب منزلي</option>
											<option>مشاركة صفية</option>
										</select>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>الطالب</th>
												<th>رقم الطالب</th>
												<th>الدرجة (من 100)</th>
												<th>التقدير</th>
												<th>ملاحظات</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>أحمد محمد</td>
												<td>2023001</td>
												<td><input type="number" class="form-control form-control-sm" min="0" max="100" value="88"></td>
												<td><span class="badge bg-success">ممتاز</span></td>
												<td><input type="text" class="form-control form-control-sm" placeholder="ملاحظات..."></td>
											</tr>
											<tr>
												<td>سارة أحمد</td>
												<td>2023002</td>
												<td><input type="number" class="form-control form-control-sm" min="0" max="100" value="95"></td>
												<td><span class="badge bg-success">ممتاز</span></td>
												<td><input type="text" class="form-control form-control-sm" placeholder="ملاحظات..."></td>
											</tr>
											<tr>
												<td>عبدالله سعد</td>
												<td>2023003</td>
												<td><input type="number" class="form-control form-control-sm" min="0" max="100" value="82"></td>
												<td><span class="badge bg-warning">جيد جداً</span></td>
												<td><input type="text" class="form-control form-control-sm" placeholder="ملاحظات..."></td>
											</tr>
											<tr>
												<td>فاطمة علي</td>
												<td>2023004</td>
												<td><input type="number" class="form-control form-control-sm" min="0" max="100" value="91"></td>
												<td><span class="badge bg-success">ممتاز</span></td>
												<td><input type="text" class="form-control form-control-sm" placeholder="ملاحظات..."></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="mt-3">
									<button class="btn btn-primary">حفظ الدرجات</button>
									<button class="btn btn-outline-secondary ms-2">إلغاء</button>
									<button class="btn btn-outline-info ms-2">معاينة التقرير</button>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="card h-100">
									<div class="card-body text-center">
										<h5 class="text-success">المتفوقون</h5>
										<h2 class="text-success">8</h2>
										<p class="small">طلاب حصلوا على 90% فأكثر</p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card h-100">
									<div class="card-body text-center">
										<h5 class="text-warning">يحتاجون تحسين</h5>
										<h2 class="text-warning">3</h2>
										<p class="small">طلاب حصلوا على أقل من 75%</p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card h-100">
									<div class="card-body text-center">
										<h5 class="text-primary">متوسط الصف</h5>
										<h2 class="text-primary">86%</h2>
										<p class="small">المتوسط العام للاختبار</p>
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
