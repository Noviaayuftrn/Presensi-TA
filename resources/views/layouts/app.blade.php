<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Presensi Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            height: 100vh;
            color: white;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Dashboard Admin</h4>
        <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
        <!-- <a href="{{ route('admin.guru.index') }}">👨‍🏫 Guru</a> -->
        <!-- <a href="{{ route('admin.siswa.index') }}">👩‍🎓 Siswa</a> -->
        <!-- <a href="{{ route('admin.mapel.index') }}">📚 Mata Pelajaran</a> -->
    </div>

    <div class="main-content">
        <h2 class="mb-4">Presensi Online</h2>
        @yield('content')
    </div>
</body>
</html>
