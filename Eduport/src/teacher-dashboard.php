<?php
// Teacher Dashboard - Student Management
// Path: /Eduport/src/teacher-dashboard.php

session_start();

// Check if teacher is logged in
if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header('Location: teacher-login.php');
    exit();
}

// Teacher information from session
$teacher_id = $_SESSION['teacher_id'] ?? '';
$teacher_name = $_SESSION['teacher_name'] ?? '';
$teacher_arabic_name = $_SESSION['teacher_arabic_name'] ?? '';

// Include configuration
include_once 'config/database.php';

// Get teacher's classes
$teacher_classes = [];
try {
    $stmt = $pdo->prepare("
        SELECT sc.id, sc.name as class_name, g.name as grade_name, 
               COUNT(s.id) as student_count
        FROM school_classes sc 
        JOIN grades g ON sc.grade_id = g.id 
        LEFT JOIN students s ON s.school_class_id = sc.id
        JOIN teacher_classes tc ON tc.school_class_id = sc.id
        WHERE tc.teacher_id = ?
        GROUP BY sc.id, sc.name, g.name
        ORDER BY g.level, sc.name
    ");
    $stmt->execute([$teacher_id]);
    $teacher_classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_message = "خطأ في جلب بيانات الفصول: " . $e->getMessage();
}

// Get total students count for this teacher
$total_students = 0;
try {
    $stmt = $pdo->prepare("
        SELECT COUNT(s.id) as total 
        FROM students s 
        JOIN school_classes sc ON s.school_class_id = sc.id
        JOIN teacher_classes tc ON tc.school_class_id = sc.id
        WHERE tc.teacher_id = ?
    ");
    $stmt->execute([$teacher_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_students = $result['total'] ?? 0;
} catch (PDOException $e) {
    $total_students = 0;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>لوحة المدرس - إدارة الطلاب | متوسطة الشهيد كاظم جلاب الحيدري</title>
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="مدرسة الشهيد كاظم جلاب الحيدري">
    <meta name="description" content="لوحة تحكم المدرس لإدارة الطلاب والدروس">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')
        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())
    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/apexcharts/css/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/overlay-scrollbar/css/overlayscrollbars.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Arabic Font CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/arabic-fonts.css">

    <!-- RTL CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style-rtl.css">

</head>

<body>

<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- Sidebar START -->
<nav class="navbar sidebar navbar-expand-xl navbar-dark bg-dark">

    <!-- Navbar brand for xl START -->
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="teacher-dashboard.php">
            <img class="navbar-brand-item" src="assets/images/logo-sms-light.svg" alt="نظام إدارة المدرسة">
        </a>
    </div>
    <!-- Navbar brand for xl END -->
    
    <div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar">
        <div class="offcanvas-body sidebar-content d-flex flex-column bg-dark">

            <!-- Sidebar menu START -->
            <ul class="navbar-nav flex-column" id="navbar-sidebar">
                
                <!-- Menu item 1 -->
                <li class="nav-item"><a href="teacher-dashboard.php" class="nav-link active"><i class="bi bi-house fa-fw me-2"></i>لوحة التحكم</a></li>
                
                <!-- Menu item 2 -->
                <li class="nav-item ms-2 my-2">إدارة الطلاب</li>
                
                <!-- Menu item 3 -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#collapsepage" role="button" aria-expanded="false" aria-controls="collapsepage">
                        <i class="bi bi-people fa-fw me-2"></i>الطلاب
                    </a>
                    <!-- Submenu START -->
                    <ul class="nav collapse flex-column" id="collapsepage" data-bs-parent="#navbar-sidebar">
                        <li class="nav-item"> <a class="nav-link" href="teacher-students-list.php">قائمة الطلاب</a></li>
                        <li class="nav-item"> <a class="nav-link" href="teacher-student-add.php">إضافة طالب</a></li>
                        <li class="nav-item"> <a class="nav-link" href="teacher-attendance.php">الغياب والحضور</a></li>
                    </ul>
                    <!-- Submenu END -->
                </li>

                <!-- Menu item 4 -->
                <li class="nav-item ms-2 my-2">إدارة الدروس</li>
                
                <!-- Menu item 5 -->
                <li class="nav-item">
                    <a class="nav-link" href="teacher-lessons.php">
                        <i class="bi bi-journal-text fa-fw me-2"></i>الدروس
                    </a>
                </li>

                <!-- Menu item 6 -->
                <li class="nav-item">
                    <a class="nav-link" href="teacher-grades.php">
                        <i class="bi bi-award fa-fw me-2"></i>الدرجات
                    </a>
                </li>

                <!-- Divider -->
                <hr>

                <!-- Menu item 7 -->
                <li class="nav-item">
                    <a class="nav-link" href="teacher-profile.php">
                        <i class="bi bi-person fa-fw me-2"></i>الملف الشخصي
                    </a>
                </li>

                <!-- Menu item 8 -->
                <li class="nav-item">
                    <a class="nav-link" href="teacher-logout.php">
                        <i class="bi bi-power fa-fw me-2"></i>تسجيل الخروج
                    </a>
                </li>

            </ul>
            <!-- Sidebar menu end -->

            <!-- Sidebar footer START -->
            <div class="px-3 mt-auto pt-3">
                <div class="d-flex align-items-center justify-content-between text-primary-hover">
                        <a class="h6 mb-0 text-body" href="teacher-profile.php" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض الملف الشخصي">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/default-teacher.jpg" alt="avatar">
                        </a>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0 text-white"><?php echo htmlspecialchars($teacher_arabic_name); ?></h6>
                            <p class="mb-0 small text-muted">مدرس</p>
                        </div>
                </div>
            </div>
            <!-- Sidebar footer END -->

        </div>
    </div>
</nav>
<!-- Sidebar END -->

<!-- Page content START -->
<div class="page-content">

    <!-- Top bar START -->
    <nav class="navbar top-bar navbar-light border-bottom py-0 py-xl-3">
        <div class="container-fluid p-0">
            <div class="d-flex align-items-center w-100">

                <!-- Logo START -->
                <div class="d-flex align-items-center d-xl-none">
                    <a class="navbar-brand" href="teacher-dashboard.php">
                        <img class="navbar-brand-item h-30px" src="assets/images/logo-sms.svg" alt="">
                    </a>
                </div>
                <!-- Logo END -->

                <!-- Toggler for sidebar START -->
                <div class="navbar-expand-xl sidebar-offcanvas-menu">
                    <button class="navbar-toggler me-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="outside">
                        <i class="bi bi-text-justify fa-fw h6 lh-0 fw-bold text-dark" data-bs-target="#offcanvasSidebar"></i>
                        <span class="h6 mb-0 fw-bold d-lg-inline-block text-dark">لوحة المدرس</span>
                    </button>
                </div>
                <!-- Toggler for sidebar END -->
                
                <!-- Top bar left -->
                <div class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                    <!-- Dark mode options START -->
                    <div class="nav-item dropdown me-2">
                        <button class="btn btn-light btn-round mb-0" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                            <svg class="theme-icon-active d-none d-lg-inline-block me-1" width="16" height="16"><use href="#"></use></svg>
                            <span class="d-lg-none">تبديل الوضع</span>
                        </button>

                        <ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
                                    <svg class="bi theme-icon me-2 opacity-50" width="16" height="16"><use href="#sun-fill"></use></svg>
                                    الوضع النهاري
                                </button>
                            </li>
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                                    <svg class="bi theme-icon me-2 opacity-50" width="16" height="16"><use href="#moon-stars-fill"></use></svg>
                                    الوضع الليلي
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto">
                                    <svg class="bi theme-icon me-2 opacity-50" width="16" height="16"><use href="#circle-half"></use></svg>
                                    تلقائي
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- Dark mode options END-->

                    <!-- Profile dropdown START -->
                    <div class="nav-item ms-2 dropdown">
                        <!-- Avatar -->
                        <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/default-teacher.jpg" alt="avatar">
                        </a>

                        <!-- Profile dropdown START -->
                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                            <!-- Profile info -->
                            <li class="px-3 mb-3">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <img class="avatar-img rounded-circle shadow" src="assets/images/avatar/default-teacher.jpg" alt="avatar">
                                    </div>
                                    <div>
                                        <a class="h6 mt-2 mt-sm-0" href="#"><?php echo htmlspecialchars($teacher_arabic_name); ?></a>
                                        <p class="small m-0">مدرس</p>
                                    </div>
                                </div>
                            </li>

                            <!-- Links -->
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="teacher-profile.php"><i class="bi bi-person fa-fw me-2"></i>تعديل الملف الشخصي</a></li>
                            <li><a class="dropdown-item" href="teacher-settings.php"><i class="bi bi-gear fa-fw me-2"></i>إعدادات الحساب</a></li>
                            <li><a class="dropdown-item bg-danger-soft-hover" href="teacher-logout.php"><i class="bi bi-power fa-fw me-2"></i>تسجيل الخروج</a></li>
                        </ul>
                        <!-- Profile dropdown END -->
                    </div>
                    <!-- Profile dropdown END -->
                </div>
            </div>
        </div>
    </nav>
    <!-- Top bar END -->

    <!-- Page main content START -->
    <div class="page-content-wrapper border">

        <!-- Title -->
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-2 mb-sm-0 cairo-font-bold">مرحباً، د. <?php echo htmlspecialchars($teacher_arabic_name); ?></h1>
                <p class="mb-0">لوحة التحكم الخاصة بك لإدارة الطلاب والدروس</p>
            </div>
        </div>

        <!-- Counter boxes START -->
        <div class="row g-4 mb-4">
            <!-- Counter item -->
            <div class="col-sm-6 col-lg-3">
                <div class="card card-body bg-warning bg-opacity-15 border border-warning border-opacity-25 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <h2 class="purecounter mb-0 fw-bold text-warning" data-purecounter-start="0" data-purecounter-end="<?php echo $total_students; ?>" data-purecounter-delay="200"><?php echo $total_students; ?></h2>
                            <span class="mb-0 h6 fw-light">إجمالي الطلاب</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-warning text-white mb-0"><i class="bi bi-people fa-fw"></i></div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-sm-6 col-lg-3">
                <div class="card card-body bg-purple bg-opacity-10 border border-purple border-opacity-25 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <h2 class="purecounter mb-0 fw-bold text-purple" data-purecounter-start="0" data-purecounter-end="<?php echo count($teacher_classes); ?>" data-purecounter-delay="200"><?php echo count($teacher_classes); ?></h2>
                            <span class="mb-0 h6 fw-light">الفصول المُدرَّسة</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-purple text-white mb-0"><i class="bi bi-collection fa-fw"></i></div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-sm-6 col-lg-3">
                <div class="card card-body bg-primary bg-opacity-10 border border-primary border-opacity-25 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <h2 class="purecounter mb-0 fw-bold text-primary" data-purecounter-start="0" data-purecounter-end="8" data-purecounter-delay="200">8</h2>
                            <span class="mb-0 h6 fw-light">الدروس هذا الأسبوع</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-primary text-white mb-0"><i class="bi bi-journal-text fa-fw"></i></div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-sm-6 col-lg-3">
                <div class="card card-body bg-success bg-opacity-10 border border-success border-opacity-25 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <h2 class="purecounter mb-0 fw-bold text-success" data-purecounter-start="0" data-purecounter-end="95" data-purecounter-delay="200">95</h2>
                            <span class="mb-0 h6 fw-light">نسبة الحضور %</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-success text-white mb-0"><i class="bi bi-check-circle fa-fw"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter boxes END -->

        <!-- Chart and Table START -->
        <div class="row g-4 mb-4">
            
            <!-- My Classes START -->
            <div class="col-lg-8">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-bottom d-sm-flex justify-content-between align-items-center">
                        <h5 class="mb-2 mb-sm-0">فصولي الدراسية</h5>
                        <a href="teacher-students-list.php" class="btn btn-sm btn-primary-soft mb-0">عرض جميع الطلاب</a>
                    </div>

                    <!-- Card body START -->
                    <div class="card-body">
                        <?php if (!empty($teacher_classes)): ?>
                        <div class="row g-3">
                            <?php foreach ($teacher_classes as $class): ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card bg-transparent border h-100">
                                    <div class="card-header bg-light border-bottom">
                                        <h6 class="card-title mb-0"><?php echo htmlspecialchars($class['grade_name'] . ' - ' . $class['class_name']); ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="text-primary"><?php echo $class['student_count']; ?></h4>
                                                <span class="small">طالب</span>
                                            </div>
                                            <div class="icon-lg rounded-circle bg-primary bg-opacity-10 text-primary">
                                                <i class="bi bi-people fa-fw"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <a href="teacher-students-list.php?class_id=<?php echo $class['id']; ?>" class="btn btn-sm btn-outline-primary">إدارة الطلاب</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php else: ?>
                        <div class="text-center py-4">
                            <i class="bi bi-collection display-4 text-muted"></i>
                            <h6 class="mt-2">لا توجد فصول مُخصصة لك حالياً</h6>
                            <p class="mb-0 text-muted">يرجى التواصل مع الإدارة لتخصيص الفصول</p>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- Card body END -->
                </div>
            </div>
            <!-- My Classes END -->

            <!-- Recent Activity START -->
            <div class="col-lg-4">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-bottom">
                        <h5 class="card-title mb-0">النشاطات الأخيرة</h5>
                    </div>

                    <!-- Card body START -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-sm-flex align-items-center mb-1 mb-sm-0">
                                <div class="avatar avatar-md flex-shrink-0">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/student1.jpg" alt="">
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-1">أحمد محمد الخالدي</h6>
                                    <ul class="nav nav-divider small">
                                        <li class="nav-item">تم إضافته للفصل</li>
                                    </ul>
                                </div>
                            </div>
                            <span class="badge bg-success bg-opacity-10 text-success small">اليوم</span>
                        </div>

                        <hr><!-- Divider -->

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-sm-flex align-items-center mb-1 mb-sm-0">
                                <div class="avatar avatar-md flex-shrink-0">
                                    <div class="avatar-img rounded-circle bg-warning">
                                        <i class="bi bi-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-1">تحديث الدرجات</h6>
                                    <ul class="nav nav-divider small">
                                        <li class="nav-item">درجات الاختبار الشهري</li>
                                    </ul>
                                </div>
                            </div>
                            <span class="badge bg-orange bg-opacity-10 text-orange small">أمس</span>
                        </div>

                        <hr><!-- Divider -->

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-sm-flex align-items-center mb-1 mb-sm-0">
                                <div class="avatar avatar-md flex-shrink-0">
                                    <div class="avatar-img rounded-circle bg-info">
                                        <i class="bi bi-calendar-check text-white"></i>
                                    </div>
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-1">تسجيل الحضور</h6>
                                    <ul class="nav nav-divider small">
                                        <li class="nav-item">الثاني متوسط أ</li>
                                    </ul>
                                </div>
                            </div>
                            <span class="badge bg-info bg-opacity-10 text-info small">قبل يومين</span>
                        </div>

                        <!-- View all button -->
                        <div class="d-grid mt-3">
                            <a href="#" class="btn btn-primary-soft">عرض جميع النشاطات</a>
                        </div>
                    </div>
                    <!-- Card body END -->
                </div>
            </div>
            <!-- Recent Activity END -->
        </div>
        <!-- Chart and Table END -->

    </div>
    <!-- Page main content END -->
</div>
<!-- Page content END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Dark mode, themeicon, etc. scripts -->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
    </symbol>
</svg>

<!-- Vendors -->
<script src="assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/overlay-scrollbar/js/overlayscrollbars.min.js"></script>

<!-- Template Functions -->
<script src="assets/js/functions.js"></script>

</body>
</html>
