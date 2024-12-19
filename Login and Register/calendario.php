<?php
// Iniciar sesión
session_start();

// Incluir el archivo de conexión a la base de datos
include "connection.php"; 

// Asegúrate de que el ID del usuario esté almacenado en la sesión
if (isset($_SESSION['user_id'])) {
    $id_usuario = $_SESSION['user_id']; // Obtener el ID del usuario de la sesión

    // Preparar la consulta SQL para obtener eventos de un usuario
    $stmt = $conn->prepare("
        SELECT u.id, u.username, e.event_name, e.registration_date 
        FROM tbl_user u
        JOIN Calendar e ON u.id = e.user_id
        WHERE u.id = ?
    ");

    $stmt->bind_param("i", $id_usuario); // 'i' indica que el parámetro es un entero

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();
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
      <a href="kanbanlist.php">
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
      <i class='bx bx-log-out' id="log_out"></i>
    </li>
  </ul>
</div>
<section class="home-section">
  <div class="text">Calendar</div>
  <main class="table" id="customers_table">
    <section class="table__header">
        <h1>Calendar task list</h1>
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
                    <th> Task <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Registration Date <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Id User <span class="icon-arrow">&UpArrow;</span></th>
                </tr>
            </thead>
            <tbody>
            <?php if ($result->num_rows > 0): ?>
              <?php while ($datos = $result->fetch_object()): ?>
                <tr>
                    <td><?= htmlspecialchars($datos->event_id) ?></td>
                    <td><?= htmlspecialchars($datos->event_name) ?></td>
                    <td><?= htmlspecialchars($datos->registration_date) ?></td>
                    <td><?= htmlspecialchars($datos->user_id) ?></td>
                </tr>
                <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No hay eventos disponibles.</td>
                        </tr>
                    <?php endif; ?>
            </tbody>
        </table>
    </section>
  </main>
</section>
<script src="Scripts/dashboard.js"></script>
</body>
</html>
<?php
    // Cerrar la declaración
    $stmt->close();
} else {
    echo "No hay usuario conectado.";
}
?>