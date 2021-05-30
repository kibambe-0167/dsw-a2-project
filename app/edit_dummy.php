
<!-- When the submit btn is clicked. -->
<?php 
session_start();
include("../code_snippets/help_code.php");



  if( isset( $_POST["save"]) ) {
    // echo "Save edit btn clicked";

    if( preg_match("/^[a-z]/i", $_POST["name"]) 
      && preg_match("/^[a-z]/i", $_POST["type"]) 
      && preg_match("/^[a-z]/i", $_POST["desc"]) ) {

      echo $_POST["name"] . "<br />";

      $name = $_POST["name"]; $type = $_POST["type"];
      $desc = $_POST["desc"]; $id = $_GET["project_id"];
      $link = $_POST["ext_link"]; $email = $_POST["email"]; 
      $filename = $_FILES["pro_file"]['name'];

      echo $filename . "<br />";


      // get_project_file_details( $_FILES["pro_file"] );

      // make query to update this values.
      $query = "update Project set pro_name='$name', type='$type', pro_desc='$desc', pro_ext_link='$link' where id = '$id'"; echo $query;

      // // $result = mysqli_query( $connObj, $query );

      // if( mysqli_query( $connObj, $query ) ) {
      //   echo "Project " . $name . " update successfully";
      // }
      // // error updating project details
      // else { echo "Error updating project $name :<br/>" . mysqli_error( $connObj ); }
    }

    // required fields are empty.
    else { echo "Required fields are empty"; }

  }
?>
