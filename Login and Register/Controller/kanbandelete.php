<?php
include('../Database/connection.php');

if (isset($_GET['list'])) {
    $list = $_GET['list'];

    try {

        $query = "DELETE FROM tbl_list WHERE tbl_list_id = '$list'";

        $stmt = $conn->prepare($query);

        $query_execute = $stmt->execute();

        if ($query_execute) {
            echo "
                <script>
                    alert('Todo List deleted successfully!');
                    window.location.href = 'http://localhost:3000/xampp/xampp/htdocs/Proyecto%20Software%202/Login%20and%20Register/kanban.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Failed to delete list!');
                    window.location.href = 'http://localhost:3000/xampp/xampp/htdocs/Proyecto%20Software%202/Login%20and%20Register/kanban.php';
                </script>
            ";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>