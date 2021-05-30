<?php 
  // this function receives a string or data.
  // it make to lower case. get a few words from the data and return those words.
  function few_letters( $data ) {
    $length = 10;
    // make into array. get few of the words, join those words and return them.
    $data1 = implode( " ", array_slice( explode( " ", strtolower( $data ) ), 0, $length ) );
    return $data1 . ".....";
  }


  // this function receives an id and returns the emails of the user from db.
  // it checks in student table who has tht email and if user, is not available.
  // if think i should ask for a primany email when updating a project.



  // // receives a file and saves it to a folder.
  // function upload_file( $file , $name) {
  //   // echo $file . "<br/>";
  //   $dest = "/opt/lampp/htdocs/dsw-a2-project/media/files/" . $name;
  //   if( move_uploaded_file($file, $dest )) { return 1; }
  //   else { return 0; }
  // }
?>