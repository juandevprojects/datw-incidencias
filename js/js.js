$('#grabaraula').on('click', function () {
    var aulaactiva = 0;
    if ($('#idaulaactiva').is(':checked')){
        aulaactiva = 1;
    }

    var hayerror = true;
    if ($('#idnombreaula').val() == 0) {
        $.alert('Debes introducir el aula');
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
                        url: 'http://grupo.cursoweb18.es/aulas/procesa.php',
                        type: 'POST',
                        retrieve: true,
                        dataType: "JSON",
                        data: {
                            'aula': $('#idnombreaula').val(),
                            'activo': aulaactiva,
                        },
                        success: function (viene_de_php) {
                            // $.alert(viene_de_php.msjrespuesta);
                            window.location.href = 'http://grupo.cursoweb18.es/aulas';
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

$('#grabarambito').on('click', function () {
    var ambitoactiva = 0;
    if ($('#idambitoactivo').is(':checked')){
        ambitoactiva = 1;
    }

    var hayerror = true;
    if ($('#idnombreambito').val() == 0) {
        $.alert('Debes introducir el ambito');
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
                        url: 'http://grupo.cursoweb18.es/ambitos/procesa.php',
                        type: 'POST',
                        retrieve: true,
                        dataType: "JSON",
                        data: {
                            'ambito': $('#idnombreambito').val(),
                            'activo': ambitoactiva,
                        },
                        success: function (viene_de_php) {
                            // $.alert(viene_de_php.msjrespuesta);
                            window.location.href = 'http://grupo.cursoweb18.es/ambitos';
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

$('#grabarprioridad').on('click', function () {
    var prioridadactiva = 0;
    if ($('#idprioridadactiva').is(':checked')){
        prioridadactiva = 1;
    }

    var hayerror = true;
    if ($('#idnombreprioridad').val() == 0) {
        $.alert('Debes introducir la prioridad');
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
                        url: 'http://grupo.cursoweb18.es/prioridades/procesa.php',
                        type: 'POST',
                        retrieve: true,
                        dataType: "JSON",
                        data: {
                            'prioridad': $('#idnombreprioridad').val(),
                            'activo': prioridadactiva,
                        },
                        success: function (viene_de_php) {
                            // $.alert(viene_de_php.msjrespuesta);
                            window.location.href = 'http://grupo.cursoweb18.es/prioridades';
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

$('#borraraula').on('click', function () {
    texto = "<h4>¿Esta seguro de eliminar el registro?</h4>";
    $.confirm({
        title: 'Confirmación!',
        content: texto,
        buttons: {
            aceptar: function () {
                $.ajax({
                    url: 'http://grupo.cursoweb18.es/aulas/procesa.php',
                    type: 'POST',
                    retrieve: true,
                    dataType: "JSON",
                    data: {
                        'id': item,
                        'borrar':'1',
                    },
                    success: function (viene_de_php) {
                        // $.alert(viene_de_php.msjrespuesta);
                        window.location.href = 'http://grupo.cursoweb18.es/aulas';
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

$('#modificaaula').on('click', function () {
    var aulaactiva = 0;
    if ($('#idaulaactiva').is(':checked')){
        aulaactiva = 1;
    }

    var hayerror = true;
    if ($('#idnombreaula').val() == 0) {
        $.alert('Debes introducir el aula');
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
                        url: 'http://grupo.cursoweb18.es/aulas/procesa.php',
                        type: 'POST',
                        retrieve: true,
                        dataType: "JSON",
                        data: {
                            'id': item,
                            'modificar':'1',
                            'aula': $('#idnombreaula').val(),
                            'activo': aulaactiva,
                        },
                        success: function (viene_de_php) {
                            // $.alert(viene_de_php.msjrespuesta);
                            window.location.href = 'http://grupo.cursoweb18.es/aulas';
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

$('#borrarprioridad').on('click', function () {
    texto = "<h4>¿Esta seguro de eliminar el registro?</h4>";
    $.confirm({
        title: 'Confirmación!',
        content: texto,
        buttons: {
            aceptar: function () {
                $.ajax({
                    url: 'http://grupo.cursoweb18.es/prioridades/procesa.php',
                    type: 'POST',
                    retrieve: true,
                    dataType: "JSON",
                    data: {
                        'id': item,
                        'borrar':'1',
                    },
                    success: function (viene_de_php) {
                        // $.alert(viene_de_php.msjrespuesta);
                        window.location.href = 'http://grupo.cursoweb18.es/prioridades';
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

$('#modificaprioridad').on('click', function () {
    var prioridadactiva = 0;
    if ($('#idprioridadactiva').is(':checked')){
        prioridadactiva = 1;
    }

    var hayerror = true;
    if ($('#idnombreprioridad').val() == 0) {
        $.alert('Debes introducir la Prioridad');
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
                        url: 'http://grupo.cursoweb18.es/prioridades/procesa.php',
                        type: 'POST',
                        retrieve: true,
                        dataType: "JSON",
                        data: {
                            'id': item,
                            'modificar':'1',
                            'prioridad': $('#idnombreprioridad').val(),
                            'activo': prioridadactiva,
                        },
                        success: function (viene_de_php) {
                            // $.alert(viene_de_php.msjrespuesta);
                            window.location.href = 'http://grupo.cursoweb18.es/prioridades';
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

$('#borrarambito').on('click', function () {
    texto = "<h4>¿Esta seguro de eliminar el registro?</h4>";
    $.confirm({
        title: 'Confirmación!',
        content: texto,
        buttons: {
            aceptar: function () {
                $.ajax({
                    url: 'http://grupo.cursoweb18.es/ambitos/procesa.php',
                    type: 'POST',
                    retrieve: true,
                    dataType: "JSON",
                    data: {
                        'id': item,
                        'borrar':'1',
                    },
                    success: function (viene_de_php) {
                        // $.alert(viene_de_php.msjrespuesta);
                        window.location.href = 'http://grupo.cursoweb18.es/ambitos';
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

$('#modificaambito').on('click', function () {
    var ambitoactiva = 0;
    if ($('#idambitoactiva').is(':checked')){
        ambitoactiva = 1;
    }

    var hayerror = true;
    if ($('#idnombreambito').val() == 0) {
        $.alert('Debes introducir el ambito');
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
                        url: 'http://grupo.cursoweb18.es/ambitos/procesa.php',
                        type: 'POST',
                        retrieve: true,
                        dataType: "JSON",
                        data: {
                            'id': item,
                            'modificar':'1',
                            'ambito': $('#idnombreambito').val(),
                            'activo': ambitoactiva,
                        },
                        success: function (viene_de_php) {
                            // $.alert(viene_de_php.msjrespuesta);
                            window.location.href = 'http://grupo.cursoweb18.es/ambitos';
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

$("#borrarcat").on("click", function () {
    texto = "<h4>¿Esta seguro de eliminar el registro?</h4>";
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
                        'id': item,
                        'borrar': '1',
                    },
                    success: function (viene_de_php) {
                        if (viene_de_php.resultado=='mal'){
                            $.alert(viene_de_php.msjrespuesta);
                        }else{
                            window.location.href = 'http://grupo.cursoweb18.es/categorias';
                        }
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


$('#modificacat').on('click', function () {
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
        texto = "<h4>¿Esta seguro de modificar el registro?</h4>";
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
                            'id': item,
                            'modificar': '1',
                            'cat': $('#idnombrecat').val(),
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