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
Route::get('/student-dashboard', [AuthController::class, 'studentDashboard'])->name('student-dashboard');
Route::post('/student-dashboard/student-profile', [AuthController::class, 'updateStudent'])->name('student-profile-update');
Route::post('/tutor-dashboard/tutor-profile', [AuthController::class, 'updateTutor'])->name('tutor-profile-update');
Route::get('/student-profile', [AuthController::class, 'studentProfile'])->name('student-profile');
Route::get('/tutor-profile', [AuthController::class, 'tutorProfile'])->name('tutor-profile');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/tutor-dashboard', [AuthController::class, 'tutorDashboard'])->name('tutor-dashboard')->middleware(['isTutor']);

Route::get('/tutor_list', function () {
    return view('tutor_list');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


