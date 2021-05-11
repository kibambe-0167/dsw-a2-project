

<!doctype html>
<html lang="en">
  <head>
    <title>Index
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">

    <style >
      div {
        margin: .5em;
      }
    </style>
  </head>
  <body>
    
    <!-- STUDENT OR PROF REGISTRATION FORM. -->
    <div >
      <h2 >Sign up</h2>
      <form action="./toDb/reg_student.php" method="POST">
        <div >
          <input type="text" name="firstname" placeholder="Enter first name" value="Bakali" required>
        </div>

        <div >
          <input type="text" name="lastname" placeholder="Enter last name" value="Phiri" required >
        </div>

        <div >
          <input type="email" name="email" placeholder="Enter school email" value="9999999@student.uj.ac.za" required >
        </div>

        <div >
          <input type="text" name="department" placeholder="Enter department" value="AIS" required >
        </div>

        <div >
          <input type="number" name="current_year" placeholder="Enter current year" value="3" required >
        </div>

        <div >
          <input type="password" name="passwd" placeholder="Enter password" required value="Bakali" >
        </div>

        <div >
          <input type="password" name="passwd_con" placeholder="Confirm password"  required value="Bakali" >
        </div>

        <div >
          <input type="submit" id="signup" name="signup" value="SignUp" >
        </div>
      </form>
    </div>


    <div >
      <h2 >Log in</h2>
      <form action="./app/login.php" method="post">
        <div >
          <input type="email" name="email" id="email" placeholder="Enter email" >
        </div>

        <div >
          <input type="password" name="passwd" id="pw" placeholder="Enter password" >
        </div>

        <div >
          <input type="submit" name="submit" id="submit">
        </div>
      </form>
    </div>
    









  
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
    <script ></script>
    <script ></script>
  </body>
</html>