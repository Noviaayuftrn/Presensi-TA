@extends('layouts.app')

@section('content')
    <h1>Edit Data Guru</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nama User:</label><br>
            <input type="text" name="nama" value="{{ old('nama', $teacher->user->nama) }}" required>
        </div>

        <div>
            <label>Username:</label><br>
            <input type="text" name="username" value="{{ old('username', $teacher->user->username) }}" required>
        </div>

        <div>
            <label>NIP:</label><br>
            <input type="number" name="nip" value="{{ old('nip', $teacher->nip) }}" required>
        </div>

        <div style="margin-top: 10px;">
            <button type="submit">Update</button>
            <a href="{{ route('teacher.index') }}" style="margin-left: 10px;">Batal</a>
        </div>
    </form>
@endsection
