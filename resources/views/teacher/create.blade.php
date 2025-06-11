@extends('layouts.app')

@section('content')
    <h1>Tambah Data Guru</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teacher.store') }}" method="POST">
        @csrf
        <label>Nama User:</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}"><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" value="{{ old('username') }}"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <label>NIP:</label><br>
        <input type="text" name="nip" value="{{ old('nip') }}"><br><br>

        <div>
            <label>Jurusan:</label><br>
            <select name="major_id" id="major_id" required>
                <option value="">-- Pilih Jurusan --</option>
                @foreach ($majors as $major)
                    <option value="{{ $major->id }}" {{ old('class_id') == $major->id ? 'selected' : '' }}>
                        {{ $major->nama_jurusan ?? $major->name ?? 'Jurusan '.$major->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Kelas:</label><br>
            <select name="class_id" id="class_id" required>
                <option value="">-- Pilih Kelas --</option>
                {{-- Akan diisi via AJAX --}}
            </select>
        </div>

        <div>
            <label>Mata Kuliah:</label><br>
            <select name="sub_id" id="sub_id" required>
                <option value="">Pilih Mata Pelajaran</option>
                {{-- Akan diisi via AJAX --}}
            </select>
        </div>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('teacher.index') }}">Kembali ke Daftar Guru</a>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#major_id').change(function () {
                    var majorID = $(this).val();

                    // Load Kelas
                    if (majorID) {
                        $.ajax({
                            url: '/get-classes/' + majorID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $('#class_id').empty().append('<option value="">-- Pilih Kelas --</option>');
                                $.each(data, function (key, value) {
                                    $('#class_id').append('<option value="' + value.id + '">' + (value.nama_kelas ?? value.name ?? 'Kelas ' + value.id) + '</option>');
                                });
                            }
                        });

                        // Load Mata Pelajaran
                        $.ajax({
                            url: '/get-subjects/' + majorID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $('#sub_id').empty().append('<option value="">-- Pilih Mata Pelajaran --</option>');
                                $.each(data, function (key, value) {
                                    $('#sub_id').append('<option value="' + value.id + '">' + (value.nama_mapel ?? value.name ?? 'Mapel ' + value.id) + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#class_id').empty().append('<option value="">-- Pilih Kelas --</option>');
                        $('#sub_id').empty().append('<option value="">-- Pilih Mata Pelajaran --</option>');
                    }
                });
            });
        </script>

@endsection
