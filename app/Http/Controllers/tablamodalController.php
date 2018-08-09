<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\zonas;

class tablamodalController extends Controller
{
    public function tabla_modal(Request $request){
        $nittri=$request->variable;
        return response()->json(view('principal.tabla_modal',compact('nittri'))->render());
        
	}
	
	public function select_facturas(Request $request){
        $nittri=$request->nittri;
        return response()->json(view('parcial_modal.select_facturas',compact('nittri'))->render());		
	}
}
