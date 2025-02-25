<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تعديل بيانات المندوب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            font-size: 18px;
            transition: 0.3s ease-in-out;
        }
        .btn-success:hover {
            background-color: #218838;
            transform: scale(1.02);
        }
        .header-icon {
            font-size: 48px;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="text-center mb-3">
                    <i class="header-icon bi bi-person-lines-fill"></i>
                    <h2 class="mt-2">تعديل بيانات المندوب</h2>
                </div>

                <form action="{{ route('agents.update', $agent->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">👤 الاسم</label>
                        <input type="text" name="name" value="{{ $agent->name }}" class="form-control" required placeholder="أدخل اسم المندوب">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">📍 منطقة العمل</label>
                        <input type="text" name="Work_area" value="{{ $agent->Work_area }}" class="form-control" placeholder="أدخل منطقة العمل">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">📅 تاريخ البداية</label>
                        <input type="date" name="start_date" value="{{ $agent->start_date }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">📆 تاريخ النهاية</label>
                        <input type="date" name="end_date" value="{{ $agent->end_date }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success w-100">💾 حفظ التعديلات</button>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('agents.index') }}" class="btn btn-secondary">🔙 العودة للقائمة</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
