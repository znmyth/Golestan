<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\TeacherAuthenticatedSessionController;
use App\Http\Controllers\Auth\StudentAuthenticatedSessionController;
use App\Http\Middleware\SetLocale;

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('change', [LanguageController::class, 'change'])->name("lang.change");

    // مسیر تغییر زبان
    Route::get('/language/{locale}', function ($locale) {
        Session::put('locale', $locale);
        return redirect()->back();
    })->name('language.change');
    
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

    // مسیر لاگین و ثبت‌نام دانشجو
    Route::get('/login/student', [StudentAuthenticatedSessionController::class, 'create'])->name('student.login');
    Route::post('/login/student', [StudentAuthenticatedSessionController::class, 'store'])->name('student.login');

    // مسیر ثبت‌نام معلم
    Route::get('/register/teacher', [RegisteredUserController::class, 'create'])->name('register.teacher');
    Route::post('/register/teacher', [RegisteredUserController::class, 'store'])->name('register.teacher');

    // مسیر لاگین معلم
    Route::get('/login/teacher', [TeacherAuthenticatedSessionController::class, 'create'])->name('login.teacher');
    Route::post('/login/teacher', [TeacherAuthenticatedSessionController::class, 'store'])->name('login.teacher');

    Route::get('/teacher_dashboard', [TeacherDashboardController::class, 'index'])->name('teacher_dashboard')->middleware('auth');
});



require __DIR__.'/auth.php';
