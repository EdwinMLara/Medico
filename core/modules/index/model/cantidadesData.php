<?php
class cantidadesData{

    public function cantidadesData(){
        $this->numero_factura = "";
        $this->id_cliente = "";
        $this->id_producto = "";
        $this->cantidad = "";
    }

    public static function getCantidadesEliminar($id){
        $sql = "SELECT reservation.numero_factura, facturas.id_cliente, detalle_factura.id_producto, detalle_factura.cantidad FROM 
        ((reservation INNER JOIN facturas ON reservation.numero_factura = facturas.id_factura) INNER JOIN detalle_factura ON facturas.id_factura = detalle_factura.numero_factura) 
        WHERE reservation.numero_factura = $id";
        $query = Executor::doit($sql);
        return Model::many($query[0],new cantidadesData());
    }

    public static function updateCantidades($id){
        $sql = "";
    }
}
?>