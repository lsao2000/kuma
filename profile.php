<?php
session_start();
if (!isset($_SESSION['username'])){
    header("location:index.php");
    die();
}else{
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/profile.css">
    <title>Profile</title>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div>
            <h1 class="brand">Kuma</h1>
        </div>
        <div class="toggle" id="toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        
    </nav>
    <div class="navbar-left" id="navbarleft">
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Group</a></li>
            <li><a href="">Parameter</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </div>
    <script src="./js/profile.js"></script>
</body>
</html>