


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../icon.ico" />

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/pro_details.css">
    <link rel="stylesheet" href="../css/p_snippet.css">
  </head>
  <body>



    <?php
    // get all projects that belongs to the current user.

    session_start(); // start a session
    include("../config/connection.php"); // connection obj to db.


    if( $connObj ) { // connnection is working. 

      if( !empty( $_SESSION["student_id"] ) ) {
        // echo "Student ID: " . $_SESSION["student_id"];
        $s_id = $_SESSION["student_id"];

        // query to get all project for the current user.
        $query = "select * from Project where student_id = $s_id;";

        // run query and get result.
        $result = mysqli_query( $connObj, $query );

        // when result return have something.
        if( mysqli_num_rows( $result ) > 0 ) {

          // echo "Found something";
          while( $project = mysqli_fetch_assoc( $result ) ) { ?>
            <div class="container usr_proj">

              <a href="./pro_det_stu.php?project_id=<?php echo $project["id"]; ?>">
                <?php echo $project["pro_name"]; ?>
              </a>

              <i > | </i>

              <a href="../app/add_member.php?project_id=<?php echo $project["id"]; ?>">
                Add Team Member
              </a>

              <i > | </i>

              <a href="../app/edit_pro.php?project_id=<?php echo $project["id"]; ?>">
                Edit Project
              </a>

              <i > | </i>

              <a href="../del/delete_pro.php?project_id=<?php echo$project["id"]; ?>" > 
                Delete Project
              </a>
            </div>
          <?php
          }
        }
        // if user contains no projects
        else { 
          echo ucwords( $_SESSION["firstname"] ). " " . ucwords( $_SESSION["lastname"] ) . " has no projects yet.";
        }
      }
      else { echo ""; }

    }
    else { // error connection to db 
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
        


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>

