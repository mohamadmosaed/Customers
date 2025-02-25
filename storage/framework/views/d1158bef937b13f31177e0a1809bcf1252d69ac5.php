<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الفروع</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 py-10">

    <?php if(session('success')): ?>
    <div class="bg-green-500 text-white p-4 rounded-md shadow-md">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="bg-red-500 text-white p-4 rounded-md shadow-md">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <!-- Title -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-bold text-blue-600">إدارة الفروع</h1>
            <h1 class="text-xl font-bold text-blue-600">إضافة فروع جديدة</h1>
        </div>

        <!-- Form -->
        <form method="POST" action="<?php echo e(route('Branches.store')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="customer_id" value="<?php echo e($customer->id); ?>">

            <div class="grid grid-cols-2 gap-4">
                <!-- النشاط -->
                <div>
                    <label class="block text-gray-700 font-medium">📌 النشاط</label>
                    <select name="activity_id[]" class="w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300">
                        <option value="">أختر</option>
                        <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- المندوب -->
                <div>
                    <label class="block text-gray-700 font-medium">👨‍💼 المندوب المسؤول</label>
                    <select name="representative[]" class="w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300">
                        <option value="">أختر</option>
                        <?php $__currentLoopData = $agent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- العنوان -->
                <div class="col-span-2">
                    <label class="block text-gray-700 font-medium">العنوان</label>
                    <input type="text" name="address[]" class="w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300" placeholder="أدخل العنوان">
                </div>

                <!-- تاريخ التركيب -->
                <div>
                    <label class="block text-gray-700 font-medium">📅 تاريخ التركيب</label>
                    <input type="date" name="install_date[]" id="install_date" class="w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300">
                </div>

                <!-- تاريخ الانتهاء -->
                <div>
                    <label class="block text-gray-700 font-medium">📅 تاريخ الانتهاء</label>
                    <input type="date" name="support_end[]" id="support_end" class="w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300">
                </div>

                <!-- ملاحظات -->
                <div class="col-span-2">
                    <label class="block text-gray-700 font-medium">📝 ملاحظات</label>
                    <input type="text" name="notes[]" class="w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300" placeholder="أضف ملاحظات">
                </div>

                <!-- حالة الدعم -->
                <div class="col-span-2">
                    <label class="block text-gray-700 font-medium">📌 حالة الدعم</label>
                    <select name="support_status[]" class="w-full border border-gray-300 rounded-md p-2 bg-green-100 text-green-700">
                        <option value="نشط">✅ نشط</option>
                        <option value="غيرنشط">❌ غير نشط</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between mt-6">
                <a href="<?php echo e(route('BranchInfo.edit', $customer->id)); ?>" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">
                    إضافة معلومات
                </a>

                <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-orange-600">
                    حفظ
                </button>

                <a href="<?php echo e(route('dashboard')); ?>" class="bg-gray-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-gray-600">
                    الصفحة الرئيسية
                </a>
            </div>
        </form>
    </div>


    <script>


    const installDateInput = document.getElementById('install_date');
    const supportEndDateInput = document.getElementById('support_end');

    // Event listener to update the support-end date when the install-date changes
    installDateInput.addEventListener('change', function () {
        const installDate = new Date(this.value);

        if (!isNaN(installDate)) {
            // Add one year to the install date
            const supportEndDate = new Date(installDate);
            supportEndDate.setFullYear(supportEndDate.getFullYear() + 1);

            // Format the date as YYYY-MM-DD
            const year = supportEndDate.getFullYear();
            const month = String(supportEndDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const day = String(supportEndDate.getDate()).padStart(2, '0');

            supportEndDateInput.value = `${year}-${month}-${day}`;
        }
    });
</script>
</body>
</html>
<?php /**PATH C:\Customers\resources\views/branch/create.blade.php ENDPATH**/ ?>