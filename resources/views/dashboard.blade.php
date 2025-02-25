
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
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>

                <!-- Dropdown Content -->
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg z-10">
                    <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
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
            <a href="{{route('customer.create')}}" class="block">
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
            <a href="{{route('customer.index')}}" class="block">
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
        <a href="{{route('agents.create')}}" class="block">
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
            <a href="{{route('agents.index')}}" class="block">
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
            <a href="{{route('activity.create')}}" class="block">
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
                <a href="{{route('activity.index')}}" class="block">
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
         {{--   <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="square" stroke-linejoin="square" d="M8 11l4 4 4-4M16 9l-4-4-4 4" />
                    </svg>
                </div>

                <h3 class="text-xl font-semibold text-gray-700 mb-2">بحث متقدم</h3>
                <p class="text-gray-500">ابحث عن العملاء باستخدام فلاتر متعددة</p>
            </div>--}}
            <!-- Card -->
            <a href="{{route('report')}}" class="block">
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
            <a href="{{route('NoticeCustomer.index')}}" class="block">
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
        <h3 class="text-2xl font-bold">{{ \App\Models\Customer::count() }}</h3>

        <p class="text-lg">جميع العملاء المسجلة</p>
    </div>
         </div>
        </div>
    </div>
</body>
</html>
{{--}}
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة العملاء</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            direction: rtl;
        }
        .header {
            background-color: #1E3A8A;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dropdown {
            position: relative;
        }
        .dropdown-btn {
            background-color: white;
            color: #333;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
        }
        .dropdown-content a {
            padding: 10px;
            display: block;
            text-decoration: none;
            color: black;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
        }
        .show {
            display: block;
        }
        .container {
            margin: 20px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            text-decoration: none;
            color: black;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .icon {
            font-size: 30px;
            margin-bottom: 10px;
        }
        .footer {
            background-color: #1E3A8A;
            color: white;
            padding: 10px;
            margin-top: 20px;
        }
        </style>
</head>
<body>
    <div class="header">
        <h1>مرحبًا بك في نظام العملاء</h1>
        <div class="dropdown">
            <button id="dropdownButton" class="dropdown-btn">اسم المستخدم</button>
            <div id="dropdownMenu" class="dropdown-content">
                <a href="#">الملف الشخصي</a>
                <a href="#" onclick="logout()">تسجيل الخروج</a>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>إدارة متكاملة لنظام العملاء الذكي</h2>
        <div class="grid">
            <a href="{{route('customer.create')}}" class="card">
                <div class="icon">➕</div>
                <h3>إضافة عميل جديد</h3>
                <p>إضافة عميل جديد في قاعدة البيانات</p>
            </a>
            <a href="{{route('customer.index')}}" class="card">
                <div class="icon">📋</div>
                <h3>قائمة العملاء</h3>
                <p>عرض وتعديل بيانات العملاء المسجلين</p>
            </a>
            <ahref="{{route('customer.index')}}" class="card">
                <div class="icon">📊</div>
                <h3>التقارير</h3>
                <p>تقارير تفاعلية وتحليلات بيانات</p>
            </a>
            <a href="{{route('NoticeCustomer.index')}}" class="card">
                <div class="icon">🔔</div>
                <h3>الإشعارات</h3>
                <p>إرسال رسائل واتساب للعملاء</p>
            </a>
        </div>
    </div>
    <div class="footer">
        <h3>عدد العملاء المسجلين: <span id="customerCount">{{ \App\Models\Customer::count() }}</span></h3>
    </div>
    <script>
        document.getElementById('dropdownButton').addEventListener('click', function() {
            document.getElementById('dropdownMenu').classList.toggle('show');
        });
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-btn')) {
                document.getElementById('dropdownMenu').classList.remove('show');
            }
        };
        function logout() {
            alert('تم تسجيل الخروج');
        }
    </script>
</body>
</html>



--}}
