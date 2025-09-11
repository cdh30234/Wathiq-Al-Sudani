<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">إدارة الدرجات والتقييمات</h1>
	</div>
</div>

<!-- فلترة الدرجات START -->
<div class="row g-4 mb-4">
	<div class="col-md-3">
		<label class="form-label">الفصل</label>
		<select class="form-select" id="classFilter">
			<option value="">جميع الفصول</option>
			<option value="5a" selected>الصف الخامس أ</option>
			<option value="5b">الصف الخامس ب</option>
			<option value="6a">الصف السادس أ</option>
		</select>
	</div>
	<div class="col-md-3">
		<label class="form-label">المادة</label>
		<select class="form-select" id="subjectFilter">
			<option value="">جميع المواد</option>
			<option value="math" selected>الرياضيات</option>
			<option value="science">العلوم</option>
			<option value="geography">الجغرافيا</option>
		</select>
	</div>
	<div class="col-md-3">
		<label class="form-label">نوع التقييم</label>
		<select class="form-select" id="examTypeFilter">
			<option value="">جميع الأنواع</option>
			<option value="quiz">اختبار قصير</option>
			<option value="exam">امتحان</option>
			<option value="assignment">واجب</option>
			<option value="project">مشروع</option>
		</select>
	</div>
	<div class="col-md-3">
		<label class="form-label">&nbsp;</label>
		<button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addGradeModal">
			<i class="bi bi-plus-circle me-2"></i>إضافة تقييم جديد
		</button>
	</div>
</div>
<!-- فلترة الدرجات END -->

<!-- إحصائيات الدرجات START -->
<div class="row g-4 mb-4">
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-primary bg-opacity-10 border border-primary border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-primary">87.5</h4>
					<span class="h6 fw-light mb-0">متوسط الفصل</span>
				</div>
				<div class="icon-lg bg-primary rounded-circle">
					<i class="bi bi-graph-up text-white"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-success bg-opacity-10 border border-success border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-success">24</h4>
					<span class="h6 fw-light mb-0">طلاب ناجحون</span>
				</div>
				<div class="icon-lg bg-success rounded-circle">
					<i class="bi bi-check-circle text-white"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-warning bg-opacity-10 border border-warning border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-warning">5</h4>
					<span class="h6 fw-light mb-0">طلاب تحت المراقبة</span>
				</div>
				<div class="icon-lg bg-warning rounded-circle">
					<i class="bi bi-exclamation-triangle text-white"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-danger bg-opacity-10 border border-danger border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-danger">3</h4>
					<span class="h6 fw-light mb-0">طلاب محتاجون دعم</span>
				</div>
				<div class="icon-lg bg-danger rounded-circle">
					<i class="bi bi-arrow-down-circle text-white"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- إحصائيات الدرجات END -->

