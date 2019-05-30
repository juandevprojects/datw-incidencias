<?php
require_once "../parcial/conexion.php";
// Acciones subcategorias
if (isset($_POST['modificar'])&&($_POST['modificar']=='1')){
    $id = $_POST['id'];
    $categoria = $_POST['categoria'];
    $subcategoria = $_POST['subcategoria'];
    $activo = $_POST['activo'];
    if (!$enlace) {
        echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
    }else{
        $enlace->set_charset("utf8");
        $aula = stripslashes(strip_tags(htmlspecialchars($subcategoria)));
        $editar = mysqli_query($enlace,"UPDATE subcategorias SET nombresubcat = '$subcategoria', activo='$activo',idcat = '$categoria' WHERE idsubcat='$id';");
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
            $eliminar = mysqli_query($enlace,"DELETE FROM subcategorias WHERE idsubcat='$id';");
            if (!$eliminar){
                echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO ELIMINAR EL REGISTRO'));
            }else{
                echo json_encode(array('resultado' => 'bien','msjrespuesta'=>"Eliminado el registro"));
            }
            mysqli_close($enlace);
        }
    }else{
        // Coger categorias de BBDD
        if (isset($_POST['categoria'])){
            $categoria = $_POST['categoria'];
            $subcategoria = $_POST['subcategoria'];
            $activo = $_POST['activo'];
            if (!$enlace) {
                echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
            }else{
                $enlace->set_charset("utf8");
                $insertar = mysqli_query($enlace,"INSERT INTO subcategorias (nombresubcat, activo,idcat) VALUES ('$subcategoria','$activo',$categoria)");
                if (!$insertar){
                    echo json_encode(array('resultado' => 'mal','msjrespuesta'=>'NO SE HA PODIDO INSERTAR EL REGISTRO'));
                }else{
                    echo json_encode(array('resultado' => 'bien','msjrespuesta'=>"Insertado el registro"));
                }
                mysqli_close($enlace);
            }
        }
    }
}


?>