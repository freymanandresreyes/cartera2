<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reporte;

class ReporteController extends Controller
{
    public function guardar_datos_cliente_modal(Request $request){
        $canal=$request->canal;
        $parametro=$request->parametro;
        $observacion=$request->observacion;
        $nit=$request->nit;
        $select_facturas=$request->select_facturas;
        $acuerdo=$request->acuerdo;
        $cliente_nombre=$request->cliente_nombre;
        $telefono_cliente=$request->telefono_cliente;
        // dd('aca no pasa');
        $nuevo_reporte = new reporte;
        $nuevo_reporte->nombre=$cliente_nombre;
        $nuevo_reporte->telefono=$telefono_cliente;
        $nuevo_reporte->nit=$nit;
        $nuevo_reporte->descripcion=$observacion;
        $nuevo_reporte->factura=$select_facturas;
        $nuevo_reporte->acuerdo=$acuerdo;
        $nuevo_reporte->id_canal=$canal;
        $nuevo_reporte->parametro=$parametro;
        $nuevo_reporte->save();
        return Response()->json($nuevo_reporte);
    }
}
