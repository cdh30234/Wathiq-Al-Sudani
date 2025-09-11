<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">إدارة الدروس والمواد التعليمية</h1>
	</div>
</div>

<!-- إحصائيات الدروس START -->
<div class="row g-4 mb-4">
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-primary bg-opacity-10 border border-primary border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-primary">67</h4>
					<span class="h6 fw-light mb-0">إجمالي الدروس</span>
				</div>
				<div class="icon-lg bg-primary rounded-circle">
					<i class="bi bi-book text-white"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-success bg-opacity-10 border border-success border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-success">45</h4>
					<span class="h6 fw-light mb-0">دروس فيديو</span>
				</div>
				<div class="icon-lg bg-success rounded-circle">
					<i class="bi bi-play-circle text-white"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-info bg-opacity-10 border border-info border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-info">22</h4>
					<span class="h6 fw-light mb-0">ملفات PDF</span>
				</div>
				<div class="icon-lg bg-info rounded-circle">
					<i class="bi bi-file-earmark-pdf text-white"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="card card-body bg-warning bg-opacity-10 border border-warning border-opacity-25 p-4">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<h4 class="mb-0 text-warning">15</h4>
					<span class="h6 fw-light mb-0">عروض تقديمية</span>
				</div>
				<div class="icon-lg bg-warning rounded-circle">
					<i class="bi bi-file-earmark-slides text-white"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- إحصائيات الدروس END -->

<!-- رفع درس جديد START -->
<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">رفع درس جديد</h5>
	</div>
	<div class="card-body">
		<form id="uploadLessonForm">
			<div class="row g-3">
				<div class="col-md-6">
					<label class="form-label">عنوان الدرس</label>
					<input type="text" class="form-control" placeholder="أدخل عنوان الدرس" required>
				</div>
				<div class="col-md-6">
					<label class="form-label">المادة</label>
					<select class="form-select" required>
						<option value="">اختر المادة</option>
						<option value="math">الرياضيات</option>
						<option value="science">العلوم</option>
						<option value="geography">الجغرافيا</option>
						<option value="history">التاريخ</option>
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
				<div class="col-md-6">
					<label class="form-label">نوع المحتوى</label>
					<select class="form-select" id="contentType" required>
						<option value="">اختر نوع المحتوى</option>
						<option value="video">فيديو</option>
						<option value="pdf">ملف PDF</option>
						<option value="presentation">عرض تقديمي</option>
						<option value="audio">ملف صوتي</option>
						<option value="document">مستند</option>
					</select>
				</div>
				<div class="col-12">
					<label class="form-label">وصف الدرس</label>
					<textarea class="form-control" rows="3" placeholder="اكتب وصفاً مختصراً للدرس"></textarea>
				</div>
				<div class="col-12">
					<label class="form-label">رفع الملف</label>
					<div class="border border-2 border-dashed rounded p-4 text-center">
						<input type="file" id="lessonFile" class="d-none" accept=".pdf,.ppt,.pptx,.doc,.docx,.mp4,.mp3,.avi" multiple>
						<label for="lessonFile" class="cursor-pointer">
							<div class="mb-3">
								<i class="bi bi-cloud-upload display-4 text-primary"></i>
							</div>
							<h6>اسحب الملفات هنا أو انقر للتحديد</h6>
							<p class="text-muted small mb-0">الحد الأقصى: 500 ميجابايت لكل ملف</p>
							<p class="text-muted small">الصيغ المدعومة: PDF, PPT, DOC, MP4, MP3, AVI</p>
						</label>
					</div>
					<div id="fileList" class="mt-3"></div>
				</div>
				<div class="col-12">
					<div class="d-flex gap-2">
						<button type="submit" class="btn btn-primary">
							<i class="bi bi-upload me-2"></i>رفع الدرس
						</button>
						<button type="button" class="btn btn-outline-secondary" onclick="resetForm()">
							<i class="bi bi-arrow-clockwise me-2"></i>إعادة تعيين
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- رفع درس جديد END -->

