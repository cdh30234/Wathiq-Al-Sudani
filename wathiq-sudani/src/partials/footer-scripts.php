	<!-- Bootstrap JS -->
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


	<!-- Template Functions -->
	<script src="assets/js/functions.js"></script>

	<!-- PHP Session-based Auth (Supabase removed) -->
	<?php
		$__user = $_SESSION['user'] ?? null;
		$__logged = $__user ? true : false;
		$__role = $__user['role'] ?? null;
	?>
	<script>
	(function(){
		const AUTH = {
			loggedIn: <?php echo $__logged ? 'true' : 'false'; ?>,
			role: <?php echo json_encode($__role); ?>
		};

		function updateAuthUI(){
			document.querySelectorAll('.js-auth-when-logged-in').forEach(el=>{
				el.style.setProperty('display', AUTH.loggedIn ? 'block' : 'none', 'important');
			});
			document.querySelectorAll('.js-auth-when-logged-out').forEach(el=>{
				el.style.setProperty('display', AUTH.loggedIn ? 'none' : 'flex', 'important');
			});
		}

		function requireAuth(){
			if(!AUTH.loggedIn){
				const next = encodeURIComponent(location.pathname + location.search);
				location.href = `/sign-in.php?next=${next}`;
				return false;
			}
			return true;
		}

		function requireRole(roles){
			if(!requireAuth()) return false;
			const allowed = (roles||[]).map(r=>String(r||'').toLowerCase());
			if(!allowed.includes(String(AUTH.role||'').toLowerCase())){
				location.href = '/index-9.php';
				return false;
			}
			return true;
		}

		function signOut(){
			location.href = '/sign-in.php?logout=1';
		}

		window.requireAuth = requireAuth;
		window.requireRole = requireRole;
		window.signOut = signOut;

		document.addEventListener('DOMContentLoaded', function(){
			updateAuthUI();
			// Dashboard shortcuts
			document.querySelectorAll('.js-go-dashboard, .js-dashboard-link').forEach(el=>{
				el.addEventListener('click', function(e){
					e.preventDefault();
					if(!requireAuth()) return;
					switch(String(AUTH.role||'').toLowerCase()){
						case 'admin': location.href = '/admin-dashboard.php'; break;
						case 'teacher': location.href = '/instructor-dashboard.php'; break;
						default: location.href = '/student-dashboard.php';
					}
				});
			});
			// Role targeted
			document.querySelectorAll('.js-go-admin').forEach(el=>{
				el.addEventListener('click', function(e){ e.preventDefault(); if(requireRole(['admin'])) location.href='/admin-dashboard.php'; });
			});
			document.querySelectorAll('.js-go-teacher').forEach(el=>{
				el.addEventListener('click', function(e){ e.preventDefault(); if(requireRole(['teacher','admin'])) location.href='/instructor-dashboard.php'; });
			});
			document.querySelectorAll('.js-go-student').forEach(el=>{
				el.addEventListener('click', function(e){ e.preventDefault(); if(requireRole(['student','admin'])) location.href='/student-dashboard.php'; });
			});
		});
	})();
	</script>