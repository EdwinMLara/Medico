<?php
	$pacients = PacientData::getAll();
	$medics = MedicData::getAll();

	$idexis=$_GET['id'];
	$pacientsid = pacientData::getById($idexis);

	include('modal-titulares.php');

	
	if(((int)$pacientsid->id_titular) == 0){
		echo '<script>
	    		$("#myModal").modal();
			</script>';
	}
?>
<div class="row">
	<div class="col-md-12">
		<h1>Nueva Consulta</h1>
		<!--<form class="form-horizontal" role="form" method="post" action="./?action=addreservation">  -->
		<form autocomplete="off" id="formP"class="form-horizontal" role="form" method="post" action="index.php?view=printreservation">  
			<div class="col-md-7">
			<div class="form-group">
				<div class="col-md-3">
					<label for="inputEmail1" class="col-lg-2 control-label">Paciente</label>
				</div>
				<div class="col-md-6">
					<input type="text" name="pacient_name" required class="form-control" id="inputEmail1" value="<?php echo $pacientsid->name ." ". $pacientsid->lastname;?>">
					<input type="hidden" name="pacient_id" required class="form-control" id="inputEmail1" value="<?php echo $idexis;?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<label for="inputEmail1" class="col-lg-2 control-label">Medico</label>
				</div>
				<div class="col-md-6">
					<select name="medic_id" class="form-control" required>
						<?php foreach($medics as $p):?>
						<option value="<?php echo $p->id; ?>"><?php echo $p->name." ".$p->lastname; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<label for="inputEmail1" class="col-lg-2 control-label">Fecha:</label>
				</div>
				<div class="col-md-6">
					<input type="date" name="date_at" required class="form-control" id="inputEmail1" placeholder="Fecha">
				</div>			
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<label for="inputEmail1" class="col-lg-2 control-label">Hora:</label>
				</div>
				<?php
					date_default_timezone_set('MST');
					$hoy = date("H:i");
				?>
				<div class="col-md-3">
					<input type="text" name="time_at" required class="form-control" id="inputEmail1" value="<?php echo $hoy; ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Enfermedad</label>
				<div class="col-md-10">
					<textarea class="form-control" name="sick" placeholder="Enfermedad"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Sintomas</label>
				<div class="col-md-10">
					<textarea class="form-control" name="symtoms" placeholder="Sintomas"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail1" class="col-lg-5 control-label">Cantidad de Medicamentos</label>
				<div class="col-md-7">
					<select class="form-control" name="Num_medicamentos" id="medi" onchange="medicamentos(event,'Receta');" >
		              <option selected>1</option>
		                <option>2</option>
		                <option>3</option>
		                <option>4</option>
		                <option>5</option>
		            </select>
				</div>
			</div>
			<div class="col-md-12 receta" id="Receta">
				<h4>Receta</h4>
				<div class="form-group marco" id="form1">
					<label for="inputEmail1" class="col-lg-2 control-label">Medicamento</label>
					<div class="col-md-6">
						<input id="myInput" type="text" name="Medicamento1" class="form-control" placeholder="Nombre del Medicamento">
						<input type="hidden" id="inputH1" name="id_medicamento1" class="" placeholder="">
					</div>
					<label for="inputEmail1" class="col-lg-2 control-label">Cantidad</label>
					<div class="col-md-2">
						<select class="form-control" name="Cantidad1">
			              <option selected>1</option>
			                <option>2</option>
			                <option>3</option>
			                <option>4</option>
			                <option>5</option>
			            </select>
					</div>
					<label for="inputEmail1" class="col-lg-2 control-label">Prescripción</label>
					<div class="col-md-10">
						<textarea class="form-control" name="Prescripcion1" placeholder="Prescripción"></textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-default">Agregar Cita</button>
				</div>
			</div>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="user_foto">
						<img src="
							<?php
								$path = 'uploads/images/';
								$user_image_general = $path.'user-foto.jpg';
								$id_beneficiario = $pacientsid->id_beneficiario;
								$id_titular = $pacientsid->id_titular;
								if($id_beneficiario != '0'){
									if($pacient_inner = PacientData::get_ruta_foto($id_beneficiario)){
										$user_image_general = $path.$pacient_inner->Ruta_foto;
										echo $user_image_general;
									}else{
										echo $user_image_general;
									}
								}else{
									if(($pacient_inner = PacientData::get_ruta_foto_titular($id_titular)) && ($id_titular != '0')){
										$user_image_general = $path.$pacient_inner->Ruta_foto;
										echo $user_image_general;
									}else{
										echo $user_image_general;
									}
								}
							?>
						">						
					</div>
				</div>
				<div class="row">
					<div class="panel panel-warning">
						<div class="panel-heading">
							<center>
								<strong><h4>Alergias <a href="index.php?view=editpacient&id=<?php echo $pacientsid->id;?>" class="btn btn-default btn-xs"> Editar  <i class="glyphicon glyphicon-edit"></i></a></h4></strong>
							</center>
						</div>
						<div class="panel-body">
							<?php
								//$pacient = PacientData::getById($idp);
								$alergias=$pacientsid->alergias;
								if($alergias!=" "){
									echo '<center><h4 style="color:#EF0B0F">'.$alergias.'</h4></center>';
								}else{
									echo "El Paciente no tiene alergias";
								}
							?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="panel panel-info">
						<div class="panel-heading">
							<center><strong><h4>Ultimas 3 Citas</h4></strong></center>
						</div>
						<div class="panel-body">
							<?php
								$users = ReservationData::getAllByPacientId3($idexis);
									if(count($users)>0){ ?>
										<table class="table table-striped table-bordered table-hover">
											<thead>
												<th>Fecha</th>
												<th>Enfermedad</th>
											</thead>
									<?php
										foreach($users as $uss){ ?>
											<tr>
												<td><?php echo $uss->created_date; ?></td>
												<td><?php echo $uss->sick; ?></td>
											</tr>
									<?php	}	?>
										</table>
								<?php	}else{
										echo "No Hay citas anteriores";
									}
								?>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script src="js/recetas.js"/>