<?php
	class pacientesData{
		public static $tablename = "pacientes";

		public function pacientesData(){
			$this->id_medico = "";
			$this->Nombre = "";
			$this->Apellidos = "";
			$this->Alergias = "Ninguna";
			$this->Num_citas = "0";
		}

		public function insert(){
			$sql = "INSERT INTO ".self::$tablename. "(id_medico, Nombre, Apellidos, Alergias, Num_citas)"; 
			$sql.= "VALUES (\"$this->id_medico\",\"$this->Nombre\",\"$this->Apellidos\",\"$this->Alergias\",\"$this->Num_citas\")";
			Executor::doit($sql);
		}

		public static function getAll(){
			$sql = "SELECT * FROM ".self::$tablename." ORDER BY id_paciente DESC";
			$query = Executor::doit($sql);
			return Model::many($query[0],new pacientesData());
		}

	}
?>