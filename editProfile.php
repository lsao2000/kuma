<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
    die();
}else{
    include("connectdb.php");
    include("function.php");
    $username = $_SESSION['username'];
    $name_img = selectDatabase($conx,"profile_picture",$username,'users');
    $tmpName = selectDatabase($conx,"tmp_name",$username,'users');
    if ($tmpName === "" || $tmpName === null){
        $src = "imgdb/default/".selectDatabase($conx,'profile_picture',$username,'users');
    }else{
        $src = "imgdb/$username/profile/$name_img";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="css/editProfile.css">
    <title>Profile</title>
</head>
<body>
    <?php include("navbar.php")?>
    <br>
    <br>
    <div class="card w-50 mx-auto mt-5">
        <form action="chekEditProfile.php" method="post" enctype="multipart/form-data">
            <div class="row mt-4 ">
                <div class="col-4"></div>
                <div class="col-4 ">
                    <img src="<?=$src?>" id="editprofile" alt="">
                </div>
                <div class="col-4"></div>
            </div>
            <div class="mt-4 ms-2 me-2 file">
                <input type="file" class="form-control" name="file" id="file">
            </div>
            <div class="mt-4 w-25 mx-auto mb-3">
                <input type="submit" name="submit" id="save" class="btn btn-primary" value="save">
            </div>
        </form>    
    </div>
    <script src="./js/navbar.js"></script>
</body>
</html>
<?php

}
?>