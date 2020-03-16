<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['nombre'])){
			$errors[] = "Nombre del producto vacío";
		} else if ($_POST['estado']==""){
			$errors[] = "Selecciona el estado del producto";
		} else if (empty($_POST['cantidad'])){
			$errors[] = "Cantidad del producto vacío";
		}else if (empty($_POST['precio'])){
			$errors[] = "Precio vacío";
		} else if (
			!empty($_POST['nombre']) &&
			$_POST['estado']!="" &&
			!empty($_POST['cantidad']) &&
			!empty($_POST['precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		//$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$estado=intval($_POST['estado']);
		$precio=floatval($_POST['precio']);
		$cantidad=intval($_POST['cantidad']);
		
		$sql_last_id = "SELECT * FROM medicamentos ORDER BY id_medicamento DESC LIMIT 1";
		$result_sql_last_id = mysqli_query($con,$sql_last_id);
		$last_id = mysqli_fetch_array($result_sql_last_id);
		$codigo_medicamento = (int) $last_id["id_medicamento"] + 1;
		echo $codigo_medicamento;
			

		$sql="INSERT INTO medicamentos (codigo_medicamento, nombre_producto, status_producto, created_at, En_inventario) VALUES ($codigo_medicamento,'$nombre','$estado',now(),'$cantidad')";
		$sqld="INSERT INTO detalle_productos (codigo_producto, status, cantidad, detalle_date_added, precio) VALUES ($codigo_medicamento,'1','$cantidad',now(),'$precio')";

		$query_new_insert = mysqli_query($con,$sql);
		$query_new_insert_d = mysqli_query($con,$sqld);
			if ($query_new_insert and $query_new_insert_d){
				$messages[] = "El producto ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>