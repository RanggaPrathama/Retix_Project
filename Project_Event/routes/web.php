<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetilEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\VerificationController;
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

//COBA
Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/register', function () {
    return view('pages.register');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',function(){
    return view('pages.admin.home');
})->name('admin.index');

Route::get('/user',function(){
    return view('pages.admin.table.user');
})->name('user.index');


//User LUR

//Login && Register
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'register_post']);
// route::get('/email/verify',[VerificationController::class,'notice'])->middleware('auth')->name('verification.notice'); //ke p
// Route::get('/email/verify/{id}/{hash}',[VerificationController::class,'verify'])->middleware('auth','signed')->name('verification.verify');
// Route::get('/email/verify/resend-verification',[VerificationController::class,'send'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/verifyaccount',[HomeController::class,'verifotp'])->name('verifyaccount');
Route::post('/verifotp',[HomeController::class,'useractivation'])->name('useractivation');

// ADMIN LUR

//TABLE

//KATEGORI

Route::get('/kategori',[KategoriController::class,'index'])->name('kategori.index');
Route::get('/kategori/create',[KategoriController::class,'create'])->name('kategori.create');
Route::post('/kategori/create',[KategoriController::class,'store'])->name('kategori.store');
Route::get('/kategori/edit/{slug}',[KategoriController::class,'edit'])->name('kategori.edit');
Route::put('/kategori/edit/{slug}',[KategoriController::class,'update'])->name('kategori.update');
Route::delete('/kategori/delete/{slug}',[KategoriController::class,'destroy'])->name('kategori.destroy');

//KECAMATAN

Route::get('/kecamatan',[KecamatanController::class,'index'])->name('kecamatan.index');
Route::get('/kecamatan/create',[KecamatanController::class,'create'])->name('kecamatan.create');
Route::post('/kecamatan/store',[KecamatanController::class,'store'])->name('kecamatan.store');
Route::get('/kecamatan/edit/{id}',[KecamatanController::class,'edit'])->name('kecamatan.edit');
Route::put('/kecamatan/edit/{id}',[KecamatanController::class,'update'])->name('kecamatan.update');
Route::delete('/kecamatan/delete/{id}',[KecamatanController::class,'destroy'])->name('kecamatan.delete');

//LOKASI

Route::get('/lokasi/index',[LokasiController::class,'index'])->name('lokasi.index');
Route::get('/lokasi/create',[LokasiController::class,'create'])->name('lokasi.create');
Route::post('/lokasi/store',[LokasiController::class,'store'])->name('lokasi.store');
Route::get('/lokasi/edit/{id}',[LokasiController::class,'edit'])->name('lokasi.edit');
Route::put('/lokasi/edit/{id}',[LokasiController::class,'update'])->name('lokasi.update');
Route::delete('lokasi/destroy/{id}',[LokasiController::class,'destroy'])->name('lokasi.destroy');

//EVENT
Route::get('/event/index',[EventController::class,'index'])->name('event.index');
Route::get('/event/create',[EventController::class,'create'])->name('event.create');
Route::post('/event/store',[EventController::class,'store'])->name('event.store');
Route::get('/event/edit/{slug}',[EventController::class,'edit'])->name('event.edit');
Route::put('/event/edit/{slug}',[EventController::class,'update'])->name('event.update');
Route::delete('/events/delete/{id}',[EventController::class,'destroy'])->name('event.destroy');

// Coba Lokasi
Route::get('/event/provinsi',[EventController::class,'provinsi'])->name('pilihProvinsi');
Route::get('/event/kota/{id}',[EventController::class,'kota'])->name('event.kota');
Route::get('/event/kecamatan/{id}',[EventController::class,'kecamatan'])->name('event.kecamatan');

//DETAIL EVENT
Route::get('/detilEvent/index',[DetilEventController::class,'index'])->name('detilevent.index');
Route::get('/detilEvent/create',[DetilEventController::class,'create'])->name('detilevent.create');
Route::post('/detilEvent/store',[DetilEventController::class,'store'])->name('detilevent.store');
Route::get('/detilEvent/edit/{id}',[DetilEventController::class,'edit'])->name('detilevent.edit');
Route::put('/detilEvent/update/{id}',[DetilEventController::class,'update'])->name('detilevent.update');
Route::delete('/detilEvent/destroy/{id}',[DetilEventController::class,'destroy'])->name('detilevent.destroy');
