<?php

use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthenticatedSessionController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{news:slug}', [NewsController::class, 'single'])->name('singlenews');
Route::get('/writerprofile', [WriterController::class, 'index'])->name('writerprofile');
Route::get('/writerprofile/{users:username}', [WriterController::class, 'username'])->name('writerprofile');

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login/action', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/edit_news', [NewsController::class, 'editNews'])->name('edit_news');
    Route::get('/makenews', [NewsController::class, 'makeNews'])->name('makenews');
    Route::post('/makenews/action', [NewsController::class, 'actionmakenews'])->name('actionmakenews');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

Route::get('/edit_news', [NewsController::class, 'editNews'])->name('edit_news')->middleware('auth');
Route::get('/makenews', [NewsController::class, 'makenews'])->name('makenews')->middleware('auth');
Route::post('/makenews/action', [NewsController::class, 'actionmakenews'])->name('actionmakenews')->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');

Route::post('/profile/action', [NewsController::class, 'actiondeletenews'])->name('actiondeletenews')->middleware('auth');




