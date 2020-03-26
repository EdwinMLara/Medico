<?php 

	$reservacion = new ReservationData();
	$reservacion->pacient_id = $_POST["pacient_id"];
	$reservacion->sick = $_POST["sick"];
	$reservacion->symtoms = $_POST["symtoms"];
    $reservacion->medic_id = $_POST["medic_id"];
    $reservacion->date_at = $_POST["date_at"];
    $reservacion->time_at = $_POST["time_at"];

	$cant = (is_numeric($_POST['Num_medicamentos']) ? (int)$_POST['Num_medicamentos'] : 0);
	$receta = new recetaData();
	$receta->id_medico = $_POST["medic_id"];
	$receta->id_paciente = $_POST["pacient_id"];
    $receta->insert();

    require_once $_SERVER["DOCUMENT_ROOT"]."/Medico/farmacia_sistem/config/db.php";
    require_once $_SERVER["DOCUMENT_ROOT"]."/Medico/farmacia_sistem/config/conexion.php";
    //Desdes aqui se hacen las consultas necesarias para hacer la inseción en la base de datos de farmacia
    
    $query_get_last_id_factura = "SELECT id_factura FROM facturas ORDER BY id_factura DESC LIMIT 1";
    $ultima_factura = "";

    if($result = mysqli_query($con,$query_get_last_id_factura)){
        $ultima_factura = mysqli_fetch_assoc($result);
        $ultima_factura = (int) $ultima_factura["id_factura"] + 1;
    }else{
        $ultima_factura = 1;
    }
    $reservacion->numero_factura = $ultima_factura;
    $status_factura = 1;
    for($i=1; $i<= $cant ; $i++){

        if(isset($_POST["Medicamento$i"])){

            $id_medicamento = "";
            $codigo_producto = "";

            $reservacion->medicaments = $reservacion->medicaments.$_POST["Medicamento$i"]." ";      
            $receta->Medicamentos[$i-1] = $_POST["Medicamento$i"];
            $receta->Cantidades[$i-1] = $_POST["Cantidad$i"];

            $En_inventario = 0;
            $cantidad = (int) $_POST["Cantidad$i"];
            $entregados = 0;
            if($medicamento = medicamentosData::get_id_medicamento($_POST["Medicamento$i"])){
                $En_inventario = (int)$medicamento->En_inventario;
                $id_medicamento = $medicamento->id_medicamento;
                $codigo_producto = $medicamento->codigo_medicamento;

                if($En_inventario<$cantidad){
                    $status_factura = 2;
                    $entregados = $En_inventario;
                    $sql_update_inventario = "UPDATE medicamentos SET En_inventario = '0' WHERE id_medicamento = $id_medicamento";
                }else{
                    $En_inventario = $En_inventario - $cantidad;
                    $entregados = $cantidad;
                    $sql_update_inventario = "UPDATE medicamentos SET En_inventario = '$En_inventario' WHERE id_medicamento = $id_medicamento";
                }

                if(!mysqli_query($con,$sql_update_inventario)){
                    echo "No hay actualizacion de inventario";
                }
            }


            $query_insert_detalle_factura = "INSERT INTO detalle_factura (numero_factura ,id_producto ,cantidad, entregados) VALUES ('$ultima_factura','$id_medicamento','".$_POST["Cantidad$i"]."','$entregados')";

            if(!$result = mysqli_query($con,$query_insert_detalle_factura)){
                echo "No se pueden insertar los detalles de la factura"."<br>";
            }

            //Empezar insert para detalle de productos

            $query_insert_detalle_productos = "INSERT INTO detalle_productos (codigo_producto, status, cantidad, detalle_date_added, precio) VALUES ('$codigo_producto','2','".$_POST["Cantidad$i"]."',now(),'0')";

            if(!mysqli_query($con,$query_insert_detalle_productos)){
                echo "No se pueden insertar los detalles de producto o medicamentos"."<br>";
            }
        }else{
            break;
        }
    }

    //finalmente hay que hacer la insercion en facturas, aqui se necesita obtener el id del paciente en funcion del nombre, pero por ahora voy a probar con el id solo para observar

    $query_insert_factura = "INSERT INTO facturas (numero_factura, fecha_factura, id_cliente, id_vendedor, estado_factura) VALUES ('$ultima_factura',now(),'".$_POST["pacient_id"]."','".$_POST["medic_id"]."','$status_factura')";

    if(!mysqli_query($con,$query_insert_factura)){
        echo "No se creo la factura"."<br>";
    }

    $last_reservation = ReservationData::get_last_id();
    if($last_reservation){
        $last_id_reservation = (int)$last_reservation->id + 1;
    }else{
        $last_id_reservation = 1;
    }
    $reservacion->add($last_id_reservation);

?>
<article>
	<div id="fondo">
    	<div id="fecha">
        	<h4><strong><?php $date = explode("-", $_POST["date_at"]); 
                            $an = $date[0];
                            $mes = $date[1];
                            $dia = $date [2];
                            echo $an;
                            echo '<span>'.$mes.'</span>';
                            echo '<span>'.$dia.'</span>';
                            //echo $an."  ".$mes.'  '.$dia;
            ?></strong></h4>
        </div>
        <div id="factura">
        <h4><strong><?php echo $ultima_factura;
            ?></strong></h4>
        </div>
        <?php
				$medic_id=$_POST["medic_id"];
				$medicid=MedicData::getById($medic_id);
			?>
        <div id="cedula">
        	<h4><strong><?php echo $medicid->n_cedula;  ?></strong></h4>
        </div>
        <div id="nomedico">
        	<h4><strong><?php echo $medicid->name." ". $medicid->lastname; ?></strong></h4>
        </div>
        
        <div id="paciente"> 
        	<?php
				$pacient_id = $_POST["pacient_id"];
				$pacientsid = PacientData::getById($pacient_id);
			?>
        	<h4><strong><?php echo $pacientsid->name ." ". $pacientsid->lastname; ?></strong></h4>
        </div>
        <div id="depart"> 
        	<h4><strong><?php echo $pacientsid->departament; ?>  </strong> </h4> 
        </div>
        <div id="medicament"> 
        	<!--<strong><?php echo nl2br(htmlentities($_POST["Num_medicamentos"])); ?></strong>-->
        	<?php
        		if(isset($_POST["Medicamento1"])){

        			for($i=1; $i<=$cant;$i++){
        				echo "<p>".$_POST["Cantidad$i"]." - 
                        ".$_POST["Medicamento$i"]." , 
                        ".$_POST["Prescripcion$i"]."</p>"; 
        			}
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