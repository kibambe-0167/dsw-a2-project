<?php
  session_start(); /// start a session.
  include("../config/connection.php"); // db connection object
  $project_id = $_GET["project_id"];
  // echo $project_id;
?>


<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php echo ucwords( $_SESSION["firstname"] ); ?> | Add Team Member
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
        <div class="col-md-3 col-sm-3 col-xs-3 bar" id="logo">
          <a href="./main_savvy.php" class="nav-link" >Logo</a>

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
              <a href="./profile.php" class="nav-link" >
                Profile
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


    <!-- this is where you add the team member of the projects. -->
    <div id="team_form" class="container" >
      <h2 >Add Team Member To Project</h2>
      <!-- this is uploading a team members details to db. -->
      <form action="./add_member.php?project_id=<?php echo $_GET["project_id"]; ?>" method="post">
        <div class="input-group" >
          <input class="form-control" type="text" name="fname" placeholder="Enter a team members name" value="Surprise" >
        </div>

        <div class="input-group" >
          <input class="form-control"  type="text" name="lname" placeholder="Enter a team members last name" value="Mumba"  >
        </div>

        <div class="input-group" >
          <input class="form-control" type="email" name="email" placeholder="Enter a team members email" value="mumba@gmail.com"  >
        </div>

        <div class="input-group" >
          <input class="btn" type="submit" name="submit" value="Add Member" >
          <button class="btn" type="reset" >
            <a href="./profile.php"> Discard </a>
          </button>
        </div>
      </form>
    </div>



    <?php
      if( $connObj ) {

        if( isset( $_POST["submit"]) ) {
          $fname = $_POST["fname"]; $lname = $_POST["lname"]; $email = $_POST["email"];
          
          if( !empty( $fname ) && !empty( $lname ) && !empty( $email ) && preg_match( "/^[a-z]/i", $fname) && preg_match( "/^[a-z]/i", $lname)  ) { // echo "all well";
            $project_id = $_GET["project_id"];
            // echo $fanme . $lname . $email . $project_id;

            $query = "insert into Team_member( firstname, lastname, email) values('$fname', '$lname', '$email')";

            if( mysqli_query( $connObj, $query ) ) { // upload user to table.
              $last_id = mysqli_insert_id( $connObj ); // get id of last inserted data.

              // update user in team_member table, after that add user to team member table.
              $query1 = "insert into member_project( member_id, project_id ) values('$last_id', '$project_id')";

              if( mysqli_query( $connObj, $query1 ) ) {
                echo "<div class='messages' id='team_msg1' > <span class='success'>Successfully added user</span> </div>";
              }
              else {
                echo "<div class='messages' id='team_msg2' >  <span class='error'>Error: failed to update user.</span> </div>";
              }
            }
            else {
              echo "<div class='messages' id='team_msg3' > <span class='error'>Error: failed to add user</span> </div>";
            }
          }
          else {
            echo "<div class='messages' id='team_msg4' > <span class='error'>Please Provide correct values</span> </div>";
          }
        }  
       
      }
      else { // there was an error connecting to the db.
        $err_conn = "<div id='err_conn' >
          <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
          </h2>
        </div>
        ";
        
        die( "Error: " . mysqli_connect_error());
      }
    ?>
      


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