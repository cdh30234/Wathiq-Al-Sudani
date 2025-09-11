<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">الملف الشخصي</h1>
	</div>
</div>

<!-- معلومات الطالب START -->
<div class="row g-4">
	<div class="col-xl-4">
		<div class="card">
			<div class="card-body text-center">
				<!-- صورة الطالب -->
				<div class="avatar avatar-xl mx-auto mb-3">
					<img class="avatar-img rounded-circle" src="assets/images/avatar/student-01.jpg" alt="">
				</div>
				<h5 class="mb-1">أحمد محمد العلي</h5>
				<p class="text-muted mb-3">طالب - الصف الثالث الثانوي</p>
				
				<!-- إحصائيات سريعة -->
				<div class="row g-2 text-center">
					<div class="col-4">
						<div class="bg-light rounded p-2">
							<h6 class="mb-0">88.5</h6>
							<small>المعدل العام</small>
						</div>
					</div>
					<div class="col-4">
						<div class="bg-light rounded p-2">
							<h6 class="mb-0">85%</h6>
							<small>الحضور</small>
						</div>
					</div>
					<div class="col-4">
						<div class="bg-light rounded p-2">
							<h6 class="mb-0">5</h6>
							<small>المواد</small>
						</div>
					</div>
				</div>
				
				<button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">
					<i class="bi bi-pencil me-2"></i>تعديل الملف الشخصي
				</button>
			</div>
		</div>
		
		<!-- معلومات الاتصال -->
		<div class="card mt-4">
			<div class="card-header">
				<h6 class="card-title mb-0">معلومات الاتصال</h6>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<label class="small text-muted">البريد الإلكتروني</label>
					<p class="mb-0">ahmed.alali@student.school.com</p>
				</div>
				<div class="mb-3">
					<label class="small text-muted">رقم الهاتف</label>
					<p class="mb-0">+966 50 987 6543</p>
				</div>
				<div class="mb-3">
					<label class="small text-muted">العنوان</label>
					<p class="mb-0">الرياض، المملكة العربية السعودية</p>
				</div>
				<div class="mb-0">
					<label class="small text-muted">تاريخ الالتحاق</label>
					<p class="mb-0">سبتمبر 2022</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-xl-8">
		<!-- معلومات أساسية -->
		<div class="card mb-4">
			<div class="card-header">
				<h5 class="card-title mb-0">المعلومات الأساسية</h5>
			</div>
			<div class="card-body">
				<div class="row g-3">
					<div class="col-md-6">
						<label class="form-label">الاسم الأول</label>
						<input type="text" class="form-control" value="أحمد" readonly>
					</div>
					<div class="col-md-6">
						<label class="form-label">الاسم الأخير</label>
						<input type="text" class="form-control" value="محمد العلي" readonly>
					</div>
					<div class="col-md-6">
						<label class="form-label">رقم الطالب</label>
						<input type="text" class="form-control" value="STU2024001" readonly>
					</div>
					<div class="col-md-6">
						<label class="form-label">الصف الدراسي</label>
						<input type="text" class="form-control" value="الثالث الثانوي - القسم العلمي" readonly>
					</div>
					<div class="col-md-6">
						<label class="form-label">تاريخ الميلاد</label>
						<input type="date" class="form-control" value="2006-03-15" readonly>
					</div>
					<div class="col-md-6">
						<label class="form-label">الجنسية</label>
						<input type="text" class="form-control" value="سعودي" readonly>
					</div>
				</div>
			</div>
		</div>
		
		<!-- المواد المسجلة -->
		<div class="card mb-4">
			<div class="card-header">
				<h5 class="card-title mb-0">المواد المسجلة</h5>
			</div>
			<div class="card-body">
				<div class="row g-3">
					<div class="col-md-6">
						<div class="d-flex align-items-center border-bottom pb-3 mb-3">
							<div class="icon-lg bg-primary bg-opacity-10 rounded-circle flex-shrink-0">
								<i class="bi bi-calculator text-primary"></i>
							</div>
							<div class="ms-3">
								<h6 class="mb-1">الرياضيات</h6>
								<small class="text-muted">د. أحمد محمد - درجة: 91/100</small>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="d-flex align-items-center border-bottom pb-3 mb-3">
							<div class="icon-lg bg-success bg-opacity-10 rounded-circle flex-shrink-0">
								<i class="bi bi-lightning text-success"></i>
							</div>
							<div class="ms-3">
								<h6 class="mb-1">الفيزياء</h6>
								<small class="text-muted">د. سارة علي - درجة: 87/100</small>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="d-flex align-items-center border-bottom pb-3 mb-3">
							<div class="icon-lg bg-warning bg-opacity-10 rounded-circle flex-shrink-0">
								<i class="bi bi-droplet text-warning"></i>
							</div>
							<div class="ms-3">
								<h6 class="mb-1">الكيمياء</h6>
								<small class="text-muted">د. محمد حسن - درجة: 85/100</small>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="d-flex align-items-center border-bottom pb-3 mb-3">
							<div class="icon-lg bg-info bg-opacity-10 rounded-circle flex-shrink-0">
								<i class="bi bi-type text-info"></i>
							</div>
							<div class="ms-3">
								<h6 class="mb-1">اللغة العربية</h6>
								<small class="text-muted">د. فاطمة أحمد - درجة: 92/100</small>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="d-flex align-items-center">
							<div class="icon-lg bg-danger bg-opacity-10 rounded-circle flex-shrink-0">
								<i class="bi bi-clock-history text-danger"></i>
							</div>
							<div class="ms-3">
								<h6 class="mb-1">التاريخ</h6>
								<small class="text-muted">د. عبدالله سالم - درجة: 78/100</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- الإنجازات والشهادات -->
		<div class="card mb-4">
			<div class="card-header">
				<h5 class="card-title mb-0">الإنجازات والشهادات</h5>
			</div>
			<div class="card-body">
				<div class="d-flex align-items-center border-bottom pb-3 mb-3">
					<div class="icon-lg bg-warning bg-opacity-10 rounded-circle flex-shrink-0">
						<i class="bi bi-trophy text-warning"></i>
					</div>
					<div class="ms-3">
						<h6 class="mb-1">المركز الأول في مسابقة الرياضيات</h6>
						<small class="text-muted">مسابقة الرياضيات على مستوى المدرسة - مايو 2024</small>
					</div>
				</div>
				<div class="d-flex align-items-center border-bottom pb-3 mb-3">
					<div class="icon-lg bg-success bg-opacity-10 rounded-circle flex-shrink-0">
						<i class="bi bi-award text-success"></i>
					</div>
					<div class="ms-3">
						<h6 class="mb-1">شهادة تقدير للأداء المتميز</h6>
						<small class="text-muted">للتفوق الأكاديمي في الفصل الثاني - يونيو 2024</small>
					</div>
				</div>
				<div class="d-flex align-items-center">
					<div class="icon-lg bg-primary bg-opacity-10 rounded-circle flex-shrink-0">
						<i class="bi bi-people text-primary"></i>
					</div>
					<div class="ms-3">
						<h6 class="mb-1">شهادة المشاركة في النشاط الطلابي</h6>
						<small class="text-muted">للمشاركة الفعالة في الأنشطة اللامنهجية - أبريل 2024</small>
					</div>
				</div>
			</div>
		</div>
		
		<!-- معلومات ولي الأمر -->
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">معلومات ولي الأمر</h5>
			</div>
			<div class="card-body">
				<div class="row g-3">
					<div class="col-md-6">
						<label class="form-label">اسم ولي الأمر</label>
						<input type="text" class="form-control" value="محمد علي العلي" readonly>
					</div>
					<div class="col-md-6">
						<label class="form-label">صلة القرابة</label>
						<input type="text" class="form-control" value="الوالد" readonly>
					</div>
					<div class="col-md-6">
						<label class="form-label">رقم الهاتف</label>
						<input type="tel" class="form-control" value="+966 50 123 4567" readonly>
					</div>
					<div class="col-md-6">
						<label class="form-label">البريد الإلكتروني</label>
						<input type="email" class="form-control" value="mohammed.alali@email.com" readonly>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal لتعديل الملف الشخصي -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editProfileModalLabel">تعديل الملف الشخصي</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form>
					<!-- تحديث الصورة -->
					<div class="text-center mb-4">
						<div class="avatar avatar-xl mx-auto mb-3">
							<img class="avatar-img rounded-circle" src="assets/images/avatar/student-01.jpg" alt="">
						</div>
						<button type="button" class="btn btn-outline-primary btn-sm">
							<i class="bi bi-camera me-2"></i>تغيير الصورة
						</button>
					</div>
					
					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">البريد الإلكتروني</label>
							<input type="email" class="form-control" value="ahmed.alali@student.school.com">
						</div>
						<div class="col-md-6">
							<label class="form-label">رقم الهاتف</label>
							<input type="tel" class="form-control" value="+966 50 987 6543">
						</div>
						<div class="col-12">
							<label class="form-label">العنوان</label>
							<input type="text" class="form-control" value="الرياض، المملكة العربية السعودية">
						</div>
						<div class="col-12">
							<label class="form-label">الهوايات والاهتمامات</label>
							<textarea class="form-control" rows="3" placeholder="اكتب هواياتك واهتماماتك...">القراءة، البرمجة، الرياضة</textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
				<button type="button" class="btn btn-primary">حفظ التغييرات</button>
			</div>
		</div>
	</div>
</div>
