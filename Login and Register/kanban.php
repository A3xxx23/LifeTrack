<?php
session_start();

include "Database/connection.php"; // Asegúrate de que este archivo existe y define la variable $conn

try {
    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT * FROM login_register_db.tbl_list");
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List in Kanban Board</title>
    <link rel="icon" type="image/png" sizes="32x32" href="Img/favicon-32x32.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        body {
            background: #fff;
            background-blend-mode: multiply, multiply;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .main>h1 {
            margin-bottom: 20px;
            margin-top: 120px;
            color: #333;
            text-shadow: 1px 1px rgb(100, 100, 100);
        }

        .todo-container {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            width: 1000px;
            height: 80vh;
            display: flex;
        }

        .status {
            width: 25%;
            background-color: #f3f3f3;
            position: relative;
            padding: 60px 1rem 0.5rem;
        }

        .status:nth-child(even) {
            background-color: #e9e9e96b;
        }

        .status h2 {
            position: absolute;
            top: 0;
            left: 0;
            text-align: center;
            background-color: #4481eb;
            font-size: 30px;
            color: #f3f3f3;
            margin: 0;
            width: 100%;
            padding: 0.5rem 1rem;
        }

        .todo {
            position: relative;
            background-color: #fff;
            box-shadow: rgba(15, 15, 15, 0.1) 0px 0px 0px 1px,
                rgba(15, 15, 15, 0.1) 0px 2px 4px;
            border-radius: 4px;
            padding: 0.5rem 1rem;
            font-size: 1.1rem;
            margin: 0.5rem 0;
            text-transform: capitalize;
        }

        .todo .close {
            position: absolute;
            right: 1rem;
            top: 0.4rem;
            font-size: 2rem;
            color: #4481eb;
            cursor: pointer;
        }

        .todo .close:hover {
            color: #343444;
        }

        html {
    font-size: 70.5%;
    overflow-x: hidden;
  }
  
  body {
    background-color: var(--color-body);
  }
  
  section {
    min-height: 100vh;
    padding: 10rem 9% 10rem;
    margin-top: 7rem;
  }
  /* ---------------------------- Header and Navbar ------------------------------------*/
  :root {
    --text-color: #333;
    --second-color: #4481eb;
    --color-body: #fff;
    --header-color: #5995fd;
  }
  
  .header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 3rem 9%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;
    background-color: var(--color-body);
    box-shadow: 0 0 15px var(--second-color);
  }
  
  .header::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg,
        transparent,
        rgba(164, 212, 243, 0.801),
        transparent);
    transition: 0.5s;
  }
  
  .header:hover::before {
    left: 100%;
  }

  .logo {
    font-size: 3rem;
    text-decoration: none;
    font-weight: bold;
    cursor: default;
    transition: 0.3s ease;
    margin-right: auto;
  }
  
  .logo:hover {
    transform: scale(1.1);
    text-decoration: none;
  }
  
  .logo span {
    color: var(--second-color);
    text-shadow: 0 0 15px #4481eb;
  }
  
  .navbar a {
    color: var(--text-color);
    font-size: 1.8rem;
    text-decoration: none;
    margin-left: 3rem;
    transition: 0.3s;
    font-weight: 700;
  }
  
  .navbar a:hover{
    color: var(--second-color);
  }
  
  .navbar:hover a:not(:hover) {
    color: var(--second-color);
    opacity: 1;
    filter: blur(1px);
  }
  
  #menu-icon {
    font-size: 36px;
    color: var(--text-color);
    display: none;
  }

  /* ----------------------------Responsive design navbar------------------------------------*/
  @media screen and (max-width: 1018px) {
    #menu-icon {
        display: block;
    }
  
    .navbar {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        padding: 0.5rem 4%;
        display: none;
        margin: 1.5rem 0;
    }
  
    .navbar.active {
        display: block;
        background-color: #fff;
    }
  
    .navbar a {
        display: block;
        margin: 1.5rem 0;
    }
  
    .nav-bg {
        position: absolute;
        top: 70px;
        left: 0;
        width: 100%;
        height: 295px;
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        z-index: 99;
        display: none;
    }
  
    .nav-bg.active {
        display: block;
    }
  }
  
  @media (max-width: 995px) {
    .header {
      padding: 1.25rem 4%;
    }
    .nav-bg {
      position: absolute;
      top: 70px;
      left: 0;
      width: 100%;
      height: 295px;
      border-bottom: 2px solid rgba(255, 255, 255, 0.2);
      z-index: 99;
      display: none;
    }
    .navbar.active {
      display: block;
      background-color: #fff;
    }
    .navbar a {
      display: block;
      margin: 1.5rem 0;
    }
  }
  
  @media (max-width: 768px) {
    #menu-icon {
      display: block;
    }
  
    .logo{
      font-size: 2.6rem;
    }
  
    .navbar {
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
      padding: 0.5rem 4%;
      display: none;
    }
    .navbar.active {
      display: block;
      background-color: #fff;
    }
    .navbar a {
      display: block;
      margin: 1.5rem 0;
    }
    .nav-bg {
      position: absolute;
      top: 70px;
      left: 0;
      width: 100%;
      height: 295px;
      border-bottom: 2px solid rgba(255, 255, 255, 0.2);
      z-index: 99;
      display: none;
    }
    .nav-bg.active {
      display: block;
    }
    }

    @media (max-width: 768px) {
    .main>h1 {
        margin-top: 30px; /* Baja el título un poco en pantallas pequeñas */
        font-size: 2rem; /* Reducir el tamaño del título si es necesario */
    }

    /* Asegúrate de que el contenedor Kanban se adapte */
    .todo-container {
        flex-direction: column; /* Coloca los estados de tareas en columnas en lugar de filas */
        width: 100%;
        height: auto; /* Ajustar la altura para que no se corte en pantallas pequeñas */
        padding: 1rem; /* Añadir algo de espacio para no quedar pegado a los bordes */
    }

    /* Reducir el tamaño de las columnas del Kanban para pantallas pequeñas */
    .status {
        width: 100%; /* Asegurarse de que cada columna ocupe el 100% del ancho en móviles */
        margin-bottom: 1rem; /* Añadir algo de espacio entre las columnas */
    }
}

