<?php
class cantidadesData{

    public function cantidadesData(){
        $this->numero_factura = "";
        $this->id_cliente = "";
        $this->id_producto = "";
        $this->cantidad = "";
    }

    public static function getCantidadesEliminar($numero_factura){
        $sql = "SELECT reservation.numero_factura, facturas.id_cliente, detalle_factura.id_producto, detalle_factura.cantidad FROM 
        ((reservation INNER JOIN facturas ON reservation.numero_factura = facturas.id_factura) INNER JOIN detalle_factura ON facturas.id_factura = detalle_factura.numero_factura) 
        WHERE reservation.numero_factura = $numero_factura";
        $query = Executor::doit($sql);
        return Model::many($query[0],new cantidadesData());
    }

    public static function updateCantidades($id,$cantidad){
        $sql = "UPDATE medicamentos SET En_inventario = En_inventario + $cantidad WHERE id_medicamento = $id";
        Executor::doit($sql);
    }
}
?>