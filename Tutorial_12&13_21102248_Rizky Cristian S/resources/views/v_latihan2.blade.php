<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm rounded">
            <div class="card-header bg-success text-white">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Asal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($daf_mhs as $mhs)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $mhs['nama'] }}</td>
                                <td>{{ $mhs['asal'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
