@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Presensi</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $att)
                <tr>
                    <td>{{ $att->user->nama }}</td>
                    <td>{{ $att->attendance_date }}</td>
                    <td>{{ $att->check_in_time }}</td>
                    <td>{{ ucfirst($att->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
