<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('index');
    
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::get('/tutor_registration', [AuthController::class, 'tutorRegistration'])->name('tutor_registration');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');

Route::get('/tutor_list', function () {
    return view('tutor_list');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

