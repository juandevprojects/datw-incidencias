<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Relación de Incidencias</h2>
                    <div class="navbar-text">
                    <a href="http://grupo.cursoweb18.es/incidencias/alta.php"><button type="button" id='nueva'  name='nueva' class="btn btn-info"><i class="fa fa-plus"></i> Nueva Incidencia</button></a>
                        <a href="http://grupo.cursoweb18.es/"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">

                <?php
                require_once "../parcial/conexion.php";
                if (!$enlace) {
                    echo "<h2>ERROR!! EN LA CONEXIÓN A LA BBDD</h2>";
                }else{
                    $enlace->set_charset("utf8");
                    $obtener = mysqli_query($enlace, "SELECT * FROM incidencias ORDER BY idinc;");
                    if ($obtener){
                        if (mysqli_num_rows($obtener)>0){
                            $texto="<table class='table table-striped'>";
                            $texto.="<thead><tr><th scope='col'>Identificador</th><th scope='col'>Solicitante</th><th scope='col'>Ámbito</th><th scope='col'>Aula</th><th scope='col'>Subcategoria</th><th scope='col'>Estado</th><th scope='col'>Descripción</th><th scope='col'>Email</th><th scope='col'>Fecha del Email</th></tr></thead><tbody>";
                            while ($fila = mysqli_fetch_array($obtener)){
                                $texto.="<tr><td>".$fila['idinc']."</td><td>".$fila['idsol']."</td><td>".$fila['idamb']."</td><td>".$fila['idaul']."</td><td>".$fila['idsub']."</td><td>".$fila['idpri']."</td><td>".$fila['idest']."</td><td>".$fila['descripcion']."</td><td>".$fila['email']."</td><td>".$fila['fechaemail']."</td></tr>";
                            }
                            $texto.="</tbody></table>";
                            echo $texto;
                        }else{
                            echo "<h2>NO SE HAN ENCONTRADO INCIDENCIAS PARA LISTAR</h2>";
                        }
                        mysqli_free_result($obtener);
                    }else{
                        echo "<h2>ERROR!! EN LA OBTENCIÓN DE INCIDENCIAS</h2>";
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