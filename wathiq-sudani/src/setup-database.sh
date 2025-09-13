#!/bin/bash

# سكريبت إعداد قاعدة البيانات المحلية
# Local Database Setup Script

echo "=== إعداد قاعدة البيانات المحلية للنظام ==="
echo ""

# التحقق من وجود PostgreSQL
if ! command -v psql &> /dev/null; then
    echo "❌ PostgreSQL غير مثبت. يرجى تثبيته أولاً."
    echo "تحميل من: https://www.postgresql.org/download/"
    exit 1
fi

echo "✅ تم العثور على PostgreSQL"

# إعدادات قاعدة البيانات
DB_NAME="student_management"
DB_USER="postgres"
DB_HOST="localhost"
DB_PORT="5432"

echo "📊 إعداد قاعدة البيانات..."
echo "اسم قاعدة البيانات: $DB_NAME"
echo "المستخدم: $DB_USER"
echo "الخادم: $DB_HOST:$DB_PORT"
echo ""

# إنشاء قاعدة البيانات إذا لم تكن موجودة
echo "🔧 إنشاء قاعدة البيانات..."
psql -h $DB_HOST -p $DB_PORT -U $DB_USER -c "CREATE DATABASE $DB_NAME;" 2>/dev/null

if [ $? -eq 0 ]; then
    echo "✅ تم إنشاء قاعدة البيانات بنجاح"
else
    echo "ℹ️  قاعدة البيانات موجودة مسبقاً"
fi

# تنفيذ ملف schema
echo "📋 تنفيذ ملف المخطط..."
if [ -f "../supabase_schema.sql" ]; then
    psql -h $DB_HOST -p $DB_PORT -U $DB_USER -d $DB_NAME -f ../supabase_schema.sql
    if [ $? -eq 0 ]; then
        echo "✅ تم تنفيذ مخطط قاعدة البيانات بنجاح"
    else
        echo "❌ فشل في تنفيذ مخطط قاعدة البيانات"
        exit 1
    fi
else
    echo "❌ ملف supabase_schema.sql غير موجود"
    exit 1
fi

# إدراج البيانات التجريبية
echo "📝 إدراج البيانات التجريبية..."
php insert-sample-data.php

if [ $? -eq 0 ]; then
    echo "✅ تم إدراج البيانات التجريبية بنجاح"
else
    echo "❌ فشل في إدراج البيانات التجريبية"
    exit 1
fi

echo ""
echo "🎉 تم إعداد قاعدة البيانات بنجاح!"
echo ""
echo "📌 المعلومات المهمة:"
echo "• رابط الاتصال: postgresql://$DB_USER@$DB_HOST:$DB_PORT/$DB_NAME"
echo "• واجهة المدرس: instructor-dashboard.php"
echo "• واجهة الطالب: student-dashboard.php"
echo ""
echo "🔧 لتشغيل الخادم المحلي:"
echo "php -S localhost:8000"
echo ""
echo "🌐 ثم افتح المتصفح على:"
echo "http://localhost:8000/instructor-dashboard.php"
