<?php
require 'vendor/autoload.php'; // Asegúrate de que Composer esté cargado

use Firebase\JWT\JWT;
$config = include('config.php');
//secretKey = $config['jwt_secret_key'];
$secretKey = $config['jwt_secret_key']; // Cambia esto por una clave secreta segura

function generateToken($userId) {
    global $secretKey;

    $payload = array(
        "iss" => "your-issuer", // Emisor del token
        "aud" => "your-audience", // Audiencia del token
        "iat" => time(), // Fecha de emisión
        "exp" => time() + 3600, // Fecha de expiración (1 hora)
        "userId" => $userId // Datos del usuario (o cualquier otro dato necesario)
    );

    return JWT::encode($payload, $secretKey);
}

// Ejemplo de uso
$userId = $_POST['userId']; // Obtener el ID del usuario del formulario o de la base de datos
$token = generateToken($userId);
echo json_encode(array('token' => $token));
