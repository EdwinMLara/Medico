<?php
class IncumbentData{
	public static $tablename = "titulares";

	public function IncumbentData(){
		$this->fecha_registro = "NOW()";
	}

	public function insert(){
		$sql = "insert into ".self::$tablename."(Nombre,Apellidos,Departamento,Num_familiares,fecha_registro)";
		$sql.= "value (\"$this->Nombre\",\"$this->Apellidos\",\"$this->Departamento\",\"$this->Num_familiares\",$this->fecha_registro)";
		Executor::doit($sql);
	}

	public static function getAll(){
		
	}
}
?>