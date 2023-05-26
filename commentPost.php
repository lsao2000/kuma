<?php
session_start();
include("connectdb.php");
include("function.php");
if(isset($_POST['submit'])){
    if(!empty($_POST['textComment'])){
        echo "kjdds";
        $PostId = $_POST['postId'];
        $textComment = validInput($_POST['textComment']);
        $userId = selectDatabase($conx,'id',$_SESSION['username'],'users');
        $preparing = $conx->prepare("INSERT INTO commentuser(text_comment,post_id,user_id,date)
                                    VALUES(?,?,?,?)");
        $preparing->execute(array($textComment,$PostId,$userId,date('Y-m-d')));
    }else{
        
    }
    header("Location:home.php");
    die();
}else{
    header("Location:home.php");
    die();
    
}

?>