

<?php
  // start a php session to send data and information.

  // only start a session when a session exist.
  if( session_status() === PHP_SESSION_ACTIVE ) {
    session_start();
  }
  session_start();
  // include this file here.
  // include("../views/show_pro.php");
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
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/p_snippet.css">

    <style >
      .sep {
        margin: 1em .1em;
      }
      li {
        display: inline;
        margin: .2em 1em;
      }
      div {
        margin: 1em .1em;
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


    <div id="mainp_search_gr" class="container">

        <div class="input-group rounded">
          <input class="form-control" type="text" name="search_pro" id="search_pro" 
            placeholder="Type to search for a project......"
            value="" >

          <button type="button" class="btn" id="search_remove" name="search_btn" >
            <i class="fa fa-remove" ></i> Cancel
          </button>

          <button type="button" class="btn" id="search_btn" name="search_btn" >
            <i class="fas fa-search"></i> Search
          </button>
        </div>

        <!-- <div id="search_gr" class="input-group rounded">
          <input type="search" class="form-control" name="search_pro" id="search_pro" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />

          <button class="input-group-text border-0" id="search_logo" id="search_btn" name="search_btn" >
            <i class="fas fa-search"> </i> Search
          </button> 
        </div> -->
    </div>








    <div id="show_project" class="container">

      <?php
        // include_once("../views/show_pro.php");
        echo $_SESSION["show"];
      ?>
    </div>



    <!-- <div >
      < ?php
        // include_once("./get_pro.php");
      ? >
    </div> -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>