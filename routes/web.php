<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

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
    return view('Siswa');
});

Route::resource('/',SiswaController::class);
Route::get('/',[SiswaController::class,'search'])->name('cari');
Route::delete('/{id}', [SiswaController::class,'destroy']);

Route::get('/{id}', [SiswaController::class, 'edit']);
Route::put('/{id}',[SiswaController::class,'update']);
