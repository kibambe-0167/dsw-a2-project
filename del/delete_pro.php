

<?php
  // this code is used to delete a user account.

  include("../config/connection.php"); // connection to db.

  //if the user the project is defined and set.
  if( isset( $_GET["project_id"] ) ) {
    // echo $_GET["project_id"];

    $id = $_GET["project_id"];

    // make query to delete project from db.
    $query = "delete from Project where id = $id";

    // if query is successfully runned
    if( mysqli_query( $connObj, $query ) ) {
      echo "Successfully deleted project";
    }
    else {
      echo "Error deleting project:<br/>". mysqli_error( $connObj )."<br/>";
    }
  }
?>