<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FollowsController;

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


require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {


  Route::get('top', [PostsController::class, 'index'])->name('top');


  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::get('profile/{id}', [ProfileController::class, 'profile']);

  Route::get('search', [UsersController::class, 'index']);

  Route::get('follow-list', [FollowsController::class, 'followList']);
  Route::get('follower-list', [FollowsController::class, 'followerList']);

  Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
  });

  Route::get('/search', [UsersController::class, 'index']);

  Route::post('/post/create', [PostsController::class, 'postCreate']);

  Route::post('/post/update', [PostsController::class, 'postUpdate']);

  Route::get('/post/{id}/delete', [PostsController::class, 'postDelete']);

  Route::get('/search', [UsersController::class, 'index']);

  Route::post('/follow', [FollowsController::class, 'follow'])->name('follow');

  Route::post('/unfollow', [FollowsController::class, 'unfollow'])->name('unfollow');
});

Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::get('register', [RegisteredUserController::class, 'create']);
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('added', [RegisteredUserController::class, 'added']);
Route::post('added', [RegisteredUserController::class, 'added']);
