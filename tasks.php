<?php 
    include("connaction.php");
    session_start();
    if (!isset($_SESSION['username'])) {
        // echo '<script>window.location.href = "login.php";</script>';
        header("Location: login.php");
        exit; // تأكد من الخروج بعد توجيه المستخدم
    }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan today</title>
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
            <div class="task-container">
                <div class="task_title">
                    <span>Morning Tasks</span>
                </div>
                <?php
                    include("connaction.php");
                    $cmd = 'SELECT * FROM tasks';
                    $q = mysqli_query($con,$cmd);
                    while ($row = mysqli_fetch_array($q)) {
                        if ($row['time'] =="Morning" and $row['complet'] == 0) {
                            echo 
                            '<div class="task">
                                <span class="task-title">'.$row["name"].'</span>
                                <a href="?rid='.$row['id'].'" class="task-delete">Delete</a>
                                <a href="?cid='.$row['id'].'" class="task-complet">complet</a>
                            </div>';
                        }
                    }
                    if (isset($_GET['rid'])) {
                        $cmd = 'DELETE FROM tasks WHERE id ='.$_GET['rid'];
                        if (mysqli_query($con,$cmd)) {
                             echo '<script>window.location.href = "tasks.php";</script>';
                        }    
                    }
                    if (isset($_GET['cid'])) {
                        $cmd  = 'UPDATE tasks SET complet = 1 WHERE id ='.$_GET['cid'];
                        if (mysqli_query($con,$cmd)) {
                             echo '<script>window.location.href = "tasks.php";</script>';
                        }    
                    }
                ?>
            </div>

            <div class="task-container">
                <div class="task_title">
                    <span>Afternoon Tasks</span>
                </div>
                <?php
                    include("connaction.php");
                    $cmd = 'SELECT * FROM tasks';
                    $q = mysqli_query($con,$cmd);
                    while ($row = mysqli_fetch_array($q)) {
                        if ($row['time'] =="Afternoon" and $row['complet'] == 0) {
                            echo 
                            '<div class="task">
                                <span class="task-title">'.$row["name"].'</span>
                                <a href="?rid='.$row['id'].'" class="task-delete">Delete</a>
                                <a href="?cid='.$row['id'].'" class="task-complet">complet</a>
                            </div>';
                        }
                    }
                ?>
            </div>
            <div class="task-container">
                <div class="task_title">
                    <span>Evening Tasks</span>
                </div>
                <?php
                    include("connaction.php");
                    $cmd = 'SELECT * FROM tasks';
                    $q = mysqli_query($con,$cmd);
                    while ($row = mysqli_fetch_array($q)) {
                        if ($row['time'] =="Evening" and $row['complet'] == 0) {
                            echo 
                            '<div class="task">
                                <span class="task-title">'.$row["name"].'</span>
                                <a href="?rid='.$row['id'].'" class="task-delete">Delete</a>
                                <a href="?cid='.$row['id'].'" class="task-complet">complet</a>
                            </div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>

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