<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navigation</title>
  <style>
    .navbar{
       background-color:red;
    }
    .navbar ul{
      overflow: auto;
    }
    
    .navbar li{
      margin:top;
      float:left;
      list-style:none;
      margin: 13px 20px ;
    }
    .navbar li a{
      padding:3px 3px;
      text-decoration:none;
      color:white;
      font-size:20px;
    }
  </style>

</head>
<body>
    <header>
      <nav class="navbar">
        <ul>
          <li><a href="">Dashboard</a></li>
          <li><a href="">Adduser</a></li>
          <li><a href="">Viewuser</a></li>
          <li><a href="">Logout</a></li>
        </ul>
      </nav>
    </header>
    <?php include 'login.php'?>
</body>
</html>