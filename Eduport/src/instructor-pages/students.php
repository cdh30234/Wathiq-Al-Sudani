<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">إدارة الطلاب</h1>
	</div>
</div>

<!-- البحث والفلترة START -->
<div class="row g-4 mb-4">
	<div class="col-md-6 col-lg-4">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="البحث عن طالب...">
			<button class="btn btn-outline-primary" type="button">
				<i class="bi bi-search"></i>
			</button>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<select class="form-select">
			<option value="">جميع الفصول</option>
			<option value="5a">الصف الخامس أ</option>
			<option value="5b">الصف الخامس ب</option>
			<option value="6a">الصف السادس أ</option>
		</select>
	</div>
	<div class="col-md-6 col-lg-3">
		<select class="form-select">
			<option value="">جميع المواد</option>
			<option value="math">الرياضيات</option>
			<option value="science">العلوم</option>
			<option value="geography">الجغرافيا</option>
		</select>
	</div>
	<div class="col-md-6 col-lg-2">
		<button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addStudentModal">
			<i class="bi bi-plus-circle me-2"></i>إضافة طالب
		</button>
	</div>
</div>
<!-- البحث والفلترة END -->

<!-- إحصائيات سريعة START -->
<div class="row g-4 mb-4">
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-primary bg-opacity-10 border border-primary border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-primary">125</h4>
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
					<h4 class="mb-0 text-success">118</h4>
					<span class="h6 fw-light mb-0">حاضرون اليوم</span>
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
					<h4 class="mb-0 text-warning">7</h4>
					<span class="h6 fw-light mb-0">غائبون اليوم</span>
				</div>
				<div class="icon-lg bg-warning rounded-circle">
					<i class="bi bi-x-circle text-white"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-info bg-opacity-10 border border-info border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-info">87.5</h4>
					<span class="h6 fw-light mb-0">متوسط الدرجات</span>
				</div>
				<div class="icon-lg bg-info rounded-circle">
					<i class="bi bi-award text-white"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- إحصائيات سريعة END -->

