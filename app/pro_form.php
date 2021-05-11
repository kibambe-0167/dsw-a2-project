

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
    <link rel="stylesheet" href="../style.css">
    <style >
      div {
        margin: .5em;
      }
    </style>

  </head>
  <body>


    <!-- store a project details in the DB. -->
    <form action="../toDb/upload_pro.php" method="post" >
      <div >
        <input type="text" value="Smart Alert" name="name" placeholder="Enter project name">
      </div>

      <div >
        <input type="text" value="mobile App" name="type" placeholder="Enter project type">
      </div>

      <div >
        <textarea name="desc" placeholder="Enter project description" style="padding: 10px;" rows="10" cols="30">This is an app that helps blah blah blah and blah, its was made with blah, html, js, blah, backend with mysql, php and blah. Its helps users do this and that and this is the problem we are solving....
        </textarea>
      </div>

      <div >
        <input type="text" name="ext_link" placeholder="Enter project external link">
      </div>

      <div >
        <input type="submit" value="Upload" name="upload">
      </div>
    </form>

    <span >
      <?php
        // informing user that the project has successfully been uploaded.
        echo $_SESSION["upload_pro_msg"];

        $_SESSION["upload_pro_msg"] = null;
      ?>
    </span>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=""></script>
  </body>
</html>