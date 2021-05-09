

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

    <div >
      <h2 >Sign up</h2>
      <!-- STUDENT OR PROF REGISTRATION FORM. -->
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
    <!-- <form action="./toDb/reg_savvy.php" method="post" >
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
    </form> -->







    <!-- store a project details in the DB. -->
    <!-- <form action="./toDb/upload_pro.php" method="post" >
      <div >
        <input type="text" value="Smart Alert" name="name" placeholder="Enter project name">
      </div>

      <div >
        <input type="text" value="mobile App" name="type" placeholder="Enter project type">
      </div>

      <div >
        <textarea name="desc" placeholder="Enter project description" style="padding: 10px;" cols="30">This is an app that helps blah blah blah and blah, its was made with react native, html, js, css, backend with mysql and blah blah. Its helps users do this and that and this is the problem we ar solving....
        </textarea>
      </div>

      <div >
        <input type="text" name="ext_link" placeholder="Enter project external link">
      </div>

      <div >
        <input type="submit" value="Upload" name="upload">
      </div>
    </form> -->






    

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