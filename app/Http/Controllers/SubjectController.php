<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\major;
use App\Models\Subject; 

class SubjectController extends Controller
{
     public function index() {
        $subjects = Subject::with('major')->get();
        return view('subject.index', compact('subjects'));
    }

    public function create() {
        $majors = Major::all();
        return view('subject.create', compact('majors'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_mapel' => 'required',
            'major_id' => 'required|exists:majors,id',
        ]);
        Subject::create($request->only('nama_mapel', 'major_id'));
        return redirect()->route('subject.index')->with('success', 'Mapel ditambahkan');
    }

    public function edit(Subject $subject) {
        $majors = Major::all();
        return view('subject.edit', compact('subject', 'majors'));
    }

    public function update(Request $request, Subject $subject) {
        $request->validate([
            'nama_mapel' => 'required',
            'major_id' => 'required|exists:majors,id',
        ]);
        $subject->update($request->only('nama_mapel', 'major_id'));
        return redirect()->route('subject.index')->with('success', 'Mapel diupdate');
    }

    public function destroy(Subject $subject) {
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'Mapel dihapus');
    }
}
