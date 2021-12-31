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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index'])->name('posts');
Route::get('/create', [App\Http\Controllers\PostsController::class, 'create'])->name('create');
Route::post('/create', [App\Http\Controllers\PostsController::class, 'store'])->name('store');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'perform'])->name('logout.perform');
});
