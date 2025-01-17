<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\AlumniAuthController;
use App\Http\Controllers\TracerStudyController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\admin\TestimoniController;
use App\Http\Controllers\admin\TahunLulusController;
use App\Http\Controllers\admin\TracerKerjaController;
use App\Http\Controllers\admin\StatusAlumniController;
use App\Http\Controllers\admin\TracerKuliahController;
use App\Http\Controllers\admin\BidangKeahlianController;
use App\Http\Controllers\admin\ProgramKeahlianController;
use App\Http\Controllers\admin\KonsentrasiKeahlianController;



// Route untuk admin login (di luar grup admin)
Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login'); // Menampilkan form login
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.submit'); // Memproses login

Route::prefix('admin')->name('admin.')->middleware('check.admin')->group(function () {
    // Route untuk Dashboard Admin
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Alumni Routesa
    Route::resource('alumni', AlumniController::class);

    // Konsentrasi Keahlian Routes
    Route::resource('konsentrasi-keahlian', KonsentrasiKeahlianController::class);

    // Bidang Keahlian Routes
    Route::resource('bidang-keahlian', BidangKeahlianController::class);

    // Program Keahlian Routes
    Route::resource('program-keahlian', ProgramKeahlianController::class);

    // Tahun Lulus Routes
    Route::resource('tahun_lulus', TahunLulusController::class);

    // Status Alumni Routes
    Route::resource('status-alumni', StatusAlumniController::class);

    // Route Tracer Kuliah
    Route::resource('tracer-kuliah', TracerKuliahController::class);

    // Route Tracer Kerja
    Route::resource('tracer-kerja', TracerKerjaController::class);

    // Route Testimoni
    Route::resource('testimoni', TestimoniController::class);

    // Route Sekolah
    Route::resource('sekolah', SekolahController::class);

    // Route untuk mengelola program keahlian berdasarkan bidang keahlian
    Route::get('bidang-keahlian/{id}/manage-programs', [BidangKeahlianController::class, 'managePrograms'])->name('bidang-keahlian.managePrograms');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->name('admin.')->middleware(CheckAdmin::class)->group(function () {
    // Alumni Routes
    Route::get('alumni/{id_alumni}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');
    Route::put('alumni/{id_alumni}', [AlumniController::class, 'update'])->name('alumni.update');
});

// route alumni


Route::prefix('')->name('tracerstudy.')->group(function () {
    Route::get('tracer-study/login', [AlumniAuthController::class, 'showLoginForm'])->name('loginForm');
    Route::post('tracer-study/login', [AlumniAuthController::class, 'login'])->name('login.post');
    Route::post('tracer-study/logout', function () {
        Auth::logout();
        return redirect('/dashboard');
    })->name('logout');

    Route::get('/dashboard', function () {
        return view('alumni.dashboard');
    })->name('dashboard');

    // Middleware untuk alumni
    // Route::middleware('check.alumni')->group(function () {
    // });

    Route::get('/tracer-study/form', [TracerStudyController::class, 'create'])->name('form');
    // Route::get('/register', [TracerStudyController::class, 'create'])->name('register');
    Route::post('/tracer-study', [TracerStudyController::class, 'store'])->name('store');
});

Route::get('dashbaord', function() {
    return view('alumni.dashboard');
})->name('welcome');
// Route::get('admin/dashboard', function() {
//     return view('admin.dashboard');
// })->name('home');


Auth::routes();  // This will register the login and register routes automatically
