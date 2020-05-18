<?php
class beneficiaryData{
	
	public static $tablename = "beneficiarios";

	public function beneficiaryData(){
		$this->id_titular = "";
		$this->Nombre = "";
		$this->Apellidos = "";
		$this->Parentesco = "";
		$this->Ruta_foto = "";
		$this->is_foto = "";
		$this->Fecha_registro = "NOW()";
	}

	public static function getId_beneficiary($Nombre,$Apellidos){
		$sql = "SELECT id_beneficiario FROM ".self::$tablename." WHERE Nombre = \"".$Nombre."\" && Apellidos = \"".$Apellidos."\"";
		$query = Executor::doit($sql);
		return  Model::one($query[0],new IncumbentData());
	}

	public function update($id,$Nombre,$Apellidos,$Parentesco,$ruta_foto){
		$sql = "UPDATE beneficiarios SET Nombre= '$Nombre',Apellidos = '$Apellidos',Parentesco= '$Parentesco', Ruta_foto= '$ruta_foto' WHERE id_beneficiario = $id;";
		Executor::doit($sql);		
	}

	public function insert($is_foto){
		$sql = "INSERT INTO ".self::$tablename."(id_titular,Nombre,Apellidos,Parentesco,Ruta_foto,is_foto,Fecha_registro)";
		$sql.= "value ($this->id_titular,\"$this->Nombre\",\"$this->Apellidos\",\"$this->Parentesco\",\"$this->Ruta_foto\",\"$is_foto\",$this->Fecha_registro)";
		Executor::doit($sql);
	}

	public static function getAll_byID($id){
		$sql = "SELECT * FROM ".self::$tablename." WHERE id_titular = $id ORDER BY id_beneficiario DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IncumbentData);
	}
}
?>