<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExplorePageController;
use App\Http\Controllers\PopularPageController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\DirectMessageController;
use App\Http\Controllers\TopicController;
use App\Http\Middleware\AjaxRequestsOnly;
use App\Http\Middleware\GuestOnly;
use App\Http\Middleware\UserOnly;
use App\Models\DirectMessage;
use App\Http\Controllers\NotificationController;
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


Route::middleware(GuestOnly::class)->group(function () {
    Route::get('register', [RegisterUserController::class, 'create'])->name('register-user');
    Route::post('register', [RegisterUserController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(UserOnly::class)->group(function () {
    Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('topics/create', [TopicController::class, 'create'])->name('topics.create');
    Route::post('topics', [TopicController::class, 'store'])->name('topics.store');
    Route::put('topics/{topic}', [TopicController::class, 'update'])->name('topics.update');
    Route::delete('topics/{topic}', [TopicController::class, 'destroy'])->name('topics.destroy');

    Route::get('topics/{topic}/posts/create', [PostController::class, 'create'])->name('topics.posts.create');
    Route::post('topics/{topic}/posts', [PostController::class, 'store'])->name('topics.posts.store');
    Route::put('topics/{topic}/posts/{post}', [PostController::class, 'update'])->name('topics.posts.update');
    Route::delete('topics/{topic}/posts/{post}', [PostController::class, 'destroy'])->name('topics.posts.destroy');

    Route::post('topics/{topic}/posts/{post}/comments', [PostCommentController::class, 'store'])->name('topics.posts.comments.store');
    Route::delete('topics/{topic}/posts/{post}/comments/{comment}', [PostCommentController::class, 'destroy'])->name('topics.posts.comments.destroy');

    Route::get('messages', [DirectMessageController::class, 'dmMenu'])->name('messages.menu');
    Route::get('messages/start', [DirectMessageController::class, 'startConversation'])->name('messages.start');
    Route::get('messages/{user}', [DirectMessageController::class, 'index'])->name('messages.index');
    Route::post('messages/{user}', [DirectMessageController::class, 'store'])->name('messages.store');

    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/redirect/{type}/{id}', [NotificationController::class, 'redirect'])->name('notifications.redirect');


    Route::post('posts/{post}/vote', [PostController::class, 'vote'])->name('posts.vote');
    Route::post('/topics/{topic}/ban-user', [\App\Http\Controllers\TopicBanController::class, 'banUser'])->name('topics.ban-user');

});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('popular', [PopularPageController::class, 'index'])->name('popular');
Route::get('explore', [ExplorePageController::class, 'index'])->name('explore');
Route::get('topics', [TopicController::class, 'index'])->name('topics.index');
Route::get('topics/{topic}', [TopicController::class, 'show'])->name('topics.show');
Route::get('topics/{topic}/posts', [PostController::class, 'index'])->name('topics.posts.index');
Route::get('topics/{topic}/posts/{post}', [PostController::class, 'show'])->name('topics.posts.show');
Route::get('topics/{topic}/posts/{post}/comments/{comment}', [PostCommentController::class, 'show'])->name('topics.posts.comments.show');
Route::post('topics/{topic}/posts/{post}/comments/{comment}/mark-answer', [PostCommentController::class, 'markAsAnswer'])->name('topics.posts.comments.mark-answer');


Route::middleware(AjaxRequestsOnly::class)->group(function () {
    Route::post('topics/{topic_id}/follow', [TopicController::class, 'followTopic'])->middleware(UserOnly::class)->name('topics.follow');
    Route::post('posts/{post}/vote', [PostController::class, 'vote'])->middleware(UserOnly::class)->name('posts.vote');
    Route::post('/report/post/{postId}', [ReportController::class, 'reportPost'])->middleware(UserOnly::class)->name('report.post');
    Route::post('/report/comment/{commentId}', [ReportController::class, 'reportComment'])->middleware(UserOnly::class)->name('report.comment');
    Route::post('/topic/{topic}/ban-user', [TopicBanController::class, 'banUser'])->middleware(UserOnly::class)->name('topics.ban.user');
    Route::post('/topics/{topic}/ban/{user}', [\App\Http\Controllers\TopicBanController::class, 'ban'])->middleware(UserOnly::class)->name('topics.ban');
    Route::post('/topics/{topic}/unban/{user}', [TopicBanController::class, 'unban'])->name('topics.unban');
});
