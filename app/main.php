

<?php
  // start a php session to send data and information.
  session_start();
  // include("../views/show_pro.php");
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
      #s {
        text-align: center;
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


    <div id="s">
    <!-- < ?php echo isset($_POST['search_pro']) ? $_POST['search_pro'] : '' ? > -->
      <!-- @request["inputText"] -->
      <!-- onsubmit="return false" -->
      <form action="../views/show_pro.php" method="post" >
        <input type="text" name="search_pro" id="search_pro" 
          placeholder="Type to search for a project......"
          value="" >

        <input type="submit" name="search_btn" value="Search" onclick="">
      </form>
    </div>


    <div >
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
    <script src=""></script>
  </body>
</html>