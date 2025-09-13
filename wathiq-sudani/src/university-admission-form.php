<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("partials/title-meta.php"); ?>

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices.js/public/assets/styles/choices.min.css">

	<?php include("partials/head-css.php"); ?>
</head>

<body>

	<!-- Header START -->
	<header class="navbar-light navbar-sticky">
		<!-- Logo Nav START -->
		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<!-- Logo START -->
				<a class="navbar-brand me-0" href="index.php">
					<img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
					<img class="dark-mode-item navbar-brand-item" src="assets/images/logo-light.svg" alt="logo">
				</a>
				<!-- Logo END -->

				<!-- Responsive navbar toggler -->
				<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-animation">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</button>

				<!-- Main navbar START -->
				<div class="navbar-collapse collapse" id="navbarCollapse">

					<!-- Nav Search END -->
					<ul class="navbar-nav navbar-nav-scroll mx-auto">

						<!-- Nav item 1 Demos -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="demoMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demos</a>
							<ul class="dropdown-menu" aria-labelledby="demoMenu">
								<li> <a class="dropdown-item" href="index.php">Home Default</a></li>
								<li> <a class="dropdown-item" href="index-2.php">Home Education</a></li>
								<li> <a class="dropdown-item" href="index-3.php">Home Academy</a></li>
								<li> <a class="dropdown-item" href="index-4.php">Home Course</a></li>
								<li> <a class="dropdown-item" href="index-5.php">Home University</a></li>
								<li> <a class="dropdown-item" href="index-6.php">Home Kindergarten</a></li>
								<li> <a class="dropdown-item" href="index-7.php">Home Landing</a></li>
								<li> <a class="dropdown-item" href="index-8.php">Home Tutor</a></li>
								<li> <a class="dropdown-item" href="index-9.php">Home School</a></li>
								<li> <a class="dropdown-item" href="index-10.php">Home Abroad</a></li>
								<li> <a class="dropdown-item" href="index-11.php">Home Workshop</a></li>
							</ul>
						</li>

						<!-- Nav item 2 Pages -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
							<ul class="dropdown-menu" aria-labelledby="pagesMenu">
								<!-- Dropdown submenu -->
								<li class="dropdown-submenu dropend">
									<a class="dropdown-item dropdown-toggle" href="#">Course</a>
									<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
										<li> <a class="dropdown-item" href="course-categories.php">Course Categories</a></li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li> <a class="dropdown-item" href="course-grid.php">Course Grid Classic</a></li>
										<li> <a class="dropdown-item" href="course-grid-2.php">Course Grid Minimal</a></li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li> <a class="dropdown-item" href="course-list.php">Course List Classic</a></li>
										<li> <a class="dropdown-item" href="course-list-2.php">Course List Minimal</a></li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li> <a class="dropdown-item" href="course-detail.php">Course Detail Classic</a></li>
										<li> <a class="dropdown-item" href="course-detail-min.php">Course Detail Minimal</a></li>
										<li> <a class="dropdown-item" href="course-detail-adv.php">Course Detail Advance</a></li>
										<li> <a class="dropdown-item" href="course-detail-module.php">Course Detail Module</a></li>
										<li> <a class="dropdown-item" href="course-video-player.php">Course Full Screen Video</a></li>
									</ul>
								</li>

								<!-- Dropdown submenu -->
								<li class="dropdown-submenu dropend">
									<a class="dropdown-item dropdown-toggle" href="#">About</a>
									<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
										<li> <a class="dropdown-item" href="about.php">About Us</a></li>
										<li> <a class="dropdown-item" href="contact-us.php">Contact Us</a></li>
										<li> <a class="dropdown-item" href="blog-grid.php">Blog Grid</a></li>
										<li> <a class="dropdown-item" href="blog-masonry.php">Blog Masonry</a></li>
										<li> <a class="dropdown-item" href="blog-detail.php">Blog Detail</a></li>
										<li> <a class="dropdown-item" href="pricing.php">Pricing</a></li>
									</ul>
								</li>


								<li> <a class="dropdown-item" href="instructor-list.php">Instructor List</a></li>
								<li> <a class="dropdown-item" href="instructor-single.php">Instructor Single</a></li>
								<li> <a class="dropdown-item" href="become-instructor.php">Become an Instructor</a></li>
								<li> <a class="dropdown-item" href="abroad-single.php">Abroad Single</a></li>
								<li> <a class="dropdown-item" href="workshop-detail.php">Workshop Detail</a></li>
								<li> <a class="dropdown-item" href="event-detail.php">Event Detail</a></li>

								<!-- Dropdown submenu -->
								<li class="dropdown-submenu dropend">
									<a class="dropdown-item dropdown-toggle" href="#">Shop</a>
									<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
										<li> <a class="dropdown-item" href="shop.php">Shop grid</a></li>
										<li> <a class="dropdown-item" href="shop-product-detail.php">Product detail</a></li>
										<li> <a class="dropdown-item" href="cart.php">Cart</a></li>
										<li> <a class="dropdown-item" href="checkout.php">Checkout</a></li>
										<li> <a class="dropdown-item" href="empty-cart.php">Empty Cart</a></li>
										<li> <a class="dropdown-item" href="wishlist.php">Wishlist</a></li>
									</ul>
								</li>

								<!-- Dropdown submenu -->
								<li class="dropdown-submenu dropend">
									<a class="dropdown-item dropdown-toggle" href="#">Help</a>
									<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
										<li> <a class="dropdown-item" href="help-center.php">Help Center</a></li>
										<li> <a class="dropdown-item" href="help-center-detail.php">Help Center Single</a></li>
										<li> <a class="dropdown-item" href="faq.php">FAQs</a></li>
									</ul>
								</li>

								<!-- Dropdown submenu -->
								<li class="dropdown-submenu dropend">
									<a class="dropdown-item dropdown-toggle" href="#">Authentication</a>
									<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
										<li> <a class="dropdown-item" href="sign-in.php">Sign In</a></li>
										<li> <a class="dropdown-item" href="sign-up.php">Sign Up</a></li>
										<li> <a class="dropdown-item" href="forgot-password.php">Forgot Password</a></li>
									</ul>
								</li>

								<!-- Dropdown submenu -->
								<li class="dropdown-submenu dropend">
									<a class="dropdown-item dropdown-toggle" href="#">Form</a>
									<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
										<li> <a class="dropdown-item" href="request-demo.php">Request a demo</a></li>
										<li> <a class="dropdown-item" href="book-class.php">Book a Class</a></li>
										<li> <a class="dropdown-item" href="request-access.php">Free Access</a></li>
										<li> <a class="dropdown-item" href="university-admission-form.php">Admission Form</a></li>
									</ul>
								</li>

								<!-- Dropdown submenu -->
								<li class="dropdown-submenu dropend">
									<a class="dropdown-item dropdown-toggle" href="#">Specialty</a>
									<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
										<li> <a class="dropdown-item" href="error-404.php">Error 404</a></li>
										<li> <a class="dropdown-item" href="coming-soon.php">Coming Soon</a></li>
									</ul>
								</li>
							</ul>
						</li>

						<!-- Nav item 3 Pages -->
						<li class="nav-item"><a class="nav-link" href="contact-us.php">Contact</a></li>

						<!-- Nav item 4 link-->
						<li class="nav-item"><a class="nav-link" href="docs/alerts.php">Components</a></li>
					</ul>
				</div>
				<!-- Main navbar END -->
				<div class="navbar-nav">
					<button class="btn btn-sm btn-dark mb-0"><i class="bi bi-power me-2"></i>Sign in</button>
				</div>

			</div>
		</nav>
		<!-- Logo Nav END -->
	</header>
	<!-- Header END -->

	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<!-- =======================
