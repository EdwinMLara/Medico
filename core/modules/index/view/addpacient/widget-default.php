<?php

if(count($_POST)>0){
	$user = new PacientData();
	$user->name = ucwords($_POST["name"]);
	$user->lastname = ucwords($_POST["lastname"]);
	$user->departamento = ucwords($_POST["departamento"]);
	$user->alergias=ucwords($_POST["alergias"]);
	$name = ucwords($_POST["name"]);
	$lastname = ucwords($_POST["lastname"]);
	$alergias = ucwords($_POST["alergias"]);
	$user->add();
	Core::alert("Se agrego el paciente correctamente!");
	//Core::alert("Vamos a agregar la nota medica");
	print "<script>window.location='index.php?view=newreservation&name=$name&lastname=$lastname&alergias=$alergias';</script>";
}
?>