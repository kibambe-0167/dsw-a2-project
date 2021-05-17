

<?php 
  
  // if sessions are enabled and one exist
  // if( session_id() === PHP_SESSION_ACTIVE ) {
    // unset all the variables made from the session.
    $_SESSION = array();
    session_destroy(); // destroy the current session.
  // }

  // redirect user to home page.
  header( "location:../index.php" );
?>