<?php 
 session_start();


 session_unset();
 session_destroy();

//  return "javascript:alert('You has been logged out, Visit again'); window.location.href = 'wlcm.html';";
 header("location:../wlcm.php");
 exit;
 ?>