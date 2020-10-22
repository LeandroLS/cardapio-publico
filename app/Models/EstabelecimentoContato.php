<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstabelecimentoContato extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'estabelecimento_id'];
}
