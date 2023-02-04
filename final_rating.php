<?php 
// error_reporting(E_ALL);
// ini_set('error_reporting', E_ALL);
ini_set('session.gc_maxlifetime', 3600);
session_start();//session start
include("inc/db.php");
include("common/auth.php");
include "./common/constant.php";
// var_dump( $_SESSION);
$user=$_SESSION['username'];//session name captured into $user variable
$manager=$_SESSION['manager']; //session name captured into $manager variable
$emp_no = $conn->real_escape_string($_GET['emp_no']);
$sql = "select * from self_rating where emp_no='$emp_no'";
$result = $conn->query($sql);

//insert into 
if (isset($_POST['btnSubmit'])) {
 //Manager Evaluation
  $comment1= str_replace("'", "\'", $_POST['comment1']);
  $comment2= str_replace("'", "\'", $_POST['comment2']);
  $comment3= str_replace("'", "\'", $_POST['comment3']);
  $comment4= str_replace("'", "\'", $_POST['comment4']);
  $comment5= str_replace("'", "\'", $_POST['comment5']);
  $comment6= str_replace("'", "\'", $_POST['comment6']);
  $comment7= str_replace("'", "\'", $_POST['comment7']);
  $comment8= str_replace("'", "\'", $_POST['comment8']);
  $comment9= str_replace("'", "\'", $_POST['comment9']);
  $comment10= str_replace("'", "\'", $_POST['comment10']);
  
 
 /* $comment1 = $_POST['comment1'];
  $comment2 = $_POST['comment2'];
  $comment3 = $_POST['comment3'];
  $comment4 = $_POST['comment4'];
  $comment5 = $_POST['comment5'];
  $comment6 = $_POST['comment6'];
  $comment7 = $_POST['comment7'];
  $comment8 = $_POST['comment8'];
  $comment9 = $_POST['comment9'];
  $comment10 = $_POST['comment10'];*/

$emp_no_form = $_POST['emp_no'];
  
  //Manager Rating
  $fr1 = $_POST['fr1'];
  $fr2 = $_POST['fr2'];
  $fr3 = $_POST['fr3'];
  $fr4 = $_POST['fr4'];
  $fr5 = $_POST['fr5'];
  $fr6 = $_POST['fr6'];
  $fr7 = $_POST['fr7'];
  $fr8 = $_POST['fr8'];
  $fr9 = $_POST['fr9'];
  $fr10 = $_POST['fr10'];
  
  //Data insertion 
  $query ="UPDATE mgr_rating SET 
  mgr_evltn1='$comment1',
  mgr_evltn2='$comment2',
  mgr_evltn3='$comment3',
  mgr_evltn4='$comment4',
  mgr_evltn5='$comment5',
  mgr_evltn6='$comment6',
  mgr_evltn7='$comment7',
  mgr_evltn8='$comment8',
  mgr_evltn9='$comment9',
  mgr_evltn10='$comment10',
  
  rating1='$fr1',
  rating2='$fr2',
  rating3='$fr3',
  rating4='$fr4',
  rating5='$fr5',
  rating6='$fr6',
  rating7='$fr7',
  rating8='$fr8',
  rating9='$fr9',
  rating10='$fr10',
  mgr_status=1
  
  where emp_no='$emp_no_form'";
  
  //Status='submitted'
 //echo $query;
 //echo  $retval = mysql_query($query,$con);
//echo $query;
// exit;
  if(!$conn->query( $query )){
      echo "Not inserted";
  }
  else
  {
      header("Location:".$BASE_URL."/manager_form.php");
  }
//  exit;
}
if($_SESSION['emp_count']==0){

    header("location:".$BASE_URL."/emp_rating.php");
}

///// fetch selft rating and manager rating
$rating_sql= "SELECT * FROM self_rating INNER JOIN mgr_rating on self_rating.emp_no=mgr_rating.emp_no WHERE self_rating.emp_no='$emp_no'";

