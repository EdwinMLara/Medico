  <?php	if (isset($title)){	?>
<nav class="navbar navbar-default ">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Farmacia</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="<?php echo $active_facturas;?>"><a href="facturas.php"><i class='glyphicon glyphicon-list-alt'></i> Recetas <span class="sr-only">(current)</span></a></li>
				<li class="<?php echo $active_productos;?>"><a href="productos.php"><i class='glyphicon glyphicon-barcode'></i> Productos</a></li>
				<li class="<?php echo $active_clientes;?>"><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>
				<li class="<?php echo $active_usuarios;?>"><a href="usuarios.php"><i class='glyphicon glyphicon-lock'></i> Usuarios</a></li>
				<li class="<?php ?>"><a href="departamentos.php"><i class='glyphicon glyphicon-lock'></i> Departamentos</a></li>
				<li class="<?php if(isset($active_perfil)){echo $active_perfil;}?>"><a href="perfil.php"><i class='glyphicon glyphicon-cog'></i> Configuración</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='glyphicon glyphicon glyphicon-list-alt'></i> Reportes <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a class="<?php $active_reportes_entradas ?>" href="reporte_entradas.php">Entradas</a></li>
						<li><a href="reporte_salidas.php">Salidas</a></li>
						<li><a href="reporte_ent_sal.php">Reporte Entradas-Salidas</a></li>
						<li><a href="reporte_entrega.php">Entrega de Medicamentos</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<?php	}	?>