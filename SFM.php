<?php
include("connectdb.php");
include("function.php");
if(isset($_POST['textMessage']) && !empty($_POST['textMessage'])){
    $freind_id = validInput($_POST['freindid']);
    $sender_id = validInput($_POST['senderId']);
    $textMessage = validInput($_POST['textMessage']);
    $senderName = validInput($_POST['sendername']);
    $now = new DateTime();
    $date = $now->format("Y-m-d H:i");
    $preparing = $conx->prepare("INSERT INTO message(text_message,freind_id,sender_id,date,sender)
                                VALUES(?, ?, ?, ?, ?)");
    $preparing->execute(array($textMessage,$freind_id,$sender_id,$date,$senderName));
}else{
    echo "failed to achieve data";
}
?>