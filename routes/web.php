<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CardapioCategoriaController, 
    CardapioController, 
    EstabelecimentoAtendimentoController, 
    CategoriaItemController, 
    EstabelecimentoContatoController, 
    EstabelecimentoController,
    MunicipioController, 
    CardapioLinksController
};

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
    Route::get('/{cardapiourl?}', function(){
        return 'aqui';
    })->name('cardapio.publico');
    Route::get('/cardapio', [CardapioController::class, 'index'])->name('cardapio');
    
    Route::get('/cardapio/links', [CardapioLinksController::class, 'index'])->name('cardapio.links');
    Route::get('/cardapio/download/qrcode', [CardapioLinksController::class, 'downloadQrCode'])->name('cardapio.download-qrcode');
    
    Route::get('/municipio', [MunicipioController::class, 'getMunicipio'])->name('municipio');

    Route::get('/estabelecimento', [EstabelecimentoController::class, 'index'])->name('estabelecimento');
    Route::post('/estabelecimento', [EstabelecimentoController::class, 'store'])->name('estabelecimento.store');
    
    Route::post('/estabelecimento/contato', [EstabelecimentoContatoController::class, 'store'])->name('estabelecimento.contato');
    Route::post('/estabelecimento/contato/destroy', [EstabelecimentoContatoController::class, 'destroy'])->name('estabelecimento.contato.destroy');

    Route::post('/estabelecimento/horario-atendimento', [EstabelecimentoAtendimentoController::class, 'store'])->name('estabelecimento.horario-atendimento');
    Route::post('/estabelecimento/horario-atendimento/destroy', [EstabelecimentoAtendimentoController::class, 'destroy'])->name('estabelecimento.horario-atendimento.destroy');

    Route::post('/categoria-cardapio', [CardapioCategoriaController::class, 'store'])->name('cardapio.store');
    Route::post('/categoria-cardapio/destroy', [CardapioCategoriaController::class, 'destroy'])->name('cardapio.destroy');
    Route::post('/categoria-cardapio/update', [CardapioCategoriaController::class, 'update'])->name('cardapio.update');
    
    Route::post('/categoria-item', [CategoriaItemController::class, 'store'])->name('categoria.item');
    Route::get('/categoria-item', [CategoriaItemController::class, 'show'])->name('categoria.item.show');
    Route::post('/categoria-item/destroy', [CategoriaItemController::class, 'destroy'])->name('categoria.item.destroy');
    Route::post('/categoria-item/update', [CategoriaItemController::class, 'update'])->name('categoria.item.update');

});
