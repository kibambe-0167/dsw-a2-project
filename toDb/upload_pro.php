

<?php 
  session_start(); // start a session.

  include("../config/connection.php"); // call the connnection object.

  if( !$connObj ) {
    $err_conn = "<div id='err_conn' >
      <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
      </h2>
    </div>
    ";
    
    die( "Error: " . mysqli_connect_error());
  }

  else { // connection to DB was successful.// echo "Connected";

    // if upload btn is cliked and defined.
    if( isset( $_POST["upload"] ) ) {

      // check if required field are not empty.
      if( !empty($_POST["name"]) && !empty($_POST["type"]) && !empty($_POST["desc"]) ) {
        // echo "required fields not empty....";
        $name = strtolower($_POST["name"]); strtolower($type = $_POST["type"]); 
        $desc = strtolower($_POST["desc"]); $link = $_POST["ext_link"];
        $student_id = $_SESSION["student_id"];

        // echo $name . "<br/>" . $type . "<br/>" . $desc . "<br/>" . $link . "<br/>" . $student_id;

        $query = "insert into Project( student_id, pro_name, type, pro_desc, pro_ext_link) values( '$student_id', '$name', '$type', '$desc', '$link' )";

        // run the query to register the project with the db.
        // also set uploading message via sessions.
        if( mysqli_query( $connObj, $query ) ) {
          echo "Project " . $name . " Successfully saved";
          $_SESSION["upload_pro_msg"] = "<span class='success' >Project " . $name . " successfully saved</span>";

          // redirect user back to the project upload form.
          header( "location:../app/main.php" );
        }
        else {// if there was an error saving the message
          echo "Error saving project to db";
          $_SESSION["upload_pro_msg"] = "<span class='error' >Error saving project ".$name." to database</span>";

          // redirect user back to the project upload form.
          header( "location:../app/main.php" );
        }
      }
      else {// some required field are empty
        echo "Some required fields are empty";
      }
    }
  }

?>