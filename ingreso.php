<?php
<<<<<<< HEAD

$conex2 = oci_connect("STCCCDAT", "STCCCDAT", "//192.168.232.68:1521/DESSTC4G");
=======
//phpinfo();
$oradbCon = "STC4GDESARROLLO=
  (DESCRIPTION=
    (ADDRESS=
      (PROTOCOL=TCP)
      (HOST=192.168.232.68)
      (PORT=1521)
    )
    (CONNECT_DATA=
      (SERVER=dedicated)
      (SERVICE_NAME=DESSTC4G)
    )
  )";
$conex2 = oci_connect("STCCCDAT", "STCCCDAT", $oradbCon);
>>>>>>> e100fb102959b390f46a56b7f27a502466df9977


if (!$conex2) {
$m = oci_error();
trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$var1 = $_POST["user"];
$var2 = $_POST["pass"];
  
<<<<<<< HEAD
$query   = oci_parse($conex2, 'insert into usuarios_p values (:dato1, :dato2)') or die('Cannot parse query oci');
OCIBindByName($query, ":dato1", $var1);
OCIBindByName($query, ":dato2", $var2);
OCIExecute($query, OCI_DEFAULT);

OCICommit($conex2);
OCILogoff($conex2);
=======
$stmt   = oci_parse($conex2, 'insert into usuarios_p values (:dato1, :dato2)') or die('Cannot parse query oci');
OCIBindByName($query, ":dato1", $var1);
OCIBindByName($query, ":dato2", $var2); 



try{ 
$result = oci_execute($stmt);
$fila = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS);
// echo "<pre>";
// print_r($fila);
// echo "</pre>";

$parametros['ESTADO'] = $fila['ESTADO']; //PENDIENTE SERVICIO JOSE Y AICARDY  ->venta rapida2
}
catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
>>>>>>> e100fb102959b390f46a56b7f27a502466df9977
?>