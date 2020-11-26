<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Redirect;
use App\Models\CardapioCategoria;

use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function index()
    {
        if(!\Auth::user()->estabelecimento()->exists()){
            dd('preencha o estabelecimento primeiro');
        }
        $categorias = CardapioCategoria::with('itens')->get();
        return Inertia::render('Cardapio/Cardapio', [
            'categorias' => $categorias
        ]);
    }

    public function cardapioPublico(Request $request){
        $estabelecimento = \App\Models\Estabelecimento::with('contatos')
        ->with('diasAtendimento')
        ->with('cardapioCategorias.itens')
        ->with('municipio')
        ->with('user')
        ->with('diasAtendimento')
        ->where('url', $request->cardapiourl)->first();
        /**Se não houver nenhum estabelecimento, retorna página não encontrada */
        if(!$estabelecimento){
            abort(404);
        }
        return Inertia::render('Cardapio/CardapioPublico', [
            'estabelecimento' => $estabelecimento
        ]);
    }
}
