

<?php 

  session_start(); // start a session

  // echo $_SESSION["savvy_id"];
?>

<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php
        echo ucwords( $_SESSION["savvy_fname"] ) . " | main page ";
      ?>
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
    <link rel="stylesheet" href="../css/p_snippet.css">

  </head>
  <body>

    <!-- header section of this page. -->
    <header >
      <div class="container-fluid row" id="header" >
        <!-- logo -->
        <div class="col-md-3 col-sm-3 col-xs-3 bar">
          <a href="./main_savvy.php" class="nav-link" >
            <!-- Logo -->
            <img  id="logo" src="../logo.png" alt="logo picture" />
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
              <a href="./main_savvy.php" class="nav-link" >Home</a>
            </li> 
            <li class="nav-item" >
              <a href="./savvy_profile.php" target="blank" class="nav-link" >Profile</a>
            </li>
            <li class="nav-item" >
              <a href="./contactus.php" target="blank" class="nav-link" >Contact</a>
            </li>
            <li class="nav-item" >
              <a href="./aboutus.php" target="blank" class="nav-link" >About</a>
            </li>
          </ul>
        </div>        
        
      </div>
       
      <!-- the menu for the mobile version of the code. -->
      <div class="collapse" id="nav_mobile">
        <div >
          <a href="./main_savvy.php" class="nav-link nav_link_rad_start" >
          <i class="fa fa-home" ></i> Home
          </a>
        </div>

        <div >
          <a href="./savvy_profile.php" target="blank" class="nav-link" >
          <i class="fa fa-user" ></i> Profile
          </a>
        </div>

        <div >
          <a href="./contactus.php" target="blank" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact
          </a>
        </div>

        <div >
          <a href="./aboutus.php" target="blank" class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp; About
          </a>
        </div>
      </div>

      <!-- <div class="wrap" style="display: none;"></div> -->
    </header>
    <div class="wrap" style="display: none;"></div>



    <!-- contains messages from other files. -->
    <div id="feedback" class="container messages" >
      <?php echo $_SESSION["update_msg"]; ?>
    </div>



    <!-- contains the details of current logged in user. -->
    <div class="container" id="savvy_profile" >
      <div >
        <?php echo ucwords( $_SESSION["savvy_fname"] ); ?>
        <?php echo ucwords( $_SESSION["savvy_lname"] ); ?>
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





    <!-- this is the footer of the page. -->
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