

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
        // echo "Email field NOT empty.";
        $email = strtolower( $_POST["email"] ); // make lowercase.

        // make query to check if email is available in the db.
        $query = "select * from Savvy where email='$email'";
        $result = mysqli_query( $connObj, $query ); // run the query in the db obj

        if( mysqli_num_rows( $result ) == 1 ) {
          // print_r( $result );
          $savvy = mysqli_fetch_assoc( $result );
          print_r( $savvy );

          // make session variables to send this data to all pages about
          // the current user.
          // $_SESSION["savvy_id"] = $savvy["id"];
          // $_SESSION["savvy_fname"] = $savvy["firstname"];
          // $_SESSION["savvy_lname"] = $savvy["lastname"];
          // $_SESSION["savvy_email"] = $savvy["email"];
        }

        else { // when email not found in db.
          echo "Email NOT found in db";
        }
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