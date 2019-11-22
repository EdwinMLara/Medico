<?php
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	if(isset($_GET["id"])){
		$query = new \stdClass();
		$id = $_GET["id"];
		$sql_estado_factura = "SELECT estado_factura FROM facturas WHERE id_factura = $id";
		$estado_factura = mysqli_query($con,$sql_estado_factura);
		if($estado_factura){
			$row = mysqli_fetch_array($estado_factura);
			if((int)$row["estado_factura"] != 1){
				$sql_update_factura = "UPDATE facturas SET estado_factura = '1' WHERE id_factura = $id";
				mysqli_query($con,$sql_update_factura);
				$query->response = "correcto";
			}else{
				$query->response = "Error";
			}
			$json = json_encode($query);
			echo $json;
		}
	}
	
?>