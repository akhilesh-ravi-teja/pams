<?php
// error_reporting(0);
ini_set('session.gc_maxlifetime', 3600);
session_start();
include("inc/db.php");
include("common/auth.php");
include "./inc/pro-con.php";
$user1=$_SESSION['username'];
$manager=$_SESSION['manager'];//session name captured into $manager variable
//echo $user1;
$sql1 = "SELECT emp_no, name, desg,mgr_no,  (select name from emp_master where emp_no='$manager' limit 1 ) as mgr_name FROM emp_master where emp_no='$user1'";
//echo $sql;
$query = "select *, (SELECT count(*) FROM `emp_master` where mgr_no='$user1') as emp_count from emp_master WHERE emp_no = '$user1' limit 1";
  $resultForManager =  mysqli_query($con, $query);
  $resultForManager = mysqli_fetch_assoc($resultForManager);
 
//echo $sql1;
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
{
    
    // output data of each row
    while($row1 = $result1->fetch_assoc())
    {
        //var_dump($row1);
        $emp_no= $user1;
        $emp_name=$row1["name"];
        $emp_des=$row1["desg"];
        $mgr_no=$row1["mgr_no"];
        $mgr_name=$row1["mgr_name"];
        //var_dump($row1);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <body>
  <?php
  include("main/header.php");
  include("main/menu.php");
	  ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-8 mt-5">
      <div class="card border border-primary bg-light" style="height: 234px;">
        <div class="card-body">
        <h5 class="card-title">GTET Performance Appraisal Mangament System</h5>
        <div class="form-label-group">
                  <h5 class="text mt-5"><a href ="emp_rating.php">Submit Your Self Assessment</a></h5>
                  <?php 
                    if($resultForManager['emp_count']>0){
                    echo '<h5 class="text mt-3"><a href ="manager_form.php">Evaluate Your Teams Performance</a></h5>';
                  }
                  ?>
                  <h5 class="text mt-3"><a href ="emp_view.php">View Your Performance Feedback</a></h5>
                </div>

      </div>
      </div>
    </div>
    <?php
  include("main/sidebar.php");
	  ?>
</div>

</html>