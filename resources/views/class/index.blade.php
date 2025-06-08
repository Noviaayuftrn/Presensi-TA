@extends('layouts.app')

@section('content')
    <h1>Daftar Kelas</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('class.create') }}">+ Tambah Kelas</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($classes as $class)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $class->nama_kelas }}</td>
                    <td>{{ $class->major->nama_jurusan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('class.edit', $class->id) }}">Edit</a> |
                        <form action="{{ route('class.destroy', $class->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus kelas ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="text-align: center;">Belum ada data kelas</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
