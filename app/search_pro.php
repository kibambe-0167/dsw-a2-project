

<?php
  // this code shows all the project in the db.
  // shows projects according to search word,
  // else shows all the projects in the db.

  session_start(); // start session
  include("../app/get_pro.php"); // to make sure that the code runs.
  include("../app/search_func.php"); // call file with search function.


  if( isset( $_POST["search_btn"] ) ) { //echo "btn clicked..<br />";
    // get key word to search for from post.
    $key_word = $_POST["key_word"];

    if( !empty( $key_word ) ) { // when search word from user is not empty.
      // echo "search word not empty<br />";
      $results = get_project_func();

      // $pro_array = array(); // to store new data
      // while( $projects = mysqli_fetch_assoc( $result ) ) {
      //   // push all the array project to an array variable, for searching.
      //   array_push( $pro_array, $projects );
      // }

      // call the function that ranks and shows the projects.
      $search_result = search_function( $results, $key_word );

      print_r( $search_result );

      // change the session variable that is holding the data.
      $_SESSION["show_projects"] = $search_result;

      header("location:./main.php");
    }
  }
  

  exit;

?>