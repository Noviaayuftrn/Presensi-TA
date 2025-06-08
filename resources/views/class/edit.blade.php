@extends('layouts.app')

@section('content')
    <h1>Edit Kelas</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('class.update', $class->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Kelas:</label><br>
        <input type="text" name="nama_kelas" value="{{ old('nama_kelas', $class->name) }}"><br><br>

        <label>Jurusan:</label><br>
        <select name="major_id">
            <option value="">-- Pilih Jurusan --</option>
            @foreach ($majors as $major)
                <option value="{{ $major->id }}" {{ $class->major_id == $major->id ? 'selected' : '' }}>
                    {{ $major->nama_jurusan }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('class.index') }}">Kembali ke Daftar Kelas</a>
@endsection
