

<?php 
  session_start(); // start a session.

  include("connection.php"); // call the connnection object.

  if( !$connObj ) {
    $err_conn = "<div id='err_conn' >
      <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
      </h2>
    </div>
    ";
    
    die( "Error: " . mysqli_connect_error());
  }

  else { // connection to DB was successful.s
    // echo "Connected";

    // if upload btn is cliked and defined.
    if( isset( $_POST["upload"] ) ) {

      // check if required field are not empty.
      if( !empty($_POST["name"]) && !empty($_POST["type"]) && !empty($_POST["desc"]) ) {
        // echo "required fields not empty....";
        $name = strtolower($_POST["name"]); strtolower($type = $_POST["type"]); 
        $desc = strtolower($_POST["desc"]); $link = $_POST["ext_link"];

        // echo $name . "<br/>" . $type . "<br/>" . $desc . "<br/>" . $link;

        $query = "insert into Project(pro_name, type, pro_desc, pro_ext_link) values('$names', '$type', '$desc', '$link' )";

        // run the query to register the project with the db.
        // also set uploading message via sessions.
        if( mysqli_query( $connObj, $query ) ) {
          echo "Project " . $name . " Successfully saved";
          // $_SESSION["upload_msg"] = "Project " . $name . " Successfully saved";
        }
        else {// if there was an error saving the message
          echo "Error saving project to db";
          $_SESSION["upload_msg"] = "Error saving project ".$name." to db";
        }
      }
      else {// some required field are empty
        echo "Some required fields are empty";
      }
    }
  }

?>