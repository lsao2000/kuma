<?php


?>

<nav class="navbar bg-light navbar-dark fixed-top">
        <div>
            <h1><a href="home.php" class="brand">Kuma</a></h1>
        </div>
        <div class="toggle" id="toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <img src="<?=$src?>" id="profile" alt="">
        </div>
</nav>
    
    <div class="offcanvas offcanvas-end navbar-left  px-0 w-25" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" >
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <ul>
            <li><a href="editProfile.php">profile</a></li>
            <li><a href="">Group</a></li>
            <li><a href="">Parameter</a></li>
            <li><a href="">freind</a></li>
            <li><a href="post.php">post</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>