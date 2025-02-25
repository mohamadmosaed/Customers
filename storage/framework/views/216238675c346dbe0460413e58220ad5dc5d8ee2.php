<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>قائمة المناديب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            direction: rtl;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            border-radius: 8px;
            font-size: 14px;
            padding: 6px 12px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card p-4">
        <h2 class="text-center mb-4">📋 قائمة المناديب</h2>

        <div class="d-flex justify-content-between mb-3">
            <a href="<?php echo e(route('agents.create')); ?>" class="btn btn-success btn-custom">➕ إضافة مندوب جديد</a>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success text-center"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover table-bordered bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>الاسم</th>
                        <th>منطقة العمل</th>
                        <th>تاريخ البداية</th>
                        <th>تاريخ النهاية</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($agent->name); ?></td>
                            <td><?php echo e($agent->Work_area ?? 'غير محدد'); ?></td>
                            <td><?php echo e($agent->start_date); ?></td>
                            <td><?php echo e($agent->end_date); ?></td>
                            <td>
                                <a href="<?php echo e(route('agents.show', $agent->id)); ?>" class="btn btn-info btn-sm btn-custom">👁 عرض</a>
                                <a href="<?php echo e(route('agents.edit', $agent->id)); ?>" class="btn btn-primary btn-sm btn-custom">✏ تعديل</a>
                                <form action="<?php echo e(route('agents.destroy', $agent->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm btn-custom" onclick="return confirm('هل أنت متأكد؟')">🗑 حذف</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Customers\resources\views/agents/index.blade.php ENDPATH**/ ?>