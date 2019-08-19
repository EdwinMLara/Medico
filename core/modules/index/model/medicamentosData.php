<?php
class medicamentosData{
	public static $tablename = "medicamentos2";

	public function medicamentosData(){
		$this->Nombre = "";
		$this->status_producto = "";
		$this->Fecha = "NOW()";
		$this->En_inventario = "";
	}

	public function getAll(){
		$sql = "SELECT * FROM ".self::$tablename." ORDER BY id_producto DESC";
		$query = Executor::doit($sql);
		$aux = Model::many($query[0],new medicamentosData());
		echo $aux;
	}
}

echo "Prueba";
?>