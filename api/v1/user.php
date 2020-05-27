<?php

include_once("_api.php");

// Para capturar la data se usa $dataResquest

switch ($action) {
    case "findAll":
        $arrayResults = array();

        $sql = "SELECT NOMBRES, APELLIDOS, CEDULA FROM USUARIOS_SOPORTE";
        $resultado_set = oci_parse($conectionBd, $sql);
        oci_execute($resultado_set);
        while ($row = oci_fetch_array($resultado_set)) {
            $arrayResults[] = $row;
        }
        $responseObj['data'] = $arrayResults;
        break;
    case "findByNowTurn": // Encuentra el usuario de turno
        $currentTime = $_SERVER['REQUEST_TIME'];
        $currentDate = date('Y-m-d', $currentTime);
        $idTurn = "";

        if(($currentTime >= strtotime('22:00:00') && $currentTime <= strtotime('23:59:59'))
            || ($currentTime >= strtotime('00:00:00') && $currentTime <= strtotime('05:59:59'))) {
           $idTurn = 4; // Turno N
        } else if($currentTime >= strtotime('06:00:00') && $currentTime <= strtotime('13:59:59')) {
            $idTurn = 1; // Turno M
        } else if($currentTime >= strtotime('14:00:00') && $currentTime <= strtotime('21:59:59')) {
            $idTurn = 3; // Turno T
        }

        $arrayResults = array();

        $sql = "SELECT ID_USUARIO, us.NOMBRES, us.APELLIDOS FROM MTO_TURNOS_HS th INNER JOIN USUARIOS_SOPORTE us ON th.ID_USUARIO=us.CEDULA 
            WHERE FECHA_TURNO = TO_DATE('".$currentDate."','YYYY-MM-DD') AND ID_TURNO = $idTurn";
    
        $resultado_set = oci_parse($conectionBd, $sql);
        oci_execute($resultado_set);
        while ($row = oci_fetch_array($resultado_set)) {
            $arrayResults[] = $row;
        }
        $responseObj['data'] = $arrayResults;
        break;
    default:
        $responseObj['status'] = 400;
        $responseObj['userMessage'] = "Acción no permitida.";
        $responseObj['developerMessage'] = "No existe la acción: $action";
        break;
}
echo json_encode($responseObj);