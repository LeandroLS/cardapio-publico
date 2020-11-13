<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
class CardapioLinksController extends Controller
{
    public function index(){
        return Inertia::render('CardapioLinks', [
            'cardapio_url' => \Auth::user()->estabelecimento->url
        ]);
    }
}
