<?php
session_start();
if (isset($_SESSION['username'])){
    header("Location:profile.php");
    die();
}else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="signup.php">Register</a>
    <a href="login.php">sign in</a>
</body>
</html>
<?php
}
?>