<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
class MunicipioController extends Controller
{
    public function getMunicipio(Request $request){
        return Municipio::filter($request)->with('estado')->get();
    }
}
