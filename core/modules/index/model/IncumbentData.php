<?php
class IncumbentData{
	public static $tablename = "titulares";

	public function IncumbentData(){
		$this->Nombre = "";
		$this->Apellidos = "";
		$this->Departamento = "";
		$this->Num_familiares = "";
		$this->Ruta_foto = "";
		$this->fecha_registro = "NOW()";
	}

	public function insert(){
		$sql = "insert into ".self::$tablename."(Nombre,Apellidos,Departamento,Num_familiares,Ruta_foto,fecha_registro)";
		$sql.= "value (\"$this->Nombre\",\"$this->Apellidos\",\"$this->Departamento\",\"$this->Num_familiares\",\"$this->Ruta_foto\",$this->fecha_registro)";
		Executor::doit($sql);
	}

	public static function getId_titular($Nombre,$Apellidos){
		$sql = "SELECT id FROM ".self::$tablename." WHERE Nombre = \"".$Nombre."\" && Apellidos = \"".$Apellidos."\"";
		$query = Executor::doit($sql);
		return  Model::one($query[0],new IncumbentData());
	}
}
?>