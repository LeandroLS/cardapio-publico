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
        static::addGlobalScope('user_id', function (Builder $builder) {
            $builder->where('user_id', '=', \Auth::user()->id);
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
