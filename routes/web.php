<?php

use App\Http\Controllers\{
    UserController
};
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
// jogar o "create" antes, pq pode confundir com o parâmetro "id" da rota "show"
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/', function () {
    return view('welcome');
});
