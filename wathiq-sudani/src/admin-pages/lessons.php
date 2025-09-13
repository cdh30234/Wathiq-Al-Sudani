<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<div class="d-sm-flex justify-content-between align-items-center">
			<h1 class="h3 mb-2 mb-sm-0">رفع الدروس</h1>
			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLessonModal">
				<i class="bi bi-plus-circle me-2"></i>إضافة درس جديد
			</button>
		</div>
	</div>
</div>

<!-- Filter START -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="row g-3">
			<div class="col-lg-3">
				<label class="form-label">المادة</label>
				<select class="form-select" id="subjectFilter">
					<option value="">جميع المواد</option>
					<option value="الرياضيات">الرياضيات</option>
					<option value="العلوم">العلوم</option>
					<option value="اللغة العربية">اللغة العربية</option>
					<option value="اللغة الإنجليزية">اللغة الإنجليزية</option>
					<option value="التاريخ">التاريخ</option>
					<option value="الجغرافيا">الجغرافيا</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label class="form-label">الفصل</label>
				<select class="form-select" id="classFilter">
					<option value="">جميع الفصول</option>
					<option value="السادس">السادس</option>
					<option value="السابع">السابع</option>
					<option value="الثامن">الثامن</option>
					<option value="التاسع">التاسع</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label class="form-label">الحالة</label>
				<select class="form-select" id="statusFilter">
					<option value="">جميع الحالات</option>
					<option value="منشور">منشور</option>
					<option value="مسودة">مسودة</option>
					<option value="مجدول">مجدول</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label class="form-label">&nbsp;</label>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="البحث عن درس...">
					<button class="btn btn-outline-secondary" type="button">
						<i class="bi bi-search"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Filter END -->

