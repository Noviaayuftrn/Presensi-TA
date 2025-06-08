@extends('layouts.app')

@section('content')
    <h1>Tambah Jurusan</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('major.store') }}" method="POST">
        @csrf
        <label>Nama Jurusan:</label><br>
        <input type="text" name="nama_jurusan" value="{{ old('nama_jurusan') }}"><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('major.index') }}">Kembali ke Daftar Jurusan</a>
@endsection
