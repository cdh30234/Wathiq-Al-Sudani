<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<div class="d-sm-flex justify-content-between align-items-center">
			<h1 class="h3 mb-2 mb-sm-0">إدارة الطلاب</h1>
			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
				<i class="bi bi-plus-circle me-2"></i>إضافة طالب جديد
			</button>
		</div>
	</div>
</div>

<!-- Filter and Search START -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="row g-3">
			<!-- Search -->
			<div class="col-lg-4">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="البحث عن طالب..." id="studentSearch">
					<button class="btn btn-outline-secondary" type="button">
						<i class="bi bi-search"></i>
					</button>
				</div>
			</div>
			
			<!-- Class Filter -->
			<div class="col-lg-3">
				<select class="form-select" id="classFilter">
					<option value="">جميع الفصول</option>
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
			
			<!-- Status Filter -->
			<div class="col-lg-3">
				<select class="form-select" id="statusFilter">
					<option value="">جميع الحالات</option>
					<option value="نشط">نشط</option>
					<option value="غير نشط">غير نشط</option>
					<option value="متخرج">متخرج</option>
				</select>
			</div>
			
			<!-- Export Button -->
			<div class="col-lg-2">
				<button class="btn btn-success w-100">
					<i class="bi bi-download me-2"></i>تصدير
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Filter and Search END -->

<!-- Students Table START -->
<div class="card shadow">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover align-middle">
				<thead class="table-dark">
					<tr>
						<th scope="col">
							<input class="form-check-input" type="checkbox" id="selectAll">
						</th>
						<th scope="col">الطالب</th>
						<th scope="col">رقم الهوية</th>
						<th scope="col">الفصل</th>
						<th scope="col">ولي الأمر</th>
						<th scope="col">الهاتف</th>
						<th scope="col">الحالة</th>
						<th scope="col">الإجراءات</th>
					</tr>
				</thead>
				<tbody>
					<!-- Student Row 1 -->
					<tr>
						<td>
							<input class="form-check-input" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<div class="avatar avatar-sm me-3">
									<img src="assets/images/avatar/01.jpg" class="rounded-circle" alt="">
								</div>
								<div>
									<h6 class="mb-0">أحمد محمد علي</h6>
									<small class="text-muted">ahmed.ali@example.com</small>
								</div>
							</div>
						</td>
						<td>1234567890</td>
						<td><span class="badge bg-primary bg-opacity-10 text-primary">السابع أ</span></td>
						<td>محمد علي أحمد</td>
						<td>+966 50 123 4567</td>
						<td><span class="badge bg-success">نشط</span></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-graph-up me-2"></i>الدرجات</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
								</ul>
							</div>
						</td>
					</tr>

					<!-- Student Row 2 -->
					<tr>
						<td>
							<input class="form-check-input" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<div class="avatar avatar-sm me-3">
									<img src="assets/images/avatar/02.jpg" class="rounded-circle" alt="">
								</div>
								<div>
									<h6 class="mb-0">فاطمة أحمد محمد</h6>
									<small class="text-muted">fatima.ahmed@example.com</small>
								</div>
							</div>
						</td>
						<td>0987654321</td>
						<td><span class="badge bg-info bg-opacity-10 text-info">الثامن ب</span></td>
						<td>أحمد محمد سالم</td>
						<td>+966 55 987 6543</td>
						<td><span class="badge bg-success">نشط</span></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-graph-up me-2"></i>الدرجات</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
								</ul>
							</div>
						</td>
					</tr>

					<!-- Student Row 3 -->
					<tr>
						<td>
							<input class="form-check-input" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<div class="avatar avatar-sm me-3">
									<img src="assets/images/avatar/03.jpg" class="rounded-circle" alt="">
								</div>
								<div>
									<h6 class="mb-0">محمد علي حسن</h6>
									<small class="text-muted">mohammed.hassan@example.com</small>
								</div>
							</div>
						</td>
						<td>1357924680</td>
						<td><span class="badge bg-warning bg-opacity-10 text-warning">التاسع أ</span></td>
						<td>علي حسن محمد</td>
						<td>+966 56 147 2583</td>
						<td><span class="badge bg-success">نشط</span></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-graph-up me-2"></i>الدرجات</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
								</ul>
							</div>
						</td>
					</tr>

					<!-- Student Row 4 -->
					<tr>
						<td>
							<input class="form-check-input" type="checkbox">
						</td>
						<td>
							<div class="d-flex align-items-center">
								<div class="avatar avatar-sm me-3">
									<img src="assets/images/avatar/04.jpg" class="rounded-circle" alt="">
								</div>
								<div>
									<h6 class="mb-0">نور الهدى سالم</h6>
									<small class="text-muted">noor.salem@example.com</small>
								</div>
							</div>
						</td>
						<td>2468013579</td>
						<td><span class="badge bg-success bg-opacity-10 text-success">السادس ب</span></td>
						<td>سالم أحمد علي</td>
						<td>+966 54 369 1472</td>
						<td><span class="badge bg-warning">معلق</span></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-graph-up me-2"></i>الدرجات</a></li>
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
		<nav aria-label="Page navigation">
			<ul class="pagination justify-content-center mt-4">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">السابق</a>
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
<!-- Students Table END -->

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">إضافة طالب جديد</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
							<label class="form-label">رقم الهوية</label>
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
								<option value="السادس أ">السادس أ</option>
								<option value="السادس ب">السادس ب</option>
								<option value="السابع أ">السابع أ</option>
								<option value="السابع ب">السابع ب</option>
							</select>
						</div>
						<div class="col-md-6">
							<label class="form-label">البريد الإلكتروني</label>
							<input type="email" class="form-control">
						</div>
						<div class="col-md-6">
							<label class="form-label">اسم ولي الأمر</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">هاتف ولي الأمر</label>
							<input type="tel" class="form-control" required>
						</div>
						<div class="col-12">
							<label class="form-label">العنوان</label>
							<textarea class="form-control" rows="3"></textarea>
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
