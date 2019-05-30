<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Eliminar solicitante</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/solicitantes"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
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
                            $obtener = mysqli_query($enlace,"SELECT nombresol, email, Activo FROM solicitantes WHERE idsol='$id';");
                            if ($obtener){
                                if (mysqli_num_rows($obtener)>0){
                                    $texto .= "<label for='idnombresol'>Nombre del solicitante</label>";
                                    $fila = mysqli_fetch_array($obtener);
                                    $texto .= "<input type='text' class='form-control' id='idnombresol' value='".$fila['nombresol']."' readonly>";
                                    $texto .= "<label class='mt-3' for='idemail'>Email</label>";
                                    $texto .= "<input type='text' class='form-control' id='idemail' value='".$fila['email']."' readonly>";
                                    if ($fila['Activo']){
                                        $texto .= "</div><label>ACTIVO</label>";
                                    }else{
                                        $texto .= "</div><label>NO ACTIVO</label>";
                                    }
                                    $encontrado = 1;
                                }else{
                                    $texto .= "</div><h2>NO SE HA ENCONTRADO EL SOLICITANTE</h2>";
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
                            echo "<button type='button' id='borrarsol' class='btn btn-danger'> Borrar</button>";
                        }
                        echo "<script>var item=$id</script>"//Token del id solicitante;
                        ?>
                </div>
            </div>
        </div>
    </div>

<?php
require_once "../parcial/parte-inferior.php"
?>

<script>
    $('#borrarsol').click(function () {
        $.confirm({
            title: 'Seguro que quieres borrar el registro?!',
            content: '',
            buttons: {
                aceptar: function () {
                    $.ajax({
                        url: 'http://grupo.cursoweb18.es/solicitantes/borrasol.php',
                        type: 'POST',
                        retrieve: true,
                        dataType: "JSON",
                        data: {
                            'id': item,
                        },
                        success: function (viene_de_php) {
                            // $.alert(viene_de_php.msjrespuesta);
                            $.confirm({
                                title: 'Borrado completado!',
                                content: viene_de_php.mensaje,
                                buttons:{
                                    Aceptar:function(){
                                        window.location.href = 'http://grupo.cursoweb18.es/solicitantes';
                                    },
                                }
                            });
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
    });
</script>
