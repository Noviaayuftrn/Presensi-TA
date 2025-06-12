@extends('layouts.app')

@section('content')
    <h1>Buka Presensi Baru</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $i => $schedule)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $schedule->subject->nama_mapel }}</td>
                    <td>{{ $schedule->class->nama_kelas }}</td>
                    <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d-m-Y') }}</td>
                    <td>{{ $schedule->jam_mulai }} - {{ $schedule->jam_selesai }}</td>
                    <td>
                        @if ($schedule->status == 'open')
                            <span class="badge bg-success">Dibuka</span>
                        @else
                            <span class="badge bg-secondary">Belum Dibuka</span>
                        @endif
                    </td>
                    <td>
                        @if ($schedule->status == 'open')
                            <span class="text-muted">Sedang Aktif</span>
                        @else
                            <form action="{{ route('schedule.open') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Buka Presensi</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedule.store') }}" method="POST">
        @csrf

        <label>Jurusan:</label><br>
        <select name="major_id">
            <option value="">-- Pilih Jurusan --</option>
            @foreach ($majors as $major)
                <option value="{{ $major->id }}">{{ $major->nama_jurusan }}</option>
            @endforeach
        </select><br><br>

        <label>Kelas:</label><br>
        <select name="class_id">
            <option value="">-- Pilih Kelas --</option>
            @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
            @endforeach
        </select><br><br>

        <label>Mata Pelajaran:</label><br>
        <select name="sub_id">
            <option value="">-- Pilih Mata Pelajaran --</option>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->nama_mapel }}</option>
            @endforeach
        </select><br><br>

        <label>Guru Pengajar:</label><br>
        <select name="teach_id">
            <option value="">-- Pilih Guru --</option>
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->user->nama }}</option>
            @endforeach
        </select><br><br>

        <label>Tanggal:</label><br>
        <input type="date" name="date"><br><br>

        <label>Jam Mulai:</label><br>
        <input type="time" name="jam_mulai"><br><br>

        <label>Jam Selesai:</label><br>
        <input type="time" name="jam_selesai"><br><br>

        <label>Status Presensi:</label><br>
        <select name="status">
            <option value="open">Open</option>
            <option value="closed">Closed</option>
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('attendance.guru_index') }}">Kembali ke Jadwal</a>
@endsection

