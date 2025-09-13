<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">التقارير والإحصائيات</h1>
	</div>
</div>

<!-- Report Types START -->
<div class="row g-4 mb-4">
	
	<!-- Attendance Report -->
	<div class="col-lg-3 col-md-6">
		<div class="card shadow text-center h-100">
			<div class="card-body">
				<div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-3">
					<i class="bi bi-calendar-check"></i>
				</div>
				<h5 class="card-title">تقرير الحضور</h5>
				<p class="card-text">إحصائيات شاملة عن حضور وغياب الطلاب</p>
				<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#attendanceReportModal">
					عرض التقرير
				</button>
			</div>
		</div>
	</div>

	<!-- Grades Report -->
	<div class="col-lg-3 col-md-6">
		<div class="card shadow text-center h-100">
			<div class="card-body">
				<div class="icon-lg bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-3">
					<i class="bi bi-graph-up"></i>
				</div>
				<h5 class="card-title">تقرير الدرجات</h5>
				<p class="card-text">تحليل شامل لأداء الطلاب الأكاديمي</p>
				<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#gradesReportModal">
					عرض التقرير
				</button>
			</div>
		</div>
	</div>

	<!-- Student Performance -->
	<div class="col-lg-3 col-md-6">
		<div class="card shadow text-center h-100">
			<div class="card-body">
				<div class="icon-lg bg-warning bg-opacity-10 text-warning rounded-circle mx-auto mb-3">
					<i class="bi bi-person-check"></i>
				</div>
				<h5 class="card-title">تقرير الأداء</h5>
				<p class="card-text">تقييم شامل لأداء الطلاب الفردي</p>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#performanceReportModal">
					عرض التقرير
				</button>
			</div>
		</div>
	</div>

	<!-- Financial Report -->
	<div class="col-lg-3 col-md-6">
		<div class="card shadow text-center h-100">
			<div class="card-body">
				<div class="icon-lg bg-info bg-opacity-10 text-info rounded-circle mx-auto mb-3">
					<i class="bi bi-cash-stack"></i>
				</div>
				<h5 class="card-title">التقرير المالي</h5>
				<p class="card-text">إحصائيات الرسوم والمدفوعات</p>
				<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#financialReportModal">
					عرض التقرير
				</button>
			</div>
		</div>
	</div>

</div>
<!-- Report Types END -->

<!-- Quick Stats START -->
<div class="row g-4 mb-4">
	<div class="col-12">
		<div class="card shadow">
			<div class="card-header">
				<h5 class="card-title mb-0">نظرة عامة سريعة</h5>
			</div>
			<div class="card-body">
				<div class="row g-4 text-center">
					<div class="col-md-2">
						<div class="bg-primary bg-opacity-10 rounded p-3">
							<h3 class="text-primary mb-1">156</h3>
							<p class="mb-0 small">إجمالي الطلاب</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="bg-success bg-opacity-10 rounded p-3">
							<h3 class="text-success mb-1">87%</h3>
							<p class="mb-0 small">معدل الحضور</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="bg-info bg-opacity-10 rounded p-3">
							<h3 class="text-info mb-1">82%</h3>
							<p class="mb-0 small">متوسط الدرجات</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="bg-warning bg-opacity-10 rounded p-3">
							<h3 class="text-warning mb-1">24</h3>
							<p class="mb-0 small">المعلمون</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="bg-purple bg-opacity-10 rounded p-3">
							<h3 class="text-purple mb-1">12</h3>
							<p class="mb-0 small">المواد الدراسية</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="bg-danger bg-opacity-10 rounded p-3">
							<h3 class="text-danger mb-1">8</h3>
							<p class="mb-0 small">الفصول</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Quick Stats END -->

