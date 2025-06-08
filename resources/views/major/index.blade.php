@extends('layouts.app')

@section('content')
    <h1>Daftar Jurusan</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('major.create') }}">+ Tambah Jurusan</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($majors as $major)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $major->nama_jurusan }}</td>
                    <td>
                        <a href="{{ route('major.edit', $major) }}">Edit</a> |
                        <form action="{{ route('major.destroy', $major) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if ($majors->isEmpty())
                <tr>
                    <td colspan="3" style="text-align: center;">Belum ada data jurusan</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
