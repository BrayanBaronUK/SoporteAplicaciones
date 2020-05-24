$('#selectGrupo').change(function () {
    if ($(this).val() != '') {
        if ($(this).val() == 1) {
            $('#divDataSoporteweb').hide();
            $('#divDataSoporteGes').hide();
            $('#divDataSoportefin').hide();
            $('#divDataSoportenivel').hide();
            $('#divDataSoportepre').hide();
            $('#divDataSoportedwh').hide();
            $('#divDataSoportedba').hide();
            $('#divDataSoporteti').show();

        } else if ($(this).val() == 2) {
            $('#divDataSoporteti').hide();
            $('#divDataSoporteGes').hide();
            $('#divDataSoportenivel').hide();
            $('#divDataSoportepre').hide();
            $('#divDataSoportedwh').hide();
            $('#divDataSoportedba').hide();
            $('#divDataSoportefin').hide();
            $('#divDataSoporteweb').show();

        } else if ($(this).val() == 3) {
            $('#divDataSoporteti').hide();
            $('#divDataSoporteweb').hide();
            $('#divDataSoportefin').hide();
            $('#divDataSoportenivel').hide();
            $('#divDataSoportepre').hide();
            $('#divDataSoportedwh').hide();
            $('#divDataSoportedba').hide();
            $('#divDataSoporteGes').show();

        } else if ($(this).val() == 4) {
            $('#divDataSoporteti').hide();
            $('#divDataSoporteweb').hide();
            $('#divDataSoporteGes').hide();
            $('#divDataSoportenivel').hide();
            $('#divDataSoportepre').hide();
            $('#divDataSoportedwh').hide();
            $('#divDataSoportedba').hide();
            $('#divDataSoportefin').show();
        } else if ($(this).val() == 5) {
            $('#divDataSoporteti').hide();
            $('#divDataSoporteweb').hide();
            $('#divDataSoporteGes').hide();
            $('#divDataSoportefin').hide();
            $('#divDataSoportepre').hide();
            $('#divDataSoportedwh').hide();
            $('#divDataSoportedba').hide();
            $('#divDataSoportenivel').show();
        } else if ($(this).val() == 6) {
            $('#divDataSoporteti').hide();
            $('#divDataSoporteweb').hide();
            $('#divDataSoporteGes').hide();
            $('#divDataSoportefin').hide();
            $('#divDataSoportenivel').hide();
            $('#divDataSoportedwh').hide();
            $('#divDataSoportedba').hide();
            $('#divDataSoportepre').show();
        } else if ($(this).val() == 7) {
            $('#divDataSoporteti').hide();
            $('#divDataSoporteweb').hide();
            $('#divDataSoporteGes').hide();
            $('#divDataSoportefin').hide();
            $('#divDataSoportenivel').hide();
            $('#divDataSoportepre').hide();
            $('#divDataSoportedba').hide();
            $('#divDataSoportedwh').show();
        }
        else {
            $('#divDataSoporteti').hide();
            $('#divDataSoporteweb').hide();
            $('#divDataSoporteGes').hide();
            $('#divDataSoportefin').hide();
            $('#divDataSoportenivel').hide();
            $('#divDataSoportepre').hide();
            $('#divDataSoportedwh').hide();
            $('#divDataSoportedba').show();
        }
    }
    else {
        $('#divDataSoporteti').hide();
        $('#divDataSoporteweb').hide();
        $('#divDataSoporteGes').hide();
        $('#divDataSoportefin').hide();
        $('#divDataSoportenivel').hide();
        $('#divDataSoportepre').hide();
        $('#divDataSoportedwh').hide();
        $('#divDataSoportedba').hide();
    }
});


// Handler - DOM Ready
$(document).ready(function () {
    $('#divDataSoporteti').hide();
    $('#divDataSoporteweb').hide();
    $('#divDataSoporteGes').hide();
    $('#divDataSoportefin').hide();
    $('#divDataSoportenivel').hide();
    $('#divDataSoportepre').hide();
    $('#divDataSoportedwh').hide();
    $('#divDataSoportedba').hide();
});