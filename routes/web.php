<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ScheduleController as AdminScheduleController;
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

// Admin panel routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function() {
    Route::resource('schedule', AdminScheduleController::class);
    Route::get('/', [LimitlessController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/schedule', [AdminController::class, 'showSchedule'])->name('admin.schedule');
    Route::post('/schedule/update', [AdminController::class, 'updateSchedule'])->name('admin.schedule.update.post');
});

// Normal kullanıcılar için erişilebilir rotalar
Route::middleware('auth')->group(function () {
    Route::get('/schedule', [AdminScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/schedule/create', [AdminScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/schedule', [AdminScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/{id}/edit', [AdminScheduleController::class, 'edit'])->name('schedule.edit');
    Route::put('/schedule/update', [AdminScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/{id}', [AdminScheduleController::class, 'destroy'])->name('schedule.destroy');
});

// Home page route
Route::get('/', function () {
    return view('welcome');
})->name('homepage');

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

    // Catch-all route for any undefined route under authenticated users
    Route::get('/{any}', [LimitlessController::class, 'index'])->where('any', '.*')->name('catchall');

});
