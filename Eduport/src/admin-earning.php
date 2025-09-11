<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("partials/title-meta.php"); ?>
	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/apexcharts/apexcharts.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/overlayscrollbars/styles/overlayscrollbars.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>

	<!-- **************** MAIN CONTENT START **************** -->
	<main>

	   <?php include("partials/sidebar.php"); ?>

		<!-- Page content START -->
		<div class="page-content">

			<!-- Top bar START -->
			<nav class="navbar top-bar navbar-light border-bottom py-0 py-xl-3">
				<div class="container-fluid p-0">
					<div class="d-flex align-items-center w-100">

						<!-- Logo START -->
						<div class="d-flex align-items-center d-xl-none">
							<a class="navbar-brand" href="index.php">
								<img class="light-mode-item navbar-brand-item h-30px" src="assets/images/logo-mobile.svg" alt="">
								<img class="dark-mode-item navbar-brand-item h-30px" src="assets/images/logo-mobile-light.svg" alt="">
							</a>
						</div>
						<!-- Logo END -->

						<!-- Toggler for sidebar START -->
						<div class="navbar-expand-xl sidebar-offcanvas-menu">
							<button class="navbar-toggler me-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="outside">
								<i class="bi bi-text-right fa-fw h2 lh-0 mb-0 rtl-flip" data-bs-target="#offcanvasMenu"> </i>
							</button>
						</div>
						<!-- Toggler for sidebar END -->

						<!-- Top bar left -->
						<div class="navbar-expand-lg ms-auto ms-xl-0">

							<!-- Toggler for menubar START -->
							<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopContent" aria-controls="navbarTopContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-animation">
									<span></span>
									<span></span>
									<span></span>
								</span>
							</button>
							<!-- Toggler for menubar END -->

							<!-- Topbar menu START -->
							<div class="collapse navbar-collapse w-100" id="navbarTopContent">
								<!-- Top search START -->
								<div class="nav my-3 my-xl-0 flex-nowrap align-items-center">
									<div class="nav-item w-100">
										<form class="rounded position-relative">
											<input class="form-control pe-5 bg-secondary bg-opacity-10 border-0" type="search" placeholder="Search" aria-label="Search">
											<button class="bg-transparent px-2 py-0 border-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 text-primary"></i></button>
										</form>
									</div>
								</div>
								<!-- Top search END -->
							</div>
							<!-- Topbar menu END -->
						</div>
						<!-- Top bar left END -->

						<!-- Top bar right START -->
						<div class="ms-xl-auto">
							<ul class="navbar-nav flex-row align-items-center">

								<!-- Notification dropdown START -->
								<li class="nav-item ms-2 ms-md-3 dropdown">
									<!-- Notification button -->
									<a class="btn btn-light btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
										<i class="bi bi-bell fa-fw"></i>
									</a>
									<!-- Notification dote -->
									<span class="notif-badge animation-blink"></span>

									<!-- Notification dropdown menu START -->
									<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
										<div class="card bg-transparent">
											<div class="card-header bg-transparent border-bottom py-4 d-flex justify-content-between align-items-center">
												<h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">2 new</span></h6>
												<a class="small" href="#">Clear all</a>
											</div>
											<div class="card-body p-0">
												<ul class="list-group list-unstyled list-group-flush">
													<!-- Notif item -->
													<li>
														<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
															<div class="me-3">
																<div class="avatar avatar-md">
																	<img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="avatar">
																</div>
															</div>
															<div>
																<p class="text-body small m-0">Congratulate <b>Joan Wallace</b> for graduating from <b>Microverse university</b></p>
																<u class="small">Say congrats</u>
															</div>
														</a>
													</li>

													<!-- Notif item -->
													<li>
														<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
															<div class="me-3">
																<div class="avatar avatar-md">
																	<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
																</div>
															</div>
															<div>
																<h6 class="mb-1">Larry Lawson Added a new course</h6>
																<p class="small text-body m-0">What's new! Find out about new features</p>
																<u class="small">View detail</u>
															</div>
														</a>
													</li>

													<!-- Notif item -->
													<li>
														<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
															<div class="me-3">
																<div class="avatar avatar-md">
																	<img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
																</div>
															</div>
															<div>
																<h6 class="mb-1">New request to apply for Instructor</h6>
																<u class="small">View detail</u>
															</div>
														</a>
													</li>

													<!-- Notif item -->
													<li>
														<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
															<div class="me-3">
																<div class="avatar avatar-md">
																	<img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
																</div>
															</div>
															<div>
																<h6 class="mb-1">Update v2.3 completed successfully</h6>
																<p class="small text-body m-0">What's new! Find out about new features</p>
																<small class="text-body">5 min ago</small>
															</div>
														</a>
													</li>
												</ul>
											</div>
											<!-- Button -->
											<div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
												<a href="#" class="stretched-link">See all incoming activity</a>
											</div>
										</div>
									</div>
									<!-- Notification dropdown menu END -->
								</li>
								<!-- Notification dropdown END -->

								<!-- Profile dropdown START -->
								<li class="nav-item ms-2 ms-md-3 dropdown">
									<!-- Avatar -->
									<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
										<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
									</a>

									<!-- Profile dropdown START -->
									<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
										<!-- Profile info -->
										<li class="px-3">
											<div class="d-flex align-items-center">
												<!-- Avatar -->
												<div class="avatar me-3 mb-3">
													<img class="avatar-img rounded-circle shadow" src="assets/images/avatar/01.jpg" alt="avatar">
												</div>
												<div>
													<a class="h6 mt-2 mt-sm-0" href="#">Lori Ferguson</a>
													<p class="small m-0">example@gmail.com</p>
												</div>
											</div>
										</li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<!-- Links -->
										<li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
										<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
										<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
										<li><a class="dropdown-item bg-danger-soft-hover" href="#"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
										<li>
											<hr class="dropdown-divider">
										</li>

										<!-- Dark mode options START -->
										<li>
											<div class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
												<!-- <span>Mode:</span> -->
												<button type="button" class="btn btn-sm mb-0" data-bs-theme-value="light">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
														<path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
														<use href="#"></use>
													</svg> Light
												</button>
												<button type="button" class="btn btn-sm mb-0" data-bs-theme-value="dark">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
														<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
														<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
														<use href="#"></use>
													</svg> Dark
												</button>
												<button type="button" class="btn btn-sm mb-0 active" data-bs-theme-value="auto">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
														<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
														<use href="#"></use>
													</svg> Auto
												</button>
											</div>
										</li>
										<!-- Dark mode options END-->
									</ul>
									<!-- Profile dropdown END -->
								</li>
								<!-- Profile dropdown END -->
							</ul>
						</div>
						<!-- Top bar right END -->
					</div>
				</div>
			</nav>
			<!-- Top bar END -->

			<!-- Page main content START -->
			<div class="page-content-wrapper border">

				<!-- Title -->
				<div class="row mb-3">
					<div class="col-12">
						<h1 class="h3 mb-0">Earnings</h1>
					</div>
				</div>

				<div class="row g-4 mb-4">
					<!-- Earning item -->
					<div class="col-sm-6 col-lg-4">
						<div class="p-4 bg-primary bg-opacity-10 rounded-3">
							<h6>Sales this month</h6>
							<h2 class="mb-0 fs-1 text-primary">$899.95</h2>
						</div>
					</div>

					<!-- Earning item -->
					<div class="col-sm-6 col-lg-4">
						<div class="p-4 bg-purple bg-opacity-10 rounded-3">
							<h6>To be paid
								<a tabindex="0" class="h6 mb-0" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-content="After US royalty withholding tax" data-bs-original-title="" title="">
									<i class="bi bi-info-circle-fill small"></i>
								</a>
							</h6>
							<h2 class="mb-0 fs-1 text-purple">$750.35</h2>
						</div>
					</div>

					<!-- Earning item -->
					<div class="col-sm-6 col-lg-4">
						<div class="p-4 bg-orange bg-opacity-10 rounded-3">
							<h6>Lifetime Earnings</h6>
							<h2 class="mb-0 fs-1 text-orange">$4882.65</h2>
						</div>
					</div>
				</div> <!-- Row END -->

				<!-- All review table START -->
				<div class="card bg-transparent border">

					<!-- Card header START -->
					<div class="card-header bg-light border-bottom">
						<h5 class="mb-0">Invoice History</h5>
					</div>
					<!-- Card header END -->

					<!-- Card body START -->
					<div class="card-body pb-0">
						<!-- Table START -->
						<div class="table-responsive border-0">
							<table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
								<!-- Table head -->
								<thead>
									<tr>
										<th scope="col" class="border-0 rounded-start">Invoice ID</th>
										<th scope="col" class="border-0">Course Name</th>
										<th scope="col" class="border-0">Date</th>
										<th scope="col" class="border-0">Payment Method</th>
										<th scope="col" class="border-0">Amount</th>
										<th scope="col" class="border-0">Status</th>
										<th scope="col" class="border-0 rounded-end">Action</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody>

									<!-- Table row -->
									<tr>
										<!-- Table data -->
										<td>#254684</td>

										<!-- Table data -->
										<td>
											<h6 class="table-responsive-title mb-0"><a href="#">Create a Design System in Figma</a></h6>
										</td>

										<!-- Table data -->
										<td>29 Aug 2021</td>

										<!-- Table data -->
										<td>
											<img src="assets/images/client/mastercard.svg" class="h-50px" alt="">
										</td>

										<!-- Table data -->
										<td>$3,999
											<!-- Dropdown icon -->
											<a href="#" class="h6 mb-0" role="button" id="dropdownShare1" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="bi bi-info-circle-fill"></i>
											</a>
											<!-- Dropdown items -->
											<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare1">
												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Commission</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="me-4 small">Us royalty withholding</span>
														<span class="text-danger small">-$0.00</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Earning</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
												</li>
											</ul>
										</td>

										<!-- Table data -->
										<td>
											<div class="badge bg-success bg-opacity-10 text-success">Paid</div>
										</td>

										<!-- Table data -->
										<td>
											<a href="#" class="btn btn-primary-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Download" aria-label="Download">
												<i class="bi bi-download"></i>
											</a>
										</td>
									</tr>

									<!-- Table row -->
									<tr>
										<!-- Table data -->
										<td>#125464</td>

										<!-- Table data -->
										<td>
											<h6 class="table-responsive-title mb-0">Sketch from A to Z: for app designer</h6>
										</td>

										<!-- Table data -->
										<td>26 Aug 2021</td>

										<!-- Table data -->
										<td>
											<img src="assets/images/client/paypal.svg" class="w-80px" alt="">
										</td>

										<!-- Table data -->
										<td>$4,201
											<!-- Dropdown icon -->
											<a href="#" class="h6 mb-0" role="button" id="dropdownShare2" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="bi bi-info-circle-fill"></i>
											</a>
											<!-- Dropdown items -->
											<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare2">
												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Commission</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="me-4 small">Us royalty withholding</span>
														<span class="text-danger small">-$0.00</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Earning</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
												</li>
											</ul>
										</td>

										<!-- Table data -->
										<td>
											<div class="badge bg-success bg-opacity-10 text-success">Paid</div>
										</td>

										<!-- Table data -->
										<td>
											<a href="#" class="btn btn-primary-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Download" aria-label="Download">
												<i class="bi bi-download"></i>
											</a>
										</td>
									</tr>

									<!-- Table row -->
									<tr>
										<!-- Table data -->
										<td>#123546</td>

										<!-- Table data -->
										<td>
											<h6 class="table-responsive-title mb-0">The Complete Web Development in python</h6>
										</td>

										<!-- Table data -->
										<td>18 July 2021</td>

										<!-- Table data -->
										<td>
											<img src="assets/images/client/paypal.svg" class="w-80px" alt="">
										</td>

										<!-- Table data -->
										<td>$1,032
											<!-- Dropdown icon -->
											<a href="#" class="h6 mb-0" role="button" id="dropdownShare3" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="bi bi-info-circle-fill"></i>
											</a>
											<!-- Dropdown items -->
											<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare3">
												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Commission</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="me-4 small">Us royalty withholding</span>
														<span class="text-danger small">-$0.00</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Earning</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
												</li>
											</ul>
										</td>

										<!-- Table data -->
										<td>
											<div class="badge bg-orange bg-opacity-10 text-orange">Pending</div>
										</td>

										<!-- Table data -->
										<td>
											<a href="#" class="btn btn-primary-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Download" aria-label="Download">
												<i class="bi bi-download"></i>
											</a>
										</td>
									</tr>

									<!-- Table row -->
									<tr>
										<!-- Table data -->
										<td>#1235698</td>

										<!-- Table data -->
										<td>
											<h6 class="table-responsive-title mb-0">Deep Learning with React-Native</h6>
										</td>

										<!-- Table data -->
										<td>09 July 2021</td>

										<!-- Table data -->
										<td>
											<img src="assets/images/client/mastercard.svg" class="h-50px" alt="">
										</td>

										<!-- Table data -->
										<td>$6,548
											<!-- Dropdown icon -->
											<a href="#" class="h6 mb-0" role="button" id="dropdownShare4" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="bi bi-info-circle-fill"></i>
											</a>
											<!-- Dropdown items -->
											<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare4">
												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Commission</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="me-4 small">Us royalty withholding</span>
														<span class="text-danger small">-$0.00</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Earning</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
												</li>
											</ul>
										</td>

										<!-- Table data -->
										<td>
											<div class="badge bg-success bg-opacity-10 text-success">Paid</div>
										</td>

										<!-- Table data -->
										<td>
											<a href="#" class="btn btn-primary-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Download" aria-label="Download">
												<i class="bi bi-download"></i>
											</a>
										</td>
									</tr>

									<!-- Table row -->
									<tr>
										<!-- Table data -->
										<td>#132456</td>

										<!-- Table data -->
										<td>
											<h6 class="table-responsive-title mb-0">Microsoft Excel - Excel from Beginner to Advanced</h6>
										</td>

										<!-- Table data -->
										<td>21 June 2021</td>

										<!-- Table data -->
										<td>
											<img src="assets/images/client/paypal.svg" class="w-80px" alt="">
										</td>

										<!-- Table data -->
										<td>$2,546
											<!-- Dropdown icon -->
											<a href="#" class="h6 mb-0" role="button" id="dropdownShare5" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="bi bi-info-circle-fill"></i>
											</a>
											<!-- Dropdown items -->
											<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare5">
												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Commission</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="me-4 small">Us royalty withholding</span>
														<span class="text-danger small">-$0.00</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Earning</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
												</li>
											</ul>
										</td>

										<!-- Table data -->
										<td>
											<div class="badge bg-orange bg-opacity-10 text-orange">Pending</div>
										</td>

										<!-- Table data -->
										<td>
											<a href="#" class="btn btn-primary-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Download" aria-label="Download">
												<i class="bi bi-download"></i>
											</a>
										</td>
									</tr>

									<!-- Table row -->
									<tr>
										<!-- Table data -->
										<td>#145623</td>

										<!-- Table data -->
										<td>
											<h6 class="table-responsive-title mb-0">Twitter Marketing & Twitter Ads For Beginners</h6>
										</td>

										<!-- Table data -->
										<td>05 June 2021</td>

										<!-- Table data -->
										<td>
											<img src="assets/images/client/mastercard.svg" class="h-50px" alt="">
										</td>

										<!-- Table data -->
										<td>$4,258
											<!-- Dropdown icon -->
											<a href="#" class="h6 mb-0" role="button" id="dropdownShare6" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="bi bi-info-circle-fill"></i>
											</a>
											<!-- Dropdown items -->
											<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare6">
												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Commission</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="me-4 small">Us royalty withholding</span>
														<span class="text-danger small">-$0.00</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Earning</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
												</li>
											</ul>
										</td>

										<!-- Table data -->
										<td>
											<div class="badge bg-danger bg-opacity-10 text-danger">Cancel</div>
										</td>

										<!-- Table data -->
										<td>
											<a href="#" class="btn btn-primary-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Download" aria-label="Download">
												<i class="bi bi-download"></i>
											</a>
										</td>
									</tr>

									<!-- Table row -->
									<tr>
										<!-- Table data -->
										<td>#154632</td>

										<!-- Table data -->
										<td>
											<h6 class="table-responsive-title mb-0">The Complete Digital Marketing Course - 12 Courses in 1</h6>
										</td>

										<!-- Table data -->
										<td>15 April 2021</td>

										<!-- Table data -->
										<td>
											<img src="assets/images/client/paypal.svg" class="w-80px" alt="">
										</td>

										<!-- Table data -->
										<td>$854
											<!-- Dropdown icon -->
											<a href="#" class="h6 mb-0" role="button" id="dropdownShare7" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="bi bi-info-circle-fill"></i>
											</a>
											<!-- Dropdown items -->
											<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare7">
												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Commission</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="me-4 small">Us royalty withholding</span>
														<span class="text-danger small">-$0.00</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Earning</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
												</li>
											</ul>
										</td>

										<!-- Table data -->
										<td>
											<div class="badge bg-orange bg-opacity-10 text-orange">Pending</div>
										</td>

										<!-- Table data -->
										<td>
											<a href="#" class="btn btn-primary-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Download" aria-label="Download">
												<i class="bi bi-download"></i>
											</a>
										</td>
									</tr>

									<!-- Table row -->
									<tr>
										<!-- Table data -->
										<td>#165423</td>

										<!-- Table data -->
										<td>
											<h6 class="table-responsive-title mb-0">Create a Design System in Figma</h6>
										</td>

										<!-- Table data -->
										<td>02 Jan 2021</td>

										<!-- Table data -->
										<td>
											<img src="assets/images/client/mastercard.svg" class="h-50px" alt="">
										</td>

										<!-- Table data -->
										<td>$965
											<!-- Dropdown icon -->
											<a href="#" class="h6 mb-0" role="button" id="dropdownShare8" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="bi bi-info-circle-fill"></i>
											</a>
											<!-- Dropdown items -->
											<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare8">
												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Commission</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="me-4 small">Us royalty withholding</span>
														<span class="text-danger small">-$0.00</span>
													</div>
													<hr class="my-1"> <!-- Divider -->
												</li>

												<li>
													<div class="d-flex justify-content-between">
														<span class="small">Earning</span>
														<span class="h6 mb-0 small">$86</span>
													</div>
												</li>
											</ul>
										</td>

										<!-- Table data -->
										<td>
											<div class="badge bg-success bg-opacity-10 text-success">Paid</div>
										</td>

										<!-- Table data -->
										<td>
											<a href="#" class="btn btn-primary-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Download" aria-label="Download">
												<i class="bi bi-download"></i>
											</a>
										</td>
									</tr>

								</tbody>
								<!-- Table body END -->
							</table>
						</div>
						<!-- Table END -->
					</div>
					<!-- Card body END -->

					<!-- Card footer START -->
					<div class="card-footer bg-transparent">
						<!-- Pagination START -->
						<div class="d-sm-flex justify-content-sm-between align-items-sm-center">
							<!-- Content -->
							<p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
							<!-- Pagination -->
							<nav class="d-flex justify-content-center mb-0" aria-label="navigation">
								<ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
									<li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
									<li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
									<li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
									<li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
									<li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
								</ul>
							</nav>
						</div>
						<!-- Pagination END -->
					</div>
					<!-- Card footer END -->
				</div>
				<!-- All review table END -->
			</div>
			<!-- Page main content END -->
		</div>
		<!-- Page content END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

	<!-- Bootstrap JS -->
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="assets/vendor/@srexi/purecounterjs/purecounter_vanilla.js"></script>
	<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
	<script src="assets/vendor/overlayscrollbars/browser/overlayscrollbars.browser.es6.min.js"></script>

	<!-- Template Functions -->
	<script src="assets/js/functions.js"></script>

</body>

</html>