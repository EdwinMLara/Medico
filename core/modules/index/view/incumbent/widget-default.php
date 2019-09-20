<div class="row">
	<div class="col-md-12">
		<div class="btn-group pull-right">
			<a href="index.php?view=newtitular" class="btn btn-default"><i class='fa fa-male'></i> Nuevo titular</a>
		</div>
		<h1>Titulares</h1>
		<br>
		<?php
		$Titulares = IncumbentData::getAll();
		if(count($Titulares)>0){
			// si hay usuarios
			?>
			<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<th>Nombre completo</th>
					<th></th>
				</thead>
				<?php
					foreach($Titulares as $titular){
				?>
				<tr>
					<td><?php echo $titular->Nombre." ".$titular->Apellidos; ?></td>
					<td style="width:300px;">	
						<a href="index.php?view=beneficiaries&Nombre=<?php echo $titular->Nombre;?>&Apellido=<?php echo $titular->Apellidos;?>" class="btn btn-success btn-xs">Beneficiarios</a>
						<a href="index.php?view=editincumbent&id_titular=<?php echo $titular->id_titular;?>&Nombre=<?php echo $titular->Nombre;?>&Apellido=<?php echo $titular->Apellidos;?>&Departamento=<?php echo $titular->Departamento?>&Ruta_foto=<?php echo $titular->Ruta_foto;?>" href="#" class="btn btn-warning btn-xs">Editar</a>
						<a href="index.php?view=delincumbent&id=<?php echo $titular->id_titular;?>" class="btn btn-danger btn-xs">Eliminar</a>
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