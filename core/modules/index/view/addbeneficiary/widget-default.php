<?php
	if(count($_POST)>0){
		$beneficiary = new beneficiaryData();
		$id_titular = $_POST["id_titular"];
		$beneficiary->id_titular = $id_titular;
		$beneficiary->Nombre = ucwords($_POST["Nombre"]);
		$beneficiary->Apellidos = ucwords($_POST["Apellido"]);
		$beneficiary->Parentesco = ucwords($_POST["Parentesco"]);
		$beneficiary->Ruta_foto = $beneficiary->Nombre."-".$beneficiary->Apellidos."-".$beneficiary->Parentesco.".png";

		$beneficiario_id_aux = 0;
		$paciente_id_aux = 0;
		$titular_id_aux = 0;
	
		$Nombre_beneficiario = ucwords($_POST["Nombre"]);
		$Apellidos_beneficiario = ucwords($_POST["Apellido"]);
		$beneficiary->insert(1);

		if(isset($_POST["id_paciente_beneficiario"])){
			$id_paciente_beneficiario = $_POST["id_paciente_beneficiario"];
			$paciente = PacientData::getById($id_paciente_beneficiario);
		}
		

		$id_beneficiario = beneficiaryData::getId_beneficiary($Nombre_beneficiario,$Apellidos_beneficiario);
		
		
		if(!isset($paciente)){
			$paciente = new PacientData();
			$paciente->id_titular = $id_titular;
			$paciente->id_beneficiario = $id_beneficiario->id_beneficiario;
			$paciente->name = $beneficiary->Nombre;
			$paciente->lastname = $beneficiary->Apellidos;
			$paciente->alergias = $_POST["alergias"];
			$paciente->insert();

			Core::alert("Se Agrego un Nuevo Benefiario !");
			$Nombre_titular = $_POST["Nombre_titular"];
			$Apellido_titular = $_POST["Apellido_titular"];
			$ruta_redireccion = "index.php?view=beneficiaries&Nombre=$Nombre_titular&Apellido=$Apellido_titular&id_titular=$id_titular";
			print "<script>window.location='$ruta_redireccion';</script>";
		}else{ 
			PacientData::update_id_titular($id_titular,$paciente->id_paciente);
			PacientData::update_id_beneficiario($id_beneficiario->id_beneficiario,$paciente->id_paciente);
			$beneficiario_id_aux = $id_beneficiario->id_beneficiario;
			$paciente_id_aux = $paciente->id_paciente;
			$titular_id_aux = $id_titular;
			$mensaje = "Se actulizo la foto de beneficiario";
			Core::alert($mensaje);
			print "<script>window.location='index.php?view=newreservation2&id=".$paciente_id_aux."&id_beneficiario=".$beneficiario_id_aux."&id_titular=".$titular_id_aux."';</script>";	
		}
		
	}
?>