<?php
require_once "../parcial/conexion.php";
$solicitante = $_POST['solicitante'];
$email = $_POST['email'];
$activo = $_POST['activo'];
if (!$enlace) {
    echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
}else{
    $enlace->set_charset("utf8");
    $insertar = mysqli_query($enlace,"INSERT INTO solicitantes (nombresol, email, Activo) VALUES ('$solicitante','$email','$activo')");
    if (!$insertar){
        echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO INSERTAR EL REGISTRO'));
    }else{
        echo json_encode(array('resultado' => 'bien','msjrespuesta'=>"Insertado el registro"));
    }
    mysqli_close($enlace);
}

?>