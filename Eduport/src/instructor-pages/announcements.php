<!-- Title -->
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h3 mb-2 mb-sm-0">إدارة الإعلانات</h1>
	</div>
</div>

<!-- إضافة إعلان جديد START -->
<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">إضافة إعلان جديد</h5>
	</div>
	<div class="card-body">
		<form>
			<div class="row g-3">
				<div class="col-md-8">
					<label class="form-label">عنوان الإعلان</label>
					<input type="text" class="form-control" placeholder="أدخل عنوان الإعلان">
				</div>
				<div class="col-md-4">
					<label class="form-label">نوع الإعلان</label>
					<select class="form-select">
						<option value="general">عام</option>
						<option value="homework">واجبات</option>
						<option value="exam">امتحانات</option>
						<option value="event">فعاليات</option>
						<option value="urgent">عاجل</option>
					</select>
				</div>
				<div class="col-12">
					<label class="form-label">محتوى الإعلان</label>
					<textarea class="form-control" rows="4" placeholder="اكتب محتوى الإعلان هنا..."></textarea>
				</div>
				<div class="col-md-6">
					<label class="form-label">الفصول المستهدفة</label>
					<select class="form-select" multiple>
						<option value="5a">الصف الخامس أ</option>
						<option value="5b">الصف الخامس ب</option>
						<option value="6a">الصف السادس أ</option>
					</select>
				</div>
				<div class="col-md-6">
					<label class="form-label">تاريخ انتهاء الإعلان</label>
					<input type="date" class="form-control">
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-primary">
						<i class="bi bi-megaphone me-2"></i>نشر الإعلان
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- إضافة إعلان جديد END -->

<!-- قائمة الإعلانات START -->
<div class="row g-4">
	<div class="col-lg-6">
		<div class="card border-start border-danger border-3">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div>
					<span class="badge bg-danger">عاجل</span>
					<h6 class="card-title mb-0 mt-2">تغيير موعد امتحان الرياضيات</h6>
				</div>
				<small class="text-muted">منذ ساعة</small>
			</div>
			<div class="card-body">
				<p class="card-text">تم تأجيل امتحان الرياضيات من يوم الأربعاء إلى يوم الخميس في نفس الوقت. يرجى إبلاغ الطلاب وأولياء الأمور.</p>
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<span class="badge bg-primary me-2">الصف الخامس أ</span>
						<span class="badge bg-primary">الصف الخامس ب</span>
					</div>
					<div class="dropdown">
						<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
							<i class="bi bi-three-dots"></i>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض التفاصيل</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-lg-6">
		<div class="card border-start border-warning border-3">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div>
					<span class="badge bg-warning">واجبات</span>
					<h6 class="card-title mb-0 mt-2">واجب الوحدة الرابعة</h6>
				</div>
				<small class="text-muted">منذ 3 ساعات</small>
			</div>
			<div class="card-body">
				<p class="card-text">مطلوب حل تمارين الوحدة الرابعة صفحة 45-50 وتسليمها يوم الأحد القادم. الواجب يشمل مسائل الجمع والطرح.</p>
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<span class="badge bg-primary">الصف الخامس أ</span>
					</div>
					<div class="dropdown">
						<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
							<i class="bi bi-three-dots"></i>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض التفاصيل</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-lg-6">
		<div class="card border-start border-info border-3">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div>
					<span class="badge bg-info">فعاليات</span>
					<h6 class="card-title mb-0 mt-2">معرض العلوم المدرسي</h6>
				</div>
				<small class="text-muted">أمس</small>
			</div>
			<div class="card-body">
				<p class="card-text">ندعو جميع الطلاب للمشاركة في معرض العلوم المدرسي الذي سيقام الأسبوع القادم. يمكن للطلاب تقديم مشاريعهم العلمية.</p>
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<span class="badge bg-primary me-2">الصف الخامس أ</span>
						<span class="badge bg-primary me-2">الصف الخامس ب</span>
						<span class="badge bg-primary">الصف السادس أ</span>
					</div>
					<div class="dropdown">
						<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
							<i class="bi bi-three-dots"></i>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض التفاصيل</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-lg-6">
		<div class="card border-start border-success border-3">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div>
					<span class="badge bg-success">عام</span>
					<h6 class="card-title mb-0 mt-2">بداية الفصل الدراسي الثاني</h6>
				</div>
				<small class="text-muted">منذ يومين</small>
			</div>
			<div class="card-body">
				<p class="card-text">نتمنى لجميع الطلاب فصلاً دراسياً موفقاً. سنبدأ بمراجعة سريعة لما تم دراسته في الفصل الأول ثم الانتقال للمناهج الجديدة.</p>
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<span class="badge bg-primary me-2">الصف الخامس أ</span>
						<span class="badge bg-primary">الصف الخامس ب</span>
					</div>
					<div class="dropdown">
						<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
							<i class="bi bi-three-dots"></i>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>تعديل</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>عرض التفاصيل</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>حذف</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- قائمة الإعلانات END -->
