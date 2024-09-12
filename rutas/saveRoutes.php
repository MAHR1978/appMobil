<?php
require_once('db_config.php');

// Obtén los datos JSON desde php://input
$data = json_decode(file_get_contents("php://input"));

// Verifica si la decodificación fue exitosa
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(array("status" => "error", "message" => "JSON decode error: " . json_last_error_msg()));
    exit;
}
function convertToMySQLDatetime($isoDateTime) {
    try {
        $dateTime = new DateTime($isoDateTime);
        return $dateTime->format('Y-m-d H:i:s');
    } catch (Exception $e) {
        return null;
    }
}

// Inicializa el array para las respuestas
$responses = [];

// Verifica si $data es un array de objetos JSON
if (is_array($data)) {
    foreach ($data as $route) {
        // Verifica si $route es un objeto y tiene las propiedades esperadas
        if (is_object($route) &&
            isset($route->id, $route->origin, $route->destination, $route->distance, $route->fuelConsumption, $route->user_id, $route->estado, $route->direccion_origen, $route->direccion_destino, $route->fecha, $route->rendimiento)) {

            // Accede a las propiedades del objeto
            $id_ruta = $conn->real_escape_string($route->id);
            $origin_lat = $conn->real_escape_string($route->origin->lat);
            $origin_lng = $conn->real_escape_string($route->origin->lng);
            $destination_lat = $conn->real_escape_string($route->destination->lat);
            $destination_lng = $conn->real_escape_string($route->destination->lng);
            $distance = $conn->real_escape_string($route->distance);
            $fuelConsumption = $conn->real_escape_string($route->fuelConsumption);
            $userId = $conn->real_escape_string($route->user_id);
            $estado = $conn->real_escape_string($route->estado);
            $dirOrigen = $conn->real_escape_string($route->direccion_origen);
            $dirDestino = $conn->real_escape_string($route->direccion_destino);
            $fecha = convertToMySQLDatetime($route->fecha);
            $rendimiento = $conn->real_escape_string($route->rendimiento);

            $sql = "INSERT INTO routes (id_ruta, origin_lat, origin_lng, destination_lat, destination_lng, distance, fuelConsumption, user_id, estado, direccion_origen, direccion_destino, fecha, rendimiento) 
                    VALUES ('$id_ruta', '$origin_lat', '$origin_lng', '$destination_lat', '$destination_lng', '$distance', '$fuelConsumption', '$userId', '$estado', '$dirOrigen', '$dirDestino','$fecha','$rendimiento')";

            if ($conn->query($sql) === TRUE) {
                $responses[] = array("status" => "success", "message" => "Route saved successfully");
            } else {
                $responses[] = array("status" => "error", "message" => "Error: " . $conn->error);
            }
        } else {
            $responses[] = array("status" => "error", "message" => "Invalid route format");
        }
    }
    echo json_encode($responses);
} else {
    echo json_encode(array("status" => "error", "message" => "No data received or incorrect format"));
}
