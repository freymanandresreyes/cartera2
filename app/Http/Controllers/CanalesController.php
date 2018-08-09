<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\canales;

class CanalesController extends Controller
{
    public function consulta_canales(){
        $canales=canales::all();
        return response()->json(view('parcial_modal.opciones_canales',compact('canales'))->render());
    }
}
