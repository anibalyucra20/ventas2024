<?php
require_once('../model/personaModel.php');
$tipo = $_REQUEST['tipo'];

//instanciar la clase categoria model
$objPersona = new PersonaModel();

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
if ($tipo="registrar") {
    //print_r($_POST);
    if ($_POST) {
        $dni = $_POST['dni'];
        $razon_social = $_POST['razon_social'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $departamento = $_POST['departamento'];
        $provincia = $_POST['provincia'];
        $distrito = $_POST['distrito'];
        $codpostal = $_POST['codpostal'];
        $direccion = $_POST['direccion'];
        $rol = $_POST['rol'];

        $secure_password = password_hash($dni,PASSWORD_DEFAULT);

        if ($dni == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == "" || $provincia == "" || $distrito == "" || $codpostal == "" || $direccion == "" || $rol == "") {
            //repuesta
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacíos');
        } else {
            $arrPersona = $objPersona->registrarPersona($dni, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $codpostal, $direccion, $rol, $secure_password);
            if ($arrPersona->id > 0) {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso');
            } else {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar producto');
            }
            echo json_encode($arr_Respuesta);
        }
    }
}



?>