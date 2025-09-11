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
		<section class="bg-dark align-items-center d-flex" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
			<!-- Main banner background image -->
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Title -->
						<h1 class="text-white">Course List Classic</h1>
						<!-- Breadcrumb -->
						<div class="d-flex">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Courses</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
Page Banner END -->

		<!-- =======================
Page content START -->
		<section class="pb-0 py-sm-5">
			<div class="container">
				<!-- Title and select START -->
				<div class="row g-3 align-items-center mb-4">
					<!-- Content -->
					<div class="col-md-4">
						<h4 class="mb-0">Showing 1-7 of 32 result</h4>
					</div>

					<!-- Select option -->
					<div class="col-md-8">
						<div class="row g-3 align-items-center justify-content-md-end me-auto">

							<!-- List and Grid icon -->
							<div class="col-sm-4 col-xl-6 text-md-end d-none d-md-block">
								<ul class="list-inline mb-0">
									<!-- Grid icon -->
									<li class="list-inline-item"><a href="course-grid.php" class="btn btn-outline-light mb-0 me-2"><i class="fas fa-fw fa-th-large"></i></a></li>
									<!-- list icon -->
									<li class="list-inline-item"><a href="course-list.php" class="btn btn-outline-light mb-0 me-2"><i class="fas fa-fw fa-list-ul"></i></a></li>
								</ul>
							</div>

							<!-- Short by filter -->
							<form class="col-md-4 border rounded p-1 input-borderless">
								<select class="form-select js-choice z-index-9" aria-label=".form-select-sm">
									<option value="">Sort by</option>
									<option>Free</option>
									<option>Newest</option>
									<option>Most popular</option>
									<option>Most Viewed</option>
								</select>
							</form>

							<!-- Advanced filter responsive toggler START -->
							<div class="col-4 text-md-end">
								<button class="btn btn-primary mb-0 d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
									<i class="fas fa-sliders-h me-1"></i> Show filter
								</button>
							</div>
							<!-- Advanced filter responsive toggler END -->

						</div>
					</div>
				</div>
				<!-- Title and select END -->

				<div class="row">
					<!-- Main content START -->
					<div class="col-xl-9 col-xxl-8">

						<!-- Course list START -->
						<div class="row g-4">
							<!-- Card list START -->
							<div class="col-12">
								<div class="card shadow overflow-hidden p-2">
									<div class="row g-0">
										<div class="col-md-5 overflow-hidden">
											<img src="assets/images/courses/4by3/06.jpg" class="rounded-2" alt="Card image">
											<!-- Ribbon -->
											<div class="card-img-overlay">
												<div class="ribbon"><span>Free</span></div>
											</div>
										</div>
										<div class="col-md-7">
											<div class="card-body">
												<!-- Badge and rating -->
												<div class="d-flex justify-content-between align-items-center mb-2">
													<!-- Badge -->
													<a href="#" class="badge text-bg-primary mb-2 mb-sm-0">Development</a>
													<!-- Rating and wishlist -->
													<div>
														<span class="h6 fw-light me-3"><i class="fas fa-star text-warning me-1"></i>4.5</span>
														<a href="#" class="text-danger"><i class="fas fa-heart"></i></a>
													</div>
												</div>

												<!-- Title -->
												<h5 class="card-title"><a href="#">Angular – The Complete Guider</a></h5>
												<p class="text-truncate-2 d-none d-lg-block">Satisfied conveying a dependent contented he gentleman agreeable do be. dependent contented he</p>

												<!-- Info -->
												<ul class="list-inline">
													<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>21h 56m</li>
													<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>52 lectures</li>
													<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Intermediate</li>
												</ul>

												<!-- Price and avatar -->
												<div class="d-sm-flex justify-content-sm-between align-items-center">
													<!-- Avatar -->
													<div class="d-flex align-items-center">
														<div class="avatar">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
														</div>
														<p class="mb-0 ms-2"><a href="#" class="h6 fw-light">Jacqueline Miller</a></p>
													</div>
													<!-- Price -->
													<div class="mt-3 mt-sm-0">
														<a href="#" class="btn btn-dark">View more</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Card list END -->

							<!-- Card list START -->
							<div class="col-12">
								<div class="card shadow p-2">
									<div class="row g-0">
										<div class="col-md-5">
											<img src="assets/images/courses/4by3/01.jpg" class="rounded-2" alt="Card image">
										</div>
										<div class="col-md-7">
											<div class="card-body">
												<!-- Badge and rating -->
												<div class="d-flex justify-content-between align-items-center mb-2">
													<!-- Badge -->
													<a href="#" class="badge text-bg-primary mb-2 mb-sm-0">Marketing</a>
													<!-- Rating and wishlist -->
													<div>
														<span class="h6 fw-light me-3"><i class="fas fa-star text-warning me-1"></i>4.5</span>
														<a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
													</div>
												</div>

												<!-- Title -->
												<h5 class="card-title"><a href="#">The Complete Digital Marketing Course - 12 Courses in 1</a></h5>
												<p class="text-truncate">Explained propriety off out perpetual his you. Dependent contented he explained propriety off out perpetual his you. </p>

												<!-- Info -->
												<ul class="list-inline">
													<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>6h 56m</li>
													<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>82 lectures</li>
													<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Beginner</li>
												</ul>

												<!-- Price and avatar -->
												<div class="d-sm-flex justify-content-sm-between align-items-center">
													<!-- Avatar -->
													<div class="d-flex align-items-center">
														<div class="avatar">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="avatar">
														</div>
														<p class="mb-0 ms-2"><a href="#" class="h6 fw-light">Larry Lawson</a></p>
													</div>
													<!-- Price -->
													<div class="mt-3 mt-sm-0">
														<a href="#" class="btn btn-dark">View more</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Card list END -->

							<!-- Card list START -->
							<div class="col-12">
								<div class="card shadow p-2">
									<div class="row g-0">
										<div class="col-md-5">
											<img src="assets/images/courses/4by3/11.jpg" class="rounded-2" alt="Card image">
										</div>
										<div class="col-md-7">
											<div class="card-body">
												<!-- Badge and rating -->
												<div class="d-flex justify-content-between align-items-center mb-2">
													<!-- Badge -->
													<a href="#" class="badge text-bg-primary mb-2 mb-sm-0">Development</a>
													<!-- Rating and wishlist -->
													<div>
														<span class="h6 fw-light me-3"><i class="fas fa-star text-warning me-1"></i>4.8</span>
														<a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
													</div>
												</div>

												<!-- Title -->
												<h5 class="card-title"><a href="#">The Ultimate Copywriting Course - Write Copy That Sells</a></h5>
												<p class="text-truncate">Insipidity the sufficient discretion imprudence resolution sir him decisively. Proceed how any engaged visitor.</p>

												<!-- Info -->
												<ul class="list-inline">
													<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>15h 30m</li>
													<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>72 lectures</li>
													<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>All level</li>
												</ul>

												<!-- Price and avatar -->
												<div class="d-sm-flex justify-content-sm-between align-items-center">
													<!-- Avatar -->
													<div class="d-flex align-items-center">
														<div class="avatar">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
														</div>
														<p class="mb-0 ms-2"><a href="#" class="h6 fw-light">Louis Crawford</a></p>
													</div>
													<!-- Price -->
													<div class="mt-3 mt-sm-0">
														<a href="#" class="btn btn-dark">View more</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Card list END -->

							<!-- Card list START -->
							<div class="col-12">
								<div class="card shadow p-2">
									<div class="row g-0">
										<div class="col-md-5">
											<img src="assets/images/courses/4by3/03.jpg" class="rounded-2" alt="Card image">
										</div>
										<div class="col-md-7">
											<div class="card-body">
												<!-- Badge and rating -->
												<div class="d-flex justify-content-between align-items-center mb-2">
													<!-- Badge -->
													<a href="#" class="badge text-bg-primary mb-2 mb-sm-0">Design</a>
													<!-- Rating and wishlist -->
													<div>
														<span class="h6 fw-light me-3"><i class="fas fa-star text-warning me-1"></i>4.0</span>
														<a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
													</div>
												</div>

												<!-- Title -->
												<h5 class="card-title"><a href="#">Create a Design System in Figma</a></h5>
												<p class="text-truncate-2">Fulfilled direction use continual set him propriety continued. Saw met applauded favorite deficient engrossed concealed and her. Concluded boy perpetual old supposing.</p>

												<!-- Info -->
												<ul class="list-inline">
													<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>7h 50m</li>
													<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>21 lectures</li>
													<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>All level</li>
												</ul>

												<!-- Price and avatar -->
												<div class="d-sm-flex justify-content-sm-between align-items-center">
													<!-- Avatar -->
													<div class="d-flex align-items-center">
														<div class="avatar">
															<img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
														</div>
														<p class="mb-0 ms-2"><a href="#" class="h6 fw-light">Frances Guerrero</a></p>
													</div>
													<!-- Price -->
													<div class="mt-3 mt-sm-0">
														<a href="#" class="btn btn-dark">View more</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Card list END -->
						</div>
						<!-- Course list END -->

						<!-- Pagination START -->
						<div class="col-12">
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
						</div>
						<!-- Pagination END -->
					</div>
					<!-- Main content END -->

					<!-- Right sidebar START -->
					<div class="col-lg-3 col-xxl-4">
						<!-- Responsive offcanvas body START -->
						<div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
							<div class="offcanvas-header bg-light">
								<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Advance Filter</h5>
								<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
							</div>
							<div class="offcanvas-body p-3 p-xl-0">
								<form>
									<!-- Category START -->
									<div class="card card-body shadow p-4 mb-4">
										<!-- Title -->
										<h4 class="mb-4">Category</h4>
										<div class="row">
											<!-- Category group -->
											<div class="col-xxl-6">
												<!-- Checkbox -->
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
													<label class="form-check-label" for="flexCheckDefault9">All</label>
												</div>
												<!-- Checkbox -->
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10">
													<label class="form-check-label" for="flexCheckDefault10">Development</label>
												</div>
												<!-- Checkbox -->
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
													<label class="form-check-label" for="flexCheckDefault11">Design</label>
												</div>
												<!-- Checkbox -->
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault12">
													<label class="form-check-label" for="flexCheckDefault12">Accounting</label>
												</div>
												<!-- Checkbox -->
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault17">
													<label class="form-check-label" for="flexCheckDefault17">Translation</label>
												</div>
											</div>

											<!-- Category group -->
											<div class="col-xxl-6">
												<!-- Checkbox -->
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault13">
													<label class="form-check-label" for="flexCheckDefault13">Finance</label>
												</div>
												<!-- Checkbox -->
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault14">
													<label class="form-check-label" for="flexCheckDefault14">Legal</label>
												</div>
												<!-- Checkbox -->
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault15">
													<label class="form-check-label" for="flexCheckDefault15">Photography</label>
												</div>
												<!-- Checkbox -->
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault16">
													<label class="form-check-label" for="flexCheckDefault16">Writing</label>
												</div>
												<!-- Checkbox -->
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault18">
													<label class="form-check-label" for="flexCheckDefault18">Marketing</label>
												</div>
											</div>
										</div><!-- Row END -->
									</div>
									<!-- Category END -->

									<!-- Price START -->
									<div class="card card-body shadow p-4 mb-4">
										<!-- Title -->
										<h4 class="mb-3">Price Level</h4>
										<ul class="list-inline mb-0">
											<!-- Price item -->
											<li class="list-inline-item">
												<input type="radio" class="btn-check" name="options" id="option1">
												<label class="btn btn-light btn-primary-soft-check" for="option1">All</label>
											</li>
											<!-- Price item -->
											<li class="list-inline-item">
												<input type="radio" class="btn-check" name="options" id="option2">
												<label class="btn btn-light btn-primary-soft-check" for="option2">Free</label>
											</li>
											<!-- Price item -->
											<li class="list-inline-item">
												<input type="radio" class="btn-check" name="options" id="option3">
												<label class="btn btn-light btn-primary-soft-check" for="option3">Paid</label>
											</li>
										</ul>
									</div>
									<!-- Price END -->

									<!-- Skill level START -->
									<div class="card card-body shadow p-4 mb-4">
										<!-- Title -->
										<h4 class="mb-3">Skill level</h4>
										<ul class="list-inline mb-0">
											<!-- Item -->
											<li class="list-inline-item mb-2">
												<input type="checkbox" class="btn-check" id="btn-check-12">
												<label class="btn btn-light btn-primary-soft-check" for="btn-check-12">All levels</label>
											</li>
											<!-- Item -->
											<li class="list-inline-item mb-2">
												<input type="checkbox" class="btn-check" id="btn-check-9">
												<label class="btn btn-light btn-primary-soft-check" for="btn-check-9">Beginner</label>
											</li>
											<!-- Item -->
											<li class="list-inline-item mb-2">
												<input type="checkbox" class="btn-check" id="btn-check-10">
												<label class="btn btn-light btn-primary-soft-check" for="btn-check-10">Intermediate</label>
											</li>
											<!-- Item -->
											<li class="list-inline-item mb-2">
												<input type="checkbox" class="btn-check" id="btn-check-11">
												<label class="btn btn-light btn-primary-soft-check" for="btn-check-11">Advanced</label>
											</li>
										</ul>
									</div>
									<!-- Skill level END -->

									<!-- Language START -->
									<div class="card card-body shadow p-4 mb-4">
										<!-- Title -->
										<h4 class="mb-3">Language</h4>
										<ul class="list-inline mb-0 g-3">
											<!-- Item -->
											<li class="list-inline-item mb-2">
												<input type="checkbox" class="btn-check" id="btn-check-2">
												<label class="btn btn-light btn-primary-soft-check" for="btn-check-2">English</label>
											</li>
											<!-- Item -->
											<li class="list-inline-item mb-2">
												<input type="checkbox" class="btn-check" id="btn-check-3">
												<label class="btn btn-light btn-primary-soft-check" for="btn-check-3">Francas</label>
											</li>
											<!-- Item -->
											<li class="list-inline-item mb-2">
												<input type="checkbox" class="btn-check" id="btn-check-4">
												<label class="btn btn-light btn-primary-soft-check" for="btn-check-4">Hindi</label>
											</li>
											<!-- Item -->
											<li class="list-inline-item mb-2">
												<input type="checkbox" class="btn-check" id="btn-check-5">
												<label class="btn btn-light btn-primary-soft-check" for="btn-check-5">Russian</label>
											</li>
											<!-- Item -->
											<li class="list-inline-item mb-2">
												<input type="checkbox" class="btn-check" id="btn-check-6">
												<label class="btn btn-light btn-primary-soft-check" for="btn-check-6">Spanish</label>
											</li>
											<!-- Item -->
											<li class="list-inline-item mb-2">
												<input type="checkbox" class="btn-check" id="btn-check-7">
												<label class="btn btn-light btn-primary-soft-check" for="btn-check-7">Bengali</label>
											</li>
											<!-- Item -->
											<li class="list-inline-item mb-2">
												<input type="checkbox" class="btn-check" id="btn-check-8">
												<label class="btn btn-light btn-primary-soft-check" for="btn-check-8">Portuguese</label>
											</li>
										</ul>
									</div>
									<!-- Language END -->
								</form><!-- Form End -->
							</div>

							<!-- Button -->
							<div class="d-grid p-2 p-xl-0 bg-body text-center">
								<button class="btn btn-primary mb-0">Filter Results</button>
							</div>
						</div>
						<!-- Responsive offcanvas body END -->
					</div>
					<!-- Right sidebar END -->

				</div><!-- Row END -->
			</div>
		</section>
		<!-- =======================
