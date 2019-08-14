<?php
	$titular =  new IncumbentData();
	$titular->delete($_GET["id"]);
	Core::alert("Se ha eliminado con exito");
	Core::redir("index.php?view=incumbent");
?>