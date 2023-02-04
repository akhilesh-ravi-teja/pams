<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('session.gc_maxlifetime', 3600);
session_start();
if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
   echo'<div class="alert alert-success">'.$msg.'</div>';
}

include "inc/pro-con.php";
// $con = mysqli_connect("localhost", "root", "", "pms");
if (isset($_POST['submit'])) {
  $txtUser = $_POST['username'];
  $txtPass = $_POST['password'];

  $query = "select *, (SELECT count(*) FROM `emp_master` where mgr_no='$txtUser') as emp_count from emp_master WHERE emp_no = '$txtUser' && password = '$txtPass' limit 1";
  $result =  mysqli_query($con, $query);
  $_SESSION['username'] = $txtUser;

  $user_details = mysqli_fetch_assoc($result);
  if($user_details!==null){
  //var_dump($user_details);

  $_SESSION['manager'] = $user_details['mgr_no'];
  $_SESSION['emp_count'] = $user_details['emp_count'];
  $_SESSION['emp_name'] = $user_details['name'];
}
  $num_rows = mysqli_num_rows($result);
  if ($num_rows > 0) {

    echo "connected";
    header('Location:welcome.php');
  } else {
    $error = "Username or password is incorrect!";
  }
  // $query = "select * from emp_pms WHERE emp_no = ''{txtUser}' and emp_pass = '{txtPass}'";
  //$result =  mysqli_query($con, $query);
  // code...
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include('main/header.php');
?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <center><img src="main/img/GTET.jpg" /></center>
        <div class="card border-primary bg-lightcard-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="" method="POST">
              <div class="form-label-group">
                <p style="color:red;"><?php 
                if(isset($error) && !empty($error)){
                  echo $error;
                }
                
                ?></p>
                <input type="text" id="text" name="username" class="form-control" placeholder="User Name" required autofocus>
              </div>
              <br>
              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">Sign in</button>
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