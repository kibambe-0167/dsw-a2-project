

<!-- start a session to share data and information -->
<?php
  // start a session to share data and information
  session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Upload a project</title>
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

            <!-- <li class="nav-item" >
              <a href="./pro_form.php" class="nav-link" >
                Upload Project
              </a>
            </li> -->

            <li class="nav-item" >
              <a href="./contactus.php" class="nav-link" >Contact Us</a>
            </li>

            <li class="nav-item" >
              <a href="./aboutus.php" class="nav-link" >About Us</a>
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

        <!-- <div >
          <a href="" class="nav-link" >
          <i class="fa fa-upload" ></i> Upload Project
          </a>
        </div> -->

        <div >
          <a href="./contactus.php" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact Us
          </a>
        </div>

        <div >
          <a href="./aboutus.php" class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp About Us
          </a>
        </div>
      </div>

      <!-- <div class="wrap" style="display: none;"></div> -->
    </header>
    <div class="wrap" style="display: none;"></div>


    <!-- feedbacks -->
    <div class="messages" >
      <?php
        // informing user that the project has successfully been uploaded.
        echo $_SESSION["upload_pro_msg"];
        unset( $_SESSION["upload_pro_msg"] );
      ?>
    </div>



    <!-- store a project details in the DB. -->
    <div id="up_project" class="container" >

      <form action="../toDb/upload_pro.php" method="post" >
        <div class="input-group" >
          <input class="form-control" type="text" value="Smart Alert" name="name" placeholder="Enter project name">
        </div>

        <div class="input-group" >
          <input class="form-control" type="text" value="mobile App" name="type" placeholder="Enter project type">
        </div>

        <div class="input-group" >
          <textarea class="form-control" name="desc" placeholder="Enter project description" style="padding: 10px;" rows="5" cols="30">This is an app that helps blah blah blah and blah, its was made with blah, html, js, blah, backend with mysql, php and blah. Its helps users do this and that and this is the problem we are solving....
          </textarea>
        </div>

        <div class="input-group" >
          <input class="form-control" type="text" name="ext_link" placeholder="Enter project external link">
        </div>

        <div class="input-group" >
          <input class="btn" type="submit" value="Upload" name="upload">
          <!-- <input class="btn" type="reset" value="Discard" name="discard"> -->
          <button class="btn" >
            
            <a href="./profile.php" >Discard </a>
          </button>
        </div>
      </form>
    </div>


    <!-- this is the footer -->
    <footer class="row">
      <div class="container-fluid col-md-6" id="social_med">
        <span >
          <a href="https://touch.facebook.com/U-Innovate-104260611862082/?ref=bookmarks" target="_blank">
            <i class="fa fa-facebook" >
            </i>
          </a>
        </span>
  
        <span >
          <a href="https://www.linkedin.com/company/u-innovate" target="_blank">
            <i class="fa fa-linkedin"></i>
          </i>
          </a>
        </span>
  
        <span >
          <a href="https://twitter.com/NovateUin" target="_blank">
            <i class="fa fa-twitter-square"></i></i>
          </a>
        </span>

        <span >
          <a href="https://www.instagram.com/uin.novate/" target="_blank">
            <i class="fa fa-instagram"></i></i>
          </a>
        </span>
      </div>

      <div id="footer_details" class="container col-md-6" >
        <span >
          <a href="#"> About us</a>
        </span>
        |
        <span >
          <a href="#">
            Contact us
            <i class="fa fa-phone" ></i>
          </a>
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