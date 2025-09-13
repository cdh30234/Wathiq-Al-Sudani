<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<div class="d-sm-flex justify-content-between align-items-center">
			<h1 class="h3 mb-2 mb-sm-0">إدخال الدرجات</h1>
			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bulkGradesModal">
				<i class="bi bi-upload me-2"></i>رفع ملف الدرجات
			</button>
		</div>
	</div>
</div>

<!-- Filters START -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="row g-3">
			<div class="col-lg-3">
				<label class="form-label">الفصل</label>
				<select class="form-select" id="classSelect" required>
					<option value="">اختر الفصل</option>
					<option value="السابع أ">السابع أ</option>
					<option value="السابع ب">السابع ب</option>
					<option value="الثامن أ">الثامن أ</option>
					<option value="الثامن ب">الثامن ب</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label class="form-label">المادة</label>
				<select class="form-select" id="subjectSelect" required>
					<option value="">اختر المادة</option>
					<option value="الرياضيات">الرياضيات</option>
					<option value="العلوم">العلوم</option>
					<option value="اللغة العربية">اللغة العربية</option>
					<option value="اللغة الإنجليزية">اللغة الإنجليزية</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label class="form-label">نوع الامتحان</label>
				<select class="form-select" id="examType" required>
					<option value="">اختر نوع الامتحان</option>
					<option value="اختبار شهري">اختبار شهري</option>
					<option value="اختبار نصف الفصل">اختبار نصف الفصل</option>
					<option value="اختبار نهائي">اختبار نهائي</option>
					<option value="واجب">واجب</option>
					<option value="مشاركة صفية">مشاركة صفية</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label class="form-label">الدرجة الكاملة</label>
				<input type="number" class="form-control" id="totalMarks" min="1" max="100" value="20">
			</div>
		</div>
		<div class="row g-3 mt-1">
			<div class="col-lg-6">
				<label class="form-label">تاريخ الامتحان</label>
				<input type="date" class="form-control" id="examDate" value="<?php echo date('Y-m-d'); ?>">
			</div>
			<div class="col-lg-6 d-flex align-items-end">
				<button class="btn btn-primary w-100" id="loadStudents">
					<i class="bi bi-search me-2"></i>تحميل الطلاب
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Filters END -->

