<?php

include_once("_api.php");

// Para capturar la data se usa $dataResquest

switch ($action) {
    case "findAll":
        $arrayResults = array();
        if ($result = $mysqli->query("SELECT NOMBRES, APELLIDOS, CEDULA FROM users")) {
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $arrayResults[] = $row;
            }
        }
        $responseObj['data'] = $arrayResults;
        break;
    case "findByNowTurn": // Encuentra el usuario de turno
        $currentTime = $_SERVER['REQUEST_TIME'];
        $currentDate = date('Y-m-d', $currentTime);

        if(($currentTime >= strtotime('22:00:00') && $currentTime <= strtotime('23:59:59'))
            || ($currentTime >= strtotime('00:00:00') && $currentTime <= strtotime('05:59:59'))) {
            echo 'N';
        } else if($currentTime >= strtotime('06:00:00') && $currentTime <= strtotime('13:59:59')) {
            echo 'M';
        } else if($currentTime >= strtotime('14:00:00') && $currentTime <= strtotime('21:59:59')) {
            echo 'T';
        }

        

        exit();

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