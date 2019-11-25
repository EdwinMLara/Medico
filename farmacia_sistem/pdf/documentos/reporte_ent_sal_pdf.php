<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	
	/* Connect To Database*/
	include("../../config/db.php");
	include("../../config/conexion.php");
	//Archivo de funciones PHP
	include("../../funciones.php");
	
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
	
	$id_producto=$_GET['id_producto'];
	$date1=$_GET['date1'];
	$date2=$_GET['date2'];
	if ($id_producto==0) {
		$sqlproducto="SELECT DISTINCT nombre_producto,codigo_producto FROM detalle_productos, medicamentos WHERE (detalle_date_added BETWEEN '$date1' AND '$date2') AND detalle_productos.codigo_producto = medicamentos.codigo_medicamento";
	}else{
		$sqlproducto="SELECT DISTINCT nombre_producto,codigo_producto FROM detalle_productos, medicamentos WHERE (detalle_date_added BETWEEN '2019-10-01' AND '2019-11-30') AND (detalle_productos.codigo_producto = medicamentos.codigo_medicamento) AND detalle_productos.codigo_producto = $id_producto";
	}
	
	ob_start();
    include(dirname('__FILE__').'/res/reporte_ent_sal_html.php');
    $content = ob_get_clean();

    try{
        // init HTML2PDF
        $html2pdf = new HTML2PDF('L', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Factura.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>