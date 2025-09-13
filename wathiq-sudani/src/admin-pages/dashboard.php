<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">لوحة التحكم</h1>
	</div>
</div>

<!-- Counter boxes START -->
<div class="row g-4 mb-4">
	<!-- Counter item -->
	<div class="col-md-6 col-xxl-3">
		<div class="card card-body bg-warning bg-opacity-15 p-4 h-100">
			<div class="d-flex justify-content-between align-items-center">
				<!-- Digit -->
				<div>
					<h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="156" data-purecounter-delay="200">0</h2>
					<span class="mb-0 h6 fw-light">إجمالي الطلاب</span>
				</div>
				<!-- Icon -->
				<div class="icon-lg rounded-circle bg-warning text-white mb-0"><i class="fas fa-user-graduate fa-fw"></i></div>
			</div>
		</div>
	</div>

	<!-- Counter item -->
	<div class="col-md-6 col-xxl-3">
		<div class="card card-body bg-purple bg-opacity-10 p-4 h-100">
			<div class="d-flex justify-content-between align-items-center">
				<!-- Digit -->
				<div>
					<h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="24" data-purecounter-delay="200">0</h2>
					<span class="mb-0 h6 fw-light">المعلمين</span>
				</div>
				<!-- Icon -->
				<div class="icon-lg rounded-circle bg-purple text-white mb-0"><i class="fas fa-user-tie fa-fw"></i></div>
			</div>
		</div>
	</div>

	<!-- Counter item -->
	<div class="col-md-6 col-xxl-3">
		<div class="card card-body bg-primary bg-opacity-10 p-4 h-100">
			<div class="d-flex justify-content-between align-items-center">
				<!-- Digit -->
				<div>
					<h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="12" data-purecounter-delay="200">0</h2>
					<span class="mb-0 h6 fw-light">المواد الدراسية</span>
				</div>
				<!-- Icon -->
				<div class="icon-lg rounded-circle bg-primary text-white mb-0"><i class="fas fa-book fa-fw"></i></div>
			</div>
		</div>
	</div>

	<!-- Counter item -->
	<div class="col-md-6 col-xxl-3">
		<div class="card card-body bg-success bg-opacity-10 p-4 h-100">
			<div class="d-flex justify-content-between align-items-center">
				<!-- Digit -->
				<div>
					<h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="8" data-purecounter-delay="200">0</h2>
					<span class="mb-0 h6 fw-light">الفصول الدراسية</span>
				</div>
				<!-- Icon -->
				<div class="icon-lg rounded-circle bg-success text-white mb-0"><i class="bi bi-building fa-fw"></i></div>
			</div>
		</div>
	</div>
</div>
<!-- Counter boxes END -->

