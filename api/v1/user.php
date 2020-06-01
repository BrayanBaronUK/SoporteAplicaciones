<?php

include_once("_api.php");

// Para capturar la data se usa $dataResquest

switch ($action) {
    case "findAll":
        $arrayResults = array();

        $sql = "SELECT NOMBRES, APELLIDOS, CEDULA FROM USUARIOS_SOPORTE A
        INNER JOIN usuarios_soporte_seg B ON A.USUARIO = B.USUARIO WHERE TIPO_USUARIO = 'USER'";
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

        if (($currentTime >= strtotime('22:00:00') && $currentTime <= strtotime('23:59:59'))
            || ($currentTime >= strtotime('00:00:00') && $currentTime <= strtotime('05:59:59'))
        ) {
            $idTurn = 4; // Turno N
        } else if ($currentTime >= strtotime('06:00:00') && $currentTime <= strtotime('13:59:59')) {
            $idTurn = 1; // Turno M
        } else if ($currentTime >= strtotime('14:00:00') && $currentTime <= strtotime('21:59:59')) {
            $idTurn = 3; // Turno T
        }

        $arrayResults = array();

        $sql = "SELECT ID_USUARIO, us.NOMBRES, us.APELLIDOS FROM MTO_TURNOS_HS th INNER JOIN USUARIOS_SOPORTE us ON th.ID_USUARIO=us.CEDULA 
            WHERE FECHA_TURNO = TO_DATE('" . $currentDate . "','YYYY-MM-DD') AND ID_TURNO = $idTurn";

        $resultado_set = oci_parse($conectionBd, $sql);
        oci_execute($resultado_set);
        while ($row = oci_fetch_array($resultado_set)) {
            $arrayResults[] = $row;
        }
        $responseObj['data'] = $arrayResults;
        break;

    case "findByNowComp": //Encontrar el usuario de compensatorio
        $arrayResults = array();

        $sql = "SELECT * FROM (SELECT cp.USUARIO, us.NOMBRES, us.APELLIDOS FROM COMPENSATORIOS cp
               INNER JOIN USUARIOS_SOPORTE us ON cp.USUARIO=us.USUARIO
               WHERE FECHA_COMPENSATORIO = TO_CHAR(TRUNC(SYSDATE),'YYYY-MM-DD'))WHERE ROWNUM <= 1";

        $resultado_set = oci_parse($conectionBd, $sql);
        oci_execute($resultado_set);
        while ($row = oci_fetch_array($resultado_set)) {
            $arrayResults[] = $row;
        }

        $responseObj['data'] = $arrayResults;
        break;

    case "findByNowVaca": //Encontrar el usuario de vacaciones
        $arrayResults = array();

        $sql = "SELECT * FROM (SELECT vc.USUARIO, us.NOMBRES, us.APELLIDOS FROM VACACIONES vc
               INNER JOIN USUARIOS_SOPORTE us ON vc.USUARIO=us.USUARIO
               WHERE TO_CHAR(TRUNC(SYSDATE),'YYYY-MM-DD') BETWEEN INICIO_VACACIONES AND FIN_VACACIONES)WHERE ROWNUM <= 1";

        $resultado_set = oci_parse($conectionBd, $sql);
        oci_execute($resultado_set);
        while ($row = oci_fetch_array($resultado_set)) {
            $arrayResults[] = $row;
        }

        $responseObj['data'] = $arrayResults;
        break;

    case "findByNowCierre": //Encontrar el usuario de cierre
        $arrayResults = array();

        $sql = "SELECT * FROM (SELECT fc.USUARIO, us.NOMBRES, us.APELLIDOS FROM CIERRES fc
               INNER JOIN USUARIOS_SOPORTE us ON fc.USUARIO=us.USUARIO
               WHERE FECHA_CIERRE = TO_CHAR(TRUNC(SYSDATE)+1,'YYYY-MM-DD')) WHERE ROWNUM <= 1";

        $resultado_set = oci_parse($conectionBd, $sql);
        oci_execute($resultado_set);
        while ($row = oci_fetch_array($resultado_set)) {
            $arrayResults[] = $row;
        }

        $responseObj['data'] = $arrayResults;
        break;

    case "findByNowUnidad": //Encontrar el usuario de unidad soporte
        $arrayResults = array();

        $sql = "SELECT * FROM (SELECT sp.USUARIO, us.NOMBRES, us.APELLIDOS FROM SOPORTE_UNIDAD sp
               INNER JOIN USUARIOS_SOPORTE us ON sp.USUARIO=us.USUARIO
               WHERE TO_CHAR(TRUNC(SYSDATE),'YYYY-MM-DD') BETWEEN FECHA_INICIO AND FECHA_FIN )WHERE ROWNUM <= 1";

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
