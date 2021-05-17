

<?php
  // this code shows all the project in the db.
  // shows projects according to search word,
  // else shows all the projects in the db.

  // start session
  session_start();
  include("../app/get_pro.php"); // to make sure that the code runs.






  if( isset( $_POST["search_btn"] ) ) {
    // echo "search btn clicked.....";
    $_SESSION["show"] = "";
    $i = 0;
    while( $projects = mysqli_fetch_assoc( $_SESSION["pro_query"] ) ) {
      // echo "<div><a href='#'>" . $projects["id"] . " | " . $projects["pro_name"] . " | " . $projects["type"] . " | " . $projects["pro_desc"] . "</a></div >";

      $_SESSION["show"] .= "<div><a href='#'>" . $projects["id"] . " | " . $projects["pro_name"] . " | " . $projects["type"] . " | " . $projects["pro_desc"] . "</a></div >"; $i++;

      // break;
    }
    header("location:../app/main.php");
  }

  else {
    // echo "<br/><br/>No filter provided<br/>";
    // print_r( $_SESSION["pro_query"] );
    $_SESSION["show"] = "";
    while( $projects = mysqli_fetch_assoc( $_SESSION["pro_query"] ) ) {
      // echo "<div><a href='#'>" . $projects["id"] . " | " . $projects["pro_name"] . " | " . $projects["type"] . " | " . $projects["pro_desc"] . "</a></div >";

      $_SESSION["show"] .= "<div><a href='#'>" . $projects["id"] . " | " . $projects["pro_name"] . " | " . $projects["type"] . " | " . $projects["pro_desc"] . "</a></div >";
    }
  }

?>