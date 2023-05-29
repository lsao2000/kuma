<?php
include("connectdb.php");
include("function.php");
if (isset($_GET['POST_ID'])){
    $postid = validInput($_GET['POST_ID']);
    $userid = validInput($_GET['USER_ID']);
    $preparing = $conx->prepare('SELECT * FROM likepost WHERE post_id = :value1 AND user_id = :value2');
    $preparing->bindParam(":value1",$postid);
    $preparing->bindParam(":value2",$userid);
    $preparing->execute();
    $row = $preparing->fetch(PDO::FETCH_ASSOC);

    // Check if a row exists
    if ($row) {
        echo "Row exists in the database.";
    } else {
        echo "Row does not exist in the database.";
    }
        
}

?>