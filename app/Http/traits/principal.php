<?php

namespace App\traits;
//  * 
//  */
trait principaltrait
{
    public function conectar()
    {
		$this->servidor = $servidor;
		$this->usuario  = $usuario;
		$this->password = $password;
		$this->ruta     = $ruta;
		
		$this->conexion = ibase_connect($this->servidor.":".$this->ruta,$this->usuario,$this->password) or die (json_encode(array("estado"=>"N")));
    }
}
