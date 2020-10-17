<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Redirect;
use App\Models\CardapioCategoria;

use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function index()
    {
        $categorias = CardapioCategoria::with('itens')->get();
        return Inertia::render('Cardapio/Cardapio', [
            'categorias' => $categorias
        ]);
    }
}
