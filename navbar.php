<?php


?>
<div class="sidebar">
    <ul>
        <li class="logo">
            <a href="home.php">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="text">Kuma</span>
            </a>
        </li>
        <li>
            <a href="editProfile.php">
                <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                <span class="text">Profile</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span>
                <span class="text">Group</span>
            </a>
        </li>
        <li>
            <a href="parameter.php">
                <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                <span class="text">Parameter</span>
            </a>
        </li>
        <li>
            <a href="freind.php">
                <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                <span class="text">Freind</span>
            </a>
        </li>
        <li>
            <a href="post.php">
                <span class="icon"><ion-icon name="duplicate-outline"></ion-icon></span>
                <span class="text">Post</span>
            </a>
        </li>
        <div class="bottom">
            <li>
                <a href="#">
                    <span class="icon">
                        <div class="image">
                            <img src="<?=$src?>" alt="">
                        </div>
                    </span>
                    <span class="text"><?=$username?></span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="text">Logout</span>
                </a>
            </li>
        </div>
            
    </ul>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>