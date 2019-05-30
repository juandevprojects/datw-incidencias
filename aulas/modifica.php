<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Editar aula</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/aulas"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <label for="idnombreaula">Nombre Aula</label>
<?php
require_once "../parcial/conexion.php";
$encontrado = 0;
$id = $_GET['token'];
if ($enlace) {
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT nombreau, Activo FROM aulas WHERE idau='$id';");
    if ($obtener){
        if (mysqli_num_rows($obtener)>0){
            $fila = mysqli_fetch_array($obtener);
            $texto = "<input type='text' class='form-control' id='idnombreaula' value='".$fila['nombreau']."' placeholder='Introduce aula'>";
            echo $texto;

?>
                    </div>

                    <input type="checkbox" id="idaulaactiva" <?php if ($fila['Activo']){echo 'checked';} ?> > Activo
                    </form>
                </div>
                <div class="card-footer text-muted">
                <button type="button" id='modificaaula' class="btn btn-primary"><i class="far fa-save"></i> Grabar</button>
                </div>
            </div>
        </div>
    </div>
<?php
echo "<script>var item = $id</script>";
}
mysqli_free_result($obtener);
}
}
require_once "../parcial/parte-inferior.php";
?>