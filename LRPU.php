<?php
include("connectdb.php");
include("function.php");
if(isset($_POST['POST_ID'])){
    $postid = validInput($_POST['POST_ID']);
    $userid = validInput($_POST['USER_ID']);
    try{
        $preparing = $conx->prepare('SELECT love FROM likepost WHERE post_id = ? AND user_id = ?');
        $preparing->execute(array($postid,$userid));
        $line = $preparing->fetch();
        if($line){
            $preparingRemoveLike = $conx->prepare('DELETE FROM likepost WHERE post_id = ? AND user_id = ?');
            $preparingRemoveLike->execute(array($postid,$userid));
            echo "now we delete row";
        }else{
            $like = "valid";
            $preparingLike = $conx->prepare("INSERT INTO likepost (post_id,user_id,love)
                                            VALUES(?,?,?)");
            $preparingLike->execute(array($postid,$userid,$like));   
            echo "we add the row";                            
        }
    }catch(Error){
        $like = "valid";
        $preparingLike = $conx->prepare("INSERT INTO likepost (post_id,user_id,love)
                                        VALUES(?,?,?)");
        $preparingLike->execute(array($postid,$userid,$like));   
        echo "we add the row";                            
        // $like = "valid";
        // $preparingLike = $conx->prepare("INSERT INTO likepost (post_id,user_id,love)
        //                                 VALUES(?,?,?)");
        // $preparingLike->execute(array($postid,$userid,$like));                               
        // echo "we add the row";                            
    }
}else{
    echo "failed to like this post";
}
?>