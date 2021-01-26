<?php
session_start();
require_once ('dbh.php');
require_once ('session.php');

date_default_timezone_set('America/Chicago');// change according timezone
$currentDate = date( 'Y-m-d');
$_SESSION['currentdate'] = $currentDate;
$currentTime = date('H:i:s', time ()); 

$id = (isset($_GET['id']) ? $_GET['id'] : '');
//$pid = $_GET['pid'];
$id = $_GET['id'];
//$date = date('Y-m-d');
//echo "$date";
echo $sqlcheck = "SELECT logindate FROM userlog_us WHERE empid=$id";
 $resultcheck = mysqli_query($conn, $sqlcheck); 

 while($ops3date = mysqli_fetch_assoc($resultcheck)){
 echo	$checkdate = $ops3date['logindate'];

 }
//$dup= mysqli_num_rows($sqlcheck);
if($checkdate !== $_SESSION['currentdate'] ){
	message($msg="Your Work has been started!", $msgtype="info");
	$sql = "INSERT INTO `userlog_us` (`empid`,`logindate`,`logintime`) VALUES ('$id','$currentDate','$currentTime')";
    $result = mysqli_query($conn , $sql);
    header("Location: ../index.php?id=$id");
}else{
    	message($msg="Lol! You Already Logged In!", $msgtype="error");
    	header("Location: ../index.php?id=$id");
}


?>