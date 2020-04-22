<?php
/**
* BookMedik
* @author evilnapsis
**/
    ReservationData::DeleteByNumFactura($_GET["id"],$_GET["numero_factura"]);
    print "<script>window.location='index.php?view=reservations';</script>";

?>