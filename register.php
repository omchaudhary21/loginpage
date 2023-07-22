<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<?php
    include 'connect.php';
    // echo "database connected succesfully";
    // error_reporting(0);
    // define variable
    $username= $email = $password= $confirm_password= "" ;
    $usernameErr= $emailErr = $passwordErr= $confirm_passwordErr = "";
    if(isset($_POST['submit'])){
        if(empty($_POST['uname'])){
           $usernameErr= "username is empty";
           
        }else{
            $username=$_POST['uname'];
            // echo $username;
            if (!preg_match("/^[a-zA-Z]*$/",$username)) {  
                $usernameErr = "Only alphabets and white space are allowed";  
            }  
            
        }
        $email = $_POST["email"];
        $query= "SELECT * FROM problem where email= '$email'";
        $result =mysqli_query($conn,$query);
        $row= mysqli_num_rows($result);
        if($row==1){
          $emailErr= "*email already used*";
         
        }
         elseif(empty($_POST["email"])){
             $emailErr= "*email is required*";

          }else{
             // $email = $_POST["email"];
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
          }
       
        if(empty($_POST['password'])){
            $passwordErr ="password shouldn't be empty";
        }else{
            $password =$_POST['password'];
            // echo "<br>".$password;
        }
        if(empty($_POST['confirm_password'])){
            $confirm_passwordErr ="confirm_password shouldn't be empty";
        } elseif($_POST["password"] != $_POST["confirm_password"]){
            $confirm_passwordErr= " password doesn't match pls write correct password";
        }
        else{
            $confirm_password =$_POST['confirm_password'];
            // echo $confirm_password;
        }
        if($usernameErr == "" && $emailErr == "" && $passwordErr == "" && $confirm_passwordErr == "" ) {  
         $sql = "INSERT INTO problem (username,email,password ,confirm_password) VALUES ('$username','$email','$password','$confirm_password')";
            if(mysqli_query ($conn,$sql)){
                // header("location:signupboard.php");
               echo "<br> data stored in database successfully";
               
            }else{
               echo"cannot insert into database";
               
            }
        }
    }
    ?>
   
    <div class="wrapper">
        <h1>SignUp Page</h1>
        <form method="post">
            <div class="inputone">
                <input type="text" name="uname"  placeholder="Username">
                <span style="color:red;">*<?php echo $usernameErr; ?></span>
            </div>
            <div class="inputone">
                <input type="text" name="email" placeholder="email">
                <span style="color:red;">*<?php echo $emailErr; ?></span>
            </div>
            <div class="inputone">
                <input type="password" name="password" placeholder="Password">
                <span style="color:red;">*<?php echo $passwordErr; ?></span>
                
            </div>
            <div class="inputone">
                <input type="password" name="confirm_password" placeholder="confirm_Password">
                <span style="color:red;">*<?php echo $confirm_passwordErr; ?></span>
                
            </div>
            <button type="submit" name="submit" class="btn">SignUp</button>
            <div class="register">
               <p>Already have an account? <a href="login.php">Login</a></p>
               
            </div>
        </form>
    </div>
</body>
</html>