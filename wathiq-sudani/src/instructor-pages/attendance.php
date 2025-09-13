<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">تسجيل الحضور والغياب</h1>
	</div>
</div>

<!-- إعدادات الحضور START -->
<div class="row g-4 mb-4">
	<div class="col-md-3">
		<label class="form-label">التاريخ</label>
		<input type="date" class="form-control" value="2025-09-10">
	</div>
	<div class="col-md-3">
		<label class="form-label">الفصل</label>
		<select class="form-select" id="classSelect">
			<option value="">اختر الفصل</option>
			<option value="5a" selected>الصف الخامس أ</option>
			<option value="5b">الصف الخامس ب</option>
			<option value="6a">الصف السادس أ</option>
		</select>
	</div>
	<div class="col-md-3">
		<label class="form-label">المادة</label>
		<select class="form-select">
			<option value="">اختر المادة</option>
			<option value="math" selected>الرياضيات</option>
			<option value="science">العلوم</option>
			<option value="geography">الجغرافيا</option>
		</select>
	</div>
	<div class="col-md-3">
		<label class="form-label">الحصة</label>
		<select class="form-select">
			<option value="">اختر الحصة</option>
			<option value="1" selected>الحصة الأولى</option>
			<option value="2">الحصة الثانية</option>
			<option value="3">الحصة الثالثة</option>
			<option value="4">الحصة الرابعة</option>
		</select>
	</div>
</div>
<!-- إعدادات الحضور END -->

<!-- إحصائيات سريعة START -->
<div class="row g-4 mb-4">
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-primary bg-opacity-10 border border-primary border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-primary" id="totalStudents">32</h4>
					<span class="h6 fw-light mb-0">إجمالي الطلاب</span>
				</div>
				<div class="icon-lg bg-primary rounded-circle">
					<i class="bi bi-people text-white"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-success bg-opacity-10 border border-success border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-success" id="presentStudents">29</h4>
					<span class="h6 fw-light mb-0">حاضرون</span>
				</div>
				<div class="icon-lg bg-success rounded-circle">
					<i class="bi bi-check-circle text-white"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-danger bg-opacity-10 border border-danger border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-danger" id="absentStudents">3</h4>
					<span class="h6 fw-light mb-0">غائبون</span>
				</div>
				<div class="icon-lg bg-danger rounded-circle">
					<i class="bi bi-x-circle text-white"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-warning bg-opacity-10 border border-warning border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-warning" id="attendanceRate">91%</h4>
					<span class="h6 fw-light mb-0">نسبة الحضور</span>
				</div>
				<div class="icon-lg bg-warning rounded-circle">
					<i class="bi bi-percent text-white"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- إحصائيات سريعة END -->

<!-- أدوات سريعة START -->
<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">إجراءات سريعة</h5>
	</div>
	<div class="card-body">
		<div class="row g-3">
			<div class="col-auto">
				<button class="btn btn-success" onclick="markAllPresent()">
					<i class="bi bi-check-all me-2"></i>تحديد الكل حاضر
				</button>
			</div>
			<div class="col-auto">
				<button class="btn btn-danger" onclick="markAllAbsent()">
					<i class="bi bi-x-octagon me-2"></i>تحديد الكل غائب
				</button>
			</div>
			<div class="col-auto">
				<button class="btn btn-primary" onclick="saveAttendance()">
					<i class="bi bi-save me-2"></i>حفظ الحضور
				</button>
			</div>
			<div class="col-auto">
				<button class="btn btn-outline-primary" onclick="sendNotifications()">
					<i class="bi bi-envelope me-2"></i>إرسال إشعارات للأولياء
				</button>
			</div>
			<div class="col-auto">
				<button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#attendanceHistoryModal">
					<i class="bi bi-clock-history me-2"></i>سجل الحضور
				</button>
			</div>
		</div>
	</div>
</div>
<!-- أدوات سريعة END -->

