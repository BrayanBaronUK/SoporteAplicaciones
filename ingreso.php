<?php
//phpinfo(); 
$conex2 = oci_connect("TIENDA_VIRTUAL", "VIRTUAL", "//192.168.232.69/ISIS");


if (!$conex2) {
$m = oci_error();
trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$var1 = $_POST["user"];
$var2 = $_POST["pass"];
  
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
?>