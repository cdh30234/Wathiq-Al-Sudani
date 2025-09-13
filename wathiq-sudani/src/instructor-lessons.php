<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<?php include("partials/title-meta.php"); ?>
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
	<?php include("partials/head-css.php"); ?>
	<style>
		body { font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; }
		.navbar { direction: rtl; }
		.dropdown-menu { left: auto !important; right: 0 !important; text-align: right !important; }
		.container { direction: rtl !important; }
		.card-body, .card-header { direction: rtl !important; text-align: right !important; }
		.table { direction: rtl !important; }
		.table th, .table td { text-align: right !important; }
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
								<h1 class="my-1 fs-4">رفع الدروس</h1>
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-3"><span class="h6">45</span><span class="text-body fw-light">درس مرفوع</span></li>
									<li class="list-inline-item me-3"><span class="h6">3</span><span class="text-body fw-light">مواد</span></li>
								</ul>
							</div>
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-primary mb-0">رفع درس جديد</a>
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
								<a class="list-group-item active" href="instructor-lessons.php"><i class="bi bi-journals fa-fw me-2"></i>رفع الدروس</a>
								<a class="list-group-item" href="instructor-grades.php"><i class="bi bi-award fa-fw me-2"></i>إدخال الدرجات</a>
								<a class="list-group-item" href="instructor-announcements.php"><i class="bi bi-megaphone fa-fw me-2"></i>الإعلانات</a>
							</div>
						</div>
					</div>

					<div class="col-xl-9">
						<div class="card bg-transparent border rounded-3 mb-4">
							<div class="card-header bg-transparent border-bottom">
								<h3 class="mb-0">رفع درس جديد</h3>
							</div>
							<div class="card-body">
								<form>
									<div class="row g-3">
										<div class="col-md-6">
											<label class="form-label">عنوان الدرس</label>
											<input type="text" class="form-control" placeholder="أدخل عنوان الدرس">
										</div>
										<div class="col-md-6">
											<label class="form-label">المادة</label>
											<select class="form-select">
												<option>اختر المادة</option>
												<option>الرياضيات</option>
												<option>الفيزياء</option>
												<option>الكيمياء</option>
											</select>
										</div>
										<div class="col-md-6">
											<label class="form-label">الصف</label>
											<select class="form-select">
												<option>اختر الصف</option>
												<option>العاشر أ</option>
												<option>العاشر ب</option>
												<option>الحادي عشر أ</option>
											</select>
										</div>
										<div class="col-md-6">
											<label class="form-label">نوع الملف</label>
											<select class="form-select">
												<option>PDF</option>
												<option>PowerPoint</option>
												<option>Word</option>
												<option>فيديو</option>
											</select>
										</div>
										<div class="col-12">
											<label class="form-label">وصف الدرس</label>
											<textarea class="form-control" rows="3" placeholder="وصف مختصر للدرس"></textarea>
										</div>
										<div class="col-12">
											<label class="form-label">رفع الملف</label>
											<input type="file" class="form-control" accept=".pdf,.ppt,.pptx,.doc,.docx,.mp4">
										</div>
										<div class="col-12">
											<button type="submit" class="btn btn-primary">رفع الدرس</button>
											<button type="button" class="btn btn-outline-secondary ms-2">إلغاء</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<div class="card bg-transparent border rounded-3">
							<div class="card-header bg-transparent border-bottom">
								<h3 class="mb-0">الدروس المرفوعة</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>عنوان الدرس</th>
												<th>المادة</th>
												<th>الصف</th>
												<th>تاريخ الرفع</th>
												<th>الحالة</th>
												<th>الإجراء</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>الدوال الخطية</td>
												<td>الرياضيات</td>
												<td>العاشر أ</td>
												<td>10 سبتمبر 2025</td>
												<td><span class="badge bg-success">نشط</span></td>
												<td>
													<button class="btn btn-sm btn-outline-primary">تعديل</button>
													<button class="btn btn-sm btn-outline-danger">حذف</button>
												</td>
											</tr>
											<tr>
												<td>قوانين نيوتن</td>
												<td>الفيزياء</td>
												<td>العاشر ب</td>
												<td>09 سبتمبر 2025</td>
												<td><span class="badge bg-success">نشط</span></td>
												<td>
													<button class="btn btn-sm btn-outline-primary">تعديل</button>
													<button class="btn btn-sm btn-outline-danger">حذف</button>
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
			<div class="text-center text-white">
				Copyrights ©2024 SMS System
			</div>
		</div>
	</footer>

	<?php include("partials/footer-scripts.php"); ?>
</body>
</html>
