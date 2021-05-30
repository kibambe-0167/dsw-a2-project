<?php
  // this code manages the user profile. they can delete and edit their account here
  // start a session to send data and information.
  session_start();
  // echo "<br/>Session ID:" . session_id() . "<br/><br/>";
  // include("./get_usr_pro.php"); // this file get all projects from user db.
?>

<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php echo ucwords( $_SESSION["firstname"] ); ?> | Profile
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../icon.ico" />

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/pro_details.css">
    <link rel="stylesheet" href="../css/p_snippet.css">

  </head>
  <body>

    <!-- header of the page. -->
    <header >
      <div class="container-fluid row" id="header" >
        <!-- logo -->
        <div class="col-md-3 col-sm-3 col-xs-3 bar" >
          <a href="./main.php" class="nav-link" >
            <!-- Logo  -->
            <img id="logo" src="../logo.png" alt="logo picture" />
          </a>

          <span class="" id="menu_btn" type="button" data-toggle="collapse" data-target="#nav_mobile" >
            <!-- Collapse --> 
            <i class="fa fa-bars"></i>
          </span>
        </div>
        <!-- navbar links,  -->
        <div id="nav_large" class="col-md-9 col-sm-9 col-xs-9" >
          <ul class="nav" id="nav-link-bs"  >
            <li class="nav-item" >
              <a href="./main.php" class="nav-link" >Home</a>
            </li>

            <li class="nav-item" >
              <a href="./profile.php" class="nav-link active_link" >Profile</a>
            </li>

            <li class="nav-item" >
              <a href="./contactus.php" class="nav-link" >Contact us</a>
            </li>

            <li class="nav-item" >
              <a href="./aboutus.php" class="nav-link" >About us</a>
            </li>
          </ul>
        </div>        
        
      </div>
       
      <!-- the menu for the mobile version of the code. -->
      <div class="collapse" id="nav_mobile">
        <div >
          <a href="./main.php" class="nav-link nav_link_rad_start" >
          <i class="fa fa-home" ></i> Home
          </a>
        </div>

        <div >
          <a href="./profile.php" class="nav-link active_link_m" >
          <i class="fa fa-user" ></i> Profile
          </a>
        </div>

        <div >
          <a href="./contactus.php" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact us
          </a>
        </div>

        <div >
          <a href="./aboutus.php" class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp About us
          </a>
        </div>
      </div>

      <!-- <div class="wrap" style="display: none;"></div> -->
    </header>
    <div class="wrap" style="display: none;"></div>


    <div id="usr_prof_msg" class="messages" >
      <?php echo $_SESSION["up_usr_msg"]; unset( $_SESSION["up_usr_msg"] ); ?>
    </div>

    <!-- contains the details of current logged in user. -->
    <div class="container" id="student_profile" >
      <div >
        <?php echo ucwords( $_SESSION["firstname"]  ); ?>
        <?php echo ucwords( $_SESSION["lastname"] ); ?>

        <p > <?php echo ucwords( ( $_SESSION["school_email"] )); ?> </p>
      </div>
      
      <div class = "div_btn" >
        <a href="./pro_form.php" class="nav-link" >
          <i class="fa fa-upload" ></i> Upload Project
        </a>        
      </div>

      <div class = "div_btn" >
        <a href="./edit_stud_acc.php?student_id=<?php echo $_SESSION["student_id"]; ?>" class="nav-link" >
          <i class="fa fa-edit" ></i> Edit Account
        </a>        
      </div>

      <div class = "div_btn" >
        <a href="../del/del_user_acc.php?student_id=<?php echo $_SESSION["student_id"]; ?>" class="nav-link" >
          <i class="fa fa-trash"></i> Delete Account
        </a>
      </div>

      <div class = "div_btn" >
        <a href="./log-out_student.php?student_id=<?php echo $_SESSION["student_id"]; ?>" class="nav-link" >
          <i class="fa fa-sign-out"></i> Sign out
        </a>
      </div>

    </div>

    <!-- this contains the project of the user. -->
    <div class="" id="usr_projects">
      <?php include("./get_usr_pro.php"); // this file get all projects from user db. ?>
    </div>

    <!-- this is the footer -->
    <footer class="row">
      <div class="container-fluid col-md-6" id="social_med">
        <span >
          <a href="https://touch.facebook.com/U-Innovate-104260611862082/?ref=bookmarks" target="_blank">
            <i class="fa fa-facebook" >
            </i>
          </a>
        </span>
  
        <span >
          <a href="https://www.linkedin.com/company/u-innovate" target="_blank">
            <i class="fa fa-linkedin"></i>
          </i>
          </a>
        </span>
  
        <span >
          <a href="https://twitter.com/NovateUin" target="_blank">
            <i class="fa fa-twitter-square"></i></i>
          </a>
        </span>

        <span >
          <a href="https://www.instagram.com/uin.novate/" target="_blank">
            <i class="fa fa-instagram"></i></i>
          </a>
        </span>
      </div>

      <div id="footer_details" class="container col-md-6" >
        <span >
          <a href="#"> About us</a>
        </span>
        |
        <span >
          <a href="#">
            Contact us
            <i class="fa fa-phone" ></i>
          </a>
        </span>
      </div>

    </footer>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>