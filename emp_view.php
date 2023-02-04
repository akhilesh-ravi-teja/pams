<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
include("inc/db.php");
ini_set('session.gc_maxlifetime', 3600);
session_start();//session start
include("common/auth.php");
include "common/constant.php";
$user=$_SESSION['username'];//session name captured into $user variable
$manager=$_SESSION['manager'];//session name captured into $manager variable
//$sql = "SELECT emp_no, name, desg,mgr_no,  (select name from emp_master where emp_no='$manager' limit 1 ) as mgr_name FROM emp_master where emp_no='$user'";
$sql= "SELECT * FROM self_rating INNER JOIN mgr_rating on self_rating.emp_no=mgr_rating.emp_no WHERE self_rating.emp_no='$user'";


$result = $conn->query($sql);


if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        //var_dump($row);
        $emp_no= $user;
        
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
		    $a6=$row["a6"];
        $a7=$row["a7"];
        $a8=$row["a8"];
        $a9=$row["a9"];
        $a10=$row["a10"];
        
        $r1=$row["self_rating1"];
        $r2=$row["self_rating2"];
        $r3=$row["self_rating3"];
        $r4=$row["self_rating4"];
        $r5=$row["self_rating5"];
        $r6=$row["self_rating6"];
        $r7=$row["self_rating7"];
        $r8=$row["self_rating8"];
        $r9=$row["self_rating9"];
        $r10=$row["self_rating10"];
        
        $mgr_evltn1=$row["mgr_evltn1"];
        $mgr_evltn2=$row["mgr_evltn2"];
        $mgr_evltn3=$row["mgr_evltn3"];
        $mgr_evltn4=$row["mgr_evltn4"];
        $mgr_evltn5=$row["mgr_evltn5"];
        $mgr_evltn6=$row["mgr_evltn6"];
        $mgr_evltn7=$row["mgr_evltn7"];
        $mgr_evltn8=$row["mgr_evltn8"];
        $mgr_evltn9=$row["mgr_evltn9"];
        $mgr_evltn10=$row["mgr_evltn10"];
        
        $rating1=$row["rating1"];
        $rating2=$row["rating2"];
        $rating3=$row["rating3"];
        $rating4=$row["rating4"];
        $rating5=$row["rating5"];
        $rating6=$row["rating6"];
        $rating7=$row["rating7"];
        $rating8=$row["rating8"];
        $rating9=$row["rating9"];
        $rating10=$row["rating10"];
        
    }
}
else
{
    echo "0 results";
}

//Show Data in My info 
$sql1 = "SELECT emp_no, name, desg,mgr_no,  (select name from emp_master where emp_no='$manager' limit 1 ) as mgr_name FROM emp_master where emp_no='$user'";
//echo $sql;

