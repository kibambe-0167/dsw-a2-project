
<?php
  // this code edit a project from db.
  include("./get_1_pro.php"); // code that pull specific project from db.

  include("../config/connection.php"); // connection object to db.
  
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


    <form action="./edit_pro.php?project_id=<?php echo $project["id"]; ?>" method="post" >
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

        if( !empty($_POST["name"]) && !empty($_POST["type"]) && !empty($_POST["desc"]) ) {
          // echo "values are not empty";// echo $_GET["project_id"];// echo $project["id"];

          $name = $_POST["name"];
          $type = $_POST["type"];
          $desc = $_POST["desc"];
          $id = $_GET["project_id"];
          $link = $_POST["ext_link"];

          // make query to update this values.
          $query = "update Project set pro_name='$name', type='$type', pro_desc='$desc', pro_ext_link='$link' where id = '$id'";

          // $result = mysqli_query( $connObj, $query );

          if( mysqli_query( $connObj, $query ) ) {
            echo "Project " . $name . " update successfully";
          }
          // error updating project details
          else { echo "Error updating project $name :<br/>" . mysqli_error( $connObj ); }
        }

        // required fields are empty.
        else { echo "Required fields are empty"; }

      }
    ?>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=""></script>
  </body>
</html>