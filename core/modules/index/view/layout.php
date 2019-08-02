<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Dirección de Informática">
		<title>..:: Medico ::..</title>
	    <!-- Bootstrap core CSS -->
		<link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">
		<!-- DataTables CSS -->
		<link href="res/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<!-- DataTables Responsive CSS -->
		<link href="res/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
		<!-- Add custom CSS here -->
		<link href="css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/printing.css">
		<link rel="stylesheet" type="text/css" href="css/nota_printing.css" media='print'>

		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<script src="js/jquery-1.10.2.js"></script>
		
		<?php if(isset($_GET["view"]) && $_GET["view"]=="home"):?>
		<link href='res/fullcalendar.min.css' rel='stylesheet' />
		<link href='res/fullcalendar.print.css' rel='stylesheet' media='print' />
		<script src='res/js/moment.min.js'></script>
		<script src='res/fullcalendar.min.js'></script>
		<?php endif; ?>
	</head>
	<body>
		<div id="wrapper">
			<!-- Sidebar -->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="./">Medico</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
				<?php 
					$u=null;
					if(Session::getUID()!=""):
					$u = UserData::getById(Session::getUID());
				?>
					<ul class="nav navbar-nav side-nav">
						<li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li>
						<li><a href="index.php?view=reservations"><i class="fa fa-calendar"></i> Citas</a></li>
						<li><a href="index.php?view=pacients"><i class="fa fa-male"></i> Pacientes</a></li>
						<li><a href="index.php?view=medics"><i class="fa fa-support"></i> Medicos</a></li>
						<li><a href="index.php?view=newtitular"><i class="fa">Titulares</i></a></li>
						<!--<li><a href="index.php?view=categories"><i class="fa fa-th-list"></i> Areas Medicas</a></li>-->
						<?php if($u->is_admin):?>
							<li><a href="index.php?view=users"><i class="fa fa-users"></i> Usuarios </a></li>
						<?php endif;?>
					</ul>
				<?php endif;?>
				<ul class="nav navbar-nav navbar-right navbar-user">
					<?php if(Session::getUID()!=""):?>
						<?php 
						$u=null;
						if(Session::getUID()!=""){
							$u = UserData::getById(Session::getUID());
							$user = $u->name." ".$u->lastname;
						}?>
						<li class="dropdown user-dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo $user; ?> <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="index.php?view=configuration">Configuracion</a></li>
								<li><a href="logout.php">Salir</a></li>
							</ul>
						</li>
						<?php else:?>
					<?php endif; ?>
				</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
			<div id="page-wrapper">
				<?php 
					// puedo cargar otras funciones iniciales
					// dentro de la funcion donde cargo la vista actual
					// como por ejemplo cargar el corte actual
					View::load("login");
				?>
			</div><!-- /#page-wrapper -->
		</div><!-- /#wrapper -->
		<!-- JavaScript -->
		<script src="res/bootstrap3/js/bootstrap.min.js"></script>
		<!-- DataTables JavaScript -->
    <script src="res/datatables/js/jquery.dataTables.min.js"></script>
    <script src="res/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="res/datatables-responsive/dataTables.responsive.js"></script>
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
	</body>
</html>
