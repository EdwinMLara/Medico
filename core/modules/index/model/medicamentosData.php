<?php
class medicamentosData{
	public static $tablename = "medicamentos2";

	public function medicamentosData(){
		$this->Nombre = "";
		$this->Status_producto = "";
		$this->Fecha = "NOW()";
		$this->En_inventario = "";
	}

	public function get_json(){
		$sql = "SELECT * FROM ".self::$tablename." ORDER BY id_medicamento DESC";
		$query = Executor::doit($sql);
		$aux = Model::many($query[0],new medicamentosData());
		$json_array = array('Medicamentos' => $aux);
		echo json_encode($json_array);
	}
}
?>