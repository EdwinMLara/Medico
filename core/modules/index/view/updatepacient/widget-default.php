<?php

if(count($_POST)>0){
	$user = PacientData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->alergias = $_POST["alergias"];
	$user->update();
	Core::alert("Actualizado exitosamente!");
	print "<script>window.location='index.php?view=pacients';</script>";
}
?>