<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListaController;
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


//listas
Route::prefix('listas')->group(function () {
    Route::get('/index', [ListaController::class, 'index'])->name('listas.index');
    Route::get('/create', [ListaController::class, 'create'])->name('listas.create');
    Route::post('/store', [ListaController::class, 'store'])->name('listas.store');
    Route::post('/update/{id_lista}', [ListaController::class, 'update'])->name('listas.update');
    Route::get('/destroy/{id_lista}', [ListaController::class, 'destroy'])->name('listas.destroy');
    Route::get('/edit/{id_lista}', [ListaController::class, 'edit'])->name('listas.edit');

    Route::prefix('itens')->group(function() {
        Route::get('/{id_lista}', [ListaController::class, 'itensIndex'])->name('listas.itens.index');
        Route::get('/create/{id_lista}', [ListaController::class, 'itensCreate'])->name('listas.itens.create');
        Route::post('/store/{id_lista}', [ListaController::class, 'itensStore'])->name('listas.itens.store');
        Route::get('/edit/{id_lista}/{id_item}', [ListaController::class, 'itensEdit'])->name('listas.itens.edit');
        Route::post('/update/{id_lista}/{id_item}', [ListaController::class, 'itensUpdate'])->name('listas.itens.update');
        Route::get('/destroy/{id_lista}/{id_item}', [ListaController::class, 'itensDestroy'])->name('listas.itens.destroy');
    });
});
