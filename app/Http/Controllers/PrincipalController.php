<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\zonas;
use App\canales;

class PrincipalController extends Controller
{
    public function principal(Request $request){
		$userTienda=$request->user()->id;
		$consulta_zonas=zonas::where('id_user',$userTienda)->pluck('id');
		
		// dd($consulta_zonas[0]);
		$con = count($consulta_zonas)-1;
		$string='';
		for($i=0; $i<count($consulta_zonas);$i++){
           if ($con == $i){
			$string= $string."'".$consulta_zonas[$i]."'";
		   }else{
			$string= $string."'".$consulta_zonas[$i]."',";
		   }
		}
		//dd($string);
		// $canales=canales::all();
		// $variable='88239001';
        return view('principal.index',compact('string'));
    }
}
