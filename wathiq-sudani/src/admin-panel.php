<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
	<?php include("partials/title-meta.php"); ?>

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/apexcharts/apexcharts.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/overlayscrollbars/styles/overlayscrollbars.min.css">

	<?php include("partials/head-css.php"); ?>
</head>

<body>

	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<!-- Sidebar START -->
		<nav class="navbar sidebar navbar-expand-xl navbar-dark bg-dark">

			<!-- Navbar brand for xl START -->
			<div class="d-flex align-items-center">
				<a class="navbar-brand" href="index.php">
					<img class="navbar-brand-item" src="assets/images/logo-light.svg" alt="">
				</a>
			</div>
			<!-- Navbar brand for xl END -->
			
			<div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar">
				<div class="offcanvas-body sidebar-content d-flex flex-column bg-dark">

					<!-- Sidebar menu START -->
					<ul class="navbar-nav flex-column" id="navbar-sidebar">
						
						<!-- Menu item 1 -->
						<li class="nav-item">
							<a href="#" class="nav-link admin-nav-item active" data-page="dashboard">
								<i class="bi bi-speedometer2 fa-fw me-2"></i>لوحة التحكم
							</a>
						</li>
						
						<!-- Menu item 2 -->
						<li class="nav-item">
							<a href="#" class="nav-link admin-nav-item" data-page="students">
								<i class="fas fa-user-graduate fa-fw me-2"></i>إدارة الطلاب
							</a>
						</li>

						<!-- Menu item 3 -->
						<li class="nav-item">
							<a href="#" class="nav-link admin-nav-item" data-page="attendance">
								<i class="bi bi-check2-circle fa-fw me-2"></i>تسجيل الحضور
							</a>
						</li>

						<!-- Menu item 4 -->
						<li class="nav-item">
							<a href="#" class="nav-link admin-nav-item" data-page="lessons">
								<i class="bi bi-upload fa-fw me-2"></i>رفع الدروس
							</a>
						</li>

						<!-- Menu item 5 -->
						<li class="nav-item">
							<a href="#" class="nav-link admin-nav-item" data-page="grades">
								<i class="bi bi-clipboard-data fa-fw me-2"></i>إدخال الدرجات
							</a>
						</li>

						<!-- Menu item 6 -->
						<li class="nav-item">
							<a href="#" class="nav-link admin-nav-item" data-page="announcements">
								<i class="bi bi-megaphone fa-fw me-2"></i>الإعلانات
							</a>
						</li>

						<!-- Menu item 7 -->
						<li class="nav-item">
							<a href="#" class="nav-link admin-nav-item" data-page="reports">
								<i class="bi bi-graph-up fa-fw me-2"></i>التقارير
							</a>
						</li>

						<!-- Menu item 8 -->
						<li class="nav-item">
							<a href="#" class="nav-link admin-nav-item" data-page="profile">
								<i class="bi bi-person-circle fa-fw me-2"></i>الملف الشخصي
							</a>
						</li>

						<!-- Menu item 9 -->
						<li class="nav-item">
							<a href="#" class="nav-link admin-nav-item" data-page="settings">
								<i class="bi bi-gear fa-fw me-2"></i>الإعدادات
							</a>
						</li>

					</ul>
				
					<!-- Sidebar footer START -->
					<div class="px-3 mt-auto pt-3">
						<div class="d-flex align-items-center justify-content-between text-primary-hover">
								<a class="h5 mb-0 text-body" href="admin-setting.php" data-bs-toggle="tooltip" data-bs-placement="top" title="الإعدادات">
									<i class="bi bi-gear-fill"></i>
								</a>
								<a class="h5 mb-0 text-body" href="index.php" data-bs-toggle="tooltip" data-bs-placement="top" title="الصفحة الرئيسية">
									<i class="bi bi-globe"></i>
								</a>
								<a class="h5 mb-0 text-body" href="sign-in.php" data-bs-toggle="tooltip" data-bs-placement="top" title="تسجيل الخروج">
									<i class="bi bi-power"></i>
								</a>
						</div>
					</div>
					<!-- Sidebar footer END -->
					
				</div>
			</div>
		</nav>
		<!-- Sidebar END -->

		<!-- Page content START -->
		<div class="page-content">

			<?php include("partials/topbar.php"); ?>

			<!-- Page main content START -->
			<div class="page-content-wrapper border">

				<!-- Content Container -->
				<div id="admin-content-container">
					<!-- Content will be loaded here dynamically -->
				</div>

			</div>
			<!-- Page main content END -->

		</div>
		<!-- Page content END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

	<!-- Bootstrap JS -->
	<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="assets/vendor/purecounterjs/purecounter_vanilla.js"></script>
	<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
	<script src="assets/vendor/overlayscrollbars/js/overlayscrollbars.min.js"></script>

	<!-- Template Functions -->
	<script src="assets/js/functions.js"></script>

	<!-- Admin Panel JavaScript -->
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			// Load default page (dashboard)
			loadContent('dashboard');

			// Add click event listeners to navigation items
			document.querySelectorAll('.admin-nav-item').forEach(item => {
				item.addEventListener('click', function(e) {
					e.preventDefault();
					
					// Remove active class from all items
					document.querySelectorAll('.admin-nav-item').forEach(nav => nav.classList.remove('active'));
					
					// Add active class to clicked item
					this.classList.add('active');
					
					// Get page name and load content
					const page = this.getAttribute('data-page');
					loadContent(page);
				});
			});
		});

		function loadContent(page) {
			const container = document.getElementById('admin-content-container');
			const baseUrl = 'admin-pages/';
			
			// Show loading spinner
			container.innerHTML = `
				<div class="d-flex justify-content-center align-items-center" style="height: 400px;">
					<div class="spinner-border text-primary" role="status">
						<span class="visually-hidden">جاري التحميل...</span>
					</div>
				</div>
			`;

			// Load content via AJAX
			fetch(baseUrl + page + '.php')
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					return response.text();
				})
				.then(html => {
					container.innerHTML = html;
				})
				.catch(error => {
					console.error('Error loading content:', error);
					container.innerHTML = `
						<div class="alert alert-danger text-center">
							<h4>خطأ في تحميل المحتوى</h4>
							<p>عذراً، حدث خطأ أثناء تحميل المحتوى. يرجى المحاولة مرة أخرى.</p>
						</div>
					`;
				});
		}
	</script>

</body>
</html>
