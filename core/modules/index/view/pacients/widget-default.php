<div class="row">
	<div class="col-md-12">
		<h1>Pacientes</h1>
		<br>
		<?php
		$id_usuario = $_SESSION["user_id"];
		$user_aux = UserData:: getById($id_usuario);
		//echo $user_aux->id." ".$user_aux->is_admin;
		if($user_aux->is_admin){
			$users = PacientData::getAll_disable();
		}else{
			$users = PacientData::getAll();
		}
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
						<?php
						if($user_aux->is_admin){ ?>
							<a href="index.php?view=pacientdesactivate&id=<?php echo $user->id_paciente;?>&active=1" class="btn btn-warning btn-xs">activar</a>
						<?php
						}else{ ?>
							<a href="index.php?view=pacientdesactivate&id=<?php echo $user->id_paciente;?>&active=0" class="btn btn-warning btn-xs">Desactivar</a>
						<?php
						}
						?>
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