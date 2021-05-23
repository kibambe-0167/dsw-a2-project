

<?php
  // start a php session to send data and information.

  // only start a session when a session exist.
  // if( session_status() === PHP_SESSION_ACTIVE ) {
  //   session_start();
  // }


  session_start();
  // include this file here.
  // include("../views/show_pro.php");
  // include("../app/get_pro.php"); // to make sure that the code runs.

  include_once("./get_pro.php");
  
  $_SESSION["show_projects"] = get_project_func();
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
      
      li {
        display: inline;
        margin: .2em 1em;
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



    <!-- show user details -->
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



    <!-- the search input group fields -->
    <div id="mainp_search_gr" class="container">
      <div class="input-group rounded">
        <input class="form-control" type="text" name="search_pro" id="search_pro" 
          placeholder="Type to search for a project......"
          value="" aria-describedby="search-addon">

        <button type="button" class="btn" id="search_remove" name="search_btn" >
          <i class="fa fa-remove" ></i> Cancel
        </button>

        <button type="button" class="btn" id="search_btn" name="search_btn" >
          <i class="fas fa-search"></i> Search
        </button>
      </div>
    </div>




    <!-- this message is sent when project is saved to db.
    put a timer to remove it after some seconds in js. -->
    <div class="container" id="pro_up_msg">
      <?php echo $_SESSION["upload_pro_msg"]; ?>
    </div>



    <?php
      // echo $_SESSION["show_projects"];// echo "sldjfnsdjf";

      foreach( $_SESSION["show_projects"] as $project ) {
        // print_r( $project ); echo "<br /><br />";
    ?>
    <div class="container show_project" >
    <!-- <div class = "container main_pro_"> -->
      <div class="type" >
        <?php echo $project["type"] ?>
      </div>

      <div class="info">
        <!-- <div id="main_img">
          <img src="picture.jpg">
        </div> -->

        <div class="bg-info" id="main_details">
          <div id="main_contact"> <?php echo  ucwords($project["pro_name"] );  ?> </div>
          <div id="main_desc" > <?php echo $project["pro_desc"] ?> </div>
        </div>
          
        <div class= "comment input-group" >
          <input class="input-group-text" type="text" name="comment"  placeholder="Type a comment..." id="usr_com">
          <input class="form-control" type="submit" value="Comment" name="com_btn" id="com_btn">
        </div>
      </div>

    </div>

    
    <?php }
    ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>


<!-- 
  <div class= "container">
    <span class="type" >
      type
    </span>

    <div class="info">
      <div id="main_img">
        <img src="picture.jpg">
      </div>

      <div id="main_details">
        <div id="main_contact"> Contact </div>
        <div id="main_desc" >Description </div>
      </div>
        
      <div class= "comment input-group" >
        <input class="input-group-text" type="text" name="comment"  placeholder="Type a comment..." id="usr_com">
        <input class="form-control" type="submit" value="Comment" name="com_btn" id="com_btn">
      </div>
    </div>
  </div>
 -->