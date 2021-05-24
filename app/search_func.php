
<?php 

// this a search function that receive an array of arrays, 
  // searches for the key word, in project_name, project_type
  // and project_description. those that have the words are returned.
  // ALSO CONSIDER THE DATE OF THE PROJECT FOR RANKING.
  function search_function( $arr, $word ) { // echo "Function called";
    $patt = "/" . $word ."/i"; // echo $patt;

    // print_r( implode( " ", array( $aa[0], $aa[1]  )) ); echo "<br />";

    $new_arr_return = array(); // this is the new array to return.

    foreach ( $arr as $a ) { // print_r( $a ); echo "<br /><br/>";
      $score = 0;

      // check in name
      // if the key word is found in name, give a higher rating to that project score.
      // echo strtolower( $a["pro_name"] );
      // echo preg_match_all( $patt, strtolower($a["pro_name"]) ) . "<br/>";
      $score += preg_match_all( $patt, strtolower($a["pro_name"]))==0 ? 0: preg_match_all( $patt, strtolower($a["pro_name"])) + 5; // making sure its get more ratings.

      // // check in  type.
      // echo strtolower( $a["type"] );
      // echo preg_match_all( strtolower($patt), strtolower($a["type"])) . "<br/>";
      $score += preg_match_all( $patt, strtolower($a["type"]))==0 ? 0: preg_match_all( $patt, strtolower($a["type"])) + 5; // making sure its get more ratings. add only when a match is found, else add 0.

      // // check in project description
      // echo strtolower( $a["pro_desc"] );
      // echo preg_match_all( strtolower($patt), strtolower($a["pro_desc"])) . "<br/><br/>";
      $score += preg_match_all( strtolower($patt), strtolower($a["pro_desc"]));


      // // when the search key word has more than 4 words.
      // // use array_slice to get 3 words in a for loop.
      // // implodes those 3 words and search for pattern in project description.
      if( count( explode( " ", $word ) ) >= 4 ) { // echo "More than 3<br />";
        $words_seq = explode( " ", $word ); $start = 0; $num = 3;
        $len_arr = count( $words_seq );

        for( $i = 0; $i < $len_arr; $i++ ) {
          if( $start < $len_arr ) {
            // slice array into 3 parts, implodes those words into one sentence and 
            // make a pattern with those words in. search for number of appearance of those
            // words, move to the next 3 elements of the array.
            // make pattern empty for starting a new pattern.
            $pat = "/".implode(" ", array_slice($words_seq, $start, $num))."/i";
            // echo preg_match_all( $pat, strtolower($a["pro_desc"])) . "<br/>";
            $score += preg_match_all( $pat, strtolower($a["pro_desc"]));
            $start += 3;
            $pat = "";
          }
        }
      }

      
      // // here we check the availability of each individual word in the description.
      // find match in project name and give a higher rating value.
      // find match in project type and give higher rating value.
      if( count( explode( " ", $word ) ) > 1  ) { // echo "Entered if > 1";
        $words_seq = array_unique( explode( " ",  $word ) );
        // print_r( $words_seq ); echo "<br/><br />";
        foreach( $words_seq as $w ) { // echo $w;
          $pat_w = "/". $w ."/i";
          // echo preg_match_all( $pat_w, strtolower($a["pro_desc"])) . "<br/>";
          $score += preg_match_all( $pat_w, strtolower($a["pro_desc"]));
          $pat_w = "";

        }

        // find matching word in project name
        foreach( $words_seq as $w ) { // echo $w;
          $pat_w = "/". $w ."/i";
          // echo preg_match_all( $pat_w, strtolower($a["pro_desc"])) . "<br/>";
          $score += preg_match_all( $pat_w, strtolower($a["pro_name"]))==0 ? 0: preg_match_all( $pat_w, strtolower($a["pro_name"])) + 5; // making sure its get more ratings.
          $pat_w = "";
        }

        // find matching word in project type and also give high rating.
        foreach( $words_seq as $w ) { // echo $w;
          $pat_w = "/". $w ."/i";
          // echo preg_match_all( $pat_w, strtolower($a["pro_desc"])) . "<br/>";
          $score += preg_match_all( $pat_w, strtolower($a["type"]))==0 ? 0: preg_match_all( $pat_w, strtolower($a["type"])) + 5; // making sure its get more ratings. add only when a match is found, else add 0.
          $pat_w = "";
        }
      }

      $a["score"] = $score; // print_r( $a ); echo "<br/><br/>";

      array_push( $new_arr_return, $a ); // push to new array.
      
    }

    // sort the arrays according to score values.
    $score_v = array_column( $new_arr_return, "score" );
    array_multisort( $score_v, SORT_DESC, $new_arr_return );

    return $new_arr_return; // return sorted projects..

  } 

?>