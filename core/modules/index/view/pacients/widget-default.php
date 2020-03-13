<div class="row">
	<div class="col-md-12">
		<h1>Pacientes</h1>
		<?php
		$id_usuario = $_SESSION["user_id"];
		$user_aux = UserData:: getById($id_usuario);
		$str = "";
		$badera_activacion = 0;
		//echo $user_aux->id." ".$user_aux->is_admin;
		if($user_aux->is_admin){ ?> 
			<a href="index.php?view=pacients&activos=1"> <button type="button" class="btn btn-primary">Activos</button></a>
			<a href="index.php?view=pacients&activos=0"> <button type="button" class="btn btn btn-info">Inactivos</button></a>
			<br>
		<?php
			if(isset($_GET["activos"])){
				if((int)$_GET["activos"]){
					$users = PacientData::getAll();
					$badera_activacion = 1;
					$str = "activos";
				}else{
					$users = PacientData::getAll_disable();
					$str = "inactivos";
					$badera_activacion = 0;
				}	
			}else{
				$badera_activacion = 0;
				$users = PacientData::getAll_disable();
				$str = "inactivos";
			}
		}else{
			$users = PacientData::getAll();
			$str = "activos";
			$badera_activacion = 1; 
		}
		if(count($users)>0){
			// si hay usuarios
			?>
			<br>
			<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<th>Nombre completo <?php echo $str; ?> </th>
					<th></th>
				</thead>
				<?php
					foreach($users as $user){
				?>
				<tr>
					<td><?php echo $user->name." ".$user->lastname; ?></td>
					<td style="width:300px;">
						<?php if(!$user_aux->is_admin){?>
							<a href="index.php?view=newreservation2&id=<?php echo $user->id_paciente;?>&id_beneficiario=<?php echo $user->id_beneficiario;?>&id_titular=<?php echo $user->id_titular?>" class="btn btn-success btn-xs">Nueva Cconsulta</a>
						<?php } ?>
						<a href="index.php?view=pacienthistory&id=<?php echo $user->id_paciente;?>" class="btn btn-info btn-xs">Historial</a>
						<?php
						if(!$badera_activacion){ ?>
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