$result_rating = $conn->query($rating_sql);
$mgr_status=0;

     while($rating = $result_rating->fetch_assoc()){
        //var_dump($row);
        $emp_no= $rating["emp_no"];
        $emp_name=$rating["name"];
        if(isset($rating["desg"]) && isset($rating["mgr_no"]) && isset($rating["mgr_name"])){
          $emp_des=$rating["desg"];
          $mgr_no=$rating["mgr_no"];
          $mgr_name=$rating["mgr_name"];
        }
        $kra1=$rating["kra1"];
        $kra2=$rating["kra2"];
        $kra3=$rating["kra3"];
        $kra4=$rating["kra4"];
        $kra5=$rating["kra5"];
      
        $a1=$rating["a1"];
        $a2=$rating["a2"];
        $a3=$rating["a3"];
        $a4=$rating["a4"];
        $a5=$rating["a5"];
		    $a6=$rating["a6"];
        $a7=$rating["a7"];
        $a8=$rating["a8"];
        $a9=$rating["a9"];
        $a10=$rating["a10"];
        
        $r1=$rating["self_rating1"];
        $r2=$rating["self_rating2"];
        $r3=$rating["self_rating3"];
        $r4=$rating["self_rating4"];
        $r5=$rating["self_rating5"];
        $r6=$rating["self_rating6"];
        $r7=$rating["self_rating7"];
        $r8=$rating["self_rating8"];
        $r9=$rating["self_rating9"];
        $r10=$rating["self_rating10"];
        
        $mgr_evltn1=$rating["mgr_evltn1"];
        $mgr_evltn2=$rating["mgr_evltn2"];
        $mgr_evltn3=$rating["mgr_evltn3"];
        $mgr_evltn4=$rating["mgr_evltn4"];
        $mgr_evltn5=$rating["mgr_evltn5"];
        $mgr_evltn6=$rating["mgr_evltn6"];
        $mgr_evltn7=$rating["mgr_evltn7"];
        $mgr_evltn8=$rating["mgr_evltn8"];
        $mgr_evltn9=$rating["mgr_evltn9"];
        $mgr_evltn10=$rating["mgr_evltn10"];
        
        $rating1=$rating["rating1"];
        $rating2=$rating["rating2"];
        $rating3=$rating["rating3"];
        $rating4=$rating["rating4"];
        $rating5=$rating["rating5"];
        $rating6=$rating["rating6"];
        $rating7=$rating["rating7"];
        $rating8=$rating["rating8"];
        $rating9=$rating["rating9"];
        $rating10=$rating["rating10"];
    
    $mgr_status = $rating['mgr_status'];
}


 
?>


<!DOCTYPE html>
<html lang="en">
  <?php
  include("main/header.php");
  include("main/menu.php");
 
	  ?>
<body>
<?php 


