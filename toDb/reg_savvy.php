

<?php
  session_start();

  include("../config/connection.php");

  // if connection to database was not successful.
  if( !$connObj ) {
    $err_conn = "<div id='err_conn' >
      <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
      </h2>
    </div>
    ";
    
    die( "Error: " . mysqli_connect_error());
  }
  else {
    // echo "connection to db was successful";
    // if signup button is clicked and defined
    if( isset( $_POST["signup"]) ) {
      // echo "btn clicked...";
      $fname = strtolower($_POST["fname"]); 
      $lname = strtolower( $_POST["lname"]);
      $email = strtolower( $_POST["email"] );
      $con_email = strtolower( $_POST["con_email"]);
      if( !empty($fname) && preg_match("/^[a-z]/i", $fname )
        && !empty($lname) && preg_match("/^[a-z]/i", $lname )
        && !empty($email )  && !empty( $con_email ) ) {
        // echo "field not empty";
        // upload this details in lower case for easy searching.
        // echo $fname . " " . $lname . " " . $email;

        if( $email === $con_email ) {
          // needs to check if the email is already registered with another user.
          $email_q = "select * from Savvy where email='$email'";
          $email_re = mysqli_query( $connObj, $email_q );

          // if there is any match, inform user about the email been there.
          if( mysqli_num_rows( $email_re ) > 0 ) { 
            // session variable to send message: Email already registered.
            echo "EMAIL FOUND IN DB";
            $_SESSION["reg_msg"] = "Email used is already available.";

            header( "location:../index.php" );  // redirect to index page and send message back.
          }

          else { // proceed to add user to db.
            // query to signup user or put user data in the database.
            $query = "insert into Savvy(firstname, lastname, email) values('$fname', '$lname', '$email' )";

            // check if user data was successfully added.
            // set session to send back successful message.
            if( mysqli_query( $connObj, $query ) ) {
              // echo "Successfully registered user";
              $_SESSION["reg_msg"] = "<span class='success'>Successfully registered user</span>";

              header( "location:../index.php" );  // redirect to index page and send message back.
            }
            // else if user was not registered.
            else {
              echo "Error: " . $query . "<br/>" . mysqli_error( $connObj );
              $_SESSION["reg_msg"] = "<span class='error'>Error: " . $query . "<br/>" . mysqli_error( $connObj ) . "</span>";

              header( "location:../index.php" );  // redirect to index page and send message back.
            }
          }
        }
        else {
          $_SESSION["reg_msg"] = "<span class='error'>Email don't match</span>";
          header( "location:../index.php" );  // redirect to index page and send message back.
        }

      }

      else { // make sessions and send back error messages if field are empty.
        echo "Some fields are empty.";
        $_SESSION["reg_msg"] = "<span class='error'>Please fill in all required fields</span>";
        header( "location:../index.php" );  // redirect to index page and send message back.
      }
    }
  }
?>