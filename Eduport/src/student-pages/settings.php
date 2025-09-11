<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">الإعدادات</h1>
	</div>
</div>

<!-- إعدادات الحساب START -->
<div class="row g-4">
	<div class="col-xl-3">
		<!-- قائمة الإعدادات -->
		<div class="card">
			<div class="card-body">
				<div class="list-group list-group-borderless">
					<a href="#" class="list-group-item list-group-item-action active" data-setting="account">
						<i class="bi bi-person me-2"></i>إعدادات الحساب
					</a>
					<a href="#" class="list-group-item list-group-item-action" data-setting="notifications">
						<i class="bi bi-bell me-2"></i>الإشعارات
					</a>
					<a href="#" class="list-group-item list-group-item-action" data-setting="privacy">
						<i class="bi bi-shield-lock me-2"></i>الخصوصية والأمان
					</a>
					<a href="#" class="list-group-item list-group-item-action" data-setting="appearance">
						<i class="bi bi-palette me-2"></i>المظهر
					</a>
					<a href="#" class="list-group-item list-group-item-action" data-setting="language">
						<i class="bi bi-translate me-2"></i>اللغة والمنطقة
					</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-xl-9">
		<!-- إعدادات الحساب -->
		<div id="account-settings" class="settings-section">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">إعدادات الحساب</h5>
				</div>
				<div class="card-body">
					<form>
						<div class="row g-3">
							<div class="col-md-6">
								<label class="form-label">البريد الإلكتروني</label>
								<input type="email" class="form-control" value="ahmed.alali@student.school.com">
								<small class="text-muted">سيتم إرسال رابط التأكيد إلى البريد الجديد</small>
							</div>
							<div class="col-md-6">
								<label class="form-label">رقم الهاتف</label>
								<input type="tel" class="form-control" value="+966 50 987 6543">
							</div>
							<div class="col-12">
								<hr>
								<h6>تغيير كلمة المرور</h6>
							</div>
							<div class="col-md-6">
								<label class="form-label">كلمة المرور الحالية</label>
								<input type="password" class="form-control" placeholder="أدخل كلمة المرور الحالية">
							</div>
							<div class="col-md-6">
								<label class="form-label">كلمة المرور الجديدة</label>
								<input type="password" class="form-control" placeholder="أدخل كلمة المرور الجديدة">
							</div>
							<div class="col-md-6">
								<label class="form-label">تأكيد كلمة المرور</label>
								<input type="password" class="form-control" placeholder="أعد إدخال كلمة المرور الجديدة">
							</div>
							<div class="col-12">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="emailVerification">
									<label class="form-check-label" for="emailVerification">
										تفعيل التحقق الثنائي عبر البريد الإلكتروني
									</label>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary mt-3">حفظ التغييرات</button>
					</form>
				</div>
			</div>
		</div>
		
		<!-- إعدادات الإشعارات -->
		<div id="notifications-settings" class="settings-section" style="display: none;">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">إعدادات الإشعارات</h5>
				</div>
				<div class="card-body">
					<div class="row g-3">
						<div class="col-12">
							<h6>الإشعارات الأكاديمية</h6>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="gradeNotifications" checked>
								<label class="form-check-label" for="gradeNotifications">
									إشعارات الدرجات الجديدة
								</label>
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="assignmentNotifications" checked>
								<label class="form-check-label" for="assignmentNotifications">
									إشعارات الواجبات الجديدة
								</label>
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="scheduleNotifications">
								<label class="form-check-label" for="scheduleNotifications">
									إشعارات تغيير الجدول الدراسي
								</label>
							</div>
						</div>
						<div class="col-12">
							<hr>
							<h6>الإشعارات الإدارية</h6>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="announcementNotifications" checked>
								<label class="form-check-label" for="announcementNotifications">
									إشعارات الإعلانات المهمة
								</label>
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="eventNotifications">
								<label class="form-check-label" for="eventNotifications">
									إشعارات الأحداث والفعاليات
								</label>
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="systemNotifications">
								<label class="form-check-label" for="systemNotifications">
									إشعارات النظام والصيانة
								</label>
							</div>
						</div>
						<div class="col-12">
							<hr>
							<h6>طرق الإشعار</h6>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="emailNotify" checked>
								<label class="form-check-label" for="emailNotify">
									إشعارات البريد الإلكتروني
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="smsNotify">
								<label class="form-check-label" for="smsNotify">
									إشعارات الرسائل النصية
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="pushNotify" checked>
								<label class="form-check-label" for="pushNotify">
									الإشعارات الفورية في المتصفح
								</label>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary mt-3">حفظ الإعدادات</button>
				</div>
			</div>
		</div>
		
		<!-- إعدادات الخصوصية -->
		<div id="privacy-settings" class="settings-section" style="display: none;">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">الخصوصية والأمان</h5>
				</div>
				<div class="card-body">
					<div class="row g-3">
						<div class="col-12">
							<h6>إعدادات الخصوصية</h6>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="profileVisibility">
								<label class="form-check-label" for="profileVisibility">
									إخفاء الملف الشخصي عن الطلاب الآخرين
								</label>
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="gradesPrivacy">
								<label class="form-check-label" for="gradesPrivacy">
									إخفاء الدرجات عن المقارنات العامة
								</label>
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="activityPrivacy">
								<label class="form-check-label" for="activityPrivacy">
									إخفاء نشاطي في المنصة
								</label>
							</div>
						</div>
						<div class="col-12">
							<hr>
							<h6>إعدادات الأمان</h6>
							<div class="alert alert-info">
								<i class="bi bi-info-circle me-2"></i>
								آخر تسجيل دخول: اليوم في 10:30 صباحاً من Chrome على Windows
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="loginAlerts" checked>
								<label class="form-check-label" for="loginAlerts">
									تنبيهات تسجيل الدخول من أجهزة جديدة
								</label>
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="sessionTimeout">
								<label class="form-check-label" for="sessionTimeout">
									إنهاء الجلسة تلقائياً بعد 30 دقيقة من عدم النشاط
								</label>
							</div>
						</div>
						<div class="col-12">
							<hr>
							<h6>إدارة البيانات</h6>
							<div class="d-flex justify-content-between align-items-center mb-2">
								<span>تحميل بياناتي</span>
								<button class="btn btn-outline-primary btn-sm">
									<i class="bi bi-download me-2"></i>تحميل
								</button>
							</div>
							<div class="d-flex justify-content-between align-items-center">
								<span class="text-danger">حذف الحساب نهائياً</span>
								<button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
									<i class="bi bi-trash me-2"></i>حذف
								</button>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary mt-3">حفظ الإعدادات</button>
				</div>
			</div>
		</div>
		
		<!-- إعدادات المظهر -->
		<div id="appearance-settings" class="settings-section" style="display: none;">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">إعدادات المظهر</h5>
				</div>
				<div class="card-body">
					<div class="row g-3">
						<div class="col-12">
							<h6>السمة (Theme)</h6>
							<div class="row g-2">
								<div class="col-md-4">
									<div class="form-check card-check">
										<input class="form-check-input" type="radio" name="theme" id="lightTheme" checked>
										<label class="form-check-label p-3 text-center d-block" for="lightTheme">
											<i class="bi bi-sun display-6 text-warning"></i>
											<span class="d-block mt-2">الوضع النهاري</span>
										</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-check card-check">
										<input class="form-check-input" type="radio" name="theme" id="darkTheme">
										<label class="form-check-label p-3 text-center d-block" for="darkTheme">
											<i class="bi bi-moon display-6 text-primary"></i>
											<span class="d-block mt-2">الوضع الليلي</span>
										</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-check card-check">
										<input class="form-check-input" type="radio" name="theme" id="autoTheme">
										<label class="form-check-label p-3 text-center d-block" for="autoTheme">
											<i class="bi bi-circle-half display-6 text-info"></i>
											<span class="d-block mt-2">تلقائي</span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr>
							<h6>حجم الخط</h6>
							<div class="range-slider">
								<input type="range" class="form-range" id="fontSize" min="12" max="18" value="14">
								<div class="d-flex justify-content-between">
									<small>صغير</small>
									<small>متوسط</small>
									<small>كبير</small>
								</div>
							</div>
						</div>
						<div class="col-12">
							<hr>
							<h6>إعدادات أخرى</h6>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="animations" checked>
								<label class="form-check-label" for="animations">
									تفعيل الحركات والانتقالات
								</label>
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="compactMode">
								<label class="form-check-label" for="compactMode">
									الوضع المضغوط (عرض أكثر في مساحة أقل)
								</label>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary mt-3">حفظ الإعدادات</button>
				</div>
			</div>
		</div>
		
		<!-- إعدادات اللغة -->
		<div id="language-settings" class="settings-section" style="display: none;">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">اللغة والمنطقة</h5>
				</div>
				<div class="card-body">
					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">لغة الواجهة</label>
							<select class="form-select">
								<option value="ar" selected>العربية</option>
								<option value="en">English</option>
								<option value="fr">Français</option>
							</select>
						</div>
						<div class="col-md-6">
							<label class="form-label">المنطقة الزمنية</label>
							<select class="form-select">
								<option value="Asia/Riyadh" selected>توقيت الرياض (GMT+3)</option>
								<option value="Asia/Dubai">توقيت دبي (GMT+4)</option>
								<option value="Africa/Cairo">توقيت القاهرة (GMT+2)</option>
							</select>
						</div>
						<div class="col-md-6">
							<label class="form-label">تنسيق التاريخ</label>
							<select class="form-select">
								<option value="dd/mm/yyyy" selected>يوم/شهر/سنة</option>
								<option value="mm/dd/yyyy">شهر/يوم/سنة</option>
								<option value="yyyy-mm-dd">سنة-شهر-يوم</option>
							</select>
						</div>
						<div class="col-md-6">
							<label class="form-label">تنسيق الوقت</label>
							<select class="form-select">
								<option value="24" selected>24 ساعة</option>
								<option value="12">12 ساعة (AM/PM)</option>
							</select>
						</div>
						<div class="col-12">
							<hr>
							<h6>التقويم</h6>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="calendar" id="gregorian" checked>
								<label class="form-check-label" for="gregorian">
									التقويم الميلادي
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="calendar" id="hijri">
								<label class="form-check-label" for="hijri">
									التقويم الهجري
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="calendar" id="both">
								<label class="form-check-label" for="both">
									كلا التقويمين
								</label>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary mt-3">حفظ الإعدادات</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal لحذف الحساب -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header border-danger">
				<h5 class="modal-title text-danger" id="deleteAccountModalLabel">تأكيد حذف الحساب</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger">
					<i class="bi bi-exclamation-triangle me-2"></i>
					<strong>تحذير:</strong> هذا الإجراء لا يمكن التراجع عنه!
				</div>
				<p>سيتم حذف جميع بياناتك نهائياً بما في ذلك:</p>
				<ul>
					<li>الملف الشخصي والمعلومات الأساسية</li>
					<li>سجل الدرجات والتقييمات</li>
					<li>الواجبات والمشاريع المرسلة</li>
					<li>سجل الحضور والغياب</li>
				</ul>
				<div class="form-floating mt-3">
					<input type="text" class="form-control" id="deleteConfirmation" placeholder="اكتب 'احذف حسابي' للتأكيد">
					<label for="deleteConfirmation">اكتب "احذف حسابي" للتأكيد</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
				<button type="button" class="btn btn-danger" id="confirmDelete" disabled>حذف الحساب نهائياً</button>
			</div>
		</div>
	</div>
