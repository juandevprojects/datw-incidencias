<?php
require_once "../parcial/conexion.php";
if (isset($_POST['modificar'])&&($_POST['modificar']=='1')){
$prioridad = $_POST['prioridad'];
$activo = $_POST['activo'];
$id = $_POST['id'];
if (!$enlace) {
    echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
}else{
    $enlace->set_charset("utf8");
    $prioridad = stripslashes(strip_tags(htmlspecialchars($prioridad)));
    $editar = mysqli_query($enlace,"UPDATE prioridades SET nompri = '$prioridad', Activo='$activo' WHERE idpri='$id';");
    if (!$editar){
        echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO MODIFICAR LA PRIORIDAD'));
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
        $eliminar = mysqli_query($enlace,"DELETE FROM prioridades WHERE idpri='$id';");
        if (!$eliminar){
            echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO ELIMINAR EL REGISTRO'));
        }else{
            echo json_encode(array('resultado' => 'bien','msjrespuesta'=>"Eliminado el registro"));
        }
        mysqli_close($enlace);
    }
}else{
    $prioridad = $_POST['prioridad'];
    $activo = $_POST['activo'];
if (!$enlace) {
    echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
}else{
    $enlace->set_charset("utf8");
    $prioridad = stripslashes(strip_tags(htmlspecialchars($prioridad)));
    $insertar = mysqli_query($enlace,"INSERT INTO prioridades (nompri, Activo) VALUES ('$prioridad','$activo')");
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
