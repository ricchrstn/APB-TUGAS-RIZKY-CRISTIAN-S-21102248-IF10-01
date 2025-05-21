<!DOCTYPE html>
<html>
<head>
    <title>Latihan 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm rounded">
            <div class="card-header bg-primary text-white">
                <h4>Informasi Pengguna</h4>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $nama }}</p>
                <p><strong>Asal:</strong> {{ $asal }}</p>
            </div>
        </div>
    </div>
</body>
</html>
