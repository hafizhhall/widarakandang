<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Custom Borders and Font</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
    <style>
        /* Mengatur font tabel */
        .table {
            font-family:sans-serif;
            font-size: 23px; /* Menentukan ukuran font */
        }
        .table td, .table th {
            padding: 1rem; /* Menambahkan padding untuk renggang */
            font-weight: bold; /* Membuat teks menjadi bold */
        }
        .table-bordered {
            border: 3px solid #dee2e6; /* Bootstrap's default border color */
        }
        .table-bordered td, .table-bordered th {
            border: 1px dashed #dee2e6; /* Border putus-putus */
        }
    </style>
</head>
<body>
    <div class="container">
        <h4>Tanggal: {{ $todayDate }}</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Anggrek</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($katalog as $katalogs)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $katalogs->title }}</td>
                    <td>Rp{{ number_format($katalogs->harga, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
