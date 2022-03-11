<?php

use App\Http\Controllers\{
    UserController
};
use App\Http\Controllers\Admin\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{id}/comments', [CommentController::class, 'index'])->name('comments.index');

// "delete" também pode ser "destroy"
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
// Route::patch // utilizado para edição parcial
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
// jogar o "create" antes, pq pode confundir com o parâmetro "id" da rota "show"
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/', function () {
    return view('welcome');
});
