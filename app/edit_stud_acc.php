

<?php
  session_start(); // start a session.

  include("../config/connection.php"); // include db connection.
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
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
          <a href="./main_savvy.php" class="nav-link" >
            <!-- Logo -->
            <img id="logo" src="../logo.png" alt="logo pic" />
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

    
    <div id="stu_up_prof" class="container" >
      <h3 >Edit student account details</h3>
      <p class="error" >
        <i style="font-weight: bolder;" >*</i> are required
      </p>
      <form action="./edit_stud_acc.php" method="post">
        <label for="fname" >Firstname <i class="error" >*</i>  </label>
        <div  class="input-group">
          <input placeholder="Enter firstname" class="form-control" type="text" name="fname" id="fname" value="<?php echo $_SESSION["firstname"]; ?>" required>
        </div>

        <label for="lname" >Lastname <i class="error" >*</i>  </label>
        <div  class="input-group">
          <input placeholder="Enter lastname" class="form-control" type="text" name="lname" id="lname" value="<?php echo $_SESSION["lastname"]; ?>" required>
        </div>

        <label for="s_email" >Email <i class="error" >*</i> </label>
        <div  class="input-group">
          <input placeholder="Enter school email" class="form-control" type="email" name="s_email" id="s_email" value="<?php echo $_SESSION["school_email"]; ?>" required>
        </div>

        <label for="year" >Current Year <i class="error" >*</i>  </label>
        <div  class="input-group">
          <input placeholder="Enter current year" class="form-control" type="number" name="year" id="year" value="<?php echo $_SESSION["current_year"]; ?>" min="1" max="4" oninput="validity.valid||(value='');" required>
        </div>

        <label for="department" >Department <i class="error" >*</i>  </label>
        <div  class="input-group">
          <input placeholder="Enter department" class="form-control" type="text" name="department" id="department" value="<?php  echo $_SESSION["department"]?>" required>
        </div>

        <div  class="input-group">
          <input class="btn" type="submit" name="submit" id="submit" value="Upload Changes">
          <input class="btn" type="reset" value="Discard">
        </div>
      </form>
    </div>


    <?php

      if(isset( $_POST["submit"]) ) {
        if( $connObj ) { // echo "Connected";
          $student_id = $_GET["student_id"];
          
          // get data from form
          $fname = $_POST["fname"]; $lname = $_POST["lname"]; $email = $_POST["s_email"];
          $year = $_POST["year"]; $depart = $_POST["department"];

          //  && preg_match("/^[a-z]$/i", $lname) > 0
          if( 
            !empty($fname) && !preg_match("/^[a-z]$/i", $fname) &&
            !empty($lname) && !preg_match("/^[a-z]$/i", $lame) &&
            !empty($email) && !preg_match("/^[a-z]\d\w$/i", $email) &&
            !empty($year) && !empty($depart)
            ) {
              $student_id = $_SESSION["student_id"];
              // echo $student_id;
            // make query to update user details.
            $query = "update student set firstname='$fname', lastname='$lname', school_email='$email', current_year='$year', department='$depart' where student_id='$student_id'";

            if( mysqli_query( $connObj, $query ) ) { // echo "1st fine";
              
              // get data from database and change session variables.
              $query_new = "select * from student where student_id='$student_id'";
              $result = mysqli_query( $connObj, $query_new );
              // run the query to get updated data.
              if( mysqli_num_rows( $result ) == 1 ) { // echo "2rd fine";
                $user = mysqli_fetch_assoc( $result );
                // print_r( $user );
                // update session with updated user data.
                $_SESSION["student_id"] = $user["student_id"];
                $_SESSION["firstname"] = $user["firstname"];
                $_SESSION["lastname"] = $user["lastname"];
                $_SESSION["school_email"] = $user["school_email"];
                $_SESSION["current_year"] = $user["current_year"];
                $_SESSION["department"] = $user["department"];
                // echo "ldkfsldfn";
                // echo "<span class='success'>Successfully updated</span>";
                $_SESSION["up_usr_msg"] = "<span class='success'>Successfully updated</span>";

                header("location:./profile.php"); // redirect to user profile.
              }
              else {
                // echo "<span class='error'>Failed to get new user data</span>";
                $_SESSION["up_usr_msg"] = "<span class='error'>Failed to get new user data</span>";

                header("location:./profile.php"); // redirect to user profile.
              }

            }
            else {
              echo "<span class='error' >Error: Failed to update <br />" . mysqli_error( $connObj) . "</span>";

              $_SESSION["up_usr_msg"] = "<span class='error' >Error: Failed to update <br />" . mysqli_error( $connObj) . "</span>";

              header("location:./profile.php"); // redirect to user profile.
            }
          }
        }

        else { // can't connect to db.
          $err_conn = "<div class='error' id='err_conn' >
            <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
            </h2>
          </div>
          ";
          
          die( "Error: " . mysqli_connect_error());
        }

      }
      
      
    ?>


    <!-- this is the footer -->
    <!-- <footer class="row">
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

    </footer> -->

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>