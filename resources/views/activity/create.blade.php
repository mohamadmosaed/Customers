<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة عميل جديد</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">

    <!-- Header -->
    <div class="bg-blue-600 text-white w-full max-w-4xl px-8 py-4 rounded-t-lg flex items-center justify-between">
        <h1 class="text-2xl font-bold">إضافة نشاط جديد</h1>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="bg-red-500 px-4 py-2 text-white rounded hover:bg-red-600">
                <strong>تسجيل الخروج</strong>
            </button>
        </form>
    </div>

    <!-- Form Container -->
    <div class="w-full max-w-4xl bg-white p-8 rounded-b-lg shadow-lg">
        <form id="activity-form" action="{{ route('activity.store') }}" method="POST">
            @csrf


            <!-- Activities Section -->
            <div id="activities-container" class="space-y-4">
                <div class="activity-row flex items-center gap-4">
                    <input type="text" name="activity[]" placeholder="النشاط"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                    <button type="button"
                        class="add-activity bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">+</button>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 text-center">
                <button type="submit"
                    class="submit-btn bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700">
                    إضافة
                </button>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script>
        $(document).ready(function() {
            // Add new activity input field
            $(document).on('click', '.add-activity', function() {
                const newRow = `
                    <div class="activity-row flex items-center gap-4">
                        <input type="text" name="activity[]" placeholder="النشاط" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                        <button type="button" class="remove-activity bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">-</button>
                    </div>`;
                $('#activities-container').append(newRow);
            });

            // Remove an activity input field
            $(document).on('click', '.remove-activity', function() {
                $(this).closest('.activity-row').remove();
            });

            // Submit form via AJAX
            $('#activity-form').submit(function(e) {
                e.preventDefault();
                const formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('activity.store') }}",
                    method: "POST",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('تمت الإضافة بنجاح!');
                        // Clear input fields
                        $('#activities-container').html(`
                            <div class="activity-row flex items-center gap-4">
                                <input type="text" name="activity[]" placeholder="النشاط" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                                <button type="button" class="add-activity bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">+</button>
                            </div>`);
                    },
                    error: function(error) {
                        alert('حدث خطأ أثناء الإضافة. الرجاء المحاولة لاحقاً.');
                    }
                });
            });
        });
    </script>
</body>

</html>
