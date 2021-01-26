<?php
session_start();
require_once ('dbh.php');
require_once ('session.php');

date_default_timezone_set('America/Chicago');// change according timezone
$currentDate = date( 'Y-m-d');
$currentTime = date('H:i:sA'); 

$id = (isset($_GET['id']) ? $_GET['id'] : '');
//$pid = $_GET['pid'];
$id = $_GET['id'];
//$date = date('Y-m-d h:i:sA');
//echo "$date";
$sql = "UPDATE userlog_us SET logoutdate='$currentDate', logouttime='$currentTime' WHERE logindate= '$currentDate' AND empid='$id'";
$result = mysqli_query($conn , $sql);
header("Location: ../index.php?id=$id");
message($msg="Hurray! you signed out from work.", $msgtype="info");


?>