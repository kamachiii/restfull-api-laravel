<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[SiswaController::class,'index'])->name('index');
Route::get('/create',[SiswaController::class,'create']);
Route::post('/create/send',[SiswaController::class,'store'])->name('send');
Route::get('/show/{id}',[SiswaController::class, 'show'])->name('show');
Route::post('/update/{id}',[SiswaController::class, 'update'])->name('update');
Route::post('/delet/{id}',[SiswaController::class, 'destroy'])->name('delete');
