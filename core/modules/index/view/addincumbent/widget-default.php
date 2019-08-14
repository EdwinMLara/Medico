<?php

if(count($_POST)>0){
	$titular = new IncumbentData();
	$titular->Nombre = ucwords($_POST["Nombre"]);
	$titular->Apellidos = ucwords($_POST["Apellido"]);
	$titular->Departamento = ucwords($_POST["Departamento"]);
	$titular->Ruta_foto =  $titular->Nombre."-".$titular->Apellidos."-".$titular->Departamento.".png";
	$titular->Num_familiares=ucwords($_POST["Num_familiares"]);
	$Nombre = ucwords($_POST["Nombre"]);
	$Apellidos = ucwords($_POST["Apellido"]);
	$titular->insert();

	$paciente = new pacientesData();
	$paciente->id_medico = 1;
	$paciente->Nombre = $titular->Nombre;
	$paciente->Apellidos = $titular->Apellidos;
	$paciente->insert();

	Core::alert("Se Agrego un Nuevo Titular !");
	print "<script>window.location='index.php?view=newbeneficiary&Nombre=$Nombre&Apellido=$Apellidos';</script>";
}
?>