<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Nuevo Estado </h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <label for="idnombreestado">Nombre estado</label>
                        <input type="text" class="form-control" id="idnombreestado" placeholder="Introduce estado">
                    </div>
                    <input type="checkbox" id="idestadoactivo" checked autocomplete="off"> Activo
                    </form>
                </div>

                <div class="card-footer text-muted">
                <button type="button" id='grabarestado' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Grabar</button>
                </div>
            </div>
        </div>
    </div>



<?php
require_once "../parcial/parte-inferior.php"
?>

<!-- SCRIPT PARA GRABAR ESTADO -->

<script>

$('#grabarestado').on('click', function () {
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
        texto = "<h4>¿Esta seguro de grabar el registro?</h4>";
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