<?php
$pacient = PacientData::getById($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
		<div class="btn-group pull-right"></div>
		<h1>Historial de Citas del Paciente</h1>
		<h4>Paciente: <?php echo $pacient->name." ".$pacient->lastname;?></h4>
		<br>
		<?php
			$users = ReservationData::getAllByPacientId($_GET["id"]);
			if(count($users)>0){
			// si hay usuarios
		?>
				<table class="table table-bordered table-hover">
					<thead>
						<th>Paciente</th>
						<th>Medico</th>
						<th>Enfermedad</th>
						<th>Sintomas</th>
						<th>Medicamentos</th>
						<th>Fecha</th>
					</thead>
		<?php
					foreach($users as $user){
						$pacient  = $user->getPacient();
						$medic = $user->getMedic();
		?>
					<tr>
						<td><?php echo $pacient->name." ".$pacient->lastname; ?></td>
						<td><?php echo $medic->name." ".$medic->lastname; ?></td>
						
						<td><?php echo $user->sick; ?></td>
						<td><?php echo $user->symtoms; ?></td>
						<td><?php echo $user->medicaments; ?></td>
						
						<td><?php echo $user->date_at; ?></td>
					</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay citas</p>";
		}


		?>


	</div>
</div>