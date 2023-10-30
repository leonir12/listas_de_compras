<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//produtos
Route::prefix('produtos')->group(function () {
    Route::get('/index', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/store', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::post('/update/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::get('/destroy/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
    Route::get('/edit/{id}', [ProdutoController::class, 'edit'])->name('produtos.edit');

});
