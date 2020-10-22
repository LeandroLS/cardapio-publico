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
        // dd(\Auth::user()->estabelecimento->id);
        $contato = new EstabelecimentoContato;
        $contato->estabelecimento_id = \Auth::user()->estabelecimento->id;
        $contato->contato = $request->contato;
        $contato->tipo_contato = $request->tipo_contato;
        $contato->save();
        return Redirect::route('estabelecimento');
    }
}
