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
        /**
         * Antes de visualizar o cardápio, o usuário deve ter um estabelecimento atrelado a ele mesmo.
         */
        if(!\Auth::user()->estabelecimento()->exists()){
            return Redirect::route('estabelecimento');
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
