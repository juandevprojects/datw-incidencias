<?php
header('Access-Control-Allow-Origin: *');

require_once "../parcial/conexion.php";
$id = $_POST['id'];
if ($enlace) {
    $borrar = mysqli_query($enlace,"DELETE FROM solicitantes WHERE idsol='$id';");
    $mensaje="Se ha eliminado el registro de la tabla de Solicitantes";

}else{
    $mensaje="No se ha podido eliminar el registro de la tabla Solicitantes";
}
echo json_encode(array('mensaje', $mensaje));
?>