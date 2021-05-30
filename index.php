<?php
  // if there is a alreay a set, start that session here. 
  // to exchange information and messages.
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Index
    </title>

    <link rel="icon" href="./logo.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../icon.ico" />

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/head.css">

    </style>
  </head>
  <body>


    <!-- header of the page. -->
    <header >
      <div class="container-fluid row" id="header" >
        <!-- logo -->
        <div class="col-md-3 col-sm-3 col-xs-3 bar" >
          <a href="./index.php" class="nav-link" >
            <!-- Logo -->
            <img id="logo" src="./logo.png" alt="logo" />
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
              <a href="./index.php" class="nav-link" >Home</a>
            </li>

            <li class="nav-item" >
              <a href="./app/contactus.php" target="blank" class="nav-link" >Contact us</a>
            </li>

            <li class="nav-item" >
              <a href="./app/aboutus.php" target="blank" class="nav-link" >About us</a>
            </li>
          </ul>
        </div>        
        
      </div>
       
      <!-- the menu for the mobile version of the code. -->
      <div class="collapse" id="nav_mobile">
        <div >
          <a href="./index.php" class="nav-link nav_link_rad_start" >
          <i class="fa fa-home" ></i> Home
          </a>
        </div>

        <div >
          <a href="./app/mobile_login_stud.php" class="nav-link" >
          <i class="fa fa-sign-in" ></i> &nbsp;
          <i class="fa fa-user-plus" ></i> &nbsp;
          Student 
          <!-- login | logout -->
          </a>
        </div>

        <div >
          <a href="./app/contactus.php" target="blank" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact us
          </a>
        </div>

        <div >
          <a href="./app/aboutus.php" target="blank"  class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp; About us
          </a>
        </div>
      </div>

      <!-- <div class="wrap" style="display: none;"></div> -->
    </header>
    <div class="wrap" style="display: none;"></div>


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

    
    <!-- contains login and signin forms -->
    <div id="login_content" class="container">

      <!-- Savvy block -->
      <div class="container" id="savvy_block" >
        <!-- Second Form, tech savvy login form     -->
        <div class="center_content" >
        <form action="./app/login_savvy.php" method="post" id="form2" >
          <h2>Public user Login</h2>
          <label for="email">Enter email to login</label>
          <div class="input-group">
            <input class="input-group-text" type="email" name="email" placeholder="name@example.com" id="" autofocus>
          </div>
          
          <div class="input-group">
            <input class="btn"  type="submit" name="submit" value="Sign in" id="">
            <input id="savvy_in_btn" type="reset" class="btn" onclick="add1()" class="accordion1" value="Sign up"/>
          </div>
        </form> </div>

        <!--Second Hidden Form-->
        <div id="panel1" class="container panel1">
          <h3 >Public user Sign up</h3>
          <p >
            <i class="error" style="font-weight: bolder;" >*</i>
            <i class="error">required fields</i>
          </p>
          
          <form action="./toDb/reg_savvy.php" method="post" >
            <label>First Name </label> <i class="error" >*</i>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="fname" placeholder="Enter firstname" value="" autofocus required >
            </div>

            <label>Last Name </label>  <i class="error" >*</i>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="lname" placeholder="Enter lastname" value="" required >
            </div>

            <label> Email</label> <i class="error" >*</i>
            <div class="input-group" >  
              <input class="input-group-text" type="email" name="email" placeholder="Enter email..." value="" required >
            </div>

            <label> Confirm Email</label> <i class="error" >*</i>
            <div class="input-group" >
              <input class="input-group-text" type="email" name="con_email" placeholder="Re-enter email..." value="" required >
            </div>

            <div class="input-group" >
              <input class="btn" type="submit" name="signup" value="sign up" >
              <input type="reset" class="btn bg-danger" id="discard2" value="Discard" />
            </div>

          </form>
        </div>
      </div>
      

      <!-- student block -->
      <div class="container" id="student_block">
        <!-- First form -->
        <form action="./app/login.php" method="post"id="form1" >
          <h2>Students login</h2>

          <label for="username">Enter student email</label>
          <div class="input-group">
            <input class="input-group-text" type="email" name="email" id="email" placeholder="xxxxxxx@student.uj.ac.za" autofocus >
          </div>
          
          <label for="pwd">Password</label>
          <div class="input-group" >
            <input class="input-group-text" value="" type="password" name="passwd" id="pw" placeholder="Enter password" >
          </div>

          <div class="input-group" >
            <input class="btn" value="Signin" type="submit" name="submit" id="submit">
            <input id="stud_in_btn" class="btn"  onclick="add()" type="reset" class="" value="Sign up"/>
          </div>
        </form>

        <!-- student registration form -->
        <div id="panel" class="container panel">
          <h3 >Student Sign up</h3>
          <p >
            <i class="error" style="font-weight: bolder;" >*</i>
            <i class="error">required fields</i>
          </p>
          <form action="./toDb/reg_student.php" method="POST" >
            <label for="fName">First Name</label> <i class="error">*</i>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="firstname" placeholder="Enter first name" value="Bakali" required autofocus>
            </div>
            
            <label>Last Name</label> <i class="error">*</i>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="lastname" placeholder="Enter last name" value="Phiri" required >
            </div>

            
            <label for="email">School Email</label> <i class="error">*</i>
            <div class="input-group" >
              <input class="input-group-text" type="email" name="email" placeholder="xxxxxxx@student.uj.ac.za" value="9999999@student.uj.ac.za" required >
            </div>

            
            <label>Current year</label> <i class="error">*</i>
            <div class="input-group" >
              <input class="input-group-text" type="number" name="current_year" placeholder="Enter current year" value="3" required >
            </div>

            
            <label>Department</label> <i class="error">*</i>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="department" placeholder="Enter department" value="AIS" required >
            </div>

            
            <label for="passwd">Password</label> <i class="error">*</i>
            <div class="input-group" >
              <input class="input-group-text" type="password" name="passwd" placeholder="Enter password" required value="Bakali" >
            </div>

            <label for="passwd_con">Confirm Password</label> <i class="error">*</i>
            <div class="input-group" >
              <input class="input-group-text" type="password" name="passwd_con" placeholder="Confirm password"  required value="Bakali" >
            </div>

            
            <div class="input-group" >
              <input class="btn"  type="submit" id="signup" name="signup" value="SignUp" >
              <input class="btn bg-danger" type="reset" id="disard" value="Discard" />
            </div>
            
          </form>
        </div>
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
    <script type="text/javascript" src="./js/jQuery.js" ></script>
    <script type="text/javascript" src="./js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="./js/script.js" ></script>
  
  </body>
</html>