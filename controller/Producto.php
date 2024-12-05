<?php
require_once('../model/productoModel.php');
require_once('../model/categoriaModel.php');
require_once('../model/personaModel.php');
$tipo = $_REQUEST['tipo'];

// instancio la clase modeloproducto
$objProducto = new ProductoModel();
$objCategoria = new CategoriaModel();
$objPersona = new PersonaModel();

if ($tipo == "listar") {
    //repuesta
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_Productos = $objProducto->obtener_productos();
    if (!empty($arr_Productos)) {
        // recorremos el array para agregar las opciones de las categorias
        for ($i = 0; $i < count($arr_Productos); $i++) {
            $id_categoria = $arr_Productos[$i]->id_categoria;
            $r_categoria = $objCategoria->obtener_categoria($id_categoria);
            $arr_Productos[$i]->categoria = $r_categoria;


            $id_producto = $arr_Productos[$i]->id;
            $producto = $arr_Productos[$i]->nombre;
            //localhost/editar-producto/4                                               // eliminar producto(1);
            $opciones = '<a href="' . BASE_URL . 'editar-producto/' . $id_producto . '">Editar</a><button onclick="eliminar_producto(' . $id_producto . ');">Eliminar</button>';
            $arr_Productos[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Productos;
    }
    echo json_encode($arr_Respuesta);
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
                $nombre = $arrProducto->id_n . "." . $tipoArchivo;

                if (move_uploaded_file($archivo, $destino . '' . $nombre)) {
                } else {
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
    //print_r($_POST);
    $id_producto = $_POST['id_producto'];
    $arr_Respuesta = $objProducto->verProducto($id_producto);
    //print_r($arr_Respuesta);
    if (empty($arr_Respuesta)) {
        $response = array('status' => false, 'mensaje' => "Error, no hay informacion");
    } else {
        $response = array('status' => true, 'mensaje' => "datos encontrados", 'contenido' => $arr_Respuesta);
    }
    echo json_encode($response);
}
if ($tipo == "actualizar") {
    //print_r($_POST);
    //print_r($_FILES['imagen']['tmp_name']);

    $id_producto = $_POST['id_producto'];
    $img = $_POST['img'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $fecha_v = $_POST['fecha_v'];
    $proveedor = $_POST['proveedor'];
    if ($nombre == "" || $detalle == "" || $precio == "" || $categoria == "" || $fecha_v == "" || $proveedor == "") {
        //repuesta
        $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacíos');
    } else {
        $arrProducto = $objProducto->actualizarProducto($id_producto, $nombre, $detalle, $precio, $categoria, $fecha_v, $proveedor);
        if ($arrProducto->p_id > 0) {
            $arr_Respuesta = array('status' => true, 'mensaje' => 'Actualizado Correctamente');

            if ($_FILES['imagen']['tmp_name'] != "") {
                unlink('../assets/img_productos/' . $img);

                //cargar archivos
                $archivo = $_FILES['imagen']['tmp_name'];
                $destino = '../assets/img_productos/';
                $tipoArchivo = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));
                if (move_uploaded_file($archivo, $destino . '' . $id_producto.'.'.$tipoArchivo)) {
                }
            }
        } else {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al actualizar producto');
        }
    }
    echo json_encode($arr_Respuesta);
}
if ($tipo == "eliminar") {
    # code...
}
