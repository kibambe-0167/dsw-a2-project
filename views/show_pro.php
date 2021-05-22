

<?php
  // this code shows all the project in the db.
  // shows projects according to search word,
  // else shows all the projects in the db.

  // start session
  session_start();
  include("../app/get_pro.php"); // to make sure that the code runs.
  include("../app/search_func.php"); // call file with search function.


  if( isset( $_POST["search_btn"] ) ) {// echo "search btn clicked.....";
    $_SESSION["show"] = "";
    $pro_array = array();
    while( $projects = mysqli_fetch_assoc( $_SESSION["pro_query"] ) ) {

      // $_SESSION["show"] .= "<div><a href='#'>" . $projects["id"] . " | " . $projects["pro_name"] . " | " . $projects["type"] . " | " . $projects["pro_desc"] . "</a></div >";

      // push all the array project to an array variable, for searching.
      array_push( $pro_array, $projects );
    }
    
    $search_result = search_function( $pro_array, "mobile app from blah blah blah blah blah" );

    foreach( $search_result as $ranks ) {
      // print_r( $ranks ); echo "<br /><br />";

      $_SESSION["show"] .= "<div><a href='#'>" . $ranks["id"] . " | " . $ranks["pro_name"] . " | " . $ranks["type"] . " | " . $ranks["pro_desc"] . " | " . $ranks["score"] . "</a></div >";
    }

    header("location:../app/main.php");
  }

  else { // echo "<br/><br/>No filter provided<br/>";
    // print_r( $_SESSION["pro_query"] );
    $_SESSION["show"] = "";

    while( $projects = mysqli_fetch_assoc( $_SESSION["pro_query"] ) ) {
      $_SESSION["show"] .= "<div><a href='#'>" . $projects["id"] . " | " . $projects["pro_name"] . " | " . $projects["type"] . " | " . $projects["pro_desc"] . "</a></div >";
    }
  }


?>