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
        return Inertia::render('Estabelecimento/Estabelecimento', [
            'estabelecimento' => $estabelecimento,
        ]);
       
    }

    public function store(Request $request){
 
        $payload = [
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'cep' => $request->cep,
            'user_id' => \Auth::user()->id,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'codigo_ibge' => $request->codigo_ibge,
            'bairro' => $request->bairro,
            'url' => $request->nome
        ];
        $idEstabelecimento = null;
        if(\Auth::user()->estabelecimento()->exists()){
            $idEstabelecimento = \Auth::user()->estabelecimento->id;
            /** Se o user já tem estabelecimento, nao atualiza a url do estabelecimento dele, por isso a remoção da chave 'url'  */
            unset($payload['url']);
        }
        /**
         * Verifica se o nome é unico.
         */
        $request->validate([
            'nome' => 'required|unique:estabelecimentos,nome,' . $idEstabelecimento,
            'photo' => ['nullable','image', 'max:2048']
        ]);
        $estabelecimento = Estabelecimento::updateOrCreate(
            ['user_id' => \Auth::user()->id],
            $payload
        );

        if($request->hasFile('photo')){
            \Auth::user()->updateProfilePhoto($request->file('photo'));
        }
       
        return Redirect::route('estabelecimento');
    }

}
