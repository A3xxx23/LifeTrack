<?php
require_once('Database/connection.php'); // Asegúrate de que $conn es un objeto PDO

if (!isset($_GET['id'])) {
    echo "<script> alert('Undefined Schedule ID.'); location.replace('calendar.php') </script>";
    exit;
}

// Usando PDO para la consulta de eliminación
$id = $_GET['id'];
$sql = "DELETE FROM `schedule_list` WHERE id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo "<script> alert('Event has deleted successfully.'); location.replace('calendar.php') </script>";
} else {
    echo "<pre>";
    echo "An error occurred.<br>";
    echo "Error: " . $stmt->errorInfo()[2] . "<br>";  // Obtener el mensaje de error de PDO
    echo "</pre>";
}
?>
