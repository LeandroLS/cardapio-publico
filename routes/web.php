<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CardapioCategoriaController, CardapioController, CategoriaItemController, EstabelecimentoContatoController, EstabelecimentoController, MunicipioController};

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function(){
        return Inertia\Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/cardapio', [CardapioController::class, 'index'])->name('cardapio');
    Route::get('/municipio', [MunicipioController::class, 'getMunicipio'])->name('municipio');

    Route::post('/estabelecimento/contato', [EstabelecimentoContatoController::class, 'store'])->name('estabelecimento.contato');
    Route::get('/estabelecimento', [EstabelecimentoController::class, 'index'])->name('estabelecimento');
    Route::post('/estabelecimento', [EstabelecimentoController::class, 'store'])->name('estabelecimento.store');
    
    Route::post('/categoria-cardapio', [CardapioCategoriaController::class, 'store'])->name('cardapio.store');
    Route::post('/categoria-cardapio/destroy', [CardapioCategoriaController::class, 'destroy'])->name('cardapio.destroy');
    Route::post('/categoria-cardapio/update', [CardapioCategoriaController::class, 'update'])->name('cardapio.update');
    
    Route::post('/categoria-item', [CategoriaItemController::class, 'store'])->name('categoria.item');
    Route::post('/categoria-item/destroy', [CategoriaItemController::class, 'destroy'])->name('categoria.item.destroy');
    Route::post('/categoria-item/update', [CategoriaItemController::class, 'update'])->name('categoria.item.update');



});
