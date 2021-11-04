<?php
include($_SERVER["DOCUMENT_ROOT"] . "/core/database/connectionapi.php");

header('Content-Type: application/json');
if(isset($_GET["username"]) || isset($_GET["password"]) || isset($_GET["hwid"])){
    $ol_username = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_GET["username"]."';");
    $row_username = mysqli_fetch_assoc($ol_username);
    $ol_password = mysqli_query($conn, "SELECT password FROM users WHERE username = '".$_GET["username"]."';");
    $ol_hwid = mysqli_query($conn, "SELECT hwid FROM users WHERE username = '".$_GET["username"]."';");
    $ol_ip = mysqli_query($conn, "SELECT ip FROM users WHERE username = '".$_GET["username"]."';");
    $ol_ouid = mysqli_query($conn, "SELECT ouid FROM users WHERE username = '".$_GET["username"]."';");

    if($_GET["username"] == $row_username["username"]){
        if(password_verify($_GET["password"], $ol_password->fetch_row()[0])){
            if(IPCheck($_SERVER['REMOTE_ADDR'], $ol_ip->fetch_row()[0], $conn)){
                if(HWIDCheck($_GET["hwid"], $ol_hwid->fetch_row()[0], $conn)){
                    $arry = array('login_token' => 'success', 'details' => ['ouid' => $ol_ouid->fetch_row()[0], 'username' => $_GET["username"]]);
                    echo json_encode($arry, JSON_PRETTY_PRINT);
                }
                else{
                    $arry = array('login_token' => 'error_hwid_mismatch');
                    echo json_encode($arry, JSON_PRETTY_PRINT);
                }
            }
            else{
                $arry = array('login_token' => 'error_ip_mismatch');
                echo json_encode($arry, JSON_PRETTY_PRINT);
            }
        }
        else{
            $arry = array('login_token' => 'error_password_mismatch');
            echo json_encode($arry, JSON_PRETTY_PRINT);
        }
    }
    else{
        $arry = array('login_token' => 'error_invalid_username');
        echo json_encode($arry, JSON_PRETTY_PRINT);
    }
}
else{
    $arry = array('login_token' => 'invalid request');
    echo json_encode($arry, JSON_PRETTY_PRINT);
}

function IPCheck($user, $ip, $connsql){
    $query_check_locked = mysqli_query($connsql, "SELECT ip_locked FROM users WHERE username = '".$user."';");
    $query_check_compare = mysqli_query($connsql, "SELECT ip FROM users WHERE username = '".$user."';");
    if($query_check_locked->fetch_row()[0] == 1){
        if(strcmp($ip, $query_check_compare->fetch_row()[0])){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return true;
    }
}

function HWIDCheck($user, $HWID, $connsql){
    $query_check_locked = mysqli_query($connsql, "SELECT hwid_locked FROM users WHERE username = '".$user."';");
    $query_check_compare = mysqli_query($connsql, "SELECT hwid FROM users WHERE username = '".$user."';");
    if($query_check_locked->fetch_row()[0] == 1){
        if(strcmp($HWID, $query_check_compare->fetch_row()[0])){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return true;
    }
}


?>