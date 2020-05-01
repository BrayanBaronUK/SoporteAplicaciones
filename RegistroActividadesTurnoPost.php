<?php
    $idTurn = $_POST["turn"];
    $idAct = $_POST["idAct"];
    $obser = $_POST["obser"];

   // echo "$idTurn - $idAct - $obser";

    // INSERT
    @session_start();
    include_once("conexion.php");
    $conex2 = oci_connect($user, $pass, $db);
    $elusuario = $_SESSION['usuario'];
    
    $sql = "INSERT INTO ACTIVIDADES_TURNO (TURNO,ACTIVIDAD_TURNO,FECHA,HORA,REALIZADO_SI_NO,OBSERVACIONES,USUARIO) VALUES ($idTurn, $idAct,TRUNC(SYSDATE),TO_CHAR(SYSDATE, 'HH24:MI:SS'),'SI','$obser','$elusuario')";
    $queryf = oci_parse($conex2, $sql);
    oci_execute($queryf);
    oci_commit($conex2);
    
?>