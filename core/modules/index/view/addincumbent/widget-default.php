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

	if($paciente =  IncumbentData::getId_titular($Nombre,$Apellidos)){

		IncumbentData::update_ruta_foto($titular->Ruta_foto,$paciente->id_titular);

		Core::alert("Se actualizo la fotografia del titular!");
		print "<script>window.location='index.php?index.php?view=home';</script>";
	}else{
		$titular->insert(1);
		Core::alert("Se Agrego un Nuevo Titular !");
		print "<script>window.location='index.php?index.php?view=home';</script>";
	}
	
	$titular = IncumbentData::getId_titular($Nombre,$Apellidos);
	if($paciente = PacientData::getId_paciente($Nombre,$Apellidos)){ 
		PacientData::update_id_titular($titular->id_titular,$paciente->id_paciente);
	}
	
}
?>