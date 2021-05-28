<?php
  // // // // TASK // // // // //  
  // 
  // make verify user before deleting the account.
  // 
  // // // // // // // /// // //
  // this code deletes a user account from the database.
  // start a session, to send data and messages.
  session_start();
  include("../config/connection.php"); // includes db connection.
?>

<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php echo ucwords( $_SESSION["firstname"] ); ?>
    </title>
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
        <div class="col-md-3 col-sm-3 col-xs-3 bar" >
          <a href="./main_savvy.php" class="nav-link" >
            <!-- Logo -->
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
              <a href="../app/main.php" class="nav-link" >Home</a>
            </li>

            <li class="nav-item" >
              <a href="../app/profile.php" class="nav-link" >
                Profile
              </a>
            </li>

            <li class="nav-item" >
              <a href="../app/contactus.php" class="nav-link" >Contact Us</a>
            </li>

            <li class="nav-item" >
              <a href="../app/aboutus.php" class="nav-link" >About Us</a>
            </li>
          </ul>
        </div>        
        
      </div>
       
      <!-- the menu for the mobile version of the code. -->
      <div class="collapse" id="nav_mobile">
        <div >
          <a href="../app/main.php" class="nav-link nav_link_rad_start" >
          <i class="fa fa-home" ></i> Home
          </a>
        </div>

        <div >
          <a href="../app/profile.php" class="nav-link" >
          <i class="fa fa-user" ></i> Profile
          </a>
        </div>

        <div >
          <a href="../app/contactus.php" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact Us
          </a>
        </div>

        <div >
          <a href="../app/aboutus.php" class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp About Us
          </a>
        </div>
      </div>

      <!-- <div class="wrap" style="display: none;"></div> -->
    </header>
    <div class="wrap" style="display: none;"></div>



    <div id="del_usr_acc" class="container" >
      <h2 >
          Deleting User Account
      </h2>
      <form action="./del_user_acc.php" method="post">
        <div class="input-group" >
          <input class="form-control" type="password" name="passwd" id="passwd" placeholder="Enter password to continue">
        </div>

        <div class="form-check" >
          <input class="btn" type="checkbox" name="no_yes" id="no_yes">
          <label for="yes">Else delete all project(s)</label>
        </div>

        <div class="input-group" >
          <input class="btn" name="submit" type="submit" value="Delete">
          <button class="btn" >
            <a href="../app/profile.php"> Discard </a>
          </button>
        </div>
      </form>
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



<?php

  if( isset( $_POST["submit"] ) ) {
    if( $connObj ) { // echo "in";
      $passwd = $_POST["passwd"];
      $usr = $_SESSION["school_email"]; $usr_id = $_SESSION["student_id"];
      $delete_project = $_POST["no_yes"]; // echo $usr_id;
      // echo $delete_project == "on";

      // // when password is not empty
      if( !empty( $passwd ) ) {
        // echo $passwd; echo $usr;

        // get the user in the data and check if password is correct
        $query = "select * from student where school_email='$usr' and password='$passwd' limit 1";
        // echo $query;
        $result = mysqli_query( $connObj, $query );

        // run query and check if user is in database.
        if( mysqli_num_rows( $result ) == 1 ) { // echo "User Found";
          // make query to delete account.
          $del_q = "delete from student where school_email='$usr' and password='$passwd'";
          // echo $del_q;
          // print_r( $re_q );

          if( mysqli_query( $connObj, $del_q ) ) { // echo "<br/>sldfnslkd";
            $_SESSION["del_usr_acc_msg"] = "<span class='success'>Account Successfully Deleted</span>";

            // if user agreed to delete all projects, deletes all projects.
            if( $delete_project == "on" ) { echo "going to delete project";
              // make query to delete all project that are under that usr.
              $pro_q = "delete from Project where student_id='$usr_id'";
              // $pro_re = mysqli_query( $connObj, $pro_q );

              if( mysqli_query( $connObj, $pro_q ) ) {
                echo "<span class='success'>". mysqli_affected_rows( $connObj ) . " project(s) successfully deleted</span>";
                $_SESSION["student_acc_del_msg"] = "<span class='success'>". mysqli_affected_rows( $connObj ) . " project(s) successfully deleted</span>";
                header( "location:../index.php" ); // redirect user to index page. and send feedback msg.
              }
              else {
                echo "<span class='error'>Error: Cannot Delete Projects.</span>";
                $_SESSION["student_acc_del_msg"] = "<span class='error'>Error: Cannot Delete Projects.</span>";
                header( "location:../index.php" ); // redirect user to index page. and send feedback msg.
              }
            }

            // session_destroy(); // destroy all sessions.
          }
          else {
            // echo "<div class='error'>Error in deleting account.<br/>" . mysqli_error( $connObj ) ."</div>";
            echo "<div class='error'>Error In Deleting Account.</div>";
          }
        }
        else {
          echo "<div class='error'>Please enter a correct password</div>";
        }

      }
      else {
        echo "<div class='error'>Please submit a password..!</div>";
      }
      
    }
  
    else { // if connection to db is no successful.
      $err_conn = "<div id='err_conn' >
        <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
        </h2>
      </div>
      ";
      
      die( "Error: " . mysqli_connect_error());
      // make a session to send back message
      // $_SESSION["db_con_msg"] = "Error: Cant connect to db";
    }
  }

  
?>