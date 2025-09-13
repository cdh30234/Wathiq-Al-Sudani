<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("partials/title-meta.php"); ?>

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices.js/public/assets/styles/choices.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/overlayscrollbars/styles/overlayscrollbars.min.css">

	<?php include("partials/head-css.php"); ?>
</head>

<body>

	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<?php include("partials/sidebar.php"); ?>

		<!-- Page content START -->
		<div class="page-content">

			<?php include("partials/topbar.php"); ?>

			<!-- Page main content START -->
			<div class="page-content-wrapper border">
				<!-- Main card START -->
				<div class="row">
					<div class="col-12 text-center">
						<!-- Image -->
						<img src="assets/images/element/error404-01.svg" class="h-200px h-md-400px mb-4" alt="">
						<!-- Title -->
						<h1 class="display-1 text-danger mb-0">404</h1>
						<!-- Subtitle -->
						<h2>Oh no, something went wrong!</h2>
						<!-- info -->
						<p class="mb-4">Either something went wrong or this page doesn't exist anymore.</p>
						<!-- Button -->
						<a href="admin-dashboard.php" class="btn btn-primary mb-0">Go to Dashboard</a>
					</div>
				</div>
				<!-- Main card END -->
			</div>
			<!-- Page main content END -->

		</div>
		<!-- Page content END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- Modal START -->
	<div class="modal fade" id="appDetail" tabindex="-1" aria-labelledby="appDetaillabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">

				<!-- Modal header -->
				<div class="modal-header bg-dark">
					<h5 class="modal-title text-white" id="appDetaillabel">Applicant details</h5>
					<button type="button" class="btn btn-sm btn-light mb-0 ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
				</div>

				<!-- Modal body -->
				<div class="modal-body p-5">
					<!-- Name -->
					<span class="small">Applicant Name:</span>
					<h6 class="mb-3">Jacqueline Miller</h6>

					<!-- Email -->
					<span class="small">Applicant Email id:</span>
					<h6 class="mb-3">example@gmail.com</h6>

					<!-- Phone number -->
					<span class="small">Applicant Phone number:</span>
					<h6 class="mb-3">+123 456 789 10</h6>

					<!-- Summary -->
					<span class="small">Summary:</span>
					<p class="text-dark mb-2">We focus a great deal on the understanding of behavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn’t going to get the job done so that’s why this course is packed with practical hands-on examples that you can follow step by step.</p>
					<p class="text-dark mb-0">As it so contrasted oh estimating instrument. Size like body someone had. Are conduct viewing boy minutes warrant the expense? Tolerably behavior may admit daughters offending her ask own. Praise effect wishes change way and any wanted. Lively use looked latter regard had. Do he it part more last in.</p>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal END -->

	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

	<!-- Vendors -->
	<script src="assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
	<script src="assets/vendor/overlayscrollbars/browser/overlayscrollbars.browser.es6.min.js"></script>

	<?php include("partials/footer-scripts.php"); ?>

</body>

</html>