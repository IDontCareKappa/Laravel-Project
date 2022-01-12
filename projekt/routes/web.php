<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('posts');
Route::get('/home', [App\Http\Controllers\PostsController::class, 'index'])->name('posts');
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index'])->name('posts');
Route::get('/posts/latest', [App\Http\Controllers\PostsController::class, 'showPostsAscending'])->name('showPostsAscending');
Route::get('/post/{id}', [App\Http\Controllers\PostsController::class, 'show'])->name('show');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'index'])->name('profile');
    Route::patch('/profile/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::get('/user/posts', [\App\Http\Controllers\PostsController::class, 'showUserPosts'])->name('showUserPosts');
    Route::get('/stats', [\App\Http\Controllers\UserController::class, 'showUserStats'])->name('showUserStats');

    Route::get('/create', [App\Http\Controllers\PostsController::class, 'create'])->name('create');
    Route::post('/create', [App\Http\Controllers\PostsController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [\App\Http\Controllers\PostsController::class, 'destroy'])->name('delete');
    Route::get('/edit/{id}', [\App\Http\Controllers\PostsController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [\App\Http\Controllers\PostsController::class, 'update'])->name('updatepost');
    Route::get('/addGrade/{id}/{grade}', [\App\Http\Controllers\PostsController::class, 'addGrade'])->name('addGrade');

    Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'perform'])->name('logout.perform');
});
