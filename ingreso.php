<?php
include ("conexion.php");
	
$conex2 = oci_connect($user, $pass, $db);


if (!$conex2) {
$m = oci_error();
trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$var1 = $_POST["user"];
$var2 = $_POST["pass"];
  
$query   = oci_parse($conex2, 'select * from USUARIOS_SOPORTE_SEG where USUARIO= :dato1 and CLAVE= :dato2') or die('Cannot parse query oci');
OCIBindByName($query, ":dato1", $var1);
OCIBindByName($query, ":dato2", $var2);
OCIExecute($query, OCI_DEFAULT);
session_start();

OCICommit($conex2);
OCILogoff($conex2);
?>