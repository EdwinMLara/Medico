<div class="row">
	<div class="col-md-12">
		<h1>Beneficiarios de: <?php $Nombre = $_GET["Nombre"];
									$Apellidos = $_GET["Apellido"];
									echo "$Nombre $Apellidos"; ?></h1>
		<br>
		<?php
		$Beneficiarios = beneficiaryData::getAll();
		if(count($Beneficiarios)>0){
			// si hay usuarios
			?>
			<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<th>Nombre completo</th>
					<th></th>
				</thead>
				<?php
					foreach($Beneficiarios as $Beneficiario){
				?>
				<tr>
					<td><?php echo $Beneficiario->Nombre." ".$Beneficiario->Apellidos; ?></td>
					<td style="width:300px;">
						<a href="index.php?view=editincumbent&id_titular=<?php echo $titular->id_titular;?>&Nombre=<?php echo $titular->Nombre;?>&Apellido=<?php echo $titular->Apellidos;?>&Departamento=<?php echo $titular->Departamento?>&Ruta_foto=<?php echo $titular->Ruta_foto;?>" href="#" class="btn btn-warning btn-xs">Editar</a>
						<a href="index.php?view=delincumbent&id=<?php echo $titular->id_titular;?>" class="btn btn-danger btn-xs">Eliminar</a>
					</td>
				</tr>
				<?php
			}
		}else{
			echo "<p class='alert alert-danger'>No hay Beneficiarios</p>";
		}
		?>
	</div>
</div>