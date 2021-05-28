

<?php // delete  a project from db.
  session_start(); // start a session.
  include("../config/connection.php"); // connection to db.
  
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Delete Project</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/pro_details.css">
    <link rel="stylesheet" href="../css/p_snippet.css">
  </head>
 
  <body>

    
    <div class="container" id="validate_usr" >
      <h2 >Enter Password To Continue</h2>
      <form action="./delete_pro.php?project_id=<?php echo $_GET["project_id"]; ?>" method="post">
        <div class="input-group" >
          <input class="input-group-text" type="password" name="passwd" id="passwd" placeholder="Enter password to continue" required autofocus >
        </div>

        <div class="input-group" >
          <input class="btn" type="submit" name="validate" value="Validate">
          <button class="btn" >
            <a href="../app/profile.php">Cancel</a>
          </button>
        </div>
      </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=""></script>
  </body>
</html>



<?php

  // if btn is defined and clicked.
  if( isset( $_POST["validate" ] ) ) {
    if( !empty( $_POST["passwd"] ) ) {
      // echo "PW not empty";
      $passwd = $_POST["passwd"]; // echo $passwd;
      $email = $_SESSION["school_email"]; // echo $_SESSION["school_email"];

      // make query to check if passwd are the same.
      $pw_q = "select password from student where school_email='$email' and password='$passwd'";

      // if the password provided matches the current user, proceed to delete user project
      if($passwd===mysqli_fetch_assoc( mysqli_query( $connObj, $pw_q ) )["password"] ) {
        // if the user the project is defined and set.
        if( isset( $_GET["project_id"] ) ) {
          // echo $_GET["project_id"]; // echo $_SESSION["student_id"];

          $id = $_GET["project_id"];

          // make query to delete project from db.
          $query = "delete from Project where id = '$id'";

          // if query is successfully runned
          if( mysqli_query( $connObj, $query ) ) {
            echo "Successfully deleted project";
          }
          else {
            echo "Error deleting project:<br/>". mysqli_error( $connObj )."<br/>";
          }
        }
      }

      else { echo "Wrong password. Please enter the password."; }
    }
    else { echo "Please Provide Passwd to continue"; }
  }

?>