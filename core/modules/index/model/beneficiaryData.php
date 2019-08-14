<?php
class beneficiaryData{
	
	public static $tablename = "beneficiarios";

	public function beneficiaryData(){
		$this->id_titular = 0;
		$this->Nombre = "";
		$this->Apellidos = "";
		$this->Parentesco = "";
		$this->Ruta_foto = "";
		$this->Fecha_registro = "NOW()";
	}

	public function insert(){
		$sql = "insert into ".self::$tablename."(id_titular,Nombre,Apellidos,Parentesco,Ruta_foto,Fecha_registro)";
		$sql.= "value ($this->id_titular,\"$this->Nombre\",\"$this->Apellidos\",\"$this->Parentesco\",\"$this->Ruta_foto\",\"$this->Fecha_registro\")";
		Executor::doit($sql);
	}

	public function update($id,$Nombre,$Apellidos,$Parentesco){
		$sql = "UPDATE ".self::$tablename." SET Nombre=\"$Nombre\", Apellidos = \"$Apellidos\", Parentesco = \"$Parentesco\", WHERE id_beneficiario = $id";
		Executor::doit($sql);
	}

	public static function getAll(){
		$sql = "SELECT * FROM ".self::$tablename." ORDER BY id_beneficiario DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IncumbentData);
	}
}
?>