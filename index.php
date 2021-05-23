

<?php

  // if there is a alreay a set, start that session here. 
  // to exchange information and messages.
  if ( session_status() === PHP_SESSION_ACTIVE ) {
    session_start();
    $_SESSION["session_id"] = session_id();
    echo "Session started<br/>";
    echo "<br/>Session ID:" . $_SESSION["session_id"] . "<br/><br/>";
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Index
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
    <!-- <link rel="stylesheet" href="./css/login.css"> -->

    </style>
  </head>
  <body>


    <!-- header of the page -->
    <header >
			<div >
				logo
			</div>

			<div >
				About | Contact
			</div>
		</header>



    <!-- contains login and signin forms -->
    <div id="login_content" class="container row bg-dark">

      <!-- Savvy block -->
      <div class="col-sm-6 bg-warning" id="savvy_block" >
        <!-- Second Form     -->
        <form action="./app/login_savvy.php" method="post" id="form2" >
          <h2>Public</h2>
          <label for="email">Email </label>
          <div class="input-group">
            <input class="input-group-text" type="email" name="email" placeholder="Enter your email" id="" autofocus>
          </div>
          
          <div class="input-group">
            <input class="btn"  type="submit" name="submit" value="login" id="">
            <input type="reset" class="btn bg-secondary" onclick="add1()" class="accordion1" value="Sign Up"/>
          </div>
        </form>

        <!--Second Hidden Form-->
        <div id="panel1" class="panel1">
          <form action="./toDb/reg_savvy.php" method="post" >
            <label>First Name </label>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="fname" placeholder="Enter firstname" value="micheal" autofocus >
            </div>

            <label>Last Name </label>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="lname" placeholder="Enter lastname" value="Banda" >
            </div>

            <label> Email</label>
            <div class="input-group" >
              <input class="input-group-text" type="email" name="email" placeholder="Enter email" value="micheal@gmail.com" >
            </div>

            <label> Confirm Email</label>
            <div class="input-group" >
              <input class="input-group-text" type="email" name="email" placeholder="Enter email" value="micheal@gmail.com" >
            </div>

            <div class="input-group" >
              <input class="btn" type="submit" name="signup" value="sign up" >
              
              <input type="reset" class="btn bg-danger" id="discard2" value="Discard" />
            </div>

          </form>
        </div>
      </div>
      


      <!-- student block -->
      <div class="col-sm-6 bg-info" id="student_block">
        <!-- First form -->
        <form action="./app/login.php" method="post"id="form1" >
          <h2>Students</h2>

          <label for="username">Username</label>
          <div class="input-group">
            <input class="input-group-text" type="email" name="email" id="email" placeholder="Enter email" autofocus >
          </div>
          
          <label for="pwd">Password</label>
          <div class="input-group" >
            <input class="input-group-text" value="Bakali" type="password" name="passwd" id="pw" placeholder="Enter password" >
          </div>

          <div class="input-group" >
            <input class="btn" value="Signin" type="submit" name="submit" id="submit">

            <input class="btn bg-secondary"  onclick="add()" type="reset" class="" value="Sign up"/>
          </div>
        </form>

        <!-- student registration form -->
        <div id="panel" class="panel">
          <form action="./toDb/reg_student.php" method="POST" >

            <label for="fName">First Name</label>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="firstname" placeholder="Enter first name" value="Bakali" required autofocus>
            </div>
            
            <label>Last Name</label>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="lastname" placeholder="Enter last name" value="Phiri" required >
            </div>
            
            <!-- <label>Student Number</label>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="sNum" id="sNum">
            </div> -->

            
            <label for="email">School Email</label>
            <div class="input-group" >
              <input class="input-group-text" type="email" name="email" placeholder="Enter school email" value="9999999@student.uj.ac.za" required >
            </div>

            
            <label>Current year</label>
            <div class="input-group" >
              <input class="input-group-text" type="number" name="current_year" placeholder="Enter current year" value="3" required >
            </div>

            
            <label>Department</label>
            <div class="input-group" >
              <input class="input-group-text" type="text" name="department" placeholder="Enter department" value="AIS" required >
            </div>

            
            <label for="passwd">Password</label>
            <div class="input-group" >
              <input class="input-group-text" type="password" name="passwd" placeholder="Enter password" required value="Bakali" >
            </div>

            <label for="passwd_con">Confirm Password</label>
            <div class="input-group" >
              <input class="input-group-text" type="password" name="passwd_con" placeholder="Confirm password"  required value="Bakali" >
            </div>

            
            <div class="input-group" >
              <input class="btn"  type="submit" id="signup" name="signup" value="SignUp" >
            
              <input class="btn bg-danger" type="reset" id="disard" value="Discard" />
            </div>
            
          </form>
        </div>
        <!-- applies to students. -->
        <!-- after account is successfully deleted from db -->
        <span >
          <?php
            // message about the deleted account.
            echo $_SESSION["acc_del"];

            // set the session variable value to null;
            // $_SESSION["acc_del"] = null;
            unset( $_SESSION["acc_del"] );
          ?>
        </span>

        <!-- applies to students. -->
        <span >
          <!-- put a timer to make this message disappear. -->
          <?php
            // feedback onm registration process.
            echo $_SESSION["reg_msg"];

            // set session variable to null
            // $_SESSION["reg_msg"] = null;
            unset( $_SESSION["reg_msg"] );
          ?>
        </span>
      </div>
                  
    </div>



    <?php
      echo $_SESSION["login_msg"];
    ?>















    <!-- SAVVY REGISTRATION FORM -->
    <!-- <div >
      <h2 >Tech Savvy Sign up</h2>
      <form action="./toDb/reg_savvy.php" method="post" >
        <div >
          <input type="text" name="fname" placeholder="Enter firstname" value="micheal" >
        </div>

        <div >
          <input type="text" name="lname" placeholder="Enter lastname" value="Banda" >
        </div>

        <div >
          <input type="email" name="email" placeholder="Enter email" value="micheal@gmail.com" >
        </div>

        <div >
          <input type="submit" name="signup" value="sign up" >
        </div>
      </form>
    </div>


    <div >
      <h2 >Tech Savvy log in</h2>
      <form action="./app/login_savvy.php" method="post">
        <div >
          <input type="email" name="email" placeholder="Enter your email" id="">
        </div>
        
        <div >
          <input type="submit" name="submit" value="login" id="">
        </div>
      </form>
    </div> -->


    <!-- this is a form for the comment  -->
    <!-- <form action="./toDb/comment.php" method="post" >
      <div >
        <input type="text" name="comment" placeholder="Type a comment" />
      </div>

      <div >
        <input type="submit" name="submit" />
      </div>
    </form> -->


    <!-- this is uploading a team members details to db. -->
    <!-- <form action="./toDb/team.php" method="post">
      <div >
        <input type="text" name="fname" placeholder="Enter a team members name" value="Surprise" >
      </div>

      <div >
        <input type="text" name="lname" placeholder="Enter a team members last name" value="Mumba"  >
      </div>

      <div >
        <input type="email" name="email" placeholder="Enter a team members email" value="mumba@gmail.com"  >
      </div>

      <div >
        <input type="submit" name="submit" >
      </div>
    </form> -->
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script type="text/javascript" src="./js/jQuery.js" ></script>
    <script type="text/javascript" src="./js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="./js/script.js" ></script>
  
  </body>
</html>