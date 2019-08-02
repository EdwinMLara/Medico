<?php 
$rx = ReservationData::getRepeated($_POST["pacient_id"],$_POST["medic_id"],$_POST["date_at"],$_POST["time_at"]);
if($rx==null){
	$r = new ReservationData();
	$r->pacient_id = $_POST["pacient_id"];	
	$r->medic_id = $_POST["medic_id"];
	$r->date_at = $_POST["date_at"];
	$r->time_at = $_POST["time_at"];
	$r->user_id = $_SESSION["user_id"];
	$r->sick = $_POST["sick"];
	$r->symtoms = $_POST["symtoms"];
	$r->medicaments = $_POST["medicaments"];
	$r->add();

	Core::alert("Se guardo con exito!");
	
}else{
	Core::alert("Error al agregar, Cita Repetida!");
}
Core::redir("./index.php?view=pacients");
?>