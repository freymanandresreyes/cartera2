
<?php
//error_reporting(0);
class dbFirebird{

	private $servidor;
	private $usuario;
	private $password;
	private $ruta;
	private $conexion;
	private $idConsulta;
	
	public function __construct($ruta,$servidor,$usuario,$password){

		$this->servidor = $servidor;
		$this->usuario  = $usuario;
		$this->password = $password;
		$this->ruta     = $ruta;
		
		$this->conexion = ibase_connect($this->servidor.":".$this->ruta,$this->usuario,$this->password) or die (json_encode(array("estado"=>"N")));
	}
	public function consulta($query){
			return $this->idConsulta = ibase_query($this->conexion,$query);
	}
	
	public function consulta_retorno($query){
			return $this->idConsulta = ibase_prepare($this->conexion,$query) or die(ibase_errmsg());
	}
}
?>