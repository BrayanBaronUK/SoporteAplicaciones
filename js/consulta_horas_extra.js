var globalYear;
var globalMonth;


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


// Function that detect selects is OK
function validateSelects() {
    $("#metric_results").empty();

    if( $('#selectYear').val()!='' && $('#selectMonth').val()!='' ) {
        globalYear = parseInt($('#selectYear').val());
        globalMonth = parseInt($('#selectMonth').val());
        getData(globalYear, globalMonth);
    }
}

function getData(year, month) {

    var HTML = ``;
    var tableResult = document.getElementById("metric_results");
    tableResult.innerHTML = HTML;

    // Consulta de historial de turnos
    var turnsHistory = new Array();
    $.ajax({
        type: "POST",
        url: "./api/v1/turnHistory.php",
        data: JSON.stringify({ 
            action: "findByYearAndMonth",
            year: year,
            month: month
        }),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(data){
            turnsHistory = data.data;

            // Construcción del cuerpo de la tabla
            for (h = 0; h < turnsHistory.length; h++) {
                HTML += `<tr>`;
                HTML += `<td>` + turnsHistory[h].NOMBRES +' '+ turnsHistory[h].APELLIDOS + `</td>`;
                HTML += `<td>`+turnsHistory[h].HORAS_EXTRA+`</td>`;
                HTML += `<td>`+turnsHistory[h].PAGO_EXTRA+`</td>`;
                HTML += `</tr>`;
            }
            tableResult.innerHTML = HTML;
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