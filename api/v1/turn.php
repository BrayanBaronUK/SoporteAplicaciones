<?php

include_once("_api.php");

// Para capturar la data se usa $dataResquest

switch ($action) {
    case "findAll":
        $arrayResults = array();

        $sql = "SELECT ID, CODIGO FROM MTO_TURNOS
        WHERE CODIGO NOT IN ('FSM','FST','FSN')";
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