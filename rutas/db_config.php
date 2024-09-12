<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Configuración de la conexión a la base de datos (ajusta los valores según tu configuración)
$db_host = 'localhost'; // O la IP de tu servidor MySQL
$db_name = 'rutas';
$db_user = 'root';
$db_password = 'anjo1978';
//echo $db_host.' '.$db_name.' '.$db_user.' '.$db_pass; 
// Crear conexión
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

 //Verificar la conexión
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Conexión fallida: " . $conn->connect_error]);
    exit();
}
$conn->set_charset("utf8");