//echo $sql1;
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
{
    
    // output data of each row
    while($row1 = $result1->fetch_assoc())
    {
        //var_dump($row1);
        $emp_no= $user;
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
  <?php
  include("main/header.php");
  include("main/menu.php");
	  ?>
  <body>
<div class="container mt-5">
  <div class="row">
        <div class="col-8 mt-5">
          <form action="" method="post" class="w-100">
              <table class="table table-fixed">
                <thead class="thead bg-primary">
                  <div class="fixed-top">
                <tr>
                    
                <h3>Key Result Area</h3>
                <th class="pr-3 text-light pt-2"scope="col">#</th>
                <th class="pr-3 text-light pt-2"scope="col">KRA</th>
                <th class="pr-3 text-light pt-2"scope="col">Achievement</th>
                <th class="pr-3 text-light pt-2"scope="col">Self Rating</th>
                <th class="pr-3 text-light pt-2"scope="col">Manager Evaluation</th>
                <th class="pr-3 text-light pt-2"cope="col">Final Rating</th>
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
                
               <table class="table table-sm">
                <thead class="thead bg-primary">
                  <div class="fixed-top">
                <tr>
                <hr size="30"  class="border border-primary">
                <h3>Values & Behavioural Attributes</h3>
                <th class="pr-3 text-light pt-2" scope="col">#</th>
                <th class="pr-3 text-light pt-2" scope="col">Behavioural Attributes</th>
                <th class="pr-3 text-light pt-2" scope="col">Self Assesment</th>
                <th class="pr-3 text-light pt-2" scope="col">Self Rating</th>
                <th class="pr-3 text-light pt-2"scope="col">Manager Evaluation</th>
                <th class="pr-3 text-light pt-2"cope="col">Final Rating</th>
              </tr>
              </thead>
            </div>
          </thead>
              <tbody>
                <!--Row1-->
                <tr>
                  <th scope="row">6</th>
                  <!--kra1-->
                  <td width="33%">
    <div class="badge text-wrap">
                     <div class="input-group mb-3">
						  <b><p>Leadership, Ownership & Accountability</p></b> 
<p style="font-size: 12px; color:#484848">(Demonstrates leaderships skills in training delivery or program management/ operations with a strong sense of ownership & accountability)</p>
                      </div>
   </div>
  </td>
  <!--a1-->
                    <td>
                      <div class="badge text-wrap" style="width: 6rem;">
                     <?php echo $a6;?>
                     </div>
                    </td>
                    <td>
                      <div class="badge text-wrap" style="width: 6rem;">
                      <?php echo $r6;?>
                     </div>
                    </td>
                    <!--Manager Evaluation-->
                    <td>
                      <div class="badge text-wrap" style="width: 6rem;">
                     <?php echo $mgr_evltn6;?>
                     </div>
                    </td>
                    <!--Manager Rating-->
                    <td>
                      <div class="badge text-wrap" style="width: 6rem;">
                    <?php echo $rating6;?>
                     </div>
                  </tr>

      <!--Row2-->
      <tr>
        <th scope="row">7</th>
        <td width="33%">
    <div class="badge text-wrap">
                     <div class="input-group mb-3">
						  <b><p>Integrity & ethics – doing things right</p></b> 
<p style="font-size: 12px; color:#484848">(Demonstrates highest level of integrity and ethics in dealing with students, industry or government agencies and not compromising on values while protecting the student’s & organizational interests)</p>
                      </div>
   </div>
  </td>
  <!--a1-->
          <td>
            <div class="badge text-wrap" style="width: 6rem;">
           <?php echo $a7;?>
           </div>
          </td>
          <td>
            <div class="badge text-wrap" style="width: 6rem;">
            <?php echo $r7;?>
           </div>
          </td>
          <!--Manager Evaluation-->
          <td>
            <div class="badge text-wrap" style="width: 6rem;">
           <?php echo $mgr_evltn7;?>
           </div>
          </td>
          <!--Manager Rating-->
          <td>
            <div class="badge text-wrap" style="width: 6rem;">
           <?php echo $rating7;?>
           </div>

</tr>
<!--Row3-->
<tr>
  <th scope="row">8</th>
  <td width="33%">
    <div class="badge text-wrap">
                     <div class="input-group mb-3">
						  <b><p>Quality orientation, Excellence & timeliness</p></b> 
<p style="font-size: 12px; color:#484848">(Demonstrates a passion for quality & excellence in whatever he or she does with a strong consciousness of on time delivery or timeliness & punctuality)</p>

                      </div>
   </div>
  </td>
  <!--a1-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $a8;?>
     </div>
    </td>
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
      <?php echo $r8;?>
     </div>
    </td>
    <!--Manager Evaluation-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $mgr_evltn8;?>
     </div>
    </td>
    <!--Manager Rating-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $rating8;?>
     </div>
</tr>
<!--Row4-->
<tr>
  <th scope="row">9</th>
  <td width="33%">
    <div class="badge text-wrap">
                     <div class="input-group mb-3">
						  <b><p>Teamwork & boundary less behaviour</p></b> 
<p style="font-size: 12px; color:#484848">(Demonstrates ability to work with others within the team and also look beyond personal self/ team / center boundaries to work with the larger team for organizational benefit)</p>
                      </div>
   </div>
  </td>
  <!--a1-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $a9;?>
     </div>
    </td>
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
      <?php echo $r9;?>
     </div>
    </td>
    <!--Manager Evaluation-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $mgr_evltn9;?>
     </div>
    </td>
    <!--Manager Rating-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
    <?php echo $rating9;?>
     </div>

</tr>
<!--Row5-->
<tr>
  <th scope="row">10</th>
  <td width="33%">
    <div class="badge text-wrap">
                     <div class="input-group mb-3">
						  <b><p>Customer centricity</p></b> 
<p style="font-size: 12px; color:#484848">(Demonstrates a strong focus on customer satisfaction with primary focus being the student or trainee or government or industry or internal customers like other team members)</p>

                      </div>
   </div>
  </td>
  <!--a1-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $a10;?>
     </div>
    </td>
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
      <?php echo $r10;?>
     </div>
    </td>
    <!--Manager Evaluation-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $mgr_evltn10;?>
     </div>
    </td>
    <!--Manager Rating-->
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
     <?php echo $rating10;?>
     </div>

</tr>
                

                </tbody>
                
              </table>
              

          </form>

        </div>
        
        <?php
  include("main/sidebar.php");
	  ?>
        
          </div>
        </div>
      </div>

  </div>
</body>
</html>
