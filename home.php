<?php
session_start();
if (!isset($_SESSION['username'])){
    header("location:index.php");
    die();
}else{
    include("connectdb.php");
    include("function.php");
    $username = selectDatabase($conx,'username',$_SESSION['username'],'users');
    $name_img = selectDatabase($conx,"profile_picture",$username,'users');
    $tmpName = selectDatabase($conx,"tmp_name",$username,'users');
    if ($tmpName === "" || $tmpName == NULL){
        $src = "imgdb/default/".selectDatabase($conx,'profile_picture',$username,'users');}
    else{ $src = "imgdb/$username/profile/$name_img"; }
}
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/copyRight.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <title>Profile</title>
</head>
<body>
    <?php include("navbar.php")?>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-7 ">
                <div class="card" id="navbarHome">
                    <div class="navHome">
                        <button id="homePost"></button>
                        <button id="homeFreind"></button>
                        <button id="homeMessage"></button>
                    </div>
                </div>
                <div id="post">
                    <?php
                    $user_id = selectDatabase($conx,'id',$_SESSION['username'],'users');
                    $preparing = $conx->prepare("SELECT * FROM postuser");
                    $preparing->execute();
                    while($line = $preparing->fetch()){
                        $name = selectByidDatabase($conx,'username',$line['user_id'],'users');
                        $imgProfilePost = selectByidDatabase($conx,'profile_picture',$line['user_id'],'users');
                    ?>
                    <div class="card mt-3 mb-2">
                        <div id="headerPost">
                            <span>
                                <img id="imgProfilePosting" src=<?="./imgdb/$name/profile/$imgProfilePost"?> alt="">
                                <p class="fw-bold"><?=$name?></p>
                            </span>
                            <p class="text-secondary" id="datepost"><?=$line['date']?></p>
                        </div>
                        <h6 id="textPost"><?=$line['text_post']?></h6>
                        <img src=<?="./imgdb/$name/post/$line[name_img]"?> id="imgPost" alt="">
                        <hr>
                        <div class="footerbtn p-1">
                            <input type="text" name="" class="POST_ID" value="<?=$line['id']?>" id="">
                            <input type="text" name="" class="USER_ID" value="<?=$user_id?>" id="">
                            <button class="btnLike"><img src=<?=imgBtnLike($conx,$line['id'],$user_id)?> class="like"  alt=""></button>
                            <form action="DRPC.php" method="post">
                                <input type="text" name="PostId" id="postId" value="<?= $line['id']?>">
                                <input type="submit" value="" id="comment">
                            </form>
                            <button><img src="./imageAnimation/share.png" id="share" alt=""></button>
                        </div>
                        <form action="commentPost.php" class="formComment" method="post">
                            <input type="text" name="postId" id="postId" value="<?= $line['id']?>">
                            <input type="text" name="textComment" class="form-control" id="textComment">
                            <span>
                                <ion-icon name="send-outline" id="iconSubmit"></ion-icon>
                                <input type="submit" value="" id="submitComment" name="submit">
                            </span>
                        </form>
                    </div>
                    <?php }?>
                </div>
                <div id="freind">
                    <?php
                        $id = selectDatabase($conx,'id',$_SESSION['username'],'users');
                        $preparingFreind = $conx->prepare("SELECT * FROM freind WHERE user_id = ?");
                        $preparingFreind->execute(array($id));
                        $freind = [];
                        // echo $freind;
                        while($line = $preparingFreind->fetch()){
                            array_push($freind,$line['freind_id']);
                        };
                        $freind;
                        $preparingUser = $conx->prepare("SELECT * FROM users");
                        $preparingUser->execute();
                        while($line = $preparingUser->fetch()){
                            if ($line['id'] !== $id){
                        ?>
                            <div id="divFreind" class="mt-2">
                                <span id="infoFreind">
                                    <img src=<?="./imgdb/$line[username]/profile/$line[profile_picture]"?> id="imgProfileFreind" alt="">
                                    <p class="fw-bold" id="nameFreind"><?=$line['username']?></p>
                                </span>
                                <form action="AddFreind.php" method="post">
                                    <input type="text" name="FreindID" value="<?=$line['id']?>" id="idFreind">
                                    <?php
                                    if (in_array($line['id'],$freind)){
                                    ?>
                                        <input type="submit" name="removeFreind" id="removeFreind" value="">
                                    <?php }else{ ?>
                                        <input type="submit" name="addFreind" id="addFreind" value="">
                                    <?php } ?>
                                </form>
                            </div>
                        <?php } } ?>
                </div>
                <div id="divMessageParent">
                    <div id="message">
                        <div id="freindList">
                        <?php
                        $id = selectDatabase($conx,'id',$_SESSION['username'],'users');
                        $preparingFreind = $conx->prepare("SELECT * FROM freind WHERE user_id = ?");
                        $preparingFreind->execute(array($id));
                        try{
                            $isFreind = selectfreindInTable($conx,'freind_id',$id,'freind');
                            echo "<p id='checkIsFreind'>freind</p>";
                            
                        }catch(PDOException){
                            echo "<p id='checkIsFreind'></p>";
                        }
                        while($line = $preparingFreind->fetch()){
                            $nameFreind = selectByidDatabase($conx,'username',$line['freind_id'],'users');
                            $imgsrc = selectByidDatabase($conx,'profile_picture',$line['freind_id'],'users');
                        ?>
                            <button id="showMessage" class="freind">
                                <img src=<?="./imgdb/$nameFreind/profile/$imgsrc"?> id="freindImg" alt="">
                            </button>
                            <?php } ?>
                        </div>
                    </div>
                    <?php 
                        $id = selectDatabase($conx,'id',$_SESSION['username'],'users');
                        $preparingFreind = $conx->prepare("SELECT * FROM freind WHERE user_id = ?");
                        $preparingFreind->execute(array($id));
                        while($line = $preparingFreind->fetch()){
                            $nameFreind = selectByidDatabase($conx,'username',$line['freind_id'],'users');
                            $imgsrc = selectByidDatabase($conx,'profile_picture',$line['freind_id'],'users');
                    ?>
                            <div id="chatFreind" class="card mt-2 chatFreind">
                                <div class="card-header" id="chatHeader">
                                    <img src=<?="./imgdb/$nameFreind/profile/$imgsrc"?> alt="" id="chatFreindImg">
                                    <p id="nameChatFreind"><?=$nameFreind?></p>
                                </div>
                                <div class="card-body" id="chatBody">
                                    
                                    </div>
                                    <div class="card-footer" id="footerChat">
                                        <form  id="Sendmessage">
                                            <input type="text" name="freindid" value="<?=$line['freind_id']?>" id="freindid">
                                            <input type="text" name="senderId" id="senderId" value="<?=$id?>">
                                            <input type="text" name="sendername" id="sendername" value="<?=$username?>">
                                            <div id="divSubmitMessage">
                                                <input type="text" class="form-control" name="textMessage" id="textmessage">
                                                <input type="submit" id="submitMessage" value="">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php }?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <?php
        include("copyRight.php")
    ?>
    <script src="./js/copyRight.js"></script>
    <script src="./js/navbar.js"></script>
    <script src="./js/home.js"></script>
</body>
</html>