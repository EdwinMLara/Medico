<?php
	$beneficiario =  new beneficiaryData();
	$beneficiario->delete($_GET["id_beneficiario"]);
	$id_titular = $_GET["id_titular"];
	$nombre = $_GET["Nombre_titular"];
	$apellido = $_GET["Apellido_titular"];	

	Core::alert("Se ha eliminado con exito");
	Core::redir("index.php?index.php?view=beneficiaries&Nombre=$nombre&Apellido=$apellido&id_titular=$id_titular");
?>