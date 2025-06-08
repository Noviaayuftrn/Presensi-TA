@extends('layouts.app')

@section('content')
    <h1>Daftar Guru</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('teacher.create') }}">Tambah Guru Baru</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:10px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Username</th>
                <th>NIP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $index => $teacher)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $teacher->user->nama }}</td>
                    <td>{{ $teacher->user->username }}</td>
                    <td>{{ $teacher->nip }}</td>
                    <td>
                        <a href="{{ route('teacher.edit', $teacher->id) }}">Edit</a>
                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
