

<?php
  // this code shows all the project in the db.
  // shows projects according to search word,
  // else shows all the projects in the db.

  // start session
  session_start();
  include("../app/get_pro.php"); // to make sure that the code runs.
  include("../app/search_func.php"); // call file with search function.


  // get key word to search for from post.
  $key_word = $_POST["key_word"];

  // to store new data
  $pro_array = array();

  //  $_SESSION["pro_query"] 
  while( $projects = mysqli_fetch_assoc( $result ) ) {
    // push all the array project to an array variable, for searching.
    array_push( $pro_array, $projects );
  }

  // call the function that ranks and shows the projects.

  $search_result = search_function( $pro_array, $key_word );

  // echo json_encode( [ "pv"=>$key_word, "search_result"=>$search_result ]);exit;

?>