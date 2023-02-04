<?php
    //echo "test";
    //var_dump($_SESSION);
    // if(isset($_SESSION['emp_count'])){
    //     if($_SESSION['emp_count'] < 1){
            
    //     }
    // }
    // include "common/constant.php";
   if(!isset($_SESSION['username']))
{
    // not logged in
    // header('Location: http://localhost/pams/emplogin.php');
    // exit();

    header('Location: https://pams.mcoder.in/emplogin.php');
    exit();
}
?>