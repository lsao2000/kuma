<?php
session_start();
if (!isset($_SESSION['username'])){
    header("Location:index.php");
    die();
}else{
    include("connectdb.php");
    include("function.php");
    if (isset($_POST['addFreind'])){
        $freindID = validInput($_POST['FreindID']);
        $userId = selectDatabase($conx,'id',$_SESSION['username'],'users');
        $preparing = $conx->prepare("INSERT INTO freind (freind_id,user_id) VALUES (?,?)");
        $preparing->execute(array($freindID,$userId));
    }
    else if (isset($_POST['removeFreind'])){
        $freindID = validInput($_POST['FreindID']);
        $userId = selectDatabase($conx,'id',$_SESSION['username'],'users');
        $preparing = $conx->prepare("DELETE FROM freind WHERE freind_id = ? AND user_id = ? ");
        $preparing->execute(array($freindID,$userId));
        
    }
    header("Location:home.php");
    die();
?>

<?php } ?>