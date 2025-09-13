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
Main Banner START -->
		<section class="pt-0">
			<!-- Main banner background image -->
			<div class="container-fluid px-0">
				<div class="bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
				</div>
			</div>
			<div class="container mt-n4">
				<div class="row">
					<!-- Profile banner START -->
					<div class="col-12">
						<div class="card bg-transparent card-body p-0">
							<div class="row d-flex justify-content-between">
								<!-- Avatar -->
								<div class="col-auto mt-4 mt-md-0">
									<div class="avatar avatar-xxl mt-n3">
										<img class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/avatar/01.jpg" alt="">
									</div>
								</div>
								<!-- Profile info -->
								<div class="col d-md-flex justify-content-between align-items-center mt-4">
									<div>
										<h1 class="my-1 fs-4">Lori Stevens <i class="bi bi-patch-check-fill text-info small"></i></h1>
										<ul class="list-inline mb-0">
											<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>
											<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>12k Enrolled Students</li>
											<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>25 Courses</li>
										</ul>
									</div>
									<!-- Button -->
									<div class="d-flex align-items-center mt-2 mt-md-0">
										<a href="#" class="btn btn-sm btn-primary mb-0" data-bs-toggle="modal" data-bs-target="#addQuiz">Add New Quiz</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Profile banner END -->

						<!-- Advanced filter responsive toggler START -->
						<!-- Divider -->
						<hr class="d-xl-none">
						<div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
							<a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
							<button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
								<i class="fas fa-sliders-h"></i>
							</button>
						</div>
						<!-- Advanced filter responsive toggler END -->
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
Main Banner END -->

		<!-- =======================
