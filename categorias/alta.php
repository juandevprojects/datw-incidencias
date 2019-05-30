<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Nueva categoria</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <label for="idnombrecat">Nombre categoria</label>
                        <input type="text" class="form-control" id="idnombrecat" placeholder="Introduce categoria">
                    </div>
                    <input type="checkbox" id="idcatactiva" checked autocomplete="off"> Activo
                    </form>
                </div>

                <div class="card-footer text-muted">
                <button type="button" id='grabarcat' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Grabar</button>
                </div>
            </div>
        </div>
    </div>

<!-- Como hay conflicto con el js original metemos nuestro script aquí -->

    <!-- <script>
        $('#grabarcat').on('click', function () {

        var catactiva = 0;
        if ($('#idcatactiva').is(':checked')) {
            catactiva = 1;
        }

        var hayerror = true;
        if ($('#idnombrecat').val() == 0) {
            $.alert('Debes introducir la categoría');
        } else {
            hayerror = false;
        }

        if (!hayerror) {
            texto = "<h4>¿Esta seguro de grabar el registro?</h4>";
            $.confirm({
            title: 'Confirmación!',
            content: texto,
            buttons: {
            aceptar: function () {
            $.ajax({
                url: 'http://grupo.cursoweb18.es/categorias/procesa.php',
                type: 'POST',
                retrieve: true,
                dataType: "JSON",
                data: {
                'categoria': $('#idnombrecat').val(),
                'activo': catactiva,
                },
                success: function (viene_de_php) {
                // $.alert(viene_de_php.msjrespuesta);
                window.location.href = 'http://grupo.cursoweb18.es/categorias';
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
    </script> -->



<?php
require_once "../parcial/parte-inferior.php"
?>