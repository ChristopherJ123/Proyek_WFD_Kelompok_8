<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterTopicController;
use App\Http\Controllers\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::get('dashboard', [DashboardController::class, 'create']);

Route::view('post', 'post-mockup');
Route::view('topic', 'topic-mockup');
Route::view('register-post', 'register-post-mockup');
Route::get('register-topic', [RegisterTopicController::class, 'create']);

// TODO middleware bikin sendiri jangan pakai punya laravel
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterUserController::class, 'create'])
        ->name('register-user');
    Route::post('register', [RegisterUserController::class, 'store'])
        ->name('register.store');

    Route::get('login', [LoginController::class, 'create'])
        ->name('login');
    Route::post('login', [LoginController::class, 'post'])
        ->name('login.store');
});


require __DIR__.'/auth.php';
