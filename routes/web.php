<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PagesController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/post/create', [PostsController::class, 'create']);
Route::get('/post/{id}', [PostsController::class, 'show']);

Route::post('/post', [PostsController::class, 'store']);
Route::get('/post/{id}/edit', [PostsController::class, 'edit']);
Route::put('/post/{id}', [PostsController::class, 'update']);
Route::delete('/post/{id}', [PostsController::class, 'destroy']);

