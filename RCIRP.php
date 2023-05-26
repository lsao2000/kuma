<?php
session_start();
include("function.php");
include("connectdb.php");
if(isset($_POST['commentSubmit'])){
    if (!empty($_POST['textComment'])){
        $PostId = $_POST['Postid'];
        $textComment = validInput($_POST['textComment']);
        $username = $_SESSION['username'];
        $id = selectDatabase($conx,'id',$username,'users');
        $preparing = $conx->prepare("INSERT INTO commentuser (text_comment,post_id,user_id,date)
                                    VALUES (?,?,?,?)");
        $preparing->execute(array($textComment,$PostId,$id,date('Y-m-d')));
    }else{
        
    }

}
header("location:home.php");
die()

?>