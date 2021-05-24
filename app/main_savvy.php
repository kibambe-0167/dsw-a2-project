


<?php
  // only start a session when a session exist.
  // if( session_status() === PHP_SESSION_ACTIVE ) {
  //   session_start();
  // }

  session_start(); // start a php session to send data and information.
  // include this file here.
  // include("../app/show_pro.php");
  // include("../app/get_pro.php"); // to make sure that the code runs.

  // include_once("./get_pro.php");
  // $_SESSION["show_projects"] = get_project_func();

  // file that receive search word and change session projects.
  // include("./search_pro.php");
  
?>

<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php
        echo ucwords( $_SESSION["savvy_fname"] ) . " | main page ";
      ?>
      
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
            <!-- <a href="./pro_form.php">Upload</a> -->
          </li>

          <li>
            <a href="./savvy_profile.php?savvy_id=<?php echo $_SESSION["savvy_id"]; ?>">
            Profile</a>
          </li>
        </ul>
      </div>
    </header>



    <!-- show user details -->
    <div class="sep">
      <?php
        echo $_SESSION["savvy_id"] . " | " . $_SESSION["savvy_fname"] . " | " . $_SESSION["savvy_lname"] . " | " . $_SESSION["savvy_email"];
      ?>
    </div>



    <!-- the search input group fields -->
    <div id="mainp_search_gr" class="container">
      <form action="./search_pro.php" method="post">
        <div class="input-group rounded">
          <input class="form-control" type="text" name="key_word" id="key_word" 
            placeholder="Type to search for a project......"
            value="" aria-describedby="search-addon">

          <button type="button" class="btn" id="search_remove" name="search_remove" >
            <i class="fa fa-remove" ></i> Cancel
          </button>

          <button type="submit" class="btn" id="search_btn" name="search_btn" >
            <i class="fas fa-search"></i> Search
          </button>
        </div>
      </form>
    </div>


    <?php
      // echo $_SESSION["show_projects"];// echo "sldjfnsdjf";

      foreach( $_SESSION["show_projects"] as $project ) { // echo "main loop";
        // print_r( $project ); echo "<br /><br />";
    ?>
    <div class="container show_project" >
    <!-- <div class = "container main_pro_"> -->
      <div class="type" >
        <?php echo strtolower( $project["type"] ) ?>
      </div>

      <div class="info">
        <!-- <div id="main_img">
          <img src="picture.jpg">
        </div> -->

        <div class="" id="main_details">
          <div class="main_name"> <?php echo  ucwords($project["pro_name"] );  ?> </div>
          <div id="main_desc" > 
            <a href="?#project=<?php echo $project["id"] ?>" >
              <?php echo $project["pro_desc"] ?> </a>
            </div>
        </div>
          
        <div class= "comment input-group" >
          <input class="form-control" type="text" name="comment"  placeholder="Type a comment..." id="usr_com">
          <input class="form-control" type="submit" value="Comment" name="com_btn" id="com_btn" />
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