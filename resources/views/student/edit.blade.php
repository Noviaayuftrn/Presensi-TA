@extends('layouts.app')

@section('content')
    <h1>Edit Data Siswa</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama User:</label><br>
        <input type="text" name="nama" value="{{ old('nama', $student->user->nama) }}"><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" value="{{ old('username', $student->user->username) }}"><br><br>

        <label>Kelas:</label><br>
        <select name="class_id">
            <option value="">-- Pilih Kelas --</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}" {{ (old('class_id', $student->class_id) == $class->id) ? 'selected' : '' }}>
                    {{ $class->nama_kelas }}
                </option>
            @endforeach
        </select><br><br>

        <label>NISN:</label><br>
        <input type="text" name="nisn" value="{{ old('nisn', $student->nisn) }}"><br><br>

        <button type="submit">Update</button>
        <a href="{{ route('student.index') }}">Batal</a>
    </form>
@endsection
  
