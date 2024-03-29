<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\StudentCheck;

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
})->name('index');

Route::get('/home', function () {
    return view('index');
})->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');



Route::controller(StudentController::class)->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('/view-student-profile/{student_id}', 'viewStudentProfile')->name('view-student-profile');
        Route::get('/get/thana/{districtID}', 'getThana')->name('get-thana');
        Route::middleware(['isStudent'])->group(function () {
            Route::get('/dashboard', 'studentDashboard')->name('student-dashboard');
            Route::post('/dashboard/student-profile', 'updateStudent')->name('student-profile-update');
            Route::get('/profile', 'studentProfile')->name('student-profile');
            Route::post('/send-mail', 'sendMail')->name('send-mail');
            Route::get('/applied-tutor', 'appliedTutor')->name('applied-tutor');
        });
    });
});

Route::controller(TutorController::class)->group(function () {
    Route::prefix('tutor')->group(function () {
        Route::get('/view-tutor-profile/{tutor_id}', 'viewTutorProfile')->name('view-tutor-profile');
        Route::get('/tutor-list', 'tutorList')->name('tutor-list');
        Route::middleware(['isTutor'])->group(function () {
            Route::get('/dashboard', 'tutorDashboard')->name('tutor-dashboard');
            Route::post('/dashboard/tutor-profile', 'updateTutor')->name('tutor-profile-update');
            Route::get('/profile', 'tutorProfile')->name('tutor-profile');
            Route::get('/messages', 'studentMessage')->name('messages');
            Route::get('/students', 'studentList')->name('student-list');
            Route::post('/request-approval/{student_id}', 'requestApproval')->name('request-approval');
            //Route::get('/get/thana/{districtID}', 'getThana')->name('get-thana');
        });
    });
});

Route::controller(AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'adminLogin')->name('admin-login');
        Route::post('/submit/login', 'adminLoginSubmit')->name('admin-login-submit');
        Route::get('/tutor-req-list', 'tutorReqList')->name('tutor-req-list');
        Route::middleware(['isAdmin'])->group(function () {
            Route::get('/dashboard', 'adminDashboard')->name('admin-dashboard');
            Route::post('/logout', 'adminLogout')->name('admin-logout');
            Route::post('/tutor-request-approval/{tutor_id}', 'turorReqApproval')->name('tutor-request-approval');
            Route::get('/approved-tutors', 'approvedTutors')->name('approved-tutors');
            Route::get('/tutor/change-status/{status}/{tutor_id}', 'changeTutorStatus')->name('change-tutor-status');
        });
    });
});

Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact-submit', [ContactController::class, 'contactSubmit'])->name('contact-submit');




Route::get('/tutor_list', function () {
    return view('tutor_list');
});


