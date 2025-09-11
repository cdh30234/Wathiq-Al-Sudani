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
								<h1 class="my-1 fs-4">إدارة الطلاب</h1>
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-3"><span class="h6">450</span><span class="text-body fw-light">طالب مسجل</span></li>
									<li class="list-inline-item me-3"><span class="h6">18</span><span class="text-body fw-light">صف دراسي</span></li>
									<li class="list-inline-item me-3"><span class="h6">85%</span><span class="text-body fw-light">نسبة الحضور العامة</span></li>
								</ul>
							</div>
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-primary mb-0">إضافة طالب جديد</a>
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
								<a class="list-group-item active" href="admin-students.php"><i class="bi bi-person-lines-fill fa-fw me-2"></i>إدارة الطلاب</a>
								<a class="list-group-item" href="admin-classes.php"><i class="bi bi-building fa-fw me-2"></i>إدارة الصفوف</a>
								<a class="list-group-item" href="admin-subjects.php"><i class="bi bi-book fa-fw me-2"></i>إدارة المواد</a>
								<a class="list-group-item" href="admin-reports.php"><i class="bi bi-file-earmark-text fa-fw me-2"></i>التقارير</a>
								<a class="list-group-item" href="admin-settings.php"><i class="bi bi-gear fa-fw me-2"></i>إعدادات النظام</a>
							</div>
						</div>
					</div>

					<div class="col-xl-9">
						<!-- إحصائيات الطلاب -->
						<div class="row mb-4">
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<h3 class="text-primary">450</h3>
										<p class="mb-0">إجمالي الطلاب</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<h3 class="text-success">425</h3>
										<p class="mb-0">طلاب نشطين</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<h3 class="text-warning">15</h3>
										<p class="mb-0">يحتاجون متابعة</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<h3 class="text-info">10</h3>
										<p class="mb-0">متفوقين</p>
									</div>
								</div>
							</div>
						</div>

						<!-- البحث والفلترة -->
						<div class="card bg-transparent border rounded-3 mb-4">
							<div class="card-body">
								<div class="row g-3">
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="البحث بالاسم أو رقم الطالب...">
									</div>
									<div class="col-md-2">
										<select class="form-select">
											<option>جميع الصفوف</option>
											<option>العاشر أ</option>
											<option>العاشر ب</option>
											<option>الحادي عشر أ</option>
										</select>
									</div>
									<div class="col-md-2">
										<select class="form-select">
											<option>جميع الحالات</option>
											<option>نشط</option>
											<option>يحتاج متابعة</option>
											<option>متفوق</option>
										</select>
									</div>
									<div class="col-md-2">
										<button class="btn btn-primary w-100">بحث</button>
									</div>
									<div class="col-md-2">
										<button class="btn btn-outline-secondary w-100">تصدير Excel</button>
									</div>
								</div>
							</div>
						</div>

						<!-- قائمة الطلاب -->
						<div class="card bg-transparent border rounded-3">
							<div class="card-header bg-transparent border-bottom">
								<h3 class="mb-0">قائمة الطلاب</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>الطالب</th>
												<th>رقم الطالب</th>
												<th>الصف</th>
												<th>ولي الأمر</th>
												<th>نسبة الحضور</th>
												<th>المعدل</th>
												<th>الحالة</th>
												<th>الإجراء</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="avatar avatar-xs me-2">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="">
														</div>
														<div>
															<h6 class="mb-0">أحمد محمد</h6>
															<small class="text-secondary">ahmed.mohammed@school.edu.sa</small>
														</div>
													</div>
												</td>
												<td class="fw-bold">2023001</td>
												<td>العاشر أ</td>
												<td>محمد أحمد<br><small>+966501234000</small></td>
												<td>
													<span class="h6 fw-light">85%</span>
													<div class="progress" style="height: 4px;">
														<div class="progress-bar bg-success" style="width: 85%"></div>
													</div>
												</td>
												<td><span class="badge bg-success">88%</span></td>
												<td><span class="badge bg-success">نشط</span></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
															<i class="bi bi-three-dots"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">عرض الملف</a></li>
															<li><a class="dropdown-item" href="#">تعديل البيانات</a></li>
															<li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
															<li><a class="dropdown-item" href="#">تقرير الأداء</a></li>
															<li><hr class="dropdown-divider"></li>
															<li><a class="dropdown-item text-danger" href="#">نقل الصف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="avatar avatar-xs me-2">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
														</div>
														<div>
															<h6 class="mb-0">سارة أحمد</h6>
															<small class="text-secondary">sara.ahmed@school.edu.sa</small>
														</div>
													</div>
												</td>
												<td class="fw-bold">2023002</td>
												<td>العاشر أ</td>
												<td>أحمد عبدالله<br><small>+966501234001</small></td>
												<td>
													<span class="h6 fw-light">92%</span>
													<div class="progress" style="height: 4px;">
														<div class="progress-bar bg-success" style="width: 92%"></div>
													</div>
												</td>
												<td><span class="badge bg-success">95%</span></td>
												<td><span class="badge bg-info">متفوق</span></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
															<i class="bi bi-three-dots"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">عرض الملف</a></li>
															<li><a class="dropdown-item" href="#">تعديل البيانات</a></li>
															<li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
															<li><a class="dropdown-item" href="#">تقرير الأداء</a></li>
															<li><hr class="dropdown-divider"></li>
															<li><a class="dropdown-item text-danger" href="#">نقل الصف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="avatar avatar-xs me-2">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="">
														</div>
														<div>
															<h6 class="mb-0">يوسف محمود</h6>
															<small class="text-secondary">youssef.mahmoud@school.edu.sa</small>
														</div>
													</div>
												</td>
												<td class="fw-bold">2023005</td>
												<td>العاشر ب</td>
												<td>محمود يوسف<br><small>+966501234005</small></td>
												<td>
													<span class="h6 fw-light">65%</span>
													<div class="progress" style="height: 4px;">
														<div class="progress-bar bg-danger" style="width: 65%"></div>
													</div>
												</td>
												<td><span class="badge bg-warning">70%</span></td>
												<td><span class="badge bg-warning">يحتاج متابعة</span></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
															<i class="bi bi-three-dots"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">عرض الملف</a></li>
															<li><a class="dropdown-item" href="#">تعديل البيانات</a></li>
															<li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
															<li><a class="dropdown-item" href="#">تقرير الأداء</a></li>
															<li><hr class="dropdown-divider"></li>
															<li><a class="dropdown-item text-success" href="#">خطة تحسين</a></li>
														</ul>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- Pagination -->
								<nav class="mt-4">
									<ul class="pagination justify-content-center">
										<li class="page-item disabled"><a class="page-link" href="#">السابق</a></li>
										<li class="page-item active"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">التالي</a></li>
									</ul>
								</nav>
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
