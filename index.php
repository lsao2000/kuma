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
    <div  class="card">
        <video class="videoTrailer" controls >
            <source src="./video/kuma.mp4" >
            Your browser does not support the video tag.
        </video>
    </div>
    
    <p class="mt-4 display-6 ms-3 me-3" >
        Welcome to  <strong>Kuma</strong>, a vibrant and engaging social media platform designed to bring people together from all corners of the world. Kuma is a space where you can connect with friends, family, and like-minded individuals, fostering meaningful relationships and sharing captivating moments.
        With <strong>Kuma</strong>, we strive to create an inclusive and supportive community that celebrates diversity, encourages creativity, and inspires positive interactions. Whether you're an aspiring artist, a passionate storyteller, or simply looking to connect with others who share your interests, <strong>Kuma</strong> provides the perfect platform to express yourself and discover new perspectives.
        <ul>
            <li>
                Key Features of <strong>Kuma</strong>:
                <br>
                <span class="ms-2">
                    Profiles and Connections: Create your personalized profile, showcase your unique personality, and connect with friends and acquaintances. Discover new people who share your passions and expand your network.
                </span>
            </li>
            <li>
                News Feed:
                <br>
                <span class="ms-2">
                    Stay up-to-date with the latest updates from your connections. Engage with their posts through likes, comments, and shares, and let them know you appreciate their content.
                </span>
            </li>
            <li>
                Multimedia Sharing:
                <br>
                <span class="ms-2">
                    Share your favorite photos and videos to capture and relive cherished memories. Express your creativity through visual storytelling and ignite conversations around your passions.
                </span>

            </li>
            <li>
                Groups and Communities:
                <br>
                <span class="ms-2">
                    Join or create groups centered around your interests, hobbies, or causes. Engage in discussions, collaborate on projects, and find like-minded individuals who share your enthusiasm.
                </span>

            </li>
            <li>
                Privacy and Security:
                <br>
                <span class="ms-2">
                    We prioritize your privacy and provide robust security measures to ensure a safe and enjoyable experience on <strong>Kuma</strong>. You have control over your content visibility, friend requests, and personal information.
                </span>

            </li>
            <li>
                Discover and Explore:
                <br>
                <span class="ms-2">
                    Uncover new content, trends, and ideas through <strong>Kuma</strong>'s powerful discovery tools. Find inspiring creators, explore diverse communities, and broaden your horizons.
                </span>
            </li>
            <li>
                Events and Meetups:
                <br>
                <span class="ms-2" >
                    Stay informed about local and virtual events, gatherings, and meetups organized by the <strong>Kuma</strong> community. Connect with people face-to-face, forge meaningful relationships, and create unforgettable experiences.
                </span>
            </li>
            <br>
            Join <strong>Kuma</strong> today and embark on a journey of connection, discovery, and inspiration. Together, let's build a positive and vibrant online community where your voice matters and where you can share your passions with the world.
        </ul>
    </p>
    <div class="container-fluid">
        <div class="row mt-5 mb-2">
            <div class="col-12 col-sm-6">
                <div class="card" id="card1">
                    <img  src="./imageAnimation/screen1.png" id="cardImage" alt="">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="ms-2">Post page</h3>
                <p class="ms-2">see the last post of your compte</p>
                <p class="ms-2">respond to the comment of your post</p>
                <p class="ms-2">see who likes to your post</p>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <?php  include("copyRight.php")?>
    <script src="./js/index.js"></script>
</body>
</html>
<?php
}
?>