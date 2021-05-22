

<?php
  // start a php session to send data and information.

  // only start a session when a session exist.
  if( session_status() === PHP_SESSION_ACTIVE ) {
    session_start();
  }
  // include this file here.
  include("../views/show_pro.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php echo ucwords( $_SESSION["firstname"] ) . " | main page "; ?>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
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
            <a href="./pro_form.php">Upload</a>
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


    <div id="mainp_search_gr" class="container bg-secondary">
    <!-- < ?php echo isset($_POST['search_pro']) ? $_POST['search_pro'] : '' ? > -->
      <!-- @request["inputText"] -->
      <!-- onsubmit="return false" -->
      <form action="../views/show_pro.php" method="post" >
        <div class="input-group" >
          <input class="input-group-text" type="text" name="search_pro" id="search_pro" 
            placeholder="Type to search for a project......"
            value="" >

          <input class="btn" type="submit" id="search_btn" name="search_btn" value="Search" >

        </div>
        
      </form>
    </div>


    <div id="show_project" class="container">
      <?php
        // include_once("../views/show_pro.php");
        echo $_SESSION["show"];
      ?>
    </div>



    <div >
      <?php
        // include_once("./get_pro.php");
      ?>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jQuery.js" ></script>
    <script src="./js/bootstrap.min.js" ></script>
    <script src="./js/script.js" ></script>
  </body>
</html>