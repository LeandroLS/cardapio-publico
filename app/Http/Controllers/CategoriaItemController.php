<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\Models\CategoriaItem;
use Illuminate\Support\Facades\Storage;

class CategoriaItemController extends Controller
{
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cardapio_categoria_id' => 'required',
            'foto_prato' => 'exclude_if:foto_prato,null|mimes:jpeg,png,jpg|max:3240' 
        ]);
        if($request->hasFile('foto_prato')){
            $request['nome_foto_prato'] = $request->file('foto_prato')->store('fotos-pratos', 's3');
        }
        CategoriaItem::updateOrCreate(['id' => $request->id], $request->all());
        return Redirect::route('cardapio');
    }

    public function destroy(Request $request){
        $request->validate(['id' => 'required']);
        $categoriaItem = CategoriaItem::find($request->id);
        $categoriaItem->delete();
        return Redirect::route('cardapio');
    }

    public function show(Request $request){
        $request->validate([
           'id' => 'required'
        ]);
        return CategoriaItem::find($request->id);
    }

    public function destroyImg(Request $request){
        $request->validate(['id' => 'required']);
        $categoriaItem = CategoriaItem::find($request->id);
        Storage::disk('s3')->delete($categoriaItem->nome_foto_prato);
        $categoriaItem->nome_foto_prato = null;
        $categoriaItem->save();

    }
}
