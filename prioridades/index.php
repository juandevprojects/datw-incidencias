<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Relación de Prioridades</h2>
                    <div class="navbar-text">
                    <a href="http://grupo.cursoweb18.es/prioridades/alta.php"><button type="button" id='nueva'  name='nueva' class="btn btn-info"><i class="fa fa-plus"></i> Nueva Prioridad</button></a>
                    <a href="http://grupo.cursoweb18.es/"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button></a>
                    </div>
                </div>
                <div class="card-body">

<?php
require_once "../parcial/conexion.php";
if (!$enlace) {
    echo "<h2>ERROR!! EN LA CONEXIÓN A LA BBDD</h2>";
}else{
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace, "SELECT * FROM prioridades ORDER BY idpri;");
    if ($obtener){
        if (mysqli_num_rows($obtener)>0){
            $texto="<table class='table table-striped'>";
            $texto.="<thead><tr><th scope='col'>Acciones</th><th scope='col'>Nombre Prioridad</th><th scope='col'>Activo</th></tr></thead><tbody>";
            while ($fila = mysqli_fetch_array($obtener)){
                // $texto.="<tr><td>".$fila['idpri']."</td><td>".$fila['nompri']."</td><td>".$fila['Activo']."</td></tr>";
                $texto.="<tr><td>
                <a href='http://grupo.cursoweb18.es/prioridades/modifica.php?token=".$fila['idpri']."'><button type='button' class='btn btn-warning'><i class='far fa-edit'></i> Modificar</button></a>
                        <a href='http://grupo.cursoweb18.es/prioridades/borra.php?token=".$fila['idpri']."'><button type='button' class='btn btn-danger'><i class='fas fa-trash-alt'></i> Borrar</button>
                        </a></td><td>".$fila['nompri']."</td><td>".$fila['Activo']."</td></tr>";
            }
            $texto.="</tbody></table>";
            echo $texto;
        }else{
            echo "<h2>NO SE HA ENCONTRADO PRIORIDADES</h2>";
        }
        mysqli_free_result($obtener);
    }else{
        echo "<h2>ERROR!! EN LA OBTENCIÓN DE PRIORIDADES</h2>";
    }
    mysqli_close($enlace);
}
?>



                </div>
            </div>
        </div>
    </div>
<?php
require_once "../parcial/parte-inferior.php"
?>