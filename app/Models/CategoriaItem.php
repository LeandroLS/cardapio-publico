<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CAtegoriaItem extends Model
{
    use HasFactory;
    protected $table = 'categoria_itens';
    protected $guarded = ['id'];
    public function categoria()
    {
        return $this->belongsTo('App\Models\CardapioCategoria');
    }
}
