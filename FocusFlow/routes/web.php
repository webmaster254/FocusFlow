<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class,'login']);

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::get('/signup', [AuthController::class,'signup']);
Route::get('/forgot-password', [AuthController::class,'forgotPassword']);
Route::get('/password-reset', [AuthController::class,'passwordReset']);
