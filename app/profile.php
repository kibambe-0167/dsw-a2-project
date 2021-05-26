

<?php
  // this code manages the user profile. they can delete and edit their account here
  // start a session to send data and information.
  session_start();
  // echo "<br/>Session ID:" . session_id() . "<br/><br/>";
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Profile Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
        <div class="col-md-3 col-sm-3 col-xs-3 bar" id="logo">
          <a href="./main_savvy.php" class="nav-link" >Logo</a>

          <span class="bg-warning" id="menu_btn" type="button" data-toggle="collapse" data-target="#nav_mobile" >
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
              <a href="./pro_form.php" class="nav-link" >
                Upload Project
              </a>
            </li>

            <li class="nav-item" >
              <a href="./contactus.php" class="nav-link" >Contact Us</a>
            </li>

            <li class="nav-item" >
              <a href="./aboutus.php" class="nav-link" >About Us</a>
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
          <a href="./profile.php" class="nav-link" >
          <i class="fa fa-upload" ></i> Upload Project
          </a>
        </div>

        <div >
          <a href="./contactus.php" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact Us
          </a>
        </div>

        <div >
          <a href="./aboutus.php" class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp About Us
          </a>
        </div>
      </div>

      <!-- <div class="wrap" style="display: none;"></div> -->
    </header>
    <div class="wrap" style="display: none;"></div>

<!-- 
    <header >
      <div >
        <ul >
        <li>
          <a href="../del/del_user_acc.php?student_id=< ?php echo $_SESSION['student_id']; ?>" >Delete Profile</a>
        </li>

        <li>
          <a href="?student_id=< ?php echo $_SESSION['student_id']; ?>" >Edit Profile</a>
        </li>

        <li>
          <a href="./log-out_student.php?student_id=< ?php echo $_SESSION['student_id']; ?>" >Sign-out</a>
        </li>
        </ul>
      </div>
    </header> -->


    <div >
      <?php
        echo $_SESSION["student_id"] . " | ";
        echo $_SESSION["firstname"] . " | ";
        echo $_SESSION["lastname"] . " | ";
        echo $_SESSION["school_email"] . " | ";
        echo $_SESSION["current_year"] . " | ";
        echo $_SESSION["department"] . " | ";
      ?>
    </div>


    <!-- contains the details of current logged in user. -->
    <div class="container" id="savvy_profile" >
      <div >
        <?php echo ucwords( $_SESSION["student_id"]  ); ?>
        <?php echo ucwords(  $_SESSION["firstname"] ); ?>
      </div>
      
      <div>
        <?php echo ucwords( $_SESSION["savvy_email"] ); ?>
      </div>

      <div class = "div_btn" >
        <a href="./edit_savvy_acc.php?savvy_id=<?php echo $_SESSION["savvy_id"]; ?>" class="nav-link" >
          <i class="fa fa-edit" ></i> Edit
        </a>        
      </div>

      <div class = "div_btn" >
        <a href="../del/del_savvy_acc.php?savvy_id=<?php echo $_SESSION["savvy_id"]; ?>" class="nav-link" >
          <i class="fa fa-trash"></i> Delete
        </a>
      </div>

      <div class = "div_btn" >
        <a href="./log-out_student.php?savvy_id=<?php echo $_SESSION["savvy_id"]; ?>" class="nav-link" >
          <i class="fa fa-sign-out"></i> Sign out
        </a>
      </div>

    </div>


    <!-- this contains the project of the user. -->
    <div id="usr_pro">
      <?php
        include("./get_usr_pro.php"); 
      ?>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>