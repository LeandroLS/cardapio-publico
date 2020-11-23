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
    /**
     * Precisa criar um método para verificar se a url recebida realmente existe no banco de dados
     */
    public function cardapioPublico(Request $request){
        $estabelecimento = \App\Models\Estabelecimento::with('contatos')->with('diasAtendimento')->with('cardapioCategorias.itens')->with('municipio')->with('diasAtendimento')->where('url', $request->cardapiourl)->first();
        return Inertia::render('Cardapio/CardapioPublico', [
            'estabelecimento' => $estabelecimento
        ]);
    }
}
