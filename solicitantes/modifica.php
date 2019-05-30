<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Editar aula</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/solicitantes"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <label for="idnombreaula">Nombre Solicitante</label>
                            <?php
                            require_once "../parcial/conexion.php";
                            $encontrado = 0;
                            $id = $_GET['token'];
                            if ($enlace) {
                                $enlace->set_charset("utf8");
                                $obtener = mysqli_query($enlace,"SELECT nombresol, email, Activo FROM solicitantes WHERE idsol='$id';");
                                if ($obtener){
                                    if (mysqli_num_rows($obtener)>0){
                                        $fila = mysqli_fetch_array($obtener);
                                        $texto = "<input type='text' class='form-control' id='idnombresol' value='".$fila['nombresol']."' placeholder='Introduce solicitante'>";
                                        $texto .= "<label class='mb-3' class='form-control' id='nombresol' value='".$fila['nombresol']."'for='idnombreaula'>Nombre Solicitante</label>";
                                        $texto .= "<input type='text' class='form-control' id='idemail' value='".$fila['email']."' placeholder='Introduce el email'>";
                                        echo $texto;
                            ?>
                    </div>
                    <input type="checkbox" id="idsolicitanteactivo" <?php if ($fila['Activo']){echo 'checked';} ?> > Activo
                    </form>
                </div>
                <div class="card-footer text-muted">
                <button type="button" id='modificasolicitante' class="btn btn-primary"><i class="far fa-save"></i> Grabar</button>
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

<script>
    $('#modificarsol').click(function () {
        $.confirm({
            title: 'Seguro que quieres crear el registro?!',
            content: '',
            buttons: {
                aceptar: function () {
                    $.ajax({
                        url: 'http://grupo.cursoweb18.es/solicitantes/crearsol.php',
                        type: 'POST',
                        retrieve: true,
                        dataType: "JSON",
                        data: {
                            'id': item,
                            'idnombresol': $('#idnombresol').val(),

                        },
                        success: function (viene_de_php) {
                            $.confirm({
                                title: 'Solicitante creado!',
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