<!-- جدول الدرجات START -->
<div class="card shadow">
	<div class="card-header border-bottom">
		<div class="d-sm-flex justify-content-sm-between align-items-center">
			<h5 class="card-title mb-2 mb-sm-0">جدول الدرجات - الرياضيات - الصف الخامس أ</h5>
			<div class="d-flex gap-2">
				<button class="btn btn-outline-success btn-sm" onclick="exportGrades()">
					<i class="bi bi-download me-1"></i>تصدير Excel
				</button>
				<button class="btn btn-outline-primary btn-sm" onclick="calculateAverages()">
					<i class="bi bi-calculator me-1"></i>حساب المتوسطات
				</button>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover align-middle">
				<thead class="table-light">
					<tr>
						<th scope="col" style="min-width: 200px;">الطالب</th>
						<th scope="col" class="text-center">اختبار قصير 1<br><small class="text-muted">(10 درجات)</small></th>
						<th scope="col" class="text-center">واجب 1<br><small class="text-muted">(15 درجات)</small></th>
						<th scope="col" class="text-center">امتحان منتصف الفصل<br><small class="text-muted">(25 درجات)</small></th>
						<th scope="col" class="text-center">مشروع<br><small class="text-muted">(20 درجات)</small></th>
						<th scope="col" class="text-center">الامتحان النهائي<br><small class="text-muted">(30 درجات)</small></th>
						<th scope="col" class="text-center">المجموع<br><small class="text-muted">(100)</small></th>
						<th scope="col" class="text-center">النسبة</th>
						<th scope="col" class="text-center">التقدير</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<div class="d-flex align-items-center">
								<img src="assets/images/avatar/01.jpg" class="rounded-circle me-2" width="40" height="40" alt="">
								<div>
									<h6 class="mb-0">أحمد محمد علي</h6>
									<small class="text-muted">2024001</small>
								</div>
							</div>
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="9" min="0" max="10" data-student="1" data-exam="quiz1">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="14" min="0" max="15" data-student="1" data-exam="hw1">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="23" min="0" max="25" data-student="1" data-exam="midterm">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="18" min="0" max="20" data-student="1" data-exam="project">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="28" min="0" max="30" data-student="1" data-exam="final">
						</td>
						<td class="text-center">
							<span class="fw-bold total-grade" data-student="1">92</span>
						</td>
						<td class="text-center">
							<span class="percentage" data-student="1">92%</span>
						</td>
						<td class="text-center">
							<span class="badge bg-success grade-badge" data-student="1">ممتاز</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<div class="d-flex align-items-center">
								<img src="assets/images/avatar/02.jpg" class="rounded-circle me-2" width="40" height="40" alt="">
								<div>
									<h6 class="mb-0">فاطمة أحمد محمد</h6>
									<small class="text-muted">2024002</small>
								</div>
							</div>
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="8" min="0" max="10" data-student="2" data-exam="quiz1">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="13" min="0" max="15" data-student="2" data-exam="hw1">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="22" min="0" max="25" data-student="2" data-exam="midterm">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="17" min="0" max="20" data-student="2" data-exam="project">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="25" min="0" max="30" data-student="2" data-exam="final">
						</td>
						<td class="text-center">
							<span class="fw-bold total-grade" data-student="2">85</span>
						</td>
						<td class="text-center">
							<span class="percentage" data-student="2">85%</span>
						</td>
						<td class="text-center">
							<span class="badge bg-success grade-badge" data-student="2">جيد جداً</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<div class="d-flex align-items-center">
								<img src="assets/images/avatar/03.jpg" class="rounded-circle me-2" width="40" height="40" alt="">
								<div>
									<h6 class="mb-0">محمد سارة خالد</h6>
									<small class="text-muted">2024003</small>
								</div>
							</div>
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="6" min="0" max="10" data-student="3" data-exam="quiz1">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="10" min="0" max="15" data-student="3" data-exam="hw1">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="18" min="0" max="25" data-student="3" data-exam="midterm">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="14" min="0" max="20" data-student="3" data-exam="project">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="20" min="0" max="30" data-student="3" data-exam="final">
						</td>
						<td class="text-center">
							<span class="fw-bold total-grade" data-student="3">68</span>
						</td>
						<td class="text-center">
							<span class="percentage" data-student="3">68%</span>
						</td>
						<td class="text-center">
							<span class="badge bg-warning grade-badge" data-student="3">مقبول</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<div class="d-flex align-items-center">
								<img src="assets/images/avatar/04.jpg" class="rounded-circle me-2" width="40" height="40" alt="">
								<div>
									<h6 class="mb-0">نورا عبدالله أحمد</h6>
									<small class="text-muted">2024004</small>
								</div>
							</div>
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="10" min="0" max="10" data-student="4" data-exam="quiz1">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="15" min="0" max="15" data-student="4" data-exam="hw1">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="25" min="0" max="25" data-student="4" data-exam="midterm">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="20" min="0" max="20" data-student="4" data-exam="project">
						</td>
						<td class="text-center">
							<input type="number" class="form-control form-control-sm text-center grade-input" value="29" min="0" max="30" data-student="4" data-exam="final">
						</td>
						<td class="text-center">
							<span class="fw-bold total-grade" data-student="4">99</span>
						</td>
						<td class="text-center">
							<span class="percentage" data-student="4">99%</span>
						</td>
						<td class="text-center">
							<span class="badge bg-success grade-badge" data-student="4">ممتاز</span>
						</td>
					</tr>
				</tbody>
				<tfoot class="table-secondary">
					<tr>
						<th>المتوسط العام</th>
						<th class="text-center" id="avgQuiz1">8.25</th>
						<th class="text-center" id="avgHw1">13</th>
						<th class="text-center" id="avgMidterm">22</th>
						<th class="text-center" id="avgProject">17.25</th>
						<th class="text-center" id="avgFinal">25.5</th>
						<th class="text-center" id="avgTotal">86</th>
						<th class="text-center" id="avgPercentage">86%</th>
						<th class="text-center">جيد جداً</th>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="mt-4 d-flex justify-content-between align-items-center">
			<div>
				<button class="btn btn-success" onclick="saveGrades()">
					<i class="bi bi-save me-2"></i>حفظ جميع الدرجات
				</button>
				<button class="btn btn-outline-primary ms-2" onclick="sendGradeNotifications()">
					<i class="bi bi-envelope me-2"></i>إرسال النتائج للأولياء
				</button>
			</div>
			<div>
				<small class="text-muted">آخر حفظ: اليوم الساعة 10:30 ص</small>
			</div>
		</div>
	</div>
</div>
<!-- جدول الدرجات END -->