Inner part START -->
		<section class="pt-0">
			<div class="container">
				<div class="row">
					<!-- Left sidebar START -->
					<div class="col-xl-3">
						<!-- Responsive offcanvas body START -->
						<div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
							<!-- Offcanvas header -->
							<div class="offcanvas-header bg-light">
								<h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
								<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
							</div>
							<!-- Offcanvas body -->
							<div class="offcanvas-body p-3 p-xl-0">
								<div class="bg-dark border rounded-3 pb-0 p-3 w-100">
									<!-- Dashboard menu -->
									<div class="list-group list-group-dark list-group-borderless">
										<a class="list-group-item" href="instructor-dashboard.php"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Dashboard</a>
										<a class="list-group-item" href="instructor-manage-course.php"><i class="bi bi-basket fa-fw me-2"></i>My Courses</a>
										<a class="list-group-item active" href="instructor-quiz.php"><i class="bi bi-question-diamond fa-fw me-2"></i>Quiz</a>
										<a class="list-group-item" href="instructor-earning.php"><i class="bi bi-graph-up fa-fw me-2"></i>Earnings</a>
										<a class="list-group-item" href="instructor-studentlist.php"><i class="bi bi-people fa-fw me-2"></i>Students</a>
										<a class="list-group-item" href="instructor-order.php"><i class="bi bi-folder-check fa-fw me-2"></i>Orders</a>
										<a class="list-group-item" href="instructor-review.php"><i class="bi bi-star fa-fw me-2"></i>Reviews</a>
										<a class="list-group-item" href="instructor-edit-profile.php"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit Profile</a>
										<a class="list-group-item" href="instructor-payout.php"><i class="bi bi-wallet2 fa-fw me-2"></i>Payouts</a>
										<a class="list-group-item" href="instructor-setting.php"><i class="bi bi-gear fa-fw me-2"></i>Settings</a>
										<a class="list-group-item" href="instructor-delete-account.php"><i class="bi bi-trash fa-fw me-2"></i>Delete Profile</a>
										<a class="list-group-item text-danger bg-danger-soft-hover" href="sign-in.php"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Responsive offcanvas body END -->
					</div>
					<!-- Left sidebar END -->

					<!-- Main content START -->
					<div class="col-xl-9">
						<!-- Card START -->
						<div class="card border bg-transparent rounded-3">
							<!-- Card header START -->
							<div class="card-header bg-transparent border-bottom px-3">
								<div class="row g-4 align-items-center">
									<div class="col-md-2">
										<img src="assets/images/courses/4by3/01.jpg" class="rounded-2" alt="Card image">
									</div>
									<div class="col-md-10">
										<!-- Title -->
										<h3 class="card-title mb-0"><a href="#">The Complete Digital Marketing Course - 12 Courses in 1</a></h3>
									</div>
								</div>
							</div>
							<!-- Card header END -->

							<!-- Card body START -->
							<div class="card-body p-4">

								<!-- Accordion START -->
								<div class="accordion accordion-icon accordion-bg-light" id="accordionExample">
									<!-- Item -->
									<div class="accordion-item mb-3">
										<h6 class="accordion-header" id="headingOne">
											<button class="accordion-button rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												<span class="text-secondary fw-bold me-3">01</span>
												<span class="fw-bold">How do you protect your business against cyber-crime?</span>
											</button>
										</h6>
										<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
											<div class="accordion-body mt-3">
												<!-- Answer options -->
												<p class="mb-3"><b class="text-dark">A</b> We have cybersecurity insurance coverage</p>
												<p class="mb-3"><b class="text-dark">B</b> Our dedicated staff will protect us</p>
												<p class="mb-3"><b class="text-dark">C</b> We give regular training for best practices</p>
												<p class="mb-3"><b class="text-dark">D</b> Third-party vendor protection</p>

												<!-- Button -->
												<a href="#" class="btn btn-sm btn-success-soft mb-0" data-bs-toggle="modal" data-bs-target="#editQuestion">Edit</a>
												<button class="btn btn-danger-soft btn-sm mb-0">Delete</button>
											</div>
										</div>
									</div>

									<!-- Item -->
									<div class="accordion-item mb-3">
										<h6 class="accordion-header" id="headingTwo">
											<button class="accordion-button rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												<span class="text-secondary fw-bold me-3">02</span>
												<span class="fw-bold">What is SEO?</span>
											</button>
										</h6>
										<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
											<div class="accordion-body mt-3">
												<!-- Answer options -->
												<p class="mb-3"><b class="text-dark">A</b> We have cybersecurity insurance coverage</p>
												<p class="mb-3"><b class="text-dark">B</b> Our dedicated staff will protect us</p>
												<p class="mb-3"><b class="text-dark">C</b> We give regular training for best practices</p>
												<p class="mb-3"><b class="text-dark">D</b> Third-party vendor protection</p>

												<!-- Button -->
												<a href="#" class="btn btn-sm btn-success-soft mb-0" data-bs-toggle="modal" data-bs-target="#editQuestion">Edit</a>
												<button class="btn btn-danger-soft btn-sm mb-0">Delete</button>
											</div>
										</div>
									</div>

									<!-- Item -->
									<div class="accordion-item mb-3">
										<h6 class="accordion-header" id="headingThree">
											<button class="accordion-button rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												<span class="text-secondary fw-bold me-3">03</span>
												<span class="fw-bold">Who should join this course?</span>
											</button>
										</h6>
										<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
											<div class="accordion-body mt-3">
												<!-- Answer options -->
												<p class="mb-3"><b class="text-dark">A</b> We have cybersecurity insurance coverage</p>
												<p class="mb-3"><b class="text-dark">B</b> Our dedicated staff will protect us</p>
												<p class="mb-3"><b class="text-dark">C</b> We give regular training for best practices</p>
												<p class="mb-3"><b class="text-dark">D</b> Third-party vendor protection</p>

												<!-- Button -->
												<a href="#" class="btn btn-sm btn-success-soft mb-0" data-bs-toggle="modal" data-bs-target="#editQuestion">Edit</a>
												<button class="btn btn-danger-soft btn-sm mb-0">Delete</button>
											</div>
										</div>
									</div>

									<!-- Item -->
									<div class="accordion-item">
										<h6 class="accordion-header" id="headingFour">
											<button class="accordion-button rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
												<span class="text-secondary fw-bold me-3">04</span>
												<span class="fw-bold">What are the T&C for this program?</span>
											</button>
										</h6>
										<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
											<div class="accordion-body mt-3">
												<!-- Answer options -->
												<p class="mb-3"><b class="text-dark">A</b> We have cybersecurity insurance coverage</p>
												<p class="mb-3"><b class="text-dark">B</b> Our dedicated staff will protect us</p>
												<p class="mb-3"><b class="text-dark">C</b> We give regular training for best practices</p>
												<p class="mb-3"><b class="text-dark">D</b> Third-party vendor protection</p>

												<!-- Button -->
												<a href="#" class="btn btn-sm btn-success-soft mb-0" data-bs-toggle="modal" data-bs-target="#editQuestion">Edit</a>
												<button class="btn btn-danger-soft btn-sm mb-0">Delete</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Accordion END -->

							</div>
							<!-- Card body START -->
						</div>
						<!-- Card END -->

						<!-- Student quiz result START -->
						<div class="card border bg-transparent rounded-3 mt-4">
							<!-- Card header START -->
							<div class="card-header bg-transparent border-bottom">
								<h3 class="mb-0">Student quiz result</h3>
							</div>
							<!-- Card header END -->

							<!-- Card body START -->
							<div class="card-body">

								<!-- Search and select START -->
								<div class="row g-3 align-items-center justify-content-between mb-4">
									<!-- Search -->
									<div class="col-md-8">
										<form class="rounded position-relative">
											<input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">
											<button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
												<i class="fas fa-search fs-6 "></i>
											</button>
										</form>
									</div>

									<!-- Select option -->
									<div class="col-md-3">
										<!-- Short by filter -->
										<form>
											<select class="form-select js-choice border-0 z-index-9 bg-transparent" aria-label=".form-select-sm">
												<option value="">Sort by</option>
												<option>Free</option>
												<option>Newest</option>
												<option>Oldest</option>
											</select>
										</form>
									</div>
								</div>
								<!-- Search and select END -->

								<!-- Student list table START -->
								<div class="table-responsive border-0">
									<table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
										<!-- Table head -->
										<thead>
											<tr>
												<th scope="col" class="border-0 rounded-start">Student name</th>
												<th scope="col" class="border-0">Course name</th>
												<th scope="col" class="border-0">Date</th>
												<th scope="col" class="border-0">Points</th>
												<th scope="col" class="border-0 rounded-end">Action</th>
											</tr>
										</thead>

										<!-- Table body START -->
										<tbody>
											<!-- Table item -->
											<tr>
												<!-- Table data -->
												<td>
													<div class="d-flex align-items-center">
														<!-- Image -->
														<div class="avatar avatar-sm me-2">
															<img src="assets/images/avatar/01.jpg" class="rounded" alt="">
														</div>
														<div>
															<!-- Title -->
															<h6 class="mb-0"><a href="#">Lori Stevens</a></h6>
														</div>
													</div>
												</td>

												<!-- Table data -->
												<td>
													<h6 class="table-responsive-title mt-2 mt-md-0 mb-0"><a href="#">The complete Digital Marketing Courses - 12 Course in 1</a></h6>
												</td>

												<!-- Table data -->
												<td>7/1/2023</td>

												<!-- Table data -->
												<td>450/500</td>

												<!-- Table data -->
												<td>
													<a href="#" class="btn btn-success-soft btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Message"><i class="far fa-envelope"></i></a>
												</td>
											</tr>

											<!-- Table item -->
											<tr>
												<!-- Table data -->
												<td>
													<div class="d-flex align-items-center">
														<!-- Image -->
														<div class="avatar avatar-sm me-2">
															<img src="assets/images/avatar/03.jpg" class="rounded" alt="">
														</div>
														<div>
															<!-- Title -->
															<h6 class="mb-0"><a href="#">Dennis Barrett</a></h6>
														</div>
													</div>
												</td>

												<!-- Table data -->
												<td>
													<h6 class="table-responsive-title mt-2 mt-md-0 mb-0"><a href="#">The complete Digital Marketing Courses - 12 Course in 1</a></h6>
												</td>

												<!-- Table data -->
												<td>6/1/2023</td>

												<!-- Table data -->
												<td>425/500</td>

												<!-- Table data -->
												<td>
													<a href="#" class="btn btn-success-soft btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Message"><i class="far fa-envelope"></i></a>
												</td>
											</tr>

											<!-- Table item -->
											<tr>
												<!-- Table data -->
												<td>
													<div class="d-flex align-items-center">
														<!-- Image -->
														<div class="avatar avatar-sm me-2">
															<img src="assets/images/avatar/04.jpg" class="rounded" alt="">
														</div>
														<div>
															<!-- Title -->
															<h6 class="mb-0"><a href="#">Billy Vasquez</a></h6>
														</div>
													</div>
												</td>

												<!-- Table data -->
												<td>
													<h6 class="table-responsive-title mt-2 mt-md-0 mb-0"><a href="#">The complete Digital Marketing Courses - 12 Course in 1</a></h6>
												</td>

												<!-- Table data -->
												<td>5/1/2023</td>

												<!-- Table data -->
												<td>385/500</td>

												<!-- Table data -->
												<td>
													<a href="#" class="btn btn-success-soft btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Message"><i class="far fa-envelope"></i></a>
												</td>
											</tr>

											<!-- Table item -->
											<tr>
												<!-- Table data -->
												<td>
													<div class="d-flex align-items-center">
														<!-- Image -->
														<div class="avatar avatar-sm me-2">
															<img src="assets/images/avatar/09.jpg" class="rounded" alt="">
														</div>
														<div>
															<!-- Title -->
															<h6 class="mb-0"><a href="#">Carolyn Ortiz</a></h6>
														</div>
													</div>
												</td>

												<!-- Table data -->
												<td>
													<h6 class="table-responsive-title mt-2 mt-md-0 mb-0"><a href="#">The complete Digital Marketing Courses - 12 Course in 1</a></h6>
												</td>

												<!-- Table data -->
												<td>5/1/2023</td>

												<!-- Table data -->
												<td>398/500</td>

												<!-- Table data -->
												<td>
													<a href="#" class="btn btn-success-soft btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Message"><i class="far fa-envelope"></i></a>
												</td>
											</tr>

											<!-- Table item -->
											<tr>
												<!-- Table data -->
												<td>
													<div class="d-flex align-items-center">
														<!-- Image -->
														<div class="avatar avatar-sm me-2">
															<img src="assets/images/avatar/07.jpg" class="rounded" alt="">
														</div>
														<div>
															<!-- Title -->
															<h6 class="mb-0"><a href="#">Larry Lawson</a></h6>
														</div>
													</div>
												</td>

												<!-- Table data -->
												<td>
													<h6 class="table-responsive-title mt-2 mt-md-0 mb-0"><a href="#">The complete Digital Marketing Courses - 12 Course in 1</a></h6>
												</td>

												<!-- Table data -->
												<td>4/1/2023</td>

												<!-- Table data -->
												<td>428/500</td>

												<!-- Table data -->
												<td>
													<a href="#" class="btn btn-success-soft btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Message"><i class="far fa-envelope"></i></a>
												</td>
											</tr>

											<!-- Table item -->
											<tr>
												<!-- Table data -->
												<td>
													<div class="d-flex align-items-center">
														<!-- Image -->
														<div class="avatar avatar-sm me-2">
															<img src="assets/images/avatar/06.jpg" class="rounded" alt="">
														</div>
														<div>
															<!-- Title -->
															<h6 class="mb-0"><a href="#">Frances Guerrero</a></h6>
														</div>
													</div>
												</td>

												<!-- Table data -->
												<td>
													<h6 class="table-responsive-title mt-2 mt-md-0 mb-0"><a href="#">The complete Digital Marketing Courses - 12 Course in 1</a></h6>
												</td>

												<!-- Table data -->
												<td>4/1/2023</td>

												<!-- Table data -->
												<td>486/500</td>

												<!-- Table data -->
												<td>
													<a href="#" class="btn btn-success-soft btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Message"><i class="far fa-envelope"></i></a>
												</td>
											</tr>
										</tbody>
										<!-- Table body END -->
									</table>
								</div>
								<!-- Student list table END -->

								<!-- Pagination START -->
								<div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
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
							<!-- Card body START -->
						</div>
						<!-- Student quiz result END -->

					</div>
					<!-- Main content END -->
				</div><!-- Row END -->
			</div>
		</section>
		<!-- =======================
