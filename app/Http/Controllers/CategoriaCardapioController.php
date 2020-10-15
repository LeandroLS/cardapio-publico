<?php
namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\CategoriaCardapio;
use Illuminate\Http\Request;

class CategoriaCardapioController extends Controller
{
    public function index(){
        $categorias = CategoriaCardapio::all();
        return Inertia::render('CategoriaCardapio', [
            'categorias' => $categorias
        ]);
    }
}
