// Consulta de ingenieros
var engineer = new Array();
$.ajax({
    type: "POST",
    url: "./api/v1/user.php",
    data: JSON.stringify({ 
        action: "findAll" 
    }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function(data){
        engineer = data.data;
    },
    failure: function(errMsg) {
        alert(errMsg);
    }
});

// Consulta de turnos
var turns = new Array();
$.ajax({
    type: "POST",
    url: "./api/v1/turn.php",
    data: JSON.stringify({ 
        action: "findAll" 
    }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function(data){
        turns = data.data;
    },
    failure: function(errMsg) {
        alert(errMsg);
    }
});

var weekday = new Array(7);
    weekday[0] = "Dom";
    weekday[1] = "Lun";
    weekday[2] = "Mar";
    weekday[3] = "Mie";
    weekday[4] = "Jue";
    weekday[5] = "Vie";
    weekday[6] = "Sab";

var globalYear;
var globalMonth;
var globalDaysOfMonth;

// START - Set de años al selector
var years = {
    "2018": "2018",
    "2019": "2019",
    "2020": "2020"
};

$.each(years, function(key,value) {
    $('#selectYear').append($("<option></option>").attr("value", value).text(key));
});
// END - Set de años

var getDaysInMonth = function(month,year) {
    return new Date(year, month, 0).getDate();
};

var getDayName = function(year, month, day) {
    var d = new Date(year, month-1, day);
    return weekday[d.getDay()];
}

// Function that detect selects is OK
function validateSelects() {
    $("#metric_results").empty();

    if( $('#selectYear').val()!='' && $('#selectMonth').val()!='' ) {
        globalYear = parseInt($('#selectYear').val());
        globalMonth = parseInt($('#selectMonth').val());
        genera_tabla(globalYear, globalMonth);
    }
}

function genera_tabla(year, month) {
    globalDaysOfMonth = getDaysInMonth(month, year);

    var myTableDiv = document.getElementById("metric_results");
    var table = document.createElement('TABLE');
    var tableBody = document.createElement('TBODY');

    // Construcción de cabecera de la tabla
    var HTML = `<table id="tablita" border=1><tr><th align="center"  style="color: #C019A6;">Especialista</th>`;
    for(i = 1; i <= globalDaysOfMonth; i++) {
        HTML += `<th width="75">` + i + `</br>` + getDayName(year, month, i) + `</th>`;
    }
    HTML += `</tr>`;

    // Construccion del string de options de turnos
    var turnsStr = '';
    for (i = 0; i < turns.length; i++) {
        turnsStr += `<option value="`+turns[i].ID+`">`+turns[i].CODIGO+`</option>`;
    }

    // Construcción del cuerpo de la tabla
    for (h = 0; h < engineer.length; h++) {
        HTML += `<tr><td>` + engineer[h].NOMBRES +' '+ engineer[h].APELLIDOS + `</td>`;
        for(i = 1; i <= globalDaysOfMonth; i++) {
            HTML += `<td>
                        <select data-day-name="` + getDayName(year, month, i) + `" id="turn-` + year + `-` + month + `-` + i + `-` + engineer[h].CEDULA +`">
                            `+turnsStr+`
                        </select>
                    </td>`;
        }
        HTML += `</tr>`;
    }
    HTML += `</table>`;

    HTML += `</br>
        <div>
            <input type="submit" value="Guardar" style="float:right;" onclick="guardar_turnos();" class="guard_comp">
        </div>`;

    myTableDiv.innerHTML = HTML;

    // Detect change turn select
    $("select[id^='turn-']").change(function() { // Buscar los select de turnos
        var day = parseInt($(this).attr('id').split('-')[3]);
        var dayName = $(this).attr('data-day-name');
        var engineerId = $(this).attr('id').split('-')[4];
        var valueSelect = $(this).children("option:selected").val();

        if( dayName === weekday[1] ) {
            for(i=day; i<=(day+6); i++) {
                try {
                    $("#turn-"+globalYear+"-"+globalMonth+"-"+i+"-"+engineerId).val(valueSelect);
                } catch (ex) {
                    console.log("ERROR", ex);
                }
            }
        }
    });
}

// Función que permite guardar los datos en local storage del navegador
function guardar_turnos(){
    var dataMonth = [];
    var days = [];
    var turns = [];

    $("select[id^='turn-'] option:selected").each(function (i, el) {
        var idSelect = $(this).parent().attr('id');
        var optVal = $(this).val();
        var engineerId = idSelect.split('-')[4];

        days.push(idSelect.split('-')[3]);
        turns.push(optVal);

        if( globalDaysOfMonth == idSelect.split('-')[3] ) {
            dataMonth.push({
                "engineerId":engineerId,
                "year":globalYear,
                "month":globalMonth,
                "days":days, 
                "turns":turns});
            days = [];
            turns = [];
        }
    });

    // Enviar info para guardar turnos
    $.ajax({
        type: "POST",
        url: "./api/v1/turnHistory.php",
        data: JSON.stringify({ 
            action: "saveTurns",
            data: dataMonth
        }),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(data){
            console.log('DEB', data);
            alert("Datos guardados exitosamente!");
            location.reload();
        },
        failure: function(errMsg) {
            alert(errMsg);
        }
    });
}

// START - Detect change of selects
$( "#selectYear,#selectMonth" ).change(function() {
    validateSelects();
});
// END - Detect change of selects

