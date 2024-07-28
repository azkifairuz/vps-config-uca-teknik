<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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
    return view('home');
})->name('home');

Route::post('register-user',[MainController::class,'registeruser'])->name('register-user');
Route::get('halaman-test',[MainController::class,'pertanyaan'])->name('halaman-test');
Route::post('jawaban',[MainController::class, 'jawaban'])->name('jawaban');
Route::post('reset-diagnosa', [MainController::class, 'resetDiagnosa'])->name('reset-diagnosa');
Route::get('hasil/{kode_penyakit}',[MainController::class,'hasilDiagnosa'])->name('hasil');
Route::get('list-passien',[MainController::class,'listPasien'])->name('list-hasill');
