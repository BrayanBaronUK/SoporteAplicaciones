<?php
include_once ("conexion.php");
$conex2 = oci_connect($user, $pass, $db);

   $v_names="'".$_GET["names"]."'";
   $v_lastname="'".$_GET["lastname"]."'";
   $v_phone=$_GET["phone"];
   $v_email="'".$_GET["email"]."'";
   $v_phone_dotacion=$_GET["phone_dotacion"];
   $v_ip="'".$_GET["ip"]."'";
   $v_fecha_cre = getdate();

    //$sql ="INSERT INTO reservado(id_usuario, nom_libro,num_dias,fecha_reserva) VALUES($v_cedula, $v_nom_libro,$v_num_dias,CURRENT_DATE)";
    $sql ="INSERT INTO USUARIOS_SOPORTE VALUES (SUBSTR($vnames,1,1)||SUBSTR($v_lastname,1,7),$v_names,$v_lastname,$v_phone,$v_email,$v_phone_dotacion,$v_ip,SYSDATE)";
    $queryf= oci_parse($conex2, $sql);
    oci_execute($queryf);
    oci_commit($conex2);

    //$sql = "select id_usuario, nom_libro,num_dias from reservado  where id_usuario = $v_cedula and num_dias= $v_num_dias and nom_libro = $v_nom_libro";
    $sql = "SELECT NOMBRES, APELLIDOS, CORREO_ELECTRONICO,FECHA_CREACION FROM USUARIOS_SOPORTE WHERE NOMBRES= $v_names AND APELLIDOS= $v_lastname AND CORREO_ELECTRONICO = $v_email AND FECHA_CREACION = $v_fecha_cre";
    $queryf= oci_parse($conex2, $sql);
    oci_execute($queryf);
    oci_commit($conex2);

    while ( $row = oci_fetch_array ($queryf)) {
    echo "Se ha creado el especialista ".$row["NOMBRES"]."  ".$row["APELLIDOS"]." de correo: ".$row["CORREO_ELECTRONICO"]." con fecha: ".$row["FECHA_CREACION"];
    }
echo"<BR>";
?>