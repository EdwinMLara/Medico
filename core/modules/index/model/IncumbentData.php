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
		$sql = "INSERT INTO ".self::$tablename."(Nombre,Apellidos,Departamento,Num_familiares,Ruta_foto,fecha_registro)";
		$sql.= "value (\"$this->Nombre\",\"$this->Apellidos\",\"$this->Departamento\",\"$this->Num_familiares\",\"$this->Ruta_foto\",$this->fecha_registro)";
		Executor::doit($sql);
	}

	public function delete($id){
		$sql = "DELETE FROM ".self::$tablename." WHERE id_titular =$id";
		Executor::doit($sql);
	}

	public function update($id,$Nombre,$Apellidos,$Departamento,$Num_familiares){
		$sql = "UPDATE ".self::$tablename." SET Nombre=\"$Nombre\", Apellidos = \"$Apellidos\", Departamento = \"$Departamento\", Num_familiares = \"$Num_familiares\" WHERE id_titular = $id";
		Executor::doit($sql);
	}

	//hay la probabilidad de que en algun momento exista dos personas con el mismo nombre hay que mejorar la consulta despues
	public static function getId_titular($Nombre,$Apellidos){
		$sql = "SELECT id_titular FROM ".self::$tablename." WHERE Nombre = \"".$Nombre."\" && Apellidos = \"".$Apellidos."\"";
		$query = Executor::doit($sql);
		return  Model::one($query[0],new IncumbentData());
	}

	public static function getAll(){
		$sql = "SELECT * FROM ".self::$tablename." ORDER BY id_titular DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IncumbentData);
	}
	
}
?>