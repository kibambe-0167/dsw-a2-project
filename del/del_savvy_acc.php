

<?php
  session_start(); // start a session to send data and information.

  include("../config/connection.php");

  // echo $_SESSION["savvy_id"] . " | " . $_SESSION["savvy_fname"] . " | " . $_SESSION["savvy_lname"] . " | " . $_SESSION["savvy_email"];

  $id = strtolower( $_SESSION["savvy_id"] );
  $email = strtolower( $_SESSION["savvy_email"] );

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
              <a href="../app/savvy_profile.php" class="nav-link active_link" >Profile</a>
            </li>
            <li class="nav-item" >
              <a href="../app/contactus.php" target="blank" class="nav-link" >Contact</a>
            </li>
            <li class="nav-item" >
              <a href="../app/aboutus.php" target="blank" class="nav-link" >About</a>
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
          <a href="../app/savvy_profile.php" class="nav-link active_link_m" >
          <i class="fa fa-user" ></i> Profile
          </a>
        </div>

        <div >
          <a href="../app/contactus.php" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact
          </a>
        </div>

        <div >
          <a href="../app/aboutus.php" class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp; About
          </a>
        </div>
      </div>

      <!-- <div class="wrap" style="display: none;"></div> -->
    </header>
    <div class="wrap" style="display: none;"></div>





    <div class="container" >
      <h2 >Delete Public Account</h2>
      <form action="./del_savvy_acc.php" method="post">
        <div class="input-group">
          <input class="form-control" type="email" name="email" placeholder="Enter email to delete account" id="email">
        </div>

        <div class="input-group" >
          <input class="form-control" type="submit" name="submit" value="Confirm" />
          <input class="form-control" type="reset" name="reset" />
        </div>
      </form>
    </div>



    <div class="container" id="del_savvy" > 
      <?php
        
        if( isset( $_POST["submit"]) ) {
          $usr_email = strtolower( $_POST["email"] ); // get form data
          if( !empty( $id ) && !empty( $email ) && !empty($usr_email) ) { 
            // echo $id . " | " . $email. " | " .$usr_email."<br/>";
            // query to get user data
            $query = "delete from Savvy where id='$id' and email='$usr_email'";
            // echo $query;

            if( mysqli_query( $connObj, $query ) ) {
              $_SESSION["savvy_del_msg"] = "<span class='success'>Account successfully deleted</span>";
              // send user to index page.
              header("location:../index.php");
            }
            else {
              // $_SESSION["savvy_del_msg"] = "<span class='error'>Error: Failed To Delete Account</span>";
              echo "<span class='error'>Error: Failed To Delete Account<br/>". mysqli_error( $connObj )."</span>";
            }
          }
        }

      ?>
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
          <a href="https://github.com/kibambe-0167/dsw-a2-project.git" target="_blank">
            <i class="fa fa-github"></i>
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