<!-- Charts Section START -->
<div class="row g-4">
	
	<!-- Attendance Chart -->
	<div class="col-xl-8">
		<div class="card shadow">
			<div class="card-header">
				<h5 class="card-title mb-0">إحصائيات الحضور الشهرية</h5>
			</div>
			<div class="card-body">
				<div id="attendanceChart"></div>
			</div>
		</div>
	</div>

	<!-- Grade Distribution -->
	<div class="col-xl-4">
		<div class="card shadow">
			<div class="card-header">
				<h5 class="card-title mb-0">توزيع الدرجات</h5>
			</div>
			<div class="card-body">
				<div id="gradeDistributionChart"></div>
			</div>
		</div>
	</div>

	<!-- Recent Activities -->
	<div class="col-12">
		<div class="card shadow">
			<div class="card-header">
				<h5 class="card-title mb-0">النشاطات الأخيرة</h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>النشاط</th>
								<th>المستخدم</th>
								<th>التاريخ</th>
								<th>التفاصيل</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><i class="bi bi-upload text-primary me-2"></i>رفع درس جديد</td>
								<td>أحمد المعلم</td>
								<td>منذ 30 دقيقة</td>
								<td>درس الجبر - الرياضيات</td>
							</tr>
							<tr>
								<td><i class="bi bi-check-circle text-success me-2"></i>تسجيل الحضور</td>
								<td>فاطمة المعلمة</td>
								<td>منذ ساعة</td>
								<td>الصف السابع أ - العلوم</td>
							</tr>
							<tr>
								<td><i class="bi bi-graph-up text-info me-2"></i>إدخال الدرجات</td>
								<td>محمد المعلم</td>
								<td>منذ ساعتين</td>
								<td>امتحان شهري - اللغة العربية</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- Charts Section END -->

<!-- Attendance Report Modal -->
<div class="modal fade" id="attendanceReportModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">تقرير الحضور المفصل</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<div class="row g-3 mb-4">
					<div class="col-md-3">
						<label class="form-label">من تاريخ</label>
						<input type="date" class="form-control">
					</div>
					<div class="col-md-3">
						<label class="form-label">إلى تاريخ</label>
						<input type="date" class="form-control">
					</div>
					<div class="col-md-3">
						<label class="form-label">الفصل</label>
						<select class="form-select">
							<option>جميع الفصول</option>
							<option>السابع أ</option>
							<option>السابع ب</option>
						</select>
					</div>
					<div class="col-md-3 d-flex align-items-end">
						<button class="btn btn-primary w-100">تحديث التقرير</button>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>الطالب</th>
								<th>أيام الحضور</th>
								<th>أيام الغياب</th>
								<th>النسبة المئوية</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>أحمد محمد</td>
								<td class="text-success">18</td>
								<td class="text-danger">2</td>
								<td><span class="badge bg-success">90%</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
				<button type="button" class="btn btn-primary">تصدير PDF</button>
			</div>
		</div>
	</div>
</div>

<script>
// Initialize charts when page loads
document.addEventListener('DOMContentLoaded', function() {
    if (typeof ApexCharts !== 'undefined') {
        // Attendance Chart
        var attendanceOptions = {
            series: [{
                name: 'معدل الحضور',
                data: [85, 92, 78, 88, 95, 89, 91, 87, 93, 90, 86, 94]
            }],
            chart: {
                type: 'line',
                height: 300
            },
            colors: ['#0cbc87'],
            xaxis: {
                categories: ['يناير', 'فبراير', 'مارس', 'إبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر']
            }
        };
        new ApexCharts(document.querySelector("#attendanceChart"), attendanceOptions).render();

        // Grade Distribution Chart
        var gradeOptions = {
            series: [44, 55, 13, 33],
            chart: {
                type: 'donut',
                height: 300
            },
            labels: ['ممتاز', 'جيد جداً', 'جيد', 'مقبول'],
            colors: ['#28a745', '#17a2b8', '#ffc107', '#fd7e14'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };
        new ApexCharts(document.querySelector("#gradeDistributionChart"), gradeOptions).render();
    }
});
</script>
