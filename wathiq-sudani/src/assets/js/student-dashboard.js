/**
 * إدارة لوحة تحكم الطالب
 * Student Dashboard Management
 */

// كائن إدارة النظام الرئيسي
const StudentDashboard = {
    // إعدادات النظام
    settings: {
        apiUrl: 'student-api.php',
        currentPage: 'dashboard',
        loadingTimeout: 5000,
        animationDuration: 300
    },

    // تهيئة النظام
    init() {
        this.setupEventListeners();
        this.loadInitialData();
        this.loadPage('dashboard');
        this.initializeTooltips();
        this.setupTheme();
    },

    // إعداد مستمعي الأحداث
    setupEventListeners() {
        // قائمة التنقل
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const page = e.target.getAttribute('data-page') || 
                            e.target.closest('[data-page]').getAttribute('data-page');
                if (page) {
                    this.loadPage(page);
                }
            });
        });

        // إعدادات السمة
        document.addEventListener('change', (e) => {
            if (e.target.name === 'theme') {
                this.applyTheme(e.target.value);
            }
        });

        // حفظ الإعدادات
        document.addEventListener('submit', (e) => {
            if (e.target.closest('.settings-form')) {
                e.preventDefault();
                this.saveSettings(e.target);
            }
        });

        // البحث في الإعلانات
        document.addEventListener('input', (e) => {
            if (e.target.id === 'announcementSearch') {
                this.filterAnnouncements(e.target.value);
            }
        });
    },

    // تحميل البيانات الأولية
    async loadInitialData() {
        try {
            // تحميل معلومات الطالب
            const studentInfo = await this.fetchData('student_info');
            this.updateStudentInfo(studentInfo);

            // تحميل الإحصائيات السريعة
            const quickStats = await this.fetchData('quick_stats');
            this.updateQuickStats(quickStats);

        } catch (error) {
            console.error('Error loading initial data:', error);
            this.showNotification('فشل في تحميل البيانات الأولية', 'error');
        }
    },

    // تحميل صفحة معينة
    async loadPage(page) {
        if (this.settings.currentPage === page) return;

        this.showLoadingState();
        this.updateActiveMenuItem(page);

        try {
            const response = await fetch(`student-pages/${page}.php`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const content = await response.text();
            this.renderPageContent(content);
            this.settings.currentPage = page;
            
            // تحميل البيانات الخاصة بالصفحة
            await this.loadPageData(page);

        } catch (error) {
            console.error('Error loading page:', error);
            this.showErrorMessage();
        } finally {
            this.hideLoadingState();
        }
    },

    // تحميل بيانات الصفحة
    async loadPageData(page) {
        try {
            switch (page) {
                case 'dashboard':
                    await this.loadDashboardData();
                    break;
                case 'grades':
                    await this.loadGradesData();
                    break;
                case 'attendance':
                    await this.loadAttendanceData();
                    break;
                case 'lessons':
                    await this.loadLessonsData();
                    break;
                case 'announcements':
                    await this.loadAnnouncementsData();
                    break;
                case 'reports':
                    await this.loadReportsData();
                    break;
            }
        } catch (error) {
            console.error(`Error loading ${page} data:`, error);
        }
    },

    // تحميل بيانات لوحة التحكم
    async loadDashboardData() {
        const [subjects, announcements] = await Promise.all([
            this.fetchData('subjects'),
            this.fetchData('announcements')
        ]);

        this.renderSubjects(subjects);
        this.renderRecentAnnouncements(announcements.slice(0, 3));
        this.initializeCounters();
    },

    // تحميل بيانات الدرجات
    async loadGradesData() {
        const grades = await this.fetchData('grades');
        this.renderGradeChart(grades);
        this.renderGradeTable(grades);
    },

    // تحميل بيانات الحضور
    async loadAttendanceData() {
        const attendance = await this.fetchData('attendance');
        this.renderAttendanceChart(attendance);
        this.renderAttendanceTable(attendance);
    },

    // جلب البيانات من API
    async fetchData(endpoint) {
        const response = await fetch(`${this.settings.apiUrl}?action=${endpoint}`);
        const data = await response.json();
        
        if (!data.success) {
            throw new Error(data.error || 'فشل في جلب البيانات');
        }
        
        return data.data;
    },

    // إرسال البيانات لـ API
    async postData(endpoint, data) {
        const response = await fetch(`${this.settings.apiUrl}?action=${endpoint}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();
        
        if (!result.success) {
            throw new Error(result.error || 'فشل في إرسال البيانات');
        }
        
        return result;
    },

    // عرض المحتوى
    renderPageContent(content) {
        const container = document.getElementById('pageContent');
        if (container) {
            container.style.opacity = '0';
            
            setTimeout(() => {
                container.innerHTML = content;
                container.style.opacity = '1';
                
                // تنفيذ الـ scripts الموجودة في المحتوى
                this.executePageScripts(container);
            }, this.settings.animationDuration / 2);
        }
    },

    // تنفيذ الـ scripts
    executePageScripts(container) {
        const scripts = container.querySelectorAll('script');
        scripts.forEach(script => {
            const newScript = document.createElement('script');
            if (script.src) {
                newScript.src = script.src;
            } else {
                newScript.textContent = script.textContent;
            }
            document.head.appendChild(newScript);
        });
    },

    // تحديث العنصر النشط في القائمة
    updateActiveMenuItem(page) {
        document.querySelectorAll('.menu-item').forEach(item => {
            item.classList.remove('active');
        });
        
        const activeItem = document.querySelector(`[data-page="${page}"]`);
        if (activeItem) {
            activeItem.classList.add('active');
        }
    },

    // عرض حالة التحميل
    showLoadingState() {
        const container = document.getElementById('pageContent');
        if (container) {
            container.innerHTML = `
                <div class="d-flex justify-content-center align-items-center" style="min-height: 400px;">
                    <div class="text-center">
                        <div class="spinner-border text-primary mb-3" role="status">
                            <span class="visually-hidden">جاري التحميل...</span>
                        </div>
                        <p class="text-muted">جاري تحميل البيانات...</p>
                    </div>
                </div>
            `;
        }
    },

    // إخفاء حالة التحميل
    hideLoadingState() {
        // سيتم استبدال المحتوى في renderPageContent
    },

    // عرض رسالة خطأ
    showErrorMessage() {
        const container = document.getElementById('pageContent');
        if (container) {
            container.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">خطأ في التحميل!</h4>
                    <p>عذراً، حدث خطأ أثناء تحميل الصفحة. يرجى المحاولة مرة أخرى.</p>
                    <hr>
                    <button class="btn btn-outline-danger" onclick="location.reload()">
                        <i class="bi bi-arrow-clockwise me-2"></i>إعادة المحاولة
                    </button>
                </div>
            `;
        }
    },

    // تحديث معلومات الطالب
    updateStudentInfo(info) {
        // تحديث الاسم
        document.querySelectorAll('.student-name').forEach(element => {
            element.textContent = info.name;
        });

        // تحديث البريد الإلكتروني
        document.querySelectorAll('.student-email').forEach(element => {
            element.textContent = info.email;
        });

        // تحديث الصورة
        document.querySelectorAll('.student-avatar').forEach(element => {
            element.src = info.avatar;
        });
    },

    // تحديث الإحصائيات السريعة
    updateQuickStats(stats) {
        Object.keys(stats).forEach(key => {
            const element = document.getElementById(`stat-${key}`);
            if (element) {
                element.textContent = stats[key];
            }
        });
    },

    // تهيئة العدادات المتحركة
    initializeCounters() {
        if (typeof PureCounter !== 'undefined') {
            new PureCounter();
        }
    },

    // تهيئة tooltips
    initializeTooltips() {
        if (typeof bootstrap !== 'undefined') {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
    },

    // إعداد السمة
    setupTheme() {
        const savedTheme = localStorage.getItem('student-theme') || 'light';
        this.applyTheme(savedTheme);
    },

    // تطبيق السمة
    applyTheme(theme) {
        document.documentElement.setAttribute('data-bs-theme', theme);
        localStorage.setItem('student-theme', theme);
        
        // تحديث الراديو buttons
        const themeRadio = document.querySelector(`input[name="theme"][value="${theme}"]`);
        if (themeRadio) {
            themeRadio.checked = true;
        }
    },

    // حفظ الإعدادات
    async saveSettings(form) {
        try {
            const formData = new FormData(form);
            const settings = Object.fromEntries(formData.entries());
            
            await this.postData('update_settings', settings);
            this.showNotification('تم حفظ الإعدادات بنجاح', 'success');
            
        } catch (error) {
            console.error('Error saving settings:', error);
            this.showNotification('فشل في حفظ الإعدادات', 'error');
        }
    },

    // تصفية الإعلانات
    filterAnnouncements(searchTerm) {
        const announcements = document.querySelectorAll('.announcement-item');
        announcements.forEach(item => {
            const title = item.querySelector('.announcement-title').textContent.toLowerCase();
            const content = item.querySelector('.announcement-content').textContent.toLowerCase();
            
            if (title.includes(searchTerm.toLowerCase()) || content.includes(searchTerm.toLowerCase())) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    },

    // عرض الإشعارات
    showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        // إزالة الإشعار تلقائياً بعد 5 ثوان
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    },

    // رسم مخطط الدرجات
    renderGradeChart(data) {
        const chartElement = document.querySelector('#gradesRadarChart');
        if (!chartElement || typeof ApexCharts === 'undefined') return;

        const options = {
            series: [{
                name: 'الدرجات',
                data: data.semester_grades.map(item => item.grade)
            }],
            chart: {
                height: 350,
                type: 'radar',
                fontFamily: 'Cairo, Arial, sans-serif'
            },
            xaxis: {
                categories: data.semester_grades.map(item => item.subject)
            },
            colors: ['#0d6efd'],
            markers: {
                size: 6
            }
        };

        new ApexCharts(chartElement, options).render();
    },

    // رسم مخطط الحضور
    renderAttendanceChart(data) {
        const chartElement = document.querySelector('#attendanceChart');
        if (!chartElement || typeof ApexCharts === 'undefined') return;

        const options = {
            series: [
                data.monthly_stats.present,
                data.monthly_stats.absent,
                data.monthly_stats.late,
                data.monthly_stats.excused
            ],
            chart: {
                type: 'donut',
                height: 350,
                fontFamily: 'Cairo, Arial, sans-serif'
            },
            labels: ['حضور', 'غياب', 'تأخير', 'غياب بعذر'],
            colors: ['#198754', '#dc3545', '#fd7e14', '#6f42c1'],
            legend: {
                position: 'bottom'
            }
        };

        new ApexCharts(chartElement, options).render();
    }
};

// تهيئة النظام عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', function() {
    StudentDashboard.init();
});

// تصدير الكائن للاستخدام العام
window.StudentDashboard = StudentDashboard;
