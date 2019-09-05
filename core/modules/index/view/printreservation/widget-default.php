<?php 

	$reservacion = new ReservationData();
	$reservacion->pacient_id = $_POST["pacient_id"];
	$reservacion->sick = $_POST["sick"];
	$reservacion->symtoms = $_POST["symtoms"];
	$reservacion->medicaments = $_POST["Num_medicamentos"];
	$reservacion->add();

	$cant = (is_numeric($_POST['Num_medicamentos']) ? (int)$_POST['Num_medicamentos'] : 0);
	$receta = new recetaData();
	$receta->id_medico = $_POST["medic_id"];
	$receta->id_paciente = $_POST["pacient_id"];
	for($i=1; $i<= $cant ; $i++){
		if(isset($_POST["Medicamento$i"])){		
			$receta->Medicamentos[$i-1] = $_POST["Medicamento$i"];
			$receta->Cantidades[$i-1] = $_POST["Cantidad$i"];
		}else{
			break;
		}
	}
	$receta->insert();

    require_once($_SERVER["DOCUMENT_ROOT"]."/"."Medico/farmacia_sistem/config/db.php");
    require_once("/farmacia_sistem/config/conexion.php");

    $query_get_medicamento_id =  "SELECT id_medicamento FROM medicamentos2 WHERE Nombre = 'NEOMICINA, CAOLIN Y PECTINA SUSP'";
    $id_medicamento = "";

    if($result = mysql_query($con,$query_get_medicamento_id)){
        $row = mysqli_fetch_assoc($result);
        $id_medicamento = $row["id_medicamento"];
    }

    $query_insert_detalle_productos = "INSERT INTO detalle_productos (id_detalle_producto, codigo_producto, status,cantidad,detalle_date_added,precio) VALUES ('$id_medicamento','77763',2,'".$_POST["Medicamentos1"]."','NOW()','1500')";

    mysql_query($con,$query_insert_detalle_productos);
?>
<article>
	<div id="fondo">
    	<div id="fecha">
        	<h4><strong><?php echo $_POST["date_at"]; ?></strong></h4>
        </div>
        <div id="cedula">
        	<h4><strong>1309806</strong></h4>
        </div>
        <div id="nomedico">
			<?php
				$medic_id=$_POST["medic_id"];
				$medicid=MedicData::getById($medic_id);
			?>
        	<h4><strong><?php echo $medicid->name." ". $medicid->lastname;; ?></strong></h4>
        </div>
        
        <div id="paciente"> 
        	<?php
				$pacient_id = $_POST["pacient_id"];
				$pacientsid = PacientData::getById($pacient_id);
			?>
        	<h4><strong><?php echo $pacientsid->name ." ". $pacientsid->lastname; ?></strong></h4>
        </div>
        <div id="depart"> 
        	<h4><strong><?php echo $pacientsid->departamento; ?>  </strong> </h4> 
        </div>
        <div id="medicament"> 
        	<!--<strong><?php echo nl2br(htmlentities($_POST["Num_medicamentos"])); ?></strong>-->
        	<?php
        		if(isset($_POST["Medicamento1"])){
        			echo '<table class="table table-bordered">
    						<thead>
      							<tr>
        							<th>Medicamento</th>
        							<th>Cantidad</th>
        							<th>Prescripción</th>
      							</tr>
    						</thead>
    					<tbody>';

        			for($i=1; $i<=$cant;$i++){
        				echo "<tr><td>".$_POST["Medicamento$i"]."</td><td>".$_POST["Cantidad$i"]."</td><td>".$_POST["Prescripcion$i"]."</td></tr>"; 
        			}

        			echo "</tbody></table>";
        		}
        	?>
        </div>
    </div>
	<br>
	<div class="oculto">
		<button type="button" class="btn btn-primary" onclick='window.print(); void 0;'>
			<i class="fa fa-print fa-2x"></i> Imprimir </span>
		</button>
		<a href="index.php?view=pacients" class="btn btn-danger"><i class="fa fa-close fa-2x"></i> Salir</a>
	</div>
</article>