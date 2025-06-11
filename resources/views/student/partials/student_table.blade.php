@foreach($students as $index => $student)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $student->nisn }}</td>
                    <td>{{ $student->user->nama }}</td>
                    <td>{{ $student->user->username }}</td>
                    <td>{{ $student->major->nama_jurusan }}</td>
                    <td>{{ $student->class->nama_kelas }}</td>
                    <td>
                        <a href="{{ route('student.edit', $student->id) }}">Edit</a>
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach