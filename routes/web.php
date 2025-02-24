<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\CommentoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConvenzioniController;



Route::get('/', [FrontController::class, 'getHome'])->name('home');

Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::get('/ajaxUser', [AuthController::class, 'ajaxCheckForEmail']);

//convenzioni
Route::get('/convenzioni', [ConvenzioniController::class, 'index'])->name('convenzioni');


// Public routes for viewing events
Route::resource('evento', EventoController::class);
Route::resource('macchina', MacchinaController::class);     

//comment routing
// Routes for managing comments
Route::post('/commento/create/{evento_id}', [CommentoController::class, 'create'])->name('commento.create');
Route::delete('/commento/delete/{id}/{evento_id}', [CommentoController::class, 'delete'])->name('commento.delete');

// Admin-specific routes for creating, editing, and deleting events
Route::group(['middleware' => ['authCustom', 'isAdmin']], function() {
    Route::get('/user/{id}/edit', [UserController::class, 'editUser'])->name('user.edit');
    Route::post('/user/{id}/update', [UserController::class, 'updateUser'])->name('user.update');
    Route::post('/user/register', [AuthController::class, 'registration'])->name('user.register');
    //Route::post('/user/storeUser', [UserController::class, 'storeUser'])->name('user.storeUser');
    Route::post('/evento/storeNew', [EventoController::class, 'storeNew'])->name('evento.storeNew');
    Route::get('/evento/create', [EventoController::class, 'create'])->name('evento.create'); // For creating a new event
    Route::post('/evento/store', [EventoController::class, 'store'])->name('evento.store');  // Store new event
    Route::get('/evento/{id}/edit', [EventoController::class, 'edit'])->name('evento.edit'); // For editing an event
    Route::put('/evento/{id}', [EventoController::class, 'update'])->name('evento.update');  // Update an existing event
    Route::delete('/evento/{id}', [EventoController::class, 'destroy'])->name('evento.destroy'); // Delete an event
    Route::get('/evento/{id}/destroy/confirm', [EventoController::class, 'confirmDestroy'])->name('event.destroy.confirm');
    Route::get('/user/register',[UserController::class, 'create'])->name('user.create');
    Route::get('/user/list',[UserController::class, 'list'])->name('user.list');
    Route::delete('/users/{id}', [UserController::class, 'deleteUser'])->name('user.delete');

});

// Redirect 404 file not found error page
Route::fallback(function () {
    return view('errors.404')->with('message','Error 404 - Page not found!');
});
