<?php
include($_SERVER["DOCUMENT_ROOT"] . "/core/database/connectionapi.php");
header("Content-Security-Policy: default-src 'self' monosoftware.one *.monosoftware.one");
header("X-XSS-Protection: 1; mode=block");
header("Allow: GET, POST");
header_remove("x-powered-by");
header("Content-Length: 1337", true);
header_remove("server");
header_remove("x-turbo-charged-by");
header("developer: WhistleDev"); // Under the GNU GENERAL PUBLIC LICENSE Version 3 License, this is part of the copyright notice, you must not remove this copyright or legal action will be taken.
if(!isset($_GET["api"])){
    header_remove("server");
    header_remove("x-powered-by");
    header_remove("x-turbo-charged-by");
    header("developer: WhistleDev"); 
    echo "<code>Cannot /GET</code></br>";
    echo "<code>Reason: Permission denied.</code>";
    echo "<script>setTimeout(() => {  console.log(\"Access Denied to Overlord System.\"); }, 1000);</script>";
}
else if($_GET["api"] != "0.4"){
    header_remove("server");
    header_remove("x-powered-by");
    header_remove("x-turbo-charged-by");
    header("developer: WhistleDev"); // Under the GNU GENERAL PUBLIC LICENSE Version 3 License, this is part of the copyright notice, you must not remove this copyright or legal action will be taken.
    echo "<code>Cannot /GET</code></br>";
    echo "<code>Reason: API Version Incorrect.</code>";
    echo "<script>setTimeout(() => {  console.log(\"Access Denied to Overlord System.\"); }, 1000);</script>";
}
else{
    
}
?>