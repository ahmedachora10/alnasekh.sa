<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب توظيف جديد</title>
</head>
<body>
    <h2>طلب توظيف جديد</h2>
    <p>تم تقديم طلب توظيف على الوظيفة: <strong>{{ $jobTitle }}</strong></p>
    <p>للاطلاع على السيرة الذاتية، يمكنك تحميلها من هنا:</p>
    <a href="{{ $cvUrl }}" target="_blank">تحميل السيرة الذاتية</a>
    <p>يرجى مراجعة الطلب واتخاذ الإجراءات اللازمة.</p>
    <p>شكرًا لك،</p>
    <p>فريق التوظيف</p>
</body>
</html>
