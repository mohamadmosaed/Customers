<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تفاصيل المندوب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .header-icon {
            font-size: 40px;
            color: #007bff;
        }
        .btn-back {
            background-color: #007bff;
            color: white;
            border-radius: 8px;
            padding: 8px 16px;
            transition: 0.3s;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="text-center mb-3">
                    <i class="header-icon bi bi-person-badge"></i>
                    <h2 class="mt-2">تفاصيل المندوب</h2>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">📌 الاسم</label>
                    <p class="form-control bg-light">{{ $agent->name }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">📍 منطقة العمل</label>
                    <p class="form-control bg-light">{{ $agent->Work_area ?? 'غير محددة' }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">📅 تاريخ البداية</label>
                    <p class="form-control bg-light">{{ $agent->start_date }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">📆 تاريخ النهاية</label>
                    <p class="form-control bg-light">{{ $agent->end_date ?? 'غير محدد' }}</p>
                </div>

                <div class="text-center">
                    <a href="{{ route('agents.index') }}" class="btn btn-back">🔙 العودة للقائمة</a>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