</div>

<script>
// التنقل بين أقسام الإعدادات
document.querySelectorAll('[data-setting]').forEach(link => {
	link.addEventListener('click', function(e) {
		e.preventDefault();
		
		// إزالة الفئة النشطة من جميع الروابط
		document.querySelectorAll('[data-setting]').forEach(l => l.classList.remove('active'));
		// إضافة الفئة النشطة للرابط المحدد
		this.classList.add('active');
		
		// إخفاء جميع الأقسام
		document.querySelectorAll('.settings-section').forEach(section => section.style.display = 'none');
		// إظهار القسم المطلوب
		document.getElementById(this.dataset.setting + '-settings').style.display = 'block';
	});
});

// تأكيد حذف الحساب
document.getElementById('deleteConfirmation').addEventListener('input', function() {
	const confirmBtn = document.getElementById('confirmDelete');
	if (this.value === 'احذف حسابي') {
		confirmBtn.disabled = false;
	} else {
		confirmBtn.disabled = true;
	}
});

// تطبيق إعدادات المظهر فوراً
document.querySelectorAll('input[name="theme"]').forEach(radio => {
	radio.addEventListener('change', function() {
		// هنا يمكن إضافة كود لتطبيق السمة فوراً
		console.log('تم تغيير السمة إلى:', this.id);
	});
});

// تطبيق حجم الخط فوراً
document.getElementById('fontSize').addEventListener('input', function() {
	// هنا يمكن إضافة كود لتطبيق حجم الخط فوراً
	console.log('حجم الخط الجديد:', this.value + 'px');
});
</script>
