<?php 
session_start();
if (isset($_SESSION['username'])){
    header("Location:profile.php");
    die();
}else{
include("connectdb.php");
include("function.php");

// This for display a message if one of this variable are inccorect 
$firstnameErr = $lastnameErr = $usernameErr = $phoneErr = $emailErr = $pwdErr  = "" ;
// This for succes registration if all data are valid
$firstnameValid = "";
$lastnameValid = "";
$usernameValid = "";
$phoneValid = "";
$emailValid = "";
$pwdValid = "";
// This for display a message in the placeholder of the input if the given data are already exist
$firstnamePlaceholder = "Ex: Jhon";
$lastnamePlaceholder = "Ex: Wick";
$usernamePlaceholder = "EX: JhonWick";
$phonePlaceholder = "Ex: +212603030302";
$emailPlaceholder = "Ex: user@gmail.com";
$pwdPlaceholder = "Ex: 12g45LM6";
// This for data that are we send in our database if all data are valid and create new user with this data
$firstname = $lastname = $username = $phone = $email = $pwd = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (empty($_POST['firstname'])){
        styling('firstname');
        $firstnameErr = "Please fill this box";
    }else{
        $firstname = validInput($_POST['firstname']);
        if (!preg_match("/^[a-zA-Z]*$/",$_POST['firstname'])){
            styling('firstname');
            $firstnamePlaceholder = "this must be have just alphbet";
        }else{
            $firstnameValid = 'valid';
        }
    }
    if (empty($_POST['lastname'])){
        styling('lastname');
        $lastnameErr = "Please fill this box";
    }else{
        $lastname = validInput($_POST['lastname']);
        if (!preg_match("/^[a-zA-Z]*$/",$lastname)){
            styling('lastname');
            $lastnamePlaceholder = 'this must be have just alphbet';
        }else {
            $lastnameValid = 'valid';
        }
    }
    if (empty($_POST['username'])){
        styling('username');
        $usernameErr = 'Please fill this box';
    }else{
        $username = validInput($_POST['username']);
        if (!preg_match("/^[a-zA-Z]*$/",$username)){
            styling('username');
            $usernamePlaceholder = "this must be just alphabet";
        }else{
            // This is for checking if the username is already exist in our database
            $requiring = $conx->prepare("SELECT username FROM users");
            $requiring->execute();
            $usernameValid = "valid";
            while($line = $requiring->fetch()){
                if ($line['username'] === $username){
                    $usernameValid = "";
                    styling('username');
                    $usernamePlaceholder = "Already Exist";
                    break;
                }
            }
        }
    }
    if (empty($_POST['phone'])){
        styling('phone');
        $phoneErr = "Please fill this box";
    }else{
        $phone = htmlspecialchars($_POST['phone']);
        if (!preg_match("/^[0-9-+]*$/",$phone)){
            styling('phone');
            $phonePlaceholder = "This must be number phone";
        }else{
            $phoneValid = "valid";
        }
    }
    if (empty($_POST['email'])){
        styling('email');
        $emailErr = "Please fill this box";
    }else{
        $email = validInput($_POST['email']);
        // checking if the type of input email is email addresse
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            styling('email');
            $emailPlaceholder = "The email addresse is incorrect";
        }
        else{
            // This for checking if the email is already exist in our database
            $requiring = $conx->prepare("SELECT email FROM users");
            $requiring->execute();
            $emailValid = "valid";
            while($line = $requiring->fetch()){
                if ($email === $line['email'] ){
                    $emailValid = "";
                    styling('email');
                    $emailPlaceholder = "Already Exist";
                    break;
                }
                
            }
        }
    }
    // checking if the password are empty or not
    if (empty($_POST['pwd'])){
        styling('pwd');
        $pwdErr = "Please fill this box";
    }else{
        $pwd = validInput($_POST['pwd']);
        if (!preg_match("/^[a-zA-Z]*$/",$pwd)){
            styling('pwd');
            $pwdErr = "<h6 style='font-size:13px;'>[a-z]: must have at least 1</h6>
                        <h6 style='font-size:13px;'>[A-Z]: must have at least 1</h6>";
        }
        else{
            $pwdValid = "valid";
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
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="boot/css/bootstrap.min.css">
    <title>Kuma</title>
</head>
<body>
    <div class="container-fuild">
        <div class="row mt-5 ms-md-5 ms-2 me-2">
            <div class="col-10 ms-3 col-md-5 brandescription">
                <h1 class="brand">Kuma</h1>
                <p>K: <span>know the last posts of your freind</span></p>
                <p>U: <span>Make your compte in our world</span></p>
                <p>M: <span>Use our services </span></p>
                <p>A: <span>Add post in your profile</span></p>
            </div>
            <div class="col-12 col-md-6">
                <div class="card mt-5" id="card">
                    <h1 class="text-center display-5">Signup</h1>
                    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="mt-5 ms-2 me-2">
                        <div class="mt-2 mb-3">
                            <label for="firstname" class="fw-bold">Firstname</label>
                            <input type="text" name="firstname" placeholder="<?= $firstnamePlaceholder?>" class="form-control" id="firstname">
                            <h6 class="error"><?=$firstnameErr?></h6>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="fw-bold">Lastname</label>
                            <input type="text" name="lastname" placeholder="<?= $lastnamePlaceholder?>" class="form-control" id="lastname">
                            <h6 class="error"><?=$lastnameErr?></h6>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="fw-bold">Username</label>
                            <input type="text" name="username" placeholder="<?= $usernamePlaceholder?>" class="form-control" id="username">
                            <h6 class="error"><?=$usernameErr?></h6>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="fw-bold">Phone</label>
                            <input type="tel"  name="phone" placeholder="<?= $phonePlaceholder?>" class="form-control" id="phone">
                            <h6 class="error"><?=$phoneErr?></h6>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="fw-bold">Email</label>
                            <input type="text" name="email" placeholder="<?= $emailPlaceholder?>" class="form-control" id="email">
                            <h6 class="error"><?=$emailErr?></h6>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="fw-bold">Password</label>
                            <input type="password" name="pwd" placeholder="<?= $pwdPlaceholder?>" class="form-control" id="pwd">
                            <h6 class="error"><?=$pwdErr?></h6>
                        </div>
                        <div class="w-25 mb-3 mx-auto text-center">
                            <input type="submit" class="btn1" value="Signup">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/signup.js"></script>
    <?php 
        displayInInput($firstname,'firstname',$firstnameValid);
        displayInInput($lastname,'lastname',$lastnameValid);
        displayInInput($username,'username',$usernameValid);
        displayInInput($phone,'phone',$phoneValid);
        displayInInput($email,'email',$emailValid);
        if ($firstnameValid === 'valid' && $lastnameValid === "valid" && $usernameValid === "valid" && $phoneValid === "valid" && $emailValid === "valid" && $pwdValid === "valid"){
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['pwd'] = $pwd;
            $_SESSION['phone'] = $phone;
            header("Location:registrationValid.php");
            die();
        }else{

        }
    ?>
</body>
</html>
<?php }?>