if($mgr_status==1){
    //echo "show list of data here";
    ?>
    
    
<div class="container mt-5">

        <div class="col-8 mt-5">
  <div class="row">
          <form action="" method="post" class="w-100">
            
              <table class="table table-sm">
                <thead class="thead bg-primary">
                  <div class="fixed-top">
                <tr>
                <hr size="30"  class="border border-primary">
                <h3>Key Result Area</h3>
                <th class="pr-3 text-light pt-2" scope="col">#</th>
                <th class="pr-3 text-light pt-2" scope="col">KRA</th>
                <th class="pr-3 text-light pt-2" scope="col">Achievement</th>
                <th class="pr-3 text-light pt-2" scope="col">Self Rating</th>
                <th class="pr-3 text-light pt-2" scope="col">Manager Evaluation</th>
                <th class="pr-3 text-light pt-2" scope="col">Final Rating</th>
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
   <!--Behaviour and Values for Showing data only-->       
  
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
               <hr size="30"  class="border border-primary">
          </form>

        </div>
        
          </div>
        </div>
      </div>
    <?php
    exit;
}
?>
<div class="container mt-4">
  <div class="row">
        <div class="col-8 mt-5">
            <?php
            if($self_rating = $result->fetch_assoc()){
            //var_dump($self_rating);   

            ?>
          <form action="final_rating.php" method="post" class="w-100">
              
              <table class="table table-sm">
                <thead class="thead bg-primary">
                  <div class="fixed-top">
                <tr>
                    <hr size="30"  class="border border-primary">
                <h3>Key Result Area</h3>
                <th class="pr-3 text-light pt-2"scope="col">#</th>
                <th class="pr-3 text-light pt-2"scope="col">KRA</th>
                <th class="pr-3 text-light pt-2"scope="col">Achievement</th>
                <th class="pr-3 text-light pt-2"scope="col">Self Rating</th>
                <th class="pr-3 text-light pt-2"scope="col">Manager Evaluation</th>
                <th class="pr-3 text-light pt-2"scope="col">Final Rating</th>
              </tr>
              </thead>
            </div>
          </thead>
              <tbody>
                <!--Row1-->
                <tr>
                  <th scope="row">1</th>
                  <td>
                      <div class="badge text-wrap" style="width: 6rem;">
                     <?php echo $self_rating['kra1'];?>
                     </div>
                  </td>
                   <!--Echo Achivement 1-->
                    <td>
                      <div class="badge text-wrap" style="width: 6rem;">
                     <?php echo $self_rating['a1'];?>
                     </div>
                    </td>
               
                  <!--Echo Self rating 1-->
                    <td>
                    <p><?php echo $self_rating['self_rating1']?></p>
                    <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="comment1" rows="2" required ></textarea>
                      </div>
               </td>
               <td>
                   
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="fr1" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
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
            <div class="badge text-wrap" style="width: 6rem;">
            <?php echo $self_rating['kra2'];?>
            </div>
        </td>
        </td>
                   <!--Echo Achivement 2-->
          <td>
           <div class="badge text-wrap" style="width: 6rem;">
            <?php echo $self_rating['a2'];?>
          </td>
            <!--Echo Self rating 2-->
          <td>
        <p><?php echo $self_rating['self_rating2']?></p>
         </td>
                    <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="comment2" rows="2" required></textarea>
                      </div>
                    </td>
                    
                    <td>
                        <!--Manager Rating-->
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="fr2" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
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
      <div class="badge text-wrap" style="width: 6rem;">
        <?php echo $self_rating['kra3'];?>
        </div>
  </td>
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
        <?php echo $self_rating['a3'];?>
    </td>
    <!--Echo Self rating 3-->
    <td>
  <p><?php echo $self_rating['self_rating3']?></p>
    </td>
                    <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="comment3" rows="2" required></textarea>
                      </div>
                  </td>
                  
                  <td>
                        <!--Manager Rating-->
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="fr3" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
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
      
        <div class="badge text-wrap" style="width: 6rem;">
        <?php echo $self_rating['kra4'];?>
        </div>
      
    <td>
    <div class="badge text-wrap" style="width: 6rem;">
    <?php echo $self_rating['a4'];?>
    </td>
    <!--Echo Self rating 4-->
    <td>
    <p><?php echo $self_rating['self_rating2']?></p>
    </td>
<td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="comment4" rows="2" required></textarea>
                      </div>
                  </td>
                  <td>
                        <!--Manager Rating-->
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="fr4" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
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
<!--Row5-->
<tr>
  <th scope="row">5</th>
  <td>
      <div class="badge text-wrap" style="width: 6rem;">
      <?php echo $self_rating['kra5'];?>
      </div>
  </td>
    <td>
      <div class="badge text-wrap" style="width: 6rem;">
        <?php echo $self_rating['a5'];?>
    </td>
    <!--Echo Self rating 5-->
    <td>
    <p><?php echo $self_rating['self_rating5']?></p>
    </td>
<td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="comment5" rows="2" required></textarea>
                      </div>
                  </td>
                  
                  <td>
                        <!--Manager Rating-->
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="fr5" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
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
                <th class="pr-3 text-light pt-2" scope="col">Manager Evaluation</th>
                <th class="pr-3 text-light pt-2" scope="col">Final Rating</th>
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
                    <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="comment6" rows="2" required ></textarea>
                      </div>
               </td>
               <td>
                   
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="fr6" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
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
                      <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="comment7" rows="2" required ></textarea>
                      </div>
               </td>
               <td>
                   
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="fr7" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
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
                <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="comment8" rows="2" required ></textarea>
                      </div>
               </td>
               <td>
                   
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="fr8" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
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
                <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="comment9" rows="2" required ></textarea>
                      </div>
               </td>
               <td>
                   
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="fr9" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
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
                <td>
                      <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="comment10" rows="2" required ></textarea>
                      </div>
               </td>
               <td>
                   
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                  </div>
                  <select class="custom-select" name="fr10" id="inputGroupSelect01" required data-toggle="tooltip" data-placement="bottom" title="1-Need Improvement
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
              </table>
              <div class="text-center">
                  <input type='hidden' name='emp_no' value="<?php echo $emp_no?>">
                  <hr size="30"  class="border border-primary">
        <button type="submit" class="btn btn-primary btn-lg" name="btnSubmit">Submit</button>
        </div>

          </form>
          
<?php 
}
?>
        
      </div>
      
     

  </div>
</body>
</html>
