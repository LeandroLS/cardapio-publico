<?php
namespace App\Http\Controllers;
use Inertia\Inertia;
use Redirect;
use App\Models\CategoriaCardapio;
use Illuminate\Http\Request;

class CategoriaCardapioController extends Controller
{
    public function index()
    {
        $categorias = CategoriaCardapio::all();
        return Inertia::render('Cardapio/CategoriaCardapio', [
            'categorias' => $categorias
        ]);
    }

     public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required'],
        ]);
        CategoriaCardapio::create($request->all());
        return Redirect::route('cardapio');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => ['required'],
        ]);
        $categoria = CategoriaCardapio::find($request->id);
        $categoria->delete();
        return Redirect::route('cardapio')->with('success', 'aa');

    }
}
