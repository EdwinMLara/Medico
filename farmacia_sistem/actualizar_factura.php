<?php
require_once ("config/db.php");
require_once ("config/conexion.php");
if(isset($_GET["id"])){
	$id = $_GET["id"];
	$sql_estado_factura = "SELECT estado_factura FROM facturas WHERE id_factura = $id";
	$estado_factura = mysqli_query($con,$sql_estado_factura);
	if($estado_factura){
		$row = mysqli_fetch_array($estado_factura);
		$mensaje = new stdClass();

		if((int)$row["estado_factura"] != 1){

			$nombre_producto = "";
			$cantidad = "";
			$entregados = "";
			$inventario = "";

			$sql_detalle_factura = "SELECT medicamentos.id_medicamento,detalle_factura.id_detalle, medicamentos.nombre_producto, detalle_factura.cantidad, detalle_factura.entregados, medicamentos.En_inventario FROM detalle_factura, medicamentos WHERE medicamentos.id_medicamento = detalle_factura.id_producto AND numero_factura =  $id";

			$detalles_factura = mysqli_query($con,$sql_detalle_factura);

			$bandera = false;

			while($row = mysqli_fetch_array($detalles_factura)){
				$id_medicamento = $row["id_medicamento"];
				$id_detalle = $row["id_detalle"];
				$nombre_producto = $row["nombre_producto"];
				$cantidad = $row["cantidad"];
				$entregados = $row["entregados"];
				$inventario = $row["En_inventario"];

				if($entregados < $cantidad){
					$faltantes = $cantidad - $entregados;
					if($inventario >= $faltantes){
						$bandera = true;
						$inventario = $inventario - $faltantes;
						$sql_update_inventario = "UPDATE medicamentos SET En_inventario = '$inventario' WHERE id_medicamento = $id_medicamento";
						mysqli_query($con,$sql_update_inventario);
						$sql_update_entregados = "UPDATE detalle_factura SET entregados='$cantidad' WHERE id_detalle = $id_detalle";
						mysqli_query($con,$sql_update_entregados);
					}else{
						$bandera = false;
					}
				}
			}

			if($bandera){
				$sql_update_factura = "UPDATE facturas SET estado_factura = '1' WHERE id_factura = $id";
				mysqli_query($con,$sql_update_factura);
				$mensaje->response = "correcto";
			}else{
				$mensaje->response = "Error";
			}
			$json = json_encode($mensaje);
			echo $json;
		}else{
			$mensaje->response = "actulizado";
			$json = json_encode($mensaje);
			echo $json;
		}
	}
}
	
?>