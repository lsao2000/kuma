<?php
session_start();
include("connectdb.php");
include("function.php");
if (isset($_GET['freindid'])){
    $freind_id = validInput($_GET['freindid']);
    $sender_id = validInput($_GET['senderId']);
    $sender_name = validInput($_GET['sendername']);
    $preparing = $conx->prepare("SELECT * FROM message WHERE (freind_id = ? AND sender_id = ?) OR (freind_id = ? AND sender_id = ?) ");
    $preparing->execute(array($freind_id,$sender_id,$sender_id,$freind_id));
    while($msg = $preparing->fetch()){
        if ($msg['sender'] === $sender_name){
            echo "<p id='sender' >$msg[text_message]</p>";
        }else{
            echo "<p id='receiver' >$msg[text_message]</p>";
        }
    }
}
?>