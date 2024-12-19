<?php
session_start();
include_once('Database/connection.php');

// if(isset($_SESSION['name']) && isset($_SESSION['username'] )){
// }
$_SESSION['name'];
$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css2/bootstrap.css"/>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
    <div class="col-md-3"></div>
    <div class="col-md-6 well">
        <h3 class="text-primary">PHP - Simple To Do List App</h3>
        <hr style="border-top:1px dotted #ccc;"/>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <center>
                <form method="POST" class="form-inline" action="Controller/add_query.php">
                    <input type="text" class="form-control" name="task" required/>
                    <button class="btn btn-primary form-control" name="add">Add Task</button>
                </form>
            </center>
        </div>
        <br /><br /><br />
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require 'Database/connection.php';
                    $query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
                    $count = 1;
                    while($fetch = $query->fetch(PDO::FETCH_ASSOC)){ // Cambiado a fetch(PDO::FETCH_ASSOC)
                ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $fetch['task'] ?></td>
                    <td><?php echo $fetch['status'] ?></td>
                    <td colspan="2">
                        <center>
                            <?php
                                if($fetch['status'] != "Done"){
                                    echo 
                                    '<a href="Controller/update_task.php?task_id='.$fetch['task_id'].'" class="btn btn-success">✔</a> |';
                                }
                            ?>
                            <a href="Controller/delete_query.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn btn-danger">X</a>
                        </center>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
