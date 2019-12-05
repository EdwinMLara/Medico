<?php
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	if(isset($_GET["id"])){
		$query = new \stdClass();
		$id = $_GET["id"];
		$nombre_producto = "";
		$cantidad = "";
		$entregados = "";
		$inventario = "";

		$sql_detalle_factura = "SELECT medicamentos.nombre_producto, detalle_factura.cantidad, detalle_factura.entregados, medicamentos.En_inventario FROM detalle_factura, medicamentos WHERE medicamentos.id_medicamento = detalle_factura.id_producto AND  numero_factura = $id";
		$detalles_factura = mysqli_query($con,$sql_detalle_factura);?>
		<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Receta</h4>
        </div>
        <div class="modal-body">
		<table class="table">
				<tr  class="info">
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Entregados</th>
					<th>Inventario</th>	
				</tr><?php

		while($row = mysqli_fetch_array($detalles_factura)){
			$nombre_producto = $row["nombre_producto"];
			$cantidad = $row["cantidad"];
			$entregados = $row["entregados"];
			$inventario = $row["En_inventario"];
			?>
				<tr>
					<td><?php echo $nombre_producto; ?></td>
					<td><?php echo $cantidad; ?></td>
					<td><?php echo $entregados; ?></td>
					<td><?php echo $inventario; ?></td>
				</tr>		
			<?php 
		}
		?>
		</table>
		</div>
        <div class="modal-footer">
          	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="update_factura('<?php echo $id; ?>');">Entregar</button>
        </div>
        <?php
	}
?>
		