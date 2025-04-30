<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        .card {
            border: 1px solid #ccc;
            padding: 16px;
            margin: 12px;
            border-radius: 8px;
            display: inline-block;
            width: 200px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Dashboard Admin</h1>
    <div class="card">
        <h3>Jumlah Guru</h3>
        <p>{{ $totalGuru }}</p>
    </div>
    <div class="card">
        <h3>Jumlah Siswa</h3>
        <p>{{ $totalSiswa }}</p>
    </div>
    <div class="card">
        <h3>Jumlah Mapel</h3>
        <p>{{ $totalMapel }}</p>
    </div>
</body>
</html>
