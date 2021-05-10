

<?php
  session_start();

  include("connection.php");

  // if connection to database was not successful.
  if( !$connObj ) {
    $err_conn = "<div id='err_conn' >
      <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
      </h2>
    </div>
    ";
    
    die( "Error: " . mysqli_connect_error());
  }
  else {
    // echo "connection to db was successful";
    // if signup button is clicked and defined
    if( isset( $_POST["signup"]) ) {
      // echo "btn clicked...";
      if( !empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["email"]) ) {
        // echo "field not empty";
        // upload this details in lower case for easy searching.
        $fname = strtolower($_POST["fname"]); 
        $lname = strtolower( $_POST["lname"]);
        $email = strtolower( $_POST["email"] );
        // echo $fname . " " . $lname . " " . $email;

        // needs to check if the email is already registered with another user.
        $email_q = "select * from Savvy where email='$email'";
        $email_re = mysqli_query( $connObj, $email_q );

        // if there is any match, inform user about the email been there.
        if( mysqli_num_rows( $email_re ) > 0 ) { 
          // session variable to send message: Email already registered.
          echo "EMAIL FOUND IN DB";
          // $_SESSION["email_reg_msg"] = "Email used is already available.";
        }

        else { // proceed to add user to db.
          // query to signup user or put user data in the database.
          $query = "insert into Savvy(firstname, lastname, email) values('$fname', '$lname', '$email' )";

          // check if user data was successfully added.
          // set session to send back successful message.
          if( mysqli_query( $connObj, $query ) ) {
            echo "Successfully registered user";
            // $_SESSION["reg_msg"] = "Successfully registered user";
          }
          // else if user was not registered.
          else {
            echo "Error: " . $query . "<br/>" . mysqli_error( $connObj );
            // $_SESSION["reg_msg"] = "Error: " . $query . "<br/>" . mysqli_error( $connObj );
          }

        }

      }

      else { // make sessions and send back error messages if field are empty.
        echo "Some fields are empty.";
      }
    }
  }
?>