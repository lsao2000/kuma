<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:index.php');
    die();
} else {
    include("connectdb.php");
    include("chckSession.php");
    $_SESSION['PostId'] = $_POST['PostId']
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/navbar.css">
        <link rel="stylesheet" href="./css/showPostComment.css">
        <link rel="stylesheet" href="./boot/css/bootstrap.min.css">
        <title>Comment-Post</title>
    </head>

    <body>
        <?php include("navbar.php");?>
        <div class="post">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 col-md-2"></div>
                    <div class="col-9 col-md-7 card" id="cardPost">
                        <?php
                            $preparing = $conx->prepare('SELECT * FROM commentuser where post_id = ?');
                            $preparing->execute(array($_POST['PostId']));
                            while($line = $preparing->fetch()){
                                $username = selectByidDatabase($conx,'username',$line['user_id'],'users');
                                $image = selectByidDatabase($conx,'profile_picture',$line['user_id'],'users');
                        ?>
                            <div class="mt-3" id="comment">
                                <img src=<?="./imgdb/$username/profile/$image"?> alt="">
                                <div class="paragraph">
                                    <h6 class="ms-3 me-2 fw-bold"><?=$username?></h6>
                                    <p><?=$line['text_comment']?></p>
                                    <span id="date"><?=$line['date']?></span>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <div class="col-1 col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-2 col-md-2"></div>
                        <form action="RCIRP.php" method="post" class="col-9 col-md-7 formComment">
                            <input type="text" name="Postid" id="PostID" value="<?=$_SESSION['PostId']?>">
                            <input type="text" name="textComment" class="form-control">
                            <span>
                                <ion-icon name="send-outline" id="iconSubmit"></ion-icon>
                                <input type="submit" value=""  name="commentSubmit" class="submitComment">
                            </span>
                                
                        </form>
                    <div class="col-1 col-md-3"></div>
                </div>
            </div>
        </div>
        <script src="./js/navbar.js"></script>
    </body>

    </html>

<?php } ?>