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

			  if($p = ibase_connect($servidor.":".$base_datos,$usuario,$password) or die (json_encode(array("estado"=>"N")))){
				  
				$sql = "Select documento.docuid, documento.tipoie,documento.codcomp,documento.codprefijo, documento.numero,documento.fecha,documento.fecvence,documento.terid,documento.detalle,documento.valor,documento.descuento,documento.neto,documento.saldo  as saldo ,(documento.vrinicial-documento.saldo) as recaudo, (documento.neto-documento.saldo) as recaudo ,documento.periodo, documento.sucid, documento.fecasent,documento.clasdoc, documento.fecserv, documento.vendedor, documento.vrbase , documento.vrinicial , documento,tipdocum, documento.nrodocum , terceros.nit, terceros.tipodociden, terceros.nittri, terceros.ciudadrexp , terceros.nombre, terceros.direcc1 , terceros.direcc2,terceros.zona1,terceros.zona2,terceros.ciudad,terceros.telef1,terceros.telef2,terceros.email,terceros.celular,terceros.empcelular,terceros.nomregtri, terceros.nombre1 , terceros.nombre2, terceros.apellido1, terceros.apellido2, terceros.natjuridica,terceros.nomempresa, DateDiff(DAY FROM  CAST(documento.fecha AS TIMESTAMP) to CURRENT_TIMESTAMP) as DIASMORA from documento join terceros on documento.terid = terceros.terid
				where terceros.nittri = '".$nittri."' and DateDiff(DAY FROM  CAST(documento.fecha AS TIMESTAMP)to CURRENT_TIMESTAMP) >24 and documento.codcomp in ('FV','NC','ND')";
        
				if($consulta =ibase_query($p,$sql)){
					// dd($nittri);
                            // dd($consulta);
                            // dd($h=ibase_fetch_assoc($consulta));
                            echo'<option value="">Seleciona</option>';
					 while($h = ibase_fetch_assoc($consulta)){


                            // dd($h);
                            
									echo'
                                    <option value="'.$h["CODCOMP"].'-'.$h["CODPREFIJO"].'-'.$h["NUMERO"].'">'.$h["CODCOMP"].'-'.$h["CODPREFIJO"].'-'.$h["NUMERO"].'</option>
                                    ';
			}
		}
    }
    
?> 