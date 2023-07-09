<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
    return view('pages.login');
})->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'userLogin']);
Route::get('/register', [AuthController::class, 'Register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'userRegister']);
Route::get('/verification', [AuthController::class, 'verification'])->middleware('auth');
Route::post('/verification', [AuthController::class, 'testVerification'])->middleware('auth');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');