<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\Models\CategoriaItem;

class CategoriaItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cardapio_categoria_id' => 'required'
        ]);
        CategoriaItem::create($request->all());
        return Redirect::route('cardapio');
    }

    public function destroy(Request $request){
        $request->validate(['id' => 'required']);
        $categoriaItem = CategoriaItem::find($request->id);
        $categoriaItem->delete();
        return Redirect::route('cardapio');
    }

    public function update(Request $request){
        $request->validate(['id' => 'required']);
        $categoriaItem = CategoriaItem::find($request->id);
        $categoriaItem->preco = $request->preco;
        $categoriaItem->nome = $request->nome;
        $categoriaItem->descricao = $request->descricao;
        $categoriaItem->save();
        return Redirect::route('cardapio');
    }

    public function show(Request $request){
        $request->validate([
           'id' => 'required'
        ]);
        return CategoriaItem::find($request->id);
    }
}
