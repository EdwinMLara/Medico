<?php
	include_once '../core/modules/index/model/medicamentosData.php';
	include_once '../core/autoload.php';
	$medicamentos = new medicamentosData();
	$medicamentos->get_json();
?>