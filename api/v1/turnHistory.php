<?php

include_once("_api.php");

// Para capturar la data se usa $dataResquest

switch ($action) {
    case "findByYearAndMonth":
        $arrayResults = array();
        $sql = "SELECT dateTurn, idTurn, idEngineer, SUM(pagoExtras) AS pagoExtras, SUM(horasExtras) AS horasExtras, us.NOMBRES, us.APELLIDOS FROM turns_history th INNER JOIN users us ON th.idEngineer=us.cedula WHERE YEAR(dateTurn) = '".$dataResquest['year']."' AND MONTH(dateTurn) = '".$dataResquest['month']."' AND pagoExtras>0 GROUP BY idEngineer";
        if ($result = $mysqli->query($sql)) {
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $arrayResults[] = $row;
            }
        }
        $responseObj['data'] = $arrayResults;
        break;
    case "saveTurns":
        $dataArray = $dataResquest['data'];
        $sqlInsert = "INSERT INTO turns_history (`dateTurn`, `idTurn`, `idEngineer`, `pagoExtras`, `horasExtras`) VALUES ";
        foreach ($dataArray as $k1 => $engineer) {
            foreach ($engineer['days'] as $k2 => $day) {
                $sqlInsert .= "('".$engineer['year']."-".$engineer['month']."-".$day."', '".$engineer['turns'][$k2]."', '".$engineer['engineerId']."'";

                //Calculo horas extra
                if( $engineer['turns'][$k2] == '3' ) { // el id 3 equivale al turno N
                    $valorHora = 50000;
                    $cantidadHora = 4;
                    $totalExtras = $valorHora * $cantidadHora;
                    $sqlInsert .= ", '$totalExtras', '$cantidadHora'),";
                } else {
                    $sqlInsert .= ", '0', '0'),";
                }
            }
        }
        $sqlInsert = substr($sqlInsert, 0, -1);
        $result = $mysqli->query($sqlInsert);

        if( $result == false) {
            $responseObj['status'] = 400;
            $responseObj['userMessage'] = "Ha ocurrido un error.";
            $responseObj['developerMessage'] = "Error al ejecutar el query: " . $mysqli->error;
        }
        
        $responseObj['data'] = $result;
        
        break;
    default:
        $responseObj['status'] = 400;
        $responseObj['userMessage'] = "Acción no permitida.";
        $responseObj['developerMessage'] = "No existe la acción: $action";
        break;
}

function findAll() {
    
}

$mysqli->close();
echo json_encode($responseObj);