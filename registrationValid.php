<?php
session_start();
if (isset($_SESSION['username'])){
    try{
        include("connectdb.php");
        include("function.php");
        insertIntoDatabase($conx,$_SESSION['firstname'],$_SESSION['lastname'],$_SESSION['username'],$_SESSION['phone'],$_SESSION['email'],$_SESSION['pwd'],"blank-profile.png");
        header("Location:home.php");
        die();
    }catch(PDOException){
        header("Location:home.php");
        die();
    }
}else{
    header("Location:index.php");
    die();
}
?>