<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DataJsonController;
use App\Http\Controllers\SesiController;
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

Route::get('/', [SesiController::class, 'index']);
Route::post('/', [SesiController::class, 'login']);
Route::get('/logout', [SesiController::class, 'logout']);

Route::resource('member', MemberController::class);
Route::get('data/json', [DataJsonController::class, 'member']);

// Route::get('/admin', [AdminController::class, 'index']);
Route::resource('admin', AdminController::class);
