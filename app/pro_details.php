

<?php
  session_start(); // start a sesison to send and retrieve data.
  include("./get_1_pro.php"); // run function, that get one project.
  include("../config/connection.php"); // get the connection object.
  // include(""); // we need the email of this user here.
?>


<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php
        echo ucwords( $_SESSION["savvy_fname"] ) . " | main page ";
      ?>
    </title>
    <link rel="icon" href="../logo.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../icon.ico" />

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/p_snippet.css">
    <link rel="stylesheet" href="../css/pro_details.css">

  </head>
  <body>


    <!-- header or the navigation bar. -->
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
              <a href="./main_savvy.php" class="nav-link active_link" >Home</a>
            </li>
            <li class="nav-item" >
              <a href="./savvy_profile.php" class="nav-link" >Profile</a>
            </li>
            <li class="nav-item" >
              <a href="./contactus.php" class="nav-link" >Contact us</a>
            </li>
            <li class="nav-item" >
              <a href="./aboutus.php" class="nav-link" >About us</a>
            </li>
          </ul>
        </div>        
        
      </div>
       
      <!-- the menu for the mobile version of the code. -->
      <div class="collapse" id="nav_mobile">
        <div >
          <a href="./main_savvy.php" class="nav-link nav_link_rad_start active_link_m" >
          <i class="fa fa-home" ></i> Home
          </a>
        </div>

        <div >
          <a href="./savvy_profile.php" class="nav-link" >
          <i class="fa fa-user" ></i> Profile
          </a>
        </div>

        <div >
          <a href="./contactus.php" class="nav-link" >
          <i class="fa fa-phone" ></i> Contact us
          </a>
        </div>

        <div >
          <a href="./aboutus.php" class="nav-link nav_link_rad_end" >
            <i class="fa fa-info" ></i> &nbsp; About us
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

          <!-- <div class="box3">
            <a href="mailto:< ?php echo $_SESSION ?>" >
              < ?php ?>
            </a>
          </div> -->

          <div class="pro_link">
            <p > 
              <?php echo $project["pro_ext_link"]; ?> 
              <a href="mailto:<?php echo $project['project_email']; ?>" >
                <i class="fa fa-paper-plane" ></i> Contact via email 
              </a> [ <?php echo $project["project_email"]; ?> ]

              <!-- <p>
                <a href="< ?php echo $project["project_file"] ?>" download >
                Download pdf
              </a> </p> -->


              

              
              <div class="pro_team">
                <?php
                  include("../config/connection.php");

                  if( $connObj ) {// echo $project["id"];
                    $id = $project["id"];

                    // get all member id from member_project table, where is curremt project id.
                    // after that get all details from Team_member table, where the id is in the
                    // result from member_project table.
                    $query = "select * from Team_member where member_id in
                    ( select member_id from member_project WHERE project_id = $id )";
                    $result = mysqli_query( $connObj, $query );

                    if( mysqli_num_rows( $result ) > 0 ) { ?>
                      <h5 >Team</h5>
                      <?php
                      while( $team = mysqli_fetch_assoc( $result ) ) { ?>
                        
                        <div >
                          <?php echo $team["firstname"] ." " . $team["lastname"] . " | " . $team["email"]; ?>
                      </div>

                      <?php }
                    }
                  }
                ?>
              </div>





              
            </p>            
          </div>

          <div class="pro_team"> </div>

          <div class="main_desc" > 
            <?php echo strtolower( $project["pro_desc"] ); ?>
          </div>
        </div>
        
        <form action="./post_comment.php?project_id=<?php echo $project["id"];?>" method="post">
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