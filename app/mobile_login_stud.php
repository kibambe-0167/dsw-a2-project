<?php
  session_start(); // start a session.
?>
<!doctype html>
<html lang="en">
  <head>
    <title> login/out student
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../icon.ico" />

    <link href="../logo.png" rel="icon" >
    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/head.css">

  </head>
  <body>


    <!-- header of the page. -->
    <header >
      <div class="container-fluid row" id="header" >
        <!-- logo -->
        <div class="col-md-3 col-sm-3 col-xs-3 bar" >
          <a href="../index.php" class="nav-link" >
            <!-- Logo -->
            <img id="logo" src="../logo.png" alt="logo" />
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
              <a href="../index.php " class="nav-link" >Home</a>
            </li>

            <li class="nav-item" >
              <a href="./app/contactus.php" class="nav-link" >Contact Us</a>
            </li>

            <li class="nav-item" >
              <a href="./app/aboutus.php" class="nav-link" >About Us</a>
            </li>
          </ul>
        </div>        
        
      </div>
       
      <!-- the menu for the mobile version of the code. -->
      <div class="collapse" id="nav_mobile">
        <div >
          <a href="../index.php" class="nav-link nav_link_rad_start" >
          <i class="fa fa-home" ></i> Home
          </a>
        </div>
        

        <div >
          <a href="./contactus.php" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact Us
          </a>
        </div>

        <div >
          <a href="./aboutus.php" class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp; About Us
          </a>
        </div>
      </div>

      <!-- <div class="wrap" style="display: none;"></div> -->
    </header>
    <div class="wrap" style="display: none;"></div>


    <div class="container" id="index_title" >
      <h1 >U-Innovate</h1>
    </div>


    <!-- applies to students. -->
    <!-- after account is successfully deleted from db -->
    <div class="messages" >
      <?php
        // message about the deleted account.
        echo $_SESSION["acc_del"];
        echo $_SESSION["student_acc_del_msg"];

        // set the session variable value to null;
        // $_SESSION["acc_del"] = null;
        unset( $_SESSION["acc_del"] );
        unset( $_SESSION["student_acc_del_msg"] );
      ?>
    </div>

    
      
    <!-- applies to students. -->
    <div id="usr_msg" class="messages" >
      <!-- put a timer to make this message disappear. -->
      <?php
        // feedback on registration process.
        echo $_SESSION["reg_msg"];
        unset( $_SESSION["reg_msg"] );

        echo $_SESSION["del_usr_acc_msg"];
        unset( $_SESSION["del_usr_acc_msg"] );

        echo $_SESSION["login_msg"];
        unset( $_SESSION["login_msg"] );
      ?>
    </div>

    <!-- registration feedback from savvy or public user. -->
    <div id="reg_msg" class="messages" >
      <?php echo $_SESSION["reg_msg"]; unset( $_SESSION["reg_msg"] ); ?>
    </div>
    

    <!-- this shows error messages when tech savvy logsin -->
    <div id="tech_savvy_log_msg"  class="container messages" >
      <?php echo $_SESSION["email_provide"]; unset($_SESSION["email_provide"]); ?>
    </div>
    <div class="container messages" id="savvy_msg1" >
      <?php echo $_SESSION["no_user"]; unset($_SESSION["no_user"]); ?>
    </div>
    <div class="container messages" id="savvy_msg2" >
      <?php echo $_SESSION["savvy_del_msg"]; unset($_SESSION["savvy_del_msg"]); ?>
    </div>



    <!-- student block -->
    <div class="container" id="student_block_mobile">
        <!-- First form -->
        <div class="center_content" >
        <form action="./login.php" method="post"id="form1" >
          <h2>Students Login</h2>

          <label for="username">Enter email to login</label>
          <div class="input-group">
            <input class="input-group-text" type="email" name="email" id="email" placeholder="name@example.com" autofocus >
          </div>
          
          <label for="pwd">Password</label>
          <div class="input-group" >
            <input class="input-group-text" value="" type="password" name="passwd" id="pw" placeholder="Enter your password" >
          </div>

          <div class="input-group" >
            <input class="btn" value="Signin" type="submit" name="submit" id="submit">

            <input id="stud_in_btn" class="btn"  onclick="add()" type="reset" class="" value="Sign up"/>
          </div>
        </form> </div>

        <!-- student registration form -->
        <div id="panel" class="container panel">
          <h3 >Student Sign up</h3>
          <p >
            <i class="error" style="font-weight: bolder;" >*</i>
            <i class="error">required fields</i>
          </p>
          <form action="../toDb/reg_student.php" method="POST" >

            <label for="fName">First Name</label> <i class="error" >*</i>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="firstname" placeholder="Enter first name" value="" required autofocus>
            </div>
            
            <label>Last Name</label> <i class="error" >*</i>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="lastname" placeholder="Enter last name" value="" required >
            </div>

            
            <label for="email">School Email</label> <i class="error" >*</i>
            <div class="input-group" >
              <input class="input-group-text" type="email" name="email" placeholder="xxxxxxx@student.uj.ac.za" value="" required >
            </div>

            
            <label>Current year</label> <i class="error" >*</i>
            <div class="input-group" >
              <input class="input-group-text" type="number" name="current_year" placeholder="Enter current year" value="" required min="1" max="4" oninput="validity.valid||(value='');" >
            </div>

            
            <label>Department</label> <i class="error" >*</i>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="department" placeholder="Enter department" value="" required >
            </div>

            
            <label for="passwd">Password</label> <i class="error" >*</i>
            <div class="input-group" >
              <input class="input-group-text" type="password" name="passwd" placeholder="Enter password" required value="" >
            </div>

            <label for="passwd_con">Confirm Password</label> <i class="error" >*</i>
            <div class="input-group" >
              <input class="input-group-text" type="password" name="passwd_con" placeholder="Confirm password"  required value="" >
            </div>

            
            <div class="input-group" >
              <input class="btn"  type="submit" id="signup" name="signup" value="SignUp" >
              <input class="btn bg-danger" type="reset" id="disard" value="Discard" />
            </div>
            
          </form>
        </div>
      </div>
      


    <!-- this is the footer of the page. -->
    <footer class="row">
      <div class="container-fluid col-md-6" id="social_med">
        <span >
          <a href="https://touch.facebook.com/U-Innovate-104260611862082/?ref=bookmarks" target="_blank">
            <i class="fa fa-facebook" >
            </i>
          </a>
        </span>

        <span >
          <a href="https://github.com/kibambe-0167/dsw-a2-project.git" target="_blank">
            <i class="fa fa-github"></i>
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