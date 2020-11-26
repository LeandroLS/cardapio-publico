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
            if(\Auth::check()){
                $builder->where('user_id', '=', \Auth::user()->id);
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

    public function municipio(){
        return $this->hasOne('App\Models\Municipio', 'codigo_ibge', 'codigo_ibge');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function setUrlAttribute($value)
    {
        $nameTrimed = strtolower(trim($value));
        $stringWithOneSpace = preg_replace('/[ ]{2,}/','', $nameTrimed);
        $stringWithTrace = preg_replace('/[^a-zA-Z0-9]/','-', $stringWithOneSpace);
        $stringWithOneTrace = preg_replace('/[-]{2,}/','-', $stringWithTrace);
        $this->attributes['url'] = $stringWithOneTrace;
    }
}
