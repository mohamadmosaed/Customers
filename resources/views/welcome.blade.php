<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>تسجيل الدخول -نظام إدارة العملاء</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-500 to-green-400 flex items-center justify-center min-h-screen">


    <!-- Login Container -->
    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-2xl">

        <!-- Header -->
        <div class="text-center mb-6">
                <div class="flex justify-center items-center w-16 h-16 bg-gradient-to-r from-green-500 to-blue-600 text-white rounded-full mx-auto mb-4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a8 8 0 10-16 0v2h5m2-5h.01M12 7h.01" />
                    </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-700">مرحبًا في نظام العملاء</h2>
            <p class="text-sm text-gray-500">الإدارة الذكية لعلاقات العملاء</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">البريد الإلكتروني</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">كلمة المرور</label>
                <input id="password" type="password" name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <input type="checkbox" id="remember_me" name="remember" class="text-blue-600">
                    <label for="remember_me" class="text-sm text-gray-600">تذكرني</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">نسيت كلمة المرور؟</a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-green-400 to-blue-500 text-white py-2 px-4 rounded-lg shadow-md hover:opacity-90">
                الدخول إلى النظام
            </button>

            <!-- Register Link -->
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">ليس لديك حساب؟ <a href="{{ route('register') }}" class="text-blue-600 hover:underline">سجل الآن</a></p>
            </div>
        </form>
    </div>

</body>
</html>

