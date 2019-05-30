<?php
header("Access-Control-Allow-Origin:*");
require_once "../parcial/conexion.php";
if ($_POST["idsol"] and $_POST["idamb"] and $_POST["idaul"] and $_POST["idsub"] and $_POST["idpri"] and $_POST["descripcion"]){
$idsol=$_POST['idsol'];
$idamb=$_POST['idamb'];
$idaul=$_POST['idaul'];
$idsub=$_POST['idsub'];
$idpri=$_POST['idpri'];
$descripcion=strip_tags(htmlspecialchars($_POST['descripcion']));
$substring = substr($descripcion,strpos($descripcion,"<style"),strpos($descripcion,"</style>")+2);
$descripcion = str_replace($substring,"",$descripcion);
$descripcion = str_replace(array("\t","\r","\n"),"",$descripcion);
$descripcion = trim($descripcion);
if (!$enlace) {
    echo json_encode(array('resultado' => 'mal','msg'=>'ERROR!! EN LA CONEXIÓN A LA BBDD'));
}else{
    $enlace->set_charset("utf8");
    $insertar = mysqli_query($enlace,"INSERT INTO incidencias (idsol, idamb, idaul, idsub, idpri, idest, descripcion, email, fechaemail) VALUES ('$idsol','$idamb','$idaul','$idsub','$idpri','$descripcion','1',NOW());");
    if (!$insertar){
        echo json_encode(array('resultado' => 'mal','msg'=>'ERROR!! NO SE HA PODIDO INSERTAR EL REGISTRO'));
    }else{
        echo json_encode(array('resultado' => 'bien','msg'=>"Insertado el registro"));
    }
    mysqli_close($enlace);
}}else{
                    echo json_encode(array('resultado' => 'mal', 'msg' => 'ERROR!! Hay que rellenar todos los datos'));
            }


?>