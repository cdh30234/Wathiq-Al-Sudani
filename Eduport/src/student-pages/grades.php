<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">النتائج والدرجات</h1>
	</div>
</div>

<!-- ملخص الدرجات START -->
<div class="row g-4 mb-4">
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<div class="icon-xl bg-success bg-opacity-10 rounded-circle mx-auto mb-3">
					<i class="bi bi-trophy text-success"></i>
				</div>
				<h4 class="text-success">88.5</h4>
				<p class="mb-0">المعدل العام</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<div class="icon-xl bg-primary bg-opacity-10 rounded-circle mx-auto mb-3">
					<i class="bi bi-award text-primary"></i>
				</div>
				<h4 class="text-primary">A</h4>
				<p class="mb-0">التقدير العام</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<div class="icon-xl bg-warning bg-opacity-10 rounded-circle mx-auto mb-3">
					<i class="bi bi-graph-up text-warning"></i>
				</div>
				<h4 class="text-warning">5</h4>
				<p class="mb-0">المواد المجتازة</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-body">
				<div class="icon-xl bg-info bg-opacity-10 rounded-circle mx-auto mb-3">
					<i class="bi bi-calendar3 text-info"></i>
				</div>
				<h4 class="text-info">3</h4>
				<p class="mb-0">الفصل الدراسي</p>
			</div>
		</div>
	</div>
</div>
<!-- ملخص الدرجات END -->

<!-- فلاتر النتائج START -->
<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">فلترة النتائج</h5>
	</div>
	<div class="card-body">
		<div class="row g-3">
			<div class="col-md-4">
				<label class="form-label">الفصل الدراسي</label>
				<select class="form-select">
					<option value="current">الفصل الحالي</option>
					<option value="1">الفصل الأول</option>
					<option value="2">الفصل الثاني</option>
					<option value="3">الفصل الثالث</option>
				</select>
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
			<div class="col-md-4">
				<label class="form-label">نوع التقييم</label>
				<select class="form-select">
					<option value="">جميع أنواع التقييم</option>
					<option value="exam">امتحانات</option>
					<option value="assignment">واجبات</option>
					<option value="project">مشاريع</option>
					<option value="participation">مشاركة</option>
				</select>
			</div>
		</div>
	</div>
</div>
<!-- فلاتر النتائج END -->

<!-- جدول الدرجات START -->
<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">درجات المواد</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="table-light">
					<tr>
						<th>المادة</th>
						<th>الامتحان النصفي</th>
						<th>الواجبات</th>
						<th>المشاركة</th>
						<th>الامتحان النهائي</th>
						<th>الدرجة النهائية</th>
						<th>التقدير</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-primary fw-bold">الرياضيات</td>
						<td>45/50</td>
						<td>18/20</td>
						<td>9/10</td>
						<td>72/80</td>
						<td><span class="badge bg-success fs-6">91/100</span></td>
						<td><span class="badge bg-success">A+</span></td>
					</tr>
					<tr>
						<td class="text-success fw-bold">الفيزياء</td>
						<td>42/50</td>
						<td>17/20</td>
						<td>8/10</td>
						<td>68/80</td>
						<td><span class="badge bg-success fs-6">87/100</span></td>
						<td><span class="badge bg-success">A</span></td>
					</tr>
					<tr>
						<td class="text-warning fw-bold">الكيمياء</td>
						<td>38/50</td>
						<td>16/20</td>
						<td>9/10</td>
						<td>65/80</td>
						<td><span class="badge bg-success fs-6">85/100</span></td>
						<td><span class="badge bg-success">A</span></td>
					</tr>
					<tr>
						<td class="text-info fw-bold">اللغة العربية</td>
						<td>44/50</td>
						<td>19/20</td>
						<td>10/10</td>
						<td>70/80</td>
						<td><span class="badge bg-success fs-6">92/100</span></td>
						<td><span class="badge bg-success">A+</span></td>
					</tr>
					<tr>
						<td class="text-danger fw-bold">التاريخ</td>
						<td>40/50</td>
						<td>15/20</td>
						<td>8/10</td>
						<td>62/80</td>
						<td><span class="badge bg-warning fs-6">78/100</span></td>
						<td><span class="badge bg-warning">B+</span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- جدول الدرجات END -->

