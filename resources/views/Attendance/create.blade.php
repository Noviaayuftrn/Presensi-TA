@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Presensi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Siswa</label>
            <select name="user_id" class="form-control" required>
                <option value="">Pilih siswa</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status Kehadiran</label>
            <select name="status" class="form-control" required>
                <option value="">Pilih status</option>
                <option value="present">Hadir</option>
                <option value="sakit">Sakit</option>
                <option value="izin">Izin</option>
                <option value="alpha">Tanpa Keterangan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit Presensi</button>
    </form>
</div>
@endsection
