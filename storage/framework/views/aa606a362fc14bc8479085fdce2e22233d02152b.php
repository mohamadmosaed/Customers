<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة عميل جديد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f1f5f9;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: 0.3s ease-in-out;
        }

        .container:hover {
            transform: scale(1.02);
        }

        .header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header button {
            background-color: #dc3545;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 1rem;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 1.2rem;
            margin-bottom: 5px;
            color: #333;
        }

        input, select, textarea {
            font-size: 1rem;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        textarea {
            resize: none;
        }

        .submit-btn {
            background-color: #007bff;
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
            background-color: #0056b3;
            transform: scale(1.03);
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <span>إضافة عميل جديد</span>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit">تسجيل الخروج</button>
            </form>
        </div>

        <form action="<?php echo e(route('customer.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="customer_name">👤 اسم العميل</label>
                <input type="text" id="customer_name" name="customer_name" placeholder="الاسم الكامل">
            </div>

            <div class="form-group">
                <label for="activity">📌 النشاط</label>
                <select id="activity" name="activity">
                    <option value="">أختر</option>
                    <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="mobile">📞 رقم الجوال</label>
                <input type="text" id="mobile" name="mobile" placeholder="أدخل رقم الجوال">
            </div>

            <div class="form-group">
                <label for="program">💻 نوع البرنامج</label>
                <select id="program" name="program">
                    <option value="">أختر</option>
                    <option value="online">أون لاين</option>
                    <option value="offline">أف لاين</option>
                </select>
            </div>

            <div class="form-group">
                <label for="address">📍 العنوان</label>
                <input type="text" id="address" name="address" placeholder="أدخل العنوان بالتفصيل">
            </div>

            <div class="form-group">
                <label for="agent">👨‍💼 المندوب المسؤول</label>
                <select id="agent" name="agent_id">
                    <option value="">أختر</option>
                    <?php $__currentLoopData = $agent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="install_date">📅 تاريخ التركيب</label>
                <input type="date" id="install_date" name="install_date">
            </div>

            <div class="form-group">
                <label for="support_end">⏳ تاريخ انتهاء الدعم</label>
                <input type="date" id="support_end" name="support_end">
            </div>

            <div class="form-group">
                <label for="notes">📝 ملاحظات</label>
                <textarea id="notes" rows="4" name="notes" placeholder="أضف أي ملاحظات إضافية..."></textarea>
            </div>

            <button type="submit" class="submit-btn">✅ إضافة العميل</button>
        </form>
    </div>

<script>
    document.getElementById('install_date').addEventListener('change', function () {
        const installDate = new Date(this.value);
        if (!isNaN(installDate)) {
            const supportEndDate = new Date(installDate);
            supportEndDate.setFullYear(supportEndDate.getFullYear() + 1);
            document.getElementById('support_end').value = supportEndDate.toISOString().split('T')[0];
        }
    });
</script>

</body>
</html>
<?php /**PATH C:\Customers\resources\views/customer/create.blade.php ENDPATH**/ ?>