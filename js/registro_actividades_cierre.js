$('#selectCierre').change(function () {
    if ($(this).val() != '') {
        if ($(this).val() != 1) {
            $('#divDataTable').hide();
            $('#divDataTableFin').show();
        }
        else {
            $('#divDataTableFin').hide();
            $('#divDataTable').show();
        }
    }
    else {
        $('#divDataTable').hide();
        $('#divDataTableFin').hide();
    }
});

// Handler - Selector SI/NO
$(".checkAct").change(function () {
    if ($(this).prop("checked") == true) {
        let idCier = $('#selectCierre').val();
        let idAct = $(this).attr('data-id');
        let obser = $('#obser-' + idAct).val();

        $(this).attr('disabled', '');
        $('#obser-' + idAct).attr('disabled', '');
        $('#selectCierre').attr('disabled', '');

        // Envio de información AJAX
        let jsondata = {
            cierr: idCier,
            idAct: idAct,
            obser: obser
        };
        $.post("RegistroActividadesCierrePost.php", jsondata, function (data) {
            console.log("success: ", data);
        })
            .done(function () {
                alert("Actividad guardada exitosamente");
            })
            .fail(function (err) {
                alert("Error al guardar la actividad");
                console.log("Error al guardar la actividad", err);
            })
            .always(function () {
                console.log("finished");
            });
    }
});

// Handler - Selector SI/NO Fin semana
$(".checkActf").change(function () {
    if ($(this).prop("checked") == true) {
        let idCierf = $('#selectCierre').val();
        let idActf = $(this).attr('data-idf');
        let obserf = $('#obserf-' + idActf).val();

        $(this).attr('disabled', '');
        $('#obserf-' + idActf).attr('disabled', '');
        $('#selectCierre').attr('disabled', '');

        // Envio de información AJAX
        let jsondata = {
            cierr: idCierf,
            idAct: idActf,
            obser: obserf
        };
        $.post("RegistroActividadesCierrePost.php", jsondata, function (data) {
            console.log("success: ", data);
        })
            .done(function () {
                alert("Actividad guardada exitosamente");
            })
            .fail(function (err) {
                alert("Error al guardar la actividad");
                console.log("Error al guardar la actividad", err);
            })
            .always(function () {
                console.log("finished");
            });
    }
});


// Handler - Boton terminar
$('#btnSave').on('click', function () {
    var r = confirm("Estas seguro de terminar las actividades");
    if (r == true) {
        location.reload();
    } else {
        console.log('cancel');
    }
});

// Handler - Boton terminar formulario fin semana
$('#btnSavef').on('click', function () {
    var r = confirm("Estas seguro de terminar las actividades");
    if (r == true) {
        location.reload();
    } else {
        console.log('cancel');
    }
});

// Handler - DOM Ready
$(document).ready(function () {
    $('#divDataTable').hide();
    $('#divDataTableFin').hide();
});