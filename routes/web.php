<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PopularPageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterTopicController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\TopicController;
use App\Http\Middleware\AjaxRequestsOnly;
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

//Route::view('post', 'post-mockup');
//Route::view('topic', 'topic-mockup');


// TODO middleware bikin sendiri jangan pakai punya laravel
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterUserController::class, 'create'])->name('register-user');
    Route::post('register', [RegisterUserController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

// TODO middleware bikin sendiri jangan pakai punya laravel
Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('topics/create', [TopicController::class, 'create'])->name('topics.create');
    Route::post('topics', [TopicController::class, 'store'])->name('topics.store');
    Route::put('topics/{topic}', [TopicController::class, 'update'])->name('topics.update');
    Route::delete('topics/{topic}', [TopicController::class, 'destroy'])->name('topics.destroy');

    Route::get('topics/{topic}/posts/create', [PostController::class, 'create'])->name('topics.posts.create');
    Route::post('topics/{topic}/posts', [PostController::class, 'store'])->name('topics.posts.store');
    Route::put('topics/{topic}/posts/{post}', [PostController::class, 'update'])->name('topics.posts.update');
    Route::delete('topics/{topic}/posts/{post}', [PostController::class, 'destroy'])->name('topics.posts.destroy');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('popular', [PopularPageController::class, 'index'])->name('popular');
Route::get('topics', [TopicController::class, 'index'])->name('topics.index');
Route::get('topics/{topic}', [TopicController::class, 'show'])->name('topics.show');
Route::get('topics/{topic}/posts', [PostController::class, 'index'])->name('topics.posts.index');
Route::get('topics/{topic}/posts/{post}', [PostController::class, 'show'])->name('topics.posts.show');

Route::middleware(AjaxRequestsOnly::class)->group(function () {
    Route::post('topics/{topic_id}/follow', [TopicController::class, 'followTopic'])->middleware('auth')->name('topics.follow');
    Route::post('posts/{post}/vote', [PostController::class, 'vote'])->middleware('auth')->name('posts.vote');
});
