<?php
	$edit_titular = new IncumbentData();
	$edit_titular->update($_GET["id"],$_POST["Nombre"],$_POST["Apellido"],$_POST["Departamento"],$_POST["Num_familiares"]);
	Core::alert("Se ha actualizado con exito");
	Core::redir("index.php?view=incumbent");
?>