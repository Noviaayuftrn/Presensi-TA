<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Major;
use App\Models\Subject;
use App\Models\Classes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function index($schedule_id)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:hadir,alpa,sakit,izin'
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->status = $request->status;
        $attendance->save();

        return response()->json(['success' => true]);

    }

    public function history()
    {
        // Ambil data presensi terbaru dengan relasi ke user dan jadwal
        $attendances = Attendance::with(['user', 'schedule.class'])
                        ->latest()
                        ->paginate(20); // Bisa diganti sesuai kebutuhan

        $majors = Major::all();    
        $subjects = Subject::all();
        $classes = Classes::all();

        return view('attendance.history', compact('attendances', 'majors', 'subjects', 'classes'));
    }
}