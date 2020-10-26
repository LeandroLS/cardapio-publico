<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CardapioCategoria extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected static function booted()
    {
        static::addGlobalScope('estabelecimento_id', function (Builder $builder) {
            if(\Auth::user()->estabelecimento()->exists()){
                $builder->where('estabelecimento_id', '=', \Auth::user()->estabelecimento->id);
            }
            $builder->where('estabelecimento_id', '=', null);
        });
    }
     public function itens()
    {
        return $this->hasMany('App\Models\CategoriaItem');
    }
}
