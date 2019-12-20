<?php

if(count($_POST)>0){
	$user = PacientData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->alergias = $_POST["alergias"];
	$user->update();
	Core::alert("Actualizado exitosamente!");
	print "<script>window.location='index.php?view=newreservation2&id=".$_POST["user_id"]."&id_beneficiario=$user->id_beneficiario&id_titular=$user->id_titular';</script>";
}
?>