Inner part END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
Footer START -->
	<footer class="bg-dark p-3">
		<div class="container">
			<div class="row align-items-center">
				<!-- Widget -->
				<div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
					<!-- Logo START -->
					<a href="index.php"> <img class="h-20px" src="assets/images/logo-light.svg" alt="logo"> </a>
				</div>

				<!-- Widget -->
				<div class="col-md-4 mb-3 mb-md-0">
					<div class="text-center text-white text-primary-hover">
						Copyrights ©2024 Eduport. Build by <a href="https://1.envato.market/stackbros-portfolio" target="_blank" class="text-white">StackBros</a>.
					</div>
				</div>
				<!-- Widget -->
				<div class="col-md-4">
					<!-- Rating -->
					<ul class="list-inline mb-0 text-center text-md-end">
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-facebook"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-instagram"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-linkedin-in"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- =======================
Footer END -->

	<!-- Edit course modal START -->
	<div class="modal fade" id="editQuestion" tabindex="-1" aria-labelledby="editQuestionLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title text-white" id="editQuestionLabel">Edit Question</h5>
					<button type="button" class="btn btn-sm btn-light mb-0 ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
				</div>
				<div class="modal-body">
					<form class="row text-start g-3">

						<!-- Question -->
						<div class="col-12">
							<label class="form-label">Question</label>
							<input class="form-control" type="text" value="How do you protect your business against cyber-crime?" placeholder="Write a question">
						</div>

						<!-- Answer options START -->
						<div class="col-6">
							<label class="form-label">Option 1</label>
							<input class="form-control" type="text" value="We have cybersecurity insurance coverage" placeholder="Write a option">
						</div>

						<div class="col-6">
							<label class="form-label">Option 2</label>
							<input class="form-control" type="text" value="Our dedicated staff will protect us" placeholder="Write a option">
						</div>

						<div class="col-6">
							<label class="form-label">Option 3</label>
							<input class="form-control" type="text" value="We give regular training for best practices" placeholder="Write a option">
						</div>

						<div class="col-6">
							<label class="form-label">Option 4</label>
							<input class="form-control" type="text" value="Third-party vendor protection" placeholder="Write a option">
						</div>
						<!-- Answer options END -->
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success my-0">Save change</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Edit course modal START -->

	<!-- Add course modal START -->
	<div class="modal fade" id="addQuiz" tabindex="-1" aria-labelledby="addQuizLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title text-white" id="addQuizLabel">Add New Quiz</h5>
					<button type="button" class="btn btn-sm btn-light mb-0 ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
				</div>
				<div class="modal-body">
					<form class="row text-start g-3">

						<!-- Question -->
						<div class="col-12">
							<label class="form-label">Question</label>
							<input class="form-control" type="text" placeholder="Write a question">
						</div>

						<!-- Answer options START -->
						<div class="col-6">
							<label class="form-label">Option 1</label>
							<input class="form-control" type="text" placeholder="Write a option">
						</div>

						<div class="col-6">
							<label class="form-label">Option 2</label>
							<input class="form-control" type="text" placeholder="Write a option">
						</div>

						<div class="col-6">
							<label class="form-label">Option 3</label>
							<input class="form-control" type="text" placeholder="Write a option">
						</div>

						<div class="col-6">
							<label class="form-label">Option 4</label>
							<input class="form-control" type="text" placeholder="Write a option">
						</div>
						<!-- Answer options END -->
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success my-0">Add Quiz</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Add course modal START -->

	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

	<!-- Vendors -->
	<script src="assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>

	<?php include("partials/footer-scripts.php"); ?>

</body>

</html>