@extends('layouts.app')

@section('content')
    <h1>Tambah Mata Pelajaran</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('subject.store') }}" method="POST">
        @csrf
        <label>Nama Mata Pelajaran:</label><br>
        <input type="text" name="nama_mapel" value="{{ old('nama_mapel') }}"><br><br>

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
    <a href="{{ route('subject.index') }}">Kembali ke Daftar Mata Pelajaran</a>
@endsection
