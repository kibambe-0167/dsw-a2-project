

<?php 

  // this function receives a string or data.
  // it make to lower case. get a few words from the data and return those words.
  function few_letters( $data ) {
    $length = 10;
    // make into array. get few of the words, join those words and return them.
    $data1 = implode( " ", array_slice( explode( " ", strtolower( $data ) ), 0, $length ) );
    return $data1 . ".....";
  }

  

?>