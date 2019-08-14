<?php
	if(count($_POST)>0){
		$beneficiary = new beneficiaryData();
		$beneficiary->id_titular = $_POST["id_titular"];
		$beneficiary->Nombre = ucwords($_POST["Nombre"]);
		$beneficiary->Apellidos = ucwords($_POST["Apellido"]);
		$beneficiary->Parentesco = ucwords($_POST["Parentesco"]);
		$beneficiary->Ruta_foto = $beneficiary->Nombre."-".$beneficiary->Apellidos."-".$beneficiary->Parentesco.".png";
		$beneficiary->insert();

		$paciente = new pacientesData();
		$paciente->id_medico = 1;
		$paciente->Nombre = $beneficiary->Nombre;
		$paciente->Apellidos = $beneficiary->Apellidos;
		$paciente->insert();

		Core::confirm("Desea agregar otro beneficiario",$_POST["Nombre_titular"],$_POST["Apellido_titular"]);
	}
?>