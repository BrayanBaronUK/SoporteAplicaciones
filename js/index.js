// Consulta de ingeniero de turno actual
var globalUserTurn;
$.ajax({
    type: "POST",
    url: "./api/v1/user.php",
    data: JSON.stringify({
        action: "findByNowTurn"
    }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function (data) {
        globalUserTurn = data.data[0];

        var userName = globalUserTurn.NOMBRES + " " + globalUserTurn.APELLIDOS;
        $("#userTurn").html(userName);
    },
    failure: function (errMsg) {
        alert(errMsg);
    }
});


//Consulta compensatorio actual
var globalUserComp;
$.ajax({
    type: "POST",
    url: "./api/v1/user.php",
    data: JSON.stringify({
        action: "findByNowComp"
    }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function (data) {
        globalUserComp = data.data[0];

        var userName = globalUserComp.NOMBRES + " " + globalUserComp.APELLIDOS;
        $("#userComp").html(userName);
    },
    failure: function (errMsg) {
        alert(errMsg);
    }
});

//Consulta usuario vacaciones actual
var globalUserVaca;
$.ajax({
    type: "POST",
    url: "./api/v1/user.php",
    data: JSON.stringify({
        action: "findByNowVaca"
    }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function (data) {
        globalUserVaca = data.data[0];

        var userName = globalUserVaca.NOMBRES + " " + globalUserVaca.APELLIDOS;
        $("#userVaca").html(userName);
    },
    failure: function (errMsg) {
        alert(errMsg);
    }
});

//Consulta usuario cierre actual
var globalUserCierre;
$.ajax({
    type: "POST",
    url: "./api/v1/user.php",
    data: JSON.stringify({
        action: "findByNowCierre"
    }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function (data) {
        globalUserCierre = data.data[0];

        var userName = globalUserCierre.NOMBRES + " " + globalUserCierre.APELLIDOS;
        $("#userCierre").html(userName);
    },
    failure: function (errMsg) {
        alert(errMsg);
    }
});

//Consulta usuario unidad soporte actual
var globalUserUnidad;
$.ajax({
    type: "POST",
    url: "./api/v1/user.php",
    data: JSON.stringify({
        action: "findByNowUnidad"
    }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function (data) {
        globalUserUnidad = data.data[0];

        var userName = globalUserUnidad.NOMBRES + " " + globalUserUnidad.APELLIDOS;
        $("#userUnidad").html(userName);
    },
    failure: function (errMsg) {
        alert(errMsg);
    }
});