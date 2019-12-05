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

	public static function get_id_medicamento($Nombre){
		$sql = "SELECT id_medicamento, codigo_medicamento, En_inventario FROM medicamentos WHERE nombre_producto = '$Nombre'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new medicamentosData());
	}
}
?>