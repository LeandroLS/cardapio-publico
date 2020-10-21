<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    public function estado(){
        return $this->belongsTo('App\Models\Estado', 'codigo_uf', 'codigo_uf');
    }

    public function scopeFilter($query, $request){
        if($request->filled('codigo_ibge')){
            $query->where('codigo_ibge', $request->codigo_ibge);
        }
        if($request->filled('nome')){
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }
        $query->limit(300);
        return $query;
    }
}
