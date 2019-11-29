<?php
class UserData {
	public static $tablename = "usuarios";

	public function UserData(){
		$this->username = "";
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->is_active = "1";
		$this->is_admin = "";
		$this->is_inventario = "0";
		$this->created_at = "now()";
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." ( username, name, lastname, email, password, is_active, is_admin, is_inventario, created_date)";
		$sql .= "value (\"$this->username\",\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->password\",\"$this->is_active\",\"$this->is_admin\",\"$this->is_inventario\",$this->created_at)";
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

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",username=\"$this->username\",email=\"$this->email\",password=\"$this->password\",is_active=$this->is_active,is_admin=$this->is_admin where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_date desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function update_password($user_id,$password){
		$sql = "UPDATE ".self::$tablename." SET password ='$password' WHERE id = $user_id";
		Executor::doit($sql);
	}


}

?>