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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('posts');

Auth::routes();

Route::get('/home', [App\Http\Controllers\PostsController::class, 'index'])->name('posts');
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index'])->name('posts');
Route::get('/post/{id}', [App\Http\Controllers\PostsController::class, 'show'])->name('show');
Route::get('/create', [App\Http\Controllers\PostsController::class, 'create'])->name('create');
Route::post('/create', [App\Http\Controllers\PostsController::class, 'store'])->name('store');
Route::get('/delete/{id}', [\App\Http\Controllers\PostsController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}', [\App\Http\Controllers\PostsController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [\App\Http\Controllers\PostsController::class, 'update'])->name('updatepost');



//TO DO
//Route::get('/contact', [App\Http\Controllers\PostsController::class, 'create'])->name('create');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'index'])->name('profile');
    Route::patch('/profile/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('update');

    Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'perform'])->name('logout.perform');
});
