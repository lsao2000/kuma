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
        if (!empty($_FILES['file']['name'])){
            // check if the directory already exist 
            if (!is_dir("imgdb/$username")){
                mkdir("imgdb/$username");
            }
            // check if the directory already exist
            if(!is_dir("imgdb/$username/profile")){
                mkdir("imgdb/$username/profile");
            }
            // Get the name of image and path of the image in the tmp directory
            $name_img = $_FILES['file']['name'];
            $tmp_img = $_FILES['file']['tmp_name'];
            // Move uploaded file in our imgdb directory for saving image in our database
            move_uploaded_file($tmp_img,"imgdb/$username/profile/$name_img");
            $preparing = $conx->prepare("UPDATE users SET profile_picture = ? , tmp_name = ? WHERE username = ?");
            $preparing->execute(array($name_img,$tmp_img,$username));
            header("location:home.php");
            die();
        }else{
            header("location:editProfile.php");
            die();
        }
        
    }
    else{
        header("location:editProfile.php");
        die();
    }
}
?>