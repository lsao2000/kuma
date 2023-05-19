<?php
$user = "root";
$host = "localhost";
$database = "kuma";
$password = "2000@SKAIHlahcen";
try{
    $conx = new PDO("mysql:host=$host;dbname=$database",$user,$password);

}catch (Exception $e){
    echo "<h1 style='text-align:center'>connection with data has been failed!!</h1>";
    die();
}

?>