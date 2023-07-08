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
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'Login']);
Route::post('/login', [AuthController::class, 'userLogin']);
Route::get('/register', [AuthController::class, 'Register']);
Route::post('/register', [AuthController::class, 'userRegister']);
Route::get('/barcode', [AuthController::class, 'barcode']);
Route::get('/verification', [AuthController::class, 'verification']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);