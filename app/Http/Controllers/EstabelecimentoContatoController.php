<?php

namespace App\Http\Controllers;
use App\Models\EstabelecimentoContato;
use Illuminate\Http\Request;
use Redirect;

class EstabelecimentoContatoController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'contato' => 'required',
            'tipo_contato' => 'required',
        ]);
        $contato = new EstabelecimentoContato;
        $contato->estabelecimento_id = \Auth::user()->estabelecimento->id;
        $contato->contato = $request->contato;
        $contato->tipo_contato = $request->tipo_contato;
        $contato->save();
        return Redirect::route('estabelecimento');
    }

    public function destroy(Request $request){
        $request->validate(['id' => 'required']);
        $contato = EstabelecimentoContato::find($request->id);
        $contato->delete();
        return Redirect::route('estabelecimento');
    }
}
