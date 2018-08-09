<?php
//incluimos el archivo de las clasess
require_once "cBDFirebird.php";

//ruta de la base de datos en el servidor(ojo no es ruta de red) tiene que tener el siguiente formato con doble contraslash
$base_datos = "C:\\Datos TNS\\BLESS2018.GDB";

//la ip donde esté la base de datos
$servidor = "localhost";

//si es tns no hay que cambiar estas credenciales
$usuario = "SYSDBA";
$password = "masterkey";

//hacemos conexión
if($c = new dbFirebird($base_datos,$servidor,$usuario,$password)){

	//listar 10 terceros
	$sql = "Select documento.docuid, documento.tipoie,documento.codcomp,documento.codprefijo, documento.numero,documento.fecha,documento.fecvence,documento.terid,documento.detalle,documento.valor,documento.descuento,documento.neto,documento.saldo  as saldov , (documento.neto-documento.saldo) as recaudo ,documento.periodo, documento.sucid, documento.fecasent,documento.clasdoc, documento.fecserv, documento.vendedor, documento.vrbase , documento.vrinicial , documento,tipdocum, documento.nrodocum , terceros.nit, terceros.tipodociden, terceros.nittri, terceros.ciudadrexp , terceros.nombre, terceros.direcc1 , terceros.direcc2,terceros.zona1,terceros.zona2,terceros.ciudad,terceros.telef1,terceros.telef2,terceros.email,terceros.celular,terceros.empcelular,terceros.nomregtri, terceros.nombre1 , terceros.nombre2, terceros.apellido1, terceros.apellido2, terceros.natjuridica,terceros.nomempresa  from documento join terceros on documento.terid = terceros.terid";

	//hacemos la consulta
	if($consulta = $c->consulta($sql)){

		//hacemos un bucle y listamos el resultado
		while($r = ibase_fetch_assoc($consulta)){

				echo  $r["DOCUID"]." -- ".utf8_encode($r["TIPOIE"])." -- ".utf8_encode($r["CODCOMP"])." -- ".$r["TELEF1"]."<br>";
		}
	}


}

?>