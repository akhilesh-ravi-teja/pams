<?php 

include "./common/constant.php";
// $servername = "localhost";
// $username = "root";
// $password = "";
// $db="pms-test";
// // Create connection
// $con = mysqli_connect($servername, $username, $password, $db);

// // Check connection
// if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
//   }

//for production
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }



