<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacaoController;
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

Route::get('/publicar', [PublicacaoController::class, 'create']);

Route::post('/publicar', [PublicacaoController::class, 'store'])->name('publicar');

Route::get('/listagem', [UserController::class, 'show']);

Route::get('/noticias', [PublicacaoController::class, 'indexNews']);

Route::get('/conteudos', [PublicacaoController::class, 'indexCont']);

Route::get('/publicacoes/{id}/{titulo}', [PublicacaoController::class, 'redirectPage']);

Route::get('publicacao/{id}/edit', [PublicacaoController::class, 'edit'])->where('id', '[0-9]+')->middleware('is_admin')->name('editar');

Route::put('publicacao/{id}/update', [PublicacaoController::class, 'update'])->middleware('is_admin')->name('update_pub');

Route::get('/user/edit/{id}', [UserController::class, 'edit'])->where('id', '[0-9]+');

Route::put('user/update/{id}', [UserController::class, 'update'])->name('update_user');

Route::get('/home', [UserController::class, 'index'])->name('home');

Route::get('/email', [UserController::class, 'indexEmail']);

Route::post('/email', [UserController::class, 'postEmail']);