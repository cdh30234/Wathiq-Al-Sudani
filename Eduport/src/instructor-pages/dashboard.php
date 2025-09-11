<?php 
// تضمين ملف التكوين
require_once '../api-config.php';

// الحصول على بيانات لوحة المعلومات
$dashboardData = getTeacherDashboardData();
$statistics = $dashboardData['statistics'];
$classes = $dashboardData['classes'];
$recent_lessons = $dashboardData['recent_lessons'];
$announcements = $dashboardData['announcements'];
?>

<!-- إحصائيات المدرس START -->
<div class="row g-4 mb-4">
	<!-- عدد الطلاب -->
	<div class="col-sm-6 col-lg-4">
		<div class="d-flex justify-content-center align-items-center p-4 bg-primary bg-opacity-15 rounded-3">
			<span class="display-6 text-primary mb-0"><i class="bi bi-people fa-fw"></i></span>
			<div class="ms-4">
				<div class="d-flex">
					<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?php echo $statistics['total_students']; ?>" data-purecounter-delay="200">0</h5>
				</div>
				<span class="mb-0 h6 fw-light">إجمالي الطلاب</span>
			</div>
		</div>
	</div>
	
	<!-- عدد الفصول -->
	<div class="col-sm-6 col-lg-4">
		<div class="d-flex justify-content-center align-items-center p-4 bg-success bg-opacity-15 rounded-3">
			<span class="display-6 text-success mb-0"><i class="bi bi-building fa-fw"></i></span>
			<div class="ms-4">
				<div class="d-flex">
					<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?php echo $statistics['total_classes']; ?>" data-purecounter-delay="200">0</h5>
				</div>
				<span class="mb-0 h6 fw-light">الفصول المُدرّسة</span>
			</div>
		</div>
	</div>
	
	<!-- عدد المواد -->
	<div class="col-sm-6 col-lg-4">
		<div class="d-flex justify-content-center align-items-center p-4 bg-info bg-opacity-15 rounded-3">
			<span class="display-6 text-info mb-0"><i class="bi bi-journals fa-fw"></i></span>
			<div class="ms-4">
				<div class="d-flex">
					<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?php echo $statistics['total_subjects']; ?>" data-purecounter-delay="200">0</h5>
				</div>
				<span class="mb-0 h6 fw-light">المواد المُدرّسة</span>
			</div>
		</div>
	</div>
</div>

<!-- إحصائيات إضافية START -->
<div class="row g-4 mb-4">
	<!-- إجمالي الدروس -->
	<div class="col-md-6 col-xxl-4">
		<div class="card card-body bg-warning bg-opacity-15 border border-warning border-opacity-25 p-4 h-100">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0"><?php echo $statistics['total_lessons']; ?></h4>
					<span class="h6 fw-light mb-0">معدل الحضور</span>
				</div>
				<div class="icon-lg bg-warning rounded-circle">
					<i class="bi bi-calendar-check text-white"></i>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6 col-xxl-4">
		<div class="card card-body bg-info bg-opacity-15 border border-info border-opacity-25 p-4 h-100">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0">87.5</h4>
					<span class="h6 fw-light mb-0">متوسط الدرجات</span>
				</div>
				<div class="icon-lg bg-info rounded-circle">
					<i class="bi bi-award text-white"></i>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6 col-xxl-4">
		<div class="card card-body bg-danger bg-opacity-15 border border-danger border-opacity-25 p-4 h-100">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0">5</h4>
					<span class="h6 fw-light mb-0">إعلانات جديدة</span>
				</div>
				<div class="icon-lg bg-danger rounded-circle">
					<i class="bi bi-megaphone text-white"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- إحصائيات إضافية END -->

<!-- رسم بياني للحضور START -->
<div class="row mt-4">
	<div class="col-12">
		<div class="card card-body bg-transparent border p-4">
			<div class="row g-4">
				<div class="col-sm-6 col-md-4">
					<span class="badge text-bg-dark">الشهر الحالي</span>
					<h4 class="text-primary my-2">95%</h4>
					<p class="mb-0"><span class="text-success me-1">2.1%<i class="bi bi-arrow-up"></i></span>مقارنة بالشهر الماضي</p>
				</div>
				<div class="col-sm-6 col-md-4">
					<span class="badge text-bg-dark">الشهر الماضي</span>
					<h4 class="my-2">89%</h4>
					<p class="mb-0"><span class="text-warning me-1">1.5%<i class="bi bi-arrow-down"></i></span>مقارنة بما قبله</p>
				</div>
				<div class="col-sm-6 col-md-4">
					<span class="badge text-bg-dark">المتوسط السنوي</span>
					<h4 class="my-2">91%</h4>
					<p class="mb-0"><span class="text-info me-1">ثابت</span>خلال العام</p>
				</div>
			</div>
			
			<!-- رسم بياني -->
			<div id="attendanceChart" style="height: 300px;"></div>
		</div>
	</div>
