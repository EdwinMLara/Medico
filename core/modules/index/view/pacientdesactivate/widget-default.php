<?php
	PacientData::desactivate($_GET["id"]);
	Core::redir("./index.php?view=pacients");
?>