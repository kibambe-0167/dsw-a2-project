

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
        $email = $_POST["email"]; // get form email.
        $passwd = $_POST["passwd"]; // get form password.
        // echo $email . " | " . $passwd;

        // make query to check for user in db.
        $query = "select * from student where email='$email' and password = '$passwd'";


      }
      else { // when some fields are empty.
        echo "Field are empty";
        // make session variable to send message about empty fields.
        // $_SESSION["log_msg"] = "Please fill in all fields.";
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