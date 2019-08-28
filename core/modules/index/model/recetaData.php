<?php
class recetaData{
	public static $tablename = "recetas";

	public function recetaData(){
		$this->id_medico = "";
		$this->id_paciente = "";
		$this->Medicamentos = array("Ninguno1", "Ninguno2", "Ninguno3", "Ninguno4", "Ninguno5");
		$this->Cantidades  = array("0", "0", "0", "0", "0");
		$this->Fecha = "NOW()";
	}

	public function insert(){
		$sql = "INSERT INTO ".self::$tablename."(id_medico, id_paciente, Medicamento1, Cantidad1, Medicamento2, Cantidad2, Medicamento3, Cantidad3, Medicamento4, Cantidad4, Medicamento5, Cantidad5, fecha)";
		$sql .=  "VALUES (\"$this->id_medico\",\"$this->id_paciente\",";
		foreach (array_combine($this->Medicamentos,$this->Cantidades) as $key => $value) {
			$sql .= "\"$key\",\"$value\",";
		}
		$sql .= "\"$this->Fecha\")";
		Executor::doit($sql);
	}
	
}
?>