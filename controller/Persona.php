<?php
require_once('../model/personaModel.php');
$tipo = $_REQUEST['tipo'];

//instanciar la clase categoria model
$objPersona = new ProveedorModel();

if ($tipo=="listar_proveedor") {
    //repuesta
    $arr_Respuesta = array('status'=>false, 'contenido'=>'');
    $arr_Personas = $objPersona->obtener_proveedores();
    if (!empty($arr_Personas)) {
        // recorremos el array para agregar las opciones de las categorias
        for ($i=0; $i < count($arr_Personas); $i++) { 
            $id_categoria = $arr_Personas[$i]->id;
            $categoria = $arr_Personas[$i]->razon_social;
            $opciones = '';
            $arr_Personas[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Personas;
    }
    echo json_encode($arr_Respuesta);
}



?>