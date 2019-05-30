<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Nuevo Ámbito</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <label for="idnombreambito">Nombre Ámbito</label>
                        <input type="text" class="form-control" id="idnombreambito" placeholder="Introduce ambito">
                    </div>
                    <input type="checkbox" id="idambitoactivo" checked autocomplete="off"> Activo
                    </form>
                </div>

                <div class="card-footer text-muted">
                <button type="button" id='grabarambito' class="btn btn-primary"><i class="far fa-save"></i> Grabar</button>
                </div>
            </div>
        </div>
    </div>
<?php
require_once "../parcial/parte-inferior.php"
?>