Page content END -->

		<!-- =======================
Newsletter START -->
		<section class="pt-5 pt-lg-0">
			<div class="container position-relative overflow-hidden">
				<!-- SVG decoration -->
				<figure class="position-absolute top-50 start-50 translate-middle ms-3">
					<svg>
						<path class="fill-white opacity-3" d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z" />
						<path class="fill-white opacity-3" d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z" />
						<path class="fill-white opacity-3" d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z" />
						<path class="fill-white opacity-3" d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z" />
					</svg>
				</figure>
				<!-- Svg decoration -->
				<figure class="position-absolute bottom-0 end-0 mb-5 d-none d-sm-block">
					<svg class="rotate-130" width="258.7px" height="86.9px" viewBox="0 0 258.7 86.9">
						<path stroke="white" fill="none" stroke-width="2" d="M0,7.2c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5 c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5s16-25.5,31.9-25.5" />
						<path stroke="white" fill="none" stroke-width="2" d="M0,57c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5 c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5s16-25.5,31.9-25.5" />
					</svg>
				</figure>

				<div class="bg-grad p-3 p-sm-5 rounded-3">
					<div class="row justify-content-center position-relative">
						<!-- SVG decoration -->
						<figure class="fill-white opacity-1 position-absolute top-50 start-0 translate-middle-y">
							<svg width="141px" height="141px">
								<path d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z" />
							</svg>
						</figure>
						<!-- Newsletter -->
						<div class="col-12 position-relative my-2 my-sm-3">
							<div class="row align-items-center">
								<!-- Title -->
								<div class="col-lg-6">
									<h3 class="text-white mb-3 mb-lg-0">Are you ready for a more great Conversation?</h3>
								</div>
								<!-- Input item -->
								<div class="col-lg-6 text-lg-end">
									<form class="bg-body rounded p-2">
										<div class="input-group">
											<input class="form-control border-0 me-1" type="email" placeholder="Type your email here">
											<button type="button" class="btn btn-dark mb-0 rounded">Subscribe</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div> <!-- Row END -->
				</div>
			</div>
		</section>
		<!-- =======================
Newsletter END -->

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