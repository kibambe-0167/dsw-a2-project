

<?php
  // start a php session to send data and information.
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Main Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="">
    <style >
      .sep {
        margin: 3em .1em;
      }
      li {
        display: inline;
        margin: .2em 1em;
      }
      div {
        margin: 2em .1em;
      }
    </style>
  </head>
  <body>


    <header >
      <div >
        <ul >
          <li>
            <a href="./upload_pro.php">Upload</a>
          </li>

          <li>
            <a href="./profile.php">Profile</a>
          </li>
        </ul>
      </div>
    </header>


    <div class="sep">
      <?php
        echo $_SESSION["student_id"] . " | ";
        echo $_SESSION["firstname"] . " | ";
        echo $_SESSION["lastname"] . " | ";
        echo $_SESSION["school_email"] . " | ";
        echo $_SESSION["current_year"] . " | ";
        echo $_SESSION["department"] . " | ";
      ?>
    </div>


    <div >
      <?php
        include("../fromDb/project.php");
      ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=""></script>
  </body>
</html>