<?php
include('../Database/connection.php'); // Asegúrate de que define $conn como instancia de PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['list']) && !empty($_POST['list'])) {
        $list = $_POST['list'];

        try {
            // Preparar consulta
            $stmt = $conn->prepare("INSERT INTO tbl_list (list) VALUES (:list)");
            $stmt->bindValue(":list", $list, PDO::PARAM_STR);
            $stmt->execute();

            // Redirigir después de la inserción
            header("Location: http://localhost:3000/xampp/xampp/htdocs/Proyecto%20Software%202/Login%20and%20Register/kanban.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "
            <script>
                alert('Please fill in all fields!');
                window.location.href = 'http://localhost:3000/xampp/xampp/htdocs/Proyecto%20Software%202/Login%20and%20Register/kanban.php';
            </script>
        ";
    }
}
?>



