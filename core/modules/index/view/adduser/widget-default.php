<?php
/**
* BookMedik
* @author evilnapsis
* @url http://evilnapsis.com/about/
**/

if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){
		$is_admin=1;
	}
	$user = new UserData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->is_admin=$is_admin;
	$user->medic_id = $_POST["medico"];
	if(isset($_POST["is_farmacia"])){
		$is_farmacia=1;
		$user->is_inventario = $is_farmacia;
	}
	$user->password = password_hash($_POST["password"],PASSWORD_DEFAULT);
	$user->add();

	print "<script>window.location='index.php?view=users';</script>";


}


?>