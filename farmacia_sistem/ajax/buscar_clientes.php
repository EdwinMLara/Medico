<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$cliente=intval($_GET['id']);
		$query=mysqli_query($con, "select * from facturas where id_paciente='".$id_cliente."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM clientes WHERE id_paciente='".$id_cliente."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se pudo eliminar éste  cliente. Existen facturas vinculadas a éste producto. 
			</div>
			<?php
		}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('name','lastname');//Columnas de busqueda
		 $sTable = "pacientes";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by name";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './clientes.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>Nombre</th>
					<th>Apellidos	</th>
					<th>Departamento</th>
					<th>Alergias</th>
					<th>Estado</th>
					<th>Agregado</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_cliente=$row['id_paciente'];
						$nombre_cliente=$row['name'];
						$telefono_cliente=$row['lastname'];
						$email_cliente=$row['departament'];
						$direccion_cliente=$row['alergias'];
						$status_cliente=$row['is_active'];
						if ($status_cliente==1){$estado="Activo";}
						else {$estado="Inactivo";}
						//$depto_id=$row['depto_id'];
						$date_added= date('d/m/Y', strtotime($row['created_date']));
						//$sqldepto=mysqli_query($con,"SELECT * FROM departamentos WHERE depto_id=$depto_id");
						//while ($rowdepto=mysqli_fetch_array($sqldepto)){
					?>
					
					<input type="hidden" value="<?php echo $nombre_cliente;?>" id="nombre_cliente<?php echo $id_paciente;?>">
					<input type="hidden" value="<?php echo $telefono_cliente;?>" id="telefono_cliente<?php echo $id_paciente;?>">
					<input type="hidden" value="<?php echo $email_cliente;?>" id="email_cliente<?php echo $id_paciente;?>">
					<input type="hidden" value="<?php echo $direccion_cliente;?>" id="direccion_cliente<?php echo $id_paciente;?>">
					<input type="hidden" value="<?php echo $status_cliente;?>" id="status_cliente<?php echo $id_paciente;?>">
					<!--<input type="hidden" value="<?php echo $depto_id;?>" id="depto_id<?php echo $id_paciente;?>">-->
					<tr>
						
						<td><?php echo $nombre_cliente; ?></td>
						<td><?php echo $telefono_cliente; ?></td>
						<td><?php echo $email_cliente;?></td>
						<td><?php echo $direccion_cliente;?></td>
						<td><?php echo $estado;?></td>
						<!--<td><?php echo $rowdepto['nombre']; ?></td>-->
						<td><?php echo $date_added;?></td>
						
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editar cliente' onclick="obtener_datos('<?php echo $id_paciente;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='Borrar cliente' onclick="eliminar('<?php echo $id_paciente; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
					//}
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right">
					<?php
						echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>