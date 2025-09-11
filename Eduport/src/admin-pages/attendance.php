<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<div class="d-sm-flex justify-content-between align-items-center">
			<h1 class="h3 mb-2 mb-sm-0">تسجيل الحضور</h1>
			<div class="d-flex gap-2">
				<button class="btn btn-success" id="saveAttendance">
					<i class="bi bi-check-circle me-2"></i>حفظ الحضور
				</button>
				<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#attendanceReportModal">
					<i class="bi bi-graph-up me-2"></i>تقرير الحضور
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Date and Class Selection START -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="row g-3 align-items-end">
			<div class="col-lg-3">
				<label class="form-label">التاريخ</label>
				<input type="date" class="form-control" id="attendanceDate" value="<?php echo date('Y-m-d'); ?>">
			</div>
			<div class="col-lg-3">
				<label class="form-label">الفصل</label>
				<select class="form-select" id="classSelect" required>
					<option value="">اختر الفصل</option>
					<option value="السادس أ">السادس أ</option>
					<option value="السادس ب">السادس ب</option>
					<option value="السابع أ">السابع أ</option>
					<option value="السابع ب">السابع ب</option>
					<option value="الثامن أ">الثامن أ</option>
					<option value="الثامن ب">الثامن ب</option>
					<option value="التاسع أ">التاسع أ</option>
					<option value="التاسع ب">التاسع ب</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label class="form-label">المادة</label>
				<select class="form-select" id="subjectSelect">
					<option value="">اختر المادة</option>
					<option value="الرياضيات">الرياضيات</option>
					<option value="العلوم">العلوم</option>
					<option value="اللغة العربية">اللغة العربية</option>
					<option value="اللغة الإنجليزية">اللغة الإنجليزية</option>
					<option value="التاريخ">التاريخ</option>
					<option value="الجغرافيا">الجغرافيا</option>
					<option value="التربية الإسلامية">التربية الإسلامية</option>
				</select>
			</div>
			<div class="col-lg-3">
				<button class="btn btn-primary w-100" id="loadStudents">
					<i class="bi bi-search me-2"></i>تحميل الطلاب
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Date and Class Selection END -->

<!-- Quick Actions START -->
<div class="card shadow mb-4">
	<div class="card-body">
		<h6 class="card-title mb-3">إجراءات سريعة</h6>
		<div class="d-flex gap-2 flex-wrap">
			<button class="btn btn-success btn-sm" onclick="markAllPresent()">
				<i class="bi bi-check-all me-1"></i>تحديد الكل حاضر
			</button>
			<button class="btn btn-danger btn-sm" onclick="markAllAbsent()">
				<i class="bi bi-x-circle me-1"></i>تحديد الكل غائب
			</button>
			<button class="btn btn-warning btn-sm" onclick="markSelectedLate()">
				<i class="bi bi-clock me-1"></i>تحديد المحدد متأخر
			</button>
			<button class="btn btn-info btn-sm" onclick="importPreviousDay()">
				<i class="bi bi-arrow-down me-1"></i>استيراد من اليوم السابق
			</button>
		</div>
	</div>
</div>
<!-- Quick Actions END -->

