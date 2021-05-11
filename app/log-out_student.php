

<?php 
  // this code handles the user log out, by destroying all session variables created.

  // star a session to send data and message between files.
  session_start();

  session_destroy();

  // redirect user to home page.
  header( "location:../index.php" );
?>