<!-- قائمة الطلاب للحضور START -->
<div class="card shadow">
	<div class="card-header border-bottom">
		<h5 class="card-title mb-0">قائمة حضور الطلاب - الصف الخامس أ</h5>
	</div>
	<div class="card-body">
		<div class="row g-3" id="studentsAttendanceList">
			<!-- Student Card 1 -->
			<div class="col-md-6 col-lg-4">
				<div class="card border student-card" data-student-id="1">
					<div class="card-body">
						<div class="d-flex align-items-center mb-3">
							<img src="assets/images/avatar/01.jpg" class="rounded-circle me-3" width="50" height="50" alt="">
							<div>
								<h6 class="mb-1">أحمد محمد علي</h6>
								<small class="text-muted">2024001</small>
							</div>
						</div>
						<div class="d-flex gap-2">
							<button class="btn btn-success btn-sm flex-fill attendance-btn" data-status="present">
								<i class="bi bi-check-circle me-1"></i>حاضر
							</button>
							<button class="btn btn-outline-danger btn-sm flex-fill attendance-btn" data-status="absent">
								<i class="bi bi-x-circle me-1"></i>غائب
							</button>
						</div>
						<div class="mt-2">
							<small class="text-muted">آخر حضور: أمس</small>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Student Card 2 -->
			<div class="col-md-6 col-lg-4">
				<div class="card border student-card" data-student-id="2">
					<div class="card-body">
						<div class="d-flex align-items-center mb-3">
							<img src="assets/images/avatar/02.jpg" class="rounded-circle me-3" width="50" height="50" alt="">
							<div>
								<h6 class="mb-1">فاطمة أحمد محمد</h6>
								<small class="text-muted">2024002</small>
							</div>
						</div>
						<div class="d-flex gap-2">
							<button class="btn btn-success btn-sm flex-fill attendance-btn active" data-status="present">
								<i class="bi bi-check-circle me-1"></i>حاضر
							</button>
							<button class="btn btn-outline-danger btn-sm flex-fill attendance-btn" data-status="absent">
								<i class="bi bi-x-circle me-1"></i>غائب
							</button>
						</div>
						<div class="mt-2">
							<small class="text-muted">آخر حضور: اليوم</small>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Student Card 3 -->
			<div class="col-md-6 col-lg-4">
				<div class="card border student-card" data-student-id="3">
					<div class="card-body">
						<div class="d-flex align-items-center mb-3">
							<img src="assets/images/avatar/03.jpg" class="rounded-circle me-3" width="50" height="50" alt="">
							<div>
								<h6 class="mb-1">محمد سارة خالد</h6>
								<small class="text-muted">2024003</small>
							</div>
						</div>
						<div class="d-flex gap-2">
							<button class="btn btn-outline-success btn-sm flex-fill attendance-btn" data-status="present">
								<i class="bi bi-check-circle me-1"></i>حاضر
							</button>
							<button class="btn btn-danger btn-sm flex-fill attendance-btn active" data-status="absent">
								<i class="bi bi-x-circle me-1"></i>غائب
							</button>
						</div>
						<div class="mt-2">
							<small class="text-muted">آخر حضور: أول أمس</small>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Student Card 4 -->
			<div class="col-md-6 col-lg-4">
				<div class="card border student-card" data-student-id="4">
					<div class="card-body">
						<div class="d-flex align-items-center mb-3">
							<img src="assets/images/avatar/04.jpg" class="rounded-circle me-3" width="50" height="50" alt="">
							<div>
								<h6 class="mb-1">نورا عبدالله أحمد</h6>
								<small class="text-muted">2024004</small>
							</div>
						</div>
						<div class="d-flex gap-2">
							<button class="btn btn-success btn-sm flex-fill attendance-btn active" data-status="present">
								<i class="bi bi-check-circle me-1"></i>حاضر
							</button>
							<button class="btn btn-outline-danger btn-sm flex-fill attendance-btn" data-status="absent">
								<i class="bi bi-x-circle me-1"></i>غائب
							</button>
						</div>
						<div class="mt-2">
							<small class="text-muted">آخر حضور: اليوم</small>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Student Card 5 -->
			<div class="col-md-6 col-lg-4">
				<div class="card border student-card" data-student-id="5">
					<div class="card-body">
						<div class="d-flex align-items-center mb-3">
							<img src="assets/images/avatar/05.jpg" class="rounded-circle me-3" width="50" height="50" alt="">
							<div>
								<h6 class="mb-1">خالد محمود أحمد</h6>
								<small class="text-muted">2024005</small>
							</div>
						</div>
						<div class="d-flex gap-2">
							<button class="btn btn-success btn-sm flex-fill attendance-btn active" data-status="present">
								<i class="bi bi-check-circle me-1"></i>حاضر
							</button>
							<button class="btn btn-outline-danger btn-sm flex-fill attendance-btn" data-status="absent">
								<i class="bi bi-x-circle me-1"></i>غائب
							</button>
						</div>
						<div class="mt-2">
							<small class="text-muted">آخر حضور: اليوم</small>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Student Card 6 -->
			<div class="col-md-6 col-lg-4">
				<div class="card border student-card" data-student-id="6">
					<div class="card-body">
						<div class="d-flex align-items-center mb-3">
							<img src="assets/images/avatar/06.jpg" class="rounded-circle me-3" width="50" height="50" alt="">
							<div>
								<h6 class="mb-1">سارة علي محمد</h6>
								<small class="text-muted">2024006</small>
							</div>
						</div>
						<div class="d-flex gap-2">
							<button class="btn btn-outline-success btn-sm flex-fill attendance-btn" data-status="present">
								<i class="bi bi-check-circle me-1"></i>حاضر
							</button>
							<button class="btn btn-danger btn-sm flex-fill attendance-btn active" data-status="absent">
								<i class="bi bi-x-circle me-1"></i>غائب
							</button>
						</div>
						<div class="mt-2">
							<small class="text-muted">آخر حضور: قبل 3 أيام</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- قائمة الطلاب للحضور END -->

