<?php
return [
    'jwt_secret_key' => '9e8a7a2c560b8e245fbd24fa1441a78bf8a112f6aeb6c6aae12e978747ed1c5c',
];
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir al login si no está autenticado
    header('Location: login.html');
    exit();
}

