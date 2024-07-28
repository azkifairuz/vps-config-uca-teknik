<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PertanyaanController;
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
});
Route::get('pertanyaan/{id}',[PertanyaanController::class,'showPertanyaan'])->name('pertanyaan');
Route::post('pertanyaan/{id}/jawab', [PertanyaanController::class, 'jawabPertanyaan'])->name('pertanyaan.jawab');
Route::get('/hasil', [PertanyaanController::class, 'hasil'])->name('hasil');

Route::get('mulai-test', [PertanyaanController::class, 'mulaiTes'])->name('mulaiTes');