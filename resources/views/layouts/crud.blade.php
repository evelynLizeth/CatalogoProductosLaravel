<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crud de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .btn {
            border-radius: 8px;
        }
        .table {
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
        }
        .table thead {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        @yield('content')
    </div>
</body>
</html>