
<?php
  // start a session for sending data and messages.
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>

    <?php
      // include the connection object in this work.
      include './connection.php';
      // echo "reg     ";


      // if connection to database was not successful.
      if( !$connObj ) {
        $err_conn = "<div id='err_conn' >
          <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
          </h2>
        </div>
        ";
        
        die( "Error: " . mysqli_connect_error());
      }
      else { // connection was sucessful
        // echo "Successfully Connected";

        if( isset( $_POST["signup"]) ) {
          // echo "Successfully Connected";
          // check for empty fields.
          if( !empty($_POST["firstname"]) && !empty($_POST["lastname"]) 
            && !empty($_POST["email"]) && !empty($_POST["department"]) 
            && !empty($_POST["current_year"]) && !empty($_POST["passwd"]) 
            && !empty($_POST["passwd_con"]) ) {
          
            // echo "not empty and successfully submitted.";
            $fname = $_POST["firstname"]; $lname = $_POST["lastname"];
            $email = $_POST["email"]; $depart = $_POST["department"];
            $year = $_POST["current_year"];
            $passwd = $_POST["passwd"]; $passwd_con = $_POST["passwd_con"];


            // check if the passwd and confirmed passwd are the same.
            if( $passwd == $passwd_con ) {
              echo "passwd are the same";

              echo $fname . " " . $lname . " " . $email . " " . $depart . " " . $year . "<br/><br/>";

              $query = "insert into student(firstname, lastname, school_email, current_year, department, password) values('$fname', '$lname', '$email', '$year', '$depart', '$passwd' )";

              if( mysqli_query( $connObj, $query ) ) {
                // session to send back successful message.
                echo "User successfully registered.";
                // $_SESSION["reg_msg"] = "User successfully registered.";
              }
              else {
                // use sessions to send back error message.
                "Error: " . $query . "<br/>" . mysqli_error( $connObj );
                // $_SESSION["reg_msg"] = "Error: " . $query . "<br/>" . mysqli_error( $connObj );
              }
            }

            else { // passwd and confirm passwd are not the same
              echo "NOT THE SAME PASSWORD....";
              // make a session variable to send back passwd message.
              // $_SESSION["pw_msg"] = "Please enter matching password";
            }
          }
          
          else {
            // use sessions to send back errors messages.
          }
        }
      }
    ?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=""></script>
    <script src=""></script>
  </body>
</html>