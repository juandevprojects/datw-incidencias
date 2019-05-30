<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Editar estado</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/estados"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <label for="idnombreestado">Nombre Estado</label>
<?php
require_once "../parcial/conexion.php";
$encontrado = 0;
$id = $_GET['token'];
if ($enlace) {
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT nomestado, activo FROM estados WHERE idestado='$id';");
    if ($obtener){
        if (mysqli_num_rows($obtener)>0){
            $fila = mysqli_fetch_array($obtener);
            $texto = "<input type='text' class='form-control' id='idnombreestado' value='".$fila['nomestado']."' placeholder='Introduce estado'>";
            echo $texto;

?>
                    </div>

                    <input type="checkbox" id="idestadoactivo" <?php if ($fila['activo']){echo 'checked';} ?> > Activo
                    </form>
                </div>
                <div class="card-footer text-muted">
                <button type="button" id='modificaestado' class="btn btn-primary"><i class="far fa-save"></i> Grabar</button>
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


<!-- SCRIPT BOTON MODIFICAR -->
<script>

$('#modificaestado').on('click', function () {
    var estadoactivo = 0;
    if ($('#idestadoactivo').is(':checked')){
        estadoactivo = 1;
    }

    var hayerror = true;
    if ($('#idnombreestado').val() == 0) {
        $.alert('Debes introducir el estado');
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
                        url: 'http://grupo.cursoweb18.es/estados/procesa.php',
                        type: 'POST',
                        retrieve: true,
                        dataType: "JSON",
                        data: {
                            'id': item,
                            'modificar':'1',
                            'estado': $('#idnombreestado').val(),
                            'activo': estadoactivo,
                        },
                        success: function (viene_de_php) {
                            // $.alert(viene_de_php.msjrespuesta);
                            window.location.href = 'http://grupo.cursoweb18.es/estados';
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