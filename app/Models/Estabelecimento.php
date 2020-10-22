<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function contatos(){
        return $this->hasMany('App\Models\EstabelecimentoContato');
    }
}
