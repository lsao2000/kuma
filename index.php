<?php
session_start();
if (isset($_SESSION['username'])){
    header("Location:home.php");
    die();
}else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/copyRight.css">
    <title>Document</title>
</head>
<body>
    <nav id="nav" class="bg-light navbar-dark fixed-top">
        <div id="divBrand">
            <h1><a href="index.php">kuma</a></h1>
        </div>
        <div>
            <ul class="nav-ul">
                <li><a href="login.php">login</a></li>
                <li><a href="signup.php">signup</a></li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <div id="video" class="card">
        <video class="videoTrailer" controls >
            <source src="./video/kuma.mp4" >
        </video>
    </div>
    <div class="container-fluid">
        <div class="row mt-5 cards" id="card1">
            <div class="col-0 col-sm-1"></div>
            <div class="col-11 p-5 ms-3 me-3 col-sm-4">
            <span>Welcome to <strong>Kuma</strong></span> a vibrant and engaging social media platform designed to bring people together from all corners of the world. Kuma is a space where you can connect with friends, family, and like-minded individuals, fostering meaningful relationships and sharing captivating moments.
            </div>
            <div class="col-0 col-sm-1"></div>
            <div class="col-11 ms-3 me-3 col-sm-4 div1" id="imageCard"></div>
            <div class="col-0 col-sm-2"></div>
        </div>
        <div class="row mt-5 cards" id="card2">
            <div class="col-0 col-sm-1"></div>
            <div class="col-11 ms-3 me-3 col-sm-4 div2" id="imageCard"></div>
            <div class="col-0 col-sm-1"></div>
            <div class="col-11 p-5 ms-3 me-3 col-sm-4 mt-3">
                With <strong>Kuma</strong> we strive to create an inclusive and supportive community that celebrates diversity, encourages creativity, and inspires positive interactions. Whether you're an aspiring artist, a passionate storyteller, or simply looking to connect with others who share your interests, <strong>Kuma</strong> provides the perfect platform to express yourself and discover new perspectives.
            </div>
            <div class="col-0 col-sm-2"></div>
        </div>
        <div class="row mt-5 cards" id="card3">
            <div class="col-0 col-sm-1"></div>
            <div class="col-11 ms-3 me-3 col-sm-4 p-5 ">
                <span>Join <strong>Kuma</strong></span> today and embark on a journey of connection, discovery, and inspiration. Together, let's build a positive and vibrant online community where your voice matters and where you can share your passions with the world.
            </div>
            <div class="col-0 col-sm-1"></div>
            <div class="col-11 ms-3 me-3 col-sm-4 div3" id="imageCard"></div>
            <div class="col-0 col-sm-2"></div>
        </div>
        <div class="row mt-5 cards" id="card4">
            <div class="col-0 col-sm-1"></div>
            <div class="col-11 ms-3 me-3 col-sm-4 div4" id="imageCard"></div>
            <div class="col-0 col-sm-1"></div>
            <div class="col-11 ms-3 me-3 col-sm-4 p-5 ">
                Stay up-to-date with the latest updates from your connections. Engage with their posts through likes, comments, and shares, and let them know you appreciate their content.
            </div>
            <div class="col-0 col-sm-2"></div>
        </div>
        <div class="row mt-5 cards" id="card5">
            <div class="col-0 col-sm-1"></div>
            <div class="col-11 ms-3 me-3 col-sm-4 p-5 ">
                <span class="fw-bold">Privacy and Security :</span>
                <br>
                We prioritize your privacy and provide robust security measures to ensure a safe and enjoyable experience on <strong>Kuma</strong>. You have control over your content visibility, friend requests, and personal information.
            </div>
            <div class="col-0 col-sm-1"></div>
            <div class="col-11 ms-3 me-3 col-sm-4 div5" id="imageCard"></div>
            <div class="col-0 col-sm-2"></div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <?php include("copyRight.php")?>
    <script src="./js/copyRight.js"></script>
    <script src="./js/index.js"></script>
</body>
</html>
<?php
}
?>