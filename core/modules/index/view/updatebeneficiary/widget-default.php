<?php
	$edit_titular = new beneficiaryData();
	$edit_titular->update($_GET["id"],$_POST["Nombre"],$_POST["Apellido"],$_POST["Departamento"]);
	Core::alert("Se ha actualizado con exito");
	if(!isset($_GET["act"])){
		Core::redir("index.php?view=incumbent");
	}else{
		Core::redir("index.php?view=newreservation2&id=".$_GET["id"]."&id_beneficiario=".$_GET["id_beneficiario"]."&id_titular=".$_GET["id_titular"]);
	}
?>