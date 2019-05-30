<?php
require_once "../parcial/parte-superior.php"
?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card col-lg-8">
                <div class="card-header d-inline-flex justify-content-between">
                    <h2>Nueva incidencias</h2>
                    <div class="navbar-text">
                        <a href="http://grupo.cursoweb18.es/"><button type="button" id='volver'  name='volver' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
<<<<<<< .mine
                    <div class="form-group container">
                        <div class="row">
                            <div class="col">
                                <label for="solicitanteincidencia">Solicitantes:</label>
                                <select class="form-control d-block  mb-3" id="solicitanteincidencia">
                                <option value="0">Seleccione Solicitante</option>
                                <?php
                                require_once "../parcial/conexion.php";
                                if (!$enlace) {
                                    }else{
                                        $enlace->set_charset("utf8");
                                        $obtener = mysqli_query($enlace,"SELECT * FROM solicitantes");
                                        if ($obtener){
                                                if (mysqli_num_rows($obtener)>0){
                                                    while ($fila = mysqli_fetch_array($obtener)){
                                                        $solicitante['idsol'][]=$fila['idsol'];
                                                        $solicitante['nombresol'][]=$fila['nombresol'];
                                                        $solicitante['email'][]=$fila['email'];
                                                        $solicitante['Activo'][]=$fila['Activo'];
                                                    }
                                                }
                                                mysqli_free_result($obtener);
                                            }
                                            $numero=0;        
                                            $numeral=$solicitante['idsol'];
                                            $ultimo=count($numeral);
                                        while ($numero<$ultimo){
                                            if ($solicitante['Activo'][$numero]==FALSE){
                                            }else{echo ("<option value=".$solicitante['idsol'][$numero].">".$solicitante['nombresol'][$numero]."</option>");}
                                            $numero++;
                                                
                                        }
                                        mysqli_close($enlace);
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="ambitoincidencia">Ambito:</label><br>
                                <select class="form-control d-block  mb-3" id="ambitoincidencia">
                                <option value="0">Seleccione Ambito</option>
                                <?php
                                if (!$enlace) {
                                    }else{
                                        $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
                                        $enlace->set_charset("utf8");
                                        $obtener = mysqli_query($enlace,"SELECT * FROM ambitos");
                                        if ($obtener){
                                                if (mysqli_num_rows($obtener)>0){
                                                    while ($fila = mysqli_fetch_array($obtener)){
                                                        $ambitos['idamb'][]=$fila['idamb'];
                                                        $ambitos['nombreamb'][]=$fila['nombreamb'];
                                                        $ambitos['Activo'][]=$fila['Activo'];
                                                    }
                                                }
                                                mysqli_free_result($obtener);
                                            }
                                            $numero=0;
                                            $numeral=$ambitos['idamb'];
                                            $ultimo=count($numeral);
                                        while ($numero<$ultimo){
                                            if ($ambitos['Activo'][$numero]==FALSE){
                                            }else{echo ("<option value=".$ambitos['idamb'][$numero].">".$ambitos['nombreamb'][$numero]."</option>");}
                                            $numero++;
                                        }
                                        mysqli_close($enlace);
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="aulaincidencia">Aula:</label>
                                <select class="form-control d-block  mb-3" id="aulaincidencia">
                                <option value="0">Seleccione Aula</option>
                                <?php
                                if (!$enlace) {
                                    }else{
                                        $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
                                        $enlace->set_charset("utf8");
                                        $obtener = mysqli_query($enlace,"SELECT * FROM aulas");
                                        if ($obtener){
                                                if (mysqli_num_rows($obtener)>0){
                                                    while ($fila = mysqli_fetch_array($obtener)){
                                                        $aulas['idau'][]=$fila['idau'];
                                                        $aulas['nombreau'][]=$fila['nombreau'];
                                                        $aulas['Activo'][]=$fila['Activo'];
                                                    }
                                                }
                                                mysqli_free_result($obtener);
                                            }
                                            $numero=0;
                                            $numeral=$aulas['idau'];
                                            $ultimo=count($numeral);
                                        while ($numero<$ultimo){
                                            if ($aulas['Activo'][$numero]==FALSE){
                                            }else{echo ("<option value=".$aulas['idau'][$numero].">".$aulas['nombreau'][$numero]."</option>");}
                                            $numero++;
                                                
                                        }
                                        mysqli_close($enlace);
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="prioridadincidencia">Prioridad:</label>
                                <select class="form-control d-block  mb-3" id="prioridadincidencia">
                                <option value="0">Seleccione Prioridad</option>
                                <?php
                                if (!$enlace) {
                                    }else{
                                        $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
                                        $enlace->set_charset("utf8");
                                        $obtener = mysqli_query($enlace,"SELECT * FROM prioridades");
                                        if ($obtener){
                                                if (mysqli_num_rows($obtener)>0){
                                                    while ($fila = mysqli_fetch_array($obtener)){
                                                        $prioridades['idpri'][]=$fila['idpri'];
                                                        $prioridades['nombrepri'][]=$fila['nombrepri'];
                                                        $prioridades['Activo'][]=$fila['Activo'];
                                                    }
                                                }
                                                mysqli_free_result($obtener);
                                            }
                                            $numero=0;
                                            $numeral=$aulas['idau'];
                                            $ultimo=count($numeral);
                                        while ($numero<$ultimo){
                                            if ($prioridades['Activo'][$numero]==FALSE){
                                            }else{echo ("<option value=".$prioridades['idpri'][$numero].">".$prioridades['nombrepri'][$numero]."</option>");}
                                            $numero++;
                                                
                                        }
                                        mysqli_close($enlace);
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="categoriaincidencia">Categoria:</label>
                                <select class="form-control d-block  mb-3" id="categoriaincidencia">
                                <option value="0">Seleccione Categoria</option>
                                <?php
                                if (!$enlace) {
                                    }else{
                                        $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
                                        $enlace->set_charset("utf8");
                                        $obtener = mysqli_query($enlace,"SELECT * FROM categorias");
                                        if ($obtener){
                                                if (mysqli_num_rows($obtener)>0){
                                                    while ($fila = mysqli_fetch_array($obtener)){
                                                        $categorias['idcat'][]=$fila['idcat'];
                                                        $categorias['nombrecat'][]=$fila['nombrecat'];
                                                        $categorias['Activo'][]=$fila['Activo'];
                                                    }
                                                }
                                                mysqli_free_result($obtener);
                                            }
                                            $numero=0;
                                            $numeral=$aulas['idau'];
                                            $ultimo=count($numeral);
                                        while ($numero<$ultimo){
                                            if ($categorias['Activo'][$numero]==FALSE){
                                            }else{echo ("<option value=".$categorias['idcat'][$numero].">".$categorias['nombrecat'][$numero]."</option>");}
                                            $numero++;
                                                
                                        }
                                        mysqli_close($enlace);
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="subategoriaincidencia">Subategoria:</label>
                                <select class="form-control d-block mb-3" id="subategoriaincidencia">
                                <option value="0">Seleccione antes categoria</option>
                                </select>
                            </div>
                        </div>
                            <label for="descripcionincidencia">Descripcion:</label>
                            <textarea class="form-control" id="descripcionincidencia" cols="30" rows="10" placeholder="Introduce una descripcion de la incidencia"></textarea>
                        </form>
||||||| .r70
                    <div class="form-group">
                        <label for="solicitanteincidencia">Solicitantes</label>
                        <select id="solicitanteincidencia">
                        <option value="0">Seleccione Solicitante</option>
                        <?php
                        require_once "../parcial/conexion.php";
                        if (!$enlace) {
}else{
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT * FROM solicitantes");
    if ($obtener){
            if (mysqli_num_rows($obtener)>0){
                while ($fila = mysqli_fetch_array($obtener)){
                    $solicitante['idsol'][]=$fila['idsol'];
                    $solicitante['nombresol'][]=$fila['nombresol'];
                    $solicitante['email'][]=$fila['email'];
                    $solicitante['Activo'][]=$fila['Activo'];
                }
            }
            mysqli_free_result($obtener);
        }
        $numero=0;        
        $numeral=$solicitante['idsol'];
        $ultimo=count($numeral);
       while ($numero<$ultimo){
           if ($solicitante['Activo'][$numero]==FALSE){
           }else{echo ("<option value=".$solicitante['idsol'][$numero].">".$solicitante['nombresol'][$numero]."</option>");}
           $numero++;
            
       }
    mysqli_close($enlace);
}
                        ?>
                        </select>
                        <label for="ambitoincidencia">Ambito</label>
                        <select id="ambitoincidencia">
                        <option value="0">Seleccione Ambito</option>
                        <?php
                        if (!$enlace) {
}else{
    $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT * FROM ambitos");
    if ($obtener){
            if (mysqli_num_rows($obtener)>0){
                while ($fila = mysqli_fetch_array($obtener)){
                    $ambitos['idamb'][]=$fila['idamb'];
                    $ambitos['nombreamb'][]=$fila['nombreamb'];
                    $ambitos['Activo'][]=$fila['Activo'];
                }
            }
            mysqli_free_result($obtener);
        }
        $numero=0;
        $numeral=$ambitos['idamb'];
        $ultimo=count($numeral);
       while ($numero<$ultimo){
           if ($ambitos['Activo'][$numero]==FALSE){
           }else{echo ("<option value=".$ambitos['idamb'][$numero].">".$ambitos['nombreamb'][$numero]."</option>");}
           $numero++;
       }
    mysqli_close($enlace);
}
                        ?>
                        </select>

                        <label for="aulaincidencia">Aula</label>
                        <select id="aulaincidencia">
                        <option value="0">Seleccione Aula</option>
                        <?php
                        if (!$enlace) {
}else{
    $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT * FROM aulas");
    if ($obtener){
            if (mysqli_num_rows($obtener)>0){
                while ($fila = mysqli_fetch_array($obtener)){
                    $aulas['idau'][]=$fila['idau'];
                    $aulas['nombreau'][]=$fila['nombreau'];
                    $aulas['Activo'][]=$fila['Activo'];
                }
            }
            mysqli_free_result($obtener);
        }
        $numero=0;
        $numeral=$aulas['idau'];
        $ultimo=count($numeral);
       while ($numero<$ultimo){
           if ($aulas['Activo'][$numero]==FALSE){
           }else{echo ("<option value=".$aulas['idau'][$numero].">".$aulas['nombreau'][$numero]."</option>");}
           $numero++;
            
       }
    mysqli_close($enlace);
}
                        ?>
</select>
                        <label for="prioridadincidencia">Prioridad</label>
                        <select id="prioridadincidencia">
                        <option value="0">Seleccione Prioridad</option>
                        <?php
                        if (!$enlace) {
}else{
    $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT * FROM prioridades");
    if ($obtener){
            if (mysqli_num_rows($obtener)>0){
                while ($fila = mysqli_fetch_array($obtener)){
                    $prioridades['idpri'][]=$fila['idpri'];
                    $prioridades['nombrepri'][]=$fila['nombrepri'];
                    $prioridades['Activo'][]=$fila['Activo'];
                }
            }
            mysqli_free_result($obtener);
        }
        $numero=0;
        $numeral=$aulas['idau'];
        $ultimo=count($numeral);
       while ($numero<$ultimo){
           if ($prioridades['Activo'][$numero]==FALSE){
           }else{echo ("<option value=".$prioridades['idpri'][$numero].">".$prioridades['nombrepri'][$numero]."</option>");}
           $numero++;
            
       }
    mysqli_close($enlace);
}
                        ?>
                        </select>
                        <label for="categoriaincidencia">Categoria</label>
                        <select id="categoriaincidencia">
                        <option value="0">Seleccione Categoria</option>
                        <?php
                        if (!$enlace) {
}else{
    $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT * FROM categorias");
    if ($obtener){
            if (mysqli_num_rows($obtener)>0){
                while ($fila = mysqli_fetch_array($obtener)){
                    $categorias['idcat'][]=$fila['idcat'];
                    $categorias['nombrecat'][]=$fila['nombrecat'];
                    $categorias['Activo'][]=$fila['Activo'];
                }
            }
            mysqli_free_result($obtener);
        }
        $numero=0;
        $numeral=$aulas['idau'];
        $ultimo=count($numeral);
       while ($numero<$ultimo){
           if ($categorias['Activo'][$numero]==FALSE){
           }else{echo ("<option value=".$categorias['idcat'][$numero].">".$categorias['nombrecat'][$numero]."</option>");}
           $numero++;
            
       }
    mysqli_close($enlace);
}
                        ?>
                        </select>
                        <label for="subategoriaincidencia">Subategoria</label>
                        <select id="subategoriaincidencia">
                        <option value="0">Seleccione antes categoria</option>
                        </select>
                        <label for="descripcionincidencia">Descripcion</label>
                        <textarea id="descripcionincidencia" cols="30" rows="10" placeholder="Introduce una descripcion de la incidencia"></textarea>
=======
                    <div class="form-group">
                        <label for="solicitanteincidencia">Solicitantes</label>
                        <select id="solicitanteincidencia">
                        <option value="0">Seleccione Solicitante</option>
                        <?php
                        require_once "../parcial/conexion.php";
                        if (!$enlace) {
}else{
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT * FROM solicitantes");
    if ($obtener){
            if (mysqli_num_rows($obtener)>0){
                while ($fila = mysqli_fetch_array($obtener)){
                    $solicitante['idsol'][]=$fila['idsol'];
                    $solicitante['nombresol'][]=$fila['nombresol'];
                    $solicitante['email'][]=$fila['email'];
                    $solicitante['Activo'][]=$fila['Activo'];
                }
            }
            mysqli_free_result($obtener);
        }
        $numero=0;
        $numeral=$solicitante['idsol'];
        $ultimo=count($numeral);
       while ($numero<$ultimo){
           if ($solicitante['Activo'][$numero]==FALSE){
           }else{echo ("<option value=".$solicitante['idsol'][$numero].">".$solicitante['nombresol'][$numero]."</option>");}
           $numero++;

       }
    mysqli_close($enlace);
}
                        ?>
                        </select>
                        <label for="ambitoincidencia">Ambito</label>
                        <select id="ambitoincidencia">
                        <option value="0">Seleccione Ambito</option>
                        <?php
                        if (!$enlace) {
}else{
    $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT * FROM ambitos");
    if ($obtener){
            if (mysqli_num_rows($obtener)>0){
                while ($fila = mysqli_fetch_array($obtener)){
                    $ambitos['idamb'][]=$fila['idamb'];
                    $ambitos['nombreamb'][]=$fila['nombreamb'];
                    $ambitos['Activo'][]=$fila['Activo'];
                }
            }
            mysqli_free_result($obtener);
        }
        $numero=0;
        $numeral=$ambitos['idamb'];
        $ultimo=count($numeral);
       while ($numero<$ultimo){
           if ($ambitos['Activo'][$numero]==FALSE){
           }else{echo ("<option value=".$ambitos['idamb'][$numero].">".$ambitos['nombreamb'][$numero]."</option>");}
           $numero++;
       }
    mysqli_close($enlace);
}
                        ?>
                        </select>

                        <label for="aulaincidencia">Aula</label>
                        <select id="aulaincidencia">
                        <option value="0">Seleccione Aula</option>
                        <?php
                        if (!$enlace) {
}else{
    $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT * FROM aulas");
    if ($obtener){
            if (mysqli_num_rows($obtener)>0){
                while ($fila = mysqli_fetch_array($obtener)){
                    $aulas['idau'][]=$fila['idau'];
                    $aulas['nombreau'][]=$fila['nombreau'];
                    $aulas['Activo'][]=$fila['Activo'];
                }
            }
            mysqli_free_result($obtener);
        }
        $numero=0;
        $numeral=$aulas['idau'];
        $ultimo=count($numeral);
       while ($numero<$ultimo){
           if ($aulas['Activo'][$numero]==FALSE){
           }else{echo ("<option value=".$aulas['idau'][$numero].">".$aulas['nombreau'][$numero]."</option>");}
           $numero++;

       }
    mysqli_close($enlace);
}
                        ?>
</select>
                        <label for="prioridadincidencia">Prioridad</label>
                        <select id="prioridadincidencia">
                        <option value="0">Seleccione Prioridad</option>
                        <?php
                        if (!$enlace) {
}else{
    $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT * FROM prioridades");
    if ($obtener){
            if (mysqli_num_rows($obtener)>0){
                while ($fila = mysqli_fetch_array($obtener)){
                    $prioridades['idpri'][]=$fila['idpri'];
                    $prioridades['nombrepri'][]=$fila['nombrepri'];
                    $prioridades['Activo'][]=$fila['Activo'];
                }
            }
            mysqli_free_result($obtener);
        }
        $numero=0;
        $numeral=$aulas['idau'];
        $ultimo=count($numeral);
       while ($numero<$ultimo){
           if ($prioridades['Activo'][$numero]==FALSE){
           }else{echo ("<option value=".$prioridades['idpri'][$numero].">".$prioridades['nombrepri'][$numero]."</option>");}
           $numero++;

       }
    mysqli_close($enlace);
}
                        ?>
                        </select>
                        <label for="categoriaincidencia">Categoria</label>
                        <select id="categoriaincidencia">
                        <option value="0">Seleccione Categoria</option>
                        <?php
                        if (!$enlace) {
}else{
    $enlace = mysqli_connect("$servidorSQL", "$usuarioSQL", "$contrasenyaSQL", "$baseDatos");
    $enlace->set_charset("utf8");
    $obtener = mysqli_query($enlace,"SELECT * FROM categorias");
    if ($obtener){
            if (mysqli_num_rows($obtener)>0){
                while ($fila = mysqli_fetch_array($obtener)){
                    $categorias['idcat'][]=$fila['idcat'];
                    $categorias['nombrecat'][]=$fila['nombrecat'];
                    $categorias['Activo'][]=$fila['Activo'];
                }
            }
            mysqli_free_result($obtener);
        }
        $numero=0;
        $numeral=$aulas['idau'];
        $ultimo=count($numeral);
       while ($numero<$ultimo){
           if ($categorias['Activo'][$numero]==FALSE){
           }else{echo ("<option value=".$categorias['idcat'][$numero].">".$categorias['nombrecat'][$numero]."</option>");}
           $numero++;

       }
    mysqli_close($enlace);
}
                        ?>
                        </select>
                        <label for="subategoriaincidencia">Subategoria</label>
                        <select id="subategoriaincidencia">
                        <option value="0">Seleccione antes categoria</option>
                        </select>
                        <label for="descripcionincidencia">Descripcion</label>
                        <textarea id="descripcionincidencia" cols="30" rows="10" placeholder="Introduce una descripcion de la incidencia"></textarea>
>>>>>>> .r78
                    </div>
                <div class="card-footer text-muted">
                <button type="button" id='grabarincidencia' class="btn btn-primary"><i class="fa fa-arrow-left"></i> Grabar</button>
                </div>
            </div>
        </div>
    </div>

<?php
require_once "../parcial/parte-inferior.php"
?>

<script>
    $('#categoriaincidencia').change(function () {
        $.ajax({
            url: 'http://grupo.cursoweb18.es/incidencias/subcat.php',
            type: 'POST',
            retrieve: true,
            dataType: "JSON",
            data: {
                'idcat': $('#categoriaincidencia').val(),
            },
            success: function (viene_de_php) {
                // $.alert(viene_de_php.msjrespuesta);
                $('#subategoriaincidencia').html(viene_de_php.resultado)
            },
            error: function () {
                $.alert('ERROR Se ha producido un error en la comunicacion.');
            }
        })
});
</script>