<!-- Modal سجل الحضور -->
<div class="modal fade" id="attendanceHistoryModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">سجل الحضور - الصف الخامس أ</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>التاريخ</th>
								<th>الطالب</th>
								<th>الحالة</th>
								<th>المادة</th>
								<th>الحصة</th>
								<th>ملاحظات</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>2025-09-09</td>
								<td>أحمد محمد علي</td>
								<td><span class="badge bg-success">حاضر</span></td>
								<td>الرياضيات</td>
								<td>الأولى</td>
								<td>-</td>
							</tr>
							<tr>
								<td>2025-09-09</td>
								<td>فاطمة أحمد محمد</td>
								<td><span class="badge bg-success">حاضر</span></td>
								<td>الرياضيات</td>
								<td>الأولى</td>
								<td>-</td>
							</tr>
							<tr>
								<td>2025-09-09</td>
								<td>محمد سارة خالد</td>
								<td><span class="badge bg-danger">غائب</span></td>
								<td>الرياضيات</td>
								<td>الأولى</td>
								<td>مرض</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-primary">تصدير التقرير</button>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
			</div>
		</div>
	</div>
</div>

<script>
	// تسجيل الحضور
	document.addEventListener('DOMContentLoaded', function() {
		// إضافة event listeners لأزرار الحضور
		document.querySelectorAll('.attendance-btn').forEach(btn => {
			btn.addEventListener('click', function() {
				const studentCard = this.closest('.student-card');
				const studentId = studentCard.getAttribute('data-student-id');
				const status = this.getAttribute('data-status');
				
				// إزالة التفعيل من جميع الأزرار في نفس البطاقة
				studentCard.querySelectorAll('.attendance-btn').forEach(b => {
					b.classList.remove('active');
					if (b.getAttribute('data-status') === 'present') {
						b.className = 'btn btn-outline-success btn-sm flex-fill attendance-btn';
					} else {
						b.className = 'btn btn-outline-danger btn-sm flex-fill attendance-btn';
					}
				});
				
				// تفعيل الزر المحدد
				this.classList.add('active');
				if (status === 'present') {
					this.className = 'btn btn-success btn-sm flex-fill attendance-btn active';
				} else {
					this.className = 'btn btn-danger btn-sm flex-fill attendance-btn active';
				}
				
				// تحديث الإحصائيات
				updateStats();
			});
		});
		
		// تحديث الإحصائيات عند التحميل
		updateStats();
	});
	
	function updateStats() {
		const totalStudents = document.querySelectorAll('.student-card').length;
		const presentStudents = document.querySelectorAll('.attendance-btn.active[data-status="present"]').length;
		const absentStudents = document.querySelectorAll('.attendance-btn.active[data-status="absent"]').length;
		const attendanceRate = totalStudents > 0 ? Math.round((presentStudents / totalStudents) * 100) : 0;
		
		document.getElementById('totalStudents').textContent = totalStudents;
		document.getElementById('presentStudents').textContent = presentStudents;
		document.getElementById('absentStudents').textContent = absentStudents;
		document.getElementById('attendanceRate').textContent = attendanceRate + '%';
	}
	
	function markAllPresent() {
		document.querySelectorAll('.attendance-btn[data-status="present"]').forEach(btn => {
			btn.click();
		});
	}
	
	function markAllAbsent() {
		document.querySelectorAll('.attendance-btn[data-status="absent"]').forEach(btn => {
			btn.click();
		});
	}
	
	function saveAttendance() {
		// جمع بيانات الحضور
		const attendanceData = [];
		document.querySelectorAll('.student-card').forEach(card => {
			const studentId = card.getAttribute('data-student-id');
			const activeBtn = card.querySelector('.attendance-btn.active');
			const status = activeBtn ? activeBtn.getAttribute('data-status') : 'not_marked';
			
			attendanceData.push({
				studentId: studentId,
				status: status
			});
		});
		
		// محاكاة حفظ البيانات
		console.log('حفظ بيانات الحضور:', attendanceData);
		alert('تم حفظ بيانات الحضور بنجاح!');
	}
	
	function sendNotifications() {
		alert('تم إرسال الإشعارات لأولياء أمور الطلاب الغائبين.');
	}
</script>