<!-- إضافة تقييم جديد Modal -->
<div class="modal fade" id="addGradeModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">إضافة تقييم جديد</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form>
					<div class="row g-3">
						<div class="col-12">
							<label class="form-label">اسم التقييم</label>
							<input type="text" class="form-control" placeholder="مثال: اختبار الوحدة الثالثة" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">نوع التقييم</label>
							<select class="form-select" required>
								<option value="">اختر النوع</option>
								<option value="quiz">اختبار قصير</option>
								<option value="exam">امتحان</option>
								<option value="assignment">واجب</option>
								<option value="project">مشروع</option>
							</select>
						</div>
						<div class="col-md-6">
							<label class="form-label">الدرجة الكاملة</label>
							<input type="number" class="form-control" min="1" max="100" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">المادة</label>
							<select class="form-select" required>
								<option value="">اختر المادة</option>
								<option value="math">الرياضيات</option>
								<option value="science">العلوم</option>
								<option value="geography">الجغرافيا</option>
							</select>
						</div>
						<div class="col-md-6">
							<label class="form-label">الفصل</label>
							<select class="form-select" required>
								<option value="">اختر الفصل</option>
								<option value="5a">الصف الخامس أ</option>
								<option value="5b">الصف الخامس ب</option>
								<option value="6a">الصف السادس أ</option>
							</select>
						</div>
						<div class="col-12">
							<label class="form-label">تاريخ التقييم</label>
							<input type="date" class="form-control" required>
						</div>
						<div class="col-12">
							<label class="form-label">وصف التقييم</label>
							<textarea class="form-control" rows="3" placeholder="وصف مختصر للتقييم..."></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
				<button type="button" class="btn btn-primary">إضافة التقييم</button>
			</div>
		</div>
	</div>
</div>

<script>
	// حساب الدرجات والمتوسطات
	document.addEventListener('DOMContentLoaded', function() {
		// إضافة event listeners لحقول الدرجات
		document.querySelectorAll('.grade-input').forEach(input => {
			input.addEventListener('input', function() {
				updateStudentTotal(this.getAttribute('data-student'));
				calculateClassAverages();
			});
		});
		
		// حساب المتوسطات عند التحميل
		calculateClassAverages();
	});
	
	function updateStudentTotal(studentId) {
		const inputs = document.querySelectorAll(`[data-student="${studentId}"].grade-input`);
		let total = 0;
		
		inputs.forEach(input => {
			const value = parseFloat(input.value) || 0;
			total += value;
		});
		
		// تحديث المجموع
		const totalElement = document.querySelector(`.total-grade[data-student="${studentId}"]`);
		totalElement.textContent = total;
		
		// تحديث النسبة المئوية
		const percentage = Math.round(total);
		const percentageElement = document.querySelector(`.percentage[data-student="${studentId}"]`);
		percentageElement.textContent = percentage + '%';
		
		// تحديث التقدير
		const gradeElement = document.querySelector(`.grade-badge[data-student="${studentId}"]`);
		const grade = getGrade(percentage);
		gradeElement.textContent = grade.text;
		gradeElement.className = `badge ${grade.class} grade-badge`;
	}
	
	function getGrade(percentage) {
		if (percentage >= 90) return { text: 'ممتاز', class: 'bg-success' };
		if (percentage >= 80) return { text: 'جيد جداً', class: 'bg-success' };
		if (percentage >= 70) return { text: 'جيد', class: 'bg-primary' };
		if (percentage >= 60) return { text: 'مقبول', class: 'bg-warning' };
		return { text: 'ضعيف', class: 'bg-danger' };
	}
	
	function calculateClassAverages() {
		const examTypes = ['quiz1', 'hw1', 'midterm', 'project', 'final'];
		
		examTypes.forEach(examType => {
			const inputs = document.querySelectorAll(`[data-exam="${examType}"]`);
			let sum = 0;
			let count = 0;
			
			inputs.forEach(input => {
				const value = parseFloat(input.value);
				if (!isNaN(value)) {
					sum += value;
					count++;
				}
			});
			
			const average = count > 0 ? (sum / count).toFixed(2) : 0;
			const avgElement = document.getElementById(`avg${examType.charAt(0).toUpperCase() + examType.slice(1)}`);
			if (avgElement) {
				avgElement.textContent = average;
			}
		});
		
		// حساب متوسط المجموع العام
		const totalElements = document.querySelectorAll('.total-grade');
		let totalSum = 0;
		let totalCount = 0;
		
		totalElements.forEach(element => {
			const value = parseFloat(element.textContent);
			if (!isNaN(value)) {
				totalSum += value;
				totalCount++;
			}
		});
		
		const totalAverage = totalCount > 0 ? Math.round(totalSum / totalCount) : 0;
		document.getElementById('avgTotal').textContent = totalAverage;
		document.getElementById('avgPercentage').textContent = totalAverage + '%';
	}
	
	function calculateAverages() {
		calculateClassAverages();
		alert('تم حساب المتوسطات بنجاح!');
	}
	
	function saveGrades() {
		// جمع جميع الدرجات
		const grades = [];
		document.querySelectorAll('.grade-input').forEach(input => {
			grades.push({
				student: input.getAttribute('data-student'),
				exam: input.getAttribute('data-exam'),
				grade: input.value
			});
		});
		
		// محاكاة حفظ البيانات
		console.log('حفظ الدرجات:', grades);
		alert('تم حفظ جميع الدرجات بنجاح!');
	}
	
	function exportGrades() {
		alert('سيتم تصدير الدرجات إلى ملف Excel...');
	}
	
	function sendGradeNotifications() {
		alert('تم إرسال النتائج إلى أولياء الأمور عبر البريد الإلكتروني والرسائل النصية.');
	}
</script>
