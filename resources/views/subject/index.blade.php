@extends('layouts.app')

@section('content')
    <h1>Daftar Mata Pelajaran</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('subject.create') }}">Tambah Mata Pelajaran</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mata Pelajaran</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($subjects as $index => $subject)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $subject->nama_mapel }}</td>
                    <td>{{ $subject->major->nama_jurusan }}</td>
                    <td>
                        <a href="{{ route('subject.edit', $subject->id) }}">Edit</a> |
                        <form action="{{ route('subject.destroy', $subject->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus mata pelajaran ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none;border:none;color:red;cursor:pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data mata pelajaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
