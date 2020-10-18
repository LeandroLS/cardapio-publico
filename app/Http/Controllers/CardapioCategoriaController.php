<?php
namespace App\Http\Controllers;
use Inertia\Inertia;
use Redirect;
use App\Models\CardapioCategoria;
use Illuminate\Http\Request;

class CardapioCategoriaController extends Controller
{
    public function index()
    {
        $categorias = CardapioCategoria::all();
        return Inertia::render('Cardapio/CardapioCategoria', [
            'categorias' => $categorias
        ]);
    }

     public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required'],
        ]);
        CardapioCategoria::create($request->all());
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
