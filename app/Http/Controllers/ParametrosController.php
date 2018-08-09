<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\parametros;

class ParametrosController extends Controller
{
    public function consulta_parametros(){
        $parametros=parametros::all();
        return response()->json(view('parcial_modal.opciones_parametros',compact('parametros'))->render());        
    }
}
