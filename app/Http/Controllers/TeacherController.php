<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('user')->get();
        return view('teacher.index', compact('teachers'));
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'nip' => 'required|numeric|unique:teachers',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        Teacher::create([
            'user_id' => $user->id,
            'nip' => $request->nip,
        ]);

        return redirect()->route('teacher.index')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function edit(Teacher $teacher)
    {
        $teacher->load('user');
        return view('teacher.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $teacher->user_id,
            'nip' => 'required|numeric|unique:teachers,nip,' . $teacher->id,
        ]);

        $teacher->user->update([
            'nama' => $request->nama,
            'username' => $request->username,
        ]);

        $teacher->update([
            'nip' => $request->nip,
        ]);

        return redirect()->route('teacher.index')->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->user->delete();
        return redirect()->route('teacher.index')->with('success', 'Data guru berhasil dihapus');
    }
}
