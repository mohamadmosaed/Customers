
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
            <h1 class="text-2xl font-bold">التقارير</h1>

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
            <h2 class="text-3xl font-bold text-blue-900">    جميع التقارير</h2>
        </div>

        <!-- Features Section -->
        <a href="{{route('reportDay')}}" class="block">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7m-1 5V7m6 4h1m-7 0h-1m6-3v2m-8-2v2m0 3h1m-7 0h-1" />
                        </svg>
                    </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">  تقارير العملاء المضافة اليوم</h3>

                </div>
            </a>
            <a href="{{route('reportMonth')}}" class="block">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7m-1 5V7m6 4h1m-7 0h-1m6-3v2m-8-2v2m0 3h1m-7 0h-1" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">  تقارير العملاء المضافة هذا الشهر</h3>

            </div>
        </a>
        <a href="{{route('reportSupportEndThisMonth')}}" class="block">
         <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="square" stroke-linejoin="square" d="M8 11l4 4 4-4M16 9l-4-4-4 4" />
                    </svg>
                </div>

                <h3 class="text-xl font-semibold text-gray-700 mb-2">  تقارير العملاء التي ينتهي الدعم هذا الشهر</h3>

            </div>
        </a>

           <a href="{{route('reportSupportEndThisDay')}}" class="block">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                   <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                           <path stroke-linecap="square" stroke-linejoin="square" d="M8 11l4 4 4-4M16 9l-4-4-4 4" />
                       </svg>
                   </div>

                   <h3 class="text-xl font-semibold text-gray-700 mb-2">  تقارير العملاء التي ينتهي الدعم هذا اليوم</h3>

               </div>
           </a>
            <!-- Card -->
            <a href="{{route('reportPerPeriod')}}" class="block">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="bg-blue-500 text-white w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9L12 6.75M12 6.75L14.25 9M12 6.75V15.25M6 9.75V15.25M6 15.25h12M18 9.75v5.5" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">  تقارير العملاء خلال الفترة </h3>

            </div>
            </a>
            <!-- Card -->



                        </a>
<!-- Footer Section -->

</body>
</html>
