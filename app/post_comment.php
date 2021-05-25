

<!-- we use this to post user comments to db -->
<?php
  include("../config/connection.php"); // include db connection.
  session_start(); // start a session.
  
  if( isset( $_POST["com_btn"] ) ) { // echo "im in";
    // check db connection
    if( $connObj ) { // echo "all cool"; 
      $comment = $_POST["comment"];
      if( !empty( $comment ) ) { // when comment is provided 
        $pro_id = $_GET["project_id"];
        $usr_id = $_SESSION["savvy_id"]; $usr_fname = $_SESSION["savvy_fname"];
        $usr_lname = $_SESSION["savvy_lname"];

        echo $_SESSION["savvy_id"] . " | " . $_SESSION["savvy_fname"] . " | " . $_SESSION["savvy_lname"] . " | " . $comment . " | " . $pro_id . "<=project id <br />";

        // query to add comment to db
        $query = "insert into Comments(pro_id, comment, owner_id, owner_fname, owner_lname ) values( \"$pro_id\", \"$comment\", \"$usr_id\", \"$usr_fname\", \"$usr_lname\" )";

        // echo $query . "<br /><br />";

        if( mysqli_query( $connObj, $query )) {
          echo "Successfully added comment";
          // redirect user to home page.
          // $redirect = "location:./pro_details.php?project_id=$pro_id";
          header( "location:./pro_details.php?project_id=$pro_id" );
        }
        else {
          echo "Error: Failed to post comment. <br />" . mysqli_error( $connObj ); 
          // or let user go into the page where they are able to see all the projects.
          header("location:./pro_details.php?project_id=$pro_id"); // send user to main page of projects.
        }
      }
      else {
        echo "<span class='error'>Please enter value for comment</span>";
        header("location:./pro_details.php?project_id=$pro_id");
      }
    }


    else { // error connecting to db.
      $err_conn = "<div class='error' id='err_conn' >
      <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "</h2></div>";
    
      die( "Error: " . mysqli_connect_error());
      // make a session to send back message
      // $_SESSION["db_con_msg"] = "Error: Cant connect to db";
    }
    
  }
?>