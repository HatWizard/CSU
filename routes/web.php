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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/request/create', [App\Http\Controllers\DocumentRequestController::class, 'create'])->middleware('auth')->name('request.create');
Route::get('/home/request/{request_id}', [App\Http\Controllers\DocumentRequestController::class, 'index'])->middleware('auth')->name('request');
Route::get('/home/request/{request_id}/store', [App\Http\Controllers\DocumentRequestController::class, 'store'])->middleware('auth')->name('request.store');
Route::get('/home/request/{request_id}/delete', [App\Http\Controllers\DocumentRequestController::class, 'delete'])->middleware('auth')->name('request.delete');

Route::get('/home/request/{request_id}/study_direction/create', [App\Http\Controllers\StudyDirectionController::class, 'create'])->middleware('auth');
Route::post('/home/request/{request_id}/study_direction', [App\Http\Controllers\PersonalInfoController::class, 'store'])->middleware('auth');

Route::get('/home/request/{request_id}/personal_info/create', [App\Http\Controllers\PersonalInfoController::class, 'create'])->middleware('auth');
Route::post('/home/request/{request_id}/personal_info', [App\Http\Controllers\PersonalInfoController::class, 'store'])->middleware('auth');

Route::get('/home/request/{request_id}/residence_info/create', [App\Http\Controllers\ResidenceInfoController::class, 'create'])->middleware('auth');
Route::post('/home/request/{request_id}/residence_info', [App\Http\Controllers\ResidenceInfoController::class, 'store'])->middleware('auth');

Route::get('/home/request/{request_id}/documentValid_info/create', [App\Http\Controllers\DocumentValidInfoController::class, 'create'])->middleware('auth');
Route::post('/home/request/{request_id}/documentValid_info', [App\Http\Controllers\DocumentValidInfoController::class, 'store'])->middleware('auth');

Route::get('/home/request/{request_id}/education_info/create', [App\Http\Controllers\EducationInfoController::class, 'create'])->middleware('auth');
Route::post('/home/request/{request_id}/education_info', [App\Http\Controllers\EducationInfoController::class, 'store'])->middleware('auth');