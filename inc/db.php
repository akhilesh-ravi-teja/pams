<?php
include "./common/constant.php";
// $servername = "localhost";
// $username = "root";
// $password = "";
// $db="pms-test";
// // Create connection
// $conn = new mysqli($servername, $username, $password, $db);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

//for production
// $servername = "localhost";
//     $username = "cutmawgx_usr_sib";
//     $password = "e(yQ])ThLSYc";
//     $dbname = "cutmawgx_pms";


$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?> 



