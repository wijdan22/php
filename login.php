<?php 
    include("connaction.php");

    session_start();

    if (isset($_POST['login'])) {        
        $cmd = 'SELECT * FROM accounts';  
        $q = mysqli_query($con, $cmd);
        $msg = 0; 
        while ($row = mysqli_fetch_array($q)) {  
            if ($row['email'] == $_POST['email'] and $row['password'] == md5( $_POST['password'])) { 
                $msg = 1; 
                $_SESSION['id']=$row['id']; 
                $_SESSION['username']=$row['username']; 
            } 
        }
        if ($msg == 1) { 
            echo '<script>window.location.href = "tasks.php";</script>';
            exit; 
        }
        else { 
            echo "<script> alert('wrong username or password !') </script>";
        }
    }

    if (isset($_SESSION['id'])) {
        echo '<script>window.location.href = "tasks.php";</script>';
        exit; 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
                body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 100%;
            max-width: 300px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #6a1b9a;
        }
        
        label {
            font-weight: bold;
            margin-top: 30px;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            width: 100%;
            background-color: #6a1b9a;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        
        input[type="submit"]:hover {
            background-color: #4a148c;
        }
        
        .signup-link {
            text-align: center;
            margin-top: 15px;
        }
        
        .signup-link a {
            color: #6a1b9a;
            text-decoration: none;
        }
        
        .signup-link a:hover {
            color: #4a148c;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post">
            <label>Email</label>
            <input type="text" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login" name="login">
        </form>
        <div class="signup-link">
            Don't have an account? <a href="signin.php">Sign up</a>
        </div>
    </div>
</body>
</html>