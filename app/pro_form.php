

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

    <link rel="icon" href="../icon.ico" />

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
        <div class="col-md-3 col-sm-3 col-xs-3 bar" >
          <a href="./main_savvy.php" class="nav-link" >
            <!-- Logo -->
            <img id="logo" src="../logo.png" alt="logo picture" />
          </a>

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
              <a href="./profile.php" class="nav-link active_link" >
                Profile
              </a>
            </li>

            <li class="nav-item" >
              <a href="./contactus.php" target="blank" class="nav-link" >Contact us</a>
            </li>

            <li class="nav-item" >
              <a href="./aboutus.php" target="blank" class="nav-link" >About us</a>
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
          <a href="./profile.php" class="nav-link active_link_m" >
          <i class="fa fa-user" ></i> Profile
          </a>
        </div>

        <div >
          <a href="./contactus.php" target="blank" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact us
          </a>
        </div>

        <div >
          <a href="./aboutus.php" target="blank" class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp About us
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

      <form action="../toDb/upload_pro.php" method="post" class="inline" >
        <label for="name" >Enter project's name <i class="error" >*</i></label>
        <div class="form-group-inline" > 
          <input class="form-control" type="text" value="" name="name" placeholder="Enter project name" required autofocus >
        </div>

        <div class="form-group-inline"> 
          <label for="type" >Enter project's type<i class="error" >*</i> </label>
          <select name="type" class="form-control" id="project_type" required>
            <option value="mobile app" >Mobile App</option>
            <option value="web app" >Web App</option>
            <option value="android app" >Android App</option>
            <option value="ios app" >IOS App</option>
            <option value="unknown yet" >General | Unknown yet</option>
          </select>
        </div>

        <label for="desc" >Enter project's description <i class="error" >*</i> </label>
        <div class="input-group" > 
          <textarea class="form-control" name="desc" placeholder="Enter project description" style="padding: 10px;" rows="4" cols="30" required ></textarea>
        </div>

       
        <label for="ext_link" >Enter project's external link</label>
        <div class="input-group" >
          <input class="form-control" type="text" name="ext_link" placeholder="where we can access it online | www.example_url.com">
        </div>

        <label for="" >
          Enter project's main email <i class="error" >*</i>
        </label>
        <div class="input-group" >
          <input class="form-control" type="email" name="pro_email" placeholder="project email | name@example.com" required>
        </div>

        <!-- <div class="form-group">
          <label for="">
            pdf presentation file <i class="error" >*</i> </label>
          <input name="pro_file" type="file" class="form-control-file" id="pro_file">
        </div> -->


        <div class="input-group" >
          <input class="btn" type="submit" value="Upload" name="upload">
          <button class="btn" >
            <a href="./profile.php" >Discard </a>
          </button>
        </div>
      </form>
    </div>


    <!-- this is the footer -->
    <!-- <footer class="row">
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

    </footer> -->
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>