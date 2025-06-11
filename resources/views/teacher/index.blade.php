@extends('layouts.app')

@section('content')
    <h1>Daftar Guru</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    {{-- Dropdown filter jurusan dan kelas --}}
    <div style="margin-bottom: 15px;">
        <label>Jurusan:</label><br>
        <select id="major_filter">
            <option value="">-- Semua Jurusan --</option>
            @foreach ($majors as $major)
                <option value="{{ $major->id }}">{{ $major->nama_jurusan ?? $major->name ?? 'Jurusan '.$major->id }}</option>
            @endforeach
        </select><br><br>

        <label>Kelas:</label><br>
        <select id="class_filter">
            <option value="">-- Semua Kelas --</option>
            @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->nama_kelas ?? $class->name ?? 'Kelas '.$class->id }}</option>
            @endforeach
        </select><br><br>
    </div>

    <a href="{{ route('teacher.create') }}">Tambah Guru Baru</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:10px;">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama User</th>
                <th>Jurusan</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="teacher-table-body">
            @include('teacher.partials.teacher_table', ['teachers' => $teachers])
        </tbody>
    </table>

    {{-- Script untuk dropdown filter --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            // Fungsi untuk load kelas berdasarkan jurusan
            function loadClasses(majorID) {
                if (majorID) {
                    $.ajax({
                        url: '/get-classes/' + majorID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#class_filter').empty();
                            $('#class_filter').append('<option value="">-- Semua Kelas --</option>');
                            $.each(data, function(key, value) {
                                $('#class_filter').append('<option value="' + value.id + '">' + (value.nama_kelas ?? value.name ?? 'Kelas ' + value.id) + '</option>');
                            });
                        }
                    });
                } else {
                    $('#class_filter').empty();
                    $('#class_filter').append('<option value="">-- Semua Kelas --</option>');
                }
            }

            // Saat jurusan diubah
            $('#major_filter').change(function() {
                var majorID = $(this).val();
                loadClasses(majorID);

                // Opsional: bisa tambahkan filter table disini kalau mau filter daftar guru secara live
                // misalnya pakai AJAX atau Javascript DOM filter
            });

            // Jika mau, bisa tambahkan event change pada #class_filter untuk filter table

        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/teacher-filter.js') }}"></script>

@endsection
