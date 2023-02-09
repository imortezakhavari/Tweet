<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserPostController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'signIn']);

// logout
Route::post('/logout', [LogoutController::class, 'signOut'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// show,create and delete posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// likes and dislikes
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes')->middleware('auth');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes')->middleware('auth');

Route::get('/users/{user:name}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::get('/', function () {
    return view('home');
})->name('home');
