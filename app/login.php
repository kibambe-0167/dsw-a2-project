

<?php
  // here we manage the login functionality.
  
  // include the connectoion file to get objects.
  include( "../config/connection.php" );
  include("./get_pro.php");



  
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
        $query = "select * from student where school_email='$email' and password='$passwd' LIMIT 1";

        // query the table for all users.
        // $query = "select * from student";

        $students =  mysqli_query( $connObj, $query );
        print_r( $student );

        // if the results returned have values;
        if( mysqli_num_rows( $students ) == 1 ) {
          // echo "found something"; // print_r( $students );
          $student = mysqli_fetch_assoc( $students );

          // start a session for the current user.
          session_start();

          // echo $student["student_id"] . " | " . $student["firstname"] . " | " . $student["lastname"] . " | " . $student["school_email"] . "<br />";
          // set up session variables to hold the data of the current user.
          $_SESSION["student_id"] = $student["student_id"];
          $_SESSION["firstname"] = $student["firstname"];
          $_SESSION["lastname"] = $student["lastname"];
          $_SESSION["school_email"] = $student["school_email"];
          $_SESSION["current_year"] = $student["current_year"];
          $_SESSION["department"] = $student["department"];

          // get all project from db.
          $projects = get_project_func();

          if( $projects != null ) {
            $_SESSION["show_projects"] = $projects;
            header( "location:./main.php" ); // redirect to the main page.
            exit;

          }
          else {
            $_SESSION["show_projects"] = null;
          }
          
          // header( "location:./main.php" ); // redirect to the main page.
          // exit();
        }

        else {
          // session_start();
          // echo "result NOT found";
          // make a session variable to send back message about no user found
          $_SESSION["login_msg"] = "Invalid user | Cant find user in db";

          header( "location:../index.php" );
          // exit();
        }

      }
      else { // when some fields are empty.
        // session_start();
        // echo "Field are empty";
        // make session variable to send message about empty fields.
        $_SESSION["empty_msg"] = "Please fill in all fields.";

        // header( "location:../index.php" );
        // exit();
      }
    }


  }
  //  Problem connecting to the db.
  else {
    $err_conn = "<div class='error' id='err_conn' >
      <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
      </h2>
    </div>
    ";
    
    die( "Error: " . mysqli_connect_error());
    // make a session to send back message
    // $_SESSION["db_con_msg"] = "Error: Cant connect to db";
  }
?>