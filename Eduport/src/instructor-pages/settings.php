<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">الإعدادات</h1>
	</div>
</div>

<div class="row g-4">
	<!-- إعدادات الحساب -->
	<div class="col-xl-8">
		<div class="card mb-4">
			<div class="card-header">
				<h5 class="card-title mb-0">إعدادات الحساب</h5>
			</div>
			<div class="card-body">
				<form>
					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">اسم المستخدم</label>
							<input type="text" class="form-control" value="ahmed.ali" readonly>
						</div>
						<div class="col-md-6">
							<label class="form-label">البريد الإلكتروني</label>
							<input type="email" class="form-control" value="ahmed.ali@school.com">
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-primary">حفظ التغييرات</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- تغيير كلمة المرور -->
		<div class="card mb-4">
			<div class="card-header">
				<h5 class="card-title mb-0">تغيير كلمة المرور</h5>
			</div>
			<div class="card-body">
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
						<div class="col-12">
							<button type="submit" class="btn btn-warning">تغيير كلمة المرور</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- إعدادات الإشعارات -->
		<div class="card mb-4">
			<div class="card-header">
				<h5 class="card-title mb-0">إعدادات الإشعارات</h5>
			</div>
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
					<div>
						<h6 class="mb-1">إشعارات البريد الإلكتروني</h6>
						<small class="text-muted">استقبال الإشعارات عبر البريد الإلكتروني</small>
					</div>
					<div class="form-check form-switch">
						<input class="form-check-input" type="checkbox" checked>
					</div>
				</div>
				
				<div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
					<div>
						<h6 class="mb-1">إشعارات الرسائل النصية</h6>
						<small class="text-muted">استقبال الإشعارات عبر الرسائل النصية</small>
					</div>
					<div class="form-check form-switch">
						<input class="form-check-input" type="checkbox">
					</div>
				</div>
				
				<div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
					<div>
						<h6 class="mb-1">إشعارات غياب الطلاب</h6>
						<small class="text-muted">تنبيه عند غياب أي طالب</small>
					</div>
					<div class="form-check form-switch">
						<input class="form-check-input" type="checkbox" checked>
					</div>
				</div>
				
				<div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
					<div>
						<h6 class="mb-1">إشعارات الواجبات</h6>
						<small class="text-muted">تذكير بالواجبات المطلوب تصحيحها</small>
					</div>
					<div class="form-check form-switch">
						<input class="form-check-input" type="checkbox" checked>
					</div>
				</div>
				
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<h6 class="mb-1">إشعارات رسائل أولياء الأمور</h6>
						<small class="text-muted">تنبيه عند وصول رسائل جديدة</small>
					</div>
					<div class="form-check form-switch">
						<input class="form-check-input" type="checkbox" checked>
					</div>
				</div>
			</div>
		</div>

		<!-- إعدادات الخصوصية -->
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">إعدادات الخصوصية</h5>
			</div>
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
					<div>
						<h6 class="mb-1">إظهار الملف الشخصي للطلاب</h6>
						<small class="text-muted">السماح للطلاب برؤية معلوماتك الأساسية</small>
					</div>
					<div class="form-check form-switch">
						<input class="form-check-input" type="checkbox" checked>
					</div>
				</div>
				
				<div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
					<div>
						<h6 class="mb-1">إظهار الملف الشخصي لأولياء الأمور</h6>
						<small class="text-muted">السماح لأولياء الأمور برؤية معلوماتك</small>
					</div>
					<div class="form-check form-switch">
						<input class="form-check-input" type="checkbox" checked>
					</div>
				</div>
				
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<h6 class="mb-1">مشاركة البيانات للتحليل</h6>
						<small class="text-muted">استخدام البيانات لتحسين الخدمة</small>
					</div>
					<div class="form-check form-switch">
						<input class="form-check-input" type="checkbox">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- إعدادات سريعة -->
	<div class="col-xl-4">
		<div class="card mb-4">
			<div class="card-header">
				<h5 class="card-title mb-0">إعدادات سريعة</h5>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<label class="form-label">اللغة</label>
					<select class="form-select">
						<option value="ar" selected>العربية</option>
						<option value="en">English</option>
					</select>
				</div>
				
				<div class="mb-3">
					<label class="form-label">المنطقة الزمنية</label>
					<select class="form-select">
						<option selected>الرياض (GMT+3)</option>
						<option>جدة (GMT+3)</option>
						<option>الدمام (GMT+3)</option>
					</select>
				</div>
				
				<div class="mb-3">
					<label class="form-label">تنسيق التاريخ</label>
					<select class="form-select">
						<option selected>dd/mm/yyyy</option>
						<option>mm/dd/yyyy</option>
						<option>yyyy-mm-dd</option>
					</select>
				</div>
				
				<div class="mb-3">
					<label class="form-label">تنسيق الوقت</label>
					<select class="form-select">
						<option selected>24 ساعة</option>
						<option>12 ساعة</option>
					</select>
				</div>
			</div>
		</div>
		
		<!-- إعدادات النظام -->
		<div class="card mb-4">
			<div class="card-header">
				<h5 class="card-title mb-0">إعدادات النظام</h5>
			</div>
			<div class="card-body">
				<div class="d-grid gap-2">
					<button class="btn btn-outline-primary" type="button">
						<i class="bi bi-download me-2"></i>تصدير البيانات
					</button>
					<button class="btn btn-outline-info" type="button">
						<i class="bi bi-arrow-clockwise me-2"></i>مزامنة البيانات
					</button>
					<button class="btn btn-outline-warning" type="button">
						<i class="bi bi-trash me-2"></i>مسح البيانات المؤقتة
					</button>
				</div>
			</div>
		</div>
		
		<!-- معلومات النظام -->
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">معلومات النظام</h5>
			</div>
			<div class="card-body">
				<div class="mb-2">
					<small class="text-muted">إصدار النظام</small>
					<p class="mb-0">2.1.0</p>
				</div>
				<div class="mb-2">
					<small class="text-muted">آخر تحديث</small>
					<p class="mb-0">15 ديسمبر 2024</p>
				</div>
				<div class="mb-2">
					<small class="text-muted">حالة الخادم</small>
					<span class="badge bg-success">متصل</span>
				</div>
				<div class="mt-3">
					<button class="btn btn-outline-secondary btn-sm w-100">
						<i class="bi bi-question-circle me-2"></i>المساعدة والدعم
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
