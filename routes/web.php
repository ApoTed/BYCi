<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::get('/', function () {
    return view('index');
})->name('home');
*/

Route::get('/', [FrontController::class, 'getHome'])->name('home');
Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::post('/user/register', [AuthController::class, 'registration'])->name('user.register');
//Route::get('/ajaxUser', [AuthController::class, 'ajaxCheckForEmail']);

Route::group(['middleware' => ['authCustom','isRegisteredUser']], function() {
    //Route::resource('book', BookController::class);
    //Route::get('/book/{id}/destroy/confirm', [BookController::class, 'confirmDestroy'])->name('book.destroy.confirm');

    //Route::resource('author', AuthorController::class);
    //Route::get('/author/{id}/destroy/confirm', [AuthorController::class, 'confirmDestroy'])->name('author.destroy.confirm');

    //Route::get('/ajaxAuthor', [AuthorController::class, 'ajaxCheckForAuthors']);
    //Route::get('/ajaxBook', [BookController::class, 'ajaxCheckForBooks']);
});

Route::resource('category', CategoryController::class)->middleware(['authCustom','isAdmin']);

// Redirect 404 file not found error page
Route::fallback(function () {
    return view('errors.404')->with('message','Error 404 - Page not found!');
});