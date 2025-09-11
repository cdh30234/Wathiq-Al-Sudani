# دليل إعداد النظام المحلي
## Local Setup Guide for Eduport SMS

تم تحويل المشروع من الاعتماد على Supabase إلى نظام مصادقة محلي باستخدام Django و JWT.

## التغييرات المُجراة

### 1. نظام المصادقة
- تم استبدال `SupabaseAuthentication` بـ `CustomJWTAuthentication`
- إضافة نظام JWT محلي مع إمكانية blacklist للتوكنات
- إنشاء `LocalAuthBackend` للمصادقة بالبريد الإلكتروني أو اسم المستخدم

### 2. النماذج (Models)
- جعل `supabase_user_id` اختياري في `UserProfile`
- الحفاظ على جميع النماذج الأخرى كما هي

### 3. API Endpoints الجديدة
- `POST /api/auth/login/` - تسجيل الدخول (يرجع JWT tokens)
- `POST /api/auth/register/` - تسجيل مستخدم جديد
- `POST /api/auth/logout/` - تسجيل الخروج (blacklist token)
- `GET /api/auth/whoami/` - معلومات المستخدم الحالي
- `POST /api/auth/change-password/` - تغيير كلمة المرور

## متطلبات التشغيل

### 1. تثبيت المتطلبات
```bash
cd backend
pip3 install -r requirements.txt
```

### 2. إعداد قاعدة البيانات
```bash
python3 manage.py makemigrations
python3 manage.py migrate
```

### 3. إنشاء مستخدم مدير (اختياري)
```bash
python3 manage.py createsuperuser
```

### 4. تشغيل الخادم
```bash
python3 manage.py runserver 0.0.0.0:8001
```

## استخدام API

### تسجيل الدخول
```bash
curl -X POST http://localhost:8001/api/auth/login/ \
  -H "Content-Type: application/json" \
  -d '{
    "username": "admin",
    "password": "your_password"
  }'
```

### تسجيل مستخدم جديد
```bash
curl -X POST http://localhost:8001/api/auth/register/ \
  -H "Content-Type: application/json" \
  -d '{
    "email": "student@example.com",
    "password": "securepassword",
    "arabic_first_name": "محمد",
    "arabic_last_name": "أحمد",
    "national_id": "1234567890",
    "phone": "0501234567",
    "role": "student"
  }'
```

### استخدام JWT Token
```bash
curl -X GET http://localhost:8001/api/auth/whoami/ \
  -H "Authorization: Bearer YOUR_ACCESS_TOKEN"
```

## المستخدمون الموجودون

المشروع يحتوي على بيانات تجريبية:
- مدير: `admin`
- مدرسون: `math_teacher`, `physics_teacher`, إلخ
- طلاب: `student001` إلى `student020`

## لوحة التحكم

يمكن الوصول للوحة التحكم على: http://localhost:8001/admin/

## ملاحظات مهمة

1. **أمان كلمات المرور**: تأكد من تغيير كلمات المرور الافتراضية
2. **متغيرات البيئة**: انسخ `env_example.txt` إلى `.env` وعدّل القيم
3. **قاعدة البيانات**: النظام يستخدم SQLite للتطوير المحلي
4. **CORS**: تم إعداد CORS للسماح بالاتصال من Frontend

## استكشاف الأخطاء

### خطأ Django غير مثبت
```bash
pip3 install -r requirements.txt
```

### خطأ في قاعدة البيانات
```bash
python3 manage.py makemigrations
python3 manage.py migrate
```

### خطأ في المصادقة
تأكد من إرسال JWT token في header:
```
Authorization: Bearer YOUR_ACCESS_TOKEN
```

## التطوير المستقبلي

- إضافة إعادة تعيين كلمة المرور
- تحسين واجهة لوحة التحكم
- إضافة نظام إشعارات
- تحسين أمان النظام
