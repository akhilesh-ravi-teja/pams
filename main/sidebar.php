<?php 
$user=$_SESSION['username'];//session name captured into $user variable
$manager=$_SESSION['manager'];//session name captured into $manager variable
$sql = "SELECT emp_no, name, desg,mgr_no,  (select name from emp_master where emp_no='$manager' limit 1 ) as mgr_name FROM emp_master where emp_no='$user'";

$result = $conn->query($sql);


if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        //var_dump($row);
        $emp_no= $user;
        $emp_name=$row["name"];
        $emp_des=$row["desg"];
        $mgr_no=$row["mgr_no"];
        $mgr_name=$row["mgr_name"];

    }
}
else
{
    echo "0 results";
}
?>
     <div class="col-4 mt-5" >
      <div class="card border border-primary bg-light" style="height: 234px;">
        <div class="card-body">
			<h5 class="card-title">My Info</h5>
        <div class="form-label-group">
                  <h5 class="text mt-5 text-primary" >Employee No: <?php echo $user;?></h5>
                  <h5 class="text mt-2 text-primary" >Manager Name: <?php echo $mgr_name;?></h5>
                  <h5 class="text mt-2 text-primary" >Designation: <?php echo $emp_des;?></h5>
                </div>
        
      </div>
    </div>
  </div>
