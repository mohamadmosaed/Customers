<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تجديد الدعم الفني</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Custom Styling */
        .table-container {
            border-radius: 12px;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto py-10 px-4">
        <div class="bg-white shadow-lg rounded-lg p-6">

            <!-- Header Section -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-red-600 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v16h16V4H4z" />
                    </svg>
                    <span>تجديد الدعم الفني</span>
                </h1>
                <a href="/" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    العودة للرئيسية
                </a>
            </div>

            <p class="text-gray-500 mb-6">العملاء المنتهي فترة الدعم الفني لديهم</p>

            <!-- Table Section -->
            <div class="overflow-x-auto table-container">
                <table class="w-full text-right border-collapse border border-gray-200 rounded-lg">
                    <thead class="bg-blue-100">
                        <tr class="text-gray-700">
                            <th class="p-3 border border-gray-200">العميل</th>
                            <th class="p-3 border border-gray-200">رقم الجوال</th>
                            <th class="p-3 border border-gray-200">تاريخ الانتهاء</th>
                            <th class="p-3 border border-gray-200">المندوب</th>
                            <th class="p-3 border border-gray-200">الحالة</th>
                            <th class="p-3 border border-gray-200">الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $item)
                        <tr class="bg-white hover:bg-gray-50 transition">
                            <td class="p-3 border border-gray-200">{{$item->customer_name}}</td>
                            <td class="p-3 border border-gray-200">{{$item->mobile}}</td>
                            <td class="p-3 border border-gray-200">{{$item->support_end}}</td>
                            <td class="p-3 border border-gray-200">{{$item->customerAgent->name}}</td>
                            <td class="p-3 border border-gray-200">
                                @if($item->support_end >= \Carbon\Carbon::today())
                                    <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-600 text-sm font-medium rounded-full">
                                        ✅ نشط
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 bg-red-100 text-red-600 text-sm font-medium rounded-full">
                                        ❌ غير نشط
                                    </span>
                                @endif
                            </td>
                            <td class="p-3 border border-gray-200 text-center">
                                <button onclick="confirmNotification('{{ route('send-sms', $item->mobile) }}', '{{ $item->mobile }}')"
                                   class="px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M16 10h.01M12 10h.01M8 18h8M5 6h14M9 14h6" />
                                    </svg>
                                    <span>إرسال إنذار</span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- JavaScript Function for Confirmation Alert -->
    <script>
        function confirmNotification(url, mobile) {
            Swal.fire({
                icon: 'warning',
                title: 'تأكيد الإرسال',
                text: `هل تريد إرسال إشعار انتهاء الدعم إلى رقم الجوال: ${mobile}؟`,
                showCancelButton: true,
                confirmButtonText: 'نعم، أرسل الآن',
                cancelButtonText: 'إلغاء',
                confirmButtonColor: '#28a745', // Green
                cancelButtonColor: '#d33' // Red
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url; // Redirect if confirmed
                }
            });
        }
    </script>

</body>
</html>
