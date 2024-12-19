<?php
require_once('../Database/connection.php');

// Verifica si el método de solicitud es POST
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $conn = null; // Libera la conexión PDO
    exit;
}

extract($_POST);

// Manejo de datos para 'allday' (opcional)
$allday = isset($allday) ? 1 : 0; 

try {
    // Inserción o actualización de datos según el valor de $id
    if (empty($id)) {
        $sql = "INSERT INTO `schedule_list` (`title`, `description`, `start_datetime`, `end_datetime`) 
                VALUES (:title, :description, :start_datetime, :end_datetime)";
        $stmt = $conn->prepare($sql);
    } else {
        $sql = "UPDATE `schedule_list` 
                SET `title` = :title, 
                    `description` = :description, 
                    `start_datetime` = :start_datetime, 
                    `end_datetime` = :end_datetime 
                WHERE `id` = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    }

    // Asignación de valores a los parámetros
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':start_datetime', $start_datetime);
    $stmt->bindParam(':end_datetime', $end_datetime);

    // Ejecución de la consulta
    $stmt->execute();

    echo "<script> alert('Schedule Successfully Saved.'); location.replace('../calendar.php') </script>";
} catch (PDOException $e) {
    // Muestra errores específicos si la consulta falla
    echo "<pre>";
    echo "An Error occurred.<br>";
    echo "Error: " . $e->getMessage() . "<br>";
    echo "</pre>";
} finally {
    // Libera la conexión PDO
    $conn = null;
}
?>
