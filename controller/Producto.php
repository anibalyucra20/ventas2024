<?php
require_once('../model/productoModel.php');
$tipo = $_REQUEST['tipo'];

// instancio la clase modeloproducto
$objProducto = new ProductoModel();

if ($tipo == "listar") {
    echo "listar";
}

if ($tipo == "registrar") {
    //print_r($_POST);
    //echo $_FILES['imagen']['name'];

    if ($_POST) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $detalle = $_POST['detalle'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $categoria = $_POST['categoria'];
        $fecha_v = $_POST['fecha_v'];
        $imagen = 'imagen';
        $proveedor = $_POST['proveedor'];
        if ($codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $categoria == "" || $fecha_v == "" || $imagen == "" || $proveedor == "") {
            //repuesta
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacíos');
        } else {

            //cargar archivos
            $archivo = $_FILES['imagen']['tmp_name'];
            $destino = '../assets/img_productos/';
            $tipoArchivo = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));

            $arrProducto = $objProducto->registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $categoria, $fecha_v, $imagen, $proveedor, $tipoArchivo);
            if ($arrProducto->id_n > 0) {
                $newid = $arrProducto->id_n;
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso');
                $nombre = $arrProducto->id_n.".".$tipoArchivo;

                if (move_uploaded_file($archivo,$destino.''.$nombre)) {

                }else{
                    $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso, error al subir imagen');
                }
            } else {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar producto');
            }
            echo json_encode($arr_Respuesta);
        }
    }
}


if ($tipo == "ver") {
    # code...
}
if ($tipo == "actualizar") {
    # code...
}
if ($tipo == "eliminar") {
    # code...
}
