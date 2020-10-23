<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\Models\EstabelecimentoDiasAtendimento;
class EstabelecimentoAtendimentoController extends Controller
{
    public function store(Request $request){
         $request->validate([
            'dia_semana' => 'required',
            'abre' => 'required',
            'fecha' => 'required',
        ]);
        $diaAtendimento = new EstabelecimentoDiasAtendimento;
        $diaAtendimento->estabelecimento_id = \Auth::user()->estabelecimento->id;
        $diaAtendimento->dia_semana = $request->dia_semana;
        $diaAtendimento->abre = $request->abre;
        $diaAtendimento->fecha = $request->fecha;
        $diaAtendimento->save();
        return Redirect::route('estabelecimento');
    }

    public function destroy(Request $request){
        $request->validate(['id' => 'required']);
        $diaAtendimento = EstabelecimentoDiasAtendimento::find($request->id);
        $diaAtendimento->delete();
        return Redirect::route('estabelecimento');
    }
}
