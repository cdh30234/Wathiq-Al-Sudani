/**
 * JavaScript لإدارة الطلاب - لوحة المدرس
 * Teacher Student Management JavaScript
 */

class StudentManager {
    constructor() {
        this.currentPage = 1;
        this.studentsPerPage = 20;
        this.currentClassId = '';
        this.searchQuery = '';
        
        this.init();
    }
    
    init() {
        this.loadClasses();
        this.loadStudents();
        this.bindEvents();
        this.initModals();
    }
    
    /**
     * ربط الأحداث
     */
    bindEvents() {
        // تصفية حسب الفصل
        const classFilter = document.getElementById('classFilter');
        if (classFilter) {
            classFilter.addEventListener('change', (e) => {
                this.currentClassId = e.target.value;
                this.currentPage = 1;
                this.loadStudents();
            });
        }
        
        // البحث
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            let searchTimeout;
            searchInput.addEventListener('input', (e) => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    this.searchQuery = e.target.value;
                    this.currentPage = 1;
                    this.loadStudents();
                }, 500);
            });
        }
        
        // إضافة طالب جديد
        const addStudentBtn = document.getElementById('addStudentBtn');
        if (addStudentBtn) {
            addStudentBtn.addEventListener('click', () => {
                this.showAddStudentModal();
            });
        }
        
        // نموذج إضافة طالب
        const addStudentForm = document.getElementById('addStudentForm');
        if (addStudentForm) {
            addStudentForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.addStudent();
            });
        }
        
        // نموذج تحديث طالب
        const editStudentForm = document.getElementById('editStudentForm');
        if (editStudentForm) {
            editStudentForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.updateStudent();
            });
        }
    }
    
    /**
     * تهيئة المودالز
     */
    initModals() {
        // مودال إضافة طالب
        this.addStudentModal = new bootstrap.Modal(document.getElementById('addStudentModal'));
        
        // مودال تحديث طالب
        this.editStudentModal = new bootstrap.Modal(document.getElementById('editStudentModal'));
        
        // مودال تأكيد الحذف
        this.deleteStudentModal = new bootstrap.Modal(document.getElementById('deleteStudentModal'));
    }
    
    /**
     * تحميل قائمة الفصول
     */
    async loadClasses() {
        try {
            const response = await fetch('api/students.php?action=get_classes');
            const data = await response.json();
            
            if (data.success) {
                this.renderClassFilter(data.classes);
            } else {
                console.error('خطأ في تحميل الفصول:', data.error);
            }
        } catch (error) {
            console.error('خطأ في الشبكة:', error);
        }
    }
    
    /**
     * عرض فلتر الفصول
     */
    renderClassFilter(classes) {
        const classFilter = document.getElementById('classFilter');
        if (!classFilter) return;
        
        classFilter.innerHTML = '<option value="">جميع الفصول</option>';
        
        classes.forEach(cls => {
            const option = document.createElement('option');
            option.value = cls.id;
            option.textContent = `${cls.grade_name} - ${cls.class_name} (${cls.student_count} طالب)`;
            classFilter.appendChild(option);
        });
    }
    
    /**
     * تحميل قائمة الطلاب
     */
    async loadStudents() {
        try {
            this.showLoading();
            
            const params = new URLSearchParams({
                action: 'get_students',
                page: this.currentPage,
                limit: this.studentsPerPage
            });
            
            if (this.currentClassId) {
                params.append('class_id', this.currentClassId);
            }
            
            if (this.searchQuery) {
                params.append('q', this.searchQuery);
                // استخدام البحث بدلاً من الصفحات العادية
                const response = await fetch(`api/students.php?action=search_students&${params}`);
                const data = await response.json();
                
                if (data.success) {
                    this.renderStudents(data.students);
                    this.renderPagination({ current_page: 1, total_pages: 1, total_records: data.students.length });
                }
                return;
            }
            
            const response = await fetch(`api/students.php?${params}`);
            const data = await response.json();
            
            if (data.success) {
                this.renderStudents(data.students);
                this.renderPagination(data.pagination);
            } else {
                this.showError('خطأ في تحميل الطلاب: ' + data.error);
            }
        } catch (error) {
            this.showError('خطأ في الشبكة: ' + error.message);
        } finally {
            this.hideLoading();
        }
    }
    
    /**
     * عرض قائمة الطلاب
     */
    renderStudents(students) {
        const container = document.getElementById('studentsContainer');
        if (!container) return;
        
        if (students.length === 0) {
            container.innerHTML = `
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-2"></i>
                        لا توجد نتائج للبحث الحالي
                    </div>
                </div>
            `;
            return;
        }
        
        container.innerHTML = students.map(student => this.renderStudentCard(student)).join('');
    }
    
    /**
     * عرض بطاقة طالب
     */
    renderStudentCard(student) {
        const fullName = `${student.arabic_first_name} ${student.arabic_last_name}`;
        const age = this.calculateAge(student.date_of_birth);
        const statusBadge = student.is_active ? 
            '<span class="badge bg-success">نشط</span>' : 
            '<span class="badge bg-secondary">غير نشط</span>';
        
        return `
            <div class="col-md-6 col-xl-4">
                <div class="card border h-100">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">${fullName}</h6>
                            <small class="text-muted">رقم الطالب: ${student.student_id}</small>
                        </div>
                        ${statusBadge}
                    </div>
                    
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar avatar-lg me-3">
                                <div class="avatar-img rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person fs-4"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-0">${fullName}</h6>
                                <small class="text-muted">${student.class_name}</small>
                            </div>
                        </div>
                        
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-calendar3 text-primary me-2"></i>
                                العمر: ${age} سنة
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                ${student.phone}
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-person-check text-primary me-2"></i>
                                ولي الأمر: ${student.guardian_name}
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-telephone-plus text-primary me-2"></i>
                                ${student.guardian_phone}
                            </li>
                        </ul>
                    </div>
                    
                    <div class="card-footer border-top">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" onclick="studentManager.viewStudent('${student.id}')">
                                <i class="bi bi-eye me-1"></i>عرض
                            </button>
                            <button class="btn btn-sm btn-outline-success" onclick="studentManager.editStudent('${student.id}')">
                                <i class="bi bi-pencil me-1"></i>تحرير
                            </button>
                            <button class="btn btn-sm btn-outline-danger" onclick="studentManager.deleteStudent('${student.id}', '${fullName}')">
                                <i class="bi bi-trash me-1"></i>حذف
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    
    /**
     * عرض الترقيم
     */
    renderPagination(pagination) {
        const container = document.getElementById('paginationContainer');
        if (!container || pagination.total_pages <= 1) {
            container.innerHTML = '';
            return;
        }
        
        let html = '<nav aria-label="Student pagination"><ul class="pagination justify-content-center">';
        
        // الصفحة السابقة
        if (pagination.current_page > 1) {
            html += `<li class="page-item">
                <a class="page-link" href="#" onclick="studentManager.goToPage(${pagination.current_page - 1})">السابق</a>
            </li>`;
        }
        
        // أرقام الصفحات
        const startPage = Math.max(1, pagination.current_page - 2);
        const endPage = Math.min(pagination.total_pages, pagination.current_page + 2);
        
        for (let i = startPage; i <= endPage; i++) {
            const activeClass = i === pagination.current_page ? 'active' : '';
            html += `<li class="page-item ${activeClass}">
                <a class="page-link" href="#" onclick="studentManager.goToPage(${i})">${i}</a>
            </li>`;
        }
        
        // الصفحة التالية
        if (pagination.current_page < pagination.total_pages) {
            html += `<li class="page-item">
                <a class="page-link" href="#" onclick="studentManager.goToPage(${pagination.current_page + 1})">التالي</a>
            </li>`;
        }
        
        html += '</ul></nav>';
        
        // إضافة معلومات الصفحة
        html += `<div class="text-center mt-2">
            <small class="text-muted">
                عرض ${((pagination.current_page - 1) * this.studentsPerPage) + 1} - 
                ${Math.min(pagination.current_page * this.studentsPerPage, pagination.total_records)} 
                من ${pagination.total_records} طالب
            </small>
        </div>`;
        
        container.innerHTML = html;
    }
    
    /**
     * الانتقال لصفحة محددة
     */
    goToPage(page) {
        this.currentPage = page;
        this.loadStudents();
    }
    
    /**
     * إظهار مودال إضافة طالب
     */
    showAddStudentModal() {
        // تحميل قائمة الفصول في النموذج
        this.loadClassesForForm('addStudentClassSelect');
        
        // إعادة تعيين النموذج
        document.getElementById('addStudentForm').reset();
        
        // إظهار المودال
        this.addStudentModal.show();
    }
    
    /**
     * إضافة طالب جديد
     */
    async addStudent() {
        try {
            const form = document.getElementById('addStudentForm');
            const formData = new FormData(form);
            
            const studentData = {
                arabic_first_name: formData.get('arabic_first_name'),
                arabic_last_name: formData.get('arabic_last_name'),
                national_id: formData.get('national_id'),
                phone: formData.get('phone'),
                email: formData.get('email'),
                date_of_birth: formData.get('date_of_birth'),
                gender: formData.get('gender'),
                address: formData.get('address'),
                school_class_id: formData.get('school_class_id'),
                guardian_name: formData.get('guardian_name'),
                guardian_phone: formData.get('guardian_phone'),
                guardian_email: formData.get('guardian_email'),
                guardian_relationship: formData.get('guardian_relationship')
            };
            
            const response = await fetch('api/students.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ action: 'add_student', ...studentData })
            });
            
            const data = await response.json();
            
            if (data.success) {
                this.addStudentModal.hide();
                this.showSuccess('تم إضافة الطالب بنجاح');
                this.loadStudents();
            } else {
                this.showError('خطأ في إضافة الطالب: ' + data.error);
            }
        } catch (error) {
            this.showError('خطأ في الشبكة: ' + error.message);
        }
    }
    
    /**
     * تحرير طالب
     */
    async editStudent(studentId) {
        try {
            // جلب بيانات الطالب
            const response = await fetch(`api/students.php?action=get_student&student_id=${studentId}`);
            const data = await response.json();
            
            if (data.success) {
                this.fillEditForm(data.student);
                this.editStudentModal.show();
            } else {
                this.showError('خطأ في جلب بيانات الطالب: ' + data.error);
            }
        } catch (error) {
            this.showError('خطأ في الشبكة: ' + error.message);
        }
    }
    
    /**
     * ملء نموذج التحرير
     */
    fillEditForm(student) {
        // تحميل قائمة الفصول
        this.loadClassesForForm('editStudentClassSelect', student.school_class_id);
        
        // ملء البيانات
        const form = document.getElementById('editStudentForm');
        form.querySelector('[name="student_id"]').value = student.id;
        form.querySelector('[name="arabic_first_name"]').value = student.arabic_first_name;
        form.querySelector('[name="arabic_last_name"]').value = student.arabic_last_name;
        form.querySelector('[name="national_id"]').value = student.national_id;
        form.querySelector('[name="phone"]').value = student.phone;
        form.querySelector('[name="email"]').value = student.email || '';
        form.querySelector('[name="date_of_birth"]').value = student.date_of_birth;
        form.querySelector('[name="gender"]').value = student.gender;
        form.querySelector('[name="address"]').value = student.address || '';
        form.querySelector('[name="guardian_name"]').value = student.guardian_name;
        form.querySelector('[name="guardian_phone"]').value = student.guardian_phone;
        form.querySelector('[name="guardian_email"]').value = student.guardian_email || '';
        form.querySelector('[name="guardian_relationship"]').value = student.guardian_relationship || 'الوالد';
    }
    
    /**
     * تحديث بيانات طالب
     */
    async updateStudent() {
        try {
            const form = document.getElementById('editStudentForm');
            const formData = new FormData(form);
            
            const studentData = {
                action: 'update_student',
                student_id: formData.get('student_id'),
                arabic_first_name: formData.get('arabic_first_name'),
                arabic_last_name: formData.get('arabic_last_name'),
                phone: formData.get('phone'),
                address: formData.get('address'),
                school_class_id: formData.get('school_class_id'),
                guardian_name: formData.get('guardian_name'),
                guardian_phone: formData.get('guardian_phone'),
                guardian_email: formData.get('guardian_email')
            };
            
            const response = await fetch('api/students.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(studentData)
            });
            
            const data = await response.json();
            
            if (data.success) {
                this.editStudentModal.hide();
                this.showSuccess('تم تحديث بيانات الطالب بنجاح');
                this.loadStudents();
            } else {
                this.showError('خطأ في تحديث الطالب: ' + data.error);
            }
        } catch (error) {
            this.showError('خطأ في الشبكة: ' + error.message);
        }
    }
    
    /**
     * حذف طالب
     */
    deleteStudent(studentId, studentName) {
        // إعداد مودال التأكيد
        document.getElementById('deleteStudentName').textContent = studentName;
        document.getElementById('confirmDeleteBtn').onclick = () => {
            this.confirmDeleteStudent(studentId);
        };
        
        this.deleteStudentModal.show();
    }
    
    /**
     * تأكيد حذف الطالب
     */
    async confirmDeleteStudent(studentId) {
        try {
            const response = await fetch('api/students.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=delete_student&student_id=${studentId}`
            });
            
            const data = await response.json();
            
            if (data.success) {
                this.deleteStudentModal.hide();
                this.showSuccess('تم حذف الطالب بنجاح');
                this.loadStudents();
            } else {
                this.showError('خطأ في حذف الطالب: ' + data.error);
            }
        } catch (error) {
            this.showError('خطأ في الشبكة: ' + error.message);
        }
    }
    
    /**
     * تحميل الفصول للنماذج
     */
    async loadClassesForForm(selectId, selectedValue = '') {
        try {
            const response = await fetch('api/students.php?action=get_classes');
            const data = await response.json();
            
            if (data.success) {
                const select = document.getElementById(selectId);
                select.innerHTML = '<option value="">اختر الفصل</option>';
                
                data.classes.forEach(cls => {
                    const option = document.createElement('option');
                    option.value = cls.id;
                    option.textContent = `${cls.grade_name} - ${cls.class_name}`;
                    if (cls.id === selectedValue) {
                        option.selected = true;
                    }
                    select.appendChild(option);
                });
            }
        } catch (error) {
            console.error('خطأ في تحميل الفصول:', error);
        }
    }
    
    /**
     * حساب العمر
     */
    calculateAge(birthDate) {
        const today = new Date();
        const birth = new Date(birthDate);
        let age = today.getFullYear() - birth.getFullYear();
        const monthDiff = today.getMonth() - birth.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
            age--;
        }
        
        return age;
    }
    
    /**
     * إظهار مؤشر التحميل
     */
    showLoading() {
        const container = document.getElementById('studentsContainer');
        if (container) {
            container.innerHTML = `
                <div class="col-12 text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">جاري التحميل...</span>
                    </div>
                    <p class="mt-2">جاري تحميل الطلاب...</p>
                </div>
            `;
        }
    }
    
    /**
     * إخفاء مؤشر التحميل
     */
    hideLoading() {
        // سيتم استبداله بالمحتوى الفعلي
    }
    
    /**
     * إظهار رسالة نجاح
     */
    showSuccess(message) {
        this.showToast(message, 'success');
    }
    
    /**
     * إظهار رسالة خطأ
     */
    showError(message) {
        this.showToast(message, 'danger');
    }
    
    /**
     * إظهار تنبيه منبثق
     */
    showToast(message, type = 'info') {
        const toastContainer = document.getElementById('toastContainer');
        if (!toastContainer) {
            // إنشاء حاوي التنبيهات إذا لم يكن موجوداً
            const container = document.createElement('div');
            container.id = 'toastContainer';
            container.className = 'toast-container position-fixed top-0 end-0 p-3';
            container.style.zIndex = '1060';
            document.body.appendChild(container);
        }
        
        const toastId = 'toast-' + Date.now();
        const toastHtml = `
            <div id="${toastId}" class="toast align-items-center text-bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        `;
        
        document.getElementById('toastContainer').insertAdjacentHTML('beforeend', toastHtml);
        
        const toastElement = document.getElementById(toastId);
        const toast = new bootstrap.Toast(toastElement, { delay: 4000 });
        toast.show();
        
        // إزالة التنبيه بعد إخفاؤه
        toastElement.addEventListener('hidden.bs.toast', () => {
            toastElement.remove();
        });
    }
}

// تهيئة مدير الطلاب عند تحميل الصفحة
let studentManager;
document.addEventListener('DOMContentLoaded', function() {
    studentManager = new StudentManager();
});

// دوال عامة للوصول من HTML
function goToPage(page) {
    if (studentManager) {
        studentManager.goToPage(page);
    }
}
