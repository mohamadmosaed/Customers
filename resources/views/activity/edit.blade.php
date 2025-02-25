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

    <div class="max-w-2xl w-full bg-white p-8 rounded-lg shadow-lg">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-800">عرض النشاط</h1>
            <p class="text-gray-600 mt-2">تفاصيل النشاط المحدد</p>
        </div>

        <!-- Update Form -->
        <form action="{{ route('activities.update', $activity->id) }}" method="POST">
            @csrf


            <!-- Activity Details -->
            <div class="bg-blue-50 p-6 rounded-lg border border-blue-200 shadow-sm">
                <label for="activity" class="text-lg font-semibold text-gray-700 mb-2 block">📌 اسم النشاط:</label>
                <input type="text" id="activity" name="activity" value="{{ $activity->name }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-center mt-6 space-x-3 space-x-reverse">
                <!-- Back Button -->
                <a href="{{ route('activities.index') }}"
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition duration-200">
                    🔙 العودة إلى القائمة
                </a>

                <!-- Edit Button -->
                <button type="submit"
                    class="bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition duration-200">
                    ✏️ تعديل
                </button>
            </div>
        </form>

        <!-- Delete Form (Placed Outside Update Form) -->
        <div class="flex justify-center mt-3">
            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST">
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
