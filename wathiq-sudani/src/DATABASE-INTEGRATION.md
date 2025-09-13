# دليل ربط النظام بقاعدة البيانات

## 🎯 الهدف
تم ربط نظام إدارة الطلاب بقاعدة بيانات حقيقية باستخدام **PostgreSQL** لعرض بيانات حقيقية بدلاً من البيانات الوهمية.

## 📋 المتطلبات

### 1. PostgreSQL
```bash
# على macOS باستخدام Homebrew
brew install postgresql
brew services start postgresql

# على Ubuntu/Debian
sudo apt update
sudo apt install postgresql postgresql-contrib

# على Windows
# تحميل من: https://www.postgresql.org/download/windows/
```

### 2. PHP مع دعم PostgreSQL
```bash
# التأكد من وجود php-pgsql
php -m | grep pgsql

# إذا لم يكن موجود، ثبته:
# Ubuntu/Debian
sudo apt install php-pgsql

# macOS
brew install php
```

## 🔧 خطوات الإعداد

### الخطوة 1: إعداد قاعدة البيانات

```bash
# انتقل إلى مجلد المشروع
cd /Users/aliadil/Downloads/Eduport-PHP_v1.0/Eduport/src

# تشغيل سكريبت الإعداد التلقائي
chmod +x setup-database.sh
./setup-database.sh
```

أو يدوياً:

```bash
# إنشاء قاعدة البيانات
createdb student_management

# تنفيذ مخطط قاعدة البيانات
psql -d student_management -f ../supabase_schema.sql

# إدراج البيانات التجريبية
php insert-sample-data.php
```

### الخطوة 2: تحديث إعدادات الاتصال

في ملف `database-config.php`:

```php
// إعدادات Supabase/PostgreSQL
private const DB_HOST = 'localhost';  // أو رابط Supabase
private const DB_NAME = 'student_management';
private const DB_USER = 'postgres';   // أو مستخدم Supabase
private const DB_PASS = '';           // كلمة المرور
private const DB_PORT = '5432';
```

### الخطوة 3: تشغيل الخادم المحلي

```bash
# تشغيل خادم PHP المحلي
php -S localhost:8000

# فتح المتصفح على:
# http://localhost:8000/instructor-dashboard.php
# http://localhost:8000/student-dashboard.php
```

## 📊 البيانات المُضافة

### المدرس التجريبي
- **الاسم**: أحمد محمد السالم
- **رقم الموظف**: T001
- **التخصص**: الرياضيات والفيزياء
- **المؤهل**: ماجستير في الرياضيات
- **سنوات الخبرة**: 8 سنوات

### المواد الدراسية
- الرياضيات (MATH)
- الفيزياء (PHYS)
- الكيمياء (CHEM)
- اللغة العربية (ARAB)
- اللغة الإنجليزية (ENG)

### الطلاب
- 5 طلاب تجريبيين في فصل "ثالث/أ"
- مع معلومات كاملة (الأسماء، أرقام الهواتف، أولياء الأمور)

### البيانات الإضافية
- درس تجريبي: "مقدمة في التفاضل والتكامل"
- إعلان تجريبي: "امتحان الرياضيات الشهري"
- أنواع الاختبارات (نصف الفصل، نهاية الفصل، واجبات، مشاركة)

## 🔄 ما تم تحديثه

### 1. لوحة المدرس (`instructor-dashboard.php`)
✅ **قبل**: بيانات وهمية ثابتة
```php
$teacher_name = "د. سارة أحمد";  // بيانات ثابتة
```

✅ **بعد**: بيانات من قاعدة البيانات
```php
$teacher_name = getTeacherInfo('name');  // من قاعدة البيانات
```

### 2. الإحصائيات
✅ **قبل**: أرقام ثابتة
```html
<li>12k Enrolled Students</li>
<li>25 Courses</li>
```

✅ **بعد**: إحصائيات حقيقية
```php
<li><?php echo $total_students; ?> طالب مسجل</li>
<li><?php echo $total_subjects; ?> مادة دراسية</li>
```

### 3. نظام API محدث
- **instructor-api.php**: يتعامل مع قاعدة البيانات الحقيقية
- **teacher-config-db.php**: إدارة البيانات والاستعلامات
- **database-config.php**: إعدادات الاتصال والفئات المساعدة

## 🎮 الوظائف المتاحة الآن

### ✅ لوحة المدرس
1. **المعلومات الشخصية**: من قاعدة البيانات
2. **الإحصائيات الحقيقية**: عدد الطلاب، المواد، الفصول
3. **قائمة الطلاب**: مع صورهم وأرقامهم
4. **المواد المُدرسة**: الرياضيات والفيزياء
5. **الدروس المنشأة**: مع إمكانية إضافة دروس جديدة
6. **الإعلانات**: مع إمكانية إضافة إعلانات جديدة

### 🔄 قريباً (يحتاج تطوير)
1. **صفحة الحضور**: مع حفظ البيانات
2. **صفحة الدرجات**: مع إدخال النتائج
3. **صفحة التقارير**: مع بيانات حقيقية
4. **نظام المصادقة**: تسجيل دخول حقيقي

## 🔧 استكشاف الأخطاء

### مشكلة الاتصال بقاعدة البيانات
```bash
# التحقق من حالة PostgreSQL
brew services list | grep postgresql
# أو
sudo systemctl status postgresql

# إعادة تشغيل الخدمة
brew services restart postgresql
# أو
sudo systemctl restart postgresql
```

### مشكلة البيانات التجريبية
```bash
# إعادة إدراج البيانات
php insert-sample-data.php
```

### مشكلة الصلاحيات
```bash
# إعطاء صلاحيات للمستخدم
psql -c "ALTER USER postgres CREATEDB;"
```

## 📁 هيكل الملفات الجديد

```
src/
├── database-config.php          # إعدادات قاعدة البيانات
├── teacher-config-db.php        # تكوين المدرس مع قاعدة البيانات
├── insert-sample-data.php       # البيانات التجريبية
├── instructor-api.php           # API المدرس مع قاعدة البيانات
├── instructor-dashboard.php     # لوحة المدرس (محدثة)
├── setup-database.sh           # سكريبت الإعداد التلقائي
├── current_teacher_id.txt      # معرف المدرس الحالي (مؤقت)
└── DATABASE-INTEGRATION.md     # هذا الملف
```

## 🚀 الخطوات التالية

1. **اختبار النظام**: تشغيل `instructor-dashboard.php` والتأكد من عرض البيانات الحقيقية
2. **ربط الصفحات الفرعية**: تحديث `instructor-pages/` لتعمل مع قاعدة البيانات
3. **نظام المصادقة**: إضافة تسجيل دخول حقيقي
4. **ربط لوحة الطالب**: تطبيق نفس النهج على `student-dashboard.php`
5. **نشر على Supabase**: استخدام قاعدة بيانات سحابية

## 📞 الدعم

في حالة وجود مشاكل:
1. تحقق من ملفات السجل: `error_log`
2. تأكد من تشغيل PostgreSQL
3. تحقق من صحة إعدادات قاعدة البيانات
4. جرب إعادة إدراج البيانات التجريبية
