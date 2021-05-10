

<?php
  // here we manage the login functionality.
  session_start(); // start a session to transfer message.
  
  // include the connectoion file to get objects.
  include( "../db/connection.php" );

  // check if connection to db ws successful
  if( $connObj ) { // connnection was successful.
    // echo "connected to db";

    // when form is submitted or submit btn clicked.
    if( isset($_POST["submit"] )) {
      // echo "clicked";

      // when email and passwd field are not empty.
      if(!empty($_POST["email"]) && !empty($_POST["passwd"])) {
        // echo "All field provided";
        // get form email. and convert to lower case for easy comparing.
        $email = strtolower( $_POST["email"] ); 
        $passwd = $_POST["passwd"]; // get form password.
        // echo $email . " | " . $passwd;

        // make query to check for user in db.
        $query = "select * from student where school_email='$email' and password='$passwd' ";

        // query the table for all users.
        // $query = "select * from student";

        $students =  mysqli_query( $connObj, $query );

        // if the results returned have values;
        if( mysqli_num_rows( $students ) == 1 ) {
          // echo "found something";
          // print_r( $students );
          while( $student = mysqli_fetch_assoc( $students )) {
            echo $student["student_id"] . " | " . $student["firstname"] . " | " . $student["lastname"] . " | " . $student["school_email"] . "<br />";
            // set up session variables to hold the data of the current user.
          }
        }
        else {
          echo "result NOT found";
          // make a session variable to send back message about no user found
          // $_SESSION["found_msg"] = "Invalid user | Cant find user in db";
        }


      }
      else { // when some fields are empty.
        echo "Field are empty";
        // make session variable to send message about empty fields.
        // $_SESSION["empty_msg"] = "Please fill in all fields.";
      }
    }


  }
  //  Problem connecting to the db.
  else {
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