<!-- تفاصيل التقييمات START -->
<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">تفاصيل التقييمات الأخيرة</h5>
	</div>
	<div class="card-body">
		<div class="row g-3">
			<!-- تقييم 1 -->
			<div class="col-md-6">
				<div class="card border-primary">
					<div class="card-header bg-primary bg-opacity-10">
						<h6 class="mb-0 text-primary">امتحان الرياضيات - الوحدة الثالثة</h6>
					</div>
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span>التاريخ:</span>
							<span>2024/09/10</span>
						</div>
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span>النوع:</span>
							<span class="badge bg-info">امتحان نصفي</span>
						</div>
						<div class="d-flex justify-content-between align-items-center">
							<span>الدرجة:</span>
							<span class="badge bg-success fs-6">23/25</span>
						</div>
					</div>
				</div>
			</div>

			<!-- تقييم 2 -->
			<div class="col-md-6">
				<div class="card border-success">
					<div class="card-header bg-success bg-opacity-10">
						<h6 class="mb-0 text-success">واجب الفيزياء - قوانين نيوتن</h6>
					</div>
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span>التاريخ:</span>
							<span>2024/09/08</span>
						</div>
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span>النوع:</span>
							<span class="badge bg-warning">واجب منزلي</span>
						</div>
						<div class="d-flex justify-content-between align-items-center">
							<span>الدرجة:</span>
							<span class="badge bg-success fs-6">9/10</span>
						</div>
					</div>
				</div>
			</div>

			<!-- تقييم 3 -->
			<div class="col-md-6">
				<div class="card border-warning">
					<div class="card-header bg-warning bg-opacity-10">
						<h6 class="mb-0 text-warning">مشروع الكيمياء - التفاعلات</h6>
					</div>
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span>التاريخ:</span>
							<span>2024/09/05</span>
						</div>
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span>النوع:</span>
							<span class="badge bg-primary">مشروع جماعي</span>
						</div>
						<div class="d-flex justify-content-between align-items-center">
							<span>الدرجة:</span>
							<span class="badge bg-success fs-6">17/20</span>
						</div>
					</div>
				</div>
			</div>

			<!-- تقييم 4 -->
			<div class="col-md-6">
				<div class="card border-info">
					<div class="card-header bg-info bg-opacity-10">
						<h6 class="mb-0 text-info">تقييم المشاركة - اللغة العربية</h6>
					</div>
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span>التاريخ:</span>
							<span>2024/09/03</span>
						</div>
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span>النوع:</span>
							<span class="badge bg-secondary">مشاركة صفية</span>
						</div>
						<div class="d-flex justify-content-between align-items-center">
							<span>الدرجة:</span>
							<span class="badge bg-success fs-6">5/5</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- تفاصيل التقييمات END -->

<!-- رسم بياني للأداء START -->
<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">الرسم البياني للأداء</h5>
	</div>
	<div class="card-body">
		<div id="gradesChart" style="height: 350px;"></div>
	</div>
</div>
<!-- رسم بياني للأداء END -->

<script>
	// رسم بياني للدرجات
	if (typeof ApexCharts !== 'undefined') {
		var gradesOptions = {
			series: [
				{
					name: 'الدرجات',
					data: [91, 87, 85, 92, 78]
				}
			],
			chart: {
				type: 'radar',
				height: 350,
				fontFamily: 'Cairo, Arial, sans-serif'
			},
			xaxis: {
				categories: ['الرياضيات', 'الفيزياء', 'الكيمياء', 'اللغة العربية', 'التاريخ']
			},
			yaxis: {
				min: 0,
				max: 100,
				labels: {
					formatter: function(val) {
						return val;
					}
				}
			},
			fill: {
				opacity: 0.2
			},
			stroke: {
				show: true,
				width: 2,
				colors: ['#28a745']
			},
			markers: {
				size: 6
			},
			colors: ['#28a745']
		};
		
		var gradesChart = new ApexCharts(document.querySelector("#gradesChart"), gradesOptions);
		gradesChart.render();
	}
</script>
