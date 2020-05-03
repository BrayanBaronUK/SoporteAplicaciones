<?php

    $idCierre = $_POST["cierr"];
    $idAct = $_POST["idAct"];
    $obser = $_POST["obser"];

    // INSERT
    @session_start();
    include_once("conexion.php");
    $conex2 = oci_connect($user, $pass, $db);
    $elusuario = $_SESSION['usuario'];
    
    $sql = "INSERT INTO ACTIVIDADES_CIERRE (ID_CIERRE,ID_ACTIVIDAD_CIERRE,FECHA,HORA,REALIZADO_SI_NO,OBSERVACIONES,USUARIO) VALUES ($idCierre, $idAct,TRUNC(SYSDATE),TO_CHAR(SYSDATE, 'HH:MI:SS a.m.'),'SI','$obser','$elusuario')";
    $queryf = oci_parse($conex2, $sql);
    oci_execute($queryf);
    oci_commit($conex2);
    
?>