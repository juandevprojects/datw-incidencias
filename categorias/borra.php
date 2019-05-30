<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Eliminar Categoría</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/categorias"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>


<?php
require_once "../parcial/conexion.php";
$encontrado = 0;
$texto = "<div class='form-group'>";
$id = $_GET['token'];
if ($enlace) {
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT nombrecat, Activo FROM categorias WHERE idcat='$id';");
    if ($obtener){
        if (mysqli_num_rows($obtener)>0){
            $texto .= "<label for='idnombrcat'>Nombre Categoría</label>";
            $fila = mysqli_fetch_array($obtener);
            $texto .= "<input type='text' class='form-control' id='idnombrcat' value='".$fila['nombrecat']."' readonly>";
            if ($fila['Activo']){
                $texto .= "</div><label>ACTIVO</label>";
            }else{
                $texto .= "</div><label>NO ACTIVO</label>";
            }
            $encontrado = 1;
        }else{
            $texto .= "</div><h2>NO SE HA ENCONTRADO LA CATEGORÍA</h2>";
        }
        echo $texto;
        mysqli_free_result($obtener);
    }
    mysqli_close($enlace);
}

?>



                    </form>
                </div>

                <div class="card-footer text-muted">
<?php
    if ($encontrado == 1){
        echo "<button type='button' id='borrarcat' class='btn btn-danger'><i class='fas fa-trash-alt'></i> Borrar</button>";
    }
    echo "<script>var item=$id</script>";
?>

                </div>
            </div>
        </div>
    </div>


<?php
require_once "../parcial/parte-inferior.php"
?>

