@extends('layouts.app')

@section('content')
    <h1>Buka Presensi Baru</h1>

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
                <option value="{{ $teacher->id }}">{{ $teacher->nama_guru }}</option>
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
    <a href="{{ route('schedule.index') }}">Kembali ke Jadwal</a>
@endsection
