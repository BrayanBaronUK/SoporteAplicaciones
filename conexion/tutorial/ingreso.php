<?php
	include ("conexion.php");
	
	$conn = OCILogon($user, $pass, $db);
	
	if (!$conn){
		echo "Conexion es invalida" . var_dump ( OCIError() );
		die();
	}
	
	$var1 = $_POST["user"];
	$var2 = $_POST["pass"];
	
	$query = OCIParse($conn, "insert into usuarios_p values (:dato1, :dato2)");
	OCIBindByName($query, ":dato1", $var1);
	OCIBindByName($query, ":dato2", $var2);
	OCIExecute($query, OCI_DEFAULT);
	
	OCICommit($conn);
	OCILogoff($conn);
?>