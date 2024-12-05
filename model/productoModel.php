<?php
require_once "../librerias/conexion.php";
class ProductoModel{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function obtener_productos(){
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM producto");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta,$objeto);
        }
        return $arrRespuesta;
    }

    public function registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $categoria, $fecha_v, $imagen, $proveedor, $tipoArchivo){
        $sql = $this->conexion->query("CALL insertproducto('{$codigo}','{$nombre}','{$detalle}','{$precio}','{$stock}','{$categoria}','{$fecha_v}','{$imagen}','{$proveedor}','{$tipoArchivo}')");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function actualizar_imagen($id, $imagen){
        $sql = $this->conexion->query("UPDATE producto SET imagen='$imagen' WHERE id=$id");
        return 1;
    }
    public function verProducto($id){
        $sql = $this->conexion->query("SELECT * FROM producto WHERE id='$id'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function actualizarProducto($id, $nombre, $detalle, $precio, $categoria, $fecha_v, $proveedor){
        $sql = $this->conexion->query("CALL actualizarproducto('{$id}','{$nombre}','{$detalle}','{$precio}','{$categoria}','{$fecha_v}','{$proveedor}')");
        $sql = $sql->fetch_object();
        return $sql;
    }
}

?>