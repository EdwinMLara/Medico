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
		$paciente = PacientData::getId_paciente($Nombre_beneficiario,$Apellidos_beneficiario)
		if(!$paciente){
			$paciente = new PacientData();
			$paciente->name = $beneficiary->Nombre;
			$paciente->lastname = $beneficiary->Apellidos;
			$paciente->departament = $beneficiary->Departamento;
			$paciente->alergias = $_POST["alergias"];
			$paciente->insert();
		} 

		PacientData::update_id_titular($id_titular,$paciente->id_paciente);
		PacientData::update_id_beneficiario($id_beneficiario->id_beneficiario,$paciente->id_paciente);

		Core::alert("Se Agrego un Nuevo Benefiario !");
		print "<script>window.location='index.php?view=home';</script>";
	}
?>