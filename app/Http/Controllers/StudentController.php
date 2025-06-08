<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Classes;

class StudentController extends Controller
{
   public function index()
    {
        $students = Student::with(['user', 'class'])->get();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        $classes = Classes::all(); // Mengambil semua kelas yang ada
        return view('student.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'class_id' => 'required',
            'nisn' => 'required|numeric|unique:students',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
        ]);

        Student::create([
            'user_id' => $user->id,
            'class_id' => $request->class_id,
            'nisn' => $request->nisn,
        ]);

        return redirect()->route('student.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit(Student $student)
    {
        $classes = Classes::all();
        $student->load('user');
        return view('student.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $student->user_id,
            'class_id' => 'required',
            'nisn' => 'required|numeric|unique:students,nisn,' . $student->id,
        ]);

        $student->user->update([
            'nama' => $request->nama,
            'username' => $request->username,
        ]);

        $student->update([
            'class_id' => $request->class_id,
            'nisn' => $request->nisn,
        ]);

        return redirect()->route('student.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(Student $student)
    {
        $student->user->delete(); // akan otomatis menghapus student karena foreign key cascade
        return redirect()->route('student.index')->with('success', 'Data siswa berhasil dihapus');
    } 
}
