<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
Route::get('/admin/home', function () {
    return view('adminHome');
})->middleware(['is_admin'])->name('admin.home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Auth::routes();
Route::get('/publicar', [AdminController::class, 'indexPublish']);

Route::post('/publicar', [AdminController::class, 'storePublish'])->name('publicar');

Route::get('/listagem', [AdminController::class, 'listagem']);

Route::get('/noticias', [UserController::class, 'indexNews']);

Route::get('/conteudos', [UserController::class, 'indexCont']);

Route::get('/publicacoes/{titulo}', [UserController::class, 'redirectPage']);

Route::get('/{id}/edit', [AdminController::class, 'edit'])->where('id', '[0-9]+')->name('editar');

Route::put('/{id}/update', [AdminController::class, 'update'])->name('update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email', [UserController::class, 'indexEmail']);
Route::post('/email', [UserController::class, 'postEmail']);