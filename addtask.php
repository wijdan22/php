<?php 
    include("connaction.php");
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit; // تأكد من الخروج بعد توجيه المستخدم
    }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task - Plan today</title>
    <link rel="stylesheet" href="sss.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Plan today</h1>
            <div class="menu-icon">&#9776;</div>
            <ul class="nav">
                <li><a href="tasks.php">Tasks</a></li>
                <li><a href="addtask.php">add Tasks</a></li>
                <li><a href="comtask.php">Completed Tasks</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <ul class="nav-dropdown">
                <li><a href="tasks.php">Tasks</a></li>
                <li><a href="addtask.php">add Tasks</a></li>
                <li><a href="comtask.php">Completed Tasks</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
            <form class="add-task-form" method="post">
                <label for="task">Task:</label>
                <input type="text" name="task" placeholder="Enter your task..." required>
                <label for="time">Time:</label>
                <select name="time">
                    <option value="Morning">Morning</option>
                    <option value="Afternoon">Afternoon</option>
                    <option value="Evening">Evening</option>
                </select>
                <input type="submit" value="Add Task" name="addtask">
            </form>
        </div>
    </div>
    <?php
        if (isset($_POST["addtask"])) {
            $task_name = $_POST['task'];
            $task_time = $_POST['time'];
            $q = "INSERT INTO tasks (name, time, complet) VALUES ('$task_name', '$task_time', 0)";
            $result = mysqli_query($con, $q);
            if ($result) {
                echo '<script>window.location.href = "tasks.php";</script>';
            }
        }
    ?>

    <script>
        const menuIcon = document.querySelector('.menu-icon');
        const navDropdown = document.querySelector('.nav-dropdown');

        menuIcon.addEventListener('click', () => {
            navDropdown.classList.toggle('show');
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                navDropdown.classList.remove('show');
            }
        });
    </script>

</body>

</html>