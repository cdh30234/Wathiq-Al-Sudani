<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<div class="d-sm-flex justify-content-between align-items-center">
			<h1 class="h3 mb-2 mb-sm-0">إدارة الإعلانات</h1>
			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">
				<i class="bi bi-plus-circle me-2"></i>إعلان جديد
			</button>
		</div>
	</div>
</div>

<!-- Quick Stats -->
<div class="row g-4 mb-4">
	<div class="col-md-3">
		<div class="card bg-primary bg-opacity-10 border-0">
			<div class="card-body text-center">
				<h4 class="text-primary">12</h4>
				<p class="mb-0">إجمالي الإعلانات</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-success bg-opacity-10 border-0">
			<div class="card-body text-center">
				<h4 class="text-success">8</h4>
				<p class="mb-0">الإعلانات النشطة</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-warning bg-opacity-10 border-0">
			<div class="card-body text-center">
				<h4 class="text-warning">2</h4>
				<p class="mb-0">إعلانات مجدولة</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-info bg-opacity-10 border-0">
			<div class="card-body text-center">
				<h4 class="text-info">156</h4>
				<p class="mb-0">إجمالي المشاهدات</p>
			</div>
		</div>
	</div>
</div>

<!-- Filter START -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="row g-3">
			<div class="col-lg-3">
				<select class="form-select">
					<option value="">جميع الأنواع</option>
					<option value="عام">إعلان عام</option>
					<option value="أكاديمي">إعلان أكاديمي</option>
					<option value="عاجل">إعلان عاجل</option>
					<option value="فعالية">فعالية</option>
				</select>
			</div>
			<div class="col-lg-3">
				<select class="form-select">
					<option value="">جميع الحالات</option>
					<option value="نشط">نشط</option>
					<option value="مجدول">مجدول</option>
					<option value="منتهي">منتهي الصلاحية</option>
					<option value="مسودة">مسودة</option>
				</select>
			</div>
			<div class="col-lg-4">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="البحث في الإعلانات...">
					<button class="btn btn-outline-secondary" type="button">
						<i class="bi bi-search"></i>
					</button>
				</div>
			</div>
			<div class="col-lg-2">
				<button class="btn btn-success w-100">
					<i class="bi bi-download me-1"></i>تصدير
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Filter END -->

<!-- Announcements List START -->
<div class="row g-4">
	
	<!-- Announcement 1 -->
	<div class="col-lg-6">
		<div class="card shadow h-100">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="d-flex align-items-center gap-2">
					<span class="badge bg-danger">عاجل</span>
					<span class="badge bg-success">نشط</span>
				</div>
				<div class="dropdown">
					<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
						<i class="bi bi-three-dots"></i>
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>معاينة</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-files me-2"></i>نسخ</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
					</ul>
				</div>
			</div>
			<div class="card-body">
				<h5 class="card-title text-danger">تأجيل امتحان الرياضيات</h5>
				<p class="card-text">تم تأجيل امتحان الرياضيات المقرر يوم الثلاثاء إلى يوم الخميس الموافق 25 سبتمبر بسبب الظروف الجوية.</p>
				
				<div class="row text-center border-top pt-3">
					<div class="col-4">
						<small class="text-muted">المشاهدات</small>
						<div class="fw-bold">89</div>
					</div>
					<div class="col-4">
						<small class="text-muted">تاريخ النشر</small>
						<div class="fw-bold">منذ ساعتين</div>
					</div>
					<div class="col-4">
						<small class="text-muted">المستهدف</small>
						<div class="fw-bold">جميع الطلاب</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Announcement 2 -->
	<div class="col-lg-6">
		<div class="card shadow h-100">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="d-flex align-items-center gap-2">
					<span class="badge bg-info">أكاديمي</span>
					<span class="badge bg-success">نشط</span>
				</div>
				<div class="dropdown">
					<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
						<i class="bi bi-three-dots"></i>
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>معاينة</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-files me-2"></i>نسخ</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
					</ul>
				</div>
			</div>
			<div class="card-body">
				<h5 class="card-title">جدول الامتحانات النهائية</h5>
				<p class="card-text">تم نشر جدول الامتحانات النهائية للفصل الدراسي الأول. يرجى مراجعة الجدول والاستعداد للامتحانات.</p>
				
				<div class="row text-center border-top pt-3">
					<div class="col-4">
						<small class="text-muted">المشاهدات</small>
						<div class="fw-bold">67</div>
					</div>
					<div class="col-4">
						<small class="text-muted">تاريخ النشر</small>
						<div class="fw-bold">منذ 4 ساعات</div>
					</div>
					<div class="col-4">
						<small class="text-muted">المستهدف</small>
						<div class="fw-bold">الصفوف العليا</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Announcement 3 -->
	<div class="col-lg-6">
		<div class="card shadow h-100">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="d-flex align-items-center gap-2">
					<span class="badge bg-warning">فعالية</span>
					<span class="badge bg-secondary">مجدول</span>
				</div>
				<div class="dropdown">
					<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
						<i class="bi bi-three-dots"></i>
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>معاينة</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-send me-2"></i>نشر الآن</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
					</ul>
				</div>
			</div>
			<div class="card-body">
				<h5 class="card-title">يوم الأنشطة المدرسية</h5>
				<p class="card-text">سيتم تنظيم يوم الأنشطة المدرسية يوم السبت القادم مع مجموعة متنوعة من الفعاليات والمسابقات.</p>
				
				<div class="row text-center border-top pt-3">
					<div class="col-4">
						<small class="text-muted">المشاهدات</small>
						<div class="fw-bold">0</div>
					</div>
					<div class="col-4">
						<small class="text-muted">النشر المجدول</small>
						<div class="fw-bold">غداً 8:00 ص</div>
					</div>
					<div class="col-4">
						<small class="text-muted">المستهدف</small>
						<div class="fw-bold">جميع الطلاب</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Announcement 4 -->
	<div class="col-lg-6">
		<div class="card shadow h-100">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="d-flex align-items-center gap-2">
					<span class="badge bg-success">عام</span>
					<span class="badge bg-success">نشط</span>
				</div>
				<div class="dropdown">
					<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
						<i class="bi bi-three-dots"></i>
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>معاينة</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-files me-2"></i>نسخ</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
					</ul>
				</div>
			</div>
			<div class="card-body">
				<h5 class="card-title">نتائج الامتحانات الشهرية</h5>
				<p class="card-text">تم الانتهاء من تصحيح جميع الامتحانات الشهرية ونشر النتائج. يمكن للطلاب الاطلاع على درجاتهم عبر الموقع.</p>
				
				<div class="row text-center border-top pt-3">
					<div class="col-4">
						<small class="text-muted">المشاهدات</small>
						<div class="fw-bold">124</div>
					</div>
					<div class="col-4">
						<small class="text-muted">تاريخ النشر</small>
						<div class="fw-bold">أمس</div>
					</div>
					<div class="col-4">
						<small class="text-muted">المستهدف</small>
						<div class="fw-bold">جميع الطلاب</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- Announcements List END -->