<!-- Lessons Grid START -->
<div class="row g-4">
	
	<!-- Lesson Card 1 -->
	<div class="col-lg-6 col-xl-4">
		<div class="card shadow h-100">
			<div class="position-relative">
				<img src="assets/images/courses/4by3/01.jpg" class="card-img-top" alt="درس الرياضيات">
				<div class="card-img-overlay d-flex align-items-start flex-column p-3">
					<div class="w-100 d-flex justify-content-between">
						<span class="badge bg-primary bg-opacity-90">الرياضيات</span>
						<span class="badge bg-success bg-opacity-90">منشور</span>
					</div>
				</div>
			</div>
			<div class="card-body">
				<h5 class="card-title">الجبر البسيط - الدرس الأول</h5>
				<p class="card-text text-muted">مقدمة في الجبر والمتغيرات الرياضية مع أمثلة عملية وتطبيقات.</p>
				
				<div class="d-flex justify-content-between align-items-center mb-3">
					<div class="d-flex align-items-center">
						<i class="bi bi-people me-1"></i>
						<small>السابع أ، السابع ب</small>
					</div>
					<div class="d-flex align-items-center">
						<i class="bi bi-calendar me-1"></i>
						<small>15 سبتمبر 2025</small>
					</div>
				</div>

				<div class="d-flex justify-content-between align-items-center mb-3">
					<div class="d-flex align-items-center">
						<i class="bi bi-clock me-1"></i>
						<small>45 دقيقة</small>
					</div>
					<div class="d-flex align-items-center">
						<i class="bi bi-eye me-1"></i>
						<small>124 مشاهدة</small>
					</div>
				</div>

				<div class="d-flex gap-2">
					<button class="btn btn-sm btn-primary flex-fill">
						<i class="bi bi-play me-1"></i>معاينة
					</button>
					<button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
						<i class="bi bi-three-dots"></i>
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-files me-2"></i>نسخ</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-graph-up me-2"></i>إحصائيات</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Lesson Card 2 -->
	<div class="col-lg-6 col-xl-4">
		<div class="card shadow h-100">
			<div class="position-relative">
				<img src="assets/images/courses/4by3/02.jpg" class="card-img-top" alt="درس العلوم">
				<div class="card-img-overlay d-flex align-items-start flex-column p-3">
					<div class="w-100 d-flex justify-content-between">
						<span class="badge bg-info bg-opacity-90">العلوم</span>
						<span class="badge bg-warning bg-opacity-90">مسودة</span>
					</div>
				</div>
			</div>
			<div class="card-body">
				<h5 class="card-title">الجهاز التنفسي في الإنسان</h5>
				<p class="card-text text-muted">شرح مفصل لأجزاء الجهاز التنفسي ووظائفه مع رسوم توضيحية.</p>
				
				<div class="d-flex justify-content-between align-items-center mb-3">
					<div class="d-flex align-items-center">
						<i class="bi bi-people me-1"></i>
						<small>الثامن أ، الثامن ب</small>
					</div>
					<div class="d-flex align-items-center">
						<i class="bi bi-calendar me-1"></i>
						<small>مجدول للنشر</small>
					</div>
				</div>

				<div class="d-flex justify-content-between align-items-center mb-3">
					<div class="d-flex align-items-center">
						<i class="bi bi-clock me-1"></i>
						<small>50 دقيقة</small>
					</div>
					<div class="d-flex align-items-center">
						<i class="bi bi-eye me-1"></i>
						<small>0 مشاهدة</small>
					</div>
				</div>

				<div class="d-flex gap-2">
					<button class="btn btn-sm btn-outline-primary flex-fill">
						<i class="bi bi-play me-1"></i>معاينة
					</button>
					<button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
						<i class="bi bi-three-dots"></i>
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-upload me-2"></i>نشر</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-files me-2"></i>نسخ</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Lesson Card 3 -->
	<div class="col-lg-6 col-xl-4">
		<div class="card shadow h-100">
			<div class="position-relative">
				<img src="assets/images/courses/4by3/03.jpg" class="card-img-top" alt="درس اللغة العربية">
				<div class="card-img-overlay d-flex align-items-start flex-column p-3">
					<div class="w-100 d-flex justify-content-between">
						<span class="badge bg-success bg-opacity-90">اللغة العربية</span>
						<span class="badge bg-info bg-opacity-90">مجدول</span>
					</div>
				</div>
			</div>
			<div class="card-body">
				<h5 class="card-title">قواعد النحو - الفاعل والمفعول</h5>
				<p class="card-text text-muted">درس تفاعلي في قواعد النحو العربي مع أمثلة من القرآن والشعر.</p>
				
				<div class="d-flex justify-content-between align-items-center mb-3">
					<div class="d-flex align-items-center">
						<i class="bi bi-people me-1"></i>
						<small>التاسع أ</small>
					</div>
					<div class="d-flex align-items-center">
						<i class="bi bi-calendar me-1"></i>
						<small>20 سبتمبر 2025</small>
					</div>
				</div>

				<div class="d-flex justify-content-between align-items-center mb-3">
					<div class="d-flex align-items-center">
						<i class="bi bi-clock me-1"></i>
						<small>40 دقيقة</small>
					</div>
					<div class="d-flex align-items-center">
						<i class="bi bi-eye me-1"></i>
						<small>مجدول</small>
					</div>
				</div>

				<div class="d-flex gap-2">
					<button class="btn btn-sm btn-outline-primary flex-fill">
						<i class="bi bi-play me-1"></i>معاينة
					</button>
					<button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
						<i class="bi bi-three-dots"></i>
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check me-2"></i>تغيير الجدولة</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-files me-2"></i>نسخ</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Add More Lessons -->
	<div class="col-lg-6 col-xl-4">
		<div class="card shadow h-100 border-2 border-dashed border-primary">
			<div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
				<div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-circle mb-3">
					<i class="bi bi-plus-lg"></i>
				</div>
				<h5 class="card-title">إضافة درس جديد</h5>
				<p class="card-text text-muted mb-3">انقر هنا لإضافة درس جديد أو رفع محتوى تعليمي</p>
				<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLessonModal">
					<i class="bi bi-plus-circle me-2"></i>إضافة الآن
				</button>
			</div>
		</div>
	</div>

</div>
<!-- Lessons Grid END -->

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