Main part START -->
		<section>
			<div class="container">
				<div class="row g-5 justify-content-between">
					<!-- Admission form START -->
					<div class="col-md-8 mx-auto">
						<!-- Title -->
						<h2 class="mb-3">Apply for Admission</h2>
						<p>You can apply online by filling up below form or <a href="#">Download a pdf</a> and submit. Any question related admission process, please contact our admission office at <a href="#">+123 456 789</a> or <a href="#">example@email.com</a>.</p>
						<p class="mb-1">Before you proceed with the form please read below topics:</p>
						<ul class="ps-3">
							<li>Application fee is $49</li>
							<li>Fees are non-refundable</li>
							<li>Field required with <span class="text-danger">*</span> are required to complete the admission form</li>
						</ul>
						<!-- Form START -->
						<form class="row g-3">
							<h5 class="mb-0">Personal information</h5>

							<!-- First name -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Student first name <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="firstName">
									</div>
								</div>
							</div>

							<!-- Middle name -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Student middle name <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="middleName">
									</div>
								</div>
							</div>

							<!-- Last name -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Student last name <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="lastName">
									</div>
								</div>
							</div>

							<!-- Gender -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Gender <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<div class="d-flex">
											<div class="form-check radio-bg-light me-4">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
												<label class="form-check-label" for="flexRadioDefault1">
													Male
												</label>
											</div>
											<div class="form-check radio-bg-light">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
												<label class="form-check-label" for="flexRadioDefault2">
													Female
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Date of birth -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Date of birth</h6>
									</div>

									<div class="col-lg-8">
										<div class="row g-2 g-sm-4">
											<div class="col-4">
												<select class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
													<option value="">Date</option>
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
													<option>6</option>
													<option>7</option>
													<option>8</option>
													<option>9</option>
													<option>10</option>
													<option>11</option>
													<option>12</option>
													<option>13</option>
													<option>14</option>
													<option>15</option>
													<option>16</option>
													<option>17</option>
													<option>18</option>
													<option>19</option>
													<option>20</option>
													<option>21</option>
													<option>22</option>
													<option>23</option>
													<option>24</option>
													<option>25</option>
													<option>26</option>
													<option>27</option>
													<option>28</option>
													<option>29</option>
													<option>30</option>
													<option>31</option>
												</select>
											</div>
											<div class="col-4">
												<select class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
													<option value="">Month</option>
													<option>Jan</option>
													<option>Feb</option>
													<option>Mar</option>
													<option>Apr</option>
													<option>Jun</option>
													<option>Jul</option>
													<option>Aug</option>
													<option>Sep</option>
													<option>Oct</option>
													<option>Nov</option>
													<option>Dec</option>
												</select>
											</div>
											<div class="col-4">
												<select class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
													<option value="">Year</option>
													<option>1990</option>
													<option>1991</option>
													<option>1992</option>
													<option>1993</option>
													<option>1994</option>
													<option>1995</option>
													<option>1996</option>
													<option>1997</option>
													<option>1998</option>
													<option>1999</option>
													<option>2000</option>
													<option>2001</option>
													<option>2002</option>
													<option>2003</option>
													<option>2004</option>
													<option>2005</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Email -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Email <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="email" class="form-control" id="email">
									</div>
								</div>
							</div>

							<!-- Phone number -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Phone number <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="phoneNumber">
									</div>
								</div>
							</div>

							<!-- Home address -->
							<div class="col-12">
								<div class="row g-xl-0">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Your address <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<textarea class="form-control" rows="3" placeholder=""></textarea>
									</div>
								</div>
							</div>

							<!-- City -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Select city <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<select class="form-select js-choice z-index-9 rounded-3 border-0 bg-light" aria-label=".form-select-sm">
											<option value="">Select city</option>
											<option>New york</option>
											<option>Mumbai</option>
											<option>Delhi</option>
											<option>London</option>
											<option>Los angeles</option>
										</select>
									</div>
								</div>
							</div>

							<!-- State -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Select state <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<select class="form-select js-choice z-index-9 rounded-3 border-0 bg-light" aria-label=".form-select-sm">
											<option value="">Select state</option>
											<option>Maharashtra</option>
											<option>California</option>
											<option>Florida</option>
											<option>Alaska</option>
											<option>Ohio</option>
										</select>
									</div>
								</div>
							</div>

							<!-- Country -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Select country <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<select class="form-select js-choice z-index-9 rounded-3 border-0 bg-light" aria-label=".form-select-sm">
											<option value="">Select country</option>
											<option>India</option>
											<option>Canada</option>
											<option>Japan</option>
											<option>America</option>
											<option>Dubai</option>
										</select>
									</div>
								</div>
							</div>

							<!-- Zip code-->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Zip code <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="zipCode">
									</div>
								</div>
							</div>

							<!-- Divider -->
							<hr class="my-5">

							<!-- Parent detail -->
							<h5 class="mt-0">Parent detail</h5>

							<!-- Salutation -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Salutation <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<div class="d-flex">
											<div class="form-check radio-bg-light me-4">
												<input class="form-check-input" type="radio" name="flexRadioSalutation" id="flexRadioSalutation1" checked>
												<label class="form-check-label" for="flexRadioSalutation1">
													Mr.
												</label>
											</div>
											<div class="form-check radio-bg-light me-4">
												<input class="form-check-input" type="radio" name="flexRadioSalutation" id="flexRadioSalutation2">
												<label class="form-check-label" for="flexRadioSalutation2">
													Mrs.
												</label>
											</div>
											<div class="form-check radio-bg-light me-4">
												<input class="form-check-input" type="radio" name="flexRadioSalutation" id="flexRadioSalutation3">
												<label class="form-check-label" for="flexRadioSalutation3">
													Ms.
												</label>
											</div>
											<div class="form-check radio-bg-light">
												<input class="form-check-input" type="radio" name="flexRadioSalutation" id="flexRadioSalutation4">
												<label class="form-check-label" for="flexRadioSalutation4">
													Dr.
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Full name -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Full name <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="fullName">
									</div>
								</div>
							</div>

							<!-- Relation with applicant -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Relation with applicant <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="relation">
									</div>
								</div>
							</div>

							<!-- Email -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Email <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="email" class="form-control" id="email2">
									</div>
								</div>
							</div>

							<!-- Phone number -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Phone number <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="phoneNumber2">
									</div>
								</div>
							</div>

							<!-- Home address -->
							<div class="col-12">
								<div class="row g-xl-0">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Home address <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<textarea class="form-control" rows="3" placeholder=""></textarea>
									</div>
								</div>
							</div>

							<!-- Job title -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Job title <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="jobTitle">
									</div>
								</div>
							</div>

							<!-- Office phone number -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Office phone number</h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control">
									</div>
								</div>
							</div>

							<!-- Divider -->
							<hr class="my-5">

							<!-- Education -->
							<h5 class="mt-0">Education</h5>

							<!-- School or college name -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">School or college name <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="collegeName">
									</div>
								</div>
							</div>

							<!-- Year of passing -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Year of passing <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<select class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
											<option value="">Year</option>
											<option>1990</option>
											<option>1991</option>
											<option>1992</option>
											<option>1993</option>
											<option>1994</option>
											<option>1995</option>
											<option>1996</option>
											<option>1997</option>
											<option>1998</option>
											<option>1999</option>
											<option>2000</option>
											<option>2001</option>
											<option>2002</option>
											<option>2003</option>
											<option>2004</option>
											<option>2005</option>
										</select>
									</div>
								</div>
							</div>

							<!-- Board of university -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Board of university <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="board">
									</div>
								</div>
							</div>

							<!-- Class grad -->
							<div class="col-12">
								<div class="row g-xl-0 align-items-center">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">Class grad <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<select class="form-select js-choice z-index-9" aria-label=".form-select-sm">
											<option value="">Select grad</option>
											<option>Distinction</option>
											<option>First class</option>
											<option>Second class</option>
											<option>Third class</option>
										</select>
									</div>
								</div>
							</div>

							<!-- School or college address -->
							<div class="col-12">
								<div class="row g-xl-0">
									<div class="col-lg-4">
										<h6 class="mb-lg-0">School or college address <span class="text-danger">*</span></h6>
									</div>
									<div class="col-lg-8">
										<textarea class="form-control" rows="3" placeholder=""></textarea>
									</div>
								</div>
							</div>

							<!-- Button -->
							<div class="col-12 text-sm-end">
								<button class="btn btn-primary mb-0">Submit</button>
							</div>
						</form>
						<!-- Form END -->
					</div>
					<!-- Admission form END -->
				</div>
			</div>
		</section>
		<!-- =======================
