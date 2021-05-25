

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
        echo ucwords( $_SESSION["savvy_fname"] ) . " | main page ";
      ?>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <div >
      <a href="./main_savvy.php">Home</a>
    </div>

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
        
        <form action="./post_comment.php?project_id=<?php echo $project["id"];?>" method="post">
          <div class= "comment input-group" >
            <input class="form-control" type="text" name="comment"  placeholder="Type a comment..." id="usr_com" value="">
            <input class="form-control" type="submit" value="Comment" name="com_btn" id="com_btn" />
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