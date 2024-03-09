<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\TamuController;
use App\Models\Jabatan;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// form jabatan
Route::get('/form_jabatan',[JabatanController::class, 'create']);

//proses tanggap ke jabatan
Route::post('/form_jabatan',[JabatanController::class, 'store'])->name('jabatan.store');

// form jabatan
Route::get('/form_jabatan', function () {
    return view('jabatan.form'); 
});

//Export to pdf
Route::get('jabatanpdf',[JabatanController::class,'jabatanPDF']);

//Export to excel
Route::get('jabatancsv',[JabatanController::class,'jabatancsv']);


// form buku_tamu
Route::get('/form_buku_tamu',[BukuTamuController::class, 'create']);

//proses tanggap ke buku_tamu
Route::post('/form_buku_tamu',[BukuTamuController::class, 'store'])->name('buku_tamu.store');

// form buku_tamu
Route::get('/form_buku_tamu', function () {
    return view('buku_tamu.form'); 
});

//Export to pdf
Route::get('buku_tamupdf',[BukuTamuController::class,'buku_tamuPDF']);

//Export to excel
Route::get('buku_tamucsv',[BukuTamuController::class,'buku_tamucsv']);


// form tamu
Route::get('/form_tamu',[TamuController::class, 'create']);

//proses tanggap ke tamu
Route::post('/form_tamu',[TamuController::class, 'store'])->name('tamu.store');

// form tamu
Route::get('/form_tamu', function () {
    return view('tamu.form'); 
});

//Export to pdf
Route::get('tamupdf',[TamuController::class,'tamuPDF']);

//Export to excel
Route::get('tamucsv',[TamuController::class,'tamucsv']);





Route::resource('jabatan', JabatanController::class)->middleware('auth');

Route::resource('buku_tamu', BukuTamuController::class)->middleware('auth');

Route::resource('tamu', TamuController::class)->middleware('auth');

Route::get('/afterRegister', function(){
    return view('layouts.afterRegister');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', function(){
    return view('layouts.users');
});