

<?php
  session_start();

  include("connection.php");

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
      if( !empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["email"]) ) {
        // echo "field not empty";
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        // echo $fname . " " . $lname . " " . $email;

        // query to signup user or put user data in the database.
        $query = "insert into Savvy(firstname, lastname, email) values('$fname', '$lname', '$email' )";

        // check if user data was successfully added.
        // set session to send back successful message.
        if( mysqli_query( $connObj, $query ) ) {
          echo "Successfully registered user";
          // $_SESSION["reg_msg"] = "Successfully registered user";
        }
        // else if user was not registered.
        else {
          echo "Error: " . $query . "<br/>" . mysqli_error( $connObj );
          // $_SESSION["reg_msg"] = "Error: " . $query . "<br/>" . mysqli_error( $connObj );
        }
      }
      else { // make sessions and send back error messages if field are empty.
        echo "Some fields are empty.";
      }
    }
  }
?>