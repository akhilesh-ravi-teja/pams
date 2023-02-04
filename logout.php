<?php   
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
include "common/constant.php";
header('Location:'.$BASE_URL.'/emplogin.php'); //to redirect back to "emplogin.php" after logging out
exit();
?>