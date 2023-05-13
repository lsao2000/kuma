<?php
session_start();
if (!isset($_SESSION['username'])){
    header("location:index.php");
    die();
}else{
    include("connectdb.php");
    include("function.php");
    $username = selectDatabase($conx,'username',$_SESSION['username'],'users');
    $name_img = selectDatabase($conx,"profile_picture",$username,'users');
    $tmpName = selectDatabase($conx,"tmp_name",$username,'users');
    if ($tmpName === "" || $tmpName == NULL){
    $src = "imgdb/".selectDatabase($conx,'profile_picture',$username,'users');
    }else{
        $src = "imgdb/$username/profile/$name_img";
    }
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
            <img src="<?=$src?>" id="profile" alt="">
        </div>
        
    </nav>
    <div class="navbar-left" id="navbarleft">
        <ul>
            <li><a href="editProfile.php">profile</a></li>
            <li><a href="">Group</a></li>
            <li><a href="">Parameter</a></li>
            <li><a href="">freind</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </div>
    <script src="./js/profile.js"></script>
</body>
</html>