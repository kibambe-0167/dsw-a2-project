

<?php
  // here we are managing the login of public users.

  // start a session, for sending information and data.
  session_start();

  include( "../db/connection.php"); // connection to db.

  // if connection  to db was successful.
  if( $connObj ) {
    // echo "Connection to db was okay";
    
    // when the submit btn is clicked...
    if( isset( $_POST["submit"] ) ) {
      // echo "btn clicked";

      // check for empty field of email.
      if( !empty( $_POST["email"] ) ) {
        echo "Email field not empty.";
      }
      else { // email field is empty
        echo "Email field is empty";
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
?>