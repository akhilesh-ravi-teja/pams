<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
session_start();//session start
include("db.php");
// include("config.php");
$user=$_SESSION['username'];//session name captured into $user variable
$manager=$_SESSION['manager'];//session name captured into $manager variable
$emp_no=$_GET['emp_no'];
$sql= "SELECT * FROM self_rating INNER JOIN mgr_rating on self_rating.emp_no=mgr_rating.emp_no WHERE self_rating.emp_no='$emp_no'";


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
        
        $kra1=$row["kra1"];
        $kra2=$row["kra2"];
        $kra3=$row["kra3"];
        $kra4=$row["kra4"];
        $kra5=$row["kra5"];
        
        $a1=$row["a1"];
        $a2=$row["a2"];
        $a3=$row["a3"];
        $a4=$row["a4"];
        $a5=$row["a5"];
        
        $r1=$row["self_rating1"];
        $r2=$row["self_rating2"];
        $r3=$row["self_rating3"];
        $r4=$row["self_rating4"];
        $r5=$row["self_rating5"];
        
        $mgr_evltn1=$row["mgr_evltn1"];
        $mgr_evltn2=$row["mgr_evltn2"];
        $mgr_evltn3=$row["mgr_evltn3"];
        $mgr_evltn4=$row["mgr_evltn4"];
        $mgr_evltn5=$row["mgr_evltn5"];
        
        $rating1=$row["rating1"];
        $rating2=$row["rating2"];
        $rating3=$row["rating3"];
        $rating4=$row["rating4"];
        $rating5=$row["rating5"];
        
    }
}
else
{
    echo "0 results";
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee view</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" role="navigation">
      <img src="gtlogo.png" class="rounded float-left">
      <div class="container">
          <a class="navbar-brand" href="#">GTET Performance Mangament System</a>
          <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
              &#9776;
          </button>
          <div class="collapse navbar-collapse" id="exCollapsingNavbar">
              <ul class="nav navbar-nav">
                  <li class="nav-item"><a href="manager_form.php" class="nav-link">Manager Form</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">My Rating</a></li>
                  <li class="nav-item"><a href="emp_rating.php" class="nav-link">Submit Your Own PA Rating</a></li>
              </ul>
              <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                  <li class="pr-3 text-light pt-2"><?php echo $_SESSION['emp_name'];?></li>
                  <li >
                      <button type="submit" id="signout"class="btn btn-light"><a href="logout.php">Reset Password</a> <span class="caret"></span></button>
                      <button type="submit" id="signout"class="btn btn-light"><a href="logout.php">Sign out</a> <span class="caret"></span></button>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

<div class="container mt-5">
  <div class="row">
        <div class="col-8 mt-5">
          <form action="" method="post" class="w-100">
              <table class="table table-fixed">
                <thead class="thead-dark">
                  <div class="fixed-top">
                <tr>
                <th scope="col">#</th>
                <th scope="col">KRA</th>
                <th scope="col">Achievement</th>
                <th scope="col">Self Rating</th>
                <th scope="col">Manager Evaluation</th>
                <th scope="col">Final Rating</th>
              </tr>
              </thead>
            </div>
              <tbody>
                <!--Row1-->
                <tr>
                  <th scope="row">1</th>
                  <!--kra1-->
                  <td>
                    <div class="badge text-wrap" style="width: 6rem;">
                   <?php echo $kra1;?>
                   </div>
                  </td>
                  <!--a1-->
                    <td>
                      <div class="badge text-wrap" style="width: 6rem;">
                     <?php echo $a1;?>
                     </div>
                    </td>
                    <td>
                      <div class="badge text-wrap" style="width: 6rem;">
                      <?php echo $r1;?>
                     </div>
                    </td>
                    <!--Manager Evaluation-->
                    <td>
                      <div class="badge text-wrap" style="width: 6rem;">
                     <?php echo $mgr_evltn1;?>
                     </div>
                    </td>
                    <!--Manager Rating-->
                    <td>
                      <div class="badge text-wrap" style="width: 6rem;">
                    <?php echo $rating1;?>
                     </div>
                  </tr>

      <!--Row2-->
      <tr>
        <th scope="row">2</th>
        <td>
          <div class="badge text-wrap" style="width: 6rem;">
         <?php echo $kra2;?>
         </div>
        </td>
        <!--a1-->
          <td>
            <div class="badge text-wrap" style="width: 6rem;">
           <?php echo $a2;?>
           </div>
          </td>
          <td>
            <div class="badge text-wrap" style="width: 6rem;">
            <?php echo $r2;?>
           </div>
          </td>
          <!--Manager Evaluation-->
          <td>
            <div class="badge text-wrap" style="width: 6rem;">
           <?php echo $mgr_evltn2;?>
           </div>
          </td>
          <!--Manager Rating-->
          <td>
            <div class="badge text-wrap" style="width: 6rem;">
           <?php echo $rating2;?>
           </div>

</tr>
<!--Row3-->
<tr>
  <th scope="row">3</th>
  <td>
    <div class="badge text-wrap" style="width: 6rem;">
   <?php echo $kra3;?>
   </div>
  </td>
  <!--a1-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $a3;?>
     </div>
    </td>
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
      <?php echo $r3;?>
     </div>
    </td>
    <!--Manager Evaluation-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $mgr_evltn3;?>
     </div>
    </td>
    <!--Manager Rating-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $rating3;?>
     </div>
</tr>
<!--Row4-->
<tr>
  <th scope="row">4</th>
  <td>
    <div class="badge text-wrap" style="width: 6rem;">
   <?php echo $kra4;?>
   </div>
  </td>
  <!--a1-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $a4;?>
     </div>
    </td>
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
      <?php echo $r4;?>
     </div>
    </td>
    <!--Manager Evaluation-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $mgr_evltn4;?>
     </div>
    </td>
    <!--Manager Rating-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
    <?php echo $rating4;?>
     </div>

</tr>
<!--Row5-->
<tr>
  <th scope="row">5</th>
  <td>
    <div class="badge text-wrap" style="width: 6rem;">
   <?php echo $kra5;?>
   </div>
  </td>
  <!--a1-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $a5;?>
     </div>
    </td>
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
      <?php echo $r5;?>
     </div>
    </td>
    <!--Manager Evaluation-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $mgr_evltn5;?>
     </div>
    </td>
    <!--Manager Rating-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $rating5;?>
     </div>

</tr>

                </tbody>
              </table>
              

          </form>

        </div>
        
          </div>
        </div>
      </div>

  </div>
</body>
</html>
