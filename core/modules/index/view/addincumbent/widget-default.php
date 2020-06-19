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

	$beneficiario_id_aux = 0;
	$paciente_id_aux = 0;
	$titular_id_aux = 0;
	$bandera = 0;

	if($titular_aux =  IncumbentData::getId_titular($Nombre,$Apellidos)){
		$paciente = PacientData::getId_paciente($Nombre,$Apellidos);
		IncumbentData::update_ruta_foto($titular->Ruta_foto,$titular_aux->id_titular);
		PacientData::update_id_titular($titular_aux->id_titular,$paciente->id_paciente);
		$mensaje = "Se ha actualizado la foto";
		$bandera = 1;
		$paciente_id_aux = $paciente->id_paciente;
		$titular_id_aux = $titular_aux->id_titular;
		$beneficiario_id_aux = $paciente->id_beneficiario;
		
	}else{
		$titular->insert(1);
		if($paciente = PacientData::getId_paciente($Nombre,$Apellidos)){
			$titular_aux = IncumbentData::getId_titular($Nombre,$Apellidos); 
			PacientData::update_id_titular($titular_aux->id_titular,$paciente->id_paciente);
			$mensaje = "Se ha actualizado la foto";
			$paciente_id_aux = $paciente->id_paciente;
			$titular_id_aux = $titular_aux->id_titular;
			$beneficiario_id_aux = $paciente->id_beneficiario;
		}else{
			$paciente = new PacientData();
			$paciente->name = $titular->Nombre;
			$paciente->lastname = $titular->Apellidos;
			$paciente->departament = $titular->Departamento;
			$paciente->alergias = $_POST["alergias"];
			$paciente->insert();
			$paciente = PacientData::getId_paciente($Nombre,$Apellidos);
			$titular_aux = IncumbentData::getId_titular($Nombre,$Apellidos);
			PacientData::update_id_titular($titular_aux->id_titular,$paciente->id_paciente);
			$mensaje = "Se Agrego un Nuevo Titular !";
		}
	}
	
	Core::alert($mensaje);
	if($bandera){
		print "<script>window.location='index.php?view=newreservation2&id=".$paciente_id_aux."&id_beneficiario=".$beneficiario_id_aux."&id_titular=".$titular_id_aux."';</script>";
	}else{
		print "<script>window.location='index.php?view=incumbent';</script>";
	}	
}
?>