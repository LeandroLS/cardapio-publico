<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Redirect;
use Illuminate\Http\Request;

class AssinaturaController extends Controller
{
   public function index(){
        return Inertia::render('Assinatura', [
            'assinatura' => \Auth::user()->assinatura,
        ]);
   }
}
