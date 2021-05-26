


<?php
  session_start(); // start a session.

  include("../config/connection.php"); // include db connection.

  if( $connObj ) { // echo "Connected";
    $student_id = $_GET["student_id"];
    echo $student_id;
  }
  else {
    $err_conn = "<div class='error' id='err_conn' >
      <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
      </h2>
    </div>
    ";
    
    die( "Error: " . mysqli_connect_error());
  }
?>