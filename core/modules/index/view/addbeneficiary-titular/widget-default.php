<?php
/*En insert el 0 significa que no hay foto. En cambio 1 hace referencia a que si se ha tomado la foto*/
	if(count($_POST) > 0){
		
		$titular = new IncumbentData();
		$titular->Nombre = ucwords($_POST["Nombre_titular"]);
		$titular->Apellidos = ucwords($_POST["Apellido_titular"]);
		$titular->Departamento = ucwords($_POST["Departamento"]);
		$titular->Ruta_foto =  "";
		$Nombre = ucwords($_POST["Nombre_titular"]);
		$Apellidos = ucwords($_POST["Apellido_titular"]);
		$titular->insert(0);

		$titular = IncumbentData::getId_titular($Nombre,$Apellidos);
		$id_titular = $titular->id_titular;

		$beneficiario_id_aux = 0;
		$paciente_id_aux = 0;
		$titular_id_aux = 0;

		$titular_id_aux = $id_titular;

		$beneficiary = new beneficiaryData();
		$beneficiary->id_titular = $id_titular;
		$beneficiary->Nombre = ucwords($_POST["Nombre_beneficiario"]);
		$beneficiary->Apellidos = ucwords($_POST["Apellido_beneficiario"]);
		$beneficiary->Parentesco = ucwords($_POST["Parentesco"]);
		$beneficiary->Ruta_foto = $beneficiary->Nombre."-".$beneficiary->Apellidos."-".$beneficiary->Parentesco.".png";
		$Nombre_beneficiario = ucwords($_POST["Nombre_beneficiario"]);
		$Apellidos_beneficiario = ucwords($_POST["Apellido_beneficiario"]);
		$beneficiary->insert(1);

		$id_beneficiario = beneficiaryData::getId_beneficiary($Nombre_beneficiario,$Apellidos_beneficiario);
		
		if($paciente = PacientData::getId_paciente($Nombre_beneficiario,$Apellidos_beneficiario)){
			PacientData::update_id_titular($id_titular,$paciente->id_paciente);
			PacientData::update_id_beneficiario($id_beneficiario->id_beneficiario,$paciente->id_paciente);
			$paciente_id_aux = $paciente->id_paciente;
			$beneficiario_id_aux = $id_beneficiario->id_beneficiario;
		} 

		
		
		

		Core::alert("Se Agrego un Nuevo Titular y se actualizo la foto del beneficiario!");
		print "<script>window.location='index.php?view=newreservation2&id=".$paciente_id_aux."&id_beneficiario=".$beneficiario_id_aux."&id_titular=".$titular_id_aux."';</script>";

	}
?>