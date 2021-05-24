

<?php 

  session_start(); // start a session

  // echo $_SESSION["savvy_id"];
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

  </head>
  <body>

    <!-- show user details -->
    <div class="sep">
      <?php
        echo $_SESSION["savvy_id"] . " | " . $_SESSION["savvy_fname"] . " | " . $_SESSION["savvy_lname"] . " | " . $_SESSION["savvy_email"];
      ?>
    </div>

    <header >
      <div class="container-fluid row" id="header" >
        <!-- logo -->
        <div class="col-md-3 col-sm-3 col-xs-3 bg-warning bar" id="logo">
          <a href="./main_savvy.php" class="nav-link" >Logo</a>

          <span class="bg-warning" id="menu_btn" type="button" data-toggle="collapse" data-target="#nav_mobile" >
            <!-- Collapse -->
            <i class="fa fa-bars"></i>
          </span>
        </div>
        <!-- navbar links,  -->
        <div id="b_nav" class="col-md-9 col-sm-9 col-xs-9 bg-info" >
          <ul class="nav" id="nav-link-bs"  >
            <li class="nav-item" >
              <a href="./main_savvy.php" class="nav-link" >Home</a>
            </li>
            <li class="nav-item" >
              <a href="./edit_savvy_acc.php?savvy_id=<?php echo $_SESSION["savvy_id"]; ?>" class="nav-link" >Edit</a>
            </li>
            <li class="nav-item" >
              <a href="../del/del_savvy_acc.php?savvy_id=<?php echo $_SESSION["savvy_id"]; ?>" class="nav-link" >Delete</a>
            </li>
            <li class="nav-item" >
              <a href="#" class="nav-link" >Contact</a>
            </li>
            <li class="nav-item" >
              <a href="#" class="nav-link" >About</a>
            </li>
          </ul>
        </div>        
        
      </div>
       
      <!-- the menu for the mobile version of the code. -->
      <div class="collapse bg-success" id="nav_mobile">
        <div >
          <a href="./main_savvy.php" class="nav-link" >Home</a>
        </div>
        <div >
          <a href="./edit_savvy_acc.php?savvy_id=<?php echo $_SESSION["savvy_id"]; ?>" class="nav-link" >
            Edit</a>
        </div>
        <div >
          <a href="../del/del_savvy_acc.php?savvy_id=<?php echo $_SESSION["savvy_id"]; ?>" class="nav-link" >Delete</a> </p>
        </div>
      </div>
    </header>
    <div class="wrap" style="display: none;"></div>












    <div class="container" >
      <?php echo $_SESSION["update_msg"]; ?>
    </div>


    <div class="container" >
      <div class="" id="savvy_profile" >

        <?php echo ucwords( $_SESSION["savvy_fname"] ); ?>

        <?php echo ucwords( $_SESSION["savvy_lname"] ); ?>

        <p>
          <?php echo ucwords( $_SESSION["savvy_email"] ); ?>
        </p>

      </div>
    </div>





    <!-- this is the footer of the page. -->
    <footer >
      <div class="container-fluid bg-secondary" id="social_med">
        <span >
          <a href="">
            <i class="fa fa-facebook" >
            </i>
          </a>
        </span>
  
        <span >
          <a href="">
            <i class="fa fa-linkedin"></i>
          </i>
          </a>
        </span>
  
        <span >
          <a href="#">
            <i class="fa fa-twitter-square "></i></i>
          </a>
          
        </span>
      </div>

      <div id="footer_details" >
        <span >
          <a href="#"> About us</a>
        </span>
        |
        <span >
          <a href="#"> Contact us</a>
        </span>
      </div>
    </footer>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>