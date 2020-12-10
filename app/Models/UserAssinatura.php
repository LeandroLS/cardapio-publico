<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAssinatura extends Model
{
    use HasFactory;
    protected $appends = ['active'];
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function getActiveAttribute()
    {
        $end_at = \Carbon\Carbon::create($this->attributes['end_at']);
        /**
         * Se a data de hoje NÃO for maior que a data de término, retorna true. Ou seja, está ativo.
         */
        return !\Carbon\Carbon::now()->gte($end_at);
    }
}
