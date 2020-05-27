<?php

include_once("_api.php");

// Para capturar la data se usa $dataResquest

switch ($action) {
    case "findByYearAndMonth":
        $arrayResults = array();

        $sql = "SELECT FECHA_TURNO, ID_TURNO, ID_USUARIO, SUM(PAGO_EXTRA) AS PAGO_EXTRA, SUM(HORAS_EXTRA) AS HORAS_EXTRA, us.NOMBRES, us.APELLIDOS FROM MTO_TURNOS_HS th INNER JOIN USUARIOS_SOPORTE us ON th.ID_USUARIO=us.CEDULA 
            WHERE FECHA_TURNO>=TO_DATE('" . $dataResquest['year'] . "-" . $dataResquest['month'] . "-1','YYYY-MM-DD') AND FECHA_TURNO<TO_DATE('" . $dataResquest['year'] . "-" . ($dataResquest['month'] + 1) . "-1','YYYY-MM-DD')
            AND PAGO_EXTRA>0 GROUP BY FECHA_TURNO, ID_TURNO, ID_USUARIO,us.NOMBRES, us.APELLIDOS";

        $resultado_set = oci_parse($conectionBd, $sql);
        oci_execute($resultado_set);
        while ($row = oci_fetch_array($resultado_set)) {
            $arrayResults[] = $row;
        }
        $responseObj['data'] = $arrayResults;
        break;
    case "saveTurns":
        $dataArray = $dataResquest['data'];
        $sqlInsert = "";
        $sql2 = "SELECT COUNT(*) AS CANTIDAD FROM MTO_TURNOS_HS";
        $queryv = oci_parse($conectionBd, $sql2);
        oci_execute($queryv);
        oci_commit($conectionBd);
        while (oci_fetch($queryv)) {
            $cantidadTurns = oci_result($queryv, "CANTIDAD");
        }

        if ($cantidadTurns == 0) {

            foreach ($dataArray as $k1 => $engineer) {
                foreach ($engineer['days'] as $k2 => $day) {

                    $sqlInsert .= " INTO MTO_TURNOS_HS (FECHA_TURNO, ID_TURNO, ID_USUARIO, PAGO_EXTRA, HORAS_EXTRA)
                 VALUES (TO_DATE('" . $engineer['year'] . "-" . $engineer['month'] . "-" . $day . "','YYYY-MM-DD'), '" . $engineer['turns'][$k2] . "', '" . $engineer['engineerId'] . "'";

                    //Calculo horas extra
                    if ($engineer['turns'][$k2] == '4') { // el id 4 equivale al turno N
                        $valorHora = 20000;
                        $cantidadHora = 5;
                        $totalExtras = $valorHora * $cantidadHora;
                        $sqlInsert .= ", '$totalExtras', '$cantidadHora')";
                    } else {
                        $sqlInsert .= ", '0', '0')";
                    }
                }
            }
        } else {
            //borramos la tabla si hay registros
            $sql2 = "delete MTO_TURNOS_HS";
            $queryv = oci_parse($conectionBd, $sql2);
            oci_execute($queryv);
            oci_commit($conectionBd);

            foreach ($dataArray as $k1 => $engineer) {
                foreach ($engineer['days'] as $k2 => $day) {

                    $sqlInsert .= " INTO MTO_TURNOS_HS (FECHA_TURNO, ID_TURNO, ID_USUARIO, PAGO_EXTRA, HORAS_EXTRA)
                 VALUES (TO_DATE('" . $engineer['year'] . "-" . $engineer['month'] . "-" . $day . "','YYYY-MM-DD'), '" . $engineer['turns'][$k2] . "', '" . $engineer['engineerId'] . "'";

                    //Calculo horas extra
                    if ($engineer['turns'][$k2] == '4') { // el id 4 equivale al turno N
                        $valorHora = 20000;
                        $cantidadHora = 5;
                        $totalExtras = $valorHora * $cantidadHora;
                        $sqlInsert .= ", '$totalExtras', '$cantidadHora')";
                    } else {
                        $sqlInsert .= ", '0', '0')";
                    }
                }
            }

        }
        $sql = "INSERT ALL $sqlInsert SELECT * FROM DUAL";
        $queryf = oci_parse($conectionBd, $sql);
        oci_execute($queryf);
        oci_commit($conectionBd);
        $filas = oci_num_rows($queryf);

        if ($filas == 0) {
            $responseObj['status'] = 400;
            $responseObj['userMessage'] = "Ha ocurrido un error.";
            $responseObj['developerMessage'] = "Error al ejecutar el query.";
        }

        $responseObj['data'] = $filas;

        break;
    default:
        $responseObj['status'] = 400;
        $responseObj['userMessage'] = "Acción no permitida.";
        $responseObj['developerMessage'] = "No existe la acción: $action";
        break;
}

function findAll()
{
}

echo json_encode($responseObj);
