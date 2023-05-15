<?php
session_start();
if (!isset($_SESSION['username'])){
    header('location:index.php');
    die();
}else{
    include("connectdb.php");
    include("function.php");
    $username = selectDatabase($conx,'username',$_SESSION['username'],'users');
    $name_img = selectDatabase($conx,"profile_picture",$username,'users');
    $tmpName = selectDatabase($conx,"tmp_name",$username,'users');
    if ($tmpName === "" || $tmpName == NULL){
        $src = "imgdb/".selectDatabase($conx,'profile_picture',$username,'users');
    }else{
        $src = "imgdb/$username/profile/$name_img";
    }
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
        <img src="<?=$src?>" id="imgProfile" class="col-12" alt="">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 col-md-2"></div>
            <div class="col-8 col-md-8">
                <div class="card publish mt-5 mb-4">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mt-1 d-flex" id="divFatherPost">
                            <input class="form-control" type="text" name="" id="text">
                            <div class="divFile">
                                <img src="imageAnimation/camera.png" id="imageFile" alt="">
                                <input class="form-control" type="file" name="" id="file">
                            </div>
                        </div>
                        <div class="mt-2 w-25 mx-auto mb-2">
                            <input type="submit" id="btnPublish" value="publish">
                        </div>
                    </form>
                </div>
                <div class="card mb-2" id="card">
                    <div class="divHeadPost">
                        <span class="ms-2"><img src="<?=$src?>" class="mt-2 me-2 " id="imageIcon" alt=""><?="<p class='fw-bold'>$username</p>"?></span>
                        <p class="mt-3 text-secondary me-2"><?php echo Date('Y-m-d')?></p>
                    </div>
                    <h6 class="ms-2" id="textPost">bank card hhh👼👼</h6>
                    <img src="<?=$src?>" class="col-12" alt="">
                    <div class="divFooterPost p-1">
                        <button><img src="./imageAnimation/heartnoclick.png" id="like" alt=""></button>
                        <button ><img src="./imageAnimation/comment.png" id="comment" alt=""></button>
                        <button ><img src="./imageAnimation/share.png" id="share" alt=""></button>
                    </div>
                    
                </div>
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