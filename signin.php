<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: cursive;
        }
        
        input[type="submit"] {
            width: 100%;
            background-color: #6a1b9a;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #4a148c;
        }
        
        .login-link {
            text-align: center;
            margin-top: 15px;
        }
        
        .login-link a {
            color: #6a1b9a;
            text-decoration: none;
        }
        
        .login-link a:hover {
            color: #4a148c;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form method="post">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <input type="submit" value="Submit" name="signup">
        </form>
        <div class="login-link">
            Already have an account? <a href="login.php">Log in</a>
        </div>
    </div>
</body>
<?php

include("connaction.php");
if (isset($_POST['signup'])) { 
        
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5( $_POST['password']);  
    
    $cmd = "INSERT INTO accounts(username, email, password)VALUES ('$username' ,'$email' , '$password' )";

    if (mysqli_query($con,$cmd)) {
         echo '<script>window.location.href = "login.php";</script>';
    }
}
session_start();
if (isset($_SESSION['id'])!= null) {
     echo '<script>window.location.href = "tasks.php";</script>';
}
?>
</html>