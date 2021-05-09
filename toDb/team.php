
<?php
  // start a session to transfer data and information.
  session_start();
  include( "connection.php"); // includes connection to db.

  if( $connObj ) {
    // echo "Successfully connnected to db.";
    if( isset($_POST["submit"]) ) { // if btn is defined and clicked.
      // echo "btn is clicked";
      // check if required field are not empty.
      if( !empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["email"]) ) {
        echo "Field are NOT empty";
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        // echo $fname . " " . $lname . " " . $email;

        // needs to get the project id number
        // id number of this user, and update the team_project table
      }
      // when some fields are empty.
      else {
        echo "Some fields are empty";
        // make session variables, to send error messages back.
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