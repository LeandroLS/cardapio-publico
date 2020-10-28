<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Redirect;
use Illuminate\Http\Request;
use App\Models\{Estabelecimento, Municipio};
class EstabelecimentoController extends Controller
{
    public function index(){
        $estabelecimento = Estabelecimento::with('contatos')
        ->with('diasAtendimento')
        ->first();
        if($estabelecimento){
            return Inertia::render('Estabelecimento/Estabelecimento', [
                'estabelecimento' => $estabelecimento,
            ]);
        } else {
            return Inertia::render('Estabelecimento/Estabelecimento');
        }
       
    }
    public static function nameToUrl($name){
        $nameTrimed = strtolower(trim($name));
        $stringWithOneSpace = preg_replace('/[ ]{2,}/','', $nameTrimed);
        $stringWithTrace = preg_replace('/[^a-zA-Z0-9]/','-', $stringWithOneSpace);
        $stringWithOneTrace = preg_replace('/[-]{2,}/','-', $stringWithTrace);
        return $stringWithOneTrace;
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required',
            'logo' => 'mimes:jpeg,jpg,png'
        ]);
        $estabelecimento = Estabelecimento::where('user_id', \Auth::user()->id)->first();
        if($estabelecimento){
            $estabelecimento->nome = $request->nome;
            $estabelecimento->descricao = $request->descricao;
            $estabelecimento->cep = $request->cep;
            $estabelecimento->endereco = $request->endereco;
            $estabelecimento->numero = $request->numero;
            $estabelecimento->codigo_ibge = $request->codigo_ibge;
            $estabelecimento->bairro = $request->bairro;
            $estabelecimento->save();
        } else {
            $url = $this->nameToUrl($request->nome);
            Estabelecimento::create([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'cep' => $request->cep,
                'user_id' => \Auth::user()->id,
                'url' => $url,
                'endereco' => $request->endereco,
                'numero' => $request->numero,
                'codigo_ibge' => $request->codigo_ibge,
                'bairro' => $request->bairro,
            ]);
        }
       
        return Redirect::route('estabelecimento');
    }

}