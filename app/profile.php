

<?php
  // this code manages the user profile. they can delete and edit their account here
  // start a session to send data and information.
  session_start();
  // echo "<br/>Session ID:" . session_id() . "<br/><br/>";
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Profile Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="">
    <style >
      li {
        list-style: none;
        display: inline;
        margin: .2em 1em;
      }
      #usr_pro {
        margin: 3em .5em;
      }
      .pro {
        margin: 2em 0em;
      }
    </style>
  </head>
  <body>

    <header >
      <div >
        <ul >
        <li>
          <a href="../del/del_user_acc.php?student_id=<?php echo $_SESSION['student_id']; ?>" >Delete Profile</a>
        </li>

        <li>
          <a href="?student_id=<?php echo $_SESSION['student_id']; ?>" >Edit Profile</a>
        </li>

        <li>
          <a href="./log-out_student.php?student_id=<?php echo $_SESSION['student_id']; ?>" >Sign-out</a>
        </li>
        </ul>
      </div>
    </header>


    <div >
      <?php
        echo $_SESSION["student_id"] . " | ";
        echo $_SESSION["firstname"] . " | ";
        echo $_SESSION["lastname"] . " | ";
        echo $_SESSION["school_email"] . " | ";
        echo $_SESSION["current_year"] . " | ";
        echo $_SESSION["department"] . " | ";
      ?>
    </div>

    <!-- this contains the project of the user. -->
    <div id="usr_pro">
      <?php
        include("./get_usr_pro.php"); 
      ?>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=""></script>
  </body>
</html>