</div>
<!-- رسم بياني للحضور END -->

<!-- جدول الفصول START -->
<div class="row mt-4">
	<div class="col-12">
		<div class="card border bg-transparent rounded-3">
			<!-- Card header START -->
			<div class="card-header bg-transparent border-bottom">
				<div class="d-sm-flex justify-content-sm-between align-items-center">
					<h3 class="mb-2 mb-sm-0">الفصول والمواد</h3>
					<a href="#" class="btn btn-sm btn-primary-soft mb-0">عرض الكل</a>
				</div>
			</div>
			<!-- Card header END -->

			<!-- Card body START -->
			<div class="card-body">
				<div class="table-responsive border-0 rounded-3">
					<!-- Table START -->
					<table class="table table-dark-gray align-middle p-4 mb-0">
						<!-- Table head -->
						<thead>
							<tr>
								<th scope="col" class="border-0 rounded-start">اسم المادة</th>
								<th scope="col" class="border-0">الفصل</th>
								<th scope="col" class="border-0">عدد الطلاب</th>
								<th scope="col" class="border-0">نسبة الحضور</th>
								<th scope="col" class="border-0 rounded-end">الإجراءات</th>
							</tr>
						</thead>
						<!-- Table body START -->
						<tbody>
							<?php foreach ($classes as $class): ?>
							<!-- Table item -->
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="w-60px">
											<div class="bg-primary bg-opacity-10 text-primary rounded d-flex align-items-center justify-content-center" style="width:60px; height:40px;">
												<i class="bi bi-journals"></i>
											</div>
										</div>
										<h6 class="mb-0 ms-2 table-responsive-title">
											<a href="#"><?php echo $class['subject']; ?></a>
										</h6>
									</div>
								</td>
								<td><?php echo $class['name']; ?></td>
								<td><?php echo $class['student_count']; ?></td>
								<td>
									<div class="d-flex align-items-center">
										<span class="me-2"><?php echo rand(85, 98); ?>%</span>
										<div class="progress" style="width: 60px; height: 8px;">
											<div class="progress-bar bg-success" style="width: <?php echo rand(85, 98); ?>%"></div>
										</div>
									</div>
								</td>
								<td>
									<a href="#" class="btn btn-sm btn-success-soft btn-round me-1 mb-0" title="عرض التفاصيل"><i class="bi bi-eye"></i></a>
									<a href="#" class="btn btn-sm btn-primary-soft btn-round me-1 mb-0" title="تسجيل الحضور"><i class="bi bi-calendar-check"></i></a>
									<a href="#" class="btn btn-sm btn-warning-soft btn-round me-1 mb-0" title="إدخال الدرجات"><i class="bi bi-award"></i></a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- جدول الفصول END -->

<!-- المهام القادمة START -->
<div class="row mt-4">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">المهام القادمة</h5>
			</div>
			<div class="card-body">
				<div class="list-group list-group-flush">
					<div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
						<div>
							<h6 class="mb-1">تسليم درجات الرياضيات</h6>
							<small class="text-muted">الصف الخامس أ</small>
						</div>
						<span class="badge bg-warning">غداً</span>
					</div>
					<div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
						<div>
							<h6 class="mb-1">اجتماع أولياء الأمور</h6>
							<small class="text-muted">قاعة الاجتماعات</small>
						</div>
						<span class="badge bg-info">الخميس</span>
					</div>
					<div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
						<div>
							<h6 class="mb-1">تصحيح امتحان العلوم</h6>
							<small class="text-muted">الصف الخامس ب</small>
						</div>
						<span class="badge bg-primary">الأحد</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">آخر الأنشطة</h5>
			</div>
			<div class="card-body">
				<div class="list-group list-group-flush">
					<div class="list-group-item d-flex align-items-center border-0 px-0">
						<div class="avatar avatar-sm me-3">
							<div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
								<i class="bi bi-check text-white"></i>
							</div>
						</div>
						<div>
							<h6 class="mb-1">تم رفع درس جديد</h6>
							<small class="text-muted">منذ ساعتين</small>
						</div>
					</div>
					<div class="list-group-item d-flex align-items-center border-0 px-0">
						<div class="avatar avatar-sm me-3">
							<div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
								<i class="bi bi-person-plus text-white"></i>
							</div>
						</div>
						<div>
							<h6 class="mb-1">انضم طالب جديد</h6>
							<small class="text-muted">منذ 3 ساعات</small>
						</div>
					</div>
					<div class="list-group-item d-flex align-items-center border-0 px-0">
						<div class="avatar avatar-sm me-3">
							<div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
								<i class="bi bi-award text-white"></i>
							</div>
						</div>
						<div>
							<h6 class="mb-1">تم إدخال درجات جديدة</h6>
							<small class="text-muted">أمس</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- جدول الفصول END -->

