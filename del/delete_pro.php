

<?php // delete  a project from db.
  session_start(); // start a session.
  include("../config/connection.php"); // connection to db.
  
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Delete Project</title>
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
              <a href="../app/main.php" class="nav-link" >Home</a>
            </li>

            <li class="nav-item" >
              <a href="../app/profile.php" class="nav-link active_link" >Profile</a>
            </li>

            <li class="nav-item" >
              <a href="../app/contactus.php" class="nav-link" >Contact us</a>
            </li>

            <li class="nav-item" >
              <a href="../app/aboutus.php" class="nav-link" >About us</a>
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
          <a href="../app/profile.php" class="nav-link active_link_m" >
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

    
    <div class="container" id="validate_usr" >
      <h2 >Enter Password To Delete Project</h2>
      <form action="./delete_pro.php?project_id=<?php echo $_GET["project_id"]; ?>" method="post">
        <div class="input-group" >
          <input class="input-group-text" type="password" name="passwd" id="passwd" placeholder="Enter password to continue" required autofocus >
        </div>

        <div class="input-group" >
          <input class="btn" type="submit" name="validate" value="Validate">
          <button class="btn" >
            <a href="../app/profile.php">Cancel</a>
          </button>
        </div>
      </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>



<?php

  // if btn is defined and clicked.
  if( isset( $_POST["validate" ] ) ) {
    if( !empty( $_POST["passwd"] ) ) {
      // echo "PW not empty";
      $passwd = $_POST["passwd"]; // echo $passwd;
      $email = $_SESSION["school_email"]; // echo $_SESSION["school_email"];

      // make query to check if passwd are the same.
      $pw_q = "select password from student where school_email='$email' and password='$passwd'";

      // if the password provided matches the current user, proceed to delete user project
      if($passwd===mysqli_fetch_assoc( mysqli_query( $connObj, $pw_q ) )["password"] ) {
        // if the user the project is defined and set.
        if( isset( $_GET["project_id"] ) ) {
          // echo $_GET["project_id"]; // echo $_SESSION["student_id"];

          $id = $_GET["project_id"];

          // make query to delete project from db.
          $query = "delete from Project where id = '$id'";

          // if query is successfully runned
          if( mysqli_query( $connObj, $query ) ) {
            echo "Successfully deleted project";
          }
          else {
            echo "Error deleting project:<br/>". mysqli_error( $connObj )."<br/>";
          }
        }
      }

      else { echo "Wrong password. Please enter the password."; }
    }
    else { echo "Please Provide Passwd to continue"; }
  }

?>