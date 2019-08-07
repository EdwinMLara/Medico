<?php
class beneficiaryData{
	
	public static $tablename = "beneficiarios";

	public function beneficiaryData(){
		$this->id_titular = 0;
		$this->Nombre = "";
		$this->Apellidos = "";
		$this->Ruta_foto = "";
		$this->Fecha_registro = "NOW();"
	}

	public function insert(){
		$sql = "insert into ".self::$tablename."(id_titular,Nombre,Apellidos,Parentesco,Ruta_foto,fecha_registro)";
		$sql.= "value ($this->id_titular,\"$this->Nombre\",\"$this->Apellidos\",\"$this->Parentesco\",\"$this->Ruta_foto\",$this->fecha_registro)";
		Executor::doit($sql);
	}
}
?>