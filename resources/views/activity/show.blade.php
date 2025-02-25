<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>عرض النشاط</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="max-w-2xl w-full bg-white p-8 rounded-lg shadow-xl">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-800">📌 عرض النشاط</h1>
            <p class="text-gray-600 mt-2">تفاصيل النشاط المحدد</p>
        </div>

        <!-- Activity Details -->
        <div class="bg-blue-50 p-6 rounded-lg border border-blue-300 shadow-sm">
            <p class="text-lg font-semibold text-gray-700 mb-2">اسم النشاط:</p>
            <p class="text-xl text-blue-700 font-bold">{{ $activity->name }}</p>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-center mt-6 space-x-3 space-x-reverse">
            <!-- Back Button -->
            <a href="{{ route('activities.index') }}"
                class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition duration-200">
                🔙 العودة إلى القائمة
            </a>
            <!-- Edit Button -->
            <a href="{{ route('activities.edit', $activity->id) }}"
                class="bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition duration-200">
                ✏️ تعديل
            </a>
            <!-- Delete Button -->
            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit"
                    onclick="return confirm('هل أنت متأكد من حذف هذا النشاط؟')"
                    class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition duration-200">
                    🗑️ حذف
                </button>
            </form>
        </div>
    </div>

</body>

</html>
