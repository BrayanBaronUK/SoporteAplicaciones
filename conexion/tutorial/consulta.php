<?php
	include ("conexion.php");
	
	$conn = OCILogon($user, $pass, $db);	
	if (!$conn){
		echo "Conexion es invalida" . var_dump ( OCIError() );
		die();
	}
	$query = OCIParse($conn, "select * from TUTORIAL");
	OCIExecute($query, OCI_DEFAULT);
	while (OCIFetch($query)){
		echo "USUARIO ---->".ociresult($query, "USUARIO").
		"<br>CONTRASE�A ->".ociresult($query, "CONTRASE�A").
		"<br><br>";
		echo "borrar";
	}
	
	OCICommit($conn);
	OCILogoff($conn);
?>

<html>
	<head>
		<title>
			TUTORIAL
		</title>
	</head>
	<body>
		<form action="borrado.php" method="POST">
			<input type="text" name="user" size="40" value="ingrese el usuario"><br>
			<input type="submit" value="Borrar Usuario">
		</form>
		<br><br><br>		
		
	</body>
</html>