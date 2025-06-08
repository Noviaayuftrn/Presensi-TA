@extends('layouts.app')

@section('content')
    <h1>Tambah Data Guru</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teacher.store') }}" method="POST">
        @csrf

        <label>Nama User:</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}"><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" value="{{ old('username') }}"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <label>NIP:</label><br>
        <input type="text" name="nip" value="{{ old('nip') }}"><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('teacher.index') }}">Kembali ke Daftar Guru</a>
@endsection
