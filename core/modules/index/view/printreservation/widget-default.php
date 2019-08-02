<?php 
	$rx= ReservationData::getRepeated($_POST["pacient_id"],$_POST["medic_id"],$_POST["date_at"],$_POST["time_at"]);
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
	}
?>
<article>
	<div id="fondo">
    	<div id="fecha">
        	<h4><strong><?php echo $_POST["date_at"]; ?></strong></h4>
        </div>
        <div id="cedula">
        	<h4><strong>1309806</strong></h4>
        </div>
        <div id="nomedico">
			<?php
				$medic_id=$_POST["medic_id"];
				$medicid=MedicData::getById($medic_id);
			?>
        	<h4><strong><?php echo $medicid->name." ". $medicid->lastname;; ?></strong></h4>
        </div>
        
        <div id="paciente"> 
        	<?php
				$pacient_id = $_POST["pacient_id"];
				$pacientsid = PacientData::getById($pacient_id);
			?>
        	<h4><strong><?php echo $pacientsid->name ." ". $pacientsid->lastname; ?></strong></h4>
        </div>
        <div id="depart"> 
        	<h4><strong><?php echo $pacientsid->departamento; ?>  </strong> </h4> 
        </div>
        <div id="medicament"> 
        	<strong><?php echo nl2br(htmlentities($_POST["medicaments"])); ?></strong>
        </div>
    </div>
	<br>
	<div class="oculto">
		<button type="button" class="btn btn-primary" onclick='window.print(); void 0;'>
			<i class="fa fa-print fa-2x"></i> Imprimir </span>
		</button>
		<a href="index.php?view=pacients" class="btn btn-danger"><i class="fa fa-close fa-2x"></i> Salir</a>
	</div>
</article>