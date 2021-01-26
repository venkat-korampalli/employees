<?php 

// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
session_start();
//require_once('process/session.php');
session_destroy();
require_once ('process/session.php');


 // $sql="INSERT INTO `tbllogs` (`USERID`,USERNAME, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) 
 //          VALUES (".$_SESSION['USERID'].",'".$_SESSION['FULLNAME']."','".date('Y-m-d H:i:s')."','".$_SESSION['UROLE']."','Logged out')";
 //          mysql_query($sql) or die(mysql_error());

// 2. Unset all the session variables
    
// 4. Destroy the session
// session_destroy();
 
header("location: elogin.php");
message("You are now successfully login!","success");
?>