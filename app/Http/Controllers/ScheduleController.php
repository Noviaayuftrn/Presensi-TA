<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Schedule, Major, Classes, Teacher, Subject};

class ScheduleController extends Controller
{
    public function index() {
        $schedules = Schedule::with(['class', 'subject', 'teacher'])->get();
        return view('schedule.index', compact('schedules'));
    }

    public function create() {
        return view('schedule.create', [
            'majors' => Major::all(),
            'classes' => Classes::all(),
            'teachers' => Teacher::all(),
            'subjects' => Subject::all(),
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'major_id' => 'required',
            'class_id' => 'required',
            'teach_id' => 'required',
            'sub_id' => 'required',
            'date' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'status' => 'required|in:open,closed',
        ]);
        Schedule::create($request->all());
        return redirect()->route('schedule.index')->with('success', 'Jadwal dibuat');
    }

    public function edit(Schedule $schedule) {
        return view('schedule.edit', [
            'schedule' => $schedule,
            'majors' => Major::all(),
            'classes' => Classes::all(),
            'teachers' => Teacher::all(),
            'subjects' => Subject::all(),
        ]);
    }

    public function update(Request $request, Schedule $schedule) {
        $request->validate([
            'status' => 'required|in:open,closed'
        ]);
        $schedule->update($request->all());
        return redirect()->route('schedule.index')->with('success', 'Jadwal diupdate');
    }

    public function destroy(Schedule $schedule) {
        $schedule->delete();
        return redirect()->route('schedule.index')->with('success', 'Jadwal dihapus');
    }
}
