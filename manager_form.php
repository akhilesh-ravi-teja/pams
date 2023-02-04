<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
include("inc/db.php");
session_start();
include("common/auth.php");
include "common/constant.php";
$manager=$_SESSION['manager'];
if($_SESSION['emp_count']==0){
    echo "You are not a Manager";
   header("location:".$BASE_URL."/pams/emp_rating.php");
}
 $mgr_no = $_SESSION['username']; // if this is a manager than username is managerid
 $sql = "SELECT * FROM emp_master INNER JOIN self_rating on emp_master.emp_no=self_rating.emp_no WHERE emp_master.mgr_no='$mgr_no' and Status=1";

 echo $sql_non = "SELECT * FROM emp_master INNER JOIN self_rating on emp_master.emp_no=self_rating.emp_no WHERE emp_master.mgr_no='$mgr_no' and Status=0";

$result = $conn->query($sql);
$result_non = $conn->query($sql_non);
?>

<!DOCTYPE html>
<html lang="en">
 <?php
  include("main/header.php");
  include("main/menu.php");
	  ?>
<body>


<div class="container mt-5">
  <div class="row">
        <div class="col-8 mt-5">
          <form action="" method="post" class="w-100">
              <?php if ($result->num_rows > 0)
                    { ?>
              <h2>List of Submitted PA's</h2>
              <table class="table table-fixed">
                  <?php
                        // output data of each row
                        while($row = $result->fetch_assoc())
                        {
                            $emp_no= $row["emp_no"];
                            $emp_name=$row["name"];
                            $emp_des=$row["desg"];
                            $mgr_no=$row["mgr_no"];
                            $status=$row["Status"];
                        ?>
                    <tr><td>
                        <div class="list-group">
                            <a  href="final_rating.php?emp_no=<?php echo $emp_no;?>" class="list-group-item list-group-item-action active" >
                                Employee Name:   <?php echo $emp_name;?> </a>

                        </div>
                  </td>
                 </tr>
                 <?php }
                  ?>

            </table>
            <?php }
                  ?>

            <?php if ($result_non->num_rows > 0)
                    { ?>
            <h2>List of Non Submitted PA's</h2>
              <table class="table table-fixed">
                  <?php
                        // output data of each row
                        while($row = $result_non->fetch_assoc())
                        {
                            $emp_no= $row["emp_no"];
                            $emp_name=$row["name"];
                            $emp_des=$row["desg"];
                            $mgr_no=$row["mgr_no"];
                            $status=$row["Status"];
                        ?>
                    <tr><td>
                        <div class="list-group">
                            <a  href="#"  class="list-group-item list-group-item-action active" <?php if ($status==0){?>style="cursor:none;color:#000;"<?php }
                  ?>>
                                Employee Name:<?php echo $emp_name;?></a>

                        </div>
                  </td>
                 </tr>
                 <?php }
                  ?>

            </table>
            <?php }
                  ?>

        </form>
    </div>
</div>
</body>
</html>
