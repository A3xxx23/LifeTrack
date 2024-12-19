<?php
include_once('Database/connection.php');
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conn->query("DELETE FROM login_register_db.tbl_user WHERE id = $id");
    if ($sql) {
        header("Location: dashboard.php"); // Redirige al dashboard después de eliminar
    } else {
        echo "Error al eliminar el usuario.";
    }
}
?>