<!-- قائمة الدروس START -->
<div class="card shadow">
	<div class="card-header border-bottom">
		<div class="d-sm-flex justify-content-sm-between align-items-center">
			<h5 class="card-title mb-2 mb-sm-0">الدروس المرفوعة</h5>
			<div class="d-flex gap-2">
				<select class="form-select form-select-sm">
					<option value="">جميع المواد</option>
					<option value="math">الرياضيات</option>
					<option value="science">العلوم</option>
					<option value="geography">الجغرافيا</option>
				</select>
				<select class="form-select form-select-sm">
					<option value="">جميع الأنواع</option>
					<option value="video">فيديو</option>
					<option value="pdf">PDF</option>
					<option value="presentation">عرض تقديمي</option>
				</select>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row g-4">
			<!-- Lesson Card 1 -->
			<div class="col-lg-6 col-xl-4">
				<div class="card border">
					<div class="position-relative">
						<img src="assets/images/courses/4by3/01.jpg" class="card-img-top" alt="درس الرياضيات">
						<div class="position-absolute top-0 end-0 m-3">
							<span class="badge bg-primary">فيديو</span>
						</div>
						<div class="position-absolute bottom-0 start-0 m-3">
							<span class="badge bg-dark bg-opacity-75">25:30</span>
						</div>
					</div>
					<div class="card-body">
						<h6 class="card-title mb-2">
							<a href="#" class="text-decoration-none">الجمع والطرح للأعداد الكبيرة</a>
						</h6>
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="badge bg-success">الرياضيات</span>
							<span class="text-muted small">الصف الخامس أ</span>
						</div>
						<p class="card-text small text-muted">شرح مفصل لطرق الجمع والطرح للأعداد الكبيرة مع أمثلة تطبيقية</p>
						<div class="d-flex justify-content-between align-items-center">
							<small class="text-muted">رفع منذ: يومين</small>
							<div class="dropdown">
								<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-download me-2"></i>تحميل</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
								</ul>
							</div>
						</div>
						<div class="mt-2">
							<div class="d-flex align-items-center text-muted small">
								<i class="bi bi-eye me-1"></i>
								<span>47 مشاهدة</span>
								<span class="ms-3"><i class="bi bi-download me-1"></i>12 تحميل</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Lesson Card 2 -->
			<div class="col-lg-6 col-xl-4">
				<div class="card border">
					<div class="position-relative">
						<div class="bg-danger bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
							<i class="bi bi-file-earmark-pdf display-1 text-danger"></i>
						</div>
						<div class="position-absolute top-0 end-0 m-3">
							<span class="badge bg-danger">PDF</span>
						</div>
						<div class="position-absolute bottom-0 start-0 m-3">
							<span class="badge bg-dark bg-opacity-75">15 صفحة</span>
						</div>
					</div>
					<div class="card-body">
						<h6 class="card-title mb-2">
							<a href="#" class="text-decoration-none">تجارب الكيمياء الأساسية</a>
						</h6>
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="badge bg-info">العلوم</span>
							<span class="text-muted small">الصف السادس أ</span>
						</div>
						<p class="card-text small text-muted">كتيب يحتوي على تجارب كيميائية بسيطة وآمنة للطلاب</p>
						<div class="d-flex justify-content-between align-items-center">
							<small class="text-muted">رفع منذ: أسبوع</small>
							<div class="dropdown">
								<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-download me-2"></i>تحميل</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
								</ul>
							</div>
						</div>
						<div class="mt-2">
							<div class="d-flex align-items-center text-muted small">
								<i class="bi bi-eye me-1"></i>
								<span>23 مشاهدة</span>
								<span class="ms-3"><i class="bi bi-download me-1"></i>18 تحميل</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Lesson Card 3 -->
			<div class="col-lg-6 col-xl-4">
				<div class="card border">
					<div class="position-relative">
						<div class="bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
							<i class="bi bi-file-earmark-slides display-1 text-warning"></i>
						</div>
						<div class="position-absolute top-0 end-0 m-3">
							<span class="badge bg-warning">عرض تقديمي</span>
						</div>
						<div class="position-absolute bottom-0 start-0 m-3">
							<span class="badge bg-dark bg-opacity-75">32 شريحة</span>
						</div>
					</div>
					<div class="card-body">
						<h6 class="card-title mb-2">
							<a href="#" class="text-decoration-none">خريطة العالم والقارات</a>
						</h6>
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="badge bg-primary">الجغرافيا</span>
							<span class="text-muted small">الصف الخامس ب</span>
						</div>
						<p class="card-text small text-muted">عرض تقديمي تفاعلي عن قارات العالم ومميزات كل قارة</p>
						<div class="d-flex justify-content-between align-items-center">
							<small class="text-muted">رفع منذ: 3 أيام</small>
							<div class="dropdown">
								<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-download me-2"></i>تحميل</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
								</ul>
							</div>
						</div>
						<div class="mt-2">
							<div class="d-flex align-items-center text-muted small">
								<i class="bi bi-eye me-1"></i>
								<span>65 مشاهدة</span>
								<span class="ms-3"><i class="bi bi-download me-1"></i>28 تحميل</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Lesson Card 4 -->
			<div class="col-lg-6 col-xl-4">
				<div class="card border">
					<div class="position-relative">
						<img src="assets/images/courses/4by3/02.jpg" class="card-img-top" alt="درس العلوم">
						<div class="position-absolute top-0 end-0 m-3">
							<span class="badge bg-primary">فيديو</span>
						</div>
						<div class="position-absolute bottom-0 start-0 m-3">
							<span class="badge bg-dark bg-opacity-75">18:45</span>
						</div>
					</div>
					<div class="card-body">
						<h6 class="card-title mb-2">
							<a href="#" class="text-decoration-none">دورة المياه في الطبيعة</a>
						</h6>
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="badge bg-info">العلوم</span>
							<span class="text-muted small">الصف الخامس أ</span>
						</div>
						<p class="card-text small text-muted">شرح تفصيلي لدورة المياه مع أمثلة من الواقع</p>
						<div class="d-flex justify-content-between align-items-center">
							<small class="text-muted">رفع منذ: أمس</small>
							<div class="dropdown">
								<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
									<i class="bi bi-three-dots"></i>
								</button>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-download me-2"></i>تحميل</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
								</ul>
							</div>
						</div>
						<div class="mt-2">
							<div class="d-flex align-items-center text-muted small">
								<i class="bi bi-eye me-1"></i>
								<span>34 مشاهدة</span>
								<span class="ms-3"><i class="bi bi-download me-1"></i>8 تحميل</span>
							</div>
						</div>
					</div>
				</div>
			</div>
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
<!-- قائمة الدروس END -->

