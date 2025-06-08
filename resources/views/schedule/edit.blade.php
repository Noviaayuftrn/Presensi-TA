@extends('layouts.app')

@section('content')
    <h1>Edit Status Presensi</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedule.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p><strong>Kelas:</strong> {{ $schedule->class->nama_kelas ?? '-' }}</p>
        <p><strong>Mapel:</strong> {{ $schedule->subject->nama_mapel ?? '-' }}</p>
        <p><strong>Guru:</strong> {{ $schedule->teacher->nama_guru ?? '-' }}</p>
        <p><strong>Tanggal:</strong> {{ $schedule->date }}</p>
        <p><strong>Jam:</strong> {{ $schedule->jam_mulai }} - {{ $schedule->jam_selesai }}</p>

        <label>Status Presensi:</label><br>
        <select name="status">
            <option value="open" {{ $schedule->status == 'open' ? 'selected' : '' }}>Open</option>
            <option value="closed" {{ $schedule->status == 'closed' ? 'selected' : '' }}>Closed</option>
        </select><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('schedule.index') }}">Kembali ke Jadwal</a>
@endsection
