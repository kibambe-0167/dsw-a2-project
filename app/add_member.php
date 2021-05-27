<?php
  session_start(); /// start a session.
  include("../config/connection.php"); // db connection object
  $project_id = $_GET["project_id"];
  // echo $project_id;
?>


<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php echo ucwords( $_SESSION["firstname"] ); ?> | Add Team Member
    </title>
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

    <div class="container" >
      <h2 >Add Team Member To Project</h2>
      <!-- this is uploading a team members details to db. -->
      <form action="./add_member.php?project_id=<?php echo $_GET["project_id"]; ?>" method="post">
        <div class="input-group" >
          <input class="form-control" type="text" name="fname" placeholder="Enter a team members name" value="Surprise" >
        </div>

        <div class="input-group" >
          <input class="form-control"  type="text" name="lname" placeholder="Enter a team members last name" value="Mumba"  >
        </div>

        <div class="input-group" >
          <input class="form-control" type="email" name="email" placeholder="Enter a team members email" value="mumba@gmail.com"  >
        </div>

        <div class="input-group" >
          <input class="btn" type="submit" name="submit" value="Add Member" >
          <button class="btn" type="reset" >Discard</button>
        </div>
      </form>
    </div>


    
    <?php
      if( $connObj ) {

        if( isset( $_POST["submit"]) ) {
          $fname = $_POST["fname"]; $lname = $_POST["lname"]; $email = $_POST["email"];
          
          if( !empty( $fname ) && !empty( $lname ) && !empty( $email ) && preg_match( "/^[a-z]/i", $fname) && preg_match( "/^[a-z]/i", $lname)  ) { // echo "all well";
            $project_id = $_GET["project_id"];
            echo $fanme . $lname . $email . $project_id;

            $query = "insert into Team_member( firstname, lastname, email) values('$fname', '$lname', '$email')";

            if( mysqli_query( $connObj, $query ) ) { // upload user to table.
              $last_id = mysqli_insert_id( $connObj ); // get id of last inserted data.

              // update user in team_member table, after that add user to team member table.
              $query1 = "insert into member_project( member_id, project_id ) values('$last_id', '$project_id')";

              if( mysqli_query( $connObj, $query1 ) ) {
                echo "<span class='success'>Successfully added user</span>";
              }
              else {
                echo "<span class='error'>Error: failed to update user.</span>";
              }
            }
            else {
              echo "<span class='error'>Error: failed to add user</span>";
            }
          }
          else {
            echo "<span class='error'>Please Provide correct values</span>";
          }
        }  
       
      }
      else { // there was an error connecting to the db.
        $err_conn = "<div id='err_conn' >
          <h2>Connection Failed: Connecting to database.<br/>" . mysqli_connect_error() . "
          </h2>
        </div>
        ";
        
        die( "Error: " . mysqli_connect_error());
      }
    ?>
      


    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>