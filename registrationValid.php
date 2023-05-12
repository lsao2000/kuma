<?php
session_start();
if (isset($_SESSION['username'])){
    try{
        include("connectdb.php");
        include("function.php");
        insertIntoDatabase($conx,$_SESSION['firstname'],$_SESSION['lastname'],$_SESSION['username'],$_SESSION['phone'],$_SESSION['email'],$_SESSION['pwd']);
        header("Location:profile.php");
        die();
    }catch(PDOException){
        header("Location:profile.php");
        die();
    }
}else{
    header("Location:index.php");
    die();
}
?>