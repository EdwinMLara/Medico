<?php

if(count($_POST)>0){
	$titular = new IncumbentData();
	$titular->Nombre = ucwords($_POST["Nombre"]);
	$titular->Apellidos = ucwords($_POST["Apellido"]);
	$titular->Departamento = ucwords($_POST["Departamento"]);
	$titular->Ruta_foto =  $titular->Nombre."-".$titular->Apellidos."-".$titular->Departamento.".png";
	$Nombre = ucwords($_POST["Nombre"]);
	$Apellidos = ucwords($_POST["Apellido"]);
	$titular_aux;

	if($titular_aux =  IncumbentData::getId_titular($Nombre,$Apellidos)){
		IncumbentData::update_ruta_foto($titular->Ruta_foto,$titular_aux->id_titular);
		$mensaje = "Se ha actualizado la foto";
	}else{
		$titular->insert(1);
		$paciente = new PacientData();
		$paciente->name = $titular->Nombre;
		$paciente->lastname = $titular->Apellidos;
		$paciente->departament = $titular->Departamento;
		$paciente->alergias = $_POST["alergias"];
		$paciente->insert();
		$titular_aux = IncumbentData::getId_titular($Nombre,$Apellidos);
		$mensaje = "Se Agrego un Nuevo Titular !";
	}
	
	
	if($paciente = PacientData::getId_paciente($Nombre,$Apellidos)){ 
		echo $titular_aux->id_titular;
		echo $paciente->id_paciente;
		PacientData::update_id_titular($titular_aux->id_titular,$paciente->id_paciente);
	}
	
	//Core::alert($mensaje);
		//print "<script>window.location='index.php?view=incumbent';</script>";
}
?>