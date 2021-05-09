

<?php
  // start a session.
  // session_start();

  include( "connection.php" );
  

  if( $connObj ) {
    // echo "Successfully connnected to db.";

    // if the btn is clicked and defined, run the below code.
    if( isset( $_POST["submit"]) ) {
      // echo "btn clicked";
      if( !empty($_POST["comment"]) ) {
        // echo "Comment not empty";

        // // needs user who uploads the comment
        // // the project id to where the belongs to.
        // // the comment
        // // // before sending to db.
        $comment = $_POST["comment"];
        // echo $comment;
      }
      else {
        echo "The comment field is empty";
      }
    }
  }
  // there was an error connecting to the db.
  else {
    $err_conn = "<div id='err_conn' >
      <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
      </h2>
    </div>
    ";
    
    die( "Error: " . mysqli_connect_error());
  }
?> 