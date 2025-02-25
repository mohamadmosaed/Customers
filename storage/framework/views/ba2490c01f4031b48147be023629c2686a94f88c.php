
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة العملاء</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header Section -->
    <div class="bg-blue-900 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">مرحبًا بك في نظام العملاء</h1>

            <div class="hidden sm:flex sm:items-center sm:ml-6 relative">

                <button id="dropdownButton" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div><?php echo e(Auth::user()->name); ?></div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>

                <!-- Dropdown Content -->
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg z-10">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('profile.edit'),'class' => 'block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit')),'class' => 'block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700']); ?>
                        <?php echo e(__('Profile')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <!-- Authentication -->
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault(); this.closest(\'form\').submit();','class' => 'block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault(); this.closest(\'form\').submit();','class' => 'block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700']); ?>
                            <?php echo e(__('Log Out')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </form>
                </div>



            </div>

            <!-- JavaScript for Dropdown -->
            <script>
                const dropdownButton = document.getElementById('dropdownButton');
                const dropdownMenu = document.getElementById('dropdownMenu');

                dropdownButton.addEventListener('click', () => {
                    dropdownMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', (event) => {
                    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            </script>


        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto mt-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-blue-900">إدارة متكاملة لنظام العملاء الذكي</h2>
        </div>

        <!-- Features Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="<?php echo e(route('customer.create')); ?>" class="block">
                <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7m-1 5V7m6 4h1m-7 0h-1m6-3v2m-8-2v2m0 3h1m-7 0h-1" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">اضافة عميل جديد</h3>
                    <p class="text-gray-500">اضافة عميل جديد في قاعدة البيانات</p>
                </div>
            </a>
            <a href="<?php echo e(route('customer.index')); ?>" class="block">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7m-1 5V7m6 4h1m-7 0h-1m6-3v2m-8-2v2m0 3h1m-7 0h-1" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">قائمة العملاء</h3>
                <p class="text-gray-500">عرض وتعديل بيانات العملاء المسجلين</p>
            </div>
        </a>
        <a href="<?php echo e(route('agents.create')); ?>" class="block">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9L12 6.75M12 6.75L14.25 9M12 6.75V15.25M6 9.75V15.25M6 15.25h12M18 9.75v5.5" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">اضافة مندوب</h3>
                <p class="text-gray-500">اضافة مندوب جديد في قاعدة البيانات</p>
            </div>
            </a>
            <a href="<?php echo e(route('agents.index')); ?>" class="block">
                <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7m-1 5V7m6 4h1m-7 0h-1m6-3v2m-8-2v2m0 3h1m-7 0h-1" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">قائمة المناديب</h3>
                    <p class="text-gray-500">عرض وتعديل بيانات المناديب المسجلين</p>
                </div>
            </a>
            <a href="<?php echo e(route('activity.create')); ?>" class="block">
                <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9L12 6.75M12 6.75L14.25 9M12 6.75V15.25M6 9.75V15.25M6 15.25h12M18 9.75v5.5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">اضافة نشاط</h3>
                    <p class="text-gray-500">اضافة نشاط جديد في قاعدة البيانات</p>
                </div>
                </a>
                <a href="<?php echo e(route('activity.index')); ?>" class="block">
                    <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                        <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7m-1 5V7m6 4h1m-7 0h-1m6-3v2m-8-2v2m0 3h1m-7 0h-1" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">قائمة الانشطة</h3>
                        <p class="text-gray-500">عرض وتعديل بيانات الانشطة المسجلين</p>
                    </div>
                </a>
         
            <!-- Card -->
            <a href="<?php echo e(route('report')); ?>" class="block">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9L12 6.75M12 6.75L14.25 9M12 6.75V15.25M6 9.75V15.25M6 15.25h12M18 9.75v5.5" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">التقارير</h3>
                <p class="text-gray-500">تقارير تفاعلية وتحليلات بيانات</p>
            </div>
            </a>
            <!-- Card -->



            <!-- Card -->
            <a href="<?php echo e(route('NoticeCustomer.index')); ?>" class="block">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7m-1 5V7m6 4h1m-7 0h-1m6-3v2m-8-2v2m0 3h1m-7 0h-1" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2"> الاشعارات</h3>
                <p class="text-gray-500">ارسال رسائل واتساب للعملاء</p>
            </div>
            </a>
<!-- Footer Section -->
        <div class="bg-blue-600 text-white py-4 mt-8">
    <div class="container mx-auto text-center">
        <h3 class="text-2xl font-bold"><?php echo e(\App\Models\Customer::count()); ?></h3>

        <p class="text-lg">جميع العملاء المسجلة</p>
    </div>
         </div>
        </div>
    </div>
</body>
</html>

<?php /**PATH C:\Customers\resources\views/dashboard.blade.php ENDPATH**/ ?>