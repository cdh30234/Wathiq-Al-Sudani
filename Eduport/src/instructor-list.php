<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("partials/title-meta.php"); ?>

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices.js/public/assets/styles/choices.min.css">

	<?php include("partials/head-css.php"); ?>
</head>

<body>

	<?php include("partials/navbar.php"); ?>

	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<!-- =======================
Page Banner START -->
		<section class="py-0">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bg-dark p-4 text-center rounded-3">
							<h1 class="text-white m-0">Instructors list</h1>
							<!-- Breadcrumb -->
							<div class="d-flex justify-content-center">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
										<li class="breadcrumb-item"><a href="#">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">instructor list</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
Page Banner END -->

		<!-- =======================
Inner part START -->
		<section class="pt-4">
			<div class="container">
				<!-- Search option START -->
				<div class="row mb-4 align-items-center">
					<!-- Search bar -->
					<div class="col-sm-6 col-xl-4">
						<form class="border rounded p-2">
							<div class="input-group input-borderless">
								<input class="form-control me-1" type="search" placeholder="Search instructor">
								<button type="button" class="btn btn-primary mb-0 rounded"><i class="fas fa-search"></i></button>
							</div>
						</form>
					</div>

					<!-- Select option -->
					<div class="col-sm-6 col-xl-3 mt-3 mt-lg-0">
						<form class="border rounded p-2 input-borderless">
							<select class="form-select form-select-sm js-choice" aria-label=".form-select-sm">
								<option value="">Category</option>
								<option>All</option>
								<option>Development</option>
								<option>Design</option>
								<option>Accounting</option>
								<option>Translation</option>
								<option>Finance</option>
								<option>Legal</option>
								<option>Photography</option>
								<option>Writing</option>
								<option>Marketing</option>
							</select>
						</form>
					</div>

					<!-- Select option -->
					<div class="col-sm-6 col-xl-3 mt-3 mt-xl-0">
						<form class="border rounded p-2 input-borderless">
							<select class="form-select form-select-sm js-choice" aria-label=".form-select-sm">
								<option value="">Sort by</option>
								<option>Most popular</option>
								<option>Most viewed</option>
								<option>Top rated</option>
							</select>
						</form>
					</div>

					<!-- Button -->
					<div class="col-sm-6 col-xl-2 mt-3 mt-xl-0 d-grid">
						<a href="#" class="btn btn-lg btn-primary mb-0">Filter Results</a>
					</div>
				</div>
				<!-- Search option END -->

				<!-- Instructor list START -->
				<div class="row g-4 justify-content-center">

					<!-- Card item START -->
					<div class="col-lg-10 col-xl-6">
						<div class="card shadow p-2">
							<div class="row g-0">
								<!-- Image -->
								<div class="col-md-4">
									<img src="assets/images/instructor/01.jpg" class="rounded-3" alt="...">
								</div>

								<!-- Card body -->
								<div class="col-md-8">
									<div class="card-body">
										<!-- Title -->
										<div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
											<div>
												<h5 class="card-title mb-0"><a href="#">Dennis Barrett</a></h5>
												<p class="small mb-2 mb-sm-0">Professor at Sigma College</p>
											</div>
											<span class="h6 fw-light">4.3<i class="fas fa-star text-warning ms-1"></i></span>
										</div>
										<!-- Content -->
										<p class="text-truncate-2 mb-3">Perceived end knowledge certainly day sweetness why cordially. Ask a quick six seven offer see among.</p>
										<!-- Info -->
										<div class="d-sm-flex justify-content-sm-between align-items-center">
											<!-- Title -->
											<h6 class="text-orange mb-0">Digital Marketing</h6>

											<!-- Social button -->
											<ul class="list-inline mb-0 mt-3 mt-sm-0">
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-instagram-gradient" href="#"><i class="fab fa-fw fa-instagram"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Card item END -->

					<!-- Card item START -->
					<div class="col-lg-10 col-xl-6">
						<div class="card shadow p-2">
							<div class="row g-0">
								<!-- Image -->
								<div class="col-md-4">
									<img src="assets/images/instructor/02.jpg" class="rounded-3" alt="...">
								</div>

								<!-- Card body -->
								<div class="col-md-8">
									<div class="card-body">
										<!-- Title -->
										<div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
											<div>
												<h5 class="card-title mb-0"><a href="#">Jacqueline Miller</a></h5>
												<p class="small mb-2 mb-sm-0">Professor at Eastbay College</p>
											</div>
											<span class="h6 fw-light">4.0<i class="fas fa-star text-warning ms-1"></i></span>
										</div>
										<!-- Content -->
										<p class="text-truncate-2 mb-3">Passage its ten led hearted removal cordial. Preference any astonished unreserved Mrs.</p>
										<!-- Info -->
										<div class="d-sm-flex justify-content-sm-between align-items-center">
											<!-- Title -->
											<h6 class="text-orange mb-0">Graphic Designer</h6>

											<!-- Social button -->
											<ul class="list-inline mb-0 mt-3 mt-sm-0">
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-instagram-gradient" href="#"><i class="fab fa-fw fa-instagram"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Card item END -->

					<!-- Card item START -->
					<div class="col-lg-10 col-xl-6">
						<div class="card shadow p-2">
							<div class="row g-0">
								<!-- Image -->
								<div class="col-md-4">
									<img src="assets/images/instructor/03.jpg" class="rounded-3" alt="...">
								</div>

								<!-- Card body -->
								<div class="col-md-8">
									<div class="card-body">
										<!-- Title -->
										<div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
											<div>
												<h5 class="card-title mb-0"><a href="#">Louis Ferguson</a></h5>
												<p class="small mb-2 mb-sm-0">Professor at Cambridge College</p>
											</div>
											<span class="h6 fw-light">3.8<i class="fas fa-star text-warning ms-1"></i></span>
										</div>
										<!-- Content -->
										<p class="text-truncate-2 mb-3">Passage its ten led hearted removal cordial. Preference any astonished unreserved Mrs.</p>
										<!-- Info -->
										<div class="d-sm-flex justify-content-sm-between align-items-center">
											<!-- Title -->
											<h6 class="text-orange mb-0">Engineering Physics</h6>

											<!-- Social button -->
											<ul class="list-inline mb-0 mt-3 mt-sm-0">
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-instagram-gradient" href="#"><i class="fab fa-fw fa-instagram"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Card item END -->

					<!-- Card item START -->
					<div class="col-lg-10 col-xl-6">
						<div class="card shadow p-2">
							<div class="row g-0">
								<!-- Image -->
								<div class="col-md-4">
									<img src="assets/images/instructor/04.jpg" class="rounded-3" alt="...">
								</div>

								<!-- Card body -->
								<div class="col-md-8">
									<div class="card-body">
										<!-- Title -->
										<div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
											<div>
												<h5 class="card-title mb-0"><a href="#">Frances Guerrero</a></h5>
												<p class="small mb-2 mb-sm-0">Professor at LPU College</p>
											</div>
											<span class="h6 fw-light">4.5<i class="fas fa-star text-warning ms-1"></i></span>
										</div>
										<!-- Content -->
										<p class="text-truncate-2 mb-3">As it so contrasted oh estimating instrument. Size like body some one had. Are conduct viewing boy minutes warrant the expense</p>
										<!-- Info -->
										<div class="d-sm-flex justify-content-sm-between align-items-center">
											<!-- Title -->
											<h6 class="text-orange mb-0">Graphic Designer</h6>

											<!-- Social button -->
											<ul class="list-inline mb-0 mt-3 mt-sm-0">
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-instagram-gradient" href="#"><i class="fab fa-fw fa-instagram"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Card item END -->

					<!-- Card item START -->
					<div class="col-lg-10 col-xl-6">
						<div class="card shadow p-2">
							<div class="row g-0">
								<!-- Image -->
								<div class="col-md-4">
									<img src="assets/images/instructor/06.jpg" class="rounded-3" alt="...">
								</div>

								<!-- Card body -->
								<div class="col-md-8">
									<div class="card-body">
										<!-- Title -->
										<div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
											<div>
												<h5 class="card-title mb-0"><a href="#">Amanda Reed</a></h5>
												<p class="small mb-2 mb-sm-0">Professor at NIT College</p>
											</div>
											<span class="h6 fw-light">4.8<i class="fas fa-star text-warning ms-1"></i></span>
										</div>
										<!-- Content -->
										<p class="text-truncate-2 mb-3">Contrasted oh estimating instrument. Size like body some one had. Are conduct viewing boy minutes warrant the expense</p>
										<!-- Info -->
										<div class="d-sm-flex justify-content-sm-between align-items-center">
											<!-- Title -->
											<h6 class="text-orange mb-0">Web Designer</h6>

											<!-- Social button -->
											<ul class="list-inline mb-0 mt-3 mt-sm-0">
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-instagram-gradient" href="#"><i class="fab fa-fw fa-instagram"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a>
												</li>
											</ul>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Card item END -->

					<!-- Card item START -->
					<div class="col-lg-10 col-xl-6">
						<div class="card shadow p-2">
							<div class="row g-0">
								<!-- Image -->
								<div class="col-md-4">
									<img src="assets/images/instructor/07.jpg" class="rounded-3" alt="...">
								</div>

								<!-- Card body -->
								<div class="col-md-8">
									<div class="card-body">
										<!-- Title -->
										<div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
											<div>
												<h5 class="card-title mb-0"><a href="#">Lori Stevens</a></h5>
												<p class="small mb-2 mb-sm-0">Professor at Oxford University</p>
											</div>
											<span class="h6 fw-light">4.2<i class="fas fa-star text-warning ms-1"></i></span>
										</div>
										<!-- Content -->
										<p class="text-truncate-2 mb-3">Yet no jokes worse her why. Bed one supposing breakfast day fulfilled off depending questions. Whatever boy her exertion his extended. Ecstatic followed handsome drawings</p>
										<!-- Info -->
										<div class="d-sm-flex justify-content-sm-between align-items-center">
											<!-- Title -->
											<h6 class="text-orange mb-0">Medical Science</h6>

											<!-- Social button -->
											<ul class="list-inline mb-0 mt-3 mt-sm-0">
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-instagram-gradient" href="#"><i class="fab fa-fw fa-instagram"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Card item END -->

					<!-- Card item START -->
					<div class="col-lg-10 col-xl-6">
						<div class="card shadow p-2">
							<div class="row g-0">
								<!-- Image -->
								<div class="col-md-4">
									<img src="assets/images/instructor/08.jpg" class="rounded-3" alt="...">
								</div>

								<!-- Card body -->
								<div class="col-md-8">
									<div class="card-body">
										<!-- Title -->
										<div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
											<div>
												<h5 class="card-title mb-0"><a href="#">Samuel Bishop</a></h5>
												<p class="small mb-2 mb-sm-0">Professor at VNSGU College</p>
											</div>
											<span class="h6 fw-light">4.5<i class="fas fa-star text-warning ms-1"></i></span>
										</div>
										<!-- Content -->
										<p class="text-truncate-2 mb-3">As it so contrasted oh estimating instrument. Size like body some one had. Are conduct viewing boy minutes warrant the expense</p>
										<!-- Info -->
										<div class="d-sm-flex justify-content-sm-between align-items-center">
											<!-- Title -->
											<h6 class="text-orange mb-0">Digital Marketing</h6>

											<!-- Social button -->
											<ul class="list-inline mb-0 mt-3 mt-sm-0">
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-instagram-gradient" href="#"><i class="fab fa-fw fa-instagram"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Card item END -->

					<!-- Card item START -->
					<div class="col-lg-10 col-xl-6">
						<div class="card shadow p-2">
							<div class="row g-0">
								<!-- Image -->
								<div class="col-md-4">
									<img src="assets/images/instructor/09.jpg" class="rounded-3" alt="...">
								</div>

								<!-- Card body -->
								<div class="col-md-8">
									<div class="card-body">
										<!-- Title -->
										<div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
											<div>
												<h5 class="card-title mb-0"><a href="#">Joan Wallace</a></h5>
												<p class="small mb-2 mb-sm-0">Professor at LPU College</p>
											</div>
											<span class="h6 fw-light">4.6<i class="fas fa-star text-warning ms-1"></i></span>
										</div>
										<!-- Content -->
										<p class="text-truncate-2 mb-3">Tt so contrasted oh estimating instrument. Size like body some one had. Are conduct viewing boy minutes warrant the expense</p>
										<!-- Info -->
										<div class="d-sm-flex justify-content-sm-between align-items-center">
											<!-- Title -->
											<h6 class="text-orange mb-0">Graphic Designer</h6>

											<!-- Social button -->
											<ul class="list-inline mb-0 mt-3 mt-sm-0">
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-instagram-gradient" href="#"><i class="fab fa-fw fa-instagram"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a>
												</li>
												<li class="list-inline-item">
													<a class="mb-0 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Card item END -->

				</div>
				<!-- Instructor list END -->

				<!-- Pagination START -->
				<nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
					<ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
						<li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a></li>
						<li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
						<li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
						<li class="page-item mb-0"><a class="page-link" href="#">..</a></li>
						<li class="page-item mb-0"><a class="page-link" href="#">6</a></li>
						<li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
					</ul>
				</nav>
				<!-- Pagination END -->

			</div>
		</section>
		<!-- =======================
