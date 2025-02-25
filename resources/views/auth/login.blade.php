<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-lg">
        <div class="text-center mb-6">
            <div class="flex justify-center items-center w-16 h-16 bg-gradient-to-r from-green-400 to-blue-500 text-white rounded-full mx-auto mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a8 8 0 10-16 0v2h5m2-5h.01M12 7h.01" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-700">مرحبًا في نظام العملاء</h2>
            <p class="text-sm text-gray-500">الإدارة الذكية لعلاقات العملاء</p>
        </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">

        </div>

        <div>
            <button type="submit" class="w-full bg-gradient-to-r from-green-400 to-blue-500 text-white py-2 px-4 rounded-lg shadow-md hover:opacity-90">الدخول إلى النظام</button>
        </div>
    </form>
</x-guest-layout>
