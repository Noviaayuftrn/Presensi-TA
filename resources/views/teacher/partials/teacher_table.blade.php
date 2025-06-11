@foreach($teachers as $index => $teacher)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $teacher->nip }}</td>
        <td>{{ $teacher->user->nama }}</td>
        <td>{{ $teacher->major->nama_jurusan ?? '' }}</td>
        <td>{{ $teacher->class->nama_kelas ?? '' }}</td>
        <td>
            <a href="{{ route('teacher.edit', $teacher->id) }}">Edit</a>
            <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus?')">
                @csrf
                @method('DELETE')
                <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Hapus</button>
            </form>
        </td>
    </tr>
@endforeach

