<?php
session_start();
include_once('Database/connection.php'); // Se asegura que la conexión sea PDO

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']); // Es recomendable usar `password_hash()` en producción para mayor seguridad

    // Verificar que los campos no estén vacíos
    if (empty($username) && empty($password)) {
        echo "<script>alert('Please Fill Username and Password');</script>";
        exit;
    } elseif (empty($password)) {
        echo "<script>alert('Please Fill Password');</script>";
        exit;
    } elseif (empty($username)) {
        echo "<script>alert('Please Fill Username');</script>";
        exit;
    }

    // Consulta SQL con PDO
    $sql = "SELECT * FROM `tbl_user` WHERE `username` = :username AND `password` = :password";
    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si se encontraron resultados
    if ($stmt->rowCount() > 0) {
        // Obtener el primer resultado
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Obtener los valores de la base de datos
        $name = $row['name'];
        $username = $row['username'];
        $password = $row['password'];

        // Verificar las credenciales (aunque ya se valida en la consulta)
        if ($username === $row['username'] && $password === $row['password']) {
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('location:welcome.php');
            exit;
        }
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
        exit;
    }
}
?>