/* Opcionalmente, ajusta las columnas cuando la pantalla es más grande */
@media (min-width: 769px) {
    .todo-container {
        flex-direction: row; /* Dejar las columnas en fila cuando la pantalla es más grande */
    }

    .status {
        width: 100%; /* Volver a la disposición original de 4 columnas en pantallas grandes */
    }
}
    </style>
</head>

<body>
<header class="header">
        <a href="kanban.php" class="logo"><span>LifeTrack</span></a>
        <i class='bx bx-menu' id="menu-icon"></i>
        <nav class="navbar">
            <a href="Home.php">Home</a>
            <a href="calendar.php">Calendar</a>
            <a href="kanban.php">Kanban</a>
            <a href="Pomodoro.php">Pomodoro</a>
            <a href="To-Do list.php">To-Do list</a>
            <a href="index.php">Logout</a>
        </nav>

    </header>
    <div class="nav-bg"></div>

    <div class="main">

        <h1>To-Do List in Kanban Board</h1>

        <!-- Modal -->
        <div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addList" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addList">Add Todo List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="./Controller/addKanban.php" method="POST">
                            <div class="form-group">
                                <label for="list">Todo:</label>
                                <input type="text" class="form-control" id="list" name="list">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Todo -->
        <div class="todo-container">
    <div class="status" id="no_status">
        <h2>No Status</h2>
        <button class="btn btn-dark form-control" data-toggle="modal" data-target="#addListModal">+ Add Todo</button>
        <div class="todo" draggable="true">
            <span>Welcome LifeTrack</span>
            <span class="close">&times;</span>
        </div>
        <?php
        foreach ($result as $row) {
            $listId = $row['tbl_list_id'];
            $list = $row['list'];
            $status = $row['status'];
        ?>
            <div class="todo" draggable="true" data-status="<?= htmlspecialchars($status) ?>">
                <input type="hidden" id="listId-<?= htmlspecialchars($listId) ?>" value="<?= htmlspecialchars($listId) ?>">
                <span id="list-<?= htmlspecialchars($listId) ?>"><?= htmlspecialchars($list) ?></span>
                <span class="close" onclick="deleteList(<?= htmlspecialchars($listId) ?>)">&times;</span>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="status" id="pending">
        <h2>Pending</h2>
        <!-- Todos en estado "Pending" -->
    </div>
    <div class="status" id="in_progress">
        <h2>In Progress</h2>
        <!-- Todos en progreso -->
    </div>
    <div class="status" id="completed">
        <h2>Completed</h2>
        <!-- Todos completados -->
    </div>
</div>

<div id="overlay"></div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

        <script>
           const todos = document.querySelectorAll(".todo");
const all_status = document.querySelectorAll(".status");
let draggableTodo = null;

todos.forEach((todo) => {
    todo.addEventListener("dragstart", dragStart);
    todo.addEventListener("dragend", dragEnd);
});

function dragStart() {
    draggableTodo = this;
    setTimeout(() => {
        this.style.display = "none";
    }, 0);
    console.log("dragStart");
}

function dragEnd() {
    draggableTodo = null;
    setTimeout(() => {
        this.style.display = "block";
    }, 0);
    console.log("dragEnd");
}

all_status.forEach((status) => {
    status.addEventListener("dragover", dragOver);
    status.addEventListener("dragenter", dragEnter);
    status.addEventListener("dragleave", dragLeave);
    status.addEventListener("drop", dragDrop);
});

function dragOver(e) {
    e.preventDefault();
}

function dragEnter() {
    this.style.border = "1px dashed #ccc";
    console.log("dragEnter");
}

function dragLeave() {
    this.style.border = "none";
    console.log("dragLeave");
}

function dragDrop() {
    this.style.border = "none";
    this.appendChild(draggableTodo);

    // Obtener el ID del todo y el nuevo estado
    const todoId = draggableTodo.querySelector("input[type='hidden']").value;
    const newStatus = this.id; // El ID del contenedor del estado (e.g., "no_status", "pending")

    // Llamar a la función para actualizar el estado en la base de datos
    updateTodoStatus(todoId, newStatus);
    console.log(`dropped to: ${newStatus}`);
}

function updateTodoStatus(todoId, newStatus) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./Controller/updateStatus.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log("Status updated:", xhr.responseText);
        } else {
            console.error("Error updating status:", xhr.responseText);
        }
    };
    xhr.send(`id=${todoId}&status=${newStatus}`);
}

function deleteList(id) {
    if (confirm("Do you want to delete this list?")) {
        window.location = "./Controller/Kanbandelete.php?list=" + id;
    }
}

const menuIcon = document.querySelector('#menu-icon');
const navbar = document.querySelector('.navbar');
const navbg = document.querySelector('.nav-bg');
menuIcon.addEventListener('click', () => {
  menuIcon.classList.toggle('bx-x');
  navbar.classList.toggle('active');
  navbg.classList.toggle('active');
});
        </script>

</body>

</html>