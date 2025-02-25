<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل عميل</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="max-w-4xl w-full bg-white p-8 rounded-lg shadow-lg">
        <!-- Header -->
        <div class="flex justify-between items-center bg-blue-600 text-white px-6 py-4 rounded-t-lg">
            <h1 class="text-2xl font-bold">تعديل عميل</h1>
            <button class="bg-red-500 px-4 py-2 rounded-lg text-sm hover:bg-red-600 transition">تسجيل الخروج</button>
        </div>

        <!-- Form -->
        <form action="{{ route('customer.update', $customer->id) }}" method="POST" class="space-y-4 mt-4">
            @csrf
            @method('PUT')

            <!-- Customer Name & Activity -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="customer_name" class="font-semibold">اسم العميل</label>
                    <input type="text" id="customer_name" name="customer_name" value="{{ $customer->customer_name }}"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400"
                        placeholder="الاسم الكامل">
                </div>
                <div>
                    <label for="activity" class="font-semibold">النشاط</label>
                    <select id="activity" name="activity"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                        <option value="">أختر</option>
                        @foreach ($activity as $item)
                            <option value="{{ $item->id }}" {{ $customer->activity == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Mobile & Program Type -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="mobile" class="font-semibold">رقم الجوال</label>
                    <input type="text" id="mobile" name="mobile" value="{{ $customer->mobile }}"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400"
                        placeholder="أدخل رقم الجوال">
                </div>
                <div>
                    <label for="program" class="font-semibold">نوع البرنامج</label>
                    <select id="program" name="program"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                        <option value="">أختر</option>
                        <option value="online" {{ $customer->program == 'online' ? 'selected' : '' }}>اون لاين</option>
                        <option value="offline" {{ $customer->program == 'offline' ? 'selected' : '' }}>اف لاين</option>
                    </select>
                </div>
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="font-semibold">العنوان</label>
                <input type="text" id="address" name="address" value="{{ $customer->address }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400"
                    placeholder="أدخل العنوان بالتفصيل">
            </div>

            <!-- Agent, Install Date, Support End Date -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="agent" class="font-semibold">المندوب المسؤول</label>
                    <input type="text" id="agent" name="agent" value="{{ $customer->customerAgent->name }}"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400"
                        placeholder="اسم المندوب">
                </div>
                <div>
                    <label for="install_date" class="font-semibold">تاريخ التركيب</label>
                    <input type="date" id="install_date" name="install_date" value="{{ $customer->install_date }}"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label for="support_end" class="font-semibold">تاريخ انتهاء الدعم</label>
                    <input type="date" id="support_end" name="support_end" value="{{ $customer->support_end }}"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                </div>
            </div>

            <!-- Notes -->
            <div>
                <label for="notes" class="font-semibold">ملاحظات</label>
                <textarea id="notes" name="notes" rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400"
                    placeholder="ملاحظات إضافية...">{{ $customer->notes }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">
                    تحديث
                </button>
            </div>
        </form>
    </div>

</body>

</html>
