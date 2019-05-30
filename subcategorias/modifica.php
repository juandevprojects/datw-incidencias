<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Editar estado</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/subcategorias"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    
                    <div class="form-group">
                    
                        <label for="idnombresubcat">Nombre subcategoria</label>
<?php
require_once "../parcial/conexion.php";
$encontrado = 0;
$id = $_GET['token'];
if ($enlace) {
    $enlace->set_charset("utf8");
    //idsubcat idcat nombresubcat
    $obtener = mysqli_query($enlace,"SELECT idsubcat,nombresubcat,Activo,idcat FROM subcategorias WHERE idsubcat='$id';");
    if ($obtener){
        if (mysqli_num_rows($obtener)>0){
            $fila = mysqli_fetch_array($obtener);
            $texto = "<input type='text' class='form-control' id='idnombresubcat' value='".$fila['nombresubcat']."' placeholder='Introduce subcategoría'>";
            echo $texto;

?>
                    </div>



                    <div class="form-group">
                        <!-- SELECT -->

                        <label for="idnombrecat" class="text-left">Categoría</label>
                                                <select id="idnombrecat" class="form-control">
                                                    <option value='0'>Selecciona Categoría</option>
                                                    <?php
                                                    // require_once "../parcial/conexion.php";
                                                
                                                        if (!$enlace) {
                                                            echo "<h2>ERROR!! EN LA CONEXIÓN A LA BBDD</h2>";
                                                        }else{
                                                            $enlace->set_charset("utf8");
                                                            $obtener = mysqli_query($enlace, "SELECT * FROM categorias WHERE activo=1;");
                                                            if ($obtener){
                                                                if (mysqli_num_rows($obtener)>0){
                                                                    while ($fila = mysqli_fetch_array($obtener)){
                                                                        //Cada fila que nos devuelve, construimos option
                                                                        echo "<option value='".$fila['idcat']."'>".$fila['nombrecat']."</option>";
                                                                    }
                                                                }
                                                                mysqli_free_result($obtener);
                                                            }
                                                            mysqli_close($enlace);
                                                        };
                                                    ?>
                                                </select>
                        <!-- FIN SELECT EXTRa -->

                    <input type="checkbox" id="idsubcatactiva" <?php if ($fila['Activo']){echo 'checked';} ?> > Activo
                    </form>
                </div>
                <div class="card-footer text-muted">
                <button type="button" id='modificasubcat' class="btn btn-primary"><i class="far fa-save"></i> Grabar</button>
                </div>
            </div>
        </div>
    </div>
<?php
echo "<script>var item = $id</script>";
}
// mysqli_free_result($obtener);
}
}
require_once "../parcial/parte-inferior.php";
?>


<!-- SCRIPT BOTON MODIFICAR -->
<script>

$('#modificasubcat').on('click', function () {
    var subcatactiva = 0;
    if ($('#idsubcatactiva').is(':checked')){
        subcatactiva = 1;
    }

    var hayerror = true;
    if ($('#idnombresubcat').val() == 0) {
        $.alert('Debes introducir la subcategoría');
    } else {
        hayerror = false;
    }
    if (! hayerror){
        texto = "<h4>¿Esta seguro de modificar el registro?</h4>";
        $.confirm({
            title: 'Confirmación!',
            content: texto,
            buttons: {
                aceptar: function () {
                    $.ajax({
                        url: 'http://grupo.cursoweb18.es/subcategorias/procesa.php',
                        type: 'POST',
                        retrieve: true,
                        dataType: "JSON",
                        data: {
                            'id': item,
                            'modificar':'1',
                            'subcategoria': $('#idnombresubcat').val(),
                            'categoria':$('#idnombrecat').val(),
                            'activo': subcatactiva,
                        },
                        success: function (viene_de_php) {
                            // $.alert(viene_de_php.msjrespuesta);
                            window.location.href = 'http://grupo.cursoweb18.es/subcategorias';
                        },

                        error: function () {
                            $.alert('ERROR Se ha producido un error en la comunicacion.');
                        }
                    })
                },
                cancelar: function () {
                    $.alert('Cancelado!');
                }
            }
        })
    }

});

</script>