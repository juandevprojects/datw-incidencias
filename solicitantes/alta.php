<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Nuevo Solicitante</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <label for="idsolicitante">Nombre Solicitante</label>
                        <input type="text" class="form-control" id="idsolicitante" placeholder="Introduce solicitante">
                        <label for="idemail">Email</label>
                        <input type="text" class="form-control" id="idemail" placeholder="Introduce email">
                    </div>
                    <input type="checkbox" id="idsolicitanteactiva" checked autocomplete="off"> Activo
                    </form>
                </div>
                <div class="card-footer text-muted">
                <button type="button" id='grabarsolicitantes' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Grabar</button>
                </div>
            </div>
        </div>
    </div>
    

<?php
require_once "../parcial/parte-inferior.php"

?>
<script>
    $('#grabarsolicitantes').click(function () {
    var aulaactiva = 0;
    if ($('#idsolicitanteactiva').is(':checked')){
        aulaactiva = 1;
    }
    var hayerror = true;
    if ($('#idsolicitante').val() == 0) {
        $.alert('Debes introducir el aula');
        if ($('#idemail').val() == 0) {
        $.alert('Debes introducir el email');
        if (/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email)){
  } else {
   alert("La dirección de email es incorrecta.");
  }
    }
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
                        url: 'http://grupo.cursoweb18.es/solicitantes/procesa.php',
                        type: 'POST',
                        retrieve: true,
                        dataType: "JSON",
                        data: {
                            'solicitante': $('#idsolicitante').val(),
                            'email': $('#idemail').val(),
                            'activo': aulaactiva,
                        },
                        success: function (viene_de_php) {
                            // $.alert(viene_de_php.msjrespuesta);
                            window.location.href = 'http://grupo.cursoweb18.es/solicitantes';
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