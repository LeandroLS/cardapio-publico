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

    public function downloadQrCode(){
        $filename = 'qr-code-cardapio.jpg';
        $tempImage = tempnam(sys_get_temp_dir(), $filename);
        copy('https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . route('cardapio.publico', \Auth::user()->estabelecimento->url), $tempImage);
        return response()->download($tempImage, $filename);
    }
}
