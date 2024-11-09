<?php
session_start();
 if((isset($_SESSION["email"]) && isset($_SESSION["password"])) ) {

$myemail = $_SESSION['email'];
// $myvataor = $_SESSION['avator'];

}else{

header("location:../user/page-login.php");

}

?>