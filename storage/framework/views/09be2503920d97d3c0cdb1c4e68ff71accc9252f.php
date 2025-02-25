<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقرير عميل</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background: #f4f7fc;
            text-align: center;
        }

        .report-container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        h1 {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .meta-info {
            color: #666;
            margin-bottom: 20px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            text-align: right;
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background: #A6CDC6;
            color: black;
            font-weight: bold;
        }

        td {
            background: #f9f9f9;
        }

        .status {
            font-weight: bold;
        }

        .status.active {
            color: #28a745;
        }

        .status.expired {
            color: #dc3545;
        }

        .notes-container, .branches-section {
            margin-top: 20px;
            text-align: right;
        }

        .note-card {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            background: #f9f9f9;
        }

        .note-card h3 {
            font-size: 16px;
            margin: 0;
        }
        .branches-section, .notes-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* 4 columns */
    gap: 15px; /* Space between items */
    margin-top: 20px;
}

.note-card {
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 8px;
    background: #f9f9f9;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

        .note-card p {
            margin: 5px 0;
            font-size: 14px;
        }

        .print-btn-container {
            margin-top: 20px;
        }

        .print-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .print-btn:hover {
            background: #0056b3;
        }

        @media print {
            .print-btn-container {
                display: none;
            }
            .report-container {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>
<body>

    <div class="report-container">
        <h1>تقرير العميل - <?php echo e($customer->customer_name); ?></h1>
        <div class="meta-info">📅 تاريخ الطباعة: <?php echo e(now()->format('l، d F Y')); ?></div>

        <h2>📌 البيانات الأساسية</h2>
        <table>
            <tr>
                <th>اسم العميل</th>
                <td><?php echo e($customer->customer_name); ?></td>
            </tr>
            <tr>
                <th>رقم الجوال</th>
                <td><?php echo e($customer->mobile); ?></td>
            </tr>
            <tr>
                <th>العنوان</th>
                <td><?php echo e($customer->address); ?></td>
            </tr>
            <tr>
                <th>النشاط التجاري</th>
                <td><?php echo e($customer->customerActivity->name); ?></td>
            </tr>
            <tr>
                <th>نوع البرنامج</th>
                <td><?php echo e($customer->program); ?></td>
            </tr>
            <tr>
                <th>المندوب المسؤول</th>
                <td><?php echo e($customer->customerAgent->name); ?></td>
            </tr>
            <tr>
                <th>تاريخ التركيب</th>
                <td><?php echo e($customer->install_date); ?></td>
            </tr>
            <tr>
                <th>تاريخ انتهاء الدعم</th>
                <td><?php echo e($customer->support_end); ?></td>
            </tr>
            <tr>
                <th>حالة الدعم</th>
                <td class="status <?php echo e($customer->support_end >= now() ? 'active' : 'expired'); ?>">
                    <?php echo e($customer->support_end >= now() ? '✅ نشط' : '❌ منتهي'); ?>

                </td>
            </tr>
        </table>

        <div class="notes-container;">
            <h3>🏢 الفروع المسجلة (<?php echo e($customer->customerBranches->count()); ?>)</h3>
            <div class="note-grid">
                <?php $__currentLoopData = $customer->customerBranches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="note-card" style="display: flex;justify-content:space-between">
                        <h3>🔹 الفرع #<?php echo e($index + 1); ?></h3>
                        <p><strong>النشاط:</strong> <?php echo e($branch->customerActivitys->name); ?></p>
                        <p><strong>العنوان:</strong> <?php echo e($branch->address); ?></p>
                        <p><strong>تاريخ التركيب:</strong> <?php echo e($branch->install_date); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="notes-container;">
            <h2>📝 ملاحظات (<?php echo e($customer->customerNotes->count()); ?>)</h2>
            <div class="note-grid">
                <?php $__currentLoopData = $customer->customerNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="note-card" style="display: flex;justify-content:space-between">
                        <h3>📌 الإضافة #<?php echo e($index + 1); ?></h3>
                        <p><strong>التاريخ:</strong> <?php echo e($note->date); ?></p>
                        <p><strong>الملاحظات:</strong> <?php echo e($note->note); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>


        <div class="print-btn-container">
            <button class="print-btn" onclick="window.print()">🖨 طباعة التقرير</button>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\Customers\resources\views/customer/show.blade.php ENDPATH**/ ?>