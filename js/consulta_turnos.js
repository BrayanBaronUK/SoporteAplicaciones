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

// START - Set de años al selector // FIXME - Hacer este proceso dinámicamente
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
    var dataTurns = localStorage.getItem(globalYear+"-"+globalMonth);
    var myTableDiv = document.getElementById("metric_results");
    var HTML = `<p>No existen datos para el periodo seleccionado`;
    
    if( dataTurns !=null ) {
        var dataTurnsJson = JSON.parse(dataTurns);

        globalDaysOfMonth = getDaysInMonth(month, year);
        
        var table = document.createElement('TABLE');
        var tableBody = document.createElement('TBODY');

        // Construcción de cabecera de la tabla
        var HTML = `<table id="tablita" border=1><tr><th align="center" style="color: #C019A6;">Especialista</th>`;
        for(i = 1; i <= globalDaysOfMonth; i++) {
            HTML += `<th width="75">` + i + `</br>` + getDayName(year, month, i) + `</th>`;
        }
        HTML += `</tr>`;

        // Construcción del cuerpo de la tabla
        for(var h = 0; h < dataTurnsJson.length; h++) {
            HTML += `<tr><td>` + dataTurnsJson[h].engineerName + `</td>`;
            var turnsJson = dataTurnsJson[h].turns;
            for(i = 0; i < turnsJson.length; i++) {
                HTML += `<td>` + turnsJson[i] + `</td>`;
            }
        }
    }

    myTableDiv.innerHTML = HTML;
}

// START - Detect change of selects
$( "#selectYear,#selectMonth" ).change(function() {
    validateSelects();
});
// END - Detect change of selects

