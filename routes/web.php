<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TutorController;

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

Route::get('/home', function () {
    return view('index');
})->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');



Route::controller(StudentController::class)->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('/dashboard', 'studentDashboard')->name('student-dashboard');
        Route::post('/dashboard/student-profile', 'updateStudent')->name('student-profile-update');
        Route::get('/profile', 'studentProfile')->name('student-profile');
        Route::get('/view-student-profile/{student_id}', 'viewStudentProfile')->name('view-student-profile');
        Route::get('/get/thana/{districtID}', 'getThana')->name('get-thana');
        Route::post('/send-mail', 'sendMail')->name('send-mail');
    });
});

Route::controller(TutorController::class)->group(function () {
    Route::prefix('tutor')->group(function () {
        Route::get('/dashboard', 'tutorDashboard')->name('tutor-dashboard')->middleware(['isTutor']);
        Route::post('/dashboard/tutor-profile', 'updateTutor')->name('tutor-profile-update');
        Route::get('/profile', 'tutorProfile')->name('tutor-profile')->middleware(['isTutor']);
        Route::get('/view-tutor-profile/{tutor_id}', 'viewTutorProfile')->name('view-tutor-profile');
        Route::get('/tutor-list', 'tutorList')->name('tutor-list');
        Route::get('/messages', 'studentMessage')->name('messages');
        //Route::get('/get/thana/{districtID}', 'getThana')->name('get-thana');
    });
});



Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/tutor_list', function () {
    return view('tutor_list');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
