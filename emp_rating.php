<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
include("inc/db.php");
ini_set('session.gc_maxlifetime', 3600);
session_start();//session start
include("common/auth.php");
include "./common/constant.php";
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
// echo "<pre>";
// print_r($_POST);exit;
// echo "<pre>";
if (isset($_POST['btnSubmit'])) {
 //KRA

  $kra1 = str_replace("'", "\'", $_POST['kra1']);
  $kra2 = str_replace("'", "\'",$_POST['kra2']);
  $kra3 = str_replace("'", "\'",$_POST['kra3']);
  $kra4 = str_replace("'", "\'",$_POST['kra4']);
  $kra5 = str_replace("'", "\'",$_POST['kra5']);


  //Achievement
  $a1 = str_replace("'", "\'",$_POST['a1']);
  $a2 = str_replace("'", "\'",$_POST['a2']);
  $a3 = str_replace("'", "\'",$_POST['a3']);
  $a4 = str_replace("'", "\'",$_POST['a4']);
  $a5 = str_replace("'", "\'",$_POST['a5']);
  $a6 = str_replace("'", "\'",$_POST['a6']);
  $a7 = str_replace("'", "\'",$_POST['a7']);
  $a8 = str_replace("'", "\'",$_POST['a8']);
  $a9 = str_replace("'", "\'",$_POST['a9']);
  $a10 = str_replace("'", "\'",$_POST['a10']);

  //Self rating
  $r1 = $_POST['r1'];
  $r2 = $_POST['r2'];
  $r3 = $_POST['r3'];
  $r4 = $_POST['r4'];
  $r5 = $_POST['r5'];
  $r6 = $_POST['r6'];
  $r7 = $_POST['r7'];
  $r8 = $_POST['r8'];
  $r9 = $_POST['r9'];
  $r10 = $_POST['r10'];
 
  //Data insertion
  $query ="UPDATE self_rating SET
  kra1='$kra1',
  kra2='$kra2',
  kra3='$kra3',
  kra4='$kra4',
  kra5='$kra5',
  a1='$a1',
  a2='$a2',
  a3='$a3',
  a4='$a4',
  a5='$a5',
  a6='$a6',
  a7='$a7',
  a8='$a8',
  a9='$a9',
  a10='$a10',
  self_rating1='$r1',
  self_rating2='$r2',
  self_rating3='$r3',
  self_rating4='$r4',
  self_rating5='$r5',
  self_rating6='$r6',
  self_rating7='$r7',
  self_rating8='$r8',
  self_rating9='$r9',
  self_rating10='$r10',
  
  Status=1
  where emp_no='$user'";


 //echo $query;
 //echo  $retval = mysql_query($query,$con);

  if(!$conn->query( $query )){
      echo "Not inserted";
  }
  else
  {
      echo "Updated !";


echo '<script type="text/javascript">

          window.onload = function () { alert("You have successfully submitted the form"); }

</script>';


  }

}

if (isset($_POST['signout']))
{

    session_destroy();
     header('Location:'.$BASE_URL.'/emplogin.php');
}


$sql1="SELECT * FROM self_rating where emp_no='$user' ";
//echo $sql1;
$result1 = $conn->query($sql1);

$status=0;
if ($result1->num_rows > 0)
{
    
    // output data of each row
    while($row1 = $result1->fetch_assoc())
    {
        //var_dump($row1);
        $status= $row1["Status"];
    }
}

