<?php

use App\Http\Controllers\DetilEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\LokasiController;
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
    return view('welcome');
});

Route::get('/admin',function(){
    return view('pages.admin.home');
})->name('admin.index');

Route::get('/user',function(){
    return view('pages.admin.table.user');
})->name('user.index');


// ADMIN LUR

//TABLE

//KATEGORI

Route::get('/kategori',[KategoriController::class,'index'])->name('kategori.index');
Route::get('/kategori/create',[KategoriController::class,'create'])->name('kategori.create');
Route::post('/kategori/create',[KategoriController::class,'store'])->name('kategori.store');
Route::get('/kategori/edit/{id}',[KategoriController::class,'edit'])->name('kategori.edit');
Route::put('/kategori/edit/{id}',[KategoriController::class,'update'])->name('kategori.update');
Route::delete('/kategori/delete/{id}',[KategoriController::class,'destroy'])->name('kategori.destroy');

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
Route::get('/event/edit/{id}',[EventController::class,'edit'])->name('event.edit');
Route::put('/event/edit/{id}',[EventController::class,'update'])->name('event.update');
Route::delete('/events/delete/{id}',[EventController::class,'destroy'])->name('event.destroy');

//DETAIL EVENT
Route::get('/detilEvent/index',[DetilEventController::class,'index'])->name('detilevent.index');
