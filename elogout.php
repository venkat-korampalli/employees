<?php 

// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
session_start();
//require_once('process/session.php');
if(isset($_GET['id']))
{
require_once ('dbh.php');
require_once ('process/session.php');

date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentDate = date( 'Y-m-d');
$currentTime = date('H:i:s', time ()); 

$id = (isset($_GET['id']) ? $_GET['id'] : '');
//$pid = $_GET['pid'];
$id = $_GET['id'];
//$date = date('Y-m-d h:i:sA');
//echo "$date";
$sql = "INSERT INTO `userlogouttimings`(`empid`, `logoutdate`, `logouttime`) VALUES ('$id','$currentDate', '$currentTime')";
$result = mysqli_query($conn , $sql);


 // $sql="INSERT INTO `tbllogs` (`USERID`,USERNAME, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) 
 //          VALUES (".$_SESSION['USERID'].",'".$_SESSION['FULLNAME']."','".date('Y-m-d H:i:s')."','".$_SESSION['UROLE']."','Logged out')";
 //          mysqli_query($sql) or die(mysqli_error());

// 2. Unset all the session variables
    
// 4. Destroy the session
// session_destroy();
session_destroy();
message("You're logged out successfully!","danger");
header("location: elogin.php");
exit;
}
?>