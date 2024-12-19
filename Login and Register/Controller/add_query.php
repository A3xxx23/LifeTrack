<?php
require_once '../Database/connection.php';

if (isset($_POST['add'])) {
    if ($_POST['task'] != "") {
        $task = $_POST['task'];
        $status = 'pending'; 

        try {
            // Usamos prepared statement para evitar inyecciones SQL
            $stmt = $conn->prepare("INSERT INTO `task` (`task`, `status`) VALUES (:task, :status)");
            $stmt->bindParam(':task', $task);
            $stmt->bindParam(':status', $status);

            
            $stmt->execute();

            
            header('Location: ../To-Do list.php'); // Ajusta la ruta según sea necesario
exit(); 

        } catch (PDOException $e) {
            // Mostramos el error si la ejecución falla
            echo "Error en la ejecución de la consulta: " . $e->getMessage();
        }
    }
}
?>
