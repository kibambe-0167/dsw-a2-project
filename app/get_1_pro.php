

<?php
  // this page is used to edit the project of the user.
  session_start(); // start the session.
  include("../config/connection.php"); // include config data.

  if( $_GET["project_id"]) {
    // echo "Project ID: " . $_GET["project_id"];
    $pro_id = $_GET["project_id"];

    // get the project with that set id.
    $query = "select * from Project where id=$pro_id;";
    // get the result.
    $result = mysqli_query( $connObj, $query );

    if( mysqli_num_rows( $result ) == 1 ) {
      // echo "project found.";
      $project = mysqli_fetch_assoc( $result );
      // print_r( $project );

      // bring up the form to edit the project.
    }
    // project not found in db.
    else { echo "Project not found"; }
  }

?>