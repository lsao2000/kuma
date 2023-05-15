<?php
session_start();
if (isset($_SESSION['username'])){
    header("location:home.php");
    die();
}else{ 
    include("connectdb.php");
    include("function.php");
    $pwd = $username = "";
    $pwdValid = $usernameValid = "";
    // plceholder some text that can help user to identify their information
    $pwdPlaceholder = "Ex:234kd55l";
    $usernamePlaceholder = "Ex:JhonWick";
    $pwdUsernameErr = "";
    if ($_SERVER['REQUEST_METHOD'] === "POST"){
        if (empty($_POST['username'])){
            styling('username');
            $usernamePlaceholder = "Please fill this box";
        }else{
            $username = validInput($_POST['username']);
            $preparing = $conx->prepare("SELECT username from users");
            $preparing->execute();
            while($line = $preparing->fetch()){
                styling('username');
                $usernamePlaceholder = "User not exist";
                if ($line['username'] === $username){
                    $usernamePlaceholder = "Ex:JhonWick";
                    $usernameValid = "valid";
                    removeStyling('username');
                    break;
                }
            }
        }
        if (empty($_POST['pwd'])){
            styling('pwd');
            $pwdPlaceholder = "Please fill this box";
        }else{
            $pwd = validInput($_POST['pwd']);
            if ($usernameValid == "valid"){
                $preparing = $conx->prepare("SELECT username,password FROM users where username = ?");
                $preparing->execute(array($username));
                while ($line = $preparing->fetch()){
                    if($line['password'] === $pwd){
                        $pwdValid = "valid";
                    }else{
                        $pwdPlaceholder = "Password Incorrect";
                        styling('pwd');
                    }
                }
            }else{
                styling('pwd');
                $usernamePlaceholder = "Ex:JhonWick";
                $pwdPlaceholder = "Ex:234kd55l";
                $pwdUsernameErr = "Username or Password is incorrect";
            }
        }
        
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body>
    <h1 id="kuma" class="text-center mt-5">kuma</h1>
    <div class="card w-50 mx-auto">
        <form action="" method="post">
            <h1 class="display-2 text-center mb-5">Login</h1>
            <h6 class="Error"><?=$pwdUsernameErr?></h6>
            <div class="fw-bold mt-3 ms-2 me-2">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="<?=$usernamePlaceholder?>" id="username" class="form-control">
            </div>
            <div class="fw-bold mt-3 ms-2 me-2">
                <label for="password">Password</label>
                <input type="password" id="pwd" name="pwd" placeholder="<?=$pwdPlaceholder?>" class="form-control">
            </div>
            <div class="mt-4 mb-4" id="divbtn">
                <input type="submit" value="login" class="btn1">
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <script src="./js/login.js"></script>
    <?php
    displayInInput($username,'username',$usernameValid);
    if($pwdValid === "valid" && $usernameValid === "valid"){
        $_SESSION['pwd'] = $pwd;
        $_SESSION['username'] = $username;
        header("Location:home.php");
        die();
    }
    ?>
</body>
</html>
<?php }?>