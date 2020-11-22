<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Estabelecimento extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected static function booted()
    {
        static::addGlobalScope('user_id_scope', function (Builder $builder) {
            //verifica se tem usuário logado
            if(\Auth::user()){
                $builder->where('user_id', '=', \Auth::user()->id);
            } else {
                $builder->where('user_id', '=', null);
            }
        });
    }
    public function contatos(){
        return $this->hasMany('App\Models\EstabelecimentoContato');
    }

    public function diasAtendimento(){
        return $this->hasMany('App\Models\EstabelecimentoDiasAtendimento');
    }

    public function cardapioCategorias(){
        return $this->hasMany('App\Models\CardapioCategoria');
    }
}
