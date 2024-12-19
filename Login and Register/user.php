<?php
session_start();

include "Database/connection.php"; // Asegúrate de que este archivo existe y define la variable $conn

try {
    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT * FROM login_register_db.tbl_user");
    $stmt->execute();

    // Obtener los resultados como un arreglo asociativo
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Opcional: Ver los resultados para depurar
    // print_r($result);
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
  <link rel="icon" type="image/png" sizes="32x32" href="Img/favicon-32x32.png" />
  <link rel="stylesheet" href="CSS/dashboard.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="sidebar">
  <div class="logo-details">
    <div class="logo_name">LifeTrack</div>
    <i class='bx bx-menu' id="btn"></i>
  </div>
  <ul class="nav-list">
    <li>
      <a href="user.php">
        <i class='bx bx-user'></i>
        <span class="links_name">User</span>
      </a>
      <span class="tooltip">User</span>
    </li>
    <li>
      <a href="dashboard.php">
        <i class='bx bx-grid-alt'></i>
        <span class="links_name">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>
    <li>
      <a href="tasklist.php">
      <i class='bx bx-task'></i>
        <span class="links_name">Task</span>
      </a>
      <span class="tooltip">Task List</span>
    </li>
    <li>
      <a href="pomo.php">
      <i class='bx bx-time'></i>
        <span class="links_name">Pomodoro</span>
      </a>
      <span class="tooltip">Pomodoro</span>
    </li>
    <li>
      <a href="calendario.php">
      <i class='bx bx-calendar-check' ></i>
        <span class="links_name">Calendar</span>
      </a>
      <span class="tooltip">Calendar</span>
    </li>
    <li>
      <a href="To-Do.php">
      <i class='bx bx-note' ></i>
        <span class="links_name">To-Do List</span>
      </a>
      <span class="tooltip">To-Do List</span>
    </li>
    <li>
      <a href="Kanbandata.php">
      <i class='bx bx-notepad'></i>
        <span class="links_name">Kanban</span>
      </a>
      <span class="tooltip">kanban</span>
    </li>
    <li class="profile">
      <div class="profile-details">
        <img src="Img/favicon.ico" alt="Icono">
        <div class="name_job">
          <div class="name">LifeTrack</div>
        </div>
      </div>
      <i class='bx bx-log-out' id="log_out" style="cursor: pointer;"></i>
    </li>
  </ul>
</div>
<section class="home-section">
  <div class="text">User</div>
  <main class="table" id="customers_table">
    <section class="table__header">
        <h1>User List</h1>
        <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <img src="Img/search.png" alt="Search">
        </div>
        <div class="export__file">
            <label for="export-file" class="export__file-btn" title="Export File"><img src="Img/export data.png" alt="" width="25px" height="25px"></label>
            <input type="checkbox" id="export-file">
            <div class="export__file-options">
                <label>Export As &nbsp; &#10140;</label>
                <label for="export-file" id="toPDF">PDF <img src="Img/pdf.png" alt=""></label>
                <label for="export-file" id="toJSON">JSON <img src="Img/json.png" alt=""></label>
                <label for="export-file" id="toCSV">CSV <img src="Img/csv.png" alt=""></label>
                <label for="export-file" id="toEXCEL">EXCEL <img src="Img/excel.png" alt=""></label>
            </div>
        </div>
    </section>
    <section class="table__body" id="UserName">
        <table>
            <thead>
                <tr>
                    <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                    <th> UserName <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Registration Date <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Action <span class="icon-arrow">&UpArrow;</span></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($result as $row) {
              $Id = $row['id'];
              $name = $row['name'];
              $username = $row['username'];
              $registrationDate = $row['registration_date'];
            ?>
                <tr>
                    <td><?= htmlspecialchars($Id) ?></td>
                    <td><?= htmlspecialchars($name) ?></td>
                    <td><?= htmlspecialchars($username) ?></td>
                    <td><?= htmlspecialchars($registrationDate) ?></td>
                    <td>
                        <a class="btn-danger" onclick="return confirm('¿Are you sure you want to delete this user?')" href="Controller/delete.php?= $datos->id ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </section>
  </main>
</section>
<script src="Scripts/dashboard.js"></script>
</body>
</html>