<!-- Attendance Table START -->
<div class="card shadow">
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center mb-3">
			<h6 class="card-title mb-0">قائمة الطلاب</h6>
			<div class="d-flex align-items-center gap-3">
				<span class="badge bg-success">حاضر: <span id="presentCount">0</span></span>
				<span class="badge bg-danger">غائب: <span id="absentCount">0</span></span>
				<span class="badge bg-warning">متأخر: <span id="lateCount">0</span></span>
				<span class="badge bg-info">إجمالي: <span id="totalCount">0</span></span>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-hover align-middle" id="attendanceTable">
				<thead class="table-dark">
					<tr>
						<th scope="col">
							<input class="form-check-input" type="checkbox" id="selectAllStudents">
						</th>
						<th scope="col">الطالب</th>
						<th scope="col">رقم الهوية</th>
						<th scope="col">الحضور السابق</th>
						<th scope="col">الحالة</th>
						<th scope="col">ملاحظات</th>
					</tr>
				</thead>
				<tbody>
					<!-- Student Row 1 -->
					<tr data-student-id="1">
						<td>
							<input class="form-check-input student-checkbox" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<div class="avatar avatar-sm me-3">
									<img src="assets/images/avatar/01.jpg" class="rounded-circle" alt="">
								</div>
								<div>
									<h6 class="mb-0">أحمد محمد علي</h6>
									<small class="text-muted">السابع أ</small>
								</div>
							</div>
						</td>
						<td>1234567890</td>
						<td>
							<div class="d-flex gap-1">
								<span class="badge bg-success" title="أمس">ح</span>
								<span class="badge bg-success" title="قبل يومين">ح</span>
								<span class="badge bg-danger" title="قبل 3 أيام">غ</span>
								<span class="badge bg-success" title="قبل 4 أيام">ح</span>
								<span class="badge bg-warning" title="قبل 5 أيام">م</span>
							</div>
						</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<input type="radio" class="btn-check" name="attendance_1" id="present_1" value="present">
								<label class="btn btn-outline-success" for="present_1">حاضر</label>

								<input type="radio" class="btn-check" name="attendance_1" id="absent_1" value="absent">
								<label class="btn btn-outline-danger" for="absent_1">غائب</label>

								<input type="radio" class="btn-check" name="attendance_1" id="late_1" value="late">
								<label class="btn btn-outline-warning" for="late_1">متأخر</label>
							</div>
						</td>
						<td>
							<input type="text" class="form-control form-control-sm" placeholder="ملاحظة..." maxlength="100">
						</td>
					</tr>

					<!-- Student Row 2 -->
					<tr data-student-id="2">
						<td>
							<input class="form-check-input student-checkbox" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<div class="avatar avatar-sm me-3">
									<img src="assets/images/avatar/02.jpg" class="rounded-circle" alt="">
								</div>
								<div>
									<h6 class="mb-0">فاطمة أحمد محمد</h6>
									<small class="text-muted">السابع أ</small>
								</div>
							</div>
						</td>
						<td>0987654321</td>
						<td>
							<div class="d-flex gap-1">
								<span class="badge bg-success" title="أمس">ح</span>
								<span class="badge bg-success" title="قبل يومين">ح</span>
								<span class="badge bg-success" title="قبل 3 أيام">ح</span>
								<span class="badge bg-success" title="قبل 4 أيام">ح</span>
								<span class="badge bg-success" title="قبل 5 أيام">ح</span>
							</div>
						</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<input type="radio" class="btn-check" name="attendance_2" id="present_2" value="present">
								<label class="btn btn-outline-success" for="present_2">حاضر</label>

								<input type="radio" class="btn-check" name="attendance_2" id="absent_2" value="absent">
								<label class="btn btn-outline-danger" for="absent_2">غائب</label>

								<input type="radio" class="btn-check" name="attendance_2" id="late_2" value="late">
								<label class="btn btn-outline-warning" for="late_2">متأخر</label>
							</div>
						</td>
						<td>
							<input type="text" class="form-control form-control-sm" placeholder="ملاحظة..." maxlength="100">
						</td>
					</tr>

					<!-- Student Row 3 -->
					<tr data-student-id="3">
						<td>
							<input class="form-check-input student-checkbox" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<div class="avatar avatar-sm me-3">
									<img src="assets/images/avatar/03.jpg" class="rounded-circle" alt="">
								</div>
								<div>
									<h6 class="mb-0">محمد علي حسن</h6>
									<small class="text-muted">السابع أ</small>
								</div>
							</div>
						</td>
						<td>1357924680</td>
						<td>
							<div class="d-flex gap-1">
								<span class="badge bg-warning" title="أمس">م</span>
								<span class="badge bg-success" title="قبل يومين">ح</span>
								<span class="badge bg-success" title="قبل 3 أيام">ح</span>
								<span class="badge bg-danger" title="قبل 4 أيام">غ</span>
								<span class="badge bg-success" title="قبل 5 أيام">ح</span>
							</div>
						</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<input type="radio" class="btn-check" name="attendance_3" id="present_3" value="present">
								<label class="btn btn-outline-success" for="present_3">حاضر</label>

								<input type="radio" class="btn-check" name="attendance_3" id="absent_3" value="absent">
								<label class="btn btn-outline-danger" for="absent_3">غائب</label>

								<input type="radio" class="btn-check" name="attendance_3" id="late_3" value="late">
								<label class="btn btn-outline-warning" for="late_3">متأخر</label>
							</div>
						</td>
						<td>
							<input type="text" class="form-control form-control-sm" placeholder="ملاحظة..." maxlength="100">
						</td>
					</tr>

					<!-- Student Row 4 -->
					<tr data-student-id="4">
						<td>
							<input class="form-check-input student-checkbox" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<div class="avatar avatar-sm me-3">
									<img src="assets/images/avatar/04.jpg" class="rounded-circle" alt="">
								</div>
								<div>
									<h6 class="mb-0">نور الهدى سالم</h6>
									<small class="text-muted">السابع أ</small>
								</div>
							</div>
						</td>
						<td>2468013579</td>
						<td>
							<div class="d-flex gap-1">
								<span class="badge bg-success" title="أمس">ح</span>
								<span class="badge bg-success" title="قبل يومين">ح</span>
								<span class="badge bg-success" title="قبل 3 أيام">ح</span>
								<span class="badge bg-success" title="قبل 4 أيام">ح</span>
								<span class="badge bg-warning" title="قبل 5 أيام">م</span>
							</div>
						</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<input type="radio" class="btn-check" name="attendance_4" id="present_4" value="present">
								<label class="btn btn-outline-success" for="present_4">حاضر</label>

								<input type="radio" class="btn-check" name="attendance_4" id="absent_4" value="absent">
								<label class="btn btn-outline-danger" for="absent_4">غائب</label>

								<input type="radio" class="btn-check" name="attendance_4" id="late_4" value="late">
								<label class="btn btn-outline-warning" for="late_4">متأخر</label>
							</div>
						</td>
						<td>
							<input type="text" class="form-control form-control-sm" placeholder="ملاحظة..." maxlength="100">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Attendance Table END -->