<!-- Add Lesson Modal -->
<div class="modal fade" id="addLessonModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">إضافة درس جديد</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="addLessonForm" enctype="multipart/form-data">
					<div class="row g-3">
						<!-- Basic Information -->
						<div class="col-12">
							<h6 class="mb-3">المعلومات الأساسية</h6>
						</div>
						
						<div class="col-md-6">
							<label class="form-label">عنوان الدرس</label>
							<input type="text" class="form-control" required>
						</div>
						
						<div class="col-md-6">
							<label class="form-label">المادة</label>
							<select class="form-select" required>
								<option value="">اختر المادة</option>
								<option value="الرياضيات">الرياضيات</option>
								<option value="العلوم">العلوم</option>
								<option value="اللغة العربية">اللغة العربية</option>
								<option value="اللغة الإنجليزية">اللغة الإنجليزية</option>
								<option value="التاريخ">التاريخ</option>
								<option value="الجغرافيا">الجغرافيا</option>
								<option value="التربية الإسلامية">التربية الإسلامية</option>
							</select>
						</div>
						
						<div class="col-md-6">
							<label class="form-label">الفصول المستهدفة</label>
							<select class="form-select" multiple>
								<option value="السادس أ">السادس أ</option>
								<option value="السادس ب">السادس ب</option>
								<option value="السابع أ">السابع أ</option>
								<option value="السابع ب">السابع ب</option>
								<option value="الثامن أ">الثامن أ</option>
								<option value="الثامن ب">الثامن ب</option>
								<option value="التاسع أ">التاسع أ</option>
								<option value="التاسع ب">التاسع ب</option>
							</select>
							<small class="text-muted">اضغط Ctrl لتحديد أكثر من فصل</small>
						</div>
						
						<div class="col-md-6">
							<label class="form-label">مدة الدرس (بالدقائق)</label>
							<input type="number" class="form-control" min="1" max="120" value="45">
						</div>
						
						<div class="col-12">
							<label class="form-label">وصف الدرس</label>
							<textarea class="form-control" rows="3" placeholder="وصف مختصر عن محتوى الدرس..."></textarea>
						</div>

						<!-- Content Upload -->
						<div class="col-12 mt-4">
							<h6 class="mb-3">محتوى الدرس</h6>
						</div>

						<div class="col-12">
							<label class="form-label">نوع المحتوى</label>
							<div class="row g-2">
								<div class="col-md-3">
									<input class="form-check-input" type="radio" name="contentType" id="video" value="video" checked>
									<label class="form-check-label w-100 p-3 border rounded text-center" for="video">
										<i class="bi bi-camera-video d-block mb-2 h4"></i>
										فيديو
									</label>
								</div>
								<div class="col-md-3">
									<input class="form-check-input" type="radio" name="contentType" id="pdf" value="pdf">
									<label class="form-check-label w-100 p-3 border rounded text-center" for="pdf">
										<i class="bi bi-file-pdf d-block mb-2 h4"></i>
										PDF
									</label>
								</div>
								<div class="col-md-3">
									<input class="form-check-input" type="radio" name="contentType" id="presentation" value="presentation">
									<label class="form-check-label w-100 p-3 border rounded text-center" for="presentation">
										<i class="bi bi-file-slides d-block mb-2 h4"></i>
										عرض تقديمي
									</label>
								</div>
								<div class="col-md-3">
									<input class="form-check-input" type="radio" name="contentType" id="interactive" value="interactive">
									<label class="form-check-label w-100 p-3 border rounded text-center" for="interactive">
										<i class="bi bi-cpu d-block mb-2 h4"></i>
										تفاعلي
									</label>
								</div>
							</div>
						</div>

						<div class="col-12">
							<label class="form-label">رفع الملفات</label>
							<div class="border border-2 border-dashed rounded p-4 text-center">
								<input type="file" class="form-control" id="lessonFiles" multiple accept=".mp4,.pdf,.ppt,.pptx,.doc,.docx">
								<div class="mt-2">
									<i class="bi bi-cloud-upload h1 text-muted"></i>
									<p class="text-muted">اسحب الملفات هنا أو انقر للتصفح</p>
									<small class="text-muted">الحد الأقصى: 500 ميجابايت لكل ملف</small>
								</div>
							</div>
						</div>

						<!-- Thumbnail -->
						<div class="col-md-6">
							<label class="form-label">صورة مصغرة للدرس</label>
							<input type="file" class="form-control" accept="image/*">
						</div>

						<!-- Scheduling -->
						<div class="col-12 mt-4">
							<h6 class="mb-3">جدولة النشر</h6>
						</div>

						<div class="col-md-6">
							<label class="form-label">حالة النشر</label>
							<select class="form-select">
								<option value="draft">مسودة</option>
								<option value="published">نشر فوري</option>
								<option value="scheduled">جدولة النشر</option>
							</select>
						</div>

						<div class="col-md-6">
							<label class="form-label">تاريخ ووقت النشر</label>
							<input type="datetime-local" class="form-control">
						</div>

						<!-- Additional Options -->
						<div class="col-12 mt-4">
							<h6 class="mb-3">خيارات إضافية</h6>
						</div>

						<div class="col-md-4">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="allowComments">
								<label class="form-check-label" for="allowComments">
									السماح بالتعليقات
								</label>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="sendNotification" checked>
								<label class="form-check-label" for="sendNotification">
									إرسال إشعار للطلاب
								</label>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="downloadable">
								<label class="form-check-label" for="downloadable">
									قابل للتحميل
								</label>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
				<button type="button" class="btn btn-outline-primary">حفظ كمسودة</button>
				<button type="button" class="btn btn-primary">حفظ ونشر</button>
			</div>
		</div>
	</div>
</div>
