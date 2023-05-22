<?php
session_start();
if (!isset($_SESSION['username'])){
    header('location:index.php');
    die();
}else{
    include("chckSession.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/post.css">
    <title>Post</title>
</head>
<body>
    <?php include("navbar.php")?>
    <div >
        <img src="<?=$src?>" height="400" id="imgProfile" class="col-12" alt="">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 col-md-2"></div>
            <div class="col-8 col-md-8">
                <div class="card publish mt-5 mb-4">
                    <form action="registrationPost.php" method="post" enctype="multipart/form-data">
                        <p id="error" class="ms-3"></p>
                        <img src="" class="w-100 mt-2 mb-2 rounded rounded-3" id="imagepost" alt="">
                        <div class="mt-1 d-flex" id="divFatherPost">
                            <input class="form-control" type="text" name="textpost" id="text">
                            <div class="divFile">
                                <img src="imageAnimation/camera.png" id="imageFile" alt="">
                                <input class="form-control" type="file" name="imagepost" id="file">
                            </div>
                        </div>
                        <div class="mt-2 w-25 mx-auto mb-2">
                            <input type="submit" id="btnPublish" name="posting" value="publish">
                        </div>
                    </form>
                </div>
                <?php
                $preparingGetPost = $conx->prepare('SELECT * FROM postuser where user_id = ?');
                $preparingGetPost->execute(array($id));
                while ($line = $preparingGetPost->fetch()){
                    ?>
                        <div class="card mb-2" id="card">
                            <div class="divHeadPost">
                                <span class="ms-2"><img src="<?=$src?>" class="mt-2 me-2 " id="imageIcon" alt=""><?="<p class='fw-bold'>$username</p>"?></span>
                                <p class="mt-3 text-secondary me-2"><?=$line['date']?></p>
                            </div>
                            <h6 class="ms-2" id="textPost"><?=$line['text_post'];?></h6>
                            <img src="imgdb/<?="$username/post/".$line['name_img']?>" class="col-12" alt="">
                            <hr>
                            <div class="divFooterPost p-1">
                                <button><img src="./imageAnimation/heartnoclick.png" width="30" class="like" id="like" alt=""></button>
                                <form action="showPostComment.php" method="post">
                                    <input type="text" name="PostId" class="commentsPost" value="<?= $line['id']?>">
                                    <input type="submit" value="" id="comment">
                                </form>
                                <button><img src="./imageAnimation/share.png" id="share" alt=""></button>
                            </div>
                            <form action="registrationComment.php" method="post" class="formComment">
                                <input type="text" name="Postid" id="PostID" value="<?=$line['id']?>">
                                <input type="text" name="textComment" class="form-control">
                                <span>
                                    <ion-icon name="send-outline" id="iconSubmit"></ion-icon>
                                    <input type="submit" value=""  name="commentSubmit" class="submitComment">
                                </span>
                            </form>
                        </div>
                    <?php 
                        };
                        if (isset($_SESSION['msg'])){
                            echo "<script>error.textContent =  '$_SESSION[msg]' </script>";
                        }
                    ?>
            </div>
            <div class="col-2 col-md-2"></div>
        </div>
    </div>
    <script src="./js/navbar.js"></script>
    <script src="./js/post.js"></script>
</body>
</html>
<?php 
}
?>