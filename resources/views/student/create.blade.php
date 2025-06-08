@extends('layouts.app')

@section('content')
    <h1>Tambah Siswa Baru</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('student.store') }}" method="POST">
        @csrf

        <label>Nama User:</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}"><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" value="{{ old('username') }}"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <label>Kelas:</label><br>
        <select name="class_id">
            <option value="">-- Pilih Kelas --</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                    {{ $class->nama_kelas }}
                </option>
            @endforeach
        </select><br><br>

        <label>NISN:</label><br>
        <input type="text" name="nisn" value="{{ old('nisn') }}"><br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('student.index') }}">Batal</a>
    </form>
@endsection
