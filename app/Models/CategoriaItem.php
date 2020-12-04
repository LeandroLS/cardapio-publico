<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
class CategoriaItem extends Model
{
    use HasFactory;
    protected $table = 'categoria_itens';
    protected $guarded = ['id'];



    protected static function booted()
    {
        static::addGlobalScope('ordem_asc_escope', function (Builder $builder) {
            //verifica se tem usuário logado
            $builder->orderBy('ordem', 'asc');
            
        });

        static::deleting(function ($categoriaItem) {
            Storage::disk('s3')->delete($categoriaItem->nome_foto_prato);
        });
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\CardapioCategoria');
    }

    public function getPrecoAttribute($value)
    {
        return number_format($value , 2);
    }
}
