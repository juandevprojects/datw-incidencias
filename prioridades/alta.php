<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Nueva Prioridad</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/prioridades"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <label for="idnombre">Tipo Prioridad</label>
                        <input type="text" class="form-control" id="idnombreprioridad" placeholder="Introduce prioridad">
                    </div>
                    <input type="checkbox" id="idprioridadactiva" checked autocomplete="off"> Activo
                    </form>
                </div>

                <div class="card-footer text-muted">
                <button type="button" id='grabarprioridad' class="btn btn-primary"><i class="far fa-save"></i> Grabar</button>
                </div>
            </div>
        </div>
    </div>
<?php
require_once "../parcial/parte-inferior.php"
?>