<!-- Chart and Ticket START -->
<div class="row g-4 mb-4">

	<!-- Chart START -->
	<div class="col-xxl-8">
		<div class="card card-body h-100 p-4">

			<!-- Title -->
			<div class="d-flex justify-content-between align-items-center mb-4">
				<h5 class="card-title mb-0">إحصائيات الحضور الشهرية</h5>
				<!-- Dropdown button -->
				<div class="dropdown">
					<a href="#" class="btn btn-sm btn-outline-light rounded" id="dropdownShare3" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-three-dots fa-fw"></i>
					</a>
					<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare3">
						<li><a class="dropdown-item" href="#"><i class="bi bi-download fa-fw me-2"></i>تحميل</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-link fa-fw me-2"></i>نسخ الرابط</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-share fa-fw me-2"></i>مشاركة</a></li>
					</ul>
				</div>
			</div>

			<!-- Apex chart -->
			<div id="ChartPayout"></div>

		</div>
	</div>
	<!-- Chart END -->

	<!-- Ticket START -->
	<div class="col-xxl-4">
		<div class="card card-body h-100 p-4">

			<!-- Title -->
			<div class="d-flex justify-content-between align-items-center mb-4">
				<h5 class="card-title mb-0">آخر الإعلانات</h5>
				<a href="#" class="btn btn-sm btn-primary mb-0">عرض الكل</a>
			</div>

			<!-- Ticket item START -->
			<div class="d-flex justify-content-between position-relative">
				<div class="d-flex">
					<div class="icon-lg bg-orange bg-opacity-10 text-orange rounded-circle"><i class="bi bi-exclamation-triangle fa-fw"></i></div>
					<div class="ms-3">
						<p class="text-body small mb-1">منذ ساعتين</p>
						<h6 class="mb-0">إعلان هام: تأجيل الامتحان</h6>
					</div>
				</div>
				<div class="badge bg-danger bg-opacity-10 text-danger">عاجل</div>
			</div>

			<hr class="my-3">

			<!-- Ticket item START -->
			<div class="d-flex justify-content-between position-relative">
				<div class="d-flex">
					<div class="icon-lg bg-info bg-opacity-10 text-info rounded-circle"><i class="bi bi-info-circle fa-fw"></i></div>
					<div class="ms-3">
						<p class="text-body small mb-1">منذ 4 ساعات</p>
						<h6 class="mb-0">جدول الامتحانات النهائية</h6>
					</div>
				</div>
				<div class="badge bg-info bg-opacity-10 text-info">معلومات</div>
			</div>

			<hr class="my-3">

			<!-- Ticket item START -->
			<div class="d-flex justify-content-between position-relative">
				<div class="d-flex">
					<div class="icon-lg bg-success bg-opacity-10 text-success rounded-circle"><i class="bi bi-check-circle fa-fw"></i></div>
					<div class="ms-3">
						<p class="text-body small mb-1">أمس</p>
						<h6 class="mb-0">نتائج الامتحانات الشهرية</h6>
					</div>
				</div>
				<div class="badge bg-success bg-opacity-10 text-success">مكتمل</div>
			</div>

		</div>
	</div>
	<!-- Ticket END -->

</div>
<!-- Chart and Ticket END -->