Inner part END -->

		<!-- =======================
Action box START -->
		<section class="pt-0">
			<div class="container position-relative">
				<!-- SVG -->
				<figure class="position-absolute top-50 start-50 translate-middle ms-2">
					<svg>
						<path d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z" fill="#fff" fill-rule="evenodd" opacity=".502" />
						<path d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z" fill="#fff" fill-rule="evenodd" opacity=".102" />
						<path d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z" fill="#fff" fill-rule="evenodd" opacity=".2" />
						<path d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z" fill="#fff" fill-rule="evenodd" opacity=".2" />
					</svg>
				</figure>

				<div class="bg-success p-4 p-sm-5 rounded-3">
					<div class="row justify-content-center position-relative">
						<!-- Svg -->
						<figure class="fill-white opacity-1 position-absolute top-50 start-0 translate-middle-y">
							<svg width="141px" height="141px">
								<path d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z" />
							</svg>
						</figure>
						<!-- Action box -->
						<div class="col-11 position-relative">
							<div class="row align-items-center">
								<!-- Title -->
								<div class="col-lg-7">
									<h3 class="text-white">Become an Instructor!</h3>
									<p class="text-white mb-3 mb-lg-0">Speedily say has suitable disposal add boy. On forth doubt miles of child. Exercise joy man children rejoiced. Yet uncommonly his ten who diminution astonished.</p>
								</div>
								<!-- Button -->
								<div class="col-lg-5 text-lg-end">
									<a href="#" class="btn btn-dark mb-0">Start Teaching today</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
