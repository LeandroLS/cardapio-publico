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
}
