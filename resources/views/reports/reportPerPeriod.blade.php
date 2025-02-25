<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج التصفية</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <!-- Container -->
    <div class="w-full max-w-4xl p-8 bg-white rounded-lg shadow-lg">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">تصفية التقارير</h1>
            <p class="text-gray-600">استخدم الخيارات  لتصفية التقارير حسب الحاجة</p>
        </div>

        <!-- Form -->
        <form method="GET" action="{{ route('reportPerPeriodFilter') }}" class="space-y-6">
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Start Date -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">من تاريخ</label>
                    <input type="date" name="start_date" id="start_date"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400"
                           value="{{ request('start_date') }}">
                </div>

                <!-- End Date -->
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">إلى تاريخ</label>
                    <input type="date" name="end_date" id="end_date"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400"
                           value="{{ request('end_date') }}">
                </div>

                <!-- Agent -->
                <div>
                    <label for="agent" class="block text-sm font-medium text-gray-700 mb-1">المندوب</label>
                    <select name="agent" id="agent"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400">

                <option value="">أختر</option>
                @foreach ($agent as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
                </div>

                <!-- Activity -->
                <div>
                    <label for="activity" class="block text-sm font-medium text-gray-700 mb-1">📌 النشاط</label>
                    <select name="activity" id="activity"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400">

                        <option value="">أختر</option>
                        @foreach ($activity as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-green-400 to-blue-500 text-white rounded-lg shadow-lg hover:opacity-90 text-lg font-semibold">
                    تطبيق الفلاتر
                </button>
            </div>
        </form>
    </div>

</body>
</html>
