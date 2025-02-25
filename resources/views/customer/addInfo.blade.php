<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة معلومات إضافية</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e6f1ff, #f7faff);
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
            font-size: 24px;
        }

        .form-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
            margin-left: 10px;
            white-space: nowrap;
        }

        input[type="text"], input[type="date"] {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-right: 10px;
        }

        .actions {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 15px;
        }

        button {
            padding: 10px 25px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .save-btn {
            background-color: #007bff;
            color: white;
        }

        .save-btn:hover {
            background-color: #0056b3;
        }

        .back-btn {
            background-color: #dc3545;
            color: white;
        }

        .back-btn:hover {
            background-color: #b12a36;
        }

        .add-row-btn {
            background-color: #28a745;
            color: white;
        }

        .add-row-btn:hover {
            background-color: #218838;
        }

        .note-row {
            display: flex;
            align-items: center;
            margin-top: 10px;
            gap: 10px;
        }

        .note-row input[type="text"], .note-row input[type="date"] {
            flex: 1;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #b12a36;
        }

        .delete-btn i {
            margin-left: 5px;
        }

        i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>إضافة معلومات إضافية</h1>

        <form action="{{ route('customernote.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">تاريخ إضافي</label>
                <input type="date" id="date" name="date[]">
            </div>
            <div class="form-group">
                <label for="note">ملاحظات إضافية</label>
                <input type="text" id="note" name="additional_notes[]" placeholder="أدخل ملاحظة جديدة">
            </div>
            <div class="form-group">

                <input type="hidden"  name="customer_id" value="{{$customer->id}}">
            </div>
            <div id="extra-rows"></div>
            <div class="actions">
                <button type="button" class="add-row-btn" onclick="addRow()">
                    <i>+</i> إضافة سطر جديد
                </button>
                <button type="submit" class="save-btn">حفظ</button>
                <button type="button" class="back-btn" onclick="goBack()">العودة</button>
            </div>
        </form>
    </div>

    <script>
        function addRow() {
            const extraRows = document.getElementById('extra-rows');
            const noteRow = document.createElement('div');
            noteRow.className = 'note-row';

            const dateInput = document.createElement('input');
            dateInput.type = 'date';
            dateInput.name = 'date[]';

            const textInput = document.createElement('input');
            textInput.type = 'text';
            textInput.name = 'additional_notes[]';
            textInput.placeholder = 'أدخل ملاحظة جديدة';

            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.className = 'delete-btn';
            deleteBtn.innerHTML = '<i>🗑️</i> حذف';
            deleteBtn.onclick = () => noteRow.remove();

            noteRow.appendChild(dateInput);
            noteRow.appendChild(textInput);
            noteRow.appendChild(deleteBtn);
            extraRows.appendChild(noteRow);
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