Action box END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
Footer START -->
	<footer class="pt-5 bg-light">
		<div class="container">
			<!-- Row START -->
			<div class="row g-4">

				<!-- Widget 1 START -->
				<div class="col-lg-3">
					<!-- logo -->
					<a class="me-0" href="index.php">
						<img class="light-mode-item h-40px" src="assets/images/logo.svg" alt="logo">
						<img class="dark-mode-item h-40px" src="assets/images/logo-light.svg" alt="logo">
					</a>
					<p class="my-3">Eduport education theme, built specifically for the education centers which is dedicated to teaching and involve learners. </p>
					<!-- Social media icon -->
					<ul class="list-inline mb-0 mt-3">
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-instagram" href="#"><i class="fab fa-fw fa-instagram"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a> </li>
					</ul>
				</div>
				<!-- Widget 1 END -->

				<!-- Widget 2 START -->
				<div class="col-lg-6">
					<div class="row g-4">
						<!-- Link block -->
						<div class="col-6 col-md-4">
							<h5 class="mb-2 mb-md-4">Company</h5>
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link" href="#">About us</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Contact us</a></li>
								<li class="nav-item"><a class="nav-link" href="#">News and Blogs</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Library</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Career</a></li>
							</ul>
						</div>

						<!-- Link block -->
						<div class="col-6 col-md-4">
							<h5 class="mb-2 mb-md-4">Community</h5>
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link" href="#">Documentation</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Faq</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Forum</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Sitemap</a></li>
							</ul>
						</div>

						<!-- Link block -->
						<div class="col-6 col-md-4">
							<h5 class="mb-2 mb-md-4">Teaching</h5>
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link" href="#">Become a teacher</a></li>
								<li class="nav-item"><a class="nav-link" href="#">How to guide</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Terms &amp; Conditions</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Widget 2 END -->

				<!-- Widget 3 START -->
				<div class="col-lg-3">
					<h5 class="mb-2 mb-md-4">Contact</h5>
					<!-- Time -->
					<p class="mb-2">
						Toll free:<span class="h6 fw-light ms-2">+1234 568 963</span>
						<span class="d-block small">(9:AM to 8:PM IST)</span>
					</p>

					<p class="mb-0">Email:<span class="h6 fw-light ms-2">example@gmail.com</span></p>

					<div class="row g-2 mt-2">
						<!-- Google play store button -->
						<div class="col-6 col-sm-4 col-md-3 col-lg-6">
							<a href="#"> <img src="assets/images/client/google-play.svg" alt=""> </a>
						</div>
						<!-- App store button -->
						<div class="col-6 col-sm-4 col-md-3 col-lg-6">
							<a href="#"> <img src="assets/images/client/app-store.svg" alt="app-store"> </a>
						</div>
					</div> <!-- Row END -->
				</div>
				<!-- Widget 3 END -->
			</div><!-- Row END -->

			<!-- Divider -->
			<hr class="mt-4 mb-0">

			<!-- Bottom footer -->
			<div class="py-3">
				<div class="container px-0">
					<div class="d-lg-flex justify-content-between align-items-center py-3 text-center text-md-left">
						<!-- copyright text -->
						<div class="text-body text-primary-hover"> Copyrights ©2024 Eduport. Build by <a href="https://1.envato.market/stackbros-portfolio" target="_blank" class="text-body">StackBros</a></div>
						<!-- copyright links-->
						<div class="justify-content-center mt-3 mt-lg-0">
							<ul class="nav list-inline justify-content-center mb-0">
								<li class="list-inline-item">
									<!-- Language selector -->
									<div class="dropup mt-0 text-center text-sm-end">
										<a class="dropdown-toggle nav-link" href="#" role="button" id="languageSwitcher" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fas fa-globe me-2"></i>Language
										</a>
										<ul class="dropdown-menu min-w-auto" aria-labelledby="languageSwitcher">
											<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="assets/images/flags/uk.svg" alt="">English</a></li>
											<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="assets/images/flags/gr.svg" alt="">German </a></li>
											<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="assets/images/flags/sp.svg" alt="">French</a></li>
										</ul>
									</div>
								</li>
								<li class="list-inline-item"><a class="nav-link" href="#">Terms of use</a></li>
								<li class="list-inline-item"><a class="nav-link pe-0" href="#">Privacy policy</a></li>
							</ul>
						</div>
					</div>
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

	<?php include("partials/footer-scripts.php"); ?>

</body>

</html>