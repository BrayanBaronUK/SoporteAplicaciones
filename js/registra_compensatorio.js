jQuery(document).ready(function() {
  jQuery('#enviar').on('click', function() {
    var filas = [];
    $('#tabla tbody tr').each(function() {
      var v_especialista = $(this).find('td').eq(0).text();
      var v_dia = $(this).find('td').eq(1).text();

      var fila = {
        v_especialista,
        v_dia
      };
      filas.push(fila);
    });
    console.log(filas);
  });
});
$.ajax({
  type: "POST",
  url: "/confirma_creacion_compensatorio.php",
  data: {valores : JSON.stringify(filas) },
  success: function(data) { 
     console.log(data);
  }
});

/*
$('#tabla tr').each(function () {
    var v_especialista= $(this).find('td').eq(0).html();
    var v_dia = $(this).find('td').eq(1).html();

    $.ajax({
     async: false,
     type: "POST",
     url: "/confirma_creacion_compensatorio.php",
        data: "especialista="+v_especialista+"&dia="+v_dia,
     data: {valores:valores},
     success: function(data) { if(data!="");}
    });
   });*/