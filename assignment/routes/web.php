<?php

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\GetAllPosts;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SoftDeleteController;

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

Route::get('/home',[PostController::class,'index']);
Route::get('/posts',[PostController::class,'getAllPosts']);
Route::get('/posts/{id}',[PostController::class,'getPostById'])->name('posts');
Route::post('/post/{id}/comment/create',[CommentController::class,'store']);
Route::get('/posts/{id}/comments',[CommentController::class,'getCommentsByPost']);
Route::get('/posts/{id}/latest-comment',[CommentController::class,'getLatestCommentOfPost']);