<!-- Traffic sources START -->
<div class="row g-4">

	<!-- Active students START -->
	<div class="col-xxl-6">
		<div class="card card-body h-100">

			<!-- Title -->
			<div class="d-flex justify-content-between align-items-center mb-4">
				<h5 class="card-title mb-0">الطلاب النشطين</h5>
				<a href="#" class="btn btn-sm btn-primary mb-0">عرض الكل</a>
			</div>

			<!-- Table START -->
			<div class="table-responsive border-0">
				<table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
					<!-- Table head -->
					<thead>
						<tr>
							<th scope="col" class="border-0 rounded-start">اسم الطالب</th>
							<th scope="col" class="border-0">الفصل</th>
							<th scope="col" class="border-0">نسبة الحضور</th>
							<th scope="col" class="border-0 rounded-end">الحالة</th>
						</tr>
					</thead>

					<!-- Table body START -->
					<tbody>
						<!-- Table row -->
						<tr>
							<td>
								<div class="d-flex align-items-center position-relative">
									<div class="avatar avatar-xs mb-2 mb-md-0">
										<img src="assets/images/avatar/01.jpg" class="rounded-circle" alt="">
									</div>
									<h6 class="table-responsive-title mb-0 ms-2">أحمد محمد</h6>
								</div>
							</td>
							<td>السابع أ</td>
							<td>95%</td>
							<td><span class="badge bg-success bg-opacity-10 text-success">ممتاز</span></td>
						</tr>

						<!-- Table row -->
						<tr>
							<td>
								<div class="d-flex align-items-center position-relative">
									<div class="avatar avatar-xs mb-2 mb-md-0">
										<img src="assets/images/avatar/02.jpg" class="rounded-circle" alt="">
									</div>
									<h6 class="table-responsive-title mb-0 ms-2">فاطمة أحمد</h6>
								</div>
							</td>
							<td>الثامن ب</td>
							<td>88%</td>
							<td><span class="badge bg-info bg-opacity-10 text-info">جيد جداً</span></td>
						</tr>

						<!-- Table row -->
						<tr>
							<td>
								<div class="d-flex align-items-center position-relative">
									<div class="avatar avatar-xs mb-2 mb-md-0">
										<img src="assets/images/avatar/03.jpg" class="rounded-circle" alt="">
									</div>
									<h6 class="table-responsive-title mb-0 ms-2">محمد علي</h6>
								</div>
							</td>
							<td>التاسع أ</td>
							<td>92%</td>
							<td><span class="badge bg-success bg-opacity-10 text-success">ممتاز</span></td>
						</tr>

						<!-- Table row -->
						<tr>
							<td>
								<div class="d-flex align-items-center position-relative">
									<div class="avatar avatar-xs mb-2 mb-md-0">
										<img src="assets/images/avatar/04.jpg" class="rounded-circle" alt="">
									</div>
									<h6 class="table-responsive-title mb-0 ms-2">نور الهدى</h6>
								</div>
							</td>
							<td>السادس ب</td>
							<td>97%</td>
							<td><span class="badge bg-success bg-opacity-10 text-success">ممتاز</span></td>
						</tr>
					</tbody>
					<!-- Table body END -->
				</table>
			</div>
			<!-- Table END -->
		</div>
	</div>
	<!-- Active students END -->

	<!-- Recent activities START -->
	<div class="col-xxl-6">
		<div class="card card-body h-100">

			<!-- Title -->
			<div class="d-flex justify-content-between align-items-center mb-4">
				<h5 class="card-title mb-0">النشاطات الأخيرة</h5>
				<a href="#" class="btn btn-sm btn-primary mb-0">عرض الكل</a>
			</div>

			<!-- Activity item START -->
			<div class="d-flex justify-content-between">
				<div class="d-flex">
					<div class="icon-lg bg-purple bg-opacity-10 text-purple rounded-circle"><i class="bi bi-upload fa-fw"></i></div>
					<div class="ms-3">
						<h6 class="mb-0">تم رفع درس جديد</h6>
						<p class="text-body small mb-0">منذ 30 دقيقة</p>
					</div>
				</div>
			</div>

			<hr class="my-3">

			<!-- Activity item START -->
			<div class="d-flex justify-content-between">
				<div class="d-flex">
					<div class="icon-lg bg-success bg-opacity-10 text-success rounded-circle"><i class="bi bi-check-circle fa-fw"></i></div>
					<div class="ms-3">
						<h6 class="mb-0">تم تسجيل درجات امتحان الرياضيات</h6>
						<p class="text-body small mb-0">منذ ساعة</p>
					</div>
				</div>
			</div>

			<hr class="my-3">

			<!-- Activity item START -->
			<div class="d-flex justify-content-between">
				<div class="d-flex">
					<div class="icon-lg bg-info bg-opacity-10 text-info rounded-circle"><i class="bi bi-person-plus fa-fw"></i></div>
					<div class="ms-3">
						<h6 class="mb-0">تم تسجيل طالب جديد</h6>
						<p class="text-body small mb-0">منذ ساعتين</p>
					</div>
				</div>
			</div>

			<hr class="my-3">

			<!-- Activity item START -->
			<div class="d-flex justify-content-between">
				<div class="d-flex">
					<div class="icon-lg bg-warning bg-opacity-10 text-warning rounded-circle"><i class="bi bi-megaphone fa-fw"></i></div>
					<div class="ms-3">
						<h6 class="mb-0">تم نشر إعلان جديد</h6>
						<p class="text-body small mb-0">منذ 3 ساعات</p>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- Recent activities END -->

</div>
<!-- Traffic sources END -->

<script>
	// Initialize chart when content loads
	if (typeof ApexCharts !== 'undefined') {
		// Attendance Chart
		var options = {
			series: [{
				name: 'نسبة الحضور',
				data: [85, 92, 78, 88, 95, 89, 91, 87, 93, 90, 86, 94]
			}],
			chart: {
				type: 'area',
				height: 300,
				toolbar: {
					show: false
				}
			},
			colors: ['#0cbc87'],
			dataLabels: {
				enabled: false
			},
			stroke: {
				curve: 'smooth',
				width: 3
			},
			xaxis: {
				categories: ['يناير', 'فبراير', 'مارس', 'إبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر']
			},
			tooltip: {
				y: {
					formatter: function (val) {
						return val + "%"
					}
				}
			},
			fill: {
				type: 'gradient',
				gradient: {
					shadeIntensity: 1,
					opacityFrom: 0.4,
					opacityTo: 0.1,
				}
			}
		};

		var chart = new ApexCharts(document.querySelector("#ChartPayout"), options);
		chart.render();
	}

	// Initialize PureCounter
	if (typeof PureCounter !== 'undefined') {
		new PureCounter();
	}
</script>
