

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

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/p_snippet.css">
   
  </head>
  <body>


  <div class="container" >
    <h2 >
      Update Account Details
    </h2>

    <form action="./edit_savvy_acc.php" method="post">
      <div class="input-group" >
        <input placeholder="Enter first name" class="form-control" type="text" name="fname" id="" value="<?php echo $_SESSION["savvy_fname"]; ?>" required >
      </div>

      <div class="input-group" >
        <input placeholder="Enter last name" class="form-control" type="text" name="lname" id="" value="<?php echo $_SESSION["savvy_lname"]; ?>" required>
      </div>

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
      
  </body>
</html>

