<?php 

// This function for test validation of input
function validInput($name){
    $valid1 = trim($name);
    $valid2 = stripslashes($valid1);
    $valid3 = htmlspecialchars($valid2);
    return $valid3;
}
 
function styling($id){
    echo "<style>#$id{border: 1px solid red;}</style>";
}


function removeStyling($id){
    echo "<style>#$id{border:none;}</style>";
}

// This function for display the variable if it is valid
function displayInInput($variable,$idInput,$validInput){
    if ($validInput === "valid"){
        echo "<script>$idInput.value = '$variable' </script>";
    }else if($validInput === ""){
        echo "<script>$idInput.value = '' </script>";
    }
}

// using this function to insert data in our database
function insertIntoDatabase($conx,$var1,$var2,$var3,$var4,$var5,$var6,$var7){
    $quiring = $conx->prepare("INSERT INTO users(firstname,lastname,username,phone,email,password,profile_picture)
                                VALUES(?,?,?,?,?,?,?)");
    $quiring->execute(array($var1,$var2,$var3,$var4,$var5,$var6,$var7));
}

// using this function to select data from database
function selectDatabase($conx,$column,$username,$table){
    $preparing = $conx->prepare("SELECT $column FROM $table WHERE username = ?");
    $preparing->execute(array($username));
    $line = $preparing->fetch();
    return $line["$column"];
}
function selectByidDatabase($conx,$column,$id,$table){
    $preparing = $conx->prepare("SELECT $column FROM $table WHERE id = ?");
    $preparing->execute(array($id));
    $line = $preparing->fetch();
    return $line["$column"];
}
function selectfreindInTable($conx,$column,$id,$table){
    $list_freind = [];
    $preparing = $conx->prepare("SELECT $column FROM $table WHERE user_id = ?");
    $preparing->execute(array($id));
    while($line = $preparing->fetch()){
        array_push($list_freind,$line[$column]);
    }
    return $list_freind;
}


?>