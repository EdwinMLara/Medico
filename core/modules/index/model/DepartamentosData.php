<?php
class DepartamentosData{
	public static $tablename = "departamentos";

	public function DepartamentosData(){
		$this->dpto_id = "";
		$this->nombre = "";
	}

	public function get_dptos(){
		$sql = "SELECT * FROM departamentos";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DepartamentosData());
	}
}
?>