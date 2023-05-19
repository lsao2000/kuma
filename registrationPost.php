<?php
session_start();
include("function.php");
include("connectdb.php");
$textpost = validInput($_POST['textpost']);
$username = selectDatabase($conx,'username',$_SESSION['username'],'users');
$id = selectDatabase($conx,'id',$username,'users');
if (empty($textpost) && empty($_FILES['imagepost']['name'])){
    $_SESSION['msg'] = "<script> 'add an image or text to post</script>";
}
if (empty($_FILES['imagepost']['name']) ){
    $imagepostName = "";
    $imagepostTmp = "";
}else{
    $imagepostName = $_FILES['imagepost']['name'];
    $imagepostTmp = $_FILES['imagepost']['tmp_name'];     
}
if(!empty($textpost) || !empty($_FILES['imagepost']['name'])){
    $_SESSION['msg'] = "";
    if(!is_dir("imgdb/$username/post")){
        mkdir("imgdb/$username/post");
    }
    move_uploaded_file($imagepostTmp,"imgdb/$username/post/$imagepostName");
    $preparingPost = $conx->prepare("INSERT INTO postuser (text_post,name_img,tmp_img,user_id,date) VALUES (?,?,?,?,?)");
    $preparingPost->execute(array($textpost,$imagepostName,$imagepostTmp,$id,date('Y-m-d')));
}
header("location:post.php");
die()
?>