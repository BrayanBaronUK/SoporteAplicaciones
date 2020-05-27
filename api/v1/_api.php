<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$requestMethod = $_SERVER["REQUEST_METHOD"];
$dataResquest = json_decode(file_get_contents('php://input'), true);

if ( ($requestMethod !== 'POST') ) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

include_once("../../conexion.php");
$conectionBd = oci_connect($user, $pass, $db);

$action = $dataResquest['action'];

$timezone  = -5;
$systemDate = gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));

$responseObj = [
    'systemDate' => $systemDate,
    'status' => 200,
    'userMessage' => 'Transacción exitosa',
    'developerMessage' => 'Transacción exitosa: ' . $action,
    'data' => '',
];