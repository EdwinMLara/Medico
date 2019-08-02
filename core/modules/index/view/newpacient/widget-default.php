<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Paciente</h1>
	<br>
	<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addpacient" role="form">
		<div class="form-group">
			<div class="col-md-2">
				<label for="inputEmail1" class="control-label">Nombre*</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-2">
				<label for="inputEmail1" class="control-label">Apellidos*</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Apellido">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-2">
				<label for="inputEmail1" class="control-label">Departamento*</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="departamento" class="form-control" id="departamento" placeholder="Departamento">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-2">
				<label for="inputEmail1" class="control-label">Alergias</label>
			</div>
			<div class="col-md-6">
				<textarea class="form-control" name="alergias" placeholder="Alergias"></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<button type="submit" class="btn btn-primary">Agregar Paciente</button>
			</div>
		</div>
		
	</form>
	</div>
</div>