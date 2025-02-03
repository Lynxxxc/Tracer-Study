<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniTestimoniController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\AlumniAuthController;
use App\Http\Controllers\ProfileController;
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
});

Route::prefix('admin')->name('admin.')->middleware(CheckAdmin::class)->group(function () {
    // Alumni Routes
    Route::get('alumni/{id_alumni}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');
    Route::put('alumni/{id_alumni}', [AlumniController::class, 'update'])->name('alumni.update');
});
Route::get('admin/alumni/{id_alumni}', [AlumniController::class, 'show'])->name('admin.alumni.show');


// Redirect root URL to /dashboard
Route::get('/', function () {
    return redirect('/dashboard'); // Redirect to the dashboard
});

// route alumni

Route::prefix('')->name('tracerstudy.')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('alumni.dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [TracerStudyController::class, 'dashboard'])->name('dashboard');

    Route::get('/tracer-study/form', [TracerStudyController::class, 'create'])->name('form');
    // Route::get('/register', [TracerStudyController::class, 'create'])->name('register');
    Route::post('/tracer-study', [TracerStudyController::class, 'store'])->name('store');
});
Route::get('/dashboard', [TracerStudyController::class, 'dashboard'])->name('dashboard');

Route::get('dashboard', function() {
    return view('alumni.dashboard');
})->name('welcome');
// Route::get('admin/dashboard', function() {
//     return view('admin.dashboard');
// })->name('home');

Route::get('/tracerstudy/data-diri', [TracerStudyController::class, 'dataDiri'])->name('tracerstudy.data-diri');
Route::post('/tracerstudy/update-profile', [TracerStudyController::class, 'updateProfile'])->name('update-profile');

// Route untuk halaman pengisian testimoni (user)
Route::get('/testimoni', [AlumniTestimoniController::class, 'index'])->middleware('auth')->name('testimoni.index');
Route::get('/testimoni/create', [AlumniTestimoniController::class, 'create'])->middleware('auth')->name('testimoni.create');
Route::post('/testimoni/store', [AlumniTestimoniController::class, 'store'])->middleware('auth')->name('testimoni.store');
Route::get('/testimoni/{id}/edit', [AlumniTestimoniController::class, 'edit'])->middleware('auth')->name('testimoni.edit');
Route::put('/testimoni/{id}', [AlumniTestimoniController::class, 'update'])->middleware('auth')->name('testimoni.update');
Route::delete('/testimoni/{id}', [AlumniTestimoniController::class, 'destroy'])->middleware('auth')->name('testimoni.destroy');
Route::get('/dashboard', [AlumniTestimoniController::class, 'dashboard'])->name('alumni.dashboard');

Route::get('/data_diri', [ProfileController::class, 'show'])->middleware('auth')->name('profile.show');
Route::post('/data_diri/update', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

Route::get('/data-diri', [ProfileController::class, 'dataDiri'])->name('tracerstudy.data_diri');
Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('update_profile');

Auth::routes();  // This will register the login and register routes automatically
