<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/home', [UserController::class, 'indexAdmin'])->middleware(['is_admin'])->name('admin.home');

Auth::routes();

Route::get('/publicar', [PublicationController::class, 'index'])->middleware('is_admin');

Route::post('/publicar', [PublicationController::class, 'store'])->name('publicar');

Route::get('/listagem', [UserController::class, 'listagem'])->middleware('is_admin');

Route::get('/noticias', [PublicationController::class, 'indexNews']);

Route::get('/conteudos', [PublicationController::class, 'indexCont']);

Route::get('/publicacoes/{id}/{titulo}', [PublicationController::class, 'redirectPage']);

Route::get('/{id}/edit', [PublicationController::class, 'edit'])->where('id', '[0-9]+')->middleware('is_admin')->name('editar');

Route::put('/{id}/update', [PublicationController::class, 'update'])->middleware('is_admin')->name('update');

Route::get('/home', [UserController::class, 'index'])->name('home');

Route::get('/email', [UserController::class, 'indexEmail']);

Route::post('/email', [UserController::class, 'postEmail']);