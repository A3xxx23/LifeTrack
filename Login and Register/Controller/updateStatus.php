<?php
include "../Database/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $status = $_POST['status'] ?? null;

    if ($id && $status) {
        try {
            // Actualizar el estado en la base de datos
            $stmt = $conn->prepare("UPDATE tbl_list SET status = :status WHERE tbl_list_id = :id");
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo "Status updated successfully!";
        } catch (PDOException $e) {
            echo "Error updating status: " . $e->getMessage();
        }
    } else {
        echo "Invalid data received.";
    }
}
?>
