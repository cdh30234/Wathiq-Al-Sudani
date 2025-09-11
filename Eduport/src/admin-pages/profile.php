<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">الملف الشخصي</h1>
	</div>
</div>

<div class="row g-4">
	
	<!-- Profile Info -->
	<div class="col-xl-4">
		<div class="card shadow">
			<div class="card-body text-center">
				<div class="position-relative mb-4">
					<img src="assets/images/avatar/01.jpg" class="rounded-circle border border-white border-3 shadow" width="120" height="120" alt="الصورة الشخصية">
					<button class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle" data-bs-toggle="modal" data-bs-target="#changePhotoModal">
						<i class="bi bi-pencil"></i>
					</button>
				</div>
				<h5 class="mb-1">أحمد محمد المدير</h5>
				<p class="text-muted mb-3">مدير المدرسة</p>
				<div class="d-flex justify-content-center gap-2 mb-4">
					<span class="badge bg-primary">مدير</span>
					<span class="badge bg-success">نشط</span>
				</div>
				
				<div class="row text-center">
					<div class="col-4">
						<h6 class="mb-0">5</h6>
						<small class="text-muted">سنوات الخبرة</small>
					</div>
					<div class="col-4">
						<h6 class="mb-0">156</h6>
						<small class="text-muted">الطلاب</small>
					</div>
					<div class="col-4">
						<h6 class="mb-0">24</h6>
						<small class="text-muted">المعلمون</small>
					</div>
				</div>
			</div>
		</div>

		<!-- Quick Actions -->
		<div class="card shadow mt-4">
			<div class="card-header">
				<h6 class="card-title mb-0">إجراءات سريعة</h6>
			</div>
			<div class="card-body">
				<div class="d-grid gap-2">
					<button class="btn btn-outline-primary btn-sm">
						<i class="bi bi-key me-2"></i>تغيير كلمة المرور
					</button>
					<button class="btn btn-outline-info btn-sm">
						<i class="bi bi-download me-2"></i>تصدير البيانات
					</button>
					<button class="btn btn-outline-warning btn-sm">
						<i class="bi bi-shield-check me-2"></i>إعدادات الأمان
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Profile Details -->
	<div class="col-xl-8">
		<div class="card shadow">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs" id="profileTabs" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab">
							المعلومات الشخصية
						</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab">
							معلومات الاتصال
						</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab">
							الأمان والخصوصية
						</button>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content" id="profileTabsContent">
					
					<!-- Personal Information Tab -->
					<div class="tab-pane fade show active" id="personal" role="tabpanel">
						<form>
							<div class="row g-3">
								<div class="col-md-6">
									<label class="form-label">الاسم الأول</label>
									<input type="text" class="form-control" value="أحمد">
								</div>
								<div class="col-md-6">
									<label class="form-label">الاسم الأخير</label>
									<input type="text" class="form-control" value="محمد المدير">
								</div>
								<div class="col-md-6">
									<label class="form-label">رقم الهوية</label>
									<input type="text" class="form-control" value="1234567890" readonly>
								</div>
								<div class="col-md-6">
									<label class="form-label">تاريخ الميلاد</label>
									<input type="date" class="form-control" value="1985-05-15">
								</div>
								<div class="col-md-6">
									<label class="form-label">الجنسية</label>
									<select class="form-select">
										<option selected>السعودية</option>
										<option>مصرية</option>
										<option>أردنية</option>
										<option>أخرى</option>
									</select>
								</div>
								<div class="col-md-6">
									<label class="form-label">الحالة الاجتماعية</label>
									<select class="form-select">
										<option>أعزب</option>
										<option selected>متزوج</option>
										<option>مطلق</option>
										<option>أرمل</option>
									</select>
								</div>
								<div class="col-12">
									<label class="form-label">العنوان</label>
									<textarea class="form-control" rows="3">الرياض، حي الملز، شارع الأمير محمد بن عبدالعزيز</textarea>
								</div>
								<div class="col-12">
									<label class="form-label">نبذة شخصية</label>
									<textarea class="form-control" rows="4">مدير مدرسة بخبرة 5 سنوات في التعليم والإدارة التربوية. حاصل على ماجستير في الإدارة التعليمية ولدي شغف بتطوير النظم التعليمية وتحسين جودة التعليم.</textarea>
								</div>
							</div>
							<div class="text-end mt-3">
								<button type="button" class="btn btn-secondary me-2">إلغاء</button>
								<button type="submit" class="btn btn-primary">حفظ التغييرات</button>
							</div>
						</form>
					</div>

					<!-- Contact Information Tab -->
					<div class="tab-pane fade" id="contact" role="tabpanel">
						<form>
							<div class="row g-3">
								<div class="col-md-6">
									<label class="form-label">البريد الإلكتروني الرسمي</label>
									<input type="email" class="form-control" value="ahmed.director@school.edu.sa">
								</div>
								<div class="col-md-6">
									<label class="form-label">البريد الإلكتروني الشخصي</label>
									<input type="email" class="form-control" value="ahmed.personal@gmail.com">
								</div>
								<div class="col-md-6">
									<label class="form-label">هاتف العمل</label>
									<input type="tel" class="form-control" value="+966 11 123 4567">
								</div>
								<div class="col-md-6">
									<label class="form-label">الهاتف الشخصي</label>
									<input type="tel" class="form-control" value="+966 50 123 4567">
								</div>
								<div class="col-md-6">
									<label class="form-label">هاتف الطوارئ</label>
									<input type="tel" class="form-control" value="+966 55 987 6543">
								</div>
								<div class="col-md-6">
									<label class="form-label">اسم جهة الاتصال في الطوارئ</label>
									<input type="text" class="form-control" value="زوجة - فاطمة أحمد">
								</div>
								<div class="col-12">
									<h6 class="mt-4 mb-3">وسائل التواصل الاجتماعي</h6>
								</div>
								<div class="col-md-6">
									<label class="form-label">تويتر</label>
									<div class="input-group">
										<span class="input-group-text">@</span>
										<input type="text" class="form-control" value="ahmed_director">
									</div>
								</div>
								<div class="col-md-6">
									<label class="form-label">لينكد إن</label>
									<input type="url" class="form-control" value="https://linkedin.com/in/ahmed-director">
								</div>
							</div>
							<div class="text-end mt-3">
								<button type="button" class="btn btn-secondary me-2">إلغاء</button>
								<button type="submit" class="btn btn-primary">حفظ التغييرات</button>
							</div>
						</form>
					</div>

					<!-- Security & Privacy Tab -->
					<div class="tab-pane fade" id="security" role="tabpanel">
						<div class="row g-4">
							
							<!-- Change Password -->
							<div class="col-12">
								<div class="card bg-light">
									<div class="card-body">
										<h6 class="card-title">تغيير كلمة المرور</h6>
										<form>
											<div class="row g-3">
												<div class="col-12">
													<label class="form-label">كلمة المرور الحالية</label>
													<input type="password" class="form-control">
												</div>
												<div class="col-md-6">
													<label class="form-label">كلمة المرور الجديدة</label>
													<input type="password" class="form-control">
												</div>
												<div class="col-md-6">
													<label class="form-label">تأكيد كلمة المرور</label>
													<input type="password" class="form-control">
												</div>
											</div>
											<button type="submit" class="btn btn-primary mt-3">تحديث كلمة المرور</button>
										</form>
									</div>
								</div>
							</div>

							<!-- Two Factor Authentication -->
							<div class="col-12">
								<div class="card bg-light">
									<div class="card-body">
										<div class="d-flex justify-content-between align-items-center">
											<div>
												<h6 class="mb-1">المصادقة الثنائية</h6>
												<p class="text-muted mb-0">أضف طبقة حماية إضافية لحسابك</p>
											</div>
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="twoFactorAuth">
												<label class="form-check-label" for="twoFactorAuth">تفعيل</label>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Login Alerts -->
							<div class="col-12">
								<div class="card bg-light">
									<div class="card-body">
										<div class="d-flex justify-content-between align-items-center">
											<div>
												<h6 class="mb-1">تنبيهات تسجيل الدخول</h6>
												<p class="text-muted mb-0">احصل على إشعار عند تسجيل الدخول من جهاز جديد</p>
											</div>
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="loginAlerts" checked>
												<label class="form-check-label" for="loginAlerts">تفعيل</label>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Recent Activity -->
							<div class="col-12">
								<div class="card bg-light">
									<div class="card-header">
										<h6 class="mb-0">النشاط الأخير</h6>
									</div>
									<div class="card-body">
										<div class="list-group list-group-flush">
											<div class="list-group-item d-flex justify-content-between align-items-center px-0">
												<div>
													<i class="bi bi-laptop text-primary me-2"></i>
													تسجيل دخول من Chrome على Windows
												</div>
												<small class="text-muted">منذ ساعتين</small>
											</div>
											<div class="list-group-item d-flex justify-content-between align-items-center px-0">
												<div>
													<i class="bi bi-phone text-success me-2"></i>
													تسجيل دخول من تطبيق الهاتف
												</div>
												<small class="text-muted">أمس</small>
											</div>
											<div class="list-group-item d-flex justify-content-between align-items-center px-0">
												<div>
													<i class="bi bi-tablet text-info me-2"></i>
													تسجيل دخول من iPad
												</div>
												<small class="text-muted">منذ 3 أيام</small>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>

<!-- Change Photo Modal -->
<div class="modal fade" id="changePhotoModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">تغيير الصورة الشخصية</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body text-center">
				<div class="mb-3">
					<img src="assets/images/avatar/01.jpg" class="rounded-circle border" width="150" height="150" alt="الصورة الحالية">
				</div>
				<div class="mb-3">
					<input type="file" class="form-control" accept="image/*">
				</div>
				<p class="text-muted small">الحد الأقصى لحجم الملف: 2 ميجابايت. الصيغ المقبولة: JPG, PNG, GIF</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
				<button type="button" class="btn btn-primary">حفظ الصورة</button>
			</div>
		</div>
	</div>
</div>
