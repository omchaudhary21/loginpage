
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LoginDashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php session_start();?>
    <center>
    <div class="form">
        <p><span style="color:white;">Hi <?php echo $_SESSION['username']; ?>!</span></p>
        <p><span style="color:white;">welcome to dashboard page</span></p>
        <p><a href="#">Logout</a></p>
    </div>
    </center>
</body>
</html>