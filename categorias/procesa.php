<?php
require_once "../parcial/conexion.php";


if (isset($_POST['modificar'])&&($_POST['modificar']=='1')){
    $id = $_POST['id'];
    $categoria = $_POST['cat'];
    $activo = $_POST['activo'];
    if (!$enlace) {
        echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
    }else{
        $enlace->set_charset("utf8");
        $editar = mysqli_query($enlace,"UPDATE categorias SET nombrecat = '$categoria', Activo='$activo' WHERE idcat='$id';");
        if (!$editar){
            echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO MODIFICAR EL REGISTRO'));
        }else{
            echo json_encode(array('resultado' => 'bien','msjrespuesta'=>"Modificado el registro"));
        }
        mysqli_close($enlace);

        // Modificar todos los parámetros de borra y modifica de acuerdo a los campos de la tabla categoria
    }
}else{
    if (isset($_POST['borrar'])&&($_POST['borrar']=='1')){
        $id = $_POST['id'];
        if (!$enlace) {
            echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
        }else{
            $enlace->set_charset("utf8");
            $eliminar = mysqli_query($enlace,"DELETE FROM categorias WHERE idcat='$id';");
            if (!$eliminar){
                $textoerror='';
                if (mysqli_errno($enlace)==1451){
                    $textoerror='. NO PUEDES ELIMINAR LA CATEGORIA PORQUE TIENE SUBCATEGORIAS ASOCIADAS.';
                }
                // echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO ELIMINAR EL REGISTRO ('.mysqli_error($enlace).')'));
                echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO ELIMINAR EL REGISTRO'.$textoerror.''));
            }else{
                echo json_encode(array('resultado' => 'bien','msjrespuesta'=>"Eliminado el registro"));
            }
            mysqli_close($enlace);
        }
    }else{
        $categoria = $_POST['categoria'];
        $activo = $_POST['activo'];

        if (!$enlace) {
            echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
        }else{
            $enlace->set_charset("utf8");
            $insertar = mysqli_query($enlace,"INSERT INTO categorias (nombrecat, Activo) VALUES ('$categoria','$activo')");
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