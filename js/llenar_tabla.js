var engineer = new Array()
engineer[0] = "OSCAR RIOS"
engineer[1] = "GUSTAVO ADOLFO"
engineer[2] = "WILSON CASTRO"
engineer[3] = "MAICOL BALLESTEROS"
engineer[4] = "DANIEL MENDEZ"
engineer[5] = "GUSTAVO SALAZAR"

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
    return new Date(year, month+1, 0).getDate();
};

var getDayName = function(year, month, day) {
    var d = new Date(year, month, day);
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

    // Construcción del cuerpo de la tabla
    for (h = 0; h < engineer.length; h++) {
        HTML += `<tr><td>` + engineer[h] + `</td>`;
        for(i = 1; i <= globalDaysOfMonth; i++) {
            HTML += `<td>
                        <select data-day-name="` + getDayName(year, month, i) + `" id="turn-` + year + `-` + month + `-` + i + `-` + h +`">
                            <option value="T">T</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="JL">JL</option>
                            <option value="JL2">JL2</option>
                            <option value="D">D</option>
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
            dataMonth.push({"engineerId":engineerId, "engineerName":engineer[engineerId], "days":days, "turns":turns});
            days = [];
            turns = [];
        }
    });

    localStorage.setItem(globalYear+"-"+globalMonth, JSON.stringify(dataMonth));

    confirm("Datos guardados exitosamente!");
    location.reload();
}

// START - Detect change of selects
$( "#selectYear,#selectMonth" ).change(function() {
    validateSelects();
});
// END - Detect change of selects

