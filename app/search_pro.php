

<?php
  // this code shows all the project in the db.
  // shows projects according to search word,
  // else shows all the projects in the db.

  session_start(); // start session
  include("../app/get_pro.php"); // to make sure that the code runs.
  include("../app/search_func.php"); // call file with search function.


  // get key word to search for from post.
  $key_word = $_POST["key_word"];

  if( !empty( $key_word ) ) { // when search word from user is not empty.
    $pro_array = array(); // to store new data

    $results = get_project_func();

    // while( $projects = mysqli_fetch_assoc( $result ) ) {
    //   // push all the array project to an array variable, for searching.
    //   array_push( $pro_array, $projects );
    // }

    // call the function that ranks and shows the projects.
    $search_result = search_function( $results, $key_word );

    // change the session variable that is holding the data.
    $_SESSION["show_projects"] = $search_result;
  }

  exit;

?>