
<?php
  // start a session for sending data and messages.
  session_start();

  // include the db connection.
  include("../config/connection.php");
?>

<?php

  // if connection to database was not successful.
  if( !$connObj ) {
    $err_conn = "<div id='err_conn' >
      <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
      </h2>
    </div>
    ";
    echo $err_conn;
    
    // die( "Error: " . mysqli_connect_error());
  }
  else { // connection was sucessful
    // echo "Successfully Connected";

    if( isset( $_POST["signup"]) ) {
      // echo "Successfully Connected";
      // check for empty fields.
      if( preg_match("/^[a-z]/i", $_POST["firstname"]) && 
          preg_match("/^[a-z]/i", $_POST["lastname"]) && 
          !empty( $_POST["email"]) && 
          preg_match("/^[a-z]/i", $_POST["department"]) &&
          !empty( $_POST["current_year"]) && !empty($_POST["passwd"]) 
          && !empty($_POST["passwd_con"]) ) {
      
        // echo "not empty and successfully submitted.";
        $fname = strtolower($_POST["firstname"]);
        $lname = strtolower($_POST["lastname"]);
        $email = strtolower($_POST["email"]); $depart = $_POST["department"];
        $year = $_POST["current_year"]; $passwd = $_POST["passwd"]; 
        $passwd_con = $_POST["passwd_con"];

        // read all the emails from the db.
        $email_q = "select school_email from student where school_email='$email'";
        $email_re = mysqli_query( $connObj, $email_q );
        // print_r( $email_re );


        if( mysqli_num_rows( $email_re ) > 0 ) {
          // email was found in db. make session variable to send back
          // to signup page, informing user about duplicates emails.
          echo "Email found in db";
          $_SESSION["reg_msg"] = "<span class'error'>This email already has an account</span>";

          header("location:../index.php");
        }

        // new email and no one has use it yet.
        else {
          // echo "Email not in db";
          // check if the passwd and confirmed passwd are the same.
          if( $passwd == $passwd_con ) {
            // echo "passwd are the same";
            // echo $fname . " " . $lname . " " . $email . " " . $depart . " " . $year . "<br/><br/>";

            $query = "insert into student(firstname, lastname, school_email, current_year, department, password) values('$fname', '$lname', '$email', '$year', '$depart', '$passwd' )";

            echo $query;

            if( mysqli_query( $connObj, $query ) ) {
              // session to send back successful message.
              echo "User successfully registered.";
              $_SESSION["reg_msg"] = "User successfully registered.";
              // go back to index page, so that user canm sign in
              header("location:../index.php");
            }
            else {
              // use sessions to send back error message.
              "Error: " . $query . "<br/>" . mysqli_error( $connObj );
              $_SESSION["reg_msg"] = "Error: " . $query . "<br/>" . mysqli_error( $connObj );

              // go back to index page, so that user canm sign in
              header("location:../index.php");
            }
          }

          else { // passwd and confirm passwd are not the same
            echo "NOT THE SAME PASSWORD....";
            // make a session variable to send back passwd message.
            $_SESSION["reg_msg"] = "<span class='error'>Please enter matching password</span>";
            header("location:../index.php");
          }

        }

      }
      
      else {
        // use sessions to send back errors messages.
        // about empty fields.
        $_SESSION["reg_msg"] = "<span class='error'>Please fill in all fields</span>";
        header("location:../index.php");
      }
    }
  }
?>
  