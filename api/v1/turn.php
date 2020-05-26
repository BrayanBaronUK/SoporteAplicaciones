<?php

include_once("_api.php");

// Para capturar la data se usa $dataResquest

switch ($action) {
    case "findAll":
        $arrayResults = array();
        if ($result = $mysqli->query("SELECT id, code FROM turns")) {
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $arrayResults[] = $row;
            }
        }
        $responseObj['data'] = $arrayResults;
        break;
    default:
        $responseObj['status'] = 400;
        $responseObj['userMessage'] = "Acción no permitida.";
        $responseObj['developerMessage'] = "No existe la acción: $action";
        break;
}

$mysqli->close();
echo json_encode($responseObj);