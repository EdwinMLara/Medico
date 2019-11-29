<?php 
	$reservation = ReservationData::getById($_GET["id"]);
	$pacients = PacientData::getById($reservation->pacient_id);
	$medics = MedicData::getById($reservation->medic_id);
?>
<div class="row">
	<div class="col-md-10">
		<h1>Datos Consulta</h1>
		<hr>
		<form class="form-horizontal" role="form" method="post" action="./?action=updatereservation">
			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Paciente</label>
				<div class="col-lg-10">
					<!--<select name="pacient_id" class="form-control" required>
						<option value="">-- SELECCIONE --</option>
						<?php foreach($pacients as $p):?>
						<option value="<?php echo $p->id_paciente; ?>" <?php if($p->id_paciente==$reservation->pacient_id){ echo "selected"; }?>><?php echo $p->name." ".$p->lastname; ?></option>
						<?php endforeach; ?>
					</select>-->
					<input type="text" name="date_at" value="<?php echo $pacients->name.' '.$pacients->lastname; ?>" required class="form-control" id="inputEmail1" placeholder="Paciente">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Medico</label>
				<div class="col-lg-10">
					<!--<select name="medic_id" class="form-control" required>
						<option value="">-- SELECCIONE --</option>
						<?php foreach($medics as $p):?>
						<option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->medic_id){ echo "selected"; }?>><?php echo $p->name." ".$p->lastname; ?></option>
						<?php endforeach; ?>
					</select>-->
					<input type="text" name="date_at" value="<?php echo $medics->name.' '.$medics->lastname; ?>" required class="form-control" id="inputEmail1" placeholder="Medico">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Fecha</label>
				<div class="col-lg-5">
					<input type="text" name="date_at" value="<?php echo $reservation->date_at; ?>" required class="form-control" id="inputEmail1" placeholder="Fecha">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Enfermedad</label>
				<div class="col-lg-10">
					<textarea class="form-control" name="sick" placeholder="Enfermedad"><?php echo $reservation->sick;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Sintomas</label>
				<div class="col-lg-10">
					<textarea class="form-control" name="symtoms" placeholder="Sintomas"><?php echo $reservation->symtoms;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Medicamentos</label>
				<div class="col-lg-10">
					<textarea class="form-control" name="medicaments" placeholder="Medicamentos"><?php echo $reservation->medicaments;?></textarea>
				</div>
			</div>
			<!--<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
					<input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
					<button type="submit" class="btn btn-default">Actualizar Cita</button>
				</div>
			</div> -->
		</form>
	</div>
</div>