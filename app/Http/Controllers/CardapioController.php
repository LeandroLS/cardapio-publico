<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Redirect;
use App\Models\CategoriaCardapio;

use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function index()
    {
        $categorias = CategoriaCardapio::all();
        return Inertia::render('Cardapio/Cardapio', [
            'categorias' => $categorias
        ]);
    }
}
