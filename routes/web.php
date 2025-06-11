<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AttendanceController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

Route::resource('student', StudentController::class);
Route::get('/get-classesstudent/{major_id}', [StudentController::class, 'getClassesByMajorstudent'])->name('student.getClassesByMajorstudent');
Route::get('/filter-students', [StudentController::class, 'filterstudent'])->name('student.filterstudent');
Route::resource('teacher', TeacherController::class);
Route::get('/get-classes/{major_id}', [TeacherController::class, 'getClassesByMajor'])->name('teacher.getClassesByMajor');
Route::get('/get-subjects/{major_id}', [TeacherController::class, 'getSubjectsByMajorClass'])->name('teacher.getClassesByMajorClass');
Route::get('/filter-teachers', [TeacherController::class, 'filter'])->name('teacher.filter');
Route::resource('major', MajorController::class);
Route::resource('class', ClassController::class);
Route::resource('subject', SubjectController::class);
Route::get('/get-classes/{major_id}', [SubjectController::class, 'getClassesByMajorSub'])->name('subject.getClassesByMajorSub');
Route::get('/filter-subjects', [SubjectController::class, 'filterSub'])->name('subject.filterSub');
Route::resource('schedule', ScheduleController::class);

Route::get('/attendance/create', [AttendanceController::class, 'showForm'])->name('attendances.create');
Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendances.store');

Route::get('/attendance', [AttendanceController::class, 'viewAll'])->name('attendances.index');
Route::get('/attendance/history/{user_id}', [AttendanceController::class, 'historyView'])->name('attendances.history');

