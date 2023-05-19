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
        $src = "imgdb/default/".selectDatabase($conx,'profile_picture',$username,'users');
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
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Profile</title>
</head>
<body>
    <?php include("navbar.php")?>
    <script src="./js/navbar.js"></script>
    <script src="./js/home.js"></script>
</body>
</html>