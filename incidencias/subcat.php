<?php
header('Access-Control-Allow-Origin: *');
$idcat=$_POST['idcat'];
include_once "../parcial/conexion.php";
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT * FROM subcategorias WHERE idcat=$idcat;");
    if ($obtener){
            if (mysqli_num_rows($obtener)>0){
                while ($fila = mysqli_fetch_array($obtener)){
                    $subcategorias['idsubcat'][]=$fila['idsubcat'];
                    $subcategorias['nombresubcat'][]=$fila['nombresubcat'];
                    $subcategorias['Activo'][]=$fila['Activo'];
                }
            }
            mysqli_free_result($obtener);
        }
        $numero=0;
        $numeral=$subcategorias['idsubcat'];
        $ultimo=count($numeral);
        $resultado="<option value='0'>Seleccione subcategoria</option> ";
       while ($numero<$ultimo){
           if ($subcategorias['Activo'][$numero]==FALSE){
           }else{$resultado.="<option value=".$subcategorias['idsubcat'][$numero].">".$subcategorias['nombresubcat'][$numero]."</option>";}
           $numero++;
}
    mysqli_close($enlace);

echo json_encode(array('resultado' => $resultado));

                        ?>