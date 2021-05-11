

<?php
  // // // // TASK // // // // //  
  // 
  // 
  // make verify user before deleting the account.
  // 
  // 
  // // // // // // // /// // //


  // this code deletes a user account from the database.
  
  // start a session, to send data and messages.
  session_start();

  include("../db/connection.php"); // includes db connection.

  if( $connObj ) {
    // echo "Connection was successful";
    if( $_GET["student_id"] ) {
      echo "Proceed to delete account.<br />";
      // echo "Account number: " . $_GET["student_id"];
      $acc_num = $_GET["student_id"];

      // first check if the account is available in the db.
      $num_q = "select * from student where student_id='$acc_num'";
      $num_re = mysqli_query( $connObj, $num_q );

      if( mysqli_num_rows( $num_re ) > 0 ) {
        echo "Profile Available";
        // make query to delete user account
        $query = "delete from student where student_id='$acc_num'";

        // run the query.
        $result = mysqli_query( $connObj, $query ); // print_r( $result );

        // if delete operation was successful.
        if( $result ) {
          // make session variable to send msg about deleted account.
          $_SESSION["acc_del"] = "Profile successfully deleted";

          // destroy all sessions
          // session_destroy();

          // redirect user to the registration page after deleting the account.
          header("location:../index.php" );
        }
        else {
          $_SESSION["acc-del"] = "Error: Couldn't delete account";

          // either redirect user to home page or user profile page.
          header("location:../index.php");

          // user profile
          // header("location:../app/profile.php");
        }

      }
      else { // Profile not available 
        echo "Profile NOT Available";
      }

    }

    else {
      echo "Can't proceed to delete account";
    }
  }

  else { // if connection to db is no successful.
    $err_conn = "<div id='err_conn' >
      <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
      </h2>
    </div>
    ";
    
    die( "Error: " . mysqli_connect_error());
    // make a session to send back message
    // $_SESSION["db_con_msg"] = "Error: Cant connect to db";
  }
?>