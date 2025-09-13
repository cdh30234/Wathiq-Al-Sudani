<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">إعدادات النظام</h1>
	</div>
</div>

<div class="row g-4">
	
	<!-- Settings Menu -->
	<div class="col-xl-3">
		<div class="card shadow">
			<div class="card-body">
				<div class="list-group list-group-flush">
					<a href="#general" class="list-group-item list-group-item-action active" data-bs-toggle="pill">
						<i class="bi bi-gear me-2"></i>الإعدادات العامة
					</a>
					<a href="#school" class="list-group-item list-group-item-action" data-bs-toggle="pill">
						<i class="bi bi-building me-2"></i>معلومات المدرسة
					</a>
					<a href="#academic" class="list-group-item list-group-item-action" data-bs-toggle="pill">
						<i class="bi bi-book me-2"></i>الإعدادات الأكاديمية
					</a>
					<a href="#notifications" class="list-group-item list-group-item-action" data-bs-toggle="pill">
						<i class="bi bi-bell me-2"></i>الإشعارات
					</a>
					<a href="#backup" class="list-group-item list-group-item-action" data-bs-toggle="pill">
						<i class="bi bi-cloud-arrow-up me-2"></i>النسخ الاحتياطي
					</a>
					<a href="#users" class="list-group-item list-group-item-action" data-bs-toggle="pill">
						<i class="bi bi-people me-2"></i>إدارة المستخدمين
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Settings Content -->
	<div class="col-xl-9">
		<div class="tab-content">
			
			<!-- General Settings -->
			<div class="tab-pane fade show active" id="general">
				<div class="card shadow">
					<div class="card-header">
						<h5 class="card-title mb-0">الإعدادات العامة</h5>
					</div>
					<div class="card-body">
						<form>
							<div class="row g-3">
								<div class="col-md-6">
									<label class="form-label">اسم النظام</label>
									<input type="text" class="form-control" value="نظام إدارة المدرسة">
								</div>
								<div class="col-md-6">
									<label class="form-label">إصدار النظام</label>
									<input type="text" class="form-control" value="1.0.0" readonly>
								</div>
								<div class="col-md-6">
									<label class="form-label">اللغة الافتراضية</label>
									<select class="form-select">
										<option selected>العربية</option>
										<option>الإنجليزية</option>
									</select>
								</div>
								<div class="col-md-6">
									<label class="form-label">المنطقة الزمنية</label>
									<select class="form-select">
										<option selected>آسيا/الرياض</option>
										<option>آسيا/دبي</option>
										<option>آسيا/الكويت</option>
									</select>
								</div>
								<div class="col-md-6">
									<label class="form-label">تنسيق التاريخ</label>
									<select class="form-select">
										<option selected>dd/mm/yyyy</option>
										<option>mm/dd/yyyy</option>
										<option>yyyy-mm-dd</option>
									</select>
								</div>
								<div class="col-md-6">
									<label class="form-label">تنسيق الوقت</label>
									<select class="form-select">
										<option selected>24 ساعة</option>
										<option>12 ساعة</option>
									</select>
								</div>
							</div>
							<div class="text-end mt-3">
								<button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- School Information -->
			<div class="tab-pane fade" id="school">
				<div class="card shadow">
					<div class="card-header">
						<h5 class="card-title mb-0">معلومات المدرسة</h5>
					</div>
					<div class="card-body">
						<form>
							<div class="row g-3">
								<div class="col-md-6">
									<label class="form-label">اسم المدرسة</label>
									<input type="text" class="form-control" value="مدرسة النور الابتدائية">
								</div>
								<div class="col-md-6">
									<label class="form-label">رقم الترخيص</label>
									<input type="text" class="form-control" value="EDU-2023-001">
								</div>
								<div class="col-12">
									<label class="form-label">العنوان</label>
									<textarea class="form-control" rows="3">الرياض، حي الملز، شارع الأمير محمد بن عبدالعزيز، المملكة العربية السعودية</textarea>
								</div>
								<div class="col-md-6">
									<label class="form-label">هاتف المدرسة</label>
									<input type="tel" class="form-control" value="+966 11 123 4567">
								</div>
								<div class="col-md-6">
									<label class="form-label">البريد الإلكتروني</label>
									<input type="email" class="form-control" value="info@alnoor-school.edu.sa">
								</div>
								<div class="col-md-6">
									<label class="form-label">الموقع الإلكتروني</label>
									<input type="url" class="form-control" value="https://www.alnoor-school.edu.sa">
								</div>
								<div class="col-md-6">
									<label class="form-label">سنة التأسيس</label>
									<input type="number" class="form-control" value="2010">
								</div>
								<div class="col-12">
									<label class="form-label">شعار المدرسة</label>
									<input type="file" class="form-control" accept="image/*">
									<small class="text-muted">الحد الأقصى: 2 ميجابايت</small>
								</div>
							</div>
							<div class="text-end mt-3">
								<button type="submit" class="btn btn-primary">حفظ المعلومات</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Academic Settings -->
			<div class="tab-pane fade" id="academic">
				<div class="card shadow">
					<div class="card-header">
						<h5 class="card-title mb-0">الإعدادات الأكاديمية</h5>
					</div>
					<div class="card-body">
						<form>
							<div class="row g-3">
								<div class="col-md-6">
									<label class="form-label">بداية العام الدراسي</label>
									<input type="date" class="form-control" value="2024-09-01">
								</div>
								<div class="col-md-6">
									<label class="form-label">نهاية العام الدراسي</label>
									<input type="date" class="form-control" value="2025-06-30">
								</div>
								<div class="col-md-6">
									<label class="form-label">عدد الفصول الدراسية</label>
									<select class="form-select">
										<option>فصل واحد</option>
										<option selected>فصلان دراسيان</option>
										<option>ثلاثة فصول</option>
									</select>
								</div>
								<div class="col-md-6">
									<label class="form-label">مدة الحصة (بالدقائق)</label>
									<input type="number" class="form-control" value="45">
								</div>
								<div class="col-md-6">
									<label class="form-label">أيام الدراسة في الأسبوع</label>
									<select class="form-select">
										<option selected>5 أيام</option>
										<option>6 أيام</option>
									</select>
								</div>
								<div class="col-md-6">
									<label class="form-label">النسبة المطلوبة للنجاح</label>
									<input type="number" class="form-control" value="60" min="0" max="100">
								</div>
								
								<div class="col-12 mt-4">
									<h6>درجات التقدير</h6>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>التقدير</th>
													<th>من</th>
													<th>إلى</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>ممتاز</td>
													<td><input type="number" class="form-control form-control-sm" value="90"></td>
													<td>100</td>
												</tr>
												<tr>
													<td>جيد جداً</td>
													<td><input type="number" class="form-control form-control-sm" value="80"></td>
													<td>89</td>
												</tr>
												<tr>
													<td>جيد</td>
													<td><input type="number" class="form-control form-control-sm" value="70"></td>
													<td>79</td>
												</tr>
												<tr>
													<td>مقبول</td>
													<td><input type="number" class="form-control form-control-sm" value="60"></td>
													<td>69</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="text-end mt-3">
								<button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Notifications -->
			<div class="tab-pane fade" id="notifications">
				<div class="card shadow">
					<div class="card-header">
						<h5 class="card-title mb-0">إعدادات الإشعارات</h5>
					</div>
					<div class="card-body">
						<div class="row g-3">
							<div class="col-12">
								<div class="card bg-light">
									<div class="card-body">
										<div class="d-flex justify-content-between align-items-center mb-3">
											<h6 class="mb-0">إشعارات البريد الإلكتروني</h6>
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="emailNotifications" checked>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="newStudent" checked>
													<label class="form-check-label" for="newStudent">تسجيل طالب جديد</label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="gradeEntry" checked>
													<label class="form-check-label" for="gradeEntry">إدخال الدرجات</label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="attendance">
													<label class="form-check-label" for="attendance">تسجيل الحضور</label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="announcements" checked>
													<label class="form-check-label" for="announcements">الإعلانات الجديدة</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="card bg-light">
									<div class="card-body">
										<div class="d-flex justify-content-between align-items-center mb-3">
											<h6 class="mb-0">الرسائل النصية</h6>
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="smsNotifications">
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<label class="form-label">مزود الخدمة</label>
												<select class="form-select">
													<option>اختر المزود</option>
													<option>STC</option>
													<option>Mobily</option>
													<option>Zain</option>
												</select>
											</div>
											<div class="col-md-4">
												<label class="form-label">اسم المستخدم</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-4">
												<label class="form-label">كلمة المرور</label>
												<input type="password" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="text-end mt-3">
							<button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Backup Settings -->
			<div class="tab-pane fade" id="backup">
				<div class="card shadow">
					<div class="card-header">
						<h5 class="card-title mb-0">النسخ الاحتياطي</h5>
					</div>
					<div class="card-body">
						<div class="row g-3">
							<div class="col-12">
								<div class="alert alert-info">
									<i class="bi bi-info-circle me-2"></i>
									يتم إنشاء نسخة احتياطية تلقائية كل يوم في الساعة 2:00 صباحاً
								</div>
							</div>
							<div class="col-md-6">
								<label class="form-label">تكرار النسخ الاحتياطي</label>
								<select class="form-select">
									<option selected>يومي</option>
									<option>أسبوعي</option>
									<option>شهري</option>
								</select>
							</div>
							<div class="col-md-6">
								<label class="form-label">وقت النسخ الاحتياطي</label>
								<input type="time" class="form-control" value="02:00">
							</div>
							<div class="col-12">
								<h6 class="mt-4 mb-3">النسخ الاحتياطية المتاحة</h6>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>التاريخ</th>
												<th>الحجم</th>
												<th>النوع</th>
												<th>الإجراءات</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>10 سبتمبر 2025 - 02:00</td>
												<td>45.2 ميجابايت</td>
												<td><span class="badge bg-primary">تلقائي</span></td>
												<td>
													<button class="btn btn-sm btn-outline-primary">تحميل</button>
													<button class="btn btn-sm btn-outline-danger">حذف</button>
												</td>
											</tr>
											<tr>
												<td>09 سبتمبر 2025 - 02:00</td>
												<td>44.8 ميجابايت</td>
												<td><span class="badge bg-primary">تلقائي</span></td>
												<td>
													<button class="btn btn-sm btn-outline-primary">تحميل</button>
													<button class="btn btn-sm btn-outline-danger">حذف</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-12">
								<button class="btn btn-success">
									<i class="bi bi-cloud-arrow-up me-2"></i>إنشاء نسخة احتياطية الآن
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- User Management -->
			<div class="tab-pane fade" id="users">
				<div class="card shadow">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h5 class="card-title mb-0">إدارة المستخدمين</h5>
						<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
							<i class="bi bi-plus-circle me-1"></i>إضافة مستخدم
						</button>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>المستخدم</th>
										<th>الدور</th>
										<th>آخر تسجيل دخول</th>
										<th>الحالة</th>
										<th>الإجراءات</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/01.jpg" class="rounded-circle me-2" width="40" height="40" alt="">
												<div>
													<h6 class="mb-0">أحمد المدير</h6>
													<small class="text-muted">ahmed@school.edu.sa</small>
												</div>
											</div>
										</td>
										<td><span class="badge bg-danger">مدير</span></td>
										<td>منذ ساعتين</td>
										<td><span class="badge bg-success">نشط</span></td>
										<td>
											<button class="btn btn-sm btn-outline-primary">تعديل</button>
											<button class="btn btn-sm btn-outline-danger">تعطيل</button>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<img src="assets/images/avatar/02.jpg" class="rounded-circle me-2" width="40" height="40" alt="">
												<div>
													<h6 class="mb-0">فاطمة المعلمة</h6>
													<small class="text-muted">fatima@school.edu.sa</small>
												</div>
											</div>
										</td>
										<td><span class="badge bg-primary">معلم</span></td>
										<td>أمس</td>
										<td><span class="badge bg-success">نشط</span></td>
										<td>
											<button class="btn btn-sm btn-outline-primary">تعديل</button>
											<button class="btn btn-sm btn-outline-danger">تعطيل</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">إضافة مستخدم جديد</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form>
					<div class="mb-3">
						<label class="form-label">الاسم الكامل</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">البريد الإلكتروني</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">الدور</label>
						<select class="form-select" required>
							<option value="">اختر الدور</option>
							<option value="admin">مدير</option>
							<option value="teacher">معلم</option>
							<option value="secretary">سكرتير</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">كلمة المرور المؤقتة</label>
						<input type="password" class="form-control" required>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
				<button type="button" class="btn btn-primary">إضافة المستخدم</button>
			</div>
		</div>
	</div>
</div>
