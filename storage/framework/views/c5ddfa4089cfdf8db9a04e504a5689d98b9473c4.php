<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📋 قائمة العملاء المسجلين</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="container p-6 bg-white rounded-lg shadow-lg border border-gray-200 w-100">

        <!-- زر العودة وعنوان الصفحة -->
        <div class="flex justify-between items-center mb-4 bg-gray-50 p-4 rounded-md shadow-sm">
            <a href="<?php echo e(route('dashboard')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                🏠 العودة للرئيسية
            </a>
            <h2 class="text-2xl font-bold text-gray-700">📋 قائمة العملاء المسجلين</h2>
            <input type="text" id="searchInput" placeholder="🔎 بحث..."
                class="px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200" onkeyup="searchTable()">
        </div>

        <!-- جدول العملاء -->
        <div class="table-responsive">
            <table id="customerTable" class="table table-bordered bg-white shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>اسم العميل</th>
                        <th>رقم الجوال</th>
                        <th>العنوان</th>
                        <th>النشاط</th>
                        <th>نوع البرنامج</th>
                        <th>المندوب</th>
                        <th>تاريخ التركيب</th>
                        <th>تاريخ انتهاء الدعم</th>
                        <th>ملاحظات</th>
                        <th>حالة الدعم</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($item->customer_name); ?></td>
                            <td><?php echo e($item->mobile); ?></td>
                            <td><?php echo e($item->address); ?></td>
                            <td><?php echo e($item->customerActivity->name); ?></td>
                            <td><?php echo e($item->program); ?></td>
                            <td><?php echo e($item->customerAgent->name); ?></td>
                            <td><?php echo e($item->install_date); ?></td>
                            <td><?php echo e($item->support_end); ?></td>
                            <td><?php echo e($item->notes); ?></td>
                            <td class="font-bold text-lg" style="color: <?php echo e($item->support_end >= \Carbon\Carbon::today() ? 'green' : 'red'); ?>">
                                <?php echo e($item->support_end >= \Carbon\Carbon::today() ? '✅ نشط' : '❌ غير نشط'); ?>

                            </td>
                            <td class="text-center">
                                <div class="d-flex flex-wrap justify-content-center gap-2">
                                    <a href="<?php echo e(route('customer.edit', $item->id)); ?>" class="btn btn-primary btn-sm">✏️ تعديل</a>
                                    <a href="<?php echo e(route('customer.show', $item->id)); ?>" class="btn btn-secondary btn-sm">📄 عرض</a>
                                    <a href="<?php echo e(route('Branches.show', $item->id)); ?>" class="btn btn-info btn-sm">🏢 إضافة فرع</a>
                                    <a href="<?php echo e(route('BranchInfo.show', $item->id)); ?>" class="btn btn-info btn-sm">🏢 الفروع</a>
                                    <a href="<?php echo e(route('addInfo', $item->id)); ?>" class="btn btn-warning btn-sm">➕ إضافة</a>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $item->id], 'style' => 'display:inline;']); ?>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()">🗑️ حذف</button>
                                    <?php echo Form::close(); ?>

                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript لتحسين وظيفة البحث -->
    <script>
        function searchTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let table = document.getElementById("customerTable");
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName("td");
                let match = false;

                for (let j = 0; j < cells.length; j++) {
                    if (cells[j].innerText.toLowerCase().includes(input)) {
                        match = true;
                        break;
                    }
                }
                rows[i].style.display = match ? "" : "none";
            }
        }

        function confirmDelete() {
            return confirm('⚠️ هل أنت متأكد أنك تريد حذف هذا العميل؟');
        }
    </script>

</body>
</html>
<?php /**PATH C:\Customers\resources\views/customer/index.blade.php ENDPATH**/ ?>