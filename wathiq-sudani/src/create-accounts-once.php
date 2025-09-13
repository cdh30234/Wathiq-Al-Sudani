<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>إنشاء حساب مدير ومدرس - مؤقت</title>
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
	<style>
		body{font-family:'Cairo',sans-serif;direction:rtl;text-align:right;background:#f8fafc}
		.card{border-radius:14px;box-shadow:0 8px 24px rgba(0,0,0,.06)}
		.badge-soft{background:rgba(13,110,253,.08);color:#0d6efd}
		.code{background:#0f172a;color:#e2e8f0;border-radius:8px;padding:8px 12px;font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace}
		.form-floating>label{right:12px;left:auto}
	</style>
</head>
<body>
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="card p-4 p-md-5">
					<div class="d-flex align-items-center justify-content-between mb-3">
						<h2 class="mb-0">إنشاء حسابات النظام (مرة واحدة)</h2>
						<span class="badge badge-soft rounded-pill px-3 py-2">مؤقت</span>
					</div>
					<p class="text-muted mb-4">يفضّل حذف هذه الصفحة بعد إنشاء الحسابات بنجاح.</p>

					<div class="row g-3 mb-3">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="email" class="form-control" id="adminEmail" placeholder="admin@example.com" value="admin.sms@example.com">
								<label for="adminEmail">بريد المدير</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="email" class="form-control" id="teacherEmail" placeholder="teacher@example.com" value="teacher.sms@example.com">
								<label for="teacherEmail">بريد المدرّس</label>
							</div>
						</div>
						<div class="col-12">
							<div class="form-floating">
								<input type="text" class="form-control" id="password" placeholder="123456789" value="123456789">
								<label for="password">كلمة المرور (ستستخدم للحسابين)</label>
							</div>
						</div>
					</div>

					<div class="d-flex gap-2 mb-3">
						<button id="btnCreate" class="btn btn-primary">
							<i class="bi bi-person-plus-fill"></i>
							<span>إنشاء الحسابات الآن</span>
						</button>
						<button id="btnFill" class="btn btn-outline-secondary">
							<i class="bi bi-magic"></i>
							ملء عينات سريعة
						</button>
					</div>

					<div id="status" class="alert alert-info d-flex align-items-center" role="alert" style="display:none">
						<i class="bi bi-hourglass-split me-2"></i>
						<span>جاري التنفيذ...</span>
					</div>

					<div id="results" style="display:none">
						<h5 class="mb-3">تمت العملية:</h5>
						<ul id="log" class="list-group mb-4"></ul>
						<div class="card bg-light p-3">
							<h6 class="mb-2">بيانات الدخول</h6>
							<div class="mb-2"><strong>المدير:</strong> <span class="code" id="outAdmin"></span> / <span class="code" id="outPwd"></span></div>
							<div><strong>المدرس:</strong> <span class="code" id="outTeacher"></span> / <span class="code" id="outPwd2"></span></div>
						</div>
						<div class="text-end mt-3">
							<a href="sign-in.php" class="btn btn-primary">الانتقال لتسجيل الدخول</a>
							<a href="index-9.php" class="btn btn-outline-secondary">العودة للرئيسية</a>
						</div>
					</div>

					<div id="error" class="alert alert-danger d-none" role="alert"></div>
				</div>
			</div>
		</div>
	</div>

	<?php include("partials/footer-scripts.php"); ?>
	<script>
	(function(){
		const logEl = document.getElementById('log');
		const statusEl = document.getElementById('status');
		const resultsEl = document.getElementById('results');
		const errorEl = document.getElementById('error');
		const btn = document.getElementById('btnCreate');
		const btnFill = document.getElementById('btnFill');

		function addLog(text, type='success'){
			const li = document.createElement('li');
			li.className = 'list-group-item d-flex align-items-center justify-content-between';
			li.innerHTML = `<span>${text}</span>`;
			if(type==='error'){ li.classList.add('list-group-item-danger'); }
			else if(type==='warn'){ li.classList.add('list-group-item-warning'); }
			else if(type==='info'){ li.classList.add('list-group-item-light'); }
			logEl.appendChild(li);
		}

		function validEmail(email){
			return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
		}

		async function ensureUser(email, password, meta){
			const { data, error } = await window.auth.supabase.auth.signUp({
				email, password,
				options: { data: meta }
			});
			if(error && !String(error.message).includes('already registered')){
				throw error;
			}
			// Sign in to get id
			const { data: loginData, error: loginErr } = await window.auth.supabase.auth.signInWithPassword({ email, password });
			if(loginErr){ throw loginErr; }
			return loginData.user;
		}

		async function ensureUserProfile(user, role){
			const { data: existing, error: selErr } = await window.auth.supabase
				.from('user_profiles').select('id').eq('supabase_user_id', user.id).maybeSingle();
			if(selErr){ throw selErr; }
			if(existing){ return existing.id; }
			const profile = {
				supabase_user_id: user.id,
				arabic_first_name: user.user_metadata?.arabic_first_name || (role==='admin'?'مدير':'مدرس'),
				arabic_last_name: user.user_metadata?.arabic_last_name || 'النظام',
				role: role,
				is_active: true,
				gender: 'male',
				date_of_birth: '1990-01-01',
				national_id: role==='admin'?'3000000000':'1000000000',
				phone: '+966500000000',
				address: 'السعودية'
			};
			const { data: ins, error: insErr } = await window.auth.supabase.from('user_profiles').insert(profile).select('id').single();
			if(insErr){ throw insErr; }
			return ins.id;
		}

		async function ensureTeacherRecord(profileId){
			const { data: existing } = await window.auth.supabase
				.from('teachers').select('id').eq('user_profile_id', profileId).maybeSingle();
			if(existing){ return existing.id; }
			const payload = {
				user_profile_id: profileId,
				employee_id: `T${Date.now()}`,
				specialization: 'عام',
				qualification: 'بكالوريوس',
				experience_years: 3,
				hire_date: new Date().toISOString().slice(0,10),
				salary: 6000
			};
			const { data: ins, error } = await window.auth.supabase.from('teachers').insert(payload).select('id').single();
			if(error){ throw error; }
			return ins.id;
		}

		async function createAccounts(){
			const adminEmail = document.getElementById('adminEmail').value.trim();
			const teacherEmail = document.getElementById('teacherEmail').value.trim();
			const password = document.getElementById('password').value;

			errorEl.classList.add('d-none');
			logEl.innerHTML = '';

			if(!validEmail(adminEmail) || !validEmail(teacherEmail)){
				errorEl.classList.remove('d-none');
				errorEl.textContent = 'يرجى إدخال بريدين إلكترونيين صالحين.';
				return;
			}

			statusEl.style.display = 'flex';
			statusEl.className = 'alert alert-info d-flex align-items-center';
			statusEl.innerHTML = '<i class="bi bi-hourglass-split me-2"></i><span>جاري إنشاء الحسابات...</span>';
			btn.disabled = true;

			try{
				let attempts = 0; while(!window.auth && attempts < 50){ await new Promise(r=>setTimeout(r,100)); attempts++; }
				if(!window.auth) throw new Error('تعذر تحميل نظام المصادقة');

				addLog('إنشاء/تأكيد حساب المدير...','info');
				const adminUser = await ensureUser(adminEmail, password, { role:'admin', arabic_first_name:'مدير', arabic_last_name:'النظام' });
				await ensureUserProfile(adminUser, 'admin');
				addLog('تم تجهيز حساب المدير.','success');

				addLog('إنشاء/تأكيد حساب المدرّس...','info');
				const teacherUser = await ensureUser(teacherEmail, password, { role:'teacher', arabic_first_name:'مدرس', arabic_last_name:'النظام' });
				const teacherProfileId = await ensureUserProfile(teacherUser, 'teacher');
				await ensureTeacherRecord(teacherProfileId);
				addLog('تم تجهيز حساب المدرّس وسجل المدرّس.','success');

				statusEl.className = 'alert alert-success d-flex align-items-center';
				statusEl.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i><span>تم إنشاء الحسابات بنجاح.</span>';
				resultsEl.style.display = 'block';
				document.getElementById('outAdmin').textContent = adminEmail;
				document.getElementById('outTeacher').textContent = teacherEmail;
				document.getElementById('outPwd').textContent = password;
				document.getElementById('outPwd2').textContent = password;
			} catch(err){
				console.error(err);
				statusEl.className = 'alert alert-warning d-flex align-items-center';
				let msg = err?.message || String(err);
				if(msg.includes('SMTP') || msg.includes('signups') || msg.includes('disabled')){
					msg = 'تعذّر إنشاء الحساب لأن التسجيل عبر البريد الإلكتروني مقفّل في Supabase. فعّل Email Signups من Auth > Providers أو أنشئ المستخدم عبر لوحة Supabase.';
				}
				statusEl.innerHTML = '<i class="bi bi-exclamation-triangle-fill me-2"></i><span>حدث تنبيه أثناء التنفيذ.</span>';
				errorEl.classList.remove('d-none');
				errorEl.textContent = msg;
			} finally {
				btn.disabled = false;
			}
		}

		btn.addEventListener('click', function(){ createAccounts(); });
		btnFill.addEventListener('click', function(){
			document.getElementById('adminEmail').value = `admin.${Date.now()}@gmail.com`;
			document.getElementById('teacherEmail').value = `teacher.${Date.now()}@gmail.com`;
		});
	})();
	</script>
</body>
</html>
