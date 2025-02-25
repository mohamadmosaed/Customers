<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة الأنشطة</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <!-- Container -->
    <div class="w-full max-w-5xl p-6 bg-white rounded-lg shadow-lg border border-gray-200">

        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-extrabold text-blue-600">📋 قائمة الأنشطة</h1>
            <p class="text-gray-500 mt-1">إدارة جميع الأنشطة بسهولة وسرعة</p>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Activities Table -->
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-blue-100 text-gray-700 text-lg">
                    <tr>
                        <th class="px-6 py-3 border border-gray-300">#</th>
                        <th class="px-6 py-3 border border-gray-300 text-right">📌 اسم النشاط</th>
                        <th class="px-6 py-3 border border-gray-300 text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-md">
                    @forelse ($activities as $activity)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4 text-center font-semibold">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $activity->name }}</td>
                            <td class="px-6 py-4 text-center">
                                <!-- Buttons -->
                                <div class="flex justify-center space-x-2 space-x-reverse">
                                    <a href="{{ route('activities.show', $activity->id) }}"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                        👁️ عرض
                                    </a>
                                    <a href="{{ route('activities.edit', $activity->id) }}"
                                        class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">
                                        ✏️ تعديل
                                    </a>
                                    <form action="{{ route('activities.destroy', $activity->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('هل أنت متأكد من حذف هذا النشاط؟')"
                                            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                            🗑️ حذف
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3"
                                class="px-6 py-4 text-center text-gray-500 font-semibold bg-gray-50">
                                🚫 لا توجد أنشطة مضافة.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
