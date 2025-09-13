<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">التقارير والإحصائيات</h1>
	</div>
</div>

<!-- فلاتر التقارير START -->
<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">إعدادات التقرير</h5>
	</div>
	<div class="card-body">
		<div class="row g-3">
			<div class="col-md-3">
				<label class="form-label">نوع التقرير</label>
				<select class="form-select">
					<option value="attendance">تقرير الحضور</option>
					<option value="grades">تقرير الدرجات</option>
					<option value="performance">تقرير الأداء</option>
					<option value="behavior">تقرير السلوك</option>
				</select>
			</div>
			<div class="col-md-3">
				<label class="form-label">الفترة الزمنية</label>
				<select class="form-select">
					<option value="week">الأسبوع الحالي</option>
					<option value="month">الشهر الحالي</option>
					<option value="semester">الفصل الدراسي</option>
					<option value="year">العام الدراسي</option>
				</select>
			</div>
			<div class="col-md-3">
				<label class="form-label">الفصل</label>
				<select class="form-select">
					<option value="">جميع الفصول</option>
					<option value="5a">الصف الخامس أ</option>
					<option value="5b">الصف الخامس ب</option>
					<option value="6a">الصف السادس أ</option>
				</select>
			</div>
			<div class="col-md-3">
				<label class="form-label">&nbsp;</label>
				<button class="btn btn-primary w-100">
					<i class="bi bi-bar-chart me-2"></i>إنشاء التقرير
				</button>
			</div>
		</div>
	</div>
</div>
<!-- فلاتر التقارير END -->

<!-- رسوم بيانية START -->
<div class="row g-4 mb-4">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title mb-0">نسب الحضور الشهرية</h6>
			</div>
			<div class="card-body">
				<div id="attendanceChart" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title mb-0">توزيع الدرجات</h6>
			</div>
			<div class="card-body">
				<div id="gradesChart" style="height: 300px;"></div>
			</div>
		</div>
	</div>
</div>
<!-- رسوم بيانية END -->

<!-- تقارير سريعة START -->
<div class="row g-4 mb-4">
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<i class="bi bi-calendar-check display-4 text-primary mb-3"></i>
				<h5 class="card-title">تقرير الحضور</h5>
				<p class="card-text small">تقرير شامل عن حضور وغياب الطلاب</p>
				<button class="btn btn-outline-primary btn-sm">تحميل PDF</button>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<i class="bi bi-award display-4 text-success mb-3"></i>
				<h5 class="card-title">تقرير الدرجات</h5>
				<p class="card-text small">ملخص درجات الطلاب والمتوسطات</p>
				<button class="btn btn-outline-success btn-sm">تحميل PDF</button>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<i class="bi bi-graph-up display-4 text-info mb-3"></i>
				<h5 class="card-title">تقرير الأداء</h5>
				<p class="card-text small">تحليل أداء الطلاب والتطور</p>
				<button class="btn btn-outline-info btn-sm">تحميل PDF</button>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<i class="bi bi-person-check display-4 text-warning mb-3"></i>
				<h5 class="card-title">تقرير السلوك</h5>
				<p class="card-text small">تقييم السلوك والمشاركة</p>
				<button class="btn btn-outline-warning btn-sm">تحميل PDF</button>
			</div>
		</div>
	</div>
</div>
<!-- تقارير سريعة END -->

<!-- جدول تفصيلي START -->
<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">تقرير تفصيلي - الصف الخامس أ</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>الطالب</th>
						<th>نسبة الحضور</th>
						<th>متوسط الدرجات</th>
						<th>عدد الواجبات المكتملة</th>
						<th>التقدير العام</th>
						<th>الملاحظات</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<div class="d-flex align-items-center">
								<img src="assets/images/avatar/01.jpg" class="rounded-circle me-2" width="30" height="30" alt="">
								أحمد محمد علي
							</div>
						</td>
						<td>
							<div class="d-flex align-items-center">
								<span class="me-2">95%</span>
								<div class="progress" style="width: 80px; height: 6px;">
									<div class="progress-bar bg-success" style="width: 95%"></div>
								</div>
							</div>
						</td>
						<td><span class="badge bg-success">92.5</span></td>
						<td>8/8</td>
						<td><span class="badge bg-success">ممتاز</span></td>
						<td>طالب متفوق ومتفاعل</td>
					</tr>
					<tr>
						<td>
							<div class="d-flex align-items-center">
								<img src="assets/images/avatar/02.jpg" class="rounded-circle me-2" width="30" height="30" alt="">
								فاطمة أحمد محمد
							</div>
						</td>
						<td>
							<div class="d-flex align-items-center">
								<span class="me-2">88%</span>
								<div class="progress" style="width: 80px; height: 6px;">
									<div class="progress-bar bg-warning" style="width: 88%"></div>
								</div>
							</div>
						</td>
						<td><span class="badge bg-success">89.0</span></td>
						<td>7/8</td>
						<td><span class="badge bg-success">جيد جداً</span></td>
						<td>تحتاج تحسين الحضور</td>
					</tr>
					<tr>
						<td>
							<div class="d-flex align-items-center">
								<img src="assets/images/avatar/03.jpg" class="rounded-circle me-2" width="30" height="30" alt="">
								محمد سارة خالد
							</div>
						</td>
						<td>
							<div class="d-flex align-items-center">
								<span class="me-2">76%</span>
								<div class="progress" style="width: 80px; height: 6px;">
									<div class="progress-bar bg-danger" style="width: 76%"></div>
								</div>
							</div>
						</td>
						<td><span class="badge bg-warning">68.0</span></td>
						<td>5/8</td>
						<td><span class="badge bg-warning">مقبول</span></td>
						<td>يحتاج متابعة إضافية</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- جدول تفصيلي END -->

<script>
	// رسوم بيانية
	if (typeof ApexCharts !== 'undefined') {
		// رسم بياني للحضور
		var attendanceOptions = {
			series: [{
				name: 'نسبة الحضور',
				data: [92, 88, 95, 89, 94, 91, 96]
			}],
			chart: {
				type: 'bar',
				height: 300,
				fontFamily: 'Cairo, Arial, sans-serif'
			},
			colors: ['#0066CC'],
			xaxis: {
				categories: ['السبت', 'الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة']
			},
			yaxis: {
				labels: {
					formatter: function(val) {
						return val + '%';
					}
				}
			}
		};
		
		var attendanceChart = new ApexCharts(document.querySelector("#attendanceChart"), attendanceOptions);
		attendanceChart.render();
		
		// رسم بياني للدرجات
		var gradesOptions = {
			series: [25, 45, 20, 10],
			chart: {
				type: 'pie',
				height: 300,
				fontFamily: 'Cairo, Arial, sans-serif'
			},
			labels: ['ممتاز (90-100)', 'جيد جداً (80-89)', 'جيد (70-79)', 'مقبول (60-69)'],
			colors: ['#28a745', '#007bff', '#ffc107', '#dc3545'],
			legend: {
				position: 'bottom'
			}
		};
		
		var gradesChart = new ApexCharts(document.querySelector("#gradesChart"), gradesOptions);
		gradesChart.render();
	}
</script>
