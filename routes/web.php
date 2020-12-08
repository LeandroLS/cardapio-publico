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
    CardapioLinksController,
    AssinaturaController
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
    return view('home-page');
})->name('homepage');

Route::get('/entrar', function () {
    return view('/auth/entrar');
})->name('entrar');

Route::get('/senha/resetar', function(){
    return view('/auth/esqueci-senha');
})->name('password.reset');

Route::get('/politica-privacidade', function () {
    return view('/politica-de-privacidade');
})->name('politica-privacidade');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/cardapio', [CardapioController::class, 'index'])->name('cardapio');
    
    Route::get('/cardapio/links', [CardapioLinksController::class, 'index'])->name('cardapio.links');
    Route::get('/cardapio/download/qrcode', [CardapioLinksController::class, 'downloadQrCode'])->name('cardapio.download-qrcode');
    
    Route::get('/municipio', [MunicipioController::class, 'getMunicipio']);

    Route::get('/estabelecimento', [EstabelecimentoController::class, 'index'])->name('estabelecimento');
    Route::post('/estabelecimento', [EstabelecimentoController::class, 'store'])->name('estabelecimento.store');
    
    Route::post('/estabelecimento/contato', [EstabelecimentoContatoController::class, 'store']);
    Route::post('/estabelecimento/contato/destroy', [EstabelecimentoContatoController::class, 'destroy']);

    Route::get('/assinatura', [AssinaturaController::class, 'index'])->name('assinatura');

    Route::post('/estabelecimento/horario-atendimento', [EstabelecimentoAtendimentoController::class, 'store']);
    Route::post('/estabelecimento/horario-atendimento/destroy', [EstabelecimentoAtendimentoController::class, 'destroy']);

    Route::post('/cardapio/categoria', [CardapioCategoriaController::class, 'store']);
    Route::post('/cardapio/categoria/destroy', [CardapioCategoriaController::class, 'destroy']);
    Route::post('/cardapio/categoria/update', [CardapioCategoriaController::class, 'update']);
    Route::post('/cardapio/categoria/sort', [CardapioCategoriaController::class, 'updateOrder']);

    Route::post('/cardapio/categoria/item', [CategoriaItemController::class, 'storeOrUpdate']);
    Route::get('/cardapio/categoria/item', [CategoriaItemController::class, 'show']);
    Route::post('/cardapio/categoria/item/destroy', [CategoriaItemController::class, 'destroy']);
    Route::post('/cardapio/categoria/item/imagem', [CategoriaItemController::class, 'destroyImg']);
    Route::post('/cardapio/categoria/item/sort', [CategoriaItemController::class, 'updateOrder']);

});
/**
 * Essa rota tem que ficar por último.
 * Se ela ficar acima, por exemplo, se ela ficar acima de /cardapio, quando forem acessar /cardapio, vão acabar caindo nessa rota.
 */
Route::get('/{cardapiourl?}', [CardapioController::class, 'cardapioPublico'])->name('cardapio.publico');
