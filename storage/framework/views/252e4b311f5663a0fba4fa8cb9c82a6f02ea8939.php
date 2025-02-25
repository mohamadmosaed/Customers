<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة مندوب جديد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #eef2f7;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease-in-out;
        }

        .container:hover {
            transform: scale(1.02);
        }

        .form-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 1.2rem;
            color: #333;
        }

        input {
            font-size: 1rem;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        .submit-btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.2rem;
            width: 100%;
            transition: 0.3s ease-in-out;
        }

        .submit-btn:hover {
            background-color: #218838;
            transform: scale(1.03);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-header">
            إضافة مندوب جديد
        </div>

        <form action="<?php echo e(route('agents.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="name">👤 الاسم</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="أدخل اسم المندوب">
            </div>

            <div class="form-group">
                <label for="work_area">📍 منطقة العمل</label>
                <input type="text" id="work_area" name="Work_area" class="form-control" placeholder="أدخل منطقة العمل">
            </div>

            <div class="form-group">
                <label for="start_date">📅 تاريخ البداية</label>
                <input type="date" id="start_date" name="start_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="end_date">⏳ تاريخ النهاية</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
            </div>

            <button type="submit" class="submit-btn">✅ إضافة المندوب</button>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Customers\resources\views/agents/create.blade.php ENDPATH**/ ?>