<?php
class  PacientData{
	public static $tablename = "pacient";
	public function PacientData(){
		$this->alergias = "";
		$this->created_at = "NOW()";
	}
	public function add(){
		$sql = "insert into ".self::$tablename." (name,lastname,departamento,alergias,created_at) ";
		$sql.= "value (\"$this->name\",\"$this->lastname\",\"$this->departamento\",\"$this->alergias\",$this->created_at)";
		Executor::doit($sql);
	}
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	// partiendo de que ya tenemos creado un objecto PacientData previamente utilizamos el contexto
	public function update_active(){
		$sql = "update ".self::$tablename." set last_active_at=NOW() where id=$this->id";
		Executor::doit($sql);
	}


	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",alergias=\"$this->alergias\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PacientData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PacientData());
	}
	
	/*public static function getDatos($name,$lastname){
		$sql = "select * from ".self::$tablename." where name=\"$name\" and lastname=\"$lastname\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PacientData());
	}*/
	
	public static function getDatos($name,$lastname){
		$sql = "select * from ".self::$tablename." where name=\"$name\" and lastname=\"$lastname\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new PacientData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->name = $r['name'];
			$data->lastname = $r['lastname'];
			$found = $data;
			break;
		}
		return $found;
	}
	
	public static function getByIddd($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PacientData());
	}

	public static function getAllActive(){
		$sql = "select * from client where last_active_at>=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PacientData());
	}

	public static function getAllUnActive(){
		$sql = "select * from client where last_active_at<=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PacientData());
	}

	public function getUnreads(){ return MessageData::getUnreadsByClientId($this->id); }

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or email like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PacientData());
	}

	public function get_json(){
		$sql = "SELECT * FROM ".self::$tablename." ORDER BY id DESC";
		$query = Executor::doit($sql);
		$aux = Model::many($query[0],new PacientData());
		$json_array = array('Nombres' => $aux);
		echo json_encode($json_array);
	}

	public static function getId_paciente($Nombre,$Apellidos){
		$sql = "SELECT id FROM ".self::$tablename." WHERE name = \"".$Nombre."\" && lastname = \"".$Apellidos."\"";
		$query = Executor::doit($sql);
		return  Model::one($query[0],new PacientData());
	}

	public static function get_all_by_name($Nombre,$Apellidos){
		$sql = "SELECT * FROM ".self::$tablename." WHERE name = \"".$Nombre."\" && lastname = \"".$Apellidos."\"";
		$query = Executor::doit($sql);
		return  Model::one($query[0],new PacientData());
	}
}

?>