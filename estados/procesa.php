<?php
require_once "../parcial/conexion.php";

if (isset($_POST['modificar'])&&($_POST['modificar']=='1')){
    $id = $_POST['id'];
    $estado = $_POST['estado'];
    $activo = $_POST['activo'];
    if (!$enlace) {
        echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
    }else{
        $enlace->set_charset("utf8");
        $aula = stripslashes(strip_tags(htmlspecialchars($estado)));
        $editar = mysqli_query($enlace,"UPDATE estados SET nomestado = '$estado', activo='$activo' WHERE idestado='$id';");
        if (!$editar){
            echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO MODIFICAR EL REGISTRO'));
        }else{
            echo json_encode(array('resultado' => 'bien','msjrespuesta'=>"Modificado el registro"));
        }
        mysqli_close($enlace);
    }
}else{
    if (isset($_POST['borrar'])&&($_POST['borrar']=='1')){
        $id = $_POST['id'];
        if (!$enlace) {
            echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
        }else{
            $enlace->set_charset("utf8");
            $eliminar = mysqli_query($enlace,"DELETE FROM estados WHERE idestado='$id';");
            if (!$eliminar){
                echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO ELIMINAR EL REGISTRO'));
            }else{
                echo json_encode(array('resultado' => 'bien','msjrespuesta'=>"Eliminado el registro"));
            }
            mysqli_close($enlace);
        }
    }else{

$estado = $_POST['estado'];
$activo = $_POST['activo'];
if (!$enlace) {
    echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
}else{
    $enlace->set_charset("utf8");
    $insertar = mysqli_query($enlace,"INSERT INTO estados (nomestado, activo) VALUES ('$estado','$activo');");
    if (!$insertar){
        echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO INSERTAR EL REGISTRO'));
    }else{
        echo json_encode(array('resultado' => 'bien','msjrespuesta'=>"Insertado el registro"));
    }
    mysqli_close($enlace);
}
}
}
?>