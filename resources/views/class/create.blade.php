@extends('layouts.app')

@section('content')
    <h1>Tambah Kelas</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('class.store') }}" method="POST">
        @csrf
        <label>Nama Kelas:</label><br>
        <input type="text" name="nama_kelas" value="{{ old('nama_kelas') }}"><br><br>

        <label>Jurusan:</label><br>
        <select name="major_id">
            <option value="">-- Pilih Jurusan --</option>
            @foreach ($majors as $major)
                <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                    {{ $major->nama_jurusan }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('class.index') }}">Kembali ke Daftar Kelas</a>
@endsection
