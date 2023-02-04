<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db="pms-test";

//for production
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

function getTotalEmpCount($con)
{
  $query = "SELECT count(*) as total_emp_records FROM `emp_master`";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $total_emp_records = $row['total_emp_records'];
    return $total_emp_records;
  }
}

function getManagerCount($con){
  $query = "SELECT COUNT(DISTINCT mgr_no) AS total_mgr_count FROM `emp_master`";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $total_mgr_count = $row['total_mgr_count'];
    return $total_mgr_count;
  }
}

function getEmpRatingCount($con){
  $query = "SELECT COUNT(Status) AS total_self_rating_count FROM `self_rating` WHERE Status = '1'";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $total_self_rating_count = $row['total_self_rating_count'];
    return $total_self_rating_count;
  }
}

function getManagerRatingCount($con){
  $query = "SELECT COUNT(mgr_status) AS total_mgr_rating_count FROM `mgr_rating` WHERE mgr_status = '1'";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $total_mgr_rating_count = $row['total_mgr_rating_count'];
    return $total_mgr_rating_count;
  }
}

function getTotalReport($con){
  $query = "SELECT * FROM pmsjoin";
  $result = mysqli_query($con,$query);
  if(mysqli_num_rows($result)>0){
    $data = [];
    while($row = mysqli_fetch_assoc($result)){
      $data[] = $row;
    }
  }
  return $data;

}




