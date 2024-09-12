<?php
require 'vendor/autoload.php'; // Asegúrate de que Composer esté cargado

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$config = include('config.php');
//secretKey = $config['jwt_secret_key'];
$secretKey = $config['jwt_secret_key']; 

//$secretKey = 'your-256-bit-secret'; // La misma clave secreta que usaste para firmar el token

function authenticateRequest() {
    global $secretKey;

    $headers = apache_request_headers();
    if (isset($headers['Authorization'])) {
        $authHeader = $headers['Authorization'];
        $token = str_replace('Bearer ', '', $authHeader); // Asumiendo que el token viene como "Bearer <token>"

        try {
            $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));
            return $decoded;
        } catch (Exception $e) {
            // Token inválido o expirado
            http_response_code(401); // Unauthorized
            echo json_encode(array('message' => 'Token inválido o expirado'));
            exit();
        }
    } else {
        http_response_code(401); // Unauthorized
        echo json_encode(array('message' => 'No se proporcionó el token'));
        exit();
    }
}

authenticateRequest();

// Aquí puedes acceder a los datos decodificados
// Ejemplo de uso:
echo json_encode(array('message' => 'Acceso concedido'));
