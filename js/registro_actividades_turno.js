// Handler - Selector de Turnos
$('#selectTurno').change(function() {
    if( $(this).val() != '' ) {
        $('#divDataTable').show();
    } else {
        $('#divDataTable').hide();
    }
});

// Handler - Selector SI/NO
$(".checkAct").change(function(){
    if($(this).prop("checked") == true){
        let idTurn = $('#selectTurno').val();
        let idAct = $(this).attr('data-id');
        let obser = $('#obser-'+idAct).val();
        
        $(this).attr('disabled', '');
        $('#obser-'+idAct).attr('disabled', '');
        $('#selectTurno').attr('disabled', '');
        
        // Envio de información AJAX
        let jsondata = { 
            turn: idTurn, 
            idAct: idAct,
            obser: obser
        };
        $.post( "RegistroActividadesTurnoPost.php", jsondata, function(data) {
            console.log("success: ", data );
        })
        .done(function() {
            alert( "Actividad guardada exitosamente" );
        })
        .fail(function(err) {
            alert( "Error al guardar la actividad" );
            console.log( "Error al guardar la actividad", err );
        })
        .always(function() {
            console.log( "finished" );
        });
    }
});

// Handler - Boton terminar
$('#btnSave').on('click', function() {
    var r = confirm("Estas seguro de terminar las actividades");
    if (r == true) {
        location.reload();
    } else {
        console.log('cancel');
    }
});

// Handler - DOM Ready
$( document ).ready(function() {
    $('#divDataTable').hide();
});