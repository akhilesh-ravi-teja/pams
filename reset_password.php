<?php
include("common/constant.php");
include "inc/pro-con.php";
session_start();
// include("config.php");
$user=$_SESSION['username'];
//echo $user;
if (isset($_POST['rstsubmit'])) {
  $txtPass1 = $_POST['pass1'];
  $txtPass2 = $_POST['pass2'];
  
  $query = "UPDATE emp_master SET password='$txtPass1' where emp_no='$user'";
  $result =  mysqli_query($con, $query);
  if($result){
  $msg= "Your Password has been changed successfully!";
  header("Location:".$BASE_URL."/emplogin.php?msg=$msg");
  }
  else {
      echo "Not changed";
  }
} 
 
  // $query = "select * from emp_pms WHERE emp_no = ''{txtUser}' and emp_pass = '{txtPass}'";
  //$result =  mysqli_query($con, $query);
  // code...
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card border-primary bg-lightcard-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Reset Passoword</h5>
              <form class="form-signin" action="" method="POST">
                <div class="form-label-group">
                  <label for="inputPassword">New Password</label>
                  <input type="password" name="pass1" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
                  <br>
                <div class="form-label-group">
                  <label for="inputPassword1">Confirm Password</label>
                  <input type="password" name="pass2" id="inputPassword1" class="form-control" placeholder="Password" required>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" name="rstsubmit" type="submit">Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
