<?php
class medicamentosData{
	public static $tablename = "medicamentos";

	public function medicamentosData(){
		$this->id_medicamento = "";
		$this->codigo_medicamento = "";
		$this->nombre_producto = "";
		$this->status_producto = "";
		$this->created_at = "";
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