<script>
	// رفع الملفات
	document.addEventListener('DOMContentLoaded', function() {
		const fileInput = document.getElementById('lessonFile');
		const fileList = document.getElementById('fileList');
		const uploadForm = document.getElementById('uploadLessonForm');
		
		// التعامل مع اختيار الملفات
		fileInput.addEventListener('change', function() {
			handleFiles(this.files);
		});
		
		// التعامل مع السحب والإفلات
		const dropZone = fileInput.closest('.border-dashed');
		
		['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
			dropZone.addEventListener(eventName, preventDefaults, false);
		});
		
		function preventDefaults(e) {
			e.preventDefault();
			e.stopPropagation();
		}
		
		['dragenter', 'dragover'].forEach(eventName => {
			dropZone.addEventListener(eventName, highlight, false);
		});
		
		['dragleave', 'drop'].forEach(eventName => {
			dropZone.addEventListener(eventName, unhighlight, false);
		});
		
		function highlight(e) {
			dropZone.classList.add('border-primary', 'bg-primary', 'bg-opacity-10');
		}
		
		function unhighlight(e) {
			dropZone.classList.remove('border-primary', 'bg-primary', 'bg-opacity-10');
		}
		
		dropZone.addEventListener('drop', handleDrop, false);
		
		function handleDrop(e) {
			const dt = e.dataTransfer;
			const files = dt.files;
			handleFiles(files);
		}
		
		function handleFiles(files) {
			fileList.innerHTML = '';
			
			Array.from(files).forEach(file => {
				const fileItem = document.createElement('div');
				fileItem.className = 'alert alert-info d-flex justify-content-between align-items-center';
				fileItem.innerHTML = `
					<div>
						<i class="bi bi-file-earmark me-2"></i>
						<strong>${file.name}</strong>
						<small class="text-muted">(${formatFileSize(file.size)})</small>
					</div>
					<button type="button" class="btn btn-sm btn-outline-danger" onclick="this.parentElement.remove()">
						<i class="bi bi-x"></i>
					</button>
				`;
				fileList.appendChild(fileItem);
			});
		}
		
		function formatFileSize(bytes) {
			if (bytes === 0) return '0 Bytes';
			
			const k = 1024;
			const sizes = ['Bytes', 'KB', 'MB', 'GB'];
			const i = Math.floor(Math.log(bytes) / Math.log(k));
			
			return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
		}
		
		// إرسال النموذج
		uploadForm.addEventListener('submit', function(e) {
			e.preventDefault();
			
			// محاكاة رفع الملف
			const submitBtn = this.querySelector('button[type="submit"]');
			const originalText = submitBtn.innerHTML;
			
			submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>جارٍ الرفع...';
			submitBtn.disabled = true;
			
			setTimeout(() => {
				alert('تم رفع الدرس بنجاح!');
				submitBtn.innerHTML = originalText;
				submitBtn.disabled = false;
				resetForm();
			}, 2000);
		});
	});
	
	function resetForm() {
		document.getElementById('uploadLessonForm').reset();
		document.getElementById('fileList').innerHTML = '';
	}
</script>
