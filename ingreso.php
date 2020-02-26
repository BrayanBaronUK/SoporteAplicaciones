<?php

$conex2 = oci_connect("STCCCDAT", "STCCCDAT", "//192.168.232.68:1521/DESSTC4G");


if (!$conex2) {
$m = oci_error();
trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$var1 = $_POST["user"];
$var2 = $_POST["pass"];
  
$query   = oci_parse($conex2, 'insert into usuarios_p values (:dato1, :dato2)') or die('Cannot parse query oci');
OCIBindByName($query, ":dato1", $var1);
OCIBindByName($query, ":dato2", $var2);
OCIExecute($query, OCI_DEFAULT);

OCICommit($conex2);
OCILogoff($conex2);
?>