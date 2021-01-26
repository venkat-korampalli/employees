<?php 
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
session_start();
session_destroy();

 // $sql="INSERT INTO `tbllogs` (`USERID`,USERNAME, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) 
 //          VALUES (".$_SESSION['USERID'].",'".$_SESSION['FULLNAME']."','".date('Y-m-d H:i:s')."','".$_SESSION['UROLE']."','Logged out')";
 //          mysql_query($sql) or die(mysql_error());

// 2. Unset all the session variables
unset($_SESSION['userid']);

    
// 4. Destroy the session
// session_destroy();
 
header("location: alogin.php");
?>