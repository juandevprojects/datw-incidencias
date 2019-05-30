<?php
require_once "../parcial/conexion.php";
if (isset($_POST['modificar'])&&($_POST['modificar']=='1')){
    $id = $_POST['id'];
    $aula = $_POST['aula'];
    $activo = $_POST['activo'];
    if (!$enlace) {
        echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
    }else{
        $enlace->set_charset("utf8");
        $aula = stripslashes(strip_tags(htmlspecialchars($aula)));
        $editar = mysqli_query($enlace,"UPDATE aulas SET nombreau = '$aula', Activo='$activo' WHERE idau='$id';");
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
            $eliminar = mysqli_query($enlace,"DELETE FROM aulas WHERE idau='$id';");
            if (!$eliminar){
                echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO ELIMINAR EL REGISTRO'));
            }else{
                echo json_encode(array('resultado' => 'bien','msjrespuesta'=>"Eliminado el registro"));
            }
            mysqli_close($enlace);
        }
    }else{
        $aula = $_POST['aula'];
        $activo = $_POST['activo'];
        if (!$enlace) {
            echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
        }else{
            $enlace->set_charset("utf8");
            $aula = stripslashes(strip_tags(htmlspecialchars($aula)));
            $insertar = mysqli_query($enlace,"INSERT INTO aulas (nombreau, activo) VALUES ('$aula','$activo')");
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