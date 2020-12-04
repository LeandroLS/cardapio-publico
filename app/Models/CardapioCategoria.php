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
        static::addGlobalScope('estabelecimento_id_scope', function (Builder $builder) {
            /**
             * O usuário tem que ter um estabelecimento antes de ter categoria
             */
            if(\Auth::check() && \Auth::user()->estabelecimento()->exists()){
                $builder->where('estabelecimento_id', '=', \Auth::user()->estabelecimento->id);
            }
        });

        static::addGlobalScope('estabelecimento_order_by_ordeem_scope', function (Builder $builder) {
            $builder->orderBy('ordem', 'asc');
        });
    }
     public function itens()
    {
        return $this->hasMany('App\Models\CategoriaItem');
    }
}
