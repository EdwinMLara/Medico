<?php
	if(count($_POST)>0){
		$beneficiary = new beneficiaryData();
		$beneficiary->id_titular = $_POST["id_titular"];
		$id_titular = $_POST["id_titular"];
		$beneficiary->Nombre = ucwords($_POST["Nombre"]);
		$beneficiary->Apellidos = ucwords($_POST["Apellido"]);
		$beneficiary->Parentesco = ucwords($_POST["Parentesco"]);
		$beneficiary->Ruta_foto = $beneficiary->Nombre."-".$beneficiary->Apellidos."-".$beneficiary->Parentesco.".png";

		$Nombre_beneficiario = ucwords($_POST["Nombre"]);
		$Apellidos_beneficiario = ucwords($_POST["Apellido"]);
		$beneficiary->insert(1);

		$id_beneficiario = beneficiaryData::getId_beneficiary($Nombre_beneficiario,$Apellidos_beneficiario);
		$paciente = PacientData::getId_paciente($Nombre_beneficiario,$Apellidos_beneficiario);
		if(!$paciente){
			$paciente = new PacientData();
			$paciente->id_titular = $id_titular;
			$paciente->id_beneficiario = $id_beneficiario->id_beneficiario;
			$paciente->name = $beneficiary->Nombre;
			$paciente->lastname = $beneficiary->Apellidos;
			$paciente->alergias = $_POST["alergias"];
			$paciente->insert();
		}else{ 

			PacientData::update_id_titular($id_titular,$paciente->id_paciente);
			PacientData::update_id_beneficiario($id_beneficiario->id_beneficiario,$paciente->id_paciente);
		}

		Core::alert("Se Agrego un Nuevo Benefiario !");
		$Nombre_titular = $_POST["Nombre_titular"];
		$Apellido_titular = $_POST["Apellido_titular"];
		$ruta_redireccion = "index.php?view=beneficiaries&Nombre=$Nombre_titular&Apellido=$Apellido_titular&id_titular=$id_titular";
		print "<script>window.location='$ruta_redireccion';</script>";
	}
?>