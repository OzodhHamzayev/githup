<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::post('logout', [UserController::class, 'logout'])
        ->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('article/index', [ArticleController::class,'index'])
        ->name('article.index');

    Route::get('batafsil/index/{id}', [ArticleController::class,'batafsil'])
        ->name('batafsil.index');

    Route::post('batafsil/index/{id}', [ArticleController::class,'batafsil'])
        ->name('batafsil.index.post');

    Route::get('article/news', [ArticleController::class,'articleNews'])
        ->name('article.news');

    Route::get('article/news/show/{id}', [ArticleController::class,'articleNewsShow'])
        ->name('article.news.show');

    Route::get('article/index{id}', [ArticleController::class,'editIndex'])
        ->name('edit.index');

    Route::post('articleEdit/{id}', [ArticleController::class,'ArticleEdit'])
        ->name('article.edit');

    Route::post('articleDelete/{id}', [ArticleController::class,'ArticleDelete'])
        ->name('article.delete');

    Route::get('article/create', [ArticleController::class,'CreateIndex'])
        ->name('article.Create.index');

    Route::post('article/create', [ArticleController::class,'articleCreate'])
        ->name('article.create');

    Route::post('article/comment', [CommentController::class,'Comment'])
        ->name('article.comment');

    Route::post('response_type', [LikeController::class,'response_type'])
        ->name('response_type');



    });
Route::get('/auth/login', [UserController::class, 'index'])
    ->name('login');

Route::post('/auth/login', [UserController::class, 'Login'])
    ->name('auth.login');
