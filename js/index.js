

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
    success: function(data){
        globalUserTurn = data.data[0];

        var userName = globalUserTurn.NOMBRES + " " + globalUserTurn.APELLIDOS;
        $("#userTurn").html(userName);
    },
    failure: function(errMsg) {
        alert(errMsg);
    }
});
