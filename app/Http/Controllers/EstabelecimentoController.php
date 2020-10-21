<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Redirect;
use Illuminate\Http\Request;
use App\Models\{Estabelecimento, Municipio};
class EstabelecimentoController extends Controller
{
    public function index(){
        $estabelecimento = Estabelecimento::where('user_id', \Auth::user()->id)->first();
        $municipios = Municipio::with('estado')->get();
        return Inertia::render('Estabelecimento', [
            'estabelecimento' => $estabelecimento,
            'municipios' => $municipios
        ]);
    }

    public function store(Request $request){
        $request->validate(
            [
                'nome' => 'required',
            ]
        );
        Estabelecimento::updateOrCreate(
            [ 'user_id' => \Auth::user()->id],
            [
                'nome' => $request->nome,
                'descricao' => $request->descricao
            ]
        );
        return Redirect::route('estabelecimento');
    }
}
