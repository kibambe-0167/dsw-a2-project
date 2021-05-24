

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

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/p_snippet.css">
  </head>
  <body>

    <div class="container" >
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
      
    




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>