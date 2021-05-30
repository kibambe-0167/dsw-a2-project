
<?php
  // this code edit a project from db.
  include("./get_1_pro.php"); // code that pull specific project from db.

  include("../config/connection.php"); // connection object to db.

  include("../code_snippets/help_code.php");
  
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Edit Project</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../icon.ico" />

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/pro_details.css">
    <link rel="stylesheet" href="../css/p_snippet.css">
  </head>
  <body>


    <div class="container" id="edit_project" >
      <h2 >Edit project's details</h2>

      <p class="error" >
        <i style="font-weight: bolder;" >*</i> are required fields
      </p>
      <form action="./edit_pro.php?project_id=<?php echo $project["id"]; ?>"  method="post" class="inline" enctype="multipart/form-data" >
        <label for="name" >Type to change project's name<i class="error" >*</i></label>
        <div class="form-group-inline" > 
          <input class="form-control" type="text" value="<?php echo $project["pro_name"]; ?>" name="name" placeholder="Enter project name" required autofocus >
        </div>

        <label for="type" >select to change project's name<i class="error" >*</i></label>
        <div class="form-group-inline"> 
          <select value="<?php echo $project["type"]; ?>" name="type" class="form-control" id="project_type" required>
            <option value="mobile app" >Mobile App</option>
            <option value="web app" >Web App</option>
            <option value="android app" >Android App</option>
            <option value="ios app" >IOS App</option>
            <option value="unknown yet" >General | Unknown yet</option>
          </select>
        </div>


        <label for="desc" >Type to change project's description<i class="error" >*</i></label>
        <div class="input-group" > 
          <textarea class="form-control" name="desc" placeholder="Enter project description" style="padding: 10px;" rows="4" cols="30" required ><?php echo $project["pro_desc"]; ?></textarea>
        </div>

       
        <label for="ext_link" >Type to change project's link</label>
        <div class="input-group" >
          <input class="form-control" type="text" name="ext_link" placeholder="where we can access it online | www.example_url.com" value="<?php echo $project["pro_ext_link"]; ?>">
        </div>

        <label for="email" >Type to change project's main email<i class="error" >*</i></label>
        <div class="input-group" >
          <input class="form-control" type="email" name="pro_email" placeholder="project email | name@example.com" required value="<?php echo $project["project_email"]; ?>">
        </div>

        <!-- <div class="form-group">
          <label for="pro_file">
            Change pdf presentation file <i class="error" >*</i> </label>
          <input name="pro_file" type="file" class="form-control-file" id="pro_file">
        </div> -->


        <div class="input-group" >
          <input class="btn" type="submit" value="Upload" name="save">
          <button class="btn" >
            <a href="./profile.php" >Discard </a>
          </button>
        </div>
      </form>
    </div>


    <!-- When the submit btn is clicked. -->
    <?php 
      // session_start();
      // include("../code_snippets/help_code.php");

      if( isset( $_POST["save"]) ) {
        // echo "Save edit btn clicked";

        if( preg_match("/^[a-z]/i", $_POST["name"]) 
          && preg_match("/^[a-z]/i", $_POST["type"]) 
          && preg_match("/^[a-z]/i", $_POST["desc"]) ) {

          $name = $_POST["name"]; $type = $_POST["type"];
          $desc = $_POST["desc"]; $id = $_GET["project_id"];
          $link = $_POST["ext_link"]; $email = $_POST["email"];

          // $file = $_FILES["pro_file"]['tmp_name'];
          // $filename = $_FILES["pro_file"]['name'];
          // echo $file . "<br/>" . upload_file( $file, $filename );
          // if( upload_file( $file, $filename ) === 1 ) {
            
          // echo "saved";
          // run the query. to update in db.
          // get_project_file_details( $_FILES["pro_file"] );

          // make query to update this values.
          $query = "update Project set pro_name='$name', type='$type', pro_desc='$desc', pro_ext_link='$link', project_email='$email' where id = '$id'"; // echo $query;

          // $result = mysqli_query( $connObj, $query );

          if( mysqli_query( $connObj, $query ) ) {
            echo "Project " . $name . " update successfully";
            $_SESSION["update_project"] =  "<span class='success'>Project " . $name . " update successfully</span>";
            // redirect user to profile page
            header( "location:./profile.php" );
          }
          
          // error updating project details
          else { echo "<span class='error'>Error updating project $name :<br/>" . mysqli_error( $connObj ) . "</span>"; }

          // else{ echo "<span class'error'>Error saving file</span>"; }
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