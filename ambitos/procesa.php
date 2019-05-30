<?php
require_once "../parcial/conexion.php";
if (isset($_POST['modificar'])&&($_POST['modificar']=='1')){
$id = $_POST['id'];
$ambito = $_POST['ambito'];
$activo = $_POST['activo'];
if (!$enlace) {
    echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
}else{
    $enlace->set_charset("utf8");
    $ambito = stripslashes(strip_tags(htmlspecialchars($ambito)));
    $editar = mysqli_query($enlace,"UPDATE ambitos SET nombreamb = '$ambito', Activo='$activo' WHERE idamb='$id';");
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
        $eliminar = mysqli_query($enlace,"DELETE FROM ambitos WHERE idamb='$id';");
        if (!$eliminar){
            echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO ELIMINAR EL REGISTRO'));
        }else{
            echo json_encode(array('resultado' => 'bien','msjrespuesta'=>"Eliminado el registro"));
        }
        mysqli_close($enlace);
    }
}else{
    $ambito = $_POST['ambito'];
    $activo = $_POST['activo'];
    if (!$enlace) {
        echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
    }else{
        $enlace->set_charset("utf8");
        $ambito = stripslashes(strip_tags(htmlspecialchars($ambito)));
        $insertar = mysqli_query($enlace,"INSERT INTO ambitos (nombreamb, activo) VALUES ('$ambito','$activo')");
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