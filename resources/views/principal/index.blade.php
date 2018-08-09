@extends('layout')



@section('contenido')

<?php
//incluimos el archivo de las clasess

//ruta de la base de datos en el servidor(ojo no es ruta de red) tiene que tener el siguiente formato con doble contraslash
$base_datos = "C:\\Datos TNS\\BLESS2018.GDB";

//la ip donde esté la base de datos
$servidor = "192.168.0.38";

//si es tns no hay que cambiar estas credenciales
$usuario = "SYSDBA";
$password = "masterkey";

//hacemos conexión

if($c = ibase_connect($servidor.':'.$base_datos,$usuario,$password) or die (json_encode(array("estado"=>"N")))){

	//listar 10 terceros
	$sql = "Select
	t.nit,
	(select nittri from terceros where nit=t.nit) as NITTRI,
	(select z.nombre from terceros te join zonas z ON z.zonaid = te.zona1 where nit=t.nit) as ZONA,
    (select c.nombre from terceros ter join clasifica c ON c.clasificaid = ter.clasificaid where nit=t.nit) as CLASIFICACION,
	(select nombre from terceros where nit=t.nit) as NOMBRE,
	(select direcc1 from terceros where nit=t.nit) as DIRECCION,
	(select telef1 from terceros where nit=t.nit) as TELEFONO,
	(select telef2 from terceros where nit=t.nit) as TELEFONO2,
	(select email from terceros where nit=t.nit) as EMAIL,
	MAX(DateDiff(DAY FROM  CAST(d.fecvence AS TIMESTAMP) to CURRENT_TIMESTAMP)) as DIASMORA,
	SUM(d.vrinicial)  as MONTOINICIAL,
	SUM(d.saldo)  as saldo ,
	(SUM(d.vrinicial)- SUM(d.saldo)) as RECAUDO


	from documento d
	join terceros t on d.terid = t.terid

	where
	d.saldo >= 1 AND
	t.zona1 in(".$string.") AND
	DateDiff(DAY FROM  CAST(d.fecvence AS TIMESTAMP) to CURRENT_TIMESTAMP) >24
	and d.codcomp in ('FV','NC','ND')
	GROUP BY t.nit";
 
    //hacemos la consulta
   
	if($consulta =ibase_query($c,$sql)){
		

         echo '<br><div class="card">
		 <div class="card-body">
			 <div class="table-responsive m-t-40">
			 <h2>GESTION DE CARTERA</h2>
				 <table id="myTable" class="table table-bordered table-striped">
					 <thead>
						 <tr>
							 <th>NIT</th>
							 <th>NITTRI</th>
							 <th>ZONA</th>
							 <th>CLASIFICACION</th>
							 <th>NOMBRE</th>
							 <th>DIRECCION</th>
							 <th>TELEFONO</th>
							 <th>TELEFONO 2</th>
							 <th>EMAIL</th>							 
							 <th>DIASMORA</th>							 
							 <th>MONTOINICAL</th>							 
							 <th>SALDO</th>							 
							 <th>RECAUDO</th>							 
							 <th></th>					 					 				 					 					 							 					 					 				 					 					 
						 </tr>
					 </thead>
					 <tbody id="clientes_tabla">  ';

					 while($r = ibase_fetch_assoc($consulta)){

					echo  ' <tr><td>'.$r["NIT"].'</td>
					<td>'.$r["NITTRI"].'</td> 
					<td>'.$r["ZONA"].'</td> 
					<td>'.$r["CLASIFICACION"].'</td>
					<td>'.$r["NOMBRE"].'</td>
					<td>'.$r["DIRECCION"].'</td>
					<td>'.$r["TELEFONO"].'</td>					
					<td>'.$r["TELEFONO2"].'</td>
					<td>'.$r["EMAIL"].'</td>
					<td>'.$r["DIASMORA"].'</td>
					<td>'.number_format($r["MONTOINICIAL"]).'</td>
					<td>'.number_format($r["SALDO"]).'</td>
					<td>'.number_format($r["RECAUDO"]).'</td>				
					<td><button class="btn btn-sm mdi mdi-border-color btn-success btn-outline cliente_modal" name="'. $r["NIT"] .'"</button></td>					
					</tr>  ';
				}
   echo ' 
</tbody>
</table>
</div>
</div>
</div>';
	}
}

echo'<div class="row menu_ocultar">
<!-- sample modal content -->
<div id="cliente" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
	<div class="modal-content" id="factura_compra" id="body_modal">
	  <div class="modal-header">
		  <strong><h3>GESTION DE CLIENTE</h3></strong>
	  </div>
	  <br>
	  <div class="modal-header">
	  <h4 id="cliente_nombre"></h4>
	  <h4 id="telefono_cliente"></h4>	  	
	  </div>
	  <div class="modal-body">

			<form>

			<input disabled id="id_nit" type="hidden" value=""></input>

					<div class="form-group">
					  <label for="recipient-name" class="control-label">CANALES:</label>
						<select class="form-control" id="canales_modal">
						<option value="">Selecciona</option>
						</select>
					</div>

					<div class="form-group" >
					  <label for="recipient-name" class="control-label">PARAMETROS:</label>
					  <select  class="form-control" id="parametros">
					  <option value="">Selecciona</option>					  
					  </select>
					</div>

<br>

				<div class="row">
					<div class="col-md-6">
                    <div class="form-group row">
                      <label class="control-label text-right col-md-3">FACTURAS:</label>
                      <div class="col-md-9">
                          <select id="select_facturas" class="form-control custom-select" >
                              <option value="" selected>Selecciona Una Opción</option>
                          </select>
                      </div>
                    </div>
				  </div>
				  

				  <div class="col-md-6">
                      <div class="form-group row">
                        <label class="control-label text-right col-md-3">DINERO ACORDADO:</label>
                        <div class="col-md-9">
                            <input type="text" id="acuerdo" class="form-control" placeholder="$ Acuerdo"  >
                        </div>
                      </div>
                    </div>
				</div>


					<div class="form-group" >
					  <label for="recipient-name" class="control-label">OBSERVACIONES:</label>
					  <textarea rows="4" cols="50" class="form-control" id="observaciones"></textarea>			  
					</div>


			</form>

			  <div class="modal-footer">
				  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cerrar_modal_vendedor">Cerrar</button>
				  <button type="button" class="btn btn-success waves-effect" data-dismiss="modal" id="guardar_datos_cliente">Guardar</button>
			  </div>
			  
			 
			  <div id="cuerpo_tabla">
				
				
			  </div> 

			  
		</div>
	  </div>
	</div>
  </div>
</div>' 
	  
?>

@endsection