Main part END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
Footer START -->
	<footer class="bg-light pt-5">
		<div class="container">
			<!-- Row START -->
			<div class="row g-4 justify-content-between">

				<!-- Widget 1 START -->
				<div class="col-md-5 col-lg-4">
					<!-- logo -->
					<a class="me-0" href="index.php">
						<img class="light-mode-item h-40px" src="assets/images/logo.svg" alt="logo">
						<img class="dark-mode-item h-40px" src="assets/images/logo-light.svg" alt="logo">
					</a>

					<p class="my-3">Eduport education theme, built specifically for the education centers which is dedicated to teaching and involve learners.</p>
					<!-- Newsletter -->
					<form class="row row-cols-lg-auto g-2">
						<div class="col-12">
							<input type="email" class="form-control" placeholder="Enter your email address">
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-dark m-0">Subscribe</button>
						</div>
					</form>
				</div>
				<!-- Widget 1 END -->

				<!-- Widget 2 START -->
				<div class="col-md-7 col-lg-6">
					<div class="row g-4 g-lg-5">
						<!-- Link block -->
						<div class="col-6 col-sm-4">
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link pt-0" href="#">Blog</a></li>
								<li class="nav-item"><a class="nav-link" href="#">About</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Contact us</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Documentation</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Sitemap</a></li>
							</ul>
						</div>

						<!-- Link block -->
						<div class="col-6 col-sm-4">
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link pt-0" href="#">Become instructor</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Download</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Services</a></li>
							</ul>
						</div>

						<!-- Link block -->
						<div class="col-6 col-sm-4">
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link pt-0" href="#"><i class="fab fa-facebook-square text-facebook me-2"></i>Facebook</a></li>
								<li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-instagram-square text-instagram-gradient me-2"></i>Instagram</a></li>
								<li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter-square text-twitter me-2"></i>Twitter</a></li>
								<li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-linkedin text-linkedin me-2"></i>Linkedin</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Widget 2 END -->

			</div><!-- Row END -->

			<hr> <!-- Divider -->

			<!-- Bottom footer -->
			<div class="row">
				<div class="col-12">
					<div class="d-md-flex justify-content-between align-items-center pt-2 pb-4 text-center">
						<!-- copyright text -->
						<div class="text-primary-hover"> Copyrights ©2024 Eduport. Build by <a href="https://1.envato.market/stackbros-portfolio" target="_blank" class="text-reset">StackBros</a>.</div>
						<!-- copyright links-->
						<div class="nav justify-content-center mt-3 mt-md-0">
							<ul class="list-inline mb-0">
								<li class="list-inline-item"><a class="nav-link" href="#">Terms of use</a></li>
								<li class="list-inline-item"><a class="nav-link" href="#">Privacy policy</a></li>
								<li class="list-inline-item pe-0"><a class="nav-link" href="#">Cookies</a></li>
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