<!-- الدروس الحديثة والإعلانات START -->
<div class="row mt-4">
	<!-- الدروس الحديثة -->
	<div class="col-lg-6">
		<div class="card border bg-transparent rounded-3">
			<div class="card-header bg-transparent border-bottom">
				<div class="d-sm-flex justify-content-sm-between align-items-center">
					<h5 class="mb-2 mb-sm-0">الدروس الحديثة</h5>
					<a href="#" class="btn btn-sm btn-primary-soft mb-0">عرض الكل</a>
				</div>
			</div>
			<div class="card-body">
				<?php foreach ($recent_lessons as $lesson): ?>
				<div class="d-flex align-items-center mb-3">
					<div class="flex-shrink-0">
						<div class="bg-primary bg-opacity-10 text-primary rounded p-2">
							<i class="bi bi-<?php echo $lesson['file_type'] === 'pdf' ? 'file-pdf' : ($lesson['file_type'] === 'ppt' ? 'file-slides' : 'play-circle'); ?>"></i>
						</div>
					</div>
					<div class="flex-grow-1 ms-3">
						<h6 class="mb-1"><?php echo $lesson['title']; ?></h6>
						<small class="text-muted"><?php echo $lesson['class']; ?> • <?php echo $lesson['created_at']; ?></small>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	
	<!-- الإعلانات -->
	<div class="col-lg-6">
		<div class="card border bg-transparent rounded-3">
			<div class="card-header bg-transparent border-bottom">
				<div class="d-sm-flex justify-content-sm-between align-items-center">
					<h5 class="mb-2 mb-sm-0">الإعلانات</h5>
					<a href="#" class="btn btn-sm btn-primary-soft mb-0">عرض الكل</a>
				</div>
			</div>
			<div class="card-body">
				<?php foreach ($announcements as $announcement): ?>
				<div class="d-flex align-items-start mb-3">
					<div class="flex-shrink-0">
						<div class="bg-<?php echo $announcement['type'] === 'important' ? 'danger' : ($announcement['type'] === 'exam' ? 'warning' : 'info'); ?> bg-opacity-10 text-<?php echo $announcement['type'] === 'important' ? 'danger' : ($announcement['type'] === 'exam' ? 'warning' : 'info'); ?> rounded p-2">
							<i class="bi bi-megaphone"></i>
						</div>
					</div>
					<div class="flex-grow-1 ms-3">
						<h6 class="mb-1"><?php echo $announcement['title']; ?></h6>
						<p class="small mb-1"><?php echo substr($announcement['content'], 0, 80) . '...'; ?></p>
						<small class="text-muted"><?php echo $announcement['created_at']; ?></small>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<!-- الدروس الحديثة والإعلانات END -->

<!-- مخطط الإحصائيات START -->
<div class="row mt-4">
	<div class="col-12">
		<div class="card border bg-transparent rounded-3">
			<div class="card-header bg-transparent border-bottom">
				<h5 class="mb-0">إحصائيات الحضور الشهرية</h5>
			</div>
			<div class="card-body">
				<div id="attendanceChart" style="height: 300px;"></div>
			</div>
		</div>
	</div>
</div>
<!-- مخطط الإحصائيات END -->

<script>
	// إعادة تفعيل العدادات عند تحميل المحتوى
	if (typeof PureCounter !== 'undefined') {
		new PureCounter();
	}
	
	// رسم بياني للحضور
	if (typeof ApexCharts !== 'undefined') {
		var attendanceOptions = {
			series: [{
				name: 'نسبة الحضور',
				data: [88, 92, 95, 89, 94, 91, 96, 93, 97, 92, 95, 90]
			}],
			chart: {
				type: 'line',
				height: 300,
				fontFamily: 'Cairo, Arial, sans-serif'
			},
			colors: ['#0066CC'],
			stroke: {
				curve: 'smooth',
				width: 3
			},
			xaxis: {
				categories: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر']
			},
			yaxis: {
				min: 80,
				max: 100,
				labels: {
					formatter: function(val) {
						return val + '%';
					}
				}
			},
			tooltip: {
				y: {
					formatter: function(val) {
						return val + '%';
					}
				}
			}
		};
		
		var attendanceChart = new ApexCharts(document.querySelector("#attendanceChart"), attendanceOptions);
		attendanceChart.render();
	}
</script>
