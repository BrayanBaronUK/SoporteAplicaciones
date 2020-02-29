$(document).ready(function(){
$("#v_ingreso").click(function(){
		var usuario=$('#user').val();
		var clave=$('#pass').val();
		console.log(usuario,clave);
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'ingreso.php',
			data:{usuario:usuario, clave:clave},
			success:function(response){
				if (response.respuesta==true) {
					console.log("buenas 1");
				$('#mensaje').html(response.mensaje);
					window.location='index.php';

				}else{
					console.log("buenas 2");
				$('#mensaje').html(response.mensaje);
				}
			},error:function(){
				alert('Error general en el sistema por dios');
			}
		});
	});
});