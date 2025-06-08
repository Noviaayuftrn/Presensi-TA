<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    // Melihat semua presensi
    public function index()
    {
        $attendances = Attendance::with('user')->orderBy('attendance_date', 'desc')->get();
        return response()->json($attendances);
    }

    // Melihat histori presensi per siswa
    public function history($user_id)
    {
        $attendances = Attendance::where('user_id', $user_id)->orderBy('attendance_date', 'desc')->get();
        return response()->json($attendances);
    }

    // Menyimpan presensi
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Sementara belum ada auth
            'status' => 'required|in:present,late,alpha,sakit,izin',
        ]);

        $user_id = $request->user_id;
        $today = Carbon::today()->toDateString();

        // Cek apakah sudah presensi hari ini
        $alreadyExists = Attendance::where('user_id', $user_id)
            ->where('attendance_date', $today)
            ->exists();

        if ($alreadyExists) {
            return response()->json([
                'message' => 'Anda sudah melakukan presensi hari ini.'
            ], 400);
        }

        // Simpan presensi
        $attendance = Attendance::create([
            'user_id' => $user_id,
            'attendance_date' => $today,
            'check_in_time' => Carbon::now()->format('H:i:s'),
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Presensi berhasil dicatat.',
            'data' => $attendance
        ], 201);
    }

    public function showForm()
    {
        $users = User::where('role', 'siswa')->get();
        return view('attendance.create', compact('users'));
    }
    
    public function viewAll()
    {
        $attendances = Attendance::with('user')->orderBy('attendance_date', 'desc')->get();
        return view('attendance.index', compact('attendances'));
    }
}
