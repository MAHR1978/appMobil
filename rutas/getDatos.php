<?php

require_once('db_config.php');

// Habilitar el reporte de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Endpoint para autenticar usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recibir datos enviados desde la aplicación móvil
    $data = json_decode(file_get_contents("php://input"), true);

    // Verificar si se recibieron datos válidos
    if (isset($data['user']) && isset($data['pass'])) {
        $username = $data['user'];
        $password = $data['pass'];

        // Consulta SQL para verificar credenciales usando consultas preparadas
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE user = ? AND clave = ?");
        if ($stmt === false) {
            // Error al preparar la consulta
            http_response_code(500);
            echo json_encode(array('error' => 'Error en la preparación de la consulta.'));
            exit;
        }

        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if ($result->num_rows > 0) {
            // Usuario autenticado correctamente
            $usuario = $result->fetch_assoc();
            // Devolver respuesta en formato JSON
            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Usuario autenticado correctamente', 'usuario' => $usuario));
        } else {
            // Credenciales incorrectas
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Credenciales incorrectas'));
        }

        $stmt->close();
    } else {
        // Datos incompletos
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Datos incompletos'));
    }
}

// Cerrar conexión
$conn->close();


