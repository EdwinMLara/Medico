<div class="row">
	<div class="col-md-12">
		<div class="btn-group pull-right">
			<a href="index.php?view=newbeneficiary&Nombre=<?php echo $_GET["Nombre"];?>&Apellido=<?php echo $_GET["Apellido"];?>" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Beneficiario</a>
		</div>
		<h1>Beneficiarios de: <?php $Nombre = $_GET["Nombre"];
									$Apellidos = $_GET["Apellido"];
									echo "$Nombre $Apellidos"; ?></h1>
		<br>
		<?php
		$Beneficiarios = beneficiaryData::getAll_byID($_GET["id_titular"]);
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
						<a href="index.php?view=editbeneficiary&id_titular=<?php echo $Beneficiario->id_titular;?>&id_beneficiario=<?php echo $Beneficiario->id_beneficiario;?>&Nombre=<?php echo $Beneficiario->Nombre;?>&Apellido=<?php echo $Beneficiario->Apellidos;?>&Departamento=<?php echo $Beneficiario->Parentesco?>&Nombre_titular=<?php echo $_GET["Nombre"]; ?>&Apellido_titular=<?php echo $_GET["Apellido"]; ?>" href="#" class="btn btn-warning btn-xs">Editar</a>
						<a href="index.php?view=delbeneficiary&id_beneficiario=<?php echo $Beneficiario->id_beneficiario;?>&id_titular=<?php echo $Beneficiario->id_titular;?>&Nombre_titular=<?php echo $_GET["Nombre"];?>&Apellido_titular=<?php echo $_GET["Apellido"];?>" class="btn btn-danger btn-xs">Eliminar</a>
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