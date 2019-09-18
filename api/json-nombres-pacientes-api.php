<?php
	include_once '../core/modules/index/model/PacientData.php';
	include_once '../core/autoload.php';
	$nombres_pacientes = new PacientData();
	$nombres_pacientes->get_json();
?>

