<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\TrainingAttendanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MeetingAttendanceController;
use App\Http\Controllers\LimitlessController;


// Normal kullanıcılar için erişilebilir route'lar buraya gelecek
Route::middleware('auth')->group(function () {
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/{id}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::put('/schedule/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
});

// Admin kullanıcılar için erişilebilir route'lar buraya gelecek
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('admin.schedule.index');
    Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('admin.schedule.create');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('admin.schedule.store');
    Route::get('/schedule/{id}/edit', [ScheduleController::class, 'edit'])->name('admin.schedule.edit');
    Route::put('/schedule/{id}', [ScheduleController::class, 'update'])->name('admin.schedule.update');
    Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy'])->name('admin.schedule.destroy');
});

// Home page route
Route::get('/', function () {
    return view('welcome');
})->name('homepage');

// Auth routes (Laravel Auth)
Auth::routes();

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Redirect to home after login
Route::get('/home', [HomeController::class, 'home'])->middleware('auth')->name('home');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::resource('employees', EmployeeController::class);
Route::resource('exams', ExamController::class);
Route::resource('examResults', ExamResultController::class);
Route::resource('trainings', TrainingController::class);
Route::resource('trainingAttendance', TrainingAttendanceController::class);
Route::resource('reports', ReportController::class);
Route::resource('meetings', MeetingController::class);
Route::resource('meetingAttendance', MeetingAttendanceController::class);

// Authenticated user routes
Route::middleware(['auth'])->group(function () {

    // Admin panel routes
    Route::middleware('checkAdmin')->group(function () {
        Route::get('/admin', [LimitlessController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/dashboard', [AdminController::class, 'index']);

        // Education schedule routes
        Route::get('/admin/schedule', [AdminController::class, 'showSchedule'])->name('admin.schedule');
        Route::post('/admin/schedule/update', [AdminController::class, 'updateSchedule'])->name('admin.schedule.update.post'); // İsim değişikliği
    });

    // Catch-all route for any undefined route under authenticated users
    Route::get('/{any}', [LimitlessController::class, 'index'])->where('any', '.*')->name('catchall');
});
