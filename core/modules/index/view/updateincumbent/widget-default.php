<?php
	$edit_titular = new IncumbentData();
	$ruta_foto = $_POST["Nombre"]."-".$_POST["Apellido"]."-".$_POST["Departamento"].".png";
	$edit_titular->update($_GET["id_titular"],$_POST["Nombre"],$_POST["Apellido"],$_POST["Departamento"],$ruta_foto);
	PacientData::updateByidTitular($_GET["id_titular"],$_POST["Nombre"],$_POST["Apellido"],$_POST["Departamento"]);
	Core::alert("Se ha actualizado con exito");
	if(isset($_GET["act"])){
		Core::redir("index.php?view=incumbent");
	}else{
		Core::redir("index.php?view=newreservation2&id=".$_GET["id"]."&id_beneficiario=".$_GET["id_beneficiario"]."&id_titular=".$_GET["id_titular"]);
	}
?>