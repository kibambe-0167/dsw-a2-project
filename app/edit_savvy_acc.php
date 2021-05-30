<?php session_start(); // start a session.  ?>

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
              <a href="./savvy_profile.php" class="nav-link active_link" >Profile</a>
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
          <a href="./savvy_profile.php" class="nav-link active_link_m" >
          <i class="fa fa-user" ></i> Profile
          </a>
        </div>

        <div >
          <a href="./contactus.php" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact
          </a>
        </div>

        <div >
          <a href="./aboutus.php" class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp; About
          </a>
        </div>
      </div>

      <!-- <div class="wrap" style="display: none;"></div> -->
    </header>
    <div class="wrap" style="display: none;"></div>

    <div class="container" >
      <h2 >
        Update Account Details
      </h2>

      <form action="./edit_savvy_acc.php" method="post">
        <p class="error" >
          <i style="font-weight: bolder;" >*</i> are required fields
        </p>
        <label for="fname" >Enter firstname to change</label> <i class="error" >*</i>
        <div class="input-group" >
          <input placeholder="Enter first name" class="form-control" type="text" name="fname" id="" value="<?php echo $_SESSION["savvy_fname"]; ?>" required >
        </div>

        <label for="lname" >Enter lastname to change</label> <i class="error" >*</i>
        <div class="input-group" >
          <input placeholder="Enter last name" class="form-control" type="text" name="lname" id="" value="<?php echo $_SESSION["savvy_lname"]; ?>" required>
        </div>

        <label for="email" >Enter email to change</label> <i class="error" >*</i>
        <div class="input-group" >
          <input placeholder="Enter email" class="form-control" type="email" name="email" id="" value="<?php echo $_SESSION["savvy_email"]; ?>" required >
        </div>

        <div class="input-group" >
          <input class="form-control" type="submit" name="submit" id="submit" value="Update">
          <input class="form-control" type="reset" name="reset" id="reset" value="Discard">
        </div>

      </form>
    </div>

    <div class="container" >

    <?php

      include("../config/connection.php");

      // echo $_SESSION["savvy_id"] . " | " . $_SESSION["savvy_fname"] . " | " . $_SESSION["savvy_lname"] . " | " . $_SESSION["savvy_email"];

      if( isset( $_POST["submit"] ) ) {

        if( $connObj ) { // echo $id . $email;
          $fname = $_POST["fname"]; $lname = $_POST["lname"];
          $email = $_POST["email"]; $id = $_SESSION["savvy_id"];

          if( !empty( $fname) && !empty($lname) && !empty($email) && !empty($id) ) {
            // echo $fname.$lname.$email.$id;
    
            // query to get all user data
            $query = "update Savvy set firstname='$fname', lastname='$lname', email='$email' where id='$id'";
            // run query and get result.
              if( mysqli_query($connObj, $query )) {
                echo "<span class='success'>Account Successfully Updated</span>";
                
                $_SESSION["update_msg"] = "<span class='success'>Account Successfully Updated</span>";

                // make query to check if email is available in the db.
                $query = "select * from Savvy where id='$id' limit 1";
                $result = mysqli_query( $connObj, $query ); // run query

                // run the query in the db obj
                if( $result ) { // print_r( $result );

                  $savvy = mysqli_fetch_assoc( $result );
                  // change curren user details.
                  // make session variables to send this data to all pages about
                  // the current user.
                  $_SESSION["savvy_id"] = $savvy["id"];
                  $_SESSION["savvy_fname"] = $savvy["firstname"];
                  $_SESSION["savvy_lname"] = $savvy["lastname"];
                  $_SESSION["savvy_email"] = $savvy["email"];

                  // redirect to profile page
                  header("location:./savvy_profile.php");
                }

              }
              else {
                echo "<span class='error'>Error: Failed To Update Account<br/>". mysqli_error( $connObj ) ."</span>";
              }
          }

          
        }
        else { // if there is an error in connecting to db
          $err_conn = "<div id='err_conn' >
            <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
            </h2>
          </div>
          ";
          
          die( "Error: " . mysqli_connect_error());
          // session variable to send infor about error in connecting to db.
          // $_SESSION["db_err_msg"] = "Error: with database";
        }
      }

    ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>