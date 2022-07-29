<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/',[PostController::class,'Index'])->name('index');
Route::get('/post/add',[PostController::class,'postAdd'])->name('post.add');
Route::post('/post/store',[PostController::class,'store'])->name('store.post');
Route::get("/post/edit/{id}", [PostController::class, 'postEdit'])->name("post.edit");
Route::post("/post/update", [PostController::class, 'postUpdate'])->name("post.update");
Route::get('/post/delete/{id}',[PostController::class,'destroy'])->name('post.delete');
