<?php
require_once('db_config.php');

// Verificar el método de solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    // Recibir datos enviados desde la aplicación móvil
    $data = json_decode(file_get_contents("php://input"), true);
    // Verificar si se recibieron datos válidos
    if (isset($data['userId'])) {
        $userId = $data['userId'];
        // Preparar y ejecutar la consulta SQL
        $stmt = $conn->prepare("SELECT * FROM routes WHERE user_id = ?");
        $stmt->bind_param('i', $userId); // 'i' para integer
        $stmt->execute();
        $result = $stmt->get_result();
        // Verificar si se encontraron registros
        if ($result->num_rows > 0) {
            // Recolectar todos los registros en un array
            $datas = [];
            while ($row = $result->fetch_assoc()) {
                $datas[] = $row;
            }
            // Devolver respuesta en formato JSON
            echo json_encode(['message' => 'Datos enviados', 'datosRutas' => $datas]);
        } else {
            // No se encontraron datos
            echo json_encode(['message' => 'No se encontraron datos','datosRutas', $datas]);
        }
        $stmt->close();
    } else {
        // Datos incompletos
        echo json_encode(['error' => 'Datos incompletos']);
    }
}
// Cerrar la conexión
$conn->close();


