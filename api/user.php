<?php
include($_SERVER["DOCUMENT_ROOT"] . "/core/database/connectionapi.php");
if(isset($_GET["username"]) || isset($_GET["password"]) || isset($_GET["hwid"])){
    $escape_passw = $_GET["password"];
    $passw = password_hash($escape_passw, PASSWORD_BCRYPT);
    $check_registered_users = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_GET["username"]."';");
    $results_registered = mysqli_fetch_assoc($check_registered_users);

    if(strtolower($results_registered["username"]) === strtolower($_GET["username"])){
        die("USER_ALREADY_EXISTS");
    }
    else{
        $insert_user = mysqli_query($conn, "INSERT INTO users SET ouid = '".GenerateOUID()."', username = '". addslashes($_GET["username"]) . "', password = '". $passw ."', hwid = '". $_GET["hwid"] ."', ip = '". $_SERVER['REMOTE_ADDR'] ."';");
        if($insert_user){
            echo "OK";
        }
        else{
            die(mysqli_error($conn));
        }
    }
    
    
}
else{
    http_response_code(401);
}

function GenerateOUID(){
    //date("d/m/y") .".". date("H:i")
    //hash("sha256", )
    return hash("sha256", $_GET["username"]) . "." . hash("sha256", date("d/m/y")) . "." . hash("sha256", date("H:i"));
}
?>