<!-- Grades Entry START -->
<div class="card shadow">
	<div class="card-header">
		<div class="d-flex justify-content-between align-items-center">
			<h6 class="mb-0">إدخال الدرجات</h6>
			<div class="d-flex gap-2">
				<button class="btn btn-sm btn-success" id="saveGrades">
					<i class="bi bi-check-circle me-1"></i>حفظ الدرجات
				</button>
				<button class="btn btn-sm btn-outline-primary" id="calculateStats">
					<i class="bi bi-calculator me-1"></i>حساب الإحصائيات
				</button>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover align-middle">
				<thead class="table-dark">
					<tr>
						<th>رقم</th>
						<th>اسم الطالب</th>
						<th>رقم الهوية</th>
						<th>الدرجة</th>
						<th>النسبة المئوية</th>
						<th>التقدير</th>
						<th>ملاحظات</th>
					</tr>
				</thead>
				<tbody id="gradesTableBody">
					<!-- Student Grade Row 1 -->
					<tr data-student-id="1">
						<td>1</td>
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
							<input type="number" class="form-control grade-input" min="0" max="20" step="0.5" data-student-id="1">
						</td>
						<td class="percentage-cell">-</td>
						<td class="grade-cell">-</td>
						<td>
							<input type="text" class="form-control form-control-sm" placeholder="ملاحظة...">
						</td>
					</tr>

					<!-- Student Grade Row 2 -->
					<tr data-student-id="2">
						<td>2</td>
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
							<input type="number" class="form-control grade-input" min="0" max="20" step="0.5" data-student-id="2">
						</td>
						<td class="percentage-cell">-</td>
						<td class="grade-cell">-</td>
						<td>
							<input type="text" class="form-control form-control-sm" placeholder="ملاحظة...">
						</td>
					</tr>

					<!-- Student Grade Row 3 -->
					<tr data-student-id="3">
						<td>3</td>
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
							<input type="number" class="form-control grade-input" min="0" max="20" step="0.5" data-student-id="3">
						</td>
						<td class="percentage-cell">-</td>
						<td class="grade-cell">-</td>
						<td>
							<input type="text" class="form-control form-control-sm" placeholder="ملاحظة...">
						</td>
					</tr>

					<!-- Student Grade Row 4 -->
					<tr data-student-id="4">
						<td>4</td>
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
							<input type="number" class="form-control grade-input" min="0" max="20" step="0.5" data-student-id="4">
						</td>
						<td class="percentage-cell">-</td>
						<td class="grade-cell">-</td>
						<td>
							<input type="text" class="form-control form-control-sm" placeholder="ملاحظة...">
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<!-- Statistics Panel -->
		<div class="row mt-4" id="statisticsPanel" style="display: none;">
			<div class="col-md-6">
				<div class="card bg-light">
					<div class="card-body">
						<h6 class="card-title">إحصائيات الدرجات</h6>
						<div class="row text-center">
							<div class="col-4">
								<div class="stat-item">
									<h5 class="text-success mb-0" id="avgGrade">-</h5>
									<small>المتوسط</small>
								</div>
							</div>
							<div class="col-4">
								<div class="stat-item">
									<h5 class="text-primary mb-0" id="highestGrade">-</h5>
									<small>أعلى درجة</small>
								</div>
							</div>
							<div class="col-4">
								<div class="stat-item">
									<h5 class="text-danger mb-0" id="lowestGrade">-</h5>
									<small>أقل درجة</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card bg-light">
					<div class="card-body">
						<h6 class="card-title">توزيع التقديرات</h6>
						<div class="row text-center">
							<div class="col-3">
								<div class="stat-item">
									<h5 class="text-success mb-0" id="excellentCount">0</h5>
									<small>ممتاز</small>
								</div>
							</div>
							<div class="col-3">
								<div class="stat-item">
									<h5 class="text-info mb-0" id="goodCount">0</h5>
									<small>جيد جداً</small>
								</div>
							</div>
							<div class="col-3">
								<div class="stat-item">
									<h5 class="text-warning mb-0" id="passCount">0</h5>
									<small>جيد</small>
								</div>
							</div>
							<div class="col-3">
								<div class="stat-item">
									<h5 class="text-danger mb-0" id="failCount">0</h5>
									<small>ضعيف</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Grades Entry END -->

<!-- Bulk Upload Modal -->
<div class="modal fade" id="bulkGradesModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">رفع ملف الدرجات</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-info">
					<i class="bi bi-info-circle me-2"></i>
					يمكنك رفع ملف Excel أو CSV يحتوي على الدرجات. تأكد من أن الملف يحتوي على الأعمدة: رقم الهوية، الدرجة، الملاحظات.
				</div>

				<div class="mb-3">
					<label class="form-label">تحميل ملف الدرجات</label>
					<input type="file" class="form-control" accept=".xlsx,.xls,.csv">
				</div>

				<div class="mb-3">
					<a href="#" class="btn btn-outline-primary btn-sm">
						<i class="bi bi-download me-1"></i>تحميل نموذج ملف الدرجات
					</a>
				</div>

				<!-- Preview Table -->
				<div class="table-responsive">
					<table class="table table-sm">
						<thead class="table-dark">
							<tr>
								<th>رقم الهوية</th>
								<th>اسم الطالب</th>
								<th>الدرجة</th>
								<th>ملاحظات</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="4" class="text-center text-muted">لم يتم رفع أي ملف بعد</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
				<button type="button" class="btn btn-primary">رفع الدرجات</button>
			</div>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners to grade inputs
    document.querySelectorAll('.grade-input').forEach(input => {
        input.addEventListener('input', function() {
            calculateIndividualGrade(this);
        });
    });

    // Update max value when total marks change
    document.getElementById('totalMarks').addEventListener('change', function() {
        const totalMarks = parseInt(this.value);
        document.querySelectorAll('.grade-input').forEach(input => {
            input.max = totalMarks;
        });
    });
});

function calculateIndividualGrade(input) {
    const row = input.closest('tr');
    const totalMarks = parseInt(document.getElementById('totalMarks').value) || 20;
    const studentGrade = parseFloat(input.value);
    
    if (!isNaN(studentGrade)) {
        // Calculate percentage
        const percentage = ((studentGrade / totalMarks) * 100).toFixed(1);
        row.querySelector('.percentage-cell').textContent = percentage + '%';
        
        // Determine grade
        let grade = '';
        let gradeClass = '';
        
        if (percentage >= 90) {
            grade = 'ممتاز';
            gradeClass = 'text-success';
        } else if (percentage >= 80) {
            grade = 'جيد جداً';
            gradeClass = 'text-info';
        } else if (percentage >= 70) {
            grade = 'جيد';
            gradeClass = 'text-primary';
        } else if (percentage >= 60) {
            grade = 'مقبول';
            gradeClass = 'text-warning';
        } else {
            grade = 'ضعيف';
            gradeClass = 'text-danger';
        }
        
        const gradeCell = row.querySelector('.grade-cell');
        gradeCell.textContent = grade;
        gradeCell.className = 'grade-cell ' + gradeClass;
    } else {
        row.querySelector('.percentage-cell').textContent = '-';
        row.querySelector('.grade-cell').textContent = '-';
        row.querySelector('.grade-cell').className = 'grade-cell';
    }
}

document.getElementById('calculateStats').addEventListener('click', function() {
    const grades = [];
    document.querySelectorAll('.grade-input').forEach(input => {
        const value = parseFloat(input.value);
        if (!isNaN(value)) {
            grades.push(value);
        }
    });
    
    if (grades.length === 0) {
        alert('لم يتم إدخال أي درجات بعد');
        return;
    }
    
    // Calculate statistics
    const totalMarks = parseInt(document.getElementById('totalMarks').value) || 20;
    const avg = (grades.reduce((a, b) => a + b, 0) / grades.length).toFixed(1);
    const highest = Math.max(...grades);
    const lowest = Math.min(...grades);
    
    // Count grade distributions
    let excellentCount = 0, goodCount = 0, passCount = 0, failCount = 0;
    
    grades.forEach(grade => {
        const percentage = (grade / totalMarks) * 100;
        if (percentage >= 90) excellentCount++;
        else if (percentage >= 80) goodCount++;
        else if (percentage >= 60) passCount++;
        else failCount++;
    });
    
    // Update UI
    document.getElementById('avgGrade').textContent = avg;
    document.getElementById('highestGrade').textContent = highest;
    document.getElementById('lowestGrade').textContent = lowest;
    document.getElementById('excellentCount').textContent = excellentCount;
    document.getElementById('goodCount').textContent = goodCount;
    document.getElementById('passCount').textContent = passCount;
    document.getElementById('failCount').textContent = failCount;
    
    document.getElementById('statisticsPanel').style.display = 'block';
});

document.getElementById('saveGrades').addEventListener('click', function() {
    const gradesData = [];
    document.querySelectorAll('#gradesTableBody tr[data-student-id]').forEach(row => {
        const studentId = row.getAttribute('data-student-id');
        const gradeInput = row.querySelector('.grade-input');
        const noteInput = row.querySelector('input[type="text"]');
        
        if (gradeInput.value) {
            gradesData.push({
                studentId: studentId,
                grade: gradeInput.value,
                note: noteInput.value,
                class: document.getElementById('classSelect').value,
                subject: document.getElementById('subjectSelect').value,
                examType: document.getElementById('examType').value,
                totalMarks: document.getElementById('totalMarks').value,
                examDate: document.getElementById('examDate').value
            });
        }
    });
    
    if (gradesData.length === 0) {
        alert('يرجى إدخال درجة واحدة على الأقل');
        return;
    }
    
    // Here you would typically send the data to your backend
    console.log('Grades data:', gradesData);
    alert('تم حفظ الدرجات بنجاح!');
});
</script>
