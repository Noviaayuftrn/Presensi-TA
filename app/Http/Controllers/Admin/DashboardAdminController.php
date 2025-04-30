<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardAdminController extends Controller
{
    public function index() : View
    {
        $totalGuru = 10;
        $totalSiswa = 120;
        $totalMapel = 8;

        return view('admin.dashboard', compact('totalGuru', 'totalSiswa', 'totalMapel'));
    }
}