//var_dump($status);
if($status==1){
    echo "You have already Submitted!";
    header("location:".$BASE_URL."/emp_view.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
  <?php
  include("main/header.php");
  include("main/menu.php");
	  ?>
<div class="container mt-5">
  <div class="row">
        <div class="col-8 mt-5 ">
          <form action="" id="tblCustomers" method="post" class="w-100">
              
              <table class="table table-sm">
                <thead class="thead bg-primary">
                  <div class="fixed-top">
                <tr>
                
                <h3>Key Result Area</h3>
                <th class="pr-3 text-light pt-2" scope="col">#</th>
                <th class="pr-3 text-light pt-2" scope="col">KRA</th>
                <th class="pr-3 text-light pt-2" scope="col">Achievement</th>
                <th class="pr-3 text-light pt-2" scope="col">Self Rating</th>
              </tr>
              </thead>
            </div>
          </thead>
              <tbody>
                <!--Row1-->
                <tr>
                  <th scope="row">1</th>
                  <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="kra1" rows="2" required ></textarea>
                      </div>
                  </td>
                    <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="a1" rows="2" required></textarea>
                      </div>
                    </td>
                    <td>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="r1" id="inputGroupSelect01" data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
2-Below Expectation
3-Meet Expectation
4-Above Expectation
5-Excellent">
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      </select>
                  </div>
              </td>

      </tr>
      <!--Row2-->
      <tr>
        <th scope="row">2</th>
        <td>
            <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" name="kra2" rows="2" required></textarea>
            </div>
        </td>
          <td>
            <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" name="a2" rows="2" required ></textarea>
            </div>
          </td>
          <td>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
        </div>
        <select class="custom-select" name="r2" id="inputGroupSelect01" data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
2-Below Expectation
3-Meet Expectation
4-Above Expectation
5-Excellent">
          <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      </select>
        </div>
    </td>

</tr>
<!--Row3-->
<tr>
  <th scope="row">3</th>
  <td>
      <div class="form-group">
      <textarea class="form-control" id="exampleFormControlTextarea1" name="kra3" rows="2" required></textarea>
      </div>
  </td>
    <td>
      <div class="form-group">
      <textarea class="form-control" id="exampleFormControlTextarea1" name="a3" rows="2" required></textarea>
      </div>
    </td>
    <td>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
  </div>
  <select class="custom-select" name="r3" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
2-Below Expectation
3-Meet Expectation
4-Above Expectation
5-Excellent">
    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      </select>
  </div>
</td>

</tr>
<!--Row4-->
<tr>
  <th scope="row">4</th>
  <td>
      <div class="form-group">
      <textarea class="form-control" id="exampleFormControlTextarea1" name="kra4" rows="2" required></textarea>
      </div>
  </td>
    <td>
      <div class="form-group">
      <textarea class="form-control" id="exampleFormControlTextarea1" name="a4" rows="2" required></textarea>
      </div>
    </td>
    <td>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
  </div>
  <select class="custom-select" name="r4" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
2-Below Expectation
3-Meet Expectation
4-Above Expectation
5-Excellent">
    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      
  </select>
  </div>
</td>

</tr>
<!--Row2-->
<tr>
  <th scope="row">5</th>
  <td>
      <div class="form-group">
      <textarea class="form-control" id="exampleFormControlTextarea1" name="kra5" rows="2" required></textarea>
      </div>
  </td>
    <td>
      <div class="form-group">
      <textarea class="form-control" id="exampleFormControlTextarea1" name="a5" rows="2" required></textarea>
      </div>
    </td>
    <td>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
  </div>
  <select class="custom-select" name="r5" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
2-Below Expectation
3-Meet Expectation
4-Above Expectation
5-Excellent">
    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      </select>
  </div>
</td>

</tr>
</table>

                </tbody>
                <table class="table table-sm">
                <thead class="thead bg-primary">
                  <div class="fixed-top">
                <tr>
                     <hr size="30"  class="border border-primary">
                     <h3>Value & Behavioural Attributes</h3>
                <th class="pr-3 text-light pt-2" scope="col">#</th>
                <th class="pr-3 text-light pt-2" scope="col">Behavioural Attributes</th>
                <th class="pr-3 text-light pt-2" scope="col">Self Assesment</th>
                <th class="pr-3 text-light pt-2" scope="col">Self Rating</th>
              </tr>
              </thead>
            </div>
          </thead>
             <tr width="100%">
                  <th scope="row">6</th>
                  <td width="33%">
                     <div class="input-group mb-3">
                      <div class="form-group">
						  <b><p>Leadership, Ownership & Accountability</p></b> 
<p style="font-size: 12px; color:#484848">(Demonstrates leaderships skills in training delivery or program management/ operations with a strong sense of ownership & accountability)</p>

                      </div></div>
                  </td>
                    <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="a6" rows="2" required></textarea>
                      </div>
                    </td>
                    <td>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="r6" id="inputGroupSelect01" data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
2-Below Expectation
3-Meet Expectation
4-Above Expectation
5-Excellent">
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      </select>
                  </div>
              </td>

      </tr>
             <tr width="100%">
                  <th scope="row">7</th>
                  <td width="33%">
                     <div class="input-group mb-3">
                      <div class="form-group">
						  <b><p>Integrity & ethics – doing things right</p></b> 
<p style="font-size: 12px; color:#484848">(Demonstrates highest level of integrity and ethics in dealing with students, industry or government agencies and not compromising on values while protecting the student’s & organizational interests)</p>

                      </div></div>
                  </td>
                    <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="a7" rows="2" required></textarea>
                      </div>
                    </td>
                    <td>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="r7" id="inputGroupSelect01" data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
2-Below Expectation
3-Meet Expectation
4-Above Expectation
5-Excellent">
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      </select>
                  </div>
              </td>

      </tr>
             <tr width="100%">
                  <th scope="row">8</th>
                  <td width="33%">
                     <div class="input-group mb-3">
                      <div class="form-group">
						  <b><p>Quality orientation, Excellence & timeliness</p></b> 
<p style="font-size: 12px; color:#484848">(Demonstrates a passion for quality & excellence in whatever he or she does with a strong consciousness of on time delivery or timeliness & punctuality)</p>

                      </div></div>
                  </td>
                    <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="a8" rows="2" required></textarea>
                      </div>
                    </td>
                    <td>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="r8" id="inputGroupSelect01" data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
2-Below Expectation
3-Meet Expectation
4-Above Expectation
5-Excellent">
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      </select>
                  </div>
              </td>

      </tr>
             <tr width="100%">
                  <th scope="row">9</th>
                  <td width="33%">
                     <div class="input-group mb-3">
                      <div class="form-group">
						  <b><p>Teamwork & boundary less behaviour</p></b> 
<p style="font-size: 12px; color:#484848">(Demonstrates ability to work with others within the team and also look beyond personal self/ team / center boundaries to work with the larger team for organizational benefit)</p>

                      </div></div>
                  </td>
                    <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="a9" rows="2" required></textarea>
                      </div>
                    </td>
                    <td>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="r9" id="inputGroupSelect01" data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
2-Below Expectation
3-Meet Expectation
4-Above Expectation
5-Excellent">
					  <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      </select>
                  </div>
              </td>

      </tr>
             <tr width="100%">
                  <th scope="row">10</th>
                  <td width="33%">
                     <div class="input-group mb-3">
                      <div class="form-group">
						  <b><p>Customer centricity</p></b> 
<p style="font-size: 12px; color:#484848">(Demonstrates a strong focus on customer satisfaction with primary focus being the student or trainee or government or industry or internal customers like other team members)</p>

                      </div></div>
                  </td>
                    <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="a10" rows="2" required></textarea>
                      </div>
                    </td>
                    <td>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="r10" id="inputGroupSelect01" data-toggle="tooltip"  data-placement="bottom" 
						  title="1-Need Improvement
2-Below Expectation
3-Meet Expectation
4-Above Expectation
5-Excellent">
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                  </select>
                  </div>
              </td>

      </tr>
              </table>
               
              <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg" name="btnSubmit">Submit</button>
        </div>

          </form>
        </div>
      <?php
  include("main/sidebar.php");
	  ?>
</body>

</html>
