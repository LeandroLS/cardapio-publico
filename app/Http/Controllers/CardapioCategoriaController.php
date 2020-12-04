<?php
namespace App\Http\Controllers;
use Inertia\Inertia;
use Redirect;
use App\Models\CardapioCategoria;
use Illuminate\Http\Request;

class CardapioCategoriaController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required'],
        ]);
        $cardapioCategoria = new CardapioCategoria();
        $cardapioCategoria->nome = $request->nome;
        $cardapioCategoria->estabelecimento_id = \Auth::user()->estabelecimento->id;
        $cardapioCategoria->save();
        return Redirect::route('cardapio');
    }
    public function update(Request $request){
        $request->validate([
            'novoNome' => ['required'],
            'id' => ['required'],
        ]);
        $categoria = CardapioCategoria::find($request->id);
        $categoria->nome = $request->novoNome;
        $categoria->save();
        return Redirect::route('cardapio');
    }

    public function updateOrder(Request $request){
        foreach ($request->categorias as $key => $value) {
            $item = CardapioCategoria::find($value['id']);
            $item->ordem = $key + 1;
            $item->save();
        }
        return Redirect::route('cardapio');
    }
    

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => ['required'],
        ]);
        $categoria = CardapioCategoria::find($request->id);
        $categoria->delete();
        return Redirect::route('cardapio');

    }
}
