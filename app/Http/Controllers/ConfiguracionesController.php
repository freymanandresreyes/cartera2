<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionesController extends Controller
{
    public function guardar_configuraciones(Request $request){
        $dias_mora=$request->dias_mora;
        $tipo_facturas=$request->tipo_facturas;
               
    }
}
