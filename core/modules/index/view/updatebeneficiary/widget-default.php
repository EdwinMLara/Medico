<?php
	$edit_beneficiary = new beneficiaryData();
	$ruta_foto = $_POST["Nombre"]."-".$_POST["Apellido"]."-".$_POST["Departamento"].".png";
	$edit_beneficiary->update($_GET["id_beneficiario"],$_POST["Nombre"],$_POST["Apellido"],$_POST["Departamento"],$ruta_foto);
	PacientData::updateByidBeneficiario($_GET["id_beneficiario"],$_POST["Nombre"],$_POST["Apellido"],$_POST["Departamento"]);
	Core::alert("Se ha actualizado con exito");
	$act = (int)$_GET["act"]; 
	if($act){
		Core::redir("index.php?view=beneficiaries&Nombre=".$_GET["Nombre_titular"]."&Apellido=".$_GET["Apellido_titular"]."&id_titular=".$_GET["id_titular"]);
	}else{
		Core::redir("index.php?view=newreservation2&id=".$_GET["id"]."&id_beneficiario=".$_GET["id_beneficiario"]."&id_titular=".$_GET["id_titular"]);		
	}
?>