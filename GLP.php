<?php
include("function.php");
include("connectdb.php");
if (isset($_GET['POST_ID'])){
    $postid = validInput($_GET['POST_ID']);
    $userId = validInput($_GET['USER_ID']);
    try{
        $preparing = $conx->prepare('SELECT love FROM likepost WHERE post_id = ? AND user_id = ?');
        $preparing->execute(array($postid,$userId));
        $line = $preparing->fetch();
        if($line){
            echo "<img src='./imageAnimation/heartclick.png' class='like'  alt=''>";
        }else{
            echo "<img src='./imageAnimation/heartnoclick.png' class='like'  alt=''>";
            
        }
    }catch(PDOException){
        echo "<img src='./imageAnimation/heartnoclick.png' class='like'  alt=''>";
    }
}
?>