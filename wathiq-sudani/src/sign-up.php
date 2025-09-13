<?php
// تضمين ملف التكوين
require_once 'api-config.php';

$error = '';
$success = '';

// معالجة التسجيل
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $role = $_POST['role'] ?? 'student';
    $terms = $_POST['terms'] ?? false;
    
    // التحقق من صحة البيانات
    if (empty($username) || empty($email) || empty($password) || empty($first_name) || empty($last_name)) {
        $error = 'يرجى ملء جميع الحقول المطلوبة';
    } elseif ($password !== $confirm_password) {
        $error = 'كلمات المرور غير متطابقة';
    } elseif (strlen($password) < 8) {
        $error = 'كلمة المرور يجب أن تكون 8 أحرف على الأقل';
    } elseif (!$terms) {
        $error = 'يجب الموافقة على الشروط والأحكام';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'عنوان البريد الإلكتروني غير صحيح';
    } else {
        // محاولة إنشاء المستخدم
        $result = createNewUser([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'role' => $role
        ]);
        
        if ($result['success']) {
            $success = 'تم إنشاء الحساب بنجاح! يمكنك الآن تسجيل الدخول.';
            // إعادة تعيين المتغيرات
            $_POST = [];
        } else {
            $error = $result['message'] ?? 'حدث خطأ أثناء إنشاء الحساب';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
	<?php include("partials/title-meta.php"); ?>

	<?php include("partials/head-css.php"); ?>
	
	<!-- RTL Support -->
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
	<style>
		body{
			font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
			direction: rtl;
			text-align: right;
		}
		.input-group-text { border-left: 0; border-right: 1px solid #dee2e6; }
		.rounded-start { border-top-right-radius: .375rem !important; border-bottom-right-radius: .375rem !important; border-top-left-radius: 0 !important; border-bottom-left-radius: 0 !important; }
		.rounded-end { border-top-left-radius: .375rem !important; border-bottom-left-radius: .375rem !important; border-top-right-radius: 0 !important; border-bottom-right-radius: 0 !important; }
	</style>
</head>

<body>

	<!-- **************** MAIN CONTENT START **************** -->
	<main>
		<section class="p-0 d-flex align-items-center position-relative overflow-hidden">

			<div class="container-fluid">
				<div class="row">
					<!-- left -->
					<div class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10 vh-lg-100">
						<div class="p-3 p-lg-5">
							<!-- Title -->
							<div class="text-center">
								<h2 class="fw-bold">مرحباً بكم في نظام إدارة الطلاب</h2>
								<p class="mb-0 h6 fw-light">لنبدأ رحلة التعلم معاً!</p>
							</div>
							<!-- SVG Image -->
							<img src="assets/images/element/02.svg" class="mt-5" alt="">
							<!-- Info -->
							<div class="d-sm-flex mt-5 align-items-center justify-content-center">
								<ul class="avatar-group mb-2 mb-sm-0">
									<li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar"></li>
									<li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar"></li>
									<li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar"></li>
									<li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar"></li>
								</ul>
								<!-- Content -->
								<p class="mb-0 h6 fw-light ms-0 ms-sm-3">4k+ Students joined us, now it's your turn.</p>
							</div>
						</div>
					</div>

					<!-- Right -->
					<div class="col-12 col-lg-6 m-auto">
						<div class="row my-5">
							<div class="col-sm-10 col-xl-8 m-auto">
								<!-- Title -->
								<img src="assets/images/element/03.svg" class="h-40px mb-2" alt="">
								<h2>إنشاء حساب جديد</h2>
								<p class="lead mb-4">يرجى تعبئة البيانات التالية لإكمال التسجيل.</p>

								<!-- Form START -->
								<form method="POST">
									<!-- Error/Success Messages -->
									<?php if ($error): ?>
									<div class="alert alert-danger mb-3">
										<i class="bi bi-exclamation-triangle me-2"></i><?php echo $error; ?>
									</div>
									<?php endif; ?>
									
									<?php if ($success): ?>
									<div class="alert alert-success mb-3">
										<i class="bi bi-check-circle me-2"></i><?php echo $success; ?>
										<div class="mt-2">
											<a href="sign-in.php" class="btn btn-sm btn-success">تسجيل الدخول الآن</a>
										</div>
									</div>
									<?php endif; ?>

									<!-- Username -->
									<div class="mb-4">
										<label for="username" class="form-label">اسم المستخدم *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-person-fill"></i></span>
											<input type="text" class="form-control border-0 bg-light rounded-end ps-1" 
												   placeholder="اسم المستخدم" name="username" id="username" required
												   value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
										</div>
									</div>

									<!-- Email -->
									<div class="mb-4">
										<label for="email" class="form-label">البريد الإلكتروني *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
											<input type="email" class="form-control border-0 bg-light rounded-end ps-1" 
												   placeholder="البريد الإلكتروني" name="email" id="email" required
												   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
										</div>
									</div>

									<!-- First & Last name -->
									<div class="row g-3 mb-4">
										<div class="col-md-6">
											<label for="first_name" class="form-label">الاسم الأول *</label>
											<input type="text" class="form-control bg-light border-0" name="first_name" id="first_name" 
												   placeholder="مثال: أحمد" required
												   value="<?php echo htmlspecialchars($_POST['first_name'] ?? ''); ?>">
										</div>
										<div class="col-md-6">
											<label for="last_name" class="form-label">اسم العائلة *</label>
											<input type="text" class="form-control bg-light border-0" name="last_name" id="last_name" 
												   placeholder="مثال: محمد" required
												   value="<?php echo htmlspecialchars($_POST['last_name'] ?? ''); ?>">
										</div>
									</div>

									<!-- Phone & Role -->
									<div class="row g-3 mb-4">
										<div class="col-md-6">
											<label for="phone" class="form-label">رقم الهاتف</label>
											<input type="tel" class="form-control bg-light border-0" name="phone" id="phone" 
												   placeholder="مثال: +9665xxxxxxxx"
												   value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
										</div>
										<div class="col-md-6">
											<label for="role" class="form-label">نوع الحساب *</label>
											<select name="role" id="role" class="form-select bg-light border-0" required>
												<option value="student" <?php echo ($_POST['role'] ?? 'student') === 'student' ? 'selected' : ''; ?>>طالب</option>
												<option value="teacher" <?php echo ($_POST['role'] ?? '') === 'teacher' ? 'selected' : ''; ?>>مدرس</option>
											</select>
										</div>
									</div>

									<!-- Password -->
									<div class="mb-4">
										<label for="password" class="form-label">كلمة المرور *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
											<input type="password" class="form-control border-0 bg-light rounded-end ps-1" 
												   placeholder="8 أحرف على الأقل" name="password" id="password" required>
										</div>
									</div>
									
									<!-- Confirm Password -->
									<div class="mb-4">
										<label for="confirm_password" class="form-label">تأكيد كلمة المرور *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
											<input type="password" class="form-control border-0 bg-light rounded-end ps-1" 
												   placeholder="إعادة كتابة كلمة المرور" name="confirm_password" id="confirm_password" required>
										</div>
									</div>
									
									<!-- Check box -->
									<div class="mb-4">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" name="terms" id="terms" required>
											<label class="form-check-label" for="terms">
												أوافق على <a href="#" class="text-decoration-underline">الشروط والأحكام</a> وسياسة الخصوصية
											</label>
										</div>
									</div>
									
									<!-- Button -->
									<div class="align-items-center mt-0">
										<div class="d-grid">
											<button class="btn btn-primary mb-0" type="submit">
												<i class="bi bi-person-plus me-2"></i>إنشاء الحساب
											</button>
										</div>
									</div>
								</form>
								<!-- Form END -->

								<!-- Social buttons -->
								<div class="row">
									<!-- Divider with text -->
									<div class="position-relative my-4">
										<hr>
										<p class="small position-absolute top-50 start-50 translate-middle bg-body px-5">أو</p>
									</div>
									<!-- Social btn -->
									<div class="col-xxl-6 d-grid">
										<a href="#" class="btn bg-google mb-2 mb-xxl-0"><i class="fab fa-fw fa-google text-white me-2"></i>Signup with Google</a>
									</div>
									<!-- Social btn -->
									<div class="col-xxl-6 d-grid">
										<a href="#" class="btn bg-facebook mb-0"><i class="fab fa-fw fa-facebook-f me-2"></i>Signup with Facebook</a>
									</div>
								</div>

								<!-- Sign up link -->
								<div class="mt-4 text-center">
									<span>لديك حساب بالفعل؟ <a href="sign-in.php">سجّل الدخول هنا</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>



	<script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
	<script>
	(function(){
		const { createClient } = window.supabase;
		// استخدم عميل footer-scripts إن وُجد وإلا أنشئ واحداً محلياً (للرجوع فقط)
		const authReady = () => new Promise(async (resolve)=>{
			let attempts=0; while(!window.auth && attempts<50){ await new Promise(r=>setTimeout(r,100)); attempts++; }
			resolve(window.auth);
		});

		const form = document.querySelector('form');
		if(!form) return;
		const emailEl = document.getElementById('exampleInputEmail1');
		const passEl = document.getElementById('inputPassword5');
		const pass2El = document.getElementById('inputPassword6');
		const firstNameEl = document.getElementById('firstName');
		const lastNameEl = document.getElementById('lastName');
		const phoneEl = document.getElementById('phone');
		const addressEl = document.getElementById('address');
		const dobEl = document.getElementById('dob');
		const genderEl = document.getElementById('gender');
		const submitBtn = form.querySelector('button.btn.btn-primary');

		async function ensureProfileAndRoleRecords(user){
			const auth = await authReady();
			if(!auth) return;
			// user_profiles
			const { data: existingProfile } = await auth.supabase
				.from('user_profiles').select('id').eq('supabase_user_id', user.id).maybeSingle();
			let profileId = existingProfile?.id;
			if(!profileId){
				const { data: inserted, error: insErr } = await auth.supabase
					.from('user_profiles')
					.insert({
						supabase_user_id: user.id,
						arabic_first_name: user.user_metadata?.arabic_first_name || 'مستخدم',
						arabic_last_name: user.user_metadata?.arabic_last_name || 'جديد',
						role: 'student',
						is_active: true,
						gender: user.user_metadata?.gender || 'male',
						date_of_birth: user.user_metadata?.date_of_birth || '2000-01-01',
						phone: user.user_metadata?.phone || '',
						address: user.user_metadata?.address || ''
					})
					.select('id')
					.single();
				if(insErr){ console.error('profile insert error', insErr); }
				profileId = inserted?.id;
			}
			// طلاب فقط
			const { data: ex } = await auth.supabase.from('students').select('id').eq('user_profile_id', profileId).maybeSingle();
			if(!ex){
				const { data: cls } = await auth.supabase.from('school_classes').select('id').limit(1).single();
				await auth.supabase.from('students').insert({
					user_profile_id: profileId,
					student_id: `${Date.now()}`,
					school_class_id: cls?.id || null,
					enrollment_date: new Date().toISOString().slice(0,10),
					guardian_name: 'ولي الأمر'
				});
			}
		}

		async function handleSignup(){
			const email = (emailEl?.value || '').trim();
			const password = passEl?.value || '';
			const password2 = pass2El?.value || '';
			const firstName = (firstNameEl?.value || '').trim();
			const lastName = (lastNameEl?.value || '').trim();
			const phone = (phoneEl?.value || '').trim();
			const address = (addressEl?.value || '').trim();
			const dateOfBirth = (dobEl?.value || '').trim() || '2000-01-01';
			const gender = (genderEl?.value || 'male');
			if(!email || !password || !firstName || !lastName){ alert('يرجى تعبئة الحقول المطلوبة'); return; }
			if(password !== password2){ alert('كلمتا المرور غير متطابقتين'); return; }
			try{
				submitBtn && (submitBtn.disabled = true);
				const auth = await authReady();
				if(!auth){ throw new Error('Auth not ready'); }
				// افتراض الدور طالب إن لم يُحدد
				const defaultRole = 'student';
				const { error: signUpErr } = await auth.supabase.auth.signUp({
					email,
					password,
					options: { data: {
						role: 'student',
						arabic_first_name: firstName,
						arabic_last_name: lastName,
						phone,
						address,
						date_of_birth: dateOfBirth,
						gender
					}}
				});
				if(signUpErr){ throw signUpErr; }
				// بما أن التحقق مُعطّل: سجّل الدخول مباشرة
				const { data: loginData, error: loginErr } = await auth.supabase.auth.signInWithPassword({ email, password });
				if(loginErr){ throw loginErr; }
				const user = loginData.user;
				// أنشئ السجلات اللازمة
				await ensureProfileAndRoleRecords(user);
				// توجيه طالب فقط
				location.href = '/student-dashboard.php';
			}catch(err){
				alert(err.message || 'Registration failed');
			}finally{
				submitBtn && (submitBtn.disabled = false);
			}
		}

		submitBtn && submitBtn.addEventListener('click', function(e){ e.preventDefault(); handleSignup(); });
	})();
	</script>
	<?php include("partials/footer-scripts.php"); ?>

</body>

</html>