<!-- Attendance Report Modal -->
<div class="modal fade" id="attendanceReportModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">تقرير الحضور</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
							<option value="">جميع الفصول</option>
							<option value="السابع أ">السابع أ</option>
							<option value="السابع ب">السابع ب</option>
						</select>
					</div>
					<div class="col-md-3 d-flex align-items-end">
						<button class="btn btn-primary w-100">عرض التقرير</button>
					</div>
				</div>

				<!-- Report Summary -->
				<div class="row g-3 mb-4">
					<div class="col-md-3">
						<div class="card bg-success bg-opacity-10 text-center">
							<div class="card-body">
								<h4 class="text-success">85%</h4>
								<p class="mb-0">معدل الحضور</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card bg-info bg-opacity-10 text-center">
							<div class="card-body">
								<h4 class="text-info">24</h4>
								<p class="mb-0">إجمالي الطلاب</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card bg-warning bg-opacity-10 text-center">
							<div class="card-body">
								<h4 class="text-warning">8%</h4>
								<p class="mb-0">معدل التأخير</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card bg-danger bg-opacity-10 text-center">
							<div class="card-body">
								<h4 class="text-danger">7%</h4>
								<p class="mb-0">معدل الغياب</p>
							</div>
						</div>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>الطالب</th>
								<th>أيام الحضور</th>
								<th>أيام الغياب</th>
								<th>أيام التأخير</th>
								<th>النسبة المئوية</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>أحمد محمد علي</td>
								<td class="text-success">18</td>
								<td class="text-danger">2</td>
								<td class="text-warning">0</td>
								<td><span class="badge bg-success">90%</span></td>
							</tr>
							<tr>
								<td>فاطمة أحمد محمد</td>
								<td class="text-success">20</td>
								<td class="text-danger">0</td>
								<td class="text-warning">0</td>
								<td><span class="badge bg-success">100%</span></td>
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
document.addEventListener('DOMContentLoaded', function() {
    updateAttendanceCounts();
    
    // Add event listeners for attendance radio buttons
    document.querySelectorAll('input[type="radio"][name^="attendance_"]').forEach(radio => {
        radio.addEventListener('change', updateAttendanceCounts);
    });
});

function markAllPresent() {
    document.querySelectorAll('input[type="radio"][value="present"]').forEach(radio => {
        radio.checked = true;
    });
    updateAttendanceCounts();
}

function markAllAbsent() {
    document.querySelectorAll('input[type="radio"][value="absent"]').forEach(radio => {
        radio.checked = true;
    });
    updateAttendanceCounts();
}

function markSelectedLate() {
    document.querySelectorAll('.student-checkbox:checked').forEach(checkbox => {
        const row = checkbox.closest('tr');
        const studentId = row.getAttribute('data-student-id');
        const lateRadio = document.querySelector(`input[name="attendance_${studentId}"][value="late"]`);
        if (lateRadio) {
            lateRadio.checked = true;
        }
    });
    updateAttendanceCounts();
}

function updateAttendanceCounts() {
    const presentCount = document.querySelectorAll('input[type="radio"][value="present"]:checked').length;
    const absentCount = document.querySelectorAll('input[type="radio"][value="absent"]:checked').length;
    const lateCount = document.querySelectorAll('input[type="radio"][value="late"]:checked').length;
    const totalCount = document.querySelectorAll('tr[data-student-id]').length;
    
    document.getElementById('presentCount').textContent = presentCount;
    document.getElementById('absentCount').textContent = absentCount;
    document.getElementById('lateCount').textContent = lateCount;
    document.getElementById('totalCount').textContent = totalCount;
}

// Save attendance function
document.getElementById('saveAttendance').addEventListener('click', function() {
    const attendanceData = [];
    document.querySelectorAll('tr[data-student-id]').forEach(row => {
        const studentId = row.getAttribute('data-student-id');
        const checkedRadio = row.querySelector(`input[name="attendance_${studentId}"]:checked`);
        const note = row.querySelector('input[type="text"]').value;
        
        if (checkedRadio) {
            attendanceData.push({
                studentId: studentId,
                status: checkedRadio.value,
                note: note,
                date: document.getElementById('attendanceDate').value,
                class: document.getElementById('classSelect').value,
                subject: document.getElementById('subjectSelect').value
            });
        }
    });
    
    // Here you would typically send the data to your backend
    console.log('Attendance data:', attendanceData);
    alert('تم حفظ الحضور بنجاح!');
});
</script>
