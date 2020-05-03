$('#selectCierre').change(function () {
    if ($(this).val() != '') {
        if ($(this).val() == 1) {
            $('#divDataTableJ').hide();
            $('#divDataTableFin').hide();
            $('#divDataTable').show();   
                   
        }else if($(this).val() == 6){
            $('#divDataTableFin').hide();
            $('#divDataTable').hide();
            $('#divDataTableJ').show();
        
        }
        else {
            $('#divDataTable').hide();
            $('#divDataTable').hide();
            $('#divDataTableFin').show();  
        }
    }
    else {
        $('#divDataTable').hide();
        $('#divDataTableFin').hide();
        $('#divDataTableJ').hide();
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

// Handler - Selector SI/NO cierres cortos
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

// Handler - Selector SI/NO cierres ciclo J
$(".checkActj").change(function () {
    if ($(this).prop("checked") == true) {
        let idCierj = $('#selectCierre').val();
        let idActj = $(this).attr('data-idj');
        let obserj = $('#obserj-' + idActj).val();

        $(this).attr('disabled', '');
        $('#obserj-' + idActj).attr('disabled', '');
        $('#selectCierre').attr('disabled', '');

        // Envio de información AJAX
        let jsondata = {
            cierr: idCierj,
            idAct: idActj,
            obser: obserj
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

// Handler - Boton terminar formulario cierres cortos
$('#btnSavef').on('click', function () {
    var r = confirm("Estas seguro de terminar las actividades");
    if (r == true) {
        location.reload();
    } else {
        console.log('cancel');
    }
});
// Handler - Boton terminar formulario cierres ciclo J
$('#btnSavej').on('click', function () {
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
    $('#divDataTableJ').hide();
});