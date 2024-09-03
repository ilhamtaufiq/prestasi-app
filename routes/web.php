<?php

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NonAkademikController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RapotController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliKelasController;
use App\Models\Akademik;
use App\Models\NonAkademik;
use App\Models\Rapot;
use App\Models\Siswa;
use App\Models\WaliKelas;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/waliKelas', [WaliKelasController::class, 'index'])->name('walikelas.index');
    Route::get('/waliKelas/create', [WaliKelasController::class, 'create'])->name('walikelas.create');
    Route::post('/waliKelas', [WaliKelasController::class, 'store'])->name('walikelas.store');
    Route::get('/waliKelas/{id}/edit', [WaliKelasController::class, 'edit'])->name('walikelas.edit');
    Route::match(['put', 'patch'], '/waliKelas/{id}', [WaliKelasController::class, 'update'])->name('walikelas.update');
    Route::delete('/waliKelas/{id}', [WaliKelasController::class, 'destroy'])->name('walikelas.destroy');

    route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::match(['put', 'patch'], '/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('/filter', [SiswaController::class, 'filter'])->name('siswa.filter');
    Route::get('/siswa/{nis}', [SiswaController::class, 'show']);
    Route::get('/searchSiswa', [SiswaController::class, 'searchSiswa'])->name('searchSiswa');


    route::get('/rapot', [RapotController::class, 'index'])->name('rapot.index');
    route::get('/rapot/create', [RapotController::class, 'create'])->name('rapot.create');
    Route::post('/rapot', [RapotController::class, 'store'])->name('rapot.store');
    Route::get('/rapot/{id}/edit', [RapotController::class, 'edit'])->name('rapot.edit');
    Route::get('getrapot/{id_siswa}', function ($id_siswa) {
        $rapot = App\Models\Rapot::where('id_siswa',$id_siswa)->get();
        $nilai = $rapot->sum('nilai_pengetahuan') + $rapot->sum('nilai_keterampilan');
        return response()->json($nilai);
    });
    // Route::match(['put', 'patch'], '/rapot/{id}', [RapotController::class, 'update'])->name('rapot.update');
    // Route::delete('/rapot/{id}', [RapotController::class, 'destroy'])->name('rapot.destroy');

    // routes/web.php

    route::get('/akademik', [AkademikController::class, 'index'])->name('akademik.index');
    route::get('/akademik/create', [AkademikController::class, 'create'])->name('akademik.create');
    Route::post('/akademik', [AkademikController::class, 'store'])->name('akademik.store');
    Route::get('/akademik/{id}/edit', [AkademikController::class, 'edit'])->name('akademik.edit');
    Route::match(['put', 'patch'], '/akademik/{id}', [AkademikController::class, 'update'])->name('akademik.update');
    Route::delete('/akademik/{id}', [AkademikController::class, 'destroy'])->name('akademik.destroy');
    Route::get('/akademik/print', [AkademikController::class, 'print'])->name('akademik.print');

    route::get('/nonakademik', [NonAkademikController::class, 'index'])->name('nonakademik.index');
    route::get('/nonakademik/create', [NonAkademikController::class, 'create'])->name('nonakademik.create');
    Route::post('/nonakademik', [NonAkademikController::class, 'store'])->name('nonakademik.store');
    Route::get('/nonakademik/{id}/edit', [NonAkademikController::class, 'edit'])->name('nonakademik.edit');
    Route::match(['put', 'patch'], '/nonakademik/{id}', [NonAkademikController::class, 'update'])->name('nonakademik.update');
    Route::delete('/nonakademik/{id}', [NonAkademikController::class, 'destroy'])->name('nonakademik.destroy');
    Route::get('/nonakademik/print', [NonAkademikController::class, 'print'])->name('nonakademik.print');

});


require __DIR__ . '/auth.php';
