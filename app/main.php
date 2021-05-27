

<?php
  // start a php session to send data and information.

  session_start();

  include("../code_snippets/help_code.php");
  
?>

<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php
        if( isset($_SESSION["firstname"]) && !empty($_SESSION["firstname"]) ) {
          // echo ucwords( $_SESSION["firstname"] ) . " | main page "; 
        }

        if( isset($_SESSION["savvy_fname"]) && !empty($_SESSION["savvy_fname"]) ) {
          // echo ucwords( $_SESSION["savvy_fname"] ) . " | main page ";
        }
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
    <link rel="stylesheet" href="../css/pro_details.css">
    <link rel="stylesheet" href="../css/p_snippet.css">

  </head>
  <body>


    <!-- header of the page. -->
    <header >
      <div class="container-fluid row" id="header" >
        <!-- logo -->
        <div class="col-md-3 col-sm-3 col-xs-3 bar" id="logo">
          <a href="./main_savvy.php" class="nav-link" >Logo</a>

          <span class="" id="menu_btn" type="button" data-toggle="collapse" data-target="#nav_mobile" >
            <!-- Collapse --> 
            <i class="fa fa-bars"></i>
          </span>
        </div>
        <!-- navbar links,  -->
        <div id="nav_large" class="col-md-9 col-sm-9 col-xs-9" >
          <ul class="nav" id="nav-link-bs"  >
            <li class="nav-item" >
              <a href="./main.php" class="nav-link" >Home</a>
            </li>

            <li class="nav-item" >
              <a href="./profile.php" class="nav-link" >Profile</a>
            </li>

            <li class="nav-item" >
              <a href="./contactus.php" class="nav-link" >Contact</a>
            </li>

            <li class="nav-item" >
              <a href="./aboutus.php" class="nav-link" >About</a>
            </li>
          </ul>
        </div>        
        
      </div>
       
      <!-- the menu for the mobile version of the code. -->
      <div class="collapse" id="nav_mobile">
        <div >
          <a href="./main.php" class="nav-link nav_link_rad_start" >
          <i class="fa fa-home" ></i> Home
          </a>
        </div>

        <div >
          <a href="./profile.php" class="nav-link" >
          <i class="fa fa-user" ></i> Profile
          </a>
        </div>

        <div >
          <a href="./contactus.php" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact
          </a>
        </div>

        <div >
          <a href="./aboutus.php" class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp About
          </a>
        </div>
      </div>

      <!-- <div class="wrap" style="display: none;"></div> -->
    </header>
    <div class="wrap" style="display: none;"></div>



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
      <form action="./search_pro.php" method="post">
        <div class="input-group rounded">
          <button type="submit" class="btn" id="search_btn" name="search_btn" >
            <i class="fas fa-search"></i> Search
          </button>

          <input class="form-control" type="text" name="key_word" id="key_word" 
            placeholder="Type to search for a project......"
            value="" aria-describedby="search-addon">

          <button type="button" class="btn" id="search_remove" name="search_remove" >
            <i class="fa fa-remove" ></i> Cancel
          </button>

          <!-- <button type="submit" class="btn" id="search_btn" name="search_btn" >
            <i class="fas fa-search"></i> Search
          </button> -->
        </div>
      </form>
    </div>




    <!-- this message is sent when project is saved to db.
    put a timer to remove it after some seconds in js. -->
    <div class="container" id="pro_up_msg">
      <?php echo $_SESSION["upload_pro_msg"]; unset( $_SESSION["upload_pro_msg"] ); ?>
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
            <a href="./pro_details.php?project=<?php echo $project["id"]; ?>" >
              <?php echo few_letters( $project["pro_desc"] ); ?> </a>
            </div>
        </div>
          
        <div class= "comment input-group" >
          <input class="form-control" type="text" name="comment"  placeholder="Type a comment..." id="usr_com">
          <input class="btn" type="submit" value="Comment" name="com_btn" id="com_btn" />
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