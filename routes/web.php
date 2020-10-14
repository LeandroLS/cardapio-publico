<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecoesCardapioController;

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

    Route::get('/secoes-cardapio', function(){
        return Inertia\Inertia::render('SecoesCardapio');
    })->name('secoes-cardapio');

    //   Route::get('/secoes-cardapio', [SecoesCardapioController::class, 'index'])->name('secoes-cardapio');
});
