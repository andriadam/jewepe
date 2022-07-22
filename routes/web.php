<?php

use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\AdminScheduleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
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
    return view('home');
})->name('home');

Route::get('course', [CourseController::class, 'index']);

// Login user
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Login admin
Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'authenticate']);
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth'])->group(function () {
    // user dashboard
    Route::get('registration/{course}', [RegistrationController::class, 'create']);
    Route::post('registration/store', [RegistrationController::class, 'store']);
    Route::get('myRegistration', [RegistrationController::class, 'myRegistration']);
    Route::get('registration/cetak/{registration}', [RegistrationController::class, 'generatePDF']);

    // admin dashboard
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('course', AdminCourseController::class);
        Route::put('registrationupdateStatus', [AdminRegistrationController::class, 'updateStatus'])->name('registration.updateStatus');
        Route::resource('registration', AdminRegistrationController::class);
        Route::resource('user', AdminUserController::class);
        Route::resource('schedule', AdminScheduleController::class);
    });
});
