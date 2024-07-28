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
Route::get('halaman-test', [MainController::class, 'test'])->name('halaman-test');
Route::post('/hasil-diagnosa', [MainController::class, 'hasilDiagnosa'])->name('hasil-diagnosa');
Route::get('/list-pasien', [MainController::class, 'listHasil'])->name('list-hasil');
Route::get('/list-gejala-pasien', [MainController::class, 'gejalaPasien'])->name('gejala-pasien');
Route::get('/all-pasien', [MainController::class, 'listPasien'])->name('list-pasien');
Route::get('/gejala-pasien/{id}', [MainController::class, 'gejalaPasien'])->name('gejala-pasien');


