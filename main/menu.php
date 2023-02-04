<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" role="navigation">
      <div class="container">
          <a class="navbar-brand" href="welcome.php"><img src="main/img/gtlogo.png"/> Performance Appraisal Management System</a>
          <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
          </button>
          <div class="collapse navbar-collapse" id="exCollapsingNavbar">

              <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                  <li class="pr-3 text-light pt-2"><?php echo $_SESSION['emp_name']?></li>
                  <li >
                      <button type="submit" id="signout"class="btn btn-light"><a href="reset_password.php">Reset Password</a> <span class="caret"></span></button>
                      <button type="submit" id="signout"class="btn btn-light"><a href="logout.php">Sign out</a> <span class="caret"></span></button>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
 <br/>
 <br/>
 <br/>
 <br/>
 <h4 style="color:#007bff"><marquee> PAMS has been extended to April 28, 2019 till 4 PM after that the portal will be deactivated. </marquee></h4> 
 