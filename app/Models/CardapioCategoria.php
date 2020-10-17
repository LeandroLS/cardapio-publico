<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardapioCategoria extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
     public function itens()
    {
        return $this->hasMany('App\Models\CategoriaItem');
    }
}
