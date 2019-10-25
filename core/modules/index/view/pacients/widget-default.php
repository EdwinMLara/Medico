<div class="row">
	<div class="col-md-12">
		<h1>Pacientes</h1>
		<br>
		<?php
		$users = pacientData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<th>Nombre completo</th>
					<th></th>
				</thead>
				<?php
					foreach($users as $user){
				?>
				<tr>
					<td><?php echo $user->name." ".$user->lastname; ?></td>
					<td style="width:300px;">
						<a href="index.php?view=newreservation2&id=<?php echo $user->id_paciente;?>&id_beneficiario=<?php echo $user->id_beneficiario;?>&id_titular=<?php echo $user->id_titular?>" class="btn btn-success btn-xs">Nueva Cita</a>
						<a href="index.php?view=pacienthistory&id=<?php echo $user->id_paciente;?>" class="btn btn-info btn-xs">Historial</a>
					</td>
				</tr>
				<?php
			}
		}else{
			echo "<p class='alert alert-danger'>No hay pacientes</p>";
		}
		?>
	</div>
</div>