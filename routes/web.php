<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/request/create', [App\Http\Controllers\DocumentRequestController::class, 'create'])->middleware('auth');

Route::get('/home/request/create/personal_info/create', [App\Http\Controllers\PersonalInfoController::class, 'create'])->middleware('auth');

Route::post('/home/request/create/personal_info', [App\Http\Controllers\PersonalInfoController::class, 'store'])->middleware('auth');

Route::get('/home/request/create/residence_info/create', [App\Http\Controllers\ResidenceInfoController::class, 'create'])->middleware('auth');

Route::post('/home/request/create/residence_info', [App\Http\Controllers\ResidenceInfoController::class, 'store'])->middleware('auth');

Route::get('/home/request/create/documentValid_info/create', [App\Http\Controllers\DocumentValidInfoController::class, 'create'])->middleware('auth');

Route::post('/home/request/create/documentValid_info', [App\Http\Controllers\DocumentValidInfoController::class, 'store'])->middleware('auth');
