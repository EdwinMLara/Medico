<?php

if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	$user = UserData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->medic_id = $_POST["medic_id"];
	$user->is_admin=$is_admin;
	$user->is_active=$is_active;
	

	if($_POST["password"]!=""){
		$user->password = password_hash($_POST["password"],PASSWORD_DEFAULT);
		print "<script>alert('Se ha actualizado el password');</script>";

	}
	$user->update();

	print "<script>window.location='index.php?view=users';</script>";


}


?>