<!-- جدول الطلاب START -->
<div class="card shadow">
	<div class="card-header border-bottom">
		<div class="d-sm-flex justify-content-sm-between align-items-center">
			<h5 class="card-title mb-2 mb-sm-0">قائمة الطلاب</h5>
			<div class="d-flex gap-2">
				<button class="btn btn-outline-success btn-sm">
					<i class="bi bi-download me-1"></i>تصدير Excel
				</button>
				<button class="btn btn-outline-primary btn-sm">
					<i class="bi bi-printer me-1"></i>طباعة
				</button>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover align-middle">
				<thead class="table-light">
					<tr>
						<th scope="col">
							<input class="form-check-input" type="checkbox" id="selectAll">
						</th>
						<th scope="col">الطالب</th>
						<th scope="col">رقم الطالب</th>
						<th scope="col">الفصل</th>
						<th scope="col">الحضور</th>
						<th scope="col">متوسط الدرجات</th>
						<th scope="col">الحالة</th>
						<th scope="col">الإجراءات</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<input class="form-check-input" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<img src="assets/images/avatar/01.jpg" class="rounded-circle me-2" width="40" height="40" alt="">
								<div>
									<h6 class="mb-0">أحمد محمد علي</h6>
									<small class="text-muted">ahmed.student@school.edu.sa</small>
								</div>
							</div>
						</td>
						<td><span class="badge bg-primary">2024001</span></td>
						<td>الصف الخامس أ</td>
						<td>
							<div class="d-flex align-items-center">
								<span class="me-2">95%</span>
								<div class="progress" style="width: 60px; height: 8px;">
									<div class="progress-bar bg-success" style="width: 95%"></div>
								</div>
							</div>
						</td>
						<td><span class="badge bg-success">92.5</span></td>
						<td><span class="badge bg-success">نشط</span></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض التفاصيل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-envelope me-2"></i>إرسال رسالة</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
								</ul>
							</div>
						</td>
					</tr>
					
					<tr>
						<td>
							<input class="form-check-input" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<img src="assets/images/avatar/02.jpg" class="rounded-circle me-2" width="40" height="40" alt="">
								<div>
									<h6 class="mb-0">فاطمة أحمد محمد</h6>
									<small class="text-muted">fatima.student@school.edu.sa</small>
								</div>
							</div>
						</td>
						<td><span class="badge bg-primary">2024002</span></td>
						<td>الصف الخامس أ</td>
						<td>
							<div class="d-flex align-items-center">
								<span class="me-2">88%</span>
								<div class="progress" style="width: 60px; height: 8px;">
									<div class="progress-bar bg-warning" style="width: 88%"></div>
								</div>
							</div>
						</td>
						<td><span class="badge bg-success">89.0</span></td>
						<td><span class="badge bg-success">نشط</span></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض التفاصيل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-envelope me-2"></i>إرسال رسالة</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
								</ul>
							</div>
						</td>
					</tr>
					
					<tr>
						<td>
							<input class="form-check-input" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<img src="assets/images/avatar/03.jpg" class="rounded-circle me-2" width="40" height="40" alt="">
								<div>
									<h6 class="mb-0">محمد سارة خالد</h6>
									<small class="text-muted">mohamed.student@school.edu.sa</small>
								</div>
							</div>
						</td>
						<td><span class="badge bg-primary">2024003</span></td>
						<td>الصف الخامس ب</td>
						<td>
							<div class="d-flex align-items-center">
								<span class="me-2">76%</span>
								<div class="progress" style="width: 60px; height: 8px;">
									<div class="progress-bar bg-danger" style="width: 76%"></div>
								</div>
							</div>
						</td>
						<td><span class="badge bg-warning">75.5</span></td>
						<td><span class="badge bg-warning">تحت المراقبة</span></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض التفاصيل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-envelope me-2"></i>إرسال رسالة</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
								</ul>
							</div>
						</td>
					</tr>
					
					<tr>
						<td>
							<input class="form-check-input" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<img src="assets/images/avatar/04.jpg" class="rounded-circle me-2" width="40" height="40" alt="">
								<div>
									<h6 class="mb-0">نورا عبدالله أحمد</h6>
									<small class="text-muted">nora.student@school.edu.sa</small>
								</div>
							</div>
						</td>
						<td><span class="badge bg-primary">2024004</span></td>
						<td>الصف السادس أ</td>
						<td>
							<div class="d-flex align-items-center">
								<span class="me-2">98%</span>
								<div class="progress" style="width: 60px; height: 8px;">
									<div class="progress-bar bg-success" style="width: 98%"></div>
								</div>
							</div>
						</td>
						<td><span class="badge bg-success">96.0</span></td>
						<td><span class="badge bg-success">متفوق</span></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض التفاصيل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-envelope me-2"></i>إرسال رسالة</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
								</ul>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<!-- Pagination -->
		<nav class="mt-4">
			<ul class="pagination justify-content-center">
				<li class="page-item disabled">
					<a class="page-link" href="#">السابق</a>
				</li>
				<li class="page-item active"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#">التالي</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- جدول الطلاب END -->

<!-- إضافة طالب Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">إضافة طالب جديد</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form>
					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">الاسم الأول</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">الاسم الأخير</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">رقم الطالب</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">تاريخ الميلاد</label>
							<input type="date" class="form-control" required>
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
						<div class="col-md-6">
							<label class="form-label">الجنس</label>
							<select class="form-select" required>
								<option value="">اختر الجنس</option>
								<option value="male">ذكر</option>
								<option value="female">أنثى</option>
							</select>
						</div>
						<div class="col-md-6">
							<label class="form-label">البريد الإلكتروني</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">رقم الهاتف</label>
							<input type="tel" class="form-control">
						</div>
						<div class="col-12">
							<label class="form-label">العنوان</label>
							<textarea class="form-control" rows="3"></textarea>
						</div>
						<div class="col-12">
							<label class="form-label">ملاحظات</label>
							<textarea class="form-control" rows="2"></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
				<button type="button" class="btn btn-primary">إضافة الطالب</button>
			</div>
		</div>
	</div>
</div>
