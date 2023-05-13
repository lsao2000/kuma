<?php
session_start();
if (!isset($_SESSION['username'])){
    header("location:index.php");
    die();
}
else{
    include("connectdb.php");
    $username = $_SESSION['username'];
    if (isset($_POST['submit'])){
        mkdir("imgdb/$username");
        mkdir("imgdb/$username/profile");
        $name_img = $_FILES['file']['name'];
        $tmp_img = $_FILES['file']['tmp_name'];
        move_uploaded_file($tmp_img,"imgdb/$username/profile/$name_img");
        $preparing = $conx->prepare("UPDATE users SET profile_picture = ? , tmp_name = ? WHERE username = ?");
        $preparing->execute(array($name_img,$tmp_img,$username));
        header("location:profile.php");
        die();
    }
}
?>