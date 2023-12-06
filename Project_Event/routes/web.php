<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetilEventController;
use App\Http\Controllers\DetilPemesananController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\VerificationController;
use App\Models\Pemesanan;
use App\Models\Provinsi;
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


// Route::get('/', function () {
//     return view('welcome')




////////////////////////////////////////////////////// PAGE USER /////////////////////////////////////////////////////////////

//Login && Register
Route::get('/', [HomeController::class, 'homepage'])->name('home');


//Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_post'])->name('autentifikasi');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register_post']);
    Route::get('/verifikasiakun', [AuthController::class, 'verifikasi'])->name('verifyaccount');
    Route::post('/verifikasiakun', [AuthController::class, 'verifikasi_post'])->name('useractivation');

//});


//Route::middleware('auth')->group(function(){
Route::get('/events/{slug}', [HomeController::class,'event'])->name('event');
Route::post('/pesan', [PemesananController::class, 'store'])->name('pemesanan');
Route::get('/checkout/{slug}',[PemesananController::class,'index']);
Route::get('/riwayatpemesanan', [PembayaranController::class, 'riwayatPemesanan'])->name('riwayatpesan');
Route::get('/detilpemesanan/{slug}', [DetilpemesananController::class, 'detailRiwayat'])->name('detilpesan');
Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/profile/update/{id}',[UserController::class,'profileupdate'])->name('profileupdate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::delete('/deletePemesanan/{slug}',[PemesananController::class,'deletePemesanan']);

// Route::get('/checkout',[PemesananController::class,'index']);


Route::get('/bayar/{slug}',[PembayaranController::class,'index'])->name('membayar');


Route::get('/checkout/{slug}',[PemesananController::class,'index']);
Route::put('/checkout/{slug}',[PemesananController::class,'checkout']);

Route::put('/batal/{slug}',[PembayaranController::class,'batal']);

Route::post('/payment/{slug}',[PembayaranController::class,'payment'])->name('bayar');



//////////////////////        PAGE ADMIN     //////////////////////////////////////////////////

Route::get('/adminDashboard', [HomeController::class, 'homeAdmin'])->name('admin.home');
//TABLE


//USER
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{slug}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/edit/{slug}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete/{slug}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('user/upgrade/{id}', [UserController::class, 'upgrade'])->name('user.upgrade');
Route::put('user/down/{id}', [UserController::class, 'down'])->name('user.down');




//KATEGORI
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/create', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/edit/{slug}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/edit/{slug}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/delete/{slug}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

//KECAMATAN

Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
Route::get('/kecamatan/create', [KecamatanController::class, 'create'])->name('kecamatan.create');
Route::post('/kecamatan/store', [KecamatanController::class, 'store'])->name('kecamatan.store');
Route::get('/kecamatan/edit/{id}', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
Route::put('/kecamatan/edit/{id}', [KecamatanController::class, 'update'])->name('kecamatan.update');
Route::delete('/kecamatan/destroy/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');

//PROVINSI

Route::get('/provinsi/index', [ProvinsiController::class, 'index'])->name('provinsi.index');
Route::get('/provinsi/create', [ProvinsiController::class, 'create'])->name('provinsi.create');
Route::post('/provinsi/store', [ProvinsiController::class, 'store'])->name('provinsi.store');
Route::get('/provinsi/edit/{id}', [ProvinsiController::class, 'edit'])->name('provinsi.edit');
Route::put('/provinsi/edit/{id}', [ProvinsiController::class, 'update'])->name('provinsi.update');
Route::delete('provinsi/destroy/{id}', [ProvinsiController::class, 'destroy'])->name('provinsi.destroy');

//KOTA
Route::get('/kota/index', [KotaController::class, 'index'])->name('kota.index');
Route::get('/kota/create', [KotaController::class, 'create'])->name('kota.create');
Route::post('/kota/store', [KotaController::class, 'store'])->name('kota.store');
Route::get('/kota/edit/{id}', [KotaController::class, 'edit'])->name('kota.edit');
Route::put('/kota/edit/{id}', [KotaController::class, 'update'])->name('kota.update');
Route::delete('kota/destroy/{id}', [KotaController::class, 'destroy'])->name('kota.destroy');


//EVENT
Route::get('/event/index', [EventController::class, 'index'])->name('event.index');
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('/event/edit/{slug}', [EventController::class, 'edit'])->name('event.edit');
Route::put('/event/edit/{slug}', [EventController::class, 'update'])->name('event.update');
Route::delete('/events/delete/{id}', [EventController::class, 'destroy'])->name('event.destroy');

// Coba Lokasi
Route::get('/event/provinsi', [EventController::class, 'provinsi'])->name('pilihProvinsi');
Route::get('/event/kota/{id}', [EventController::class, 'kota'])->name('event.kota');
Route::get('/event/kecamatan/{id}', [EventController::class, 'kecamatan'])->name('event.kecamatan');

//DETAIL EVENT
Route::get('/detilEvent/index', [DetilEventController::class, 'index'])->name('detilevent.index');
Route::get('/detilEvent/create', [DetilEventController::class, 'create'])->name('detilevent.create');
Route::post('/detilEvent/store', [DetilEventController::class, 'store'])->name('detilevent.store');
Route::get('/detilEvent/edit/{slug}', [DetilEventController::class, 'edit'])->name('detilevent.edit');
Route::put('/detilEvent/update/{slug}', [DetilEventController::class, 'update'])->name('detilevent.update');
Route::delete('/detilEvent/destroy/{slug}', [DetilEventController::class, 'destroy'])->name('detilevent.destroy');
//});


// PAYMENTS
Route::get('/payments',[PaymentsController::class,'index'])->name('payment.index');
Route::get('/payments/create',[PaymentsController::class,'create'])->name('payment.create');
Route::post('/payments/store',[PaymentsController::class,'store'])->name('payment.store');
Route::get('/payments/edit/{slug}',[PaymentsController::class,'edit'])->name('payment.edit');
Route::put('/payments/update/{slug}',[PaymentsController::class,'update'])->name('payment.update');
Route::delete('/payments/delete/{slug}',[PaymentsController::class,'destroy'])->name('payment.destroy');


//PEMESANAN & DETIL PEMESANAN

// Route::get('/pemesanan',[DetilPemesananController::class,' indexPemesanan'])->name('pemesanan.index');
Route::get('/detilpemesanan',[DetilPemesananController::class,'index'])->name('detilPemesanan.index');
Route::delete('/pemesanan/destroy',[PemesananController::class,'destroy'])->name('pemesanan.destroy');
Route::delete('detilpesan/destroy',[DetilPemesananController::class,'destroy'])->name('detilpesan.destroy');

//PEMBAYARAN
Route::get('/pembayaran',[PembayaranController::class,'indexAdmin'])->name('pembayaran.index');
Route::put('/pembayaran/acc/{slug}',[PembayaranController::class,'acc'])->name('bayar.acc');
Route::put('/pembayaran/tolak/{slug}',[PembayaranController::class,'tolak'])->name('bayar.tolak');
