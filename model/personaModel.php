<?php
require_once "../librerias/conexion.php";

class PersonaModel{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function obtener_proveedores(){
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM persona WHERE rol='proveedor'");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta,$objeto);
        }
        return $arrRespuesta;
    }
    public function registrarPersona($dni, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $codpostal, $direccion, $rol, $password){
        $sql = $this->conexion->query("CALL insertpersona('{$dni}','{$razon_social}','{$telefono}','{$correo}','{$departamento}','{$provincia}','{$distrito}','{$codpostal}','{$direccion}','{$rol}','{$password}')");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function buscarPersonaPorDNI($dni){
        $sql = $this->conexion->query("SELECT * FROM persona WHERE nro_identidad='{$dni}'");
        $sql = $sql->fetch_object();
        return $sql;
    }
}



?>