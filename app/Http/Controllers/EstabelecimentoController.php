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
        if($estabelecimento){
            return Inertia::render('Estabelecimento', [
                'estabelecimento' => $estabelecimento,
            ]);
        } else {
            return Inertia::render('Estabelecimento');
        }
       
    }

    public function store(Request $request){
        $request->validate(['nome' => 'required']);
        Estabelecimento::updateOrCreate(
            ['user_id' => \Auth::user()->id],
            [
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'cep' => $request->cep,
                'endereco' => $request->endereco,
                'numero' => $request->numero,
                'codigo_ibge' => $request->codigo_ibge,
                'bairro' => $request->bairro,

            ]
        );
        return Redirect::route('estabelecimento');
    }

}
