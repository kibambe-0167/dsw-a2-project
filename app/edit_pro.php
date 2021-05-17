
<?php
  // this code edit a project from db.
  include("./get_1_pro.php"); // code that pull specific project from db.
  
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="">
  </head>
  <body>


    <form action="./edit_pro.php" method="post" >
      <div >
        <input type="text" value="<?php echo $project["pro_name"]; ?>" name="name" placeholder="Enter project name">
      </div>

      <div >
        <input type="text" value="<?php echo $project["type"]; ?>" name="type" placeholder="Enter project type">
      </div>

      <div >
        <textarea name="desc" placeholder="Enter project description" style="padding: 10px;" rows="10" cols="30"><?php echo $project["pro_desc"]; ?></textarea>
      </div>

      <div >
        <input type="text" name="ext_link" placeholder="Enter project external link" value="<?php echo $project["pro_ext_link"]; ?>">
      </div>

      <div >
        <input type="submit" value="Save" name="save">
      </div>
    </form>


    <!-- When the submit btn is clicked. -->
    <?php 
      if( isset( $_POST["save"]) ) {
        // echo "Save edit btn clicked";

        
      }
    ?>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=""></script>
  </body>
</html>