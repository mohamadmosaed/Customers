<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <!-- Form Header -->
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">إنشاء حساب جديد</h2>

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">الاسم الكامل</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   required autofocus autocomplete="name">
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500 text-sm" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">البريد الإلكتروني</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   required autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">كلمة المرور</label>
            <input id="password" type="password" name="password"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">تأكيد كلمة المرور</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-sm" />
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">هل لديك حساب؟ تسجيل الدخول</a>
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                تسجيل
            </button>
        </div>
    </form>

</x-guest-layout>
