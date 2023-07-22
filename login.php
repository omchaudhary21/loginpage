<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">

</head>
<body> 

<?php

    session_start();
    include 'connect.php';
    // echo "data base connected";
    // Intitalize username and password
    $usernameErr = $passwordErr="";
    $username = $password = "";
    if(isset($_POST['submit'])){
        if(empty($_POST['username'])){
           $usernameErr= "enter your username";
           
        }else{
            $username=$_POST['username'];
            // echo $username;
        }
             if(empty($_POST['password'])){
        $passwordErr="enter password";
    }else{
        $password = $_POST["password"];
        // echo $password;
    }
    $sql = "SELECT username FROM problem WHERE username='$username'
                     AND password='$password'";
        // echo "sql ".$sql;
        $result = mysqli_query($conn, $sql);
        // var_dump($result);
        $rows = mysqli_num_rows($result);
        // echo "number of rows ".$rows;
        // var_dump($rows);exit;
        if ($rows) {
            $_SESSION['username'] = $_POST['username'];
            header("location:logindash.php");
            echo "<br>Dashboard";
            
        }else {
             echo "you have don't have an account signup for new account !";
            }
        }
    ?>
    <div class="wrapper">
        <h1>Login Page</h1>
        <form method="post">
            <div class="inputone">
                <input type="text" name ="username" placeholder="Username">
                <i class='bx bxs-user'></i>
                <span style="color:red;"><?php echo $usernameErr; ?></span>
            </div>
            <div class="inputone">
                <input type="password" name="password" placeholder="Password">
                
                <i class='bx bxs-lock-alt'></i>
                <span style="color:red;"><?php echo $passwordErr; ?></span>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
            <div class="register">
               <p>Don't have an account? <a href="register.php">Register</a></p>
               
            </div>
        </form>
    </div>
</body>
</html>