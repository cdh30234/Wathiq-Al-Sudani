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
								<img class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/avatar/01.jpg" alt="">
								<span class="badge text-bg-danger rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">مدير</span>
							</div>
						</div>
						<div class="col d-sm-flex justify-content-between align-items-center">
							<div>
								<h1 class="my-1 fs-4">التقارير الإدارية</h1>
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-3"><span class="h6">25</span><span class="text-body fw-light">تقرير متاح</span></li>
									<li class="list-inline-item me-3"><span class="h6">Excel & PDF</span><span class="text-body fw-light">تصدير</span></li>
								</ul>
							</div>
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-primary mb-0">إنشاء تقرير جديد</a>
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
								<a class="list-group-item" href="admin-dashboard.php"><i class="bi bi-speedometer2 fa-fw me-2"></i>لوحة التحكم</a>
								<a class="list-group-item" href="admin-teachers.php"><i class="bi bi-people fa-fw me-2"></i>إدارة المدرسين</a>
								<a class="list-group-item" href="admin-students.php"><i class="bi bi-person-lines-fill fa-fw me-2"></i>إدارة الطلاب</a>
								<a class="list-group-item" href="admin-classes.php"><i class="bi bi-building fa-fw me-2"></i>إدارة الصفوف</a>
								<a class="list-group-item" href="admin-subjects.php"><i class="bi bi-book fa-fw me-2"></i>إدارة المواد</a>
								<a class="list-group-item active" href="admin-reports.php"><i class="bi bi-file-earmark-text fa-fw me-2"></i>التقارير</a>
								<a class="list-group-item" href="admin-settings.php"><i class="bi bi-gear fa-fw me-2"></i>إعدادات النظام</a>
							</div>
						</div>
					</div>

					<div class="col-xl-9">
						<!-- أنواع التقارير -->
						<div class="row mb-4">
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<i class="bi bi-people fs-1 text-primary"></i>
										<h5 class="mt-2">تقارير الطلاب</h5>
										<p class="small">الحضور، الدرجات، الأداء</p>
										<button class="btn btn-sm btn-primary">إنشاء</button>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<i class="bi bi-person-workspace fs-1 text-success"></i>
										<h5 class="mt-2">تقارير المدرسين</h5>
										<p class="small">الأداء، الحضور، التقييم</p>
										<button class="btn btn-sm btn-success">إنشاء</button>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<i class="bi bi-graph-up fs-1 text-warning"></i>
										<h5 class="mt-2">التقارير المالية</h5>
										<p class="small">الرسوم، المصروفات، الميزانية</p>
										<button class="btn btn-sm btn-warning">إنشاء</button>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<i class="bi bi-bar-chart fs-1 text-info"></i>
										<h5 class="mt-2">تقارير شاملة</h5>
										<p class="small">التقرير السنوي العام</p>
										<button class="btn btn-sm btn-info">إنشاء</button>
									</div>
								</div>
							</div>
						</div>

						<!-- التقارير المتاحة -->
						<div class="card bg-transparent border rounded-3 mb-4">
							<div class="card-header bg-transparent border-bottom">
								<h3 class="mb-0">التقارير المتاحة</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>اسم التقرير</th>
												<th>النوع</th>
												<th>الفترة</th>
												<th>تاريخ الإنشاء</th>
												<th>الحالة</th>
												<th>الإجراء</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>تقرير حضور الطلاب الشهري</td>
												<td><span class="badge bg-primary">طلاب</span></td>
												<td>سبتمبر 2025</td>
												<td>10 سبتمبر 2025</td>
												<td><span class="badge bg-success">جاهز</span></td>
												<td>
													<button class="btn btn-sm btn-outline-primary">تحميل PDF</button>
													<button class="btn btn-sm btn-outline-success">تحميل Excel</button>
												</td>
											</tr>
											<tr>
												<td>تقرير أداء المدرسين</td>
												<td><span class="badge bg-success">مدرسين</span></td>
												<td>الفصل الأول 2025</td>
												<td>08 سبتمبر 2025</td>
												<td><span class="badge bg-success">جاهز</span></td>
												<td>
													<button class="btn btn-sm btn-outline-primary">تحميل PDF</button>
													<button class="btn btn-sm btn-outline-success">تحميل Excel</button>
												</td>
											</tr>
											<tr>
												<td>التقرير المالي الربعي</td>
												<td><span class="badge bg-warning">مالي</span></td>
												<td>الربع الثالث 2025</td>
												<td>05 سبتمبر 2025</td>
												<td><span class="badge bg-warning">قيد المعالجة</span></td>
												<td>
													<button class="btn btn-sm btn-secondary disabled">انتظار</button>
												</td>
											</tr>
											<tr>
												<td>تقرير الدرجات النهائية</td>
												<td><span class="badge bg-primary">طلاب</span></td>
												<td>جميع المواد</td>
												<td>01 سبتمبر 2025</td>
												<td><span class="badge bg-success">جاهز</span></td>
												<td>
													<button class="btn btn-sm btn-outline-primary">تحميل PDF</button>
													<button class="btn btn-sm btn-outline-success">تحميل Excel</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<!-- إحصائيات سريعة -->
						<div class="row">
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										<h5 class="mb-0">نسبة الحضور العامة</h5>
									</div>
									<div class="card-body text-center">
										<h2 class="text-success">85%</h2>
										<p class="text-muted">متوسط حضور جميع الطلاب</p>
										<div class="progress">
											<div class="progress-bar bg-success" style="width: 85%"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										<h5 class="mb-0">المعدل العام للمدرسة</h5>
									</div>
									<div class="card-body text-center">
										<h2 class="text-primary">88%</h2>
										<p class="text-muted">متوسط درجات جميع المواد</p>
										<div class="progress">
											<div class="progress-bar bg-primary" style="width: 88%"></div>
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
