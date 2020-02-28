$(document).ready(function(){
$("#v_ingreso").click(function(){
		var usuario=$('#user').val();
		var clave=$('#pass').val();
		//console.log(usuario,contrasena);
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'php/ingreso.php',
			data:{usuario:user, clave:pass},
			success:function(response){
				if (response.respuesta==true) {
				//	$('#mensaje').html(response.mensaje);
					window.location='index.php';

				}else{
					//$('#mensaje').html(response.mensaje);
				}
			},error:function(){
				alert('Error general en el sistema por diosoos');
			}
		});
	});
});