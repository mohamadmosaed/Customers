


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>إرسال رسالة SMS</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">
  <div class="container mx-auto p-4 max-w-lg">
    <div class="bg-white shadow-lg rounded-lg p-6">
      <h1 class="text-3xl font-bold text-center mb-6">إرسال رسالة SMS</h1>
      <form id="smsForm" action="{{ route('send-sms') }}" method="POST">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2">نص الرسالة</label>
          <textarea name="message" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" rows="3" placeholder="أدخل نص الرسالة" required></textarea>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2">أرقام الجوال (افصل بين الأرقام بفاصلة)</label>
          <input type="text" name="numbers_input" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"  required>
          <p class="text-sm text-gray-500 mt-1">سيتم تحويلها إلى مصفوفة</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2">اسم المرسل</label>
          <input type="text" name="sender" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="YourSenderName" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
          إرسال الرسالة
        </button>
      </form>
    </div>
  </div>

  <script>
    // Attach submit event listener to the form
    const form = document.getElementById('smsForm');
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      // Get the numbers input and convert to an array
      let numbersInput = document.querySelector('input[name="numbers_input"]').value;
      let numbersArray = numbersInput.split(',').map(n => n.trim());

      // Prepare form data
      let formData = {
        message: document.querySelector('textarea[name="message"]').value,
        numbers: numbersArray,
        sender: document.querySelector('input[name="sender"]').value
      };

      // Send POST request using fetch
      fetch("{{ route('send-sms') }}", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
          Swal.fire({
            icon: data.success ? 'success' : 'error',
            title: data.success ? 'تم إرسال الرسالة بنجاح' : 'فشل إرسال الرسالة',
            text: data.message
          });
        })
        .catch(error => {
          console.error('Error:', error);
          Swal.fire({
            icon: 'error',
            title: 'خطأ',
            text: 'حدث خطأ أثناء إرسال الرسالة'
          });
        });
    });
  </script>
</body>

</html>


