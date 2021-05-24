

<?php
  // this handles reading of all projects in the db.
  // start a session for sending data back and fourth.
  session_start();

  // include the db connection objects.
  include("../config/connection.php");



  function get_project_func() {
    // include the db connection objects.
    include("../config/connection.php");

    if( $connObj ) { // connection to db was successful.
      // echo "All well";
  
      // make query to read all available projects in the db.
      $query="select * from Project";
      $result = mysqli_query( $connObj, $query );
  
      // if there is some projects in the db.
      if( mysqli_num_rows( $result ) > 0 ) {
  
        // print_r( $result );
        // $_SESSION["pro_query"] = $result;
  
        $project = array();
  
        // turn into associative array
        while( $projects = mysqli_fetch_assoc( $result) ) {
          array_push( $project, $projects );
        }
  
        // echo json_encode( ["data" => $project] ); exit;
        return $project;
      }
  
      else { // if there is no projects and the db is empty.
        // echo "No project found";
        return null;
      }
    }
  
    else {  // was a problem with the connection.
      $err_conn = "<div id='err_conn' >
        <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
        </h2>
      </div>
      ";
      
      die( "Error: " . mysqli_connect_error());
      // make a session to send back message
      // $_SESSION["db_con_msg"] = "Error: Cant connect to db";
    }
  }

  
?>