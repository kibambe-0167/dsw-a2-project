


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

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/pro_details.css">
    <link rel="stylesheet" href="../css/p_snippet.css">

  </head>
  <body>

    
    <div class="container" >
      <form action="./edit_stud_acc.php" method="post">
        <label for="fname" >Firstname</label>
        <div  class="input-group">
          <input class="form-control" type="text" name="fname" id="fname" value="<?php echo $_SESSION["firstname"]; ?>">
        </div>

        <label for="lname" >Lastname</label>
        <div  class="input-group">
          <input class="form-control" type="text" name="lname" id="lname" value="<?php echo $_SESSION["lastname"]; ?>">
        </div>

        <label for="s_email" >Email</label>
        <div  class="input-group">
          <input class="form-control" type="email" name="s_email" id="s_email" value="<?php echo $_SESSION["school_email"]; ?>">
        </div>

        <label for="year" >Current Year</label>
        <div  class="input-group">
          <input class="form-control" type="number" name="year" id="year" value="<?php echo $_SESSION["current_year"]; ?>">
        </div>

        <label for="department" >Department</label>
        <div  class="input-group">
          <input class="form-control" type="text" name="department" id="department" value="<?php  echo $_SESSION["department"]?>">
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
          // $student_id = $_GET["student_id"];
          // echo $student_id;
          // echo $_SESSION["student_id"] . " | ";
          // echo $_SESSION["firstname"] . " | ";
          // echo $_SESSION["lastname"] . " | ";
          // echo $_SESSION["school_email"] . " | ";
          // echo $_SESSION["current_year"] . " | ";
          // echo $_SESSION["department"] . " | ";
          
          // get data from form
          $fname = $_POST["fname"]; $lname = $_POST["lname"]; $email = $_POST["s_email"];
          $year = $_POST["year"]; $depart = $_POST["department"];

          if( 
            !empty($fname) && preg_match("/^[a-z]+/i", $fname) &&
            !empty($lname) && preg_match("/^[a-z]+/i", $lname) &&
            !empty($email) && preg_match("/^[a-z][\d]\w/i", $email) &&
            !empty($year) && preg_match("/^[0-9]$/", $year) &&
            !empty($depart)
            ) {
              
            echo "all well here.";
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

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>