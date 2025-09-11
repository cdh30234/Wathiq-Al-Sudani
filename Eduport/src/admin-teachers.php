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
								<h1 class="my-1 fs-4">إدارة المدرسين</h1>
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-3"><span class="h6">15</span><span class="text-body fw-light">مدرس نشط</span></li>
									<li class="list-inline-item me-3"><span class="h6">8</span><span class="text-body fw-light">تخصصات</span></li>
									<li class="list-inline-item me-3"><span class="h6">450</span><span class="text-body fw-light">طالب</span></li>
								</ul>
							</div>
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-primary mb-0">إضافة مدرس جديد</a>
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
								<a class="list-group-item active" href="admin-teachers.php"><i class="bi bi-people fa-fw me-2"></i>إدارة المدرسين</a>
								<a class="list-group-item" href="admin-students.php"><i class="bi bi-person-lines-fill fa-fw me-2"></i>إدارة الطلاب</a>
								<a class="list-group-item" href="admin-classes.php"><i class="bi bi-building fa-fw me-2"></i>إدارة الصفوف</a>
								<a class="list-group-item" href="admin-subjects.php"><i class="bi bi-book fa-fw me-2"></i>إدارة المواد</a>
								<a class="list-group-item" href="admin-reports.php"><i class="bi bi-file-earmark-text fa-fw me-2"></i>التقارير</a>
								<a class="list-group-item" href="admin-settings.php"><i class="bi bi-gear fa-fw me-2"></i>إعدادات النظام</a>
							</div>
						</div>
					</div>

					<div class="col-xl-9">
						<!-- إحصائيات المدرسين -->
						<div class="row mb-4">
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<h3 class="text-primary">15</h3>
										<p class="mb-0">إجمالي المدرسين</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<h3 class="text-success">13</h3>
										<p class="mb-0">مدرسين نشطين</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<h3 class="text-warning">2</h3>
										<p class="mb-0">في إجازة</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-body">
										<h3 class="text-info">8</h3>
										<p class="mb-0">التخصصات</p>
									</div>
								</div>
							</div>
						</div>

						<!-- قائمة المدرسين -->
						<div class="card bg-transparent border rounded-3">
							<div class="card-header bg-transparent border-bottom">
								<div class="row align-items-center">
									<div class="col">
										<h3 class="mb-0">قائمة المدرسين</h3>
									</div>
									<div class="col-auto">
										<div class="d-flex gap-2">
											<select class="form-select form-select-sm">
												<option>جميع التخصصات</option>
												<option>الرياضيات</option>
												<option>العلوم</option>
												<option>اللغة العربية</option>
												<option>اللغة الإنجليزية</option>
											</select>
											<button class="btn btn-primary btn-sm">إضافة مدرس</button>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>المدرس</th>
												<th>الرقم الوظيفي</th>
												<th>التخصص</th>
												<th>الصفوف</th>
												<th>عدد الطلاب</th>
												<th>الحالة</th>
												<th>الإجراء</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="avatar avatar-xs me-2">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="">
														</div>
														<div>
															<h6 class="mb-0">د. محمد العبدالله</h6>
															<small class="text-secondary">mohammed.abdullah@school.edu.sa</small>
														</div>
													</div>
												</td>
												<td class="fw-bold">T001</td>
												<td><span class="badge bg-primary">الرياضيات</span></td>
												<td>العاشر أ، العاشر ب</td>
												<td>32</td>
												<td><span class="badge bg-success">نشط</span></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
															<i class="bi bi-three-dots"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">عرض الملف</a></li>
															<li><a class="dropdown-item" href="#">تعديل البيانات</a></li>
															<li><a class="dropdown-item" href="#">عرض الجدول</a></li>
															<li><hr class="dropdown-divider"></li>
															<li><a class="dropdown-item text-danger" href="#">إيقاف</a></li>
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
															<h6 class="mb-0">أ. سارة أحمد</h6>
															<small class="text-secondary">sara.ahmed@school.edu.sa</small>
														</div>
													</div>
												</td>
												<td class="fw-bold">T002</td>
												<td><span class="badge bg-success">العلوم</span></td>
												<td>التاسع أ، التاسع ب</td>
												<td>28</td>
												<td><span class="badge bg-success">نشط</span></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
															<i class="bi bi-three-dots"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">عرض الملف</a></li>
															<li><a class="dropdown-item" href="#">تعديل البيانات</a></li>
															<li><a class="dropdown-item" href="#">عرض الجدول</a></li>
															<li><hr class="dropdown-divider"></li>
															<li><a class="dropdown-item text-danger" href="#">إيقاف</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="avatar avatar-xs me-2">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="">
														</div>
														<div>
															<h6 class="mb-0">أ. عبدالله سعد</h6>
															<small class="text-secondary">abdullah.saad@school.edu.sa</small>
														</div>
													</div>
												</td>
												<td class="fw-bold">T003</td>
												<td><span class="badge bg-warning">اللغة العربية</span></td>
												<td>الحادي عشر أ</td>
												<td>25</td>
												<td><span class="badge bg-warning">في إجازة</span></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
															<i class="bi bi-three-dots"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">عرض الملف</a></li>
															<li><a class="dropdown-item" href="#">تعديل البيانات</a></li>
															<li><a class="dropdown-item" href="#">عرض الجدول</a></li>
															<li><hr class="dropdown-divider"></li>
															<li><a class="dropdown-item text-success" href="#">تفعيل</a></li>
														</ul>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
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
