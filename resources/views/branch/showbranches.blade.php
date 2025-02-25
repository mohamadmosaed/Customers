<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> الفروع</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f8f9fa;
    padding: 20px;
">
    <div id="form-container" class="w-full max-w-4xl bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">جميع الفروع</h1>

        @foreach ($customer->customerBranches as $index => $branch)
        <div class="bg-gray-100 p-6 rounded-lg shadow-md mb-6">
            <!-- Branch Title -->
            <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">الفرع {{ $index + 1 }}</h2>

            <!-- Update Branch Form -->
            <form action="{{ route('BranchInfo.update', $branch->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <input type="hidden" class="text" value="{{$customer->id}}" name="customer_id">

                    <!-- النشاط -->
                    <div>
                        <label class="block text-gray-700 font-medium">📌 النشاط</label>
                        <select name="activity" class="w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300">
                            <option value="">أختر</option>
                            @foreach ($activity as $item)
                                <option value="{{ $item->id }}" {{ $branch->activity_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

<div>
    <label class="block text-gray-700 font-medium">👨‍💼 المندوب المسؤول</label>
    <select name="representative" class="w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300">
        <option value="">أختر</option>
        @foreach ($agent as $item)
            <option value="{{ $item->id }}" {{ $branch->representative == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
</div>



                    <!-- العنوان -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">العنوان</label>
                        <input type="text" name="address" value="{{ $branch->address }}" class="w-full rounded-md border border-green-500 p-2">
                    </div>

                    <!-- تاريخ التركيب -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">تاريخ التركيب</label>
                        <input type="date" name="install_date" value="{{ $branch->install_date }}" class="w-full rounded-md border border-green-500 p-2">
                    </div>

                    <!-- تاريخ الانتهاء -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">تاريخ الانتهاء</label>
                        <input type="date" name="support_end" value="{{ $branch->support_end }}" class="w-full rounded-md border border-green-500 p-2">
                    </div>

                    <!-- ملاحظات -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">ملاحظات</label>
                        <input type="text" name="notes" value="{{ $branch->notes }}" class="w-full rounded-md border border-green-500 p-2">
                    </div>

                    <!-- حالة الدعم -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">حالة الدعم</label>
                        <select name="support_status" class="w-full rounded-md border border-green-500 p-2">
                            <option value="نشط" {{ $branch->support_status == 'نشط' ? 'selected' : '' }}>نشط</option>
                            <option value="غيرنشط" {{ $branch->support_status == 'غيرنشط' ? 'selected' : '' }}>غير نشط</option>
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-6 flex gap-4">
                    <button type="submit"
                        class="bg-green-500 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 hover:bg-green-600">
                        تحديث بيانات الفرع
                    </button>
                </form>
                    <a href="{{ route('Branches.show', $customer->id) }}"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 hover:bg-blue-600">
                        إضافة فرع جديد
                    </a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['BranchInfo.destroy', $branch->id], 'class' => 'inline-block']) !!}
                    <button type="submit" onclick="return confirmDelete()"
                        class="bg-red-500 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 hover:bg-red-600">
                        حذف الفرع الحالي
                    </button>
                    {!! Form::close() !!}
                    <a href="{{route('dashboard')}}"  class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 hover:bg-blue-600">  الصفحة الرئيسية</a>
                </div>

        </div>
        @endforeach
    </div>

    <script>
        function confirmDelete() {
            return confirm('هل أنت متأكد أنك تريد حذف هذا العنصر؟');
        }
    </script>
</body>

</html>
