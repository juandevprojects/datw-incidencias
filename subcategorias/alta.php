<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Nueva subcategoria</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/subcategorias"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <!-- SELECT -->

                        <label for="idnombrecat" class="text-left">Categoría</label>
                                                <select id="idnombrecat" class="form-control">
                                                    <option value='0'>Selecciona Categoría</option>
                                                    <?php
                                                    require_once "../parcial/conexion.php";
                                                
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

<!-- AÑADIR INPUT SUBCATEGORÍA -->

                    </div>
                    </form>
                </div>

                <!-- INPUT SUBCATEGORIA -->
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <label for="idnombresubcat">Nombre subcategoría</label>
                        <input type="text" class="form-control" id="idnombresubcat" placeholder="Introduce subcategoría">
                    </div>
                    <input type="checkbox" id="idsubcatactivo" checked autocomplete="off"> Activo
                    </form>
                </div>

                <div class="card-footer text-muted">
                <button type="button" id='grabarsubcat' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Grabar</button>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once "../parcial/parte-inferior.php";
?>

<!-- SCRIPT PARA GRABAR SUBCATEGORÍA -->

<script>
    $(function(){
        $('#grabarsubcat').on('click', function () {
        var estadoactivo = 0;
        if ($('#idsubcatactivo').is(':checked')){
            estadoactivo = 1;
        }

        var hayerror = true;

    if($('#idnombrecat').val()==0){
        $.alert('Debes seleccionar la categoría');
    }else{


        if ($('#idnombresubcat').val() == 0) {
            $.alert('Debes introducir la subcategoría');
        } else {
            hayerror = false;
        }
    }
        if (! hayerror){
            texto = "<h4>¿Esta seguro de grabar el registro?</h4>";
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
                                'categoria': $('#idnombrecat').val(),
                                'subcategoria': $('#idnombresubcat').val(),
                                'activo': estadoactivo,
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

        
    });


</script>