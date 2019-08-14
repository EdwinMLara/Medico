<?php
	//$pacients = PacientData::getAll();
	$medics = MedicData::getAll();
?>
<div class="row">
	<div class="col-md-12">
		<h1>Nueva Cita</h1>
		<form class="form-horizontal" role="form" method="post" action="index.php?view=printreservation">  
			<div class="col-md-8">
				<div class="form-group">
					<div class="col-md-3">
						<label for="inputEmail1" class="col-lg-2 control-label">Paciente</label>
					</div>
					<div class="col-md-6">
						<?php
							$name = $_GET['name']; 
							$lastname =$_GET['lastname'];
							$pacients = PacientData::getDatos($name,$lastname);
							$idp=$pacients->id;
						?>
						<input type="text" name="pacient_name" required class="form-control" id="inputEmail1" value="<?php echo $name ." ". $lastname;?>">
						<input type="hidden" name="pacient_id" required class="form-control" id="inputEmail1" value="<?php echo $idp;?>">
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
						<input type="text" name="time_at" required class="form-control" id="inputEmail1" value="<?php echo $hoy; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Enfermedad</label>
					<div class="col-lg-10">
						<textarea class="form-control" name="sick" placeholder="Enfermedad"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Sintomas</label>
					<div class="col-lg-10">
						<textarea class="form-control" name="symtoms" placeholder="Sintomas"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label"> Cantidad de Medicamentos</label>
					<div class="col-lg-10">
						<textarea class="form-control" name="medicaments" placeholder="Medicamentos"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button type="submit" class="btn btn-default">Agregar Cita</button>
					</div>
				</div>
			</div>
			<div class="row">
				<center>
				<div class="col-md-4">
					<div class="panel panel-warning">
						<div class="panel-heading">
							<center><strong><h4>Alergias</h4></strong></center>
						</div>
						<div class="panel-body">
							<?php
								$pacient = PacientData::getById($idp);
								$alergias=$pacient->alergias;
								if($alergias!=" "){
									echo '<center><h4 style="color:#EF0B0F">'.$alergias.'</h4></center>';
								}else{
									echo "El Paciente no tiene alergias";
								}
							?>
						</div>
					</div>
				</div>
				</center>
			</div>
		</form>
	</div>
</div>