@extends('layouts.app')

@section('content')
    <h1>Daftar Jadwal Presensi</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('schedule.create') }}">Buka Presensi Baru</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($schedules as $i => $schedule)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $schedule->class->nama_kelas ?? '-' }}</td>
                    <td>{{ $schedule->subject->nama_mapel ?? '-' }}</td>
                    <td>{{ $schedule->teacher->nama_guru ?? '-' }}</td>
                    <td>{{ $schedule->date }}</td>
                    <td>{{ $schedule->jam_mulai }} - {{ $schedule->jam_selesai }}</td>
                    <td>{{ ucfirst($schedule->status) }}</td>
                    <td>
                        <a href="{{ route('schedule.edit', $schedule->id) }}">Edit</a> |
                        <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus jadwal ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none;border:none;color:red;cursor:pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8">Belum ada jadwal.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
