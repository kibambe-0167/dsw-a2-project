
<?php
  session_start(); // start a sesison to send and retrieve data.
  include("./get_1_pro.php"); // run function, that get one project.
  include("../config/connection.php"); // get the connection object.
?>


<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php
        echo ucwords( $_SESSION["fistname"] ) . " | main page ";
      ?>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/p_snippet.css">
    <link rel="stylesheet" href="../css/pro_details.css">

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
              <a href="./profile.php" class="nav-link" >
                Profile
              </a>
            </li>

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

        <div >
          <a href="./profile.php" class="nav-link" >
          <i class="fa fa-user" ></i> Profile
          </a>
        </div>

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
          <div class="main_name"> <?php echo  ucwords( $project["pro_name"] );  ?> </div>

          <div class="box3">Contact</div>

          <div class="pro_link"> <?php echo $project["pro_ext_link"]; ?> </div>

          <div class="pro_team"> Team </div>

          <div class="main_desc" > 
            <?php echo $project["pro_desc"]; ?>
          </div>
        </div>
        
        <form action="./stud_comment.php?project_id=<?php echo $project["id"];?>" method="post">
          <div class= "comment input-group" >
            <input class="form-control" type="text" name="comment"  placeholder="Type a comment..." id="usr_com" value="">
            <input class="btn" type="submit" value="Comment" name="com_btn" id="com_btn" />
          </div>
        </form>
      </div>


      <!-- this div keeps all the comments that belongs to this project -->
      <div id="comm">
        <!-- Comments -->
        <?php
          // this code get all the comments from db, that have id of this project.
          // echo $project["id"];

          $project_id = $project["id"];

          $query = "select * from Comments where pro_id = '$project_id' ";
          $result = mysqli_query( $connObj, $query );

          if( mysqli_num_rows( $result ) > 0 ) {
            while( $comment = mysqli_fetch_assoc( $result ) ) {
              // print_r( $comment ); echo "<br /><br />";
        ?>
        
        <div class="ind_comment" >

          <p class="com_time">
            <?php echo $comment["made_time"] ?>
          </p>

          <p >
            <?php echo ucwords($comment["owner_fname"]) . " " . ucwords($comment["owner_lname"]); ?>
          </p>

          <p class ="com">
            <?php echo $comment["comment"]; ?>
          </p>
        </div>


        <?php    }
          }
        ?>
      </div>

    </div>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
  </body>
</html>