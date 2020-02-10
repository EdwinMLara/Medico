<?php
	if($_GET["active"]){
		PacientData::activate($_GET["id"]);
	}else{
		PacientData::desactivate($_GET["id"]);
	}
	Core::redir("./index.php?view=pacients");
?>