<!-- Pagination -->
<nav aria-label="Page navigation" class="mt-5">
	<ul class="pagination justify-content-center">
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

<!-- Add Announcement Modal -->
<div class="modal fade" id="addAnnouncementModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">إعلان جديد</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form>
					<div class="row g-3">
						<div class="col-md-8">
							<label class="form-label">عنوان الإعلان</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="col-md-4">
							<label class="form-label">نوع الإعلان</label>
							<select class="form-select" required>
								<option value="">اختر النوع</option>
								<option value="عام">إعلان عام</option>
								<option value="أكاديمي">إعلان أكاديمي</option>
								<option value="عاجل">إعلان عاجل</option>
								<option value="فعالية">فعالية</option>
							</select>
						</div>

						<div class="col-12">
							<label class="form-label">محتوى الإعلان</label>
							<textarea class="form-control" rows="5" required></textarea>
						</div>

						<div class="col-md-6">
							<label class="form-label">المستهدفون</label>
							<select class="form-select" multiple>
								<option value="all">جميع الطلاب</option>
								<option value="grade6">الصف السادس</option>
								<option value="grade7">الصف السابع</option>
								<option value="grade8">الصف الثامن</option>
								<option value="grade9">الصف التاسع</option>
								<option value="teachers">المعلمون</option>
								<option value="parents">أولياء الأمور</option>
							</select>
						</div>

						<div class="col-md-6">
							<label class="form-label">الأولوية</label>
							<select class="form-select">
								<option value="normal">عادي</option>
								<option value="high">مرتفع</option>
								<option value="urgent">عاجل</option>
							</select>
						</div>

						<div class="col-md-6">
							<label class="form-label">تاريخ النشر</label>
							<input type="datetime-local" class="form-control">
						</div>

						<div class="col-md-6">
							<label class="form-label">تاريخ انتهاء الصلاحية</label>
							<input type="datetime-local" class="form-control">
						</div>

						<div class="col-12">
							<div class="form-check mb-2">
								<input class="form-check-input" type="checkbox" id="sendEmail">
								<label class="form-check-label" for="sendEmail">
									إرسال إشعار عبر البريد الإلكتروني
								</label>
							</div>
							<div class="form-check mb-2">
								<input class="form-check-input" type="checkbox" id="sendSMS">
								<label class="form-check-label" for="sendSMS">
									إرسال رسالة نصية
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="pinAnnouncement">
								<label class="form-check-label" for="pinAnnouncement">
									تثبيت الإعلان في أعلى الصفحة
								</label>
							</div>
						</div>

						<div class="col-12">
							<label class="form-label">إرفاق ملفات (اختياري)</label>
							<input type="file" class="form-control" multiple>
							<small class="text-muted">يمكن إرفاق صور أو مستندات PDF</small>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
				<button type="button" class="btn btn-outline-primary">حفظ كمسودة</button>
				<button type="button" class="btn btn-primary">نشر الإعلان</button>
			</div>
		</div>
	</div>
</div>
