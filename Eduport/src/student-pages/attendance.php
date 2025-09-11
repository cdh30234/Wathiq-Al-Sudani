<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">الحضور والغياب</h1>
	</div>
</div>

<!-- إحصائيات الحضور START -->
<div class="row g-4 mb-4">
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<div class="icon-xl bg-success bg-opacity-10 rounded-circle mx-auto mb-3">
					<i class="bi bi-check-circle text-success"></i>
				</div>
				<h4 class="text-success">85%</h4>
				<p class="mb-0">نسبة الحضور العامة</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<div class="icon-xl bg-primary bg-opacity-10 rounded-circle mx-auto mb-3">
					<i class="bi bi-calendar-check text-primary"></i>
				</div>
				<h4 class="text-primary">68</h4>
				<p class="mb-0">أيام الحضور</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<div class="icon-xl bg-warning bg-opacity-10 rounded-circle mx-auto mb-3">
					<i class="bi bi-x-circle text-warning"></i>
				</div>
				<h4 class="text-warning">12</h4>
				<p class="mb-0">أيام الغياب</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<div class="icon-xl bg-info bg-opacity-10 rounded-circle mx-auto mb-3">
					<i class="bi bi-clock text-info"></i>
				</div>
				<h4 class="text-info">5</h4>
				<p class="mb-0">حالات التأخير</p>
			</div>
		</div>
	</div>
</div>
<!-- إحصائيات الحضور END -->

<!-- فلاتر التاريخ START -->
<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">فلترة حسب التاريخ</h5>
	</div>
	<div class="card-body">
		<div class="row g-3">
			<div class="col-md-4">
				<label class="form-label">من تاريخ</label>
				<input type="date" class="form-control" value="2024-09-01">
			</div>
			<div class="col-md-4">
				<label class="form-label">إلى تاريخ</label>
				<input type="date" class="form-control" value="2024-09-30">
			</div>
			<div class="col-md-4">
				<label class="form-label">المادة</label>
				<select class="form-select">
					<option value="">جميع المواد</option>
					<option value="math">الرياضيات</option>
					<option value="physics">الفيزياء</option>
					<option value="chemistry">الكيمياء</option>
					<option value="arabic">اللغة العربية</option>
					<option value="history">التاريخ</option>
				</select>
			</div>
		</div>
	</div>
</div>
<!-- فلاتر التاريخ END -->

<!-- جدول الحضور START -->
<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">سجل الحضور والغياب</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="table-light">
					<tr>
						<th>التاريخ</th>
						<th>اليوم</th>
						<th>المادة</th>
						<th>الوقت</th>
						<th>الحالة</th>
						<th>الملاحظات</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>2024/09/15</td>
						<td>الأحد</td>
						<td class="text-primary fw-bold">الرياضيات</td>
						<td>08:00 صباحاً</td>
						<td><span class="badge bg-success">حاضر</span></td>
						<td>-</td>
					</tr>
					<tr>
						<td>2024/09/15</td>
						<td>الأحد</td>
						<td class="text-success fw-bold">الفيزياء</td>
						<td>09:00 صباحاً</td>
						<td><span class="badge bg-success">حاضر</span></td>
						<td>-</td>
					</tr>
					<tr>
						<td>2024/09/15</td>
						<td>الأحد</td>
						<td class="text-warning fw-bold">الكيمياء</td>
						<td>10:00 صباحاً</td>
						<td><span class="badge bg-warning">متأخر</span></td>
						<td>تأخر 15 دقيقة</td>
					</tr>
					<tr>
						<td>2024/09/14</td>
						<td>السبت</td>
						<td class="text-info fw-bold">اللغة العربية</td>
						<td>08:00 صباحاً</td>
						<td><span class="badge bg-success">حاضر</span></td>
						<td>-</td>
					</tr>
					<tr>
						<td>2024/09/14</td>
						<td>السبت</td>
						<td class="text-danger fw-bold">التاريخ</td>
						<td>09:00 صباحاً</td>
						<td><span class="badge bg-danger">غائب</span></td>
						<td>غياب بعذر</td>
					</tr>
					<tr>
						<td>2024/09/13</td>
						<td>الجمعة</td>
						<td class="text-primary fw-bold">الرياضيات</td>
						<td>08:00 صباحاً</td>
						<td><span class="badge bg-success">حاضر</span></td>
						<td>-</td>
					</tr>
					<tr>
						<td>2024/09/13</td>
						<td>الجمعة</td>
						<td class="text-success fw-bold">الفيزياء</td>
						<td>09:00 صباحاً</td>
						<td><span class="badge bg-success">حاضر</span></td>
						<td>-</td>
					</tr>
					<tr>
						<td>2024/09/12</td>
						<td>الخميس</td>
						<td class="text-warning fw-bold">الكيمياء</td>
						<td>10:00 صباحاً</td>
						<td><span class="badge bg-success">حاضر</span></td>
						<td>-</td>
					</tr>
					<tr>
						<td>2024/09/12</td>
						<td>الخميس</td>
						<td class="text-info fw-bold">اللغة العربية</td>
						<td>11:00 صباحاً</td>
						<td><span class="badge bg-warning">متأخر</span></td>
						<td>تأخر 10 دقائق</td>
					</tr>
					<tr>
						<td>2024/09/11</td>
						<td>الأربعاء</td>
						<td class="text-danger fw-bold">التاريخ</td>
						<td>08:00 صباحاً</td>
						<td><span class="badge bg-danger">غائب</span></td>
						<td>غياب بدون عذر</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- جدول الحضور END -->

<!-- رسم بياني للحضور START -->
<div class="card mt-4">
	<div class="card-header">
		<h5 class="card-title mb-0">الرسم البياني للحضور الشهري</h5>
	</div>
	<div class="card-body">
		<div id="attendanceChart" style="height: 300px;"></div>
	</div>
</div>
<!-- رسم بياني للحضور END -->

<script>
	// رسم بياني للحضور
	if (typeof ApexCharts !== 'undefined') {
		var attendanceOptions = {
			series: [{
				name: 'نسبة الحضور',
				data: [95, 87, 92, 88, 85, 90, 93, 86, 91, 89, 94, 88]
			}],
			chart: {
				type: 'line',
				height: 300,
				fontFamily: 'Cairo, Arial, sans-serif',
				toolbar: {
					show: false
				}
			},
			colors: ['#28a745'],
			stroke: {
				curve: 'smooth',
				width: 3
			},
			xaxis: {
				categories: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر']
			},
			yaxis: {
				labels: {
					formatter: function(val) {
						return val + '%';
					}
				}
			},
			grid: {
				borderColor: '#e7e7e7',
				strokeDashArray: 3
			},
			markers: {
				size: 6,
				colors: ['#28a745'],
				strokeColors: '#fff',
				strokeWidth: 2
			}
		};
		
		var attendanceChart = new ApexCharts(document.querySelector("#attendanceChart"), attendanceOptions);
		